<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
    }

    public function show(Image $image)
    {
        return $image;
    }

    public function image(Image $image)
    {
        return response()->download(public_path(Storage::url($image->image)), $image->name);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|dimensions:min_width=200,min_height:200',
        ]);
        $image = new Image($request->all());
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
