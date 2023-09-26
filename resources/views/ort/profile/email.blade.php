@extends('layouts.ort_layouts')

@section('content')

    <div class="container">
        <div class="login-page"  style="background: none; margin-top: -80px">
            <div class="login-box">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a class="h1"><b>Mugalim.edu.kg </b></a>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Паролду калыбына келтирүү</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-group mt-3 mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
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
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-primary">Паролду кайра коюу <small>(Сбросить пароль)</small></button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <h8 class="mb-0">
                            <a href="{{ route('ort_register', ['subdomain' => 'ort']) }}" class="text-center">Катталуу <i
                                    class="pr-2 fas fa-arrow-right fa-sm pt-2"></i></a> эгер каттала элек болсоңуз
                        </h8>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
