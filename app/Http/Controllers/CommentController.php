<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\Http\Resources\Comment as CommentResource;
use App\Mail\NewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {

     //   $article->comments($article->comments)->firstOrFail();
      //  return response()->json($article, 200);
       return response()->json(CommentResource::collection($article->comments), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @param \App\Comment $comment
     * @return void
     */
    public function show(Article $article, Comment $comment)
    {
        $comment = $article->comments()->where('id', $comment->id)->firstOrFail();
        return response()->json($comment, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Article $article)
    {
        $request->validate([
           'description' => 'required|string'
       ]);

        $comment = $article->comments()->save(new Comment($request->all()));
        Mail::to($article->user)->send(new NewComment($comment));
        return response()->json($comment, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        $this->authorize('update', $comment);
        $request->validate([
            'description' => 'required',
            //'commentary' => 'required',

        ],self::$messages);


        $comment->update($request->all());
        return response()->json($comment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comment)
    {
        //
    }
}
