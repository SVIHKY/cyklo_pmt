<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use PDF; // Import the PDF facade

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Sample data for the table
        $data = Note::all();

        // Load the view and pass data
        $pdf = PDF::loadView('pdf.document', compact('data'));

        // Download the PDF
        return $pdf->download('document.pdf');
    }
}
