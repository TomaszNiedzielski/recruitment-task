<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use App\Interfaces\PostInterface;
use DB;

class PostRepository implements PostInterface
{
    public function index() {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'posts.title', 'posts.body')
            ->get();

        return $posts;
    }
}