@extends('layouts.front')

@section('title', 'Artwork - ' . $artwork->title)

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12 pt-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{Illuminate\Support\Facades\Storage::url($artwork->thumbnail)}}" alt="Image Not Found" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <h2>{{$artwork->title}}</h2>
                        <p>{{$artwork->description}}</p>
                        @foreach($artwork->images as $image)
                            <a class="btn btn-sm btn-outline-primary" href="/artworks/{{$artwork->id}}/images/{{$image->id}}"><i class="fas fa-download"></i> 
                                {{$image->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
