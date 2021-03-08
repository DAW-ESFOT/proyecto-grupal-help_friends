<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\Category as CategoryResources;
use App\Http\Resources\CategoryCollection;


class CategoryController extends Controller
{


    public function index()
    {
        //return Category::all();
        return new CategoryCollection(Category::paginate(10));
    }
   // public function show($id)
//    {
//        return response()->json(new CategoryResources($id), 200);
//        //return Category::find($id);
//
//    }

    public function show(Category $category)
    {
        //$this->authorize('view', $category);
        //return new ArticleResource($article);
        //return response()->json(new CategoryResources\Resource(category),200);
        return response()->json(new CategoryResource($category),200);
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
