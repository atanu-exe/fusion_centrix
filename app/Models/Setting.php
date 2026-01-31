<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'group'];

    /**
     * Get a setting value by key
     */
    public static function get(string $key, $default = null)
    {
        $setting = Cache::remember("setting.{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        if (!$setting) {
            return $default;
        }

        return static::castValue($setting->value, $setting->type);
    }

    /**
     * Set a setting value
     */
    public static function set(string $key, $value, string $type = 'string', string $group = 'general'): bool
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? json_encode($value) : (string) $value,
                'type' => $type,
                'group' => $group,
            ]
        );

        // Clear cache for this setting
        Cache::forget("setting.{$key}");
        Cache::forget('settings.all');

        return $setting->wasRecentlyCreated || $setting->wasChanged();
    }

    /**
     * Get all settings as key-value pairs
     */
    public static function getAll(): array
    {
        return Cache::remember('settings.all', 3600, function () {
            $settings = [];
            foreach (static::all() as $setting) {
                $settings[$setting->key] = static::castValue($setting->value, $setting->type);
            }
            return $settings;
        });
    }

    /**
     * Get settings by group
     */
    public static function getByGroup(string $group): array
    {
        $settings = [];
        foreach (static::where('group', $group)->get() as $setting) {
            $settings[$setting->key] = static::castValue($setting->value, $setting->type);
        }
        return $settings;
    }

    /**
     * Cast value based on type
     */
    protected static function castValue($value, string $type)
    {
        return match ($type) {
            'boolean' => (bool) $value,
            'integer' => (int) $value,
            'json' => json_decode($value, true),
            default => $value,
        };
    }

    /**
     * Clear all settings cache
     */
    public static function clearCache(): void
    {
        $settings = static::pluck('key');
        foreach ($settings as $key) {
            Cache::forget("setting.{$key}");
        }
        Cache::forget('settings.all');
    }
}
