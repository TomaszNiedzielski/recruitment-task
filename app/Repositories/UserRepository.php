<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use App\Interfaces\UserInterface;
use DB;

class UserRepository implements UserInterface
{
    public function updateUsers() {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = $response->object();

        foreach($users as $user) {
            DB::table('users')
                ->insert([
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'address_street' => $user->address->street,
                    'address_suite' => $user->address->suite,
                    'address_city' => $user->address->city,
                    'address_zipcode' => $user->address->zipcode,
                    'address_geo_lat' => $user->address->geo->lat,
                    'address_geo_lng' => $user->address->geo->lng,
                    'phone' => $user->phone,
                    'website' => $user->website,
                    'company_name' => $user->company->name,
                    'company_catch_phrase' => $user->company->catchPhrase,
                    'company_bs' => $user->company->bs,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
        }
    }

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