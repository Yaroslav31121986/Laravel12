<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiTestController extends Controller
{
    public function index()
    {
        return response()->json('good');
    }
}
