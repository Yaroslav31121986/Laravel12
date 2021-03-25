<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function table()
    {
        $column = [
            125,
            150,
            160,
            180,
            200,
            225,
            250,
            280,
            315,
            355,
            400,
            450,
            500,
            560,
            630,
            710,
            800,
            900,
            1000,
            1250,
        ];

        $row = [
            100,
            125,
            150,
            160,
            180,
            200,
            250,
            280,
            315,
            355,
            400,
            450,
            500,
            560,
            630,
            710,
            800,
            900,
            1000,
            1250
        ];

        return view('table.table', ['columns' => $column, 'rows' => $row]);
    }
}
