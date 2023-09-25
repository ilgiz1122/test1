@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h4 class="m-0">Бардык колдонуучулар</h4>
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
                <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="pt-1 pb-1 pl-3">ID</th>
                            <th class="pt-1 pb-1">ФИО</th>
                            <th class="pt-1 pb-1">email</th>
                            <th class="pt-1 pb-1">Баланс</th>
                            <th class="pt-1 pb-1">Телефон</th>
                            <th class="pt-1 pb-1" style="padding-right: 12px;"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       @foreach ($users as $user)
                        <tr class="todo-list2">
                            <td class="align-middle pl-3"><b>{{$user['id']}}</b></td>
                            <td class="align-middle">
                                <div class="user-block1">
                                    <span class="username1 ml-0 d-inline-block">{{$user['name']}}</span>
                                    <span class="description1 ml-0">Катталган: {{$user['created_at']->format('d.m.Y')}}</span>
                                </div>
                            </td>
                            <td class="align-middle">{{$user['email']}}</td>
                            <td class="align-middle">{{$user['balance'] / 100}}</td>
                            <td class="align-middle">{{$user['phone']}}</td>
                            <td class="align-middle">
                                <a class="btn btn-tool w-1001  tools2" type="button" >
                                    <i class="far fa-eye" style="font-size: 1.2em;"></i>
                                </a>
                              
                                <a class="btn btn-tool tools2" href="{{route('user.edit', $user['id'])}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Редактировать">
                                  <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                </a>
                                <a type="button" class="btn btn-tool w-10000 tools2" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" data-toggle="modal" data-target="#staticBackdrop">
                                    <i class="fas fa-trash" style="font-size: 1.2em;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>



        <!-- Модальное окно для удаления -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">  
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Вы действительно хотите удалить выбранную категорию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Закрыть</button>
                        <form action="" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="fas fa-trash"></i>
                                Да, удалить
                            </button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления -->

        <!-- Модальное окно для редактирования -->
        <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">  
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel2">Вы действительно хотите удалить выбранную категорию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Закрыть</button>
                        <form action="" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop2">
                                <i class="fas fa-trash"></i>
                                Да, удалить
                            </button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для редактирования-->
    </section>
@endsection