<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category\Resources\SubCategory as SubCategoryResources;

class SubCategoryController extends Controller
{
    public function index()
    {
        return SubCategory::all();
    }
    public function show($id)
    {
        //return response()->json(new SubCategoryResources($id), 200);
        return SubCategory::find($id);
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
