<?php

namespace App;

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Article extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'status'
    ];

    protected $table = 'articles';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function scopeLatest($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function scopeFilter($query, $filters)
    {
        if ($filters == []) {
            return $query->orderBy('created_at', 'desc');
        }

        if (date('F') == $filters['month']) {
            //turn string to number
            $month = Carbon::parse($filters['month'])->month;
             $query->whereMonth('created_at', $month);
        }else {
            $query->whereMonth('created_at', Carbon::now()->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }


    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();
    }

}
