<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeriesController extends Controller
{
    public function all() {
        $series = Serie::published()->orderBy('created_at', 'desc')->get();
        foreach ($series as $row) {
            $row->post_count = $row->post_count;
            $row->thumbnail = Storage::url($row->thumbnail);
        }
        return response()->json($series, 201);
    }

    public function get($slug) {
        $series = Serie::published()->where('slug', $slug)->firstOrFail();
        return view('series.show', ['series' => $series]);
    }
}
