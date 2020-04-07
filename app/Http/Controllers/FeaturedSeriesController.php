<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedSerie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FeaturedSeriesController extends Controller
{
    public function index() {
        $current_date_time = Carbon::now()->toDateTimeString();
        $featured_series = FeaturedSerie::where('start_at', '<=', $current_date_time)
                                        ->where('end_at', '>=', $current_date_time)
                                        ->with('serie')
                                        ->get();
        foreach ($featured_series as $featured) {
            $featured->serie->post_count = $featured->serie->post_count;
            $featured->serie->thumbnail = Storage::url($featured->serie->thumbnail);
        }
        return response()->json($featured_series, 201);
    }
}
