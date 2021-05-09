@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welkom bij FoodChoose
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Account nog niet geactiveerd!</div>

                <div class="card-body">
                    <p>FoodChoose staat nog niet open voor iedereen. Wacht tot je account geactiveerd wordt.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
