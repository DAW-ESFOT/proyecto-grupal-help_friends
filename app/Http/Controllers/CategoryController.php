<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Category\Resources\Category as CategoryResources;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }
    public function show($id)
    {
        //return response()->json(new CategoryResources($id), 200);
        return Category::find($id);
    }
    public function store(Request $request)
    {
        return Category::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }
    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return 204;
    }

}
