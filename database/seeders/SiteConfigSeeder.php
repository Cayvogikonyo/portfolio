<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\SiteConfig;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteConfig::create([
        	'title' => config('app.name'),
        	'subtitle' => 'Where stories come alive',
        	'name' => 'John Doe',
        	'bio' => 'People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...',
        ]);

    }
}
