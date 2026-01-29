<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class PublishScheduledBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogs:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all scheduled blog posts that are due';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $now = Carbon::now();
        
        // Find all scheduled blogs that are due to be published
        $scheduledBlogs = Blog::where('status', 'scheduled')
            ->whereNotNull('scheduled_at')
            ->where('scheduled_at', '<=', $now)
            ->get();
        
        if ($scheduledBlogs->isEmpty()) {
            $this->info('No scheduled blogs to publish.');
            return Command::SUCCESS;
        }
        
        $count = 0;
        foreach ($scheduledBlogs as $blog) {
            $blog->update([
                'status' => 'published',
                'published_at' => $blog->scheduled_at,
            ]);
            $count++;
            $this->line("Published: {$blog->title}");
        }
        
        $this->info("Successfully published {$count} blog(s).");
        
        return Command::SUCCESS;
    }
}
