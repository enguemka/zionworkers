@extends('layouts.front')

@section('title', $series->title)

@section('metas')
    <meta property="og:url"           content="http://www.zionworkers.com/series/{{$series->slug}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$series->title}}" />
    <meta property="og:description"   content="{{$series->lead}}" />
    <meta property="og:image"         content="http://www.zionworkers.com{{Illuminate\Support\Facades\Storage::url($series->thumbnail)}}" />
@endsection

@section('content')
    <div style="margin-top:67px;"></div>
    <div class="jumbotron jumbotron-fluid text-white mb-0" style="background-image: linear-gradient(to right top, #663695, #7f3497, #963297, #ad2e95, #c22b91);">
        <div class="container">
            <div class="row">
                <div class="col-md-2 d-none d-md-block">
                    <img src="{{Illuminate\Support\Facades\Storage::url($series->thumbnail)}}" class="img-fluid shadow-sm" alt="Responsive image">
                </div>
                <div class="col-md-10">
                    <h1>{{$series->title}}</h1>
                    <p>{{$series->lead}}</p>
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <p><i class="fas fa-book"></i> {{$series->post_count}} posts</p>
                        </div>
                        <div class="col-6 col-md-4">
                            <p><i class="fas fa-clock"></i> {{$series->read_time}} hrs</p>
                        </div>
                    </div>

                    <a href="{{route('series.episode', ['slug' => $series->slug, 'id' => $series->firstEpisode() ? $series->firstEpisode()->id : '#' ])}}" class="btn
                    btn-light btn-lg">Start Series</a>
                    <watchlist-btn :series="{{$series}}"></watchlist-btn>
                    <subscribe-btn :series="{{$series}}"></subscribe-btn>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-none d-md-block">
        <div class="row bg-light">
            <div class="col-md-2">
                <a class="btn" href="{{route('series')}}"><span class="text-muted"><i class="fas fa-chevron-circle-left"></i> BACK TO MAIN</span></a>
            </div>
            <div class="col-md-8 pt-2 border-left">
                <p><span class="text-muted">Latest Post:</span>
                    <a href="{{route('series.episode', ['slug' => $series->slug, 'id' => $series->latestEpisode() ? $series->latestEpisode()->id : '#' ])}}"
                       class="btn btn-link btn-sm {{ (!Auth::check() && $series->latestEpisode()->auth_locked) ? 'disabled' : '' }}"><b>{{
                    $series->latestEpisode() ? $series->latestEpisode()->title : '' }}</b></a></p>
            </div>
            <div class="col-md-2 pt-2 border-left">
                <p>
                    <a href="https://www.facebook.com/sharer.php?u=http://zionworkers.com/series/{{$series->slug}}&title={{urlencode($series->title)}}"
                       class="m-2"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="https://twitter.com/intent/tweet?text={{urlencode('I am reading "' . $series->title . '" at @zionworkers. http://zionworkers.com/series/' . $series->slug)
                    }}" class="m-2"><i class="fab fa-twitter fa-lg"></i></a>
                </p>
            </div>
        </div>
    </div>
    <div class="container py-4">
        @foreach($series->posts()->published()->orderBy('created_at', 'asc')->get() as $post)
            <post-item :iteration="{{$loop->iteration}}" :post="{{$post}}"
                       :series="{{$series}}"></post-item>
        @endforeach
    </div>
    <auth-locked></auth-locked>
@endsection
