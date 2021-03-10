<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Category\Resources\Category as CategoryResources;
use Illuminate\Support\Facades\DB;

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
    public function run ($id)
    {

        $subcategory=DB::table('sub_categories')->select()->where('categories_id','=',$id)->get();
        return response()->json($subcategory);

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
