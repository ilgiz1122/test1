@extends('layouts.app')

@section('title', 'Добавить урок')

@section('content')


    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить урок</h1>
                </div>
            </div>
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--Окно для уведомлений (успушно добавлена) -->
        </div>
    </div>
    <!-- Тема -->

    <!-- Контент -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <form action="{{ route('uroky.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Тема урока</label>
                                    <input type="text" name="title" class="form-control" placeholder="Введите тему урока" required>
                                </div>
                                <div class="form-group">
                                    <label>Краткое описание</label>
                                    <input type="text" name="opisanie" class="form-control" placeholder="Введите краткое описание" required>
                                </div>
                                <div class="form-group">
                                    <label>Выберите категорию</label>
                                    <select name="podcat_id" class="form-control" required="">
                                        @foreach ($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Выберите подкатегорию</label>
                                    <select name="podcat_id" class="form-control" required="">
                                        @foreach ($podcategories as $podcategory)
                                        <option value="{{$podcategory['id']}}">{{$podcategory['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Видео для этого урока</label>
                                    <input type="text" name="ssylka" class="form-control" id="exampleInputEmail1"
                                        placeholder="Введите ссылку" required>
                                </div>
                                <div class="form-group">
                                    <label>Статус урока</label>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col icheck-success d-inline input-group" align="center">
                                                <input type="radio" name="status" id="r1a" value="1">
                                                <label for="r1a">Платный</label>
                                            </div>
                                            <div class="col icheck-success d-inline input-group" align="center">
                                                <input type="radio" name="status" id="r1b" value="0" checked="">
                                                <label for="r1b">Бесплатный</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Текстовый материал данного урока</label>
                                   <textarea name="text" class="editor"></textarea>
                                </div>
                                <div class="form-group">
                                   <label for="feature_image">Картинка для карточки</label>
                                   <img src="" alt="" class="img-uploaded" style="display: block; width: 300px">
                                   <input class="form-control" type="text" id="feature_image" name="img" readonly="" placeholder="Картинка появиться здесь" required>
                                   <a href="" class="popup_selector btn btn-secondary mt-2" data-inputid="feature_image">Загрузить картинку </a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection