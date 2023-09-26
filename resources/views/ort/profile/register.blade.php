@extends('layouts.ort_layouts')

@section('content')
    <style type="text/css">
        .modal-dialog {
            width: 345px;
            /* or whatever you wish */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>

    <div class="container">

        <div class="register-page" style="background: none; margin-top: -30px">
            <div class="register-box">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a class="h1"><b>Mugalim.edu.kg</b></a>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Эгерде биринчи жолу кирип жатсаңыз анда, төмөнкү форманы толтуруңуз</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group mt-3 mb-3">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ФИО">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mt-3 mb-3">


                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    data-inputmask='"mask": "9(999) 999-999"' data-mask name="phone"
                                    value="{{ old('phone') }}" required="" placeholder="0(709) 999-999">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Пароль">
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
                            <div class="input-group mb-3">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Подтвердите пароль">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    {{-- <div class="icheck-primary">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" >
                                        <label for="agreeTerms">
                                            I agree to the <a href="#">terms</a>
                                        </label>
                                    </div> --}}
                                </div>

                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Катталуу</button>
                                </div>

                            </div>
                            
                        </form>
                    </div>
                    <div class="card-footer" style="padding-top: 0px;">
                        <h8 class="mb-0">
                            <a href="{{ route('ort_login', ['subdomain' => 'ort']) }}" class="text-center">Кирүү <i class="pr-2 fas fa-arrow-right fa-sm pt-2"></i></a> эгер мурда катталган болсоңуз
                        </h8>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
