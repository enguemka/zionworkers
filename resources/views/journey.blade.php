@extends('layouts.front')

@section('title', 'Journey')

@section('content')
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/journey/zw-site-jn-01.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/home/zw-site-bg-sm-02.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay card-img-overlay-center">
            <div class="row justify-content-md-end mt-5 mt-sm-0">
                <div class="col-md-10 text-dark text-right">
                    <h1 class="display-3">There is help in Jesus</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row justify-content-md-end">
                <div class="col-md-5 text-dark text-right">
                    <p class="lead">
                        Everything is not lost. Your life ain't done yet! Jesus has shed his blood to give you hope and life. You are not the by-product of your mistakes, the curse has been lifted.
                    </p>
                    <a class="btn btn-primary btn-lg" href="/register">Get Started!</a>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/journey/zw-site-jn-02.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/journey/zw-site-jn-sm-02.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay">
            <div class="row mt-5 mt-sm-0">
                <div class="col-md-11 offset-md-1 text-dark">
                    <h1 class="display-3">You have an identity <br>You have a Father</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-1 text-dark">
                    <p class="lead">
                        You have a Father in heaven who loves you to death. Literally, he sent Jesus, his only Son, to die for you. You have an identity in Jesus. You belong to the kingdom of Heaven. Each series and messages will affirm it through pratical verses.
                    </p>
                    <a class="btn btn-primary btn-lg" href="/register">Get Started!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/journey/zw-site-jn-03.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/journey/zw-site-jn-sm-03.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay">
            <div class="row justify-content-md-end mt-5 mt-sm-0">
                <div class="col-md-10 text-dark text-right">
                    <h1 class="display-3">You belong to a <br>heavenly family</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row justify-content-md-end">
                <div class="col-md-5 text-dark text-right">
                    <p class="lead">
                        No matter where you live, where you were born, what is your social status or the color of your skin, you belong to a large family of
                        believers throughout the world. A beautiful family energized by the love of Jesus and determine to represent the Lord's heart accurately.
                    </p>
                    <a class="btn btn-primary btn-lg" href="/register">Get Started!</a>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <div class="card bg-dark text-white border-0">
        <img src="{{asset('img/journey/zw-site-jn-04.png')}}" class="card-img d-none d-md-block" alt="...">
        <img src="{{asset('img/journey/zw-site-jn-sm-04.png')}}" class="card-img d-md-none" alt="...">
        <div class="card-img-overlay">
            <div class="row mt-5 mt-sm-0">
                <div class="col-md-11 offset-md-1 text-dark">
                    <h1 class="display-3">You are talented and <br>you have been empowered</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-1 text-dark">
                    <p class="lead">
                        Our Father has given to each according to his good will and grace. You might not be aware of it but it does not mean that you were left desolate. In a spirit that is submissive to the Lord, let's engage as a community to benefit from each others gifts.
                    </p>
                    <a class="btn btn-primary btn-lg" href="/register">Get Started!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
