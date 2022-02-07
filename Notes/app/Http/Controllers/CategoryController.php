<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Status;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Get()
    {
        return response()->json(Category::all());
    }

    public function Add(Request $request)
    {
        $data =  $request->json()->all();
        $name = $data['category_name'];
        $category = new Category();
        $category->category_name = $name;
        $category->save();

        return response()->json($name);
    }

    public function Edit(Request $request , $id)
    {
        $data =  $request->json()->all();
        $name = $data['category_name'];
        $edit = Category::findOrFail($id);
        $edit->category_name =$name;
        $edit->save();
        return response()->json($edit);
    }

    public function Delete(Request $request , $id)
    {
        Category::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }


}
