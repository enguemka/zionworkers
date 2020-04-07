@extends('layouts.front')

@section('title', 'Artworks')

@section('content')
    <div style="margin-top:67px;"></div>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12 pt-5">
                <h2>Artworks</h2>
                <p class="text-muted">
                    <small>We occasionally provide some artworks like wallpapers and special graphics for holiday seasons. We also make available through
                    this page other beautiful illustrations that we have throughout our social media accounts.</small>
                </p>
                <div class="row">
                    @foreach($artworks as $artwork)
                        <div class="col-md-3">
                            <div class="card" style="width: 14rem;">
                                <a href="/artworks/{{$artwork->id}}">
                                <img src="{{Illuminate\Support\Facades\Storage::url($artwork->thumbnail)}}" class="card-img-top" alt="Image Not Found">
                                <div class="card-body">
                                    <h5 class="card-title mb-0">{{$artwork->title}}</h5>
                                </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
