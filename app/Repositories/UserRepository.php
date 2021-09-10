<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use DB;

class UserRepository implements UserInterface
{
    public function updateAllUsers() {
        $users = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/users'));

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
}