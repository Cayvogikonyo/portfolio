<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Work::create([
        	'user_id' => 1,
        	'portofolio_id' => 1,
        	'title' =>"Project Z",
        	'slug' => 'project_z',
        	'role' => 'Manager',
        	'excerpt' => 'People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...',
            'description' => '
                People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...
                People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...
            ',
        ]);
        \App\Models\Work::create([
        	'user_id' => 1,
        	'portofolio_id' => 1,
        	'title' =>"Project X",
        	'slug' => 'project_X',
        	'role' => 'Manager',
        	'excerpt' => 'People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...',
            'description' => '
                People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...
                People from many different development backgrounds are learning React Native. You may have experience with a range of technologies, from web to Android to iOS and more. We try to write for developers from all backgrounds. Sometimes we provide explanations specific to one platform or another...
            ',
        ]);
    }
}
