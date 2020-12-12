<?php

namespace App\Http\Controllers;

class CoverageController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'fails test',
        ]);
    }
}
