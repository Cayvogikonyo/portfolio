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

    /**
     * Portofolio
     */
    public function portfolio(){
        return $this->belongsTo(Portofolio::class, 'portofolio_id');
    }
    
    /**
     * Client
     */
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
        
    /**
     * Category
     */
    public function category(){
        return $this->belongsTo(WorkCategory::class, 'work_category_id');
    }
    
    /**
     * User
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
