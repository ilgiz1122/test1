@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Редактировать профиль</h1>
                </div>
            </div>
            <!--Окно для уведомлений (успушно удалена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--/.Окно для уведомлений (успушно удалена) -->
        </div>
    </div>
    <!-- /.Тема -->


    <!-- Контент -->
    <section class="content">
        <div class="card card-info col-md-6">
            <div class="card-header">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="text" readonly="" value="{{$user['email']}}" class="form-control" placeholder="Username">
                </div>
            </div>
            <form action="{{ route('user.update', $user['id']) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">

                    <div class="input-group mt-2 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <input type="text" name="name" value="{{$user['name']}}" class="form-control">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" name="balance" value="{{$user['balance']}}" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">сом</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Обновить</button>
                </div>
            </form>
        </div>
    </section>
@endsection