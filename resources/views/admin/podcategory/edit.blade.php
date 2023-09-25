@extends('layouts.app')

@section('title', 'Редактировать подкатегорию')

@section('content')

    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Редактировать подкатегорию: {{$podcategory['title']}}</h1>
                </div>
            </div>
            <!--Окно для уведомлений (успушно обновлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--Окно для уведомлений (успушно обновлена) -->
        </div>
    </div>
    <!-- Тема -->
    

     <!-- Контент -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <form action="{{ route('podcategory.update', $podcategory['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название подкатегории</label>
                                    <input type="text" value="{{ $podcategory['title'] }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введите название подкатегории">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail12">Цена курса</label>
                                    <input type="nomber" pattern="\d+" min="0" max="100000" value="{{ $podcategory['price'] }}" name="price" class="form-control" id="exampleInputEmail12" placeholder="Введите цену курса">

                                </div>
                                <div class="form-group">
                                    <label>Выберите категорию</label>
                                    <select name="cat_id" class="form-control" required="">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}" @if ($category['id'] == $podcategory['cat_id']) selected @endif>{{ $category['title'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                   <label for="feature_image">Картинка для карточки</label>
                                   <img src="{{ $podcategory['img'] }}" alt="" class="img-uploaded"
                                        style="display: block; width: 300px">
                                   <input class="form-control" type="text" id="feature_image" name="img" value="{{ $podcategory['img'] }}" readonly="" placeholder="Картинка появиться здесь" hidden="true">
                                   <a href="" class="popup_selector btn btn-secondary mt-2" data-inputid="feature_image">Загрузить картинку</a>
                                </div>
                                
                            </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection