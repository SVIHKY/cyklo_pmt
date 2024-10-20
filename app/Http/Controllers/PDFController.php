<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use PDF; // Import the PDF facade

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Sample data for the table
        $data = Rider::paginate(10);

        // Load the view and pass data
        $pdf = PDF::loadView('pdf.document', compact('data'));

        // Download the PDF
        return $pdf->download('document.pdf');
    }
}
