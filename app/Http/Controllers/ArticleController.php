<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Gate;
use Auth;
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
        $data = $request->all();
        $tags = array_pull($data, 'tag');

        $article = Article::create($data);

        $article->tags()->attach($this->saveTag($tags));

        return redirect()->route('articles.index',$article->user_id);
    }

    private function saveTag($tags)
    {
        $array = collect(explode("#", $tags));
        $filtered = $array->filter(function ($value, $key) {
            return $value != "";
        });
        $tags = [];
        foreach ($filtered->all() as $k) {
            $tags[] = Tag::firstOrCreate([
                'name' => $k
            ]);
        }
        $tagId = array_pluck($tags, 'id');

        return $tagId;
    }

    public function index(Article $article,$id)
    {
        $articles = $article->where('user_id','=', $id)->paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function welcome()
    {
        $articles = Article::paginate(5);

        return view('welcome', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if (Gate::denies('update', $article)) {
            abort(403,'Nope');
        }
        $tags = collect(array_pluck($article->tags()->get(), 'name'))->map(function ($item, $key) {
            return "#" . $item;
        })->implode("");

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        if (Auth::user()->cannot('update',$article)){
            return redirect()->route('articles.index',$article->user_id);
        }
        $data = $request->all();

        $tags = array_pull($data, 'tag');

        $article->update($data);

        $article->tags()->sync($this->saveTag($tags));

        return redirect()->route('articles.show', $article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index',$article->user_id);
    }
}
