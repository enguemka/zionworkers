@extends('layouts.front')

@section('title', $news->title)

@section('content')
    <div style="margin-top:67px;"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('news')}}">News</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row py-4 justify-content-center">
            <div class="col-md-8">
                <h3>{{$news->title}}</h3>
                <p><small class="text-muted">{{\Carbon\Carbon::createFromTimeStamp(strtotime($news->published_at))->diffForHumans()}}</small></p>
                {!! $news->content !!}
            </div>
        </div>
    </div>
@endsection
