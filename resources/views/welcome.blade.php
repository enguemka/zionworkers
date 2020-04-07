@extends('layouts.front')

@section('title', 'Home')

@section('content')
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/home/zw-site-bg-01.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/home/zw-site-bg-sm-01.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay card-img-overlay-center">
            <div class="row mt-5 mt-sm-0">
                <div class="col-md-11 offset-md-1 text-dark">
                    <h1 class="display-3 mt-4">Insightful revelations <br>for believers</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-1 text-dark">
                    <p class="lead">
                        Challenge your comfort zone. Seek to know God in the hills and the valleys. Push for more with grace-filled and practical series.
                    </p>
                    <a href="{{route('series')}}" class="btn btn-primary btn-lg"><i class="fas fa-layer-group"></i> Browse Series</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 text-center">
                <i class="fas fa-poll-h fa-3x"></i>
                <h4>Series</h4>
                <p><small>Read multiple insightful series. Boost up your faith and find refreshment in the
                    journey of life.</small></p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-palette fa-3x"></i>
                <h4>Artworks</h4>
                <p><small>Enjoy our artworks like wallpapers for various use. Only available for member account
                        and provide along with each series.</small></p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fas fa-sync fa-3x"></i>
                <h4>Updates</h4>
                <p><small>We continually update episodes on series as they become available. We cover a wide range
                        of Bible topics across many issues.</small></p>
            </div>
        </div>
    </div>

    <featured-series></featured-series>
    @guest
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/home/zw-site-bg-02.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/home/zw-site-bg-sm-02.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay">
            <div class="row justify-content-md-end mt-5 mt-sm-0">
                <div class="col-md-10 text-dark text-right">
                    <h1 class="display-3 mt-4">Come to Him as <br>You are!</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row justify-content-md-end">
                <div class="col-md-5 text-dark text-right">
                    <p class="lead">
                        God welcomes us as we are. In our brokenness, hurt and confused mind. He is a healer for the sick (Mark 2:17).
                    </p>
                    <a href="{{route('journey')}}" class="btn btn-primary btn-lg">Learn more</a>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    @endguest
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/home/zw-site-bg-04.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/home/zw-site-bg-sm-04.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay">
            <div class="row justify-content-md-end mt-5 mt-sm-0">
                <div class="col-md-10 text-dark text-right">
                    <h1 class="display-3">Share your story</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row justify-content-md-end">
                <div class="col-md-7 text-dark text-right">
                    <p class="lead">
                        Has the Lord transformed your life through our messages?
                        <br>Give your testimony.
                    </p>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row justify-content-md-end">
                <div class="col-md-5 text-dark text-right">
                    <write-testimony></write-testimony>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <latest-news></latest-news>
@endsection
