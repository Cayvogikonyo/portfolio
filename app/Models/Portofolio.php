<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    /**
     * Portofolio skills
     */
    public function skills()
    {
        return $this->hasMany(\App\Models\Skill::class);
    }

    /**
     * Portofolio experiences
     */
    public function experiences()
    {
        return $this->hasMany(\App\Models\Experience::class);
    }

    /**
     * Portofolio services
     */
    public function services()
    {
        return $this->hasMany(\App\Models\Service::class);
    }

    /**
     * Portofolio clients
     */
    public function clients()
    {
        return $this->hasMany(\App\Models\Client::class);
    }

    /**
     * Portofolio works
     */
    public function works()
    {
        return $this->hasMany(\App\Models\Work::class);
    }

}
