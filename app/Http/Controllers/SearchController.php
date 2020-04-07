<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SearchController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'keyword' => 'required'
        ]);

        $series = Serie::search($request->input('keyword'))->get();
        return response()->json($series, 200);
    }
}
