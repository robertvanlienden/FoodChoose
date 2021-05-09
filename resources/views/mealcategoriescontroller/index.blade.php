@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Eigen recept categorieën</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <th>
                                    Categorie naam
                                </th>
                            </tr>
                            @foreach($mealCategories as $category)
                                <tr>
                                    <td>
                                        {{$category->category_name}}
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ url('/mealcategories/' . $category->id) }}" class="btn btn-dark">Edit</a>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <form method="post" action="/mealcategories/{{$category->id}}">
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
                            <a href="/mealcategories/create" class="btn btn-primary">Recept categorie toevoegen</a>
                        </div>
                        <div class="col-md-6 offset-md-4 pt-3">{{ $mealCategories->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
