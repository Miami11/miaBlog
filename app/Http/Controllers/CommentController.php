<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Tag;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $tags = $request->input('tag');

        $article = Comment::create(array_except($request->all(),'tag'));

        $article->tags()->attach($this->saveTag($tags));

        return back();
    }

    private function saveTag($tags)
    {
        $array = collect(explode("#",$tags));
        $filtered = $array->filter(function ($value, $key) {
            return $value != "";
        });
        $tags = [];
        foreach ($filtered->all() as $k)
        {
            $tags[] = Tag::firstOrCreate([
                'name' => $k]);

        }
        $tagId = array_pluck($tags,'id');

        return $tagId;

    }
}
