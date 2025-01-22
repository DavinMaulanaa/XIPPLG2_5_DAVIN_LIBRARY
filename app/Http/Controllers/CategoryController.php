<?php

namespace App\Http\Controllers;
use App\models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
    
        return response()->json([
            'status' => 200,
            'message' => 'Categories retrieved succesfully,',
            'data' => $categories 
        ], 200);
    } 

    public function store(Request $request)
    {
        $request->validate(['name'=> 'required|string|max:225']);

        $categories = Category::all();
    
        return response()->json([
            'status' => 201,
            'message' => 'Categories retrieved succesfully,',
            'data' => $category
        ], 201);
    } 
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category){
        return response()->json([
            'status' => 400,
            'message' => 'Categories retrieved succesfully,',
            'data' => null
        ], 200);
    } 

    return response()->json([
        'status'=> 200,
        'message' => 'Category retrieved sucessfully.',
        'data' => $category,
    ],200);
}

public function update(Request $request, $id)
{
    $category = Category::find($id);

    if (!$category){
    return response()->json([
        'status' => 404,
        'message' => 'Categories retrieved succesfully,',
        'data' => null
    ], 404);
} 
$request->validate(['name' => 'string|max:225']);
$category->update($request->all());

return response()->json([
    'status'=> 200,
    'message' => 'Category retrieved sucessfully.',
    'data' => $category,
],200);
}
public function destroy($id)
{
    $category = Category::find($id);
    if (!$category){
        return response()->json([
            'status' => 404,
            'message' => 'Categories retrieved succesfully,',
            'data' => null
        ], 404);
    } 


$category->delete();

return response()->json([
    'status'=>200,
    'message' => 'Category deleted successfully.',
    'data' => null
],200);
}
}




