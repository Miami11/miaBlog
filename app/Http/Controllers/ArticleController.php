<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Gate;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        return redirect()->route('articles.index', $article->user_id);
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

    public function index(Article $article, User $user)
    {
        $articles = $user->articles()->paginate(5);

        return view('articles.index', compact('articles','user'));
    }

    public function welcome(Request $request)
    {
//        $this->validate($request, [
//            'month' => 'date',
//            'year' => 'date',
//        ]);
        //Foreign key
        $articles = Article::with('users:id,name')->latest()->filter(request(['month', 'year']))
            ->get();
//        dd($articles);
        if (empty($articles)){
            return redirect()->route('articles.welcome');
        }

        return view('welcome', compact('articles','user'));
    }

    public function show(Article $article)
    {
        $article->increment('popular');
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if (Gate::denies('update', $article)) {
            abort(403, 'Nope');
        }
        $tags = collect(array_pluck($article->tags()->get(), 'name'))->map(function ($item, $key) {
            return "#" . $item;
        })->implode("");

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        if (Auth::user()->cannot('update', $article)) {
            return redirect()->route('articles.index', $article->user_id);
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

        return redirect()->route('articles.index', $article->user_id);
    }
}
