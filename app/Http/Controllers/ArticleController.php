<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        //return new ArticleResource(Articles::all());
        //return Articles::all();
        //return ArticleResource::collection(Articles::all());
        //Que devuelva directamente sin data
        //return response()->json(new ArticleCollection(Articles::all()), 200);

        //Verificar la paginacion con link al final
        return new ArticleCollection(Articles::paginate());

        //return  response()->json(ArticleResource::collection(Articles::all()), 200);
    }

    public function show(Articles $article)
    {
        //return new ArticleResource($article);
        return response()->json(new ArticleResource($article),200);
    }

    public function image(Articles $article){
        return response()->download(public_path(Storage::url($article->image)),$article->title);//en POSTMAN si quiere ver una imagen, tienes que descargar
    }
    // manejar el status de los articulos
    public function updateStatus(Request $request, Articles $article) {
        // validar el valor estados
        $status = $request->get('status');
        $article->status = $status;
        $article->save();

        return response()->json($article, 201);
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

    public function update(Request $request, Articles $article)
    {

        $article->update($request->all());
        return response()->json($article, 200);
    }

    public function delete(Request $request, Articles $article)
    {

        $article->delete();
        return response()->json(null,204);
    }
}
