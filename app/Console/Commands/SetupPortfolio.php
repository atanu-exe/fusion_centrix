<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupPortfolio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'portfolio:setup {--seed : Also seed sample portfolio data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the portfolio system - run migrations and optionally seed data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Setting up Portfolio System...');

        // Run migrations
        $this->info('📦 Running migrations...');
        Artisan::call('migrate', ['--table' => 'portfolios']);
        $this->info('✓ Migrations completed!');

        // Optionally seed data
        if ($this->option('seed')) {
            $this->info('🌱 Seeding portfolio data...');
            Artisan::call('db:seed', ['--class' => 'PortfolioSeeder']);
            $this->info('✓ Portfolio data seeded!');
        }

        $this->info('');
        $this->info('✅ Portfolio system setup complete!');
        $this->info('');
        $this->info('📖 Next steps:');
        $this->line('  1. Visit http://localhost:8000/portfolio to view your portfolio');
        $this->line('  2. Edit database/seeders/PortfolioSeeder.php to customize portfolio items');
        $this->line('  3. Run migrations: php artisan migrate');
        $this->line('  4. See PORTFOLIO_SETUP.md for detailed documentation');

        return 0;
    }
}
