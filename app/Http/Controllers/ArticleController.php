<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\Storage;

class ArticleController extends Controller
{

//    private static $rules=[
//        'name' => 'required|string|unique:articles|max:100',
//        'description' => 'required',
//        'commentary' => 'required',
//    ];

    private static $messages=[
        'required'=>'El campo :attribute es obligatorio.',
        'name.required'=>'El nombre no es valido',
        'description.required'=>'La descricion no es valido',
        'commentary.required'=>'El comentario no es valido',
    ];


    public function index()
    {
        //return new ArticleResource(Articles::all());
        //return Articles::all();
        //return ArticleResource::collection(Articles::all());
        //Que devuelva directamente sin data
        //return response()->json(new ArticleCollection(Articles::all()), 200);

        //Verificar la paginacion con link al final

        return new ArticleCollection(Article::paginate(10));

        //return  response()->json(ArticleResource::collection(Articles::all()), 200);
    }

    public function show(Article $article)
    {
        $this->authorize('view', $article);
        //return new ArticleResource($article);
        return response()->json(new ArticleResource($article),200);
    }


    // manejar el status de los articulos
    public function updateStatus(Request $request, Article $article) {
        // validar el valor estados
        $status = $request->get('status');
        $article->status = $status;
        $article->save();

        return response()->json($article, 201);
    }



    public function store(Request $request)
    {

        $this->authorize('create', Article::class);

        $request->validate([
            'name' => 'required|unique:articles|string|max:100',
            'description' => 'required',
            'subCategory_id' => 'required',
            //'commentary' => 'required',

        ],self::$messages);



        $article = Article::create($request->all());

        return response()->json(new ArticleResource($article), 201);
    }



    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        $request->validate([
            'name' => 'required|unique:articles|string|max:100',
            'description' => 'required',
            //'commentary' => 'required',

        ],self::$messages);


        $article->update($request->all());
        return response()->json($article, 200);
    }

    public function delete(Request $request, Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return response()->json(null,204);
    }
}
