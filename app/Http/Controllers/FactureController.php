<?php
namespace App\Http\Controllers;


use App\Models\ressource;
use thiagoalessio\TesseractOCR\TesseractOCR;

class FactureController extends Controller
{
    public function extract($id)
    {
        $resource = ressource::findOrFail($id);



$text = (new TesseractOCR(public_path($resource->facture)))
            ->executable('C:\Program Files\Tesseract-OCR\tesseract.exe')
            ->lang('fra', 'eng')
            ->run();


        return view('resource.extracted', compact('text'));
    }
}
