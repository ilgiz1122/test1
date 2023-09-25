@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')

<style type="text/css">

    .truncate2 {
        
        white-space: nowrap; /* Текст не переносится */
        overflow: hidden; /* Обрезаем всё за пределами блока */
        text-overflow: ellipsis; /* Добавляем многоточие */
        padding-right: 15px;
       }
    
    .ttrree{
      display: none;
    }
       
</style>


<section class="content">
    <div class="row align-items-center mb-1">
        <div class="col">
            <section class="content-header pl-0 pr-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="">
                            <i class="nav-icon fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Сертификаттар</li>
                </ol>
            </section>
        </div>
        <div class="col-md-auto">
          <a class="btn btn-success btn-sm float-right" type="button" href="{{route('admin_certificate_users_plus')}}"><i class="fas fa-plus pr-2"></i> Кошуу</a>
        </div>
      </div>

    

          @if (session('success'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
              </div>
          @endif
          @if (session('success2'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h5><i class="icon fas fa-check"></i> {{ session('success2') }}</h5>
              </div>
          @endif

        <div class="table-responsive" >
            <table class="table table-hover table-head-fixed border" id="table">
                <thead>
                    <tr>
                        <th class="pt-2 pb-2 pl-3" width="1">№</th>
                        <th class="pt-2 pb-2">ФИО / Датасы</th>
                        <th class="pt-2 pb-2">Номери</th>
                        <th class=""  title="Статус">Статус</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($certificate_users as $certificate_user)
                    <tr class="todo-list2">
                        <td class="align-middle pl-3"><b>{{$loop->iteration}}</b></td>
                        <td class="align-middle">
                            <div class="user-block1">
                                <span class="username1 ml-0 d-inline-block">{{$certificate_user->fio}}</span>
                                <span class="description1 ml-0">Дата: {{date('d/m/Y', $certificate_user->data_in_certificate)}}</span>
                            </div>
                        </td>
                        <td class="align-middle">№ {{$certificate_user->nomer_certificata}}</td>
                        <td class="align-middle">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-switch">
                                            <input data-id="{{$certificate_user->id}}" type="checkbox" name="checkbox_name_{{$certificate_user->id}}" class="custom-control-input" id="customSwitch0{{$certificate_user->id}}" style="cursor: pointer;" @if($certificate_user->status == 1) checked="" @endif>
                                            <label class="custom-control-label status_comment" data-id1="{{$certificate_user->id}}" style="cursor: pointer;" for="customSwitch0{{$certificate_user->id}}" ></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <a class="btn btn-tool tools2" href="{{ route('admin_certificate_users_edit', $certificate_user->id) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Редактировать">
                                        <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                    </a>
                                    <a type="button" class="btn btn-tool w-10000 tools2 for_modal_delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" data-toggle="modal" data-target="#staticBackdrop" data-fio="{{$certificate_user->fio}}" data-number="№ {{$certificate_user->nomer_certificata}}" data-id2="{{route('admin_certificate_users_delete', $certificate_user->id)}}">
                                          <i class="fas fa-trash" style="font-size: 1.2em;"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                  @endforeach 
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{$certificate_users->links()}}
        </div>
<!-- Модальное окно для удаления материалов -->
<div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">  
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Сертификатты өчүрүү</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <p class="mb-0 pt-1">ФИО <span class="float-right var_title"></span></p><hr class="mt-1">
              <p class="mb-0">Номер <span class="float-right"><span class="var_title6"></span> <span>сом</span></span></p>
                                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Нет, не удалять</button>
                <form method="POST" id="delet"  style="display: inline-block;" action="">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-trash"></i> Да, удалить
                  </button>
                </form>                         
            </div>
        </div>
    </div>
</div>
<!-- Модальное окно для удаления материалов -->

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    
    
    
    $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        $(document).ready(function(){
          $('.status_comment').click(function() {
            var countryID1 = $(this).attr('data-id1');
            if(countryID1)
            {
              jQuery.ajax({
                  url : '/admin_panel/certificate_users/status/' +countryID1,
                  type : "GET",
                  dataType : "json",
                  success:function(data){Toast.fire({icon: 'success', title: 'Статус өзгөртүлдү'});}
              });
            }else{}
            
          });
        });
    });

    
$(function() {
  $(".for_modal_delete").click(
    function() {
      var fio = $(this).attr('data-fio');
      var number = $(this).attr('data-number');
      var id2 = $(this).attr('data-id2');


      $(".var_title").text(fio);
      $(".var_title6").text(number);
      $("#delet").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});
    
    </script>
@endsection
