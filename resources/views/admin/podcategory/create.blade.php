@extends('layouts.app')

@section('title', 'Добавить подкатегорию')

@section('content')


    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить подкатегорию</h1>
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
                        <form action="{{ route('podcategory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название подкатегории</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        placeholder="Введите название подкатегории" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail12">Цена курса</label>
                                    <input type="number" pattern="\d+" name="price" min="0" max="100000" class="form-control" id="exampleInputEmail12"
                                        placeholder="Введите цену курса" required>

                                </div>
                                <div class="form-group">
                                    <label>Выберите категорию</label>
                                    <select name="cat_id" class="form-control" required="">
                                        @foreach ($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                        @endforeach
                                    </select>
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