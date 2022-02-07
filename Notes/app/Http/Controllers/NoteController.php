<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Nette\Utils\DateTime;

class NoteController extends Controller
{
    public function Get()
    {
        return response()->json(Note::all());
    }

    public function Add(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'text' => 'required|string',
            'send_date' => 'nullable|date_format:d/m/Y',
            'priority_id' => 'required|integer',
        ]);



       $dt = new DateTime();
       $nowDate = $dt->format('d/m/Y H:i:s');

        $Note = Note::create($data);
        $Note->now_date =$nowDate;
        $Note->save();

        return response()->json($Note);
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
