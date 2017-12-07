<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;

class FavoriteController extends Controller
{
    public function like(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $article = Article::find($request->input('article_id'));
        $user->favorites()->toggle($article);

        return back();
    }
}
