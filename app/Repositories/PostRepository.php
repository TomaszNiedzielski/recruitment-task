<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;

class PostRepository implements PostInterface
{
    public function updateAllPosts() {
        $posts = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'));

        foreach($posts as $post) {
            DB::table('posts')
                ->updateOrInsert(
                    ['id' => $post->id],
                    [
                        'user_id' => $post->userId,
                        'title' => $post->title,
                        'body' => $post->body,
                        'updated_at' => date('Y-m-d H:i:s')
                    ],
                );
        }
    }
}