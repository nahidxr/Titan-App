<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TitanController extends Controller
{
    public function index()
    {
    
        return view('admin.titan_live.index');

    }
}
