<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    /**
     * Get a random header if missing
     */
    public function randomHeader(){
        $arr = ['building.jpg', 'gears.png', 'imac.png', 'implement.jpg', 'industry.jpg', 'manager.jpg', 'success.jpg', 'project.jpg'];
        return $arr[array_rand($arr, 1)];
    }
}
