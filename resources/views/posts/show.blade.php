@extends('layouts.front')

@section('title', $post->title)

@section('content')
    <div style="margin-top:67px;"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('series')}}">Browse</a></li>
            <li class="breadcrumb-item"><a href="{{route('series.get', ['slug' => $post->serie->slug])}}">{{$post->serie->title}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Episode - {{$post->title}}</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4">
                <div class="sticky-top" style="top: 80px;">
                    <div class="card mb-3 mb-md-1">
                        <div class="card-body text-center">
                            Ads space.
                        </div>
                    </div>
                    <div class="card mb-2 d-none d-md-block">
                        <div class="card-header">
                            <h5><a href="{{route('series.get', ['slug' => $series->slug])}}">{{$series->title}}</a></h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0"><i class="fas fa-book"></i> {{$series->post_count}} posts</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0"><i class="fas fa-clock"></i> {{$series->read_time}} hrs</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($series->posts()->published()->orderBy('created_at', 'asc')->get() as $episode)
                                <nav-item :iteration="{{$loop->iteration}}" :post="{{$episode}}"
                                           :series="{{$series}}" :current="{{$post}}"></nav-item>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h1>{{$post->title}}</h1>
                {!! $post->content !!}
                <phone-navigator :next="{{$post->next()}}" :previous="{{$post->previous()}}" :series="{{$series}}"></phone-navigator>
            </div>
        </div>
    </div>
    <auth-locked></auth-locked>
@endsection
