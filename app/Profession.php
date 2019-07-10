<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Profession extends Model
{
    use Searchable;
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
