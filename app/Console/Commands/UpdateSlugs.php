<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class UpdateSlugs extends Command
{
    protected $signature = 'update:slugs';

    protected $description = 'Update slugs for news_posts table';

    public function handle()
    {
        // Get news posts from the database
        // $newsPosts = DB::table('news_posts')->get();

        // foreach ($newsPosts as $post) {
        //     // Generate slug from title
        //     $slug =createSlug($post->title);

        //     // Update the slug in the database
        //     DB::table('news_posts')->where('id', $post->id)->update(['slug' => $slug]);
        // }

        // $this->info('Slugs updated successfully.');
        // / Get news posts from the database
        $newsPosts = DB::table('news_posts')->get();

        foreach ($newsPosts as $post) {
            try {
                // Attempt translation
                $translatedText = GoogleTranslate::trans($post->title, 'en');
                // If translation succeeds, create slug
                $slug = Str::of($translatedText)->slug('-');
            } catch (\Exception $e) {
                // Handle translation failure gracefully
                Log::error('Translation failed: ' . $e->getMessage());
                // Generate slug directly from title
                $slug = preg_replace('/[\s.\/]+/', '-', $post->title);
                // Convert to lowercase
                $slug = strtolower($slug);
            }

            // Update the slug in the database
            DB::table('news_posts')->where('id', $post->id)->update(['slug' => $slug]);
        }

        $this->info('Slugs updated successfully.');
    }
}
