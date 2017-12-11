<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Auth;

class FavoriteController extends Controller
{
    public function __invoke(Request $request) {
        $user = User::find(Auth::user()->id);
        $article = Article::find($request->input('article_id'));
        $user->favorites()->toggle($article);

        return back();
    }

}
