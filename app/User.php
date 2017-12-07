<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Article;

class User extends Authenticatable
{
    use Notifiable;

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favorites()
    {
        return $this->belongsToMany(Article::class,'favorites');
    }
    /**
     * Get the Article for the User.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function hasFavorited($userId,$articleId)
    {
        $this->where('user_id','=', $userId)->where('article_id','=', $articleId)->first();
    }
}
