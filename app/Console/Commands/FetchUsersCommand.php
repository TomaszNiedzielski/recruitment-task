<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use DB;

class FetchUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch users from api.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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

        $this->info('Users have been successfully fetched.');
    }
}
