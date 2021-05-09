@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Profiel van
                        <strong>
                            <a href="{{ url('/profile/' . $user->username) }}">{{ $user->username }}</a>
                        </strong>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       <table class="table">
                           <tr>
                               <td><strong>Naam</strong></td>
                               <td>{{ $user->name }}</td>
                           </tr>
                           <tr>
                               <td><strong>Over</strong></td>
                               <td>{{ $user->about }}</td>
                           </tr>
                           <tr>
                               <td><strong>URL</strong></td>
                               <td><a href="{{ $user->url }}" rel="nofollow" target="_blank">{{ $user->url }}</a></td>
                           </tr>
                       </table>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Openbare recepten</div>
                    <div class="card-body">
                        <div class="table-responsive">

                        </div>
                        <table class="table">
                            <tr>
                                <th>Recept naam</th>
                                <th>Recept categorie</th>
                            </tr>
                            @foreach($meals as $meal)
                                <tr>
                                    <td>
                                        <a href="{{ url('/meals/view/' . $meal->id) }}">{{$meal->meal_name}}</a>
                                    </td>
                                    <td>
                                        @foreach($meal->mealCategories as $mealCategory)
                                            {{$mealCategory->category_name}}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col">
                        @can('update', $user)
                            <a href="{{ url('profile/' . $user->id . '/edit') }}" class="btn btn-success">Profiel aanpassen</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
