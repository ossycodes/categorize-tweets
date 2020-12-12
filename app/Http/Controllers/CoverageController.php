<?php

namespace App\Http\Controllers;

class CoverageController extends Controller
{
    public function index()
    {
        $array = array(
            "name" => "key"
        );
        
        return response()->json([
            'status' => 'ok',
        ]);
    }
}
