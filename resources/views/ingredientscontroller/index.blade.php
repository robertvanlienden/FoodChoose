@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Ingredienten database</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <th>
                                    Ingredienten
                                </th>
                            </tr>
                            @foreach($ingredients as $ingredient)
                                <tr>
                                    <td>
                                        {{$ingredient->name}}
                                    </td>
                                    <td>
                                        <a href="{{ url('/ingredients/' . $ingredient->id) }}" class="btn btn-dark">Edit</a>
                                    </td>
                                    <td>
                                            <form method="post" action="/ingredients/{{$ingredient->id}}">
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
                        <div class="col-md-6 offset-md-4">
                            <a href="/ingredients/add" class="btn btn-primary">Ingredient toevoegen</a>
                        </div>
                        <div class="col-md-6 offset-md-4 pt-3">{{ $ingredients->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
