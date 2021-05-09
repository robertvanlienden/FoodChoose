@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Opgeslagen weekmenu's</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Naam</th>
                                </tr>
                                @foreach($weekmenus as $weekmenu)
                                    <tr>
                                        <td>
                                            <a href="{{ url('/saved-weekmenu/view/' . $weekmenu->id) }}">{{$weekmenu->name}}</a>
                                        </td>
{{--                                        <td>--}}
{{--                                            <a href="{{ url('/saved-weekmenu/' . $weekmenu->id) }}" class="btn btn-dark">Edit</a>--}}
{{--                                        </td>--}}
                                        <td>
                                            <form method="post" action="/saved-weekmenu/{{$weekmenu->id}}">
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
                            <a href="{{ route('weekplanner') }}" class="btn btn-primary">Weekmenu maken</a>
                        </div>
                            <div class="col-md-6 offset-md-4 pt-3">{{ $weekmenus->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
