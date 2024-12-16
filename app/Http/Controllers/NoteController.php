<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    // Mostrar una lista de las notas
    public function index(Request $request)
    {
        $query = $request->input('query');
        $notes = $query ? Note::where('title', 'like', "%{$query}%")->get() : Note::all();
        return view('notes.index', compact('notes', 'query'));
    }

    // Mostrar el formulario para crear una nueva nota
    public function create()
    {
        return view('notes.create');
    }

    // Almacenar una nueva nota en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;

        if ($request->hasFile('image')) {
            $note->image = $request->file('image')->store('images', 'public');
        }

        $note->save();

        return redirect()->route('notes.index')->with('success', 'Nota creada con éxito.');
    }

    // Mostrar una nota específica
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    // Mostrar el formulario para editar una nota existente
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    // Actualizar una nota existente en la base de datos
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $note->title = $request->title;
        $note->content = $request->content;

        if ($request->hasFile('image')) {
            $note->image = $request->file('image')->store('images', 'public');
        }

        $note->save();

        return redirect()->route('notes.index')->with('success', 'Nota actualizada con éxito.');
    }

    // Eliminar una nota existente de la base de datos
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Nota eliminada con éxito.');
    }

    // Generar un PDF de una nota específica
    public function generatePDF($id)
    {
        $note = Note::findOrFail($id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('notes.pdf', compact('note'));
        return $pdf->download('note.pdf');
    }
}
