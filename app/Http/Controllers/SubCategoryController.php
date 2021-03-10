<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SubCategory as SubCategoryResources;
use App\Http\Resources\SubCategoryCollection;

use App\SubCategory;
use App\Article;


class SubCategoryController extends Controller
{
    public function index()
    {
        //return new SubCategoryResources(SubCategory::paginate(10));
       // return SubCategory::all();
     //   return response()->json(new SubCategoryResources(SubCategory::all()), 200);
        //return  SubCategoryResources::collection(SubCategory::all());
        return new SubCategoryCollection(SubCategory::paginate(10));
    }
    public function show(SubCategory $id)
    {
       //return SubCategory::find($id);
        return response()->json(SubCategoryResources::collection($id->SubCategory), 200);
    }
    public function run ($id)
    {

        $article=DB::table('articles')->select()->where('subcategory_id','=',$id)->get();
        return response()->json($article);

    }
    public function store(Request $request)
    {
        return SubCategory::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->all());
        return $subcategory;
    }
    public function delete(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return 204;
    }
}
