<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Import the PDF facade

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Sample data for the table
        $data = [
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['name' => 'Sam Green', 'email' => 'sam@example.com'],
        ];

        // Load the view and pass data
        $pdf = PDF::loadView('pdf.document', compact('data'));

        // Download the PDF
        return $pdf->download('document.pdf');
    }
}

