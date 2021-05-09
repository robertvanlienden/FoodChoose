@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (!Auth()->user()->username)
                <div class="alert alert-success" role="alert">
                    <a href="{{ url('/profile/' . Auth()->user()->id. '/edit') }}">Geef je account een gebruikersnaam om je openbare profiel aan te maken!</a>
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Welkom bij FoodChoose
                        @if(Auth()->user()->username)
                            <strong>
                                <a href="{{ url('profile/' . Auth()->user()->username) }}">{{ Auth()->user()->name }}</a>
                            </strong>
                        @else
                            <strong>{{ Auth()->user()->name }}</strong>
                        @endif
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Recepten:</div>

                <div class="card-body">
                    <ul>
                        <li><a href="/meals">Bekijk recepten</a></li>
                        <li><a href="/mealcategories">Bekijk categorieën</a></li>
                        <li><a href="/meals/add">Voeg recepten toe</a></li>
                    </ul>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Ingredienten:</div>

                <div class="card-body">
                    <ul>
                        <li><a href="/ingredients">Bekijk ingredienten</a></li>
                        <li><a href="/ingredients/add">Voeg ingredienten toe</a></li>
                    </ul>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Tools:</div>

                <div class="card-body">
                    <ul>
                        <li><a href="/randommeal">Random recept</a></li>
                        <li><a href="/weekplanner">Weekplanner</a></li>
                        <li><a href="{{ route('saved-weekmenu') }}">Opgeslagen weekmenu's</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
