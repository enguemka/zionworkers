@extends('layouts.front')

@section('title', 'About')

@section('content')
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/about/zw-site-about-01.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/about/zw-site-about-sm-01.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay card-img-overlay-center">
            <div class="row mt-5 mt-sm-0">
                <div class="col-md-11 offset-md-1 text-dark">
                    <h1 class="display-3">How was ZionWorkers <br>created?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-1 text-dark">
                    <p class="lead">
                        ZionWorkers was created in April 2018, initially as a blog/daily devotional. It is the fruit of a young man whose heart was rescued by the Lord
                        and never stopped sharing his story.
                    </p>
                    <button type="button" class="btn btn-primary btn-lg">Get Started!</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/about/zw-site-about-02.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/about/zw-site-about-sm-02.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay">
            <div class="row justify-content-md-end mt-5 mt-sm-0">
                <div class="col-md-10 text-dark text-right">
                    <h1 class="display-3">What motivates us?</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row justify-content-md-end">
                <div class="col-md-5 text-dark text-right">
                    <p class="lead">
                        We aim at helping and developing believers by acknowledging the struggles we go through and presenting Jesus perspective into it.
                    </p>
                    <button type="button" class="btn btn-primary btn-lg">Get Started!</button>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/about/zw-site-about-03.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/about/zw-site-about-sm-03.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay">
            <div class="row mt-5 mt-sm-0">
                <div class="col-md-11 offset-md-1 text-dark">
                    <h1 class="display-3">Where are we heading to?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-1 text-dark">
                    <p class="lead">
                        We provides in-depth revelation every months about God's love for us. The Bible relates a lot in what we go through daily. We want to unveil
                        God's Grace in the details.
                    </p>
                    <button type="button" class="btn btn-primary btn-lg">Get Started!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
