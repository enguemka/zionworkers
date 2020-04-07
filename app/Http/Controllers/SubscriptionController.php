<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->only('store');
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
        $subscriptions = $user->subscriptions()->with('serie')->get();
        return response()->json($subscriptions, 200);
    }

    public function get($slug) {
        $user = Auth::user();
        $series = Serie::published()->where('slug', $slug)->firstOrFail();
        $subscription = $user->subscriptions()->where('serie_id', $series->id)->firstOrFail();
        return response()->json($subscription, 200);
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
        $sub = new Subscription(['serie_id' => $series->id]);
        $user->subscriptions()->save($sub);
        return response()->json(['message' => 'Subscribed!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $user = Auth::user();
        if($user->id === $subscription->user_id) {
            $subscription->delete();
            return response()->json([], 200);
        }
        abort(401);
    }
}
