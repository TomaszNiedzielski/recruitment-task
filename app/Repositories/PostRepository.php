<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use DB;

class PostRepository implements PostInterface
{
    public function updateAllPosts() {
        $posts = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'));

        foreach($posts as $post) {
            DB::table('posts')
                ->insert([
                    'user_id' => $post->userId,
                    'title' => $post->title,
                    'body' => $post->body,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
        }
    }

    public function index() {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'posts.title', 'posts.body')
            ->get();

        return $posts;
    }
}