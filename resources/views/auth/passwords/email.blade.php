@extends('layouts.app')

@section('content')
<style type="text/css">
   .modal-dialog {
      width: 345px; /* or whatever you wish */
}
</style>
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
                    <div class="card-body">
                        <h5><p class="login-box-msg">Паролду калыбына келтирүү</p></h5>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
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
                            <div class="text-right mt-4">
                                    <button type="submit" class="btn btn-primary">Паролду кайра коюу <small>(Сбросить пароль)</small></button>
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
      setTimeout(function(){$('#modal-default').modal('show');}, 40);
    }); 
</script>

@endsection