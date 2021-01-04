<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()     {
        return Articles::all();
    }
    public function show($id)     {
        return Articles::find($id);
    }
    public function store(Request $request)     {
        return Articles::create($request->all());
    }
    public function update(Request $request, $id)     {
        $article = Articles::findOrFail($id);
        $article->update($request->all());
        return $article;
    }
    public function delete(Request $request, $id)     {
        $article = Articles::findOrFail($id);
        $article->delete();
        return 204;
    }
}
