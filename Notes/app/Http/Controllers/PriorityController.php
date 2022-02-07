<?php

namespace App\Http\Controllers;

use App\Models\Priority;

use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function Get()
    {
        return response()->json(Priority::all());
    }

    public function Add(Request $request)
    {
        $data =  $request->json()->all();
        $name = $data['name'];
        $priority = new Priority();
        $priority->name = $name;
        $priority->save();

        return response()->json($name);
    }

    public function Edit(Request $request , $id)
    {
        $data =  $request->json()->all();
        $name = $data['name'];
        $edit = Priority::findOrFail($id);
        $edit->name =$name;
        $edit->save();
        return response()->json($edit);
    }

    public function Delete(Request $request , $id)
    {
        Priority::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }


}
