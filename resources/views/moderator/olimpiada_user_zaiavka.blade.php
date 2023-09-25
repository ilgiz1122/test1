@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
  .todo-list2 .for_ico{
    will-change: transform;
    transition: transform 400ms;
  }
  .todo-list2:hover .for_ico {
    transition: transform 300ms;
      transform: translateX(2px);
      color: #28a745;
  }
  .two2{
    will-change: transform;
    transition: transform 400ms;
  }
  .two2:hover {
    transition: transform 300ms;
      background-color: #f4f6f9;
  }

@media (max-width: 768px) {
  .knopka_numerasi {
    display: none;
  }
}


.for_num1 {
  display: none;
}

.for_num2 {
  display: inline-block;
}

.card-header22{
  cursor: move;
}
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid"  id="accordion">
          <div class="row align-items-center mb-3 pt-2">
            <div class="col" >
              <h6 class="pt-2 mb-2">Заявкалар<span data-bs-toggle="tooltip" data-bs-placement="right" title="Количество уроков"> ({{count($olimpiada_registrasia_users) + $olimpiada_registrasia_users_count}})</span></h6>
            </div>
            <div class="col-md-auto text-right float-right">
              <div class="row align-items-center">
                <div class="col">
                  @if(\Auth::user()->for_role == 3)
                    @if($moderator_function->olimpiada_plus_user === 1)
                      <i class="far fa-check-circle pr-2" title="Олимпидага катышуучуларды бекер кошуу мүмкүнчүлүгүңүз бар" style="color: #28a745;"></i>
                    @endif
                  @endif
                  @if(\Auth::user()->for_role == 2)
                    <i class="far fa-check-circle pr-2" title="Олимпидага катышуучуларды бекер кошуу мүмкүнчүлүгүңүз бар" style="color: #28a745;"></i>
                  @endif
                  
                </div>
                <div class="col-auto">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-block btn-sm @if($oplata == 0) active @endif float-right" href="{{ route('moderator_olimpiada_user_zaiavka', ['olimpiada_id' => $olimpiada->id, 'oplata' => '0']) }}">Төлөнө элек
                          @if($oplata == 0)
                            ({{count($olimpiada_registrasia_users)}})
                          @endif
                          @if($oplata == 1)
                            ({{$olimpiada_registrasia_users_count}})
                          @endif
                        </a>
                    </li>
                    <li class="nav-item pr-0 pl-2">
                        <a class="btn btn-outline-info btn-sm btn-block float-right @if($oplata == 1) active @endif " href="{{ route('moderator_olimpiada_user_zaiavka', ['olimpiada_id' => $olimpiada->id, 'oplata' => '1']) }}">Төлөндү 
                          @if($oplata == 1)
                            ({{count($olimpiada_registrasia_users)}})
                          @endif
                          @if($oplata == 0)
                            ({{$olimpiada_registrasia_users_count}})
                          @endif
                        </a>
                    </li>
                  </ul>
                </div>
              </div>
              
            </div>
          </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h7><i class="icon fas fa-check"></i> {{ session('success') }}</h7>
                </div>
            @endif
            @if (session('success2'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h7><i class="icon fas fa-check"></i> {{ session('success2') }}</h7>
                </div>
            @endif
              
              
              <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                      <table class="table table-head-fixed table-hover text-nowrap mb-0">
                        <tbody class="align-middle">
                           @foreach ($olimpiada_registrasia_users as $olimpiada_registrasia_user)
                          <tr>
                            <td width="1px" class="pt-1 pb-0 pl-0 pr-0 align-middle ">
                              <div class="icheck-primary d-inline ml-0">
                                <input type="checkbox" value="{{$olimpiada_registrasia_user->id}}" name="test_id" id="todoCheck{{$loop->iteration}}">
                                <label for="todoCheck{{$loop->iteration}}"></label>
                              </div>
                            </td>
                            <td class="p-1 align-middle ">
                              <div class="user-block1">
                                  <span class="username1 ml-0 d-inline-block text-truncate pb-0" style="max-width: 230px;">{{$olimpiada_registrasia_user->user->f_fio}} {{$olimpiada_registrasia_user->user->i_fio}} {{$olimpiada_registrasia_user->user->o_fio}}</span>
                                  <span class="description1 ml-0 pt-0">{{$olimpiada_registrasia_user['created_at']->format('d.m.Y (H:i)')}} / </span>
                              </div>
                            </td>
                            @if($olimpiada_tury != null)
                            <td class="p-1 align-middle ">

                              @if($oplata == 1)

                                <a class="" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="100,250">
                                  @if (intval($olimpiada_registrasia_user->status) == 0)
                                  <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 15px;"></span>
                                      <span class="badge"><i class="fas fa-times" style="font-size: 13px; color: #dc3545;"></i></span>
                                  </small></p>
                                    @else
                                    <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;"></span>
                                      <span class="badge"><i class="fas fa-check" style="font-size: 13px; color: #28a745;"></i> </span>
                                    </small></p>
                                  @endif
                                </a>
                                <!-- dropdown-menu -->
                                <div class="dropdown-menu dropdown-menu-left pt-0 pb-0">
                                  <a type="button" class="dropdown-item" @if (intval($olimpiada_registrasia_user->status) == 1) href="javascript:void(0)" @else href="{{route('moderator_olimpiada_status1_user', ['olimpiada_registrasia_user_id' => $olimpiada_registrasia_user->id])}}" @endif>
                                    <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Ачык
                                            <span class="float-right text-sm">@if (intval($olimpiada_registrasia_user->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                          </h3>
                                        </div>
                                      </div>
                                  </a>
                                  <div class="dropdown-divider  mb-0 mt-0"></div>
                                  <a type="button" class="dropdown-item" @if (intval($olimpiada_registrasia_user->status) == 0) href="javascript:void(0)" @else href="{{route('moderator_olimpiada_status2_user', ['olimpiada_registrasia_user_id' => $olimpiada_registrasia_user->id])}}" @endif>
                                    <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Жабык
                                            <span class="float-right text-sm">@if (intval($olimpiada_registrasia_user->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                          </h3>
                                        </div>
                                      </div>
                                  </a>
                                </div>
                                <!-- dropdown-menu -->
                              @endif

                              @if($oplata == 0)
                                <a type="button" class="for_plus_moderator" data-toggle="modal" data-target="#staticBackdrop" 
                                data-fio_1="{{$olimpiada_registrasia_user->user->f_fio}} {{$olimpiada_registrasia_user->user->i_fio}} {{$olimpiada_registrasia_user->user->o_fio}}" data-id1="{{route('moderator_olimpiada_plus_user', ['olimpiada_id' => $olimpiada->id, 'user_id' => $olimpiada_registrasia_user->user_id])}}">
                                  <i class="fas fa-plus"></i>
                                </a>
                              @endif
                            </td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                    </table><!-- /.table --> 
              </div><!-- /.mail-box-messages -->
         
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
            

        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Олимпиадага кошуу</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">ФИО:<span class="float-right fio_1"></span></p><hr class="mt-1">
                      <p class="mb-0 pt-1 text-center">Олимпидага катышууга мүмкүнчүлүк берүү
                        <br><small>(
                          @if($oplata == 0)
                            @if(\Auth::user()->for_role == 3)
                              @if($moderator_function->olimpiada_plus_user === 1)
                                Бекер кошулат
                              @else
                                Сиздин эсептен кемитилет
                              @endif
                            @endif
                            @if(\Auth::user()->for_role == 2)
                              Бекер кошулат
                            @endif
                          @endif
                        )</small>
                      </p>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Отмена</button>   
                        <a id="plus_1" href="" class="btn btn-sm btn-success"><i class="fas fa-plus pr-2"></i> Ок</a>                      
                    </div>
                </div>
            </div>
        </div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

//для модального окна удаления
$(function() {
  $(".for_plus_moderator").click(
    function() {
      var fio_1 = $(this).attr('data-fio_1');
      var id1 = $(this).attr('data-id1');


      $(".fio_1").text(fio_1);
      $("#plus_1").attr('href', id1);
    })
});
//для модального окна удаления

</script>
@endsection