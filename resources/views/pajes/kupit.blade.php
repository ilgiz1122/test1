@extends('layouts.app')

@section('content')
<style>
    
</style>

<div class="content-wrapper" style="margin-left: 0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Оформление покупки</h3>
                        </div>
                        <div class="card-body"><!-- THE CALENDAR -->
                            <div class="col d-flex align-items-stretch flex-column dlyaramki">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-12">
                                        <h5><strong><span class="info-box-text">Товар который вы покупаете</span></strong></h5>
                                        <div class="info-box bg-info">
                                            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                                            <div class="info-box-content">
                                                <h5><strong><span class="info-box-text">{{$podcategories['title']}}</span></strong></h5>
                                                <span class="info-box-number">Количество уроков: 41</span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 70%"></div>
                                                </div>
                                                <span class="progress-description">Количество покупок: 1484848</span>
                                                <span class="progress-description">Препод: Таалайбек уулу Илгиз</span>
                                                <span class="progress-description">Цена: {{$podcategories['price'] / 100}} сом</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5><strong><span class="info-box-text">Оформление покупки со стоимостью: {{$podcategories['price'] / 100}} сом<br>Оплата взимается с вашего баланса<br>Оплатив один раз вы получаете доступ к всем урокам данного курса</span></strong></h5>
                                    <div class="col-md-8 col-sm-6 col-12">
                                        @if (Auth::user()->balance < $podcategories['price'])
                                            <h5><strong><span class="info-box-text">У вас недостаточно средств для покупки данного курса. Пожалуйста пополните баланс.</span></strong></h5>
                                        @endif
                                        @if (Auth::user()->balance >= $podcategories['price'])
                                        <form action="{{ route('pokupky.store') }}" method="POST">
                                            @csrf
                                            <input type="number" name="kurs_id" value="{{$podcategories['id']}}" class="form-control" id="inputEmail3" placeholder="id подкатегории" readonly="" hidden="">
                                            <input type="text" name="kurs_title" value="{{$podcategories['title']}}" class="form-control" id="inputPassword3" placeholder="тема курса" readonly="" hidden="">
                                            <input type="number" name="user_id" value="{{ Auth::user()->id }}" class="form-control" id="inputPassword3" placeholder="id пользователья" readonly="" hidden="">
                                            <input type="text" name="user_name" value="{{ Auth::user()->name }}" class="form-control" id="inputPassword3" placeholder="ФИО" readonly="" hidden="">
                                            <input type="number" name="price" value="{{$podcategories['price'] / 100}}" class="form-control" id="inputPassword3" placeholder="id пользователья" readonly="" hidden="">
                                            <input type="text" name="proverka" value="{{ Auth::user()->id }}-{{$podcategories['id']}}" class="form-control" id="inputPassword3" placeholder="ФИО" readonly="" hidden="">
                                            <button type="submit" class="btn btn-info float-right">Купить</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Данные покупателья</h4>
                            </div>
                            <div class="card-body">
                                <span class="info-box-number">ФИО: {{ Auth::user()->name }}</span><br>
                                <span class="info-box-number">Ваш текущий баланс: <strong>{{ Auth::user()->balance / 100 }} сом</strong></span>
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">Пополнить баланс</button>
                            </div>
                        </div><!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Тут будет реклама</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                    </ul>
                                </div><!-- /btn-group -->
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                    </div><!-- /btn-group -->
                                </div><!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>

@endsection