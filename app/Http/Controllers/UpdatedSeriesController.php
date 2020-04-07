<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdatedSeriesController extends Controller
{
    public function index() {
        $series = DB::table('series')
                    ->leftJoin('posts', 'series.id', '=', 'posts.serie_id')
                    ->where('series.published_at', '!=', NULL)
                    ->where('posts.published_at', '!=', NULL)
                    ->select(DB::raw('series.*, MAX(posts.published_at) as latest_update, COUNT(DISTINCT posts.id) as post_count'))
                    ->groupBy('series.id')
                    ->orderBy('latest_update', 'desc')
                    ->limit(3)
                    ->get();

        foreach($series as $item) {
            $item->thumbnail = Storage::url($item->thumbnail);
        }

        return response()->json($series, 201);
    }
}
