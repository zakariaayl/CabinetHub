<?php

namespace App\Http\Controllers;

use App\Models\ressource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function showPage() {
       $resources=ressource::all();
       return view("rhview",["rec"=>$resources]);
    }
    public function create(Request $request) {
        return "heyeyy";
    }
}
