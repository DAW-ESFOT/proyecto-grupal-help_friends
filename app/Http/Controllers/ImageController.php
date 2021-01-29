<?php

namespace App\Http\Controllers;

use App\Article;
use App\Image;
use App\Http\Resources\Image as ImageResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
    }

    public function bounch(Article $article)
    {
        return response()->json(ImageResource::collection($article->image),200);
    }

    public function show(Article $article, Image $image)
    {
        $image = $article->image()->where('id', $image->id)->firstOrFail();
        return response()->json(new ImageResource($image), 200);
    }

    public function store(Request $request,Article $article)
    {
        $validatedData = $request->validate([

            'image' => 'required|image|dimensions:min_width=200,min_height:200',
        ]);

        $image = $article ->image()->save(new Image($request->all()));
        $path = $request->image->store('public/images');
        $image->image = $path;
        $image->save();
        return response()->json($image, 201);
    }

    public function update(Request $request, Image $image)
    {
        $image->update($request->all());
        return response()->json($image, 200);
    }

    public function delete(Image $image)
    {
        $image->delete();
        return response()->json(null, 204);
    }
}
