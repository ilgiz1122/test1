@extends('layouts.app')

@section('content')
<style type="text/css">
   .modal-dialog {
      width: 345px; /* or whatever you wish */
}
</style>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
        </div>
    </div>
</div>




<div class="modal fade modal-wide" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="card card-outline card-primary mb-0">
                    <div class="card-header text-center">
                        <a href="/" class="h1"><b>НоНси </b></a>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h5><p class="login-box-msg">Кирүү</p></h5>
                        <div class="row mb-5">
                            <!--<div class="col mr-4 ml-3"><a href="{{ route('auth.instagram') }}" class="btn btn-danger btn-block" style="border-radius: 50%; font-size: 27px;"><i class="fab fab fa-instagram"></i></a></div>
                            <div class="col mr-4 ml-3"><a href="{{ route('auth.facebook') }}" class="btn btn-outline-primary btn-block" style="border-radius: 50%; font-size: 27px;"><i class="fab fa-facebook-f"></i></a></div>
                            <div class="col mr-3 ml-4"><a href="{{ route('auth.google') }}" class="btn btn-danger btn-block" style="border-radius: 50%; font-size: 27px;"><i class="fab fa-google"></i></a></div> -->
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <div class="input-group mt-3 mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
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
                                        <input class="form-check-input" type="checkbox" checked="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    @if (Route::has('password.request'))
                                        <p class="mb-1">
                                            <a href="{{ route('password.request') }}">Паролду унуттуңузбу?</a>
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
                        <h8 class="mb-0">
                             <a href="{{ route('register') }}" class="text-center">Катталуу <i class="pr-2 fas fa-arrow-right fa-sm pt-2"></i></a> эгер каттала элек болсоңуз
                        </h8>
                    </div>
                </div>
            </div>  
    </div>
</div>






<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){$('#modal-default').modal('show');}, 500);
    }); 
</script>

@endsection