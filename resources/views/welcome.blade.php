@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welkom bij FoodChoose</div>

                    <div class="card-body">
                        <p>Recepten makkelijk bewaren op 1 plek!</p>

                        <p>
                            <a class="btn btn-success btn-lg" href="{{route('register')}}">Registreer direct</a>
                        </p>
                        <p>
                            <a class="btn btn-success btn-lg" href="{{ route('login') }}">Log In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Wat is FoodChoose?</div>
                    <div class="card-body">
                        <p>Op FoodChoose kun je al jouw recepten bewaren op 1 plek! Zo hoef je nooit meer op zoek
                            naar je favorite recepten.
                        </p>

                        <p>Meer informatie over FoodChoose?
                            <a href="{{ route('changelog') }}">Klik dan hier.</a></p>
                        <p>Hier onder kun zie je een aantal screenshots van FoodChoose. Je kan ook eerst het profiel van
                        <a href="{{ Request::root() }}/profile/Robert">Robert</a>
                            (maker van FoodChoose) eens rustig bekijken, voor dat je zelf een account aan maakt
                            op FoodChoose.
                        </p>
                            <div class="row">
                                <div class="slick-slider col-10 offset-1 col-md-6 offset-md-3">
                                    <img style="max-width: 100%; max-height: 100%;" data-lazy="{{ Asset('img/screenshot_01.png') }}">
                                    <img style="max-width: 100%; max-height: 100%;" data-lazy="{{ Asset('img/screenshot_02.png') }}">
                                    <img style="max-width: 100%; max-height: 100%;" data-lazy="{{ Asset('img/screenshot_03.png') }}">
                                    <img style="max-width: 100%; max-height: 100%;" data-lazy="{{ Asset('img/screenshot_04.png') }}">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
