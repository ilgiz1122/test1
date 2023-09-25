@extends('layouts.app')

@section('title', 'Редактировать категорию')

@section('content')

    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать категорию: {{$category['title']}}</h1>
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
                        <form action="{{ route('category.update', $category['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" value="{{$category['title']}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введите название категории" required>
                                </div>
                                <div class="form-group">
                                <label for="feature_image">Картинка для карточки</label>
                                <img src="{{ $category['img'] }}" alt="" class="img-uploaded"
                                style="display: block; width: 300px">
                                <input class="form-control" type="text" id="feature_image" name="img" value="{{ $category['img'] }}" readonly="" placeholder="Картинка появиться здесь" hidden="true">
                                <a href="" class="popup_selector btn btn-secondary mt-2" data-inputid="feature_image">Загрузить картинку</a>
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