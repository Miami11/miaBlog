<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $tags = $request->get('tag');

       $article = Article::create(array_except($request->all(),'tag'));

       $article->tags()->attach($this->saveTag($tags));

        return redirect()->route('articles.index');
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

    public function index()
    {
        $articles = Article::paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return redirect()->route('articles.show', $article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
