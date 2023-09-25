@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }

  .todo-list2 .tools2 {
  opacity: 0;
}

.todo-list2:hover .tools2 {
  opacity: 1;
}
input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
  }
 
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h5 class="pt-2 mb-2"></h5>
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
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title pt-1">Материалдардын тизмеси ({{count($materialies)}})</h3>

              <div class="card-tools">
                @if(\Auth::user()->id == 2)
                <a class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить материал" href="{{ route('moderator_materials_create_for_primaya_ssylka')}}">
                    <i class="fas fa-plus"></i> Добавить2
                </a>
                @endif
                <a class="btn btn-sm btn-success" title="Жаңы материал кошуу" href="{{ route('moderator_materials_create', ['for_action' => $for_action])}}">
                    <span class="pl-2 pr-2"><i class="fas fa-plus pr-2"></i> Кошуу</span>
                </a> 
              </div>
              <!-- /.card-tools -->

            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <!--<div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>-->
              <div class="table-responsive mailbox-messages" style="max-height: 550px;">
                <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="pt-1 pb-1 pl-3">№</th>
                            <th class="pt-1 pb-1">Тема</th>
                            <th class="pt-1 pb-1">Подкатегория</th>
                            <th class="pt-1 pb-1">Тили</th>
                            <th class="pt-1 pb-1" class="pt-1 pb-1">Баасы</th>
                            <th class="pt-1 pb-1">Сатылды</th>
                            <th class="pt-1 pb-1">Партнерка</th>
                            <th class="pt-1 pb-1" style="padding-right: 12px;"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       @foreach ($materialies as $materialy)
                        <tr class="todo-list2">
                            <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                            <td class="align-middle">
                                <div class="user-block1">
                                    <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                    <span class="description1 ml-0">{{ $materialy->type }} ({{ $materialy->size }} mb) / {{$materialy['created_at']->format('d.m.Y')}}</span>
                                </div>
                            </td>
                            <td class="align-middle">{{$materialy->materialpodcategory['title']}}</td>
                            <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                            <td class="align-middle">
                              <div class=" dropup">
                              <a class="" style="color: black;" data-toggle="dropdown" id="dropdownMenuOffset3" type="button"  data-offset="50,0">
                                {{ $materialy->price / 100}} сом
                              </a>
                                <!-- dropdown-menu -->
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0">
                                  <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Баасы</p>
                                  <div class="dropdown-divider mb-0 mt-0"></div>
                                  <form class="" method="POST" action="{{ route('moderator_materialy_update_price', $materialy['id']) }}">
                                  @csrf
                                  @method('PUT')
                                    <div class="input-group pt-2 pb-2 pr-2 pl-2">
                                      <input class="form-control" type="number" pattern="\d+" name="price" min="0" max="99999" maxlength="5" placeholder="Например: 30 " value="{{$materialy->price / 100}}">
                                      <div class="input-group-append">
                                        <span class="input-group-text">сом</span>
                                      </div>
                                    </div>
                                    <div class="pt-2 pb-2 pr-2 pl-2 mb-2">
                                      <button type="submit" class="btn btn-info btn-sm float-right">Сактоо</button>
                                    </div>
                                    <div class="pt-2 pb-2 pr-2 pl-2 mb-2"></div>
                                  </form> 
                                </div>
                                <!-- dropdown-menu -->
                                </div>
                            </td>
                            <td class="align-middle">{{$materialy->kupitmaterialov_count}}</td>
                            <td  class="align-middle dropleft">
                              @if($materialy->price > 0)
                              <a class="" data-toggle="dropdown" id="dropdownMenuOffset2" type="button"  data-offset="0,10">
                                @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                              </a>
                              <!-- dropdown-menu -->
                              <div class="dropdown-menu dropdown-menu-right pt-0 pb-0 ">
                                <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Өнөктөш программа</p>
                                <div class="dropdown-divider mb-0 mt-0"></div>
                                <form method="POST" action="{{ route('moderator_materialy_update_partnerka1', $materialy['id']) }}">
                                @csrf
                                @method('PUT')
                                  <input type="number" name="partnerka1" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                  <button type="submit"  class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                      <div class="media-body">
                                        <h3 class="dropdown-item-title pt-2 pb-2">
                                          Катышуу
                                          <span class="float-right text-sm">@if (intval($materialy->partnerka) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                        </h3>
                            
                                      </div>
                                    </div>
                                  </button>
                                </form> 
                                <div class="dropdown-divider  mb-0 mt-0"></div>

                                <form method="POST" action="{{ route('moderator_materialy_update_partnerka2', $materialy['id']) }}">
                                @csrf
                                @method('PUT')
                                  <input type="number" name="partnerka2" min="0" maxlength="1" class="form-control" value="0" hidden="">
                                  <button type="submit"  class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                      <div class="media-body">
                                        <h3 class="dropdown-item-title pt-2 pb-2">
                                          Баш тартуу
                                          <span class="float-right text-sm">@if (intval($materialy->partnerka) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                        </h3>
                                      </div>
                                    </div>
                                    <!-- Message End -->
                                  </button>
                                </form> 
                              </div>
                              <!-- dropdown-menu -->
                              @endif
                            </td>
                            <td class="align-middle">
                              
                              @if($materialy->ssylka != null)
                                <a class="btn btn-tool tools2" href="{{ route('moderator_materials_edit', ['for_action' => $for_action, 'id' => $materialy['id']]) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Редактировать">
                                  <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                </a>
                              @else
                                <a class="btn btn-tool tools2" href="{{ route('moderator_materials_edit_for_primaya_ssylka', $materialy['id']) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Редактировать">
                                  <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                </a>
                              @endif 
                              

                              <a type="button" class="btn btn-tool w-10000 tools2" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $materialy->title }}" data-kol="{{$materialy->kupitmaterialov_count}}" data-price="{{ $materialy->price / 100 }}" data-rasshirenie="{{ $materialy->type }}" data-razmer="{{ $materialy->size }}" data-id2="{{route('matdelete.destroy', $materialy['id'])}}">
                                <i class="fas fa-trash" style="font-size: 1.2em;"></i>
                              </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table --> 
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <!--<div class="card-footer p-0">
              <div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                  <i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Аракетти ырастоо</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема <span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-0">Тиби (өлчөмү) <span class="float-right"><span class="var_title3"></span> (<span class="var_title4"></span> <span>MB</span>)</span></p><hr class="mt-1">
                      <p class="mb-0">Баасы <span class="float-right"><span class="var_title6"></span> <span>сом</span></span></p><hr class="mt-1">
                      <p class="mb-0">Сатылды <span class="float-right var_title2"></span></p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Жабуу</button>
                        <form method="POST" id="delet"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                          <i class="fas fa-trash"></i> Өчүрүү
                        </button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(function() {
  $(".w-10000").click(
    function() {
      var kol = $(this).attr('data-kol');
      var title = $(this).attr('data-title');
      var price = $(this).attr('data-price');
      var rasshirenie = $(this).attr('data-rasshirenie');
      var razmer = $(this).attr('data-razmer');
      var id2 = $(this).attr('data-id2');


      $(".var_title").text(title);
      $(".var_title2").text(kol);
      $(".var_title3").text(rasshirenie);
      $(".var_title4").text(razmer);
      $(".var_title6").text(price);     

      $("#delet").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});



$(function() {
  $(".w-1001").click(
    function() {
      var img1 = $(this).attr('data-img1');
      var img2 = $(this).attr('data-img2');
      var img3 = $(this).attr('data-img3');
      var title1 = $(this).attr('data-title1');
      


      $("#rebate_old_imag23").attr('src', img1);
      $("#rebate_old_imag24").attr('src', img2);
      $("#rebate_old_imag25").attr('src', img3);
      $(".var_title7").text(title1);
      


      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});


</script>
@endsection