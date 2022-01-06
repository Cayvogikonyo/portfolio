<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
        	'name' => 'Demo User',
        	'email' => 'demouser@latasystems.com',
            'site_config_id' => 1,
            'password' =>Hash::make("admin2020"),
        ]);
    }
}
