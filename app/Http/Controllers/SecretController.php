<?php

namespace App\Http\Controllers;

use App\Secret;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function index()
    {
//        return Secret::all();

        return view('layouts.apptest');
    }

    public function info()
    {
        return json_encode('Material ');
    }

    public function send(Request $request)
    {
        return json_encode('Material ');
    }
}
