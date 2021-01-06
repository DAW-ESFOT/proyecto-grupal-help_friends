<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Comentary;

class ComentaryController extends Controller
{
    public function index()
    {
        return Comentary::all();
    }
    public function show($id)
    {
        return Comentary::find($id);
    }
    public function store(Request $request)
    {
        return Comentary::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $comentary = Comentary::findOrFail($id);
        $comentary->update($request->all());
        return $comentary;
    }
    public function delete(Request $request, $id)
    {
        $comentary = Comentary::findOrFail($id);
        $comentary->delete();
        return 204;
    }
}

