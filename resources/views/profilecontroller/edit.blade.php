@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profiel bewerken</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('profile/' .$user->id . '/edit') }}">
                            @csrf
                            <div class="form-group row">

                                <label for="username" class="col-md-4 col-form-label text-md-right">
                                    Gebruikersnaam
                                    <strong data-toggle="tooltip"
                                            title="Je hoeft geen gebruikersnaam te hebben om
                                            FoodChoose te gebruiken. Maar zonder gebruikersnaam heb je geen openbaar
                                            profiel">
                                        (i)
                                    </strong>
                                </label>

                                <div class="col-md-6">
                                    <input id="usename"
                                           type="text"
                                           class="form-control @error('username') is-invalid @enderror"
                                           name="username"
                                           value="{{ old('username', $user->username) }}"
                                           autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Naam</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ old('name', $user->name) }}"
                                           autocomplete="name"
                                           autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">Email adres *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email"--}}
{{--                                           type="email"--}}
{{--                                           class="form-control @error('email') is-invalid @enderror"--}}
{{--                                           name="email"--}}
{{--                                           value="{{ old('email', $user->email) }}"--}}
{{--                                           required--}}
{{--                                           autocomplete="email">--}}
{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">Website</label>

                                <div class="col-md-6">
                                    <input id="url"
                                           type="url"
                                           class="form-control @error('url') is-invalid @enderror"
                                           name="url"
                                           value="{{ old('url', $user->url) }}"
                                           autocomplete="url">

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="about" class="col-md-4 col-form-label text-md-right">
                                    Over
                                </label>

                                <div class="col-md-6">
                                    <textarea id="about"
                                              type="text"
                                              class="form-control @error('about') is-invalid @enderror"
                                              name="about"
                                              placeholder="Hier kan je iets over jezelf schrijven"
                                              autofocus>{{ old('about', $user->about) }}</textarea>

                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email-optin" class="col-md-4 col-form-label text-md-right">
                                    Ik wil (maximaal 2 keer per maand) een e-mail ontvangen
                                    met de laatste updates over FoodChoose</label>

                                <div class="col-md-6 ml-4">
                                    <input class="form-check-input" type="checkbox" name="email-optin" id="email-optin"  <?php echo e(old('email-optin' , $user->email_optin) ? 'checked' : ''); ?>>
                                    @error('email-optin')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">Wachtwoord</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <div class="d
ropdown">--}}
{{--                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            Wachtwoord aanpassen--}}
{{--                                        </button>--}}
{{--                                        <div class="dropdown-menu p-2" aria-labelledby="dropdownMenu2">--}}
{{--                                            <label for="old-password" class="col-form-label text-md-right">--}}
{{--                                                Oude wachtwoord--}}
{{--                                            </label>--}}
{{--                                            <input id="old-password"--}}
{{--                                                   type="password"--}}
{{--                                                   class="form-control @error('old-password') is-invalid @enderror"--}}
{{--                                                   name="old-password">--}}
{{--                                            <label for="password" class="col-form-label text-md-right">--}}
{{--                                                Nieuwe wachtwoord--}}
{{--                                            </label>--}}
{{--                                            <input id="password"--}}
{{--                                                   type="password"--}}
{{--                                                   class="form-control @error('password') is-invalid @enderror"--}}
{{--                                                   name="password"--}}
{{--                                                   autocomplete="new-password">--}}
{{--                                            <label for="password-confirm" class="col-form-label text-md-right">--}}
{{--                                                Bevestig wachtwoord--}}
{{--                                            </label>--}}
{{--                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">--}}
{{--                                            <button type="submit" class="btn btn-primary mt-3">--}}
{{--                                                Profiel aanpassen--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">

                                <label for="about" class="col-md-4 col-form-label text-md-right">
                                    Wachtwoord/e-mail aanpassen
                                </label>

                                <div class="col-md-6">
                                    <p>Sorry! Het aanpassen van je wachtwoord/e-mail is nog niet mogelijk.</p>
                                    <p>Ik probeer dit zo snel mogelijk werkend te krijgen.</p>
                                    <p>Wil je deze gegevens nu aanpassen? Neem contact op via foodchoose@robertvanlienden.nl.</p>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Profiel aanpassen
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
