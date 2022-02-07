<?php

namespace App\Http\Controllers;

use App\Models\Status;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function Get()
    {
        return response()->json(Status::all());
    }

    public function Add(Request $request)
    {
        $data =  $request->json()->all();
        $name = $data['status_name'];
        $status = new Status();
        $status->status_name = $name;
        $status->save();

        return response()->json($name);
    }

    public function Edit(Request $request , $id)
    {
        $data =  $request->json()->all();
        $name = $data['status_name'];
        $edit = Status::findOrFail($id);
        $edit->status_name =$name;
        $edit->save();
        return response()->json($edit);
    }

    public function Delete(Request $request , $id)
    {
        Status::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }


}
