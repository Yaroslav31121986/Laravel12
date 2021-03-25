<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Сalculator extends Controller
{
    public function calculator()
    {
        return view('calculator.calculator');
    }

    public function result(Request $request)
    {
        $result = ($request->thickness * $request->area) * $request->dzen;

        return view('calculator.calculator', ['result' => $result]);
    }

    public function calc()
    {
        return view('calculator.calc');
    }
}
