<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }


    public function index()
    {
        return view('/vadmin');
    }

}
