<?php

namespace App\Http\Controllers;


use App\Articles;

use App\Http\Resources\Comentary as ComentaryResource;
use Illuminate\Http\Request;

class ComentaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Articles $article
     * @return \Illuminate\Http\Response
     */
    public function index(Articles $article)
    {
        return response ()->json(ComentaryResource::collection( $article->comentary),200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @param \App\Comentary $comentary
     * @return \Illuminate\Http\Response
     */

    public function show(Articles $article, Comentary $comentary)
    {
        $comentary = $article->comments()->where('id', $comentary->id)->firstOrFail();

        return response()->json(new CommentResource($comentary),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentary  $comentary
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentary $comentary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentary  $comentary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentary $comentary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentary  $comentary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentary $comentary)
    {
        //
    }
}
