<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory() {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function addCategory(Request $request) {
        $category= Category::create([
            'name' => $request->name,
            'status' => $request->status
        ]);

        if($category) {
            return response()->json([
                'category' => $category
            ]);
        }
    }

    public function deleteCategory($id) {
        $category = Category::find($id)->delete();
        if($category) {
            return response()->json([
                'category' => $category
            ]);
        }
    }

    public function editCategory($id){
        $category = Category::find($id);
        if($category) {
            return response()->json([
                'category' => $category
            ]);
        }
    }

    public function updateCategory(Request $request,$id) {
        $category = Category::find($id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        if($category) {
            return response()->json([
                'category' => $category
            ]);
        }

        
    }
}
