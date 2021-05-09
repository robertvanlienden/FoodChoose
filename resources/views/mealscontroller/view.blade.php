@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Recept van
                            <strong>
                                <a href="{{ url('/profile/' . $meal->user()->get()->first()->username) }}">
                                    {{ $meal->user()->get()->first()->username }}
                                </a>
                            </strong>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><strong>Receptnaam: </strong></td>
                                    <td>{{$meal->meal_name}}</td>
                                </tr>
                                @if($meal->mealCategories()->get()->count() > 0)
                                    <tr>
                                        <td><strong>Recept categorie: </strong></td>
                                        <td>
                                            @foreach($meal->mealCategories as $mealCategory)
                                                {{$mealCategory->category_name}}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                                @if($meal->preperation_time)
                                    <tr>
                                        <td><strong>Voorbereidingstijd (min): </strong></td>
                                        <td>{{$meal->preparation_time}}</td>
                                    </tr>
                                @endif
                                @if($ingredients->count() > 0)
                                    <tr>
                                        <td><strong>Ingredienten:</strong></td>
                                        <td>
                                            <ul>
                                            @foreach($ingredients as $ingredient)
                                                <li><strong>{{$ingredient->pivot->amount}}</strong> {{$ingredient->name}}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endif
                                @if($meal->directions)
                                    <tr>
                                        <td><strong>Bereiding: </strong></td>
                                        <td><p>{!! nl2br($meal->directions) !!}</p></td>
                                    </tr>
                                @endif
                                @if($meal->recipe_url)
                                    <tr>
                                        <td><strong>Link naar recept: </strong></td>
                                        <td><a href="{{url($meal->recipe_url)}}" target="_blank">{{$meal->recipe_url}}</a></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><strong>Openbaar/Privé: </strong></td>
                                    <td>{{ $meal->public == 1 ? "Openbaar" : "Privé" }}</td>
                                </tr>
                                @can('update', $meal)
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <a href="/meals/{{$meal->id}}" class="btn btn-info">Aanpassen</a>
                                        </div>
                                    </td>
                                    <td>
                                        <form method="post" action="/meals/{{$meal->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger delete" value="Delete">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endcan
                            </table>
                        </div>
                    </div>
        </div>
    </div>
@endsection
