@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Weekplanner</div>
                    <div class="card-body">
                        <p>Maak makkelijk een menu voor de hele week met deze weekplanner!</p>
                        <weekplanner-component
                            class="pt-3"
                            api-token="{{ $apiToken }}"
                            app-url="{{ request()->root()  }}">
                        </weekplanner-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
