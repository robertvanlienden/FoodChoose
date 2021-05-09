@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Voeg recept toe</div>

                    <div class="card-body">
                        <form method="post" action="/meals/add">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Recept naam *</label>

                                <div class="col-md-6">
                                    <input id="meal_name"
                                           type="text"
                                           class="form-control @error('meal_name') is-invalid @enderror"
                                           name="meal_name" value="{{ old('meal_name') }}"
                                           required autofocus
                                    >
                                    @error('meal_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mealCategories"
                                       class="col-md-4 col-form-label text-md-right">Recept categorie</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('directions') is-invalid @enderror"
                                            id="mealCategories" name="mealCategories">
                                        <option value="">Selecteer categorie</option>
                                        @foreach($mealCategories as $mealCategory)
                                            <option value="{{$mealCategory->id}}">{{$mealCategory->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('directions')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="ingredients" class="col-md-4 col-form-label text-md-right">Ingredienten</label>
                                <ingredients-component
                                    class="col-md-6 ingredientslist"
                                    api-token="{{ $apiToken }}"
                                    app-url="{{ request()->root() }}"
                                >
                                </ingredients-component>
                            </div>

                            <div class="form-group row">
                                <label for="directions" class="col-md-4 col-form-label text-md-right">Bereiding</label>

                                <textarea id="directions"
                                       type="textarea"
                                       class="col-md-6 form-control @error('directions') is-invalid @enderror"
                                       name="directions"
                                          autofocus>{{ old('directions') }}</textarea>
                                @error('directions')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Bereidingstijd (min)</label>
                                    <input id="preparation_time"
                                           type="number"
                                           class="col-md-6 form-control @error('preparation_time') is-invalid @enderror"
                                           name="preparation_time"
                                           value="{{ old('preparation_time') }}"
                                           min="0"
                                           max="300"
                                              autofocus></input>
                                    @error('preparation_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group row">
                                <label for="recipe_url" class="col-md-4 col-form-label text-md-right">Link naar recept</label>

                                <input id="recipe_url"
                                       type="url"
                                       class="col-md-6 form-control @error('recipe_url') is-invalid @enderror"
                                       name="recipe_url"
                                       value="{{ old('preparation_time') }}"
                                       autofocus>
                                @error('recipe_url')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Openbaar</label>

                                <div class="col-md-6">
                                    <input id="public"
                                           type="checkbox"
                                           class="form-control @error('public') is-invalid @enderror"
                                           name="public"
                                           value="1" {{ old('public') ? 'checked="checked"' : '' }}
                                           autofocus
                                    >
                                    @error('public')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Toevoegen
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
