<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $table = 'gifts';

    protected $fillable = [
        'name',
        'path',
        'points',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'gift_user');
    }

}
