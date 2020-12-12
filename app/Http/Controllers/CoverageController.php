<?php

namespace App\Http\Controllers;

class CoverageController extends Controller
{
    public function index()
    {
        $array = [
            "name" => "key",
        ];
        
        return response()->json([
            'status' => 'ok',
        ]);
    }
}
