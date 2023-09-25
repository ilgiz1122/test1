@extends('layouts.app')

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
            <h6 class="pt-3 mb-4">Модераторлор<span data-bs-toggle="tooltip" data-bs-placement="right" title="Количество уроков"> ({{count($moderators)}})</span></h6>
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
              
          

              <div class="table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    @foreach ($moderators as $moderator)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>
                        @if($moderator->f_fio != null)
                          {{$moderator->f_fio}} {{mb_substr($moderator->i_fio, 0, 1)}}.{{mb_substr($moderator->o_fio, 0, 1)}}.
                        @else
                          {{$moderator->name}}
                        @endif
                      </td>
                      <td>{{$moderator->email}}</td>
                      <td>
                          @php 
                            $moderator2 = $moderators_function->where('user_id', $moderator->id)->first();
                          @endphp


                          @if($moderator2 != null)
                            @if($moderator2->olimpiada_plus_user === 1)
                            <i class="far fa-check-circle pr-2" style="color: #28a745;"></i>

                              <a type="button" class="for_minus_moderator" data-toggle="modal" data-target="#staticBackdrop2" 
                              @if($moderator->f_fio != null) data-fio_2="{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}" @else data-fio_2="{{$moderator->name}}" @endif data-id2="{{route('admin_olimpiada_moderators_minus', ['user_id' => $moderator->id])}}">
                                <i class="fas fa-times" style="color: red;"></i>
                              </a>
                            @else
                              <a type="button" class="for_plus_moderator" data-toggle="modal" data-target="#staticBackdrop" 
                              @if($moderator->f_fio != null) data-fio_1="{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}" @else data-fio_1="{{$moderator->name}}" @endif data-id1="{{route('admin_olimpiada_moderators_plus', ['user_id' => $moderator->id])}}">
                                <i class="fas fa-plus"></i>
                              </a>
                            @endif
                          @else
                            <a type="button" class="for_plus_moderator" data-toggle="modal" data-target="#staticBackdrop" 
                            @if($moderator->f_fio != null) data-fio_1="{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}" @else data-fio_1="{{$moderator->name}}" @endif data-id1="{{route('admin_olimpiada_moderators_plus', ['user_id' => $moderator->id])}}">
                              <i class="fas fa-plus"></i>
                            </a>
                          @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">ФИО:<span class="float-right fio_1"></span></p><hr class="mt-1">
                      <p class="mb-0 pt-1">Олимпидага катышуучуларды бекер кошуу мүмкүнчүлүгүн берүү</p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Отмена</button>
                        <form method="POST" id="plus_1"  style="display: inline-block;" action="">
                            @csrf
                              <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-plus pr-2"></i> Ок
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop2" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel2">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">ФИО:<span class="float-right fio_2"></span></p><hr class="mt-1">
                      <p class="mb-0 pt-1">Олимпидага катышуучуларды бекер кошуу мүмкүнчүлүгүн жокко чыгаруу</p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Отмена</button>
                        <form method="POST" id="plus_2"  style="display: inline-block;" action="">
                            @csrf
                              <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-plus pr-2"></i> Ок
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>



//для модального окна удаления
$(function() {
  $(".for_plus_moderator").click(
    function() {
      var fio_1 = $(this).attr('data-fio_1');
      var id1 = $(this).attr('data-id1');


      $(".fio_1").text(fio_1);
      $("#plus_1").attr('action', id1);
    })
});

$(function() {
  $(".for_minus_moderator").click(
    function() {
      var fio_2 = $(this).attr('data-fio_2');
      var id2 = $(this).attr('data-id2');


      $(".fio_2").text(fio_2);
      $("#plus_2").attr('action', id2);
    })
});
//для модального окна удаления


</script>
@endsection