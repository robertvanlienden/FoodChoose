@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Random meal</div>
                    <div class="card-body">
                        <p>We eten vandaag...</p>
                        <p>
                            <strong>
                                @if($randommeal)
                                    {{ $randommeal->meal_name }}
                                @else
                                    Geen recept gevonden!
                                    <a href="{{ url('/meals/add') }}">Voeg hier recepten toe</a>
                                @endif
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
