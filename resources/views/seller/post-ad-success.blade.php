{{-- @extends('frontend.layout.master') --}}
@extends('layouts.seller')

@section('title', 'Ad Success')
@section('content')
<div class="content">
    <section class="section about-section">
        <div class="container">
            <div class="about-image text-center" style="background-color:white;">
                <img src="{{ asset('user/images/succes.jpg') }}" width="600" height="600" alt="nigerian mining">
                <br><br><br>
                <h3>Your Ad has successfully been submitted.<h3>
                <section class="section about-section" >
                    <div class="container" style="width:600px">
                        <div class="heading">
                            <a class="btn btn-dark" href="{{route('postAd')}}">Post New Ad</a>
                            <a class="btn btn-outline" href="{{route('home')}}">Go Home</a>
                        </div>
                        <div>
                </section>
            </div>

        </div>
    </section>
</div>
@endsection
