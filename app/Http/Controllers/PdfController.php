<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function download($id)
    {
        // Busca la nota por su ID
        $note = Note::findOrFail($id);

        // Genera el PDF con la vista 'pdf.nota'
        $pdf = Pdf::loadView('pdf.note', compact('note'));

        // Descarga el archivo PDF
        return $pdf->download('note-' . $nota->id . '.pdf');
    }
}