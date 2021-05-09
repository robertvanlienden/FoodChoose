@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Eigen recepten</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form method="GET" class="form-group row">
                                <input name="search_input"
                                       class="form-control col-md-3 m-1 m-md-3"
                                       placeholder="Zoeken..."
                                       @if(Request()->input('search_input'))
                                            value="{{Request()->input('search_input')}}"
                                        @endif>
                                <select name="search_on"
                                        class="form-control col-md-3 m-1 m-md-3">
                                    <option value="meal_name"
                                            @if(Request()->input('search_on') == 'meal_name')
                                                selected
                                            @endif >Recept naam</option>
                                    <option value="category_name"
                                            @if(Request()->input('search_on') == 'category_name')
                                                selected
                                            @endif >Categorie naam</option>
                                </select>
                                <button class="form-control
                                            btn-success
                                            col-md-3
                                            m-1 m-md-3">Zoeken</button>
                            </form>


                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="min-width: 150px;">
                                        @if(Request()->input('sort_by') == 'meal_name'
                                        && Request()->input('sort_type') == 'desc')
                                            <a href="{{ route('meals', $mealNameSortUrlParameters) }}">Naam (z - a)</a>
                                        @elseif(Request()->input('sort_by') == 'meal_name'
                                        && Request()->input('sort_type') == 'asc')
                                            <a href="{{ route('meals', $mealNameSortUrlParameters) }}">Naam (a - z)
                                        @else
                                            <a href="{{ route('meals', $mealNameSortUrlParameters) }}">Naam
                                        @endif
                                    </th>
                                    <th>
                                        @if(Request()->input('sort_by') == 'preparation_time'
                                            && Request()->input('sort_type') == 'desc')
                                            <a href="{{ route('meals', $preparationTimeSortUrlParameters) }}">Bereidingstijd (min) &uArr;</a>
                                        @elseif(Request()->input('sort_by') == 'preparation_time'
                                            && Request()->input('sort_type') == 'asc')
                                            <a href="{{ route('meals', $preparationTimeSortUrlParameters) }}">Bereidingstijd (min) &dArr;
                                        @else
                                            <a href="{{ route('meals', $preparationTimeSortUrlParameters) }}">Bereidingstijd (min)
                                        @endif
                                    </th>
                                    <th >
                                        Categorie
                                    </th>
                                    <th >
                                        Openbaar/privé
                                    </th>
                                </tr>
                                @foreach($meals as $meal)
                                    <tr>
                                        <td style="min-width: 150px;">
                                            <a href="{{ url('/meals/view/' . $meal->id) }}">{{$meal->meal_name}}</a>
                                        </td>
                                        <td>
                                            {{$meal->preparation_time}}
                                        </td>
                                        <td>
                                            @foreach($meal->mealCategories as $mealCategory)
                                                {{$mealCategory->category_name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $meal->public == 1 ? "Openbaar" : "Privé" }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/meals/' . $meal->id) }}" class="btn btn-dark">Edit</a>
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
                                @endforeach
                            </table>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <a href="/meals/add" class="btn btn-primary">Recept toevoegen</a>
                        </div>
                        <div class="col-md-6 offset-md-4 pt-3">{{ $meals->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
