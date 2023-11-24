@extends('layouts.app')

@section('content')
<style type="text/css">
   .modal-dialog {
      width: 345px; /* or whatever you wish */
}
</style>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>

<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ФИО</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="card card-outline card-primary mb-0">
                    <div class="card-header text-center">
                        <a href="/" class="h1"><b>Mugalim.edu.kg </b></a>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body" style="padding-top: 10px;">
                        <h5 class="mb-0"><p class="login-box-msg" style="padding-bottom: 10px;">Каттауу</p></h5>
                        <div class="row mb-2">
                            <!--<div class="col mr-4 ml-3"><a href="{{ route('auth.instagram') }}" class="btn btn-danger btn-block" style="border-radius: 50%; font-size: 27px;"><i class="fab fab fa-instagram"></i></a></div>
                            <div class="col mr-4 ml-3"><a href="{{ route('auth.facebook') }}" class="btn btn-outline-primary btn-block" style="border-radius: 50%; font-size: 27px;"><i class="fab fa-facebook-f"></i></a></div>
                            <div class="col mr-3 ml-4"><a href="{{ route('auth.google') }}" class="btn btn-danger btn-block" style="border-radius: 50%; font-size: 27px;"><i class="fab fa-google"></i></a></div>-->
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="input-group mt-3 mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ФИО">
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
                                
                                
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" data-inputmask='"mask": "9(999) 999-999"' data-mask name="phone" value="{{ old('phone') }}" required="" placeholder="0(709) 999-999">
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Пароль">
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Подтвердите пароль">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-block">Катталуу</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" style="padding-top: 0px;">
                        <h8 class="mb-0">
                             <a href="{{ route('login') }}" class="text-center">Кирүү <i class="pr-2 fas fa-arrow-right fa-sm pt-2"></i></a>  эгер мурда каттлган болсоңуз
                        </h8>
                    </div>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){$('#modal-default').modal('show');}, 20);
    }); 



</script>
@endsection