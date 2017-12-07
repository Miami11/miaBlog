<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['name'];
    /**
     * Get all of the posts that are assigned this tag.
     */
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'taggables');
    }
    public function comments()
    {
        return $this->morphedByMany('App\Comment', 'taggables');
    }
}
