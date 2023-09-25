@extends('layouts.app')

@section('title', 'Все подкатегории')

@section('content')
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Все подкатегории</h1>
                </div>
                <div class="col">
                    <a class="btn btn-success btn-block btn-lg" href="{{ route('podcategory.create')}}">
                        <i class="fas fa-plus"></i> Добавить
                    </a>
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
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 40%">Название подкатегории</th>
                            <th style="width: 15%">Категория</th>
                            <th style="width: 10%">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($podcategories as $podcategory)
                        <tr>
                            <td>{{$podcategory['id']}}</td>
                            <td>{{$podcategory['title']}}</td>
                            <td>{{$podcategory->category['title']}}</td>
                            <td>{{$podcategory['price']}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('podcategory.edit', $podcategory['id'])}}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Редактировать
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                                    <i class="fas fa-trash"></i>
                                    Удалить
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <!-- Модальное окно для удаления категорий -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Вы действительно хотите удалить подкатегорию: <strong>{{$podcategory['title'], $podcategory['id']}}</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Закрыть</button>
                        <form action="{{route('podcategory.destroy', $podcategory['id'])}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="fas fa-trash">
                                </i>
                                Да, удалить
                            </button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления категорий -->
    </section>
@endsection