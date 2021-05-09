@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Weekmenu: {{ $weekmenu->name }}</div>

                    <div class="card-body">
                        <p>
                            Hier onder vind je het weekmenu <strong>{{ $weekmenu->name }}</strong>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                @foreach($meals as $meal)
                                    <tr>
                                        <th>{{ $weekMapping[$meal->pivot->day] }}</th>
                                        <td>
                                            <a href="{{ url('/meals/view/' . $meal->id) }}">{{$meal->meal_name}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
        </div>
    </div>
@endsection
