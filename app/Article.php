<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
/**
* The attributes that should be mutated to dates.
*
* @var array
*/
    protected $dates = ['deleted_at'];

    protected $fillable= [
        'title',
        'user_id',
        'description',
        'status'
    ];

    protected $table = 'articles';

    public function users()
    {
        return $this->belongsTo(User::class,'users');
    }
    public function like(User $user)
    {
//        $user = User::find($id);
        //find post
        $user->favorites()->toggle($this->find());
    }
    /**
     * Get the comments for the blog.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggables');
    }
}
