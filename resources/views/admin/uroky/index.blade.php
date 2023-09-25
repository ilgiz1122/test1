@extends('layouts.app')

@section('title', 'Все уроки')

@section('content')
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Все уроки</h1>
                </div>
                <div class="col">
                    <a class="btn btn-success btn-block btn-lg" href="{{ route('uroky.create')}}">
                        <i class="fas fa-plus"></i> Добавить
                    </a>
                </div>
            </div>
            <!--Окно для уведомлений (успушно  удалена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Х</button>
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
                            <th style="width: 4%">ID</th>
                            <th style="width: 45%">Тема урока</th>
                            <th style="width: 20%">Подкатегория</th>
                            <th style="width: 35%">Преподаватель</th>
                            <th style="width: 5%"></th>
                            <th style="width: 5%"></th>
                    </thead>
                    <tbody>
                       @foreach ($urokies as $urokies)
                        <tr>
                            <td>{{$urokies['id']}}</td>
                            <td class="text-truncate" style="max-width: 250px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$urokies['title']}}">{{$urokies['title']}}</td>
                            <td>{{$urokies->podcategory['title']}}</td>
                            <td>{{$urokies->user['name']}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Редактировать" href="{{route('uroky.edit', $urokies['id'])}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" data-toggle="modal" data-target="#staticBackdrop" data-id="{{$urokies['id']}}" value="{{$urokies['id']}}" onclick="newVal(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

<script type="text/javascript"> function newVal(t){
    var res = $(t).attr('value');
    $('#butOk').val(res);
    return false;}
</script>
        <!-- Модальное окно для удаления категорий -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Вы действительно хотите удалить подкатегорию: <strong></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Закрыть</button>
                        <form action="{{route('uroky.destroy', $urokies['id'])}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="butOk" name="delete" value="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop">
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