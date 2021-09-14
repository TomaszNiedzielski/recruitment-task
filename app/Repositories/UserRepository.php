<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use App\Interfaces\UserInterface;
use DB;

class UserRepository implements UserInterface
{
    public function index() {
        $mostActiveUsers = DB::table('users')
            ->join('posts', function($join) {
                $join->on('posts.user_id', '=', 'users.id')
                ->where('posts.created_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')));
            })
            ->select('users.name', DB::raw('count(*) as postsAmount'))
            ->groupBy('users.name')
            ->orderBy('postsAmount', 'desc')
            ->take(10)
            ->get();

        return $mostActiveUsers;
    }
}