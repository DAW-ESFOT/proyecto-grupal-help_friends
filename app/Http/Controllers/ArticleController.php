<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        return Articles::all();
    }

    public function show($id)
    {
        return Articles::find($id);
    }

    public function image(Articles $article){
        return response()->download(public_path(Storage::url($article->image)),$article->title);//en POSTMAN si quiere ver una imagen, tienes que descargar
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string:articles|max:255',
            'image' => 'required|image|dimensions:min_width=200,min_height:200',
        ]);
        //$article = Articles::create($request->all());
        $article=new Articles(($request->all()));
        $path = $request->image->store('public/articles');//este metodo devuelve la ruta

        $article->image=$path;
        $article->save();
        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        $article = Articles::findOrFail($id);
        $article->update($request->all());
        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Articles::findOrFail($id);
        $article->delete();
        return 204;
    }
}
