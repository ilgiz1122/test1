@extends('layouts.ort_layouts')

@section('title', 'Профиль')

@section('content')
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            
            <!--Окно для уведомлений (успушно удалена) -->
            
            <!--/.Окно для уведомлений (успушно удалена) -->
        </div>
    </div>
    <!-- /.Тема -->






            <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    
                </div>
                <div class="col-md-4">
                    <div class="card card-outline card-widget widget-user1 shadow-lg">
                        <div class="widget-user-header text-white" style="background: url('{{asset('')}}/admin/dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username text-right">Менин профилим</h3>
                            <h5 class="widget-user-desc text-right"></h5>
                        </div>
                        <div class="widget-user-image1">
                            <img class="img-circle" src="{{asset('')}}/admin/dist/img/user-3331256_960_720 (1).png" alt="User Avatar">
                        </div>
                        <div class="card-body box-profile mt-4">
                            <h3 class="profile-username text-center">Паролду өзгөртүү</h3>
                            <p class="text-muted text-center">{{Auth::user()->name}}</p>

                            <form method="POST" action="{{ route('ort_profile_password_update', ['subdomain' => 'ort']) }}">
                                    @csrf
                                    @method('PUT')
                                <!--<b>Эски пароль:</b>
                                <div class="input-group mb-3">
                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password" placeholder="Эски пароль">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div><br>
                                    @if (session('success2'))
                                    <div class="alert alert-dismissible text-center" style="margin-bottom: 0px; margin-top: 0px; color: #dc3545; background-color: none; border-color: none; font-size: 80%;  padding-top: 0px; padding-right: 40px; padding-left: 6px; padding-bottom: 4px;"><strong>{{ session('success2') }}</strong></div>
                                    @endif

                                </div>-->
                                <b>Жаңы пароль: </b><small>(min: 4 символ)</small>
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Жаңы пароль">
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
                            
                                <!--<b>Жаңы пароль <small>(подтвердите)</small>:</b>
                                <div class="input-group mb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Жаңы пароль (подтвердите)">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>-->
                            <button type="submit" class="btn btn-info btn-block"><i class="fas fa-pencil-alt"></i>
                                Өзгөртүү</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-4">
                    
                </div>
                        
            </div><!-- /.row --> 
        </div><!-- /.container-fluid -->
    </section>




            
        
    <!-- Контент -->


  


@endsection