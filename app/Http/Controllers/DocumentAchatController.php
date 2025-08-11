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
    public function edit($id) {
        if($id==1)
        return view('documents_achat.createDocument_Bon_commande');
    if($id==4)
        return view('documents_achat.createDocument_Facture');
    }
}
