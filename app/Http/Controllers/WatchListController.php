<?php

namespace App\Http\Controllers;

use App\Serie;
use App\WatchList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchListController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function all() {
        $user = Auth::user();
        $watchlist = $user->watch_lists()->with('serie')->get();
        return response()->json($watchlist, 200);
    }

    public function get($slug) {
        $user = Auth::user();
        $series = Serie::published()->where('slug', $slug)->firstOrFail();
        $watch_list_item = $user->watch_lists()->where('serie_id', $series->id)->firstOrFail();
        return response()->json($watch_list_item, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $user = Auth::user();
        $series = Serie::published()->where('slug', $slug)->firstOrFail();
        $list_item = new WatchList(['serie_id' => $series->id]);
        $user->watch_lists()->save($list_item);
        return response()->json(['message' => 'Added to watchlist!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function show(WatchList $watchList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function edit(WatchList $watchList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WatchList $watchList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WatchList $watchList)
    {
        $user = Auth::user();
        if($user->id === $watchList->user_id) {
            $watchList->delete();
            return response()->json([], 200);
        }
        abort(401);
    }
}
