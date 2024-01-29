<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShablonController extends Controller
{
    public function index() 
    { 
        $monthNumber = date('n');
        $rndAge = rand(1,40);
        return view('shablon', compact('monthNumber', 'rndAge'));
    }
}
