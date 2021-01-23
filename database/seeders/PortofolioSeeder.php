<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Portofolio::create([
        	'title' => config('app.name'),
        	'name' => 'John Doe',
        	'bio' => 'People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...',
        ]);
    }
}
