@extends('layouts.ort_layouts')

@section('content')
    <style type="text/css">
        .modal-dialog {}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <div class="container">

        <div class="login-page" style="background: none; margin-top: -80px">
            <div class="login-box">

                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a class="h1"><b>Mugalim.edu.kg</b></a>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Кирүү үчүн электрондук почтаңызды (аккаунтуңузду) жана паролунузду киргизиңиз</p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mt-3 mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Пароль">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-8" hidden="">
                                    <div class="icheck-primary">
                                        <input class="form-check-input" type="checkbox" checked="" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    @if (Route::has('password.request'))
                                        <p class="mb-1">
                                            <a href="{{ route('ort_password_reset', ['subdomain' => 'ort']) }}">Паролду унуттуңузбу?</a>
                                        </p>
                                    @endif
                                </div>

                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Кирүү</button>
                                </div>

                            </div>
                        </form>

                        
                    </div>
                    <div class="card-footer">
                        <p class="mb-0">
                            <a href="{{ route('ort_register', ['subdomain' => 'ort']) }}" class="text-center">Катталуу <i
                                class="pr-2 fas fa-arrow-right fa-sm pt-2"></i></a> эгер каттала элек болсоңуз
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>









    <script type="text/javascript">
    </script>
@endsection
