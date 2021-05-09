@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Over</div>
                    <div class="card-body">
                        <p>FoodChoose is een project van Robert van Lienden. Begin 2020 ben ik begonnen aan het
                            bouwen van deze recepten website.</p>
                        <p>Met FoodChoose bewaar je makkelijk al je recepten op 1 plek, en kun je met een paar klikken
                            een weekmenu in maken!</p>
                        <p></p>
                        <p>Contact opnemen? Check dan de opties even op mijn website;
                            <a href="https://robertvanlienden.nl/contact" target="_blank">https://robertvanlienden.nl/contact</a>
                        </p>
                        <p>Op zoek naar de algemene voorwaarden?
                            <a href="{{ route('terms-and-conditions') }}">Die vind je hier</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
