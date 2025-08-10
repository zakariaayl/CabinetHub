<?php

namespace App\Http\Controllers;

use App\Models\document_Achat;
use Illuminate\Http\Request;

class DocumentAchatController extends Controller
{
    public function index() {
        $documents=document_Achat::all();
        return view('documents_achat.index',compact('documents'));
    }
    public function create() {
        $documents=document_Achat::all();
        return view('documents_achat.createDocument',compact('documents'));
    }
}
