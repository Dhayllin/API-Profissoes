<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
    
    /**
     * The users that belong to the profession.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
