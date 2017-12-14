<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles;

        return view('welcome', compact('articles'));
    }
}
