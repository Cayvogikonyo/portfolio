<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Seeder;

class UpdatePortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolio  = Portofolio::where('slug', null)->get();

        foreach($portfolio as $item){
            $item->slug = substr(str_shuffle(MD5(microtime())), 0, 10);
            $item->update();
        }
    }
}
