@extends('layouts.front')

@section('title', 'My Account')

@section('content')
    <div style="margin-top:67px;"></div>
    <div class="container">
        <div class="row mb-4 pt-5">
            <div class="col-md-12">
                <h3>Account Information</h3>
                <account-details></account-details>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <h3>Change Password</h3>
                <change-password></change-password>
            </div>
            <div class="col-md-6">
                <h3>Preferences</h3>
                <preferences></preferences>
            </div>
        </div>
    </div>
@endsection
