<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tags' => 'array',
    ];

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

    /**
     * Override property during saving
     */
    // public function getTagAttribute($value)
    // {
    //     return json_decode($value);
    // }

    /**
     * Override property during query
     */
    // public function setTagsAttribute($value)
    // {
        // if(is_array($value))
        //  $value = json_encode($value);

        // $this->attributes['tags'] = strtolower($value);
    // }


}
