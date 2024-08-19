<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Alert;

class NotesController extends Controller
{
    public function index(){
        $notes = Note::orderBy('id', 'asc')->get();
        return view('notes.index', compact('notes'));
    }

    public function create(){
        return view('notes.create');
    }
    public function store(Request $request){
        $request->validate([
           'title' =>'required',
            'message' => 'required'
        ]);

        //validación de la nota
        $nota_exist = Note::where('title', $request->title)->first();

        if ($nota_exist){
            Alert::error('La nota ya existe');
            return back();
        }

        $note_save = new Note ();
        $note_save->title=$request->title;
        $note_save->message=$request->message;
        $note_save->save();

        Alert::success('La nota ha sido creada correctamente');

        return redirect()->route('notes.index');

    }

    public  function edit ($id){
        $note = Note::where('id',$id)->first();

        if (!$note){
            Alert::error('La nota no existe');
            return redirect()->route('notes.index');
        }

       return view('notes.edit',compact('note'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' =>'required',
            'message' => 'required'
        ]);

        $nota_exist = Note::where('id',$id)->first();

        if (!$nota_exist){
            Alert::error('La nota no existe');
            return redirect()->route('notes.index');
        }

        //Si el título de la nota existe en otras notas
        $nota_exist_title = Note::where('title', $request->title)
                    ->where('id', '!=', $id)
                    ->first();

        if ($nota_exist_title){
            Alert::error('El título ya existe en otras notas');
            return back();
        }

        //Actualización
        $nota_exist-> title=$request->title;
        $nota_exist-> message=$request->message;
        $nota_exist->save();

        Alert::success('La nota ha sido actualizada correctamente');

        return redirect()->route('notes.index');

    }

    public function delete($id){
        $nota_exist = Note::where('id',$id)->first();

        if (!$nota_exist){
            Alert::error('La nota no existe');
            return redirect()->route('notes.index');
        }

        Note::find($id)->delete();
        return redirect()->route('notes.index');

    }
}
