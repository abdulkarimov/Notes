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
            'send_date' => 'nullable|date_format:Y-m-d H:i',
            'priority_id' => 'required|integer',
        ]);

        $dt = new DateTime();
        $nowDate = $dt->format('Y-m-d H:i');

        if($nowDate < $data['send_date'])
        {
            $Note = Note::create($data);
            $Note->now_date =$nowDate;
            $Note->save();
            return response()->json($Note);
        }
        else return "не верная дата";

    }

    public function Edit(Request $request , $id)
    {
        $edit = Note::findOrFail($id);
        $data = $request->validate([
            'name' => 'nullable|string',
            'text' => 'nullable|string',
            'send_date' => 'nullable|date_format:d/m/Y',
            'priority_id' => 'nullable|integer',
        ]);

        $edit->update($data);
        return response()->json($edit);
    }

    public function Delete(Request $request , $id)
    {
        Note::findOrFail($id)->delete();
        return response()->json('Deleted', 200);
    }


}
