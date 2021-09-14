<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use DB;

class FetchPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from api.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->object();

        foreach($posts as $post) {
            DB::table('posts')
                ->insert([
                    'user_id' => $post->userId,
                    'title' => $post->title,
                    'body' => $post->body,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
        }

        $this->info('Posts have been successfully fetched.');
    }
}
