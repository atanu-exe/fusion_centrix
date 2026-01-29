<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * General settings
     */
    public function general()
    {
        return view('admin.settings.general');
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        // You can implement settings storage here
        // For now, just redirect back with success
        return back()->with('success', 'Settings updated successfully.');
    }
}
