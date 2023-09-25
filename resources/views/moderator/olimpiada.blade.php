@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
  .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-4px);
  }
  .scale {
    transition: 1s; /* Время эффекта */
   }
   .scale:hover {
    transform: scale(1.03); /* Увеличиваем масштаб */
   }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
  }

.todo-list2 .tools2 {
  display: none;
}

.todo-list2:hover .tools2 {
  display: inline-block;
}
label {
    font-size: 1rem;
    font-weight:normal;
}
.hover1:hover {
    background: #f8f9fa;
}
.hover1:hover .color1{
    background: #f8f9fa;
}
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }
   
</style>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


          <div class="row align-items-center mb-3 pt-3">
            <div class="col-10" >
              <h5 class="pt-2 mb-2">Список олимпиад <span data-bs-toggle="tooltip" data-bs-placement="right" title="Количество олимпиад">({{count($olimpiadas)}})</span></h5>
            </div>
            <div class="col-2" >
              <a class="btn btn-sm btn-success float-right text-nowrap" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить товар" href="{{ route('moderator_olimpiada_create')}}">
                  <i class="fas fa-plus"></i> Добавить
              </a> 
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


            @foreach ($olimpiadas as $olimpiada)
            <div class="card mb-3 todo-list2 accordion{{$olimpiada->id}}"  id="accordion{{$olimpiada->id}}">
              <div class="row no-gutters align-items-center">
                <div class="col-md-3">
                    <img src="{{asset('')}}/storage/olimpiada/images/thumbnail/{{$olimpiada->img2}}" class="card-img shadow-sm" alt="..." style="border-radius: 4px;">
                </div>

                <div class="col-md-9">
                  <div class="row mr-0 ml-0  align-items-center"> 
                    <div class="col-md-11 pr-0 pl-0">
                      <div class="card-body pr-2 pl-2 pt-3 pb-2">
                        <div class="row">
                          <div class="col">
                            <h6 class=" text-truncate" title="{{$olimpiada->title}}">{{$olimpiada->title}}</h6>
                          </div>
                          <div class="col-auto">
                                <!-- Main content 
                            <a class="btn btn-tool w-1001" href="{{ route('moderator_kurs_certificate', $olimpiada['id']) }}">
                              <span style="font-size: 1.4em;" data-toggle="tooltip" data-placement="left" title="Сертификат">
                                <i class="fas fa-award"></i>
                              </span>
                            </a>-->
                          </div>
                        </div>
                        <p class="text-truncate mb-0"  style="max-width: 500px;">
                        <small class="text-muted">Турлардын саны: {{$olimpiada->olimpiada_tury_count}} / Язык: @if(intval($olimpiada->language) != 4 ){{$olimpiada->languages['language']}}@else - @endif </small></p>
                        
                        <p class="card-text text-muted mb-0 mt-1">Категория: {{$olimpiada->predmety->title}} / {{$olimpiada->klassy->number}}-{{$olimpiada->klassy->title}}</p>
                        <div class="row align-items-center ml-0 mr-0 mt-3">
                          <div class="col border text-center shadow-sm two dropup" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px;">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset2" type="button"  data-offset="194,15">
                              <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 15px;">Телефон: </span>
                                  <span class="badge"><i class="fas fa-phone-alt" @if($olimpiada->phone_for_zvonok != null) style="font-size: 13px; color: #28a745;" @else style="font-size: 13px; color: #dc3545;" @endif></i></span>
                              </small></p>
                            </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Телефон (чалуу үчүн)</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form class="" method="POST" action="{{ route('moderator_olimpiada_update_phone_for_zvonok', $olimpiada['id']) }}">
                              @csrf
                              @method('PUT')
                                <div class="row align-items-end hover1 ml-2 mr-2">
                                  <div class="col-auto pr-0 pl-0">
                                    <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fas fa-phone-alt pr-3" style="color: green; font-size: 20px;"></i> +996</p>
                                  </div>
                                  <div class="col pl-0 pr-0">
                                    <input name="phone_for_zvonok" value="{{ $olimpiada->phone_for_zvonok }}" type="text" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-1 color1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999" required="true">
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


                          <div class="col border text-center shadow-sm two dropup">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset10" type="button"  data-offset="115,15">
                              <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 15px;">WhatsApp: </span>
                                  <span class="badge"><i class="fab fa-whatsapp" @if($olimpiada->phone_for_whatsapp != null) style="font-size: 13px; color: #28a745;" @else style="font-size: 13px; color: #dc3545;" @endif></i></span>
                              </small></p>
                            </a> 
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">WhatsApp номер</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form class="" method="POST" action="{{ route('moderator_olimpiada_update_phone_for_whatsapp', $olimpiada['id']) }}">
                              @csrf
                              @method('PUT')
                                <div class="row align-items-end hover1 ml-2 mr-2">
                                  <div class="col-auto pr-0 pl-0">
                                    <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-whatsapp pr-3" style="color: green; font-size: 20px;"></i> +996</p>
                                  </div>
                                  <div class="col pl-0 pr-0">
                                    <input name="phone_for_whatsapp" value="{{ $olimpiada->phone_for_whatsapp }}" type="text" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-1 color1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999">
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


                          <div class="col border text-center shadow-sm two dropup">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset3" type="button"  data-offset="50,15">
                            <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 10px;">Telegram: </span><span class="badge"><i class="fab fa-telegram-plane" @if($olimpiada->telegram != null) style="font-size: 13px; color: #28a745;" @else style="font-size: 13px; color: #dc3545;" @endif></i></span></small></p>
                            </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Telegram <small>(Имя пользователя)</small></p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form class="" method="POST" action="{{ route('moderator_olimpiada_update_phone_for_telegram', $olimpiada['id']) }}">
                              @csrf
                              @method('PUT')
                                <div class="row align-items-end hover1 ml-2 mr-2">
                                  <div class="col-auto pr-0 pl-0">
                                    <p class="form-control form-control-border color1 pr-0 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-telegram-plane pr-2" style="color: green; font-size: 20px;"></i> https://t.me/</p>
                                  </div>
                                  <div class="col pl-0 pr-0">
                                    <input name="for_telegram" value="{{ $olimpiada->telegram }}" type="text" class="form-control form-control-border  pr-1 pl-0 pt-2 pb-1 color1" placeholder="nonsi_kg">
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
                          <div class="col border text-center shadow-sm two dropup" style="border-top-right-radius: 3px; border-bottom-right-radius: 3px;">
                              <a class="" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="10,15">
                              @if (intval($olimpiada->status) == 0)
                              <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 15px;">Статус: </span>
                                  <span class="badge"><i class="fas fa-times" style="font-size: 13px; color: #dc3545;"></i></span>
                              </small></p>
                                @else
                                <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                  <small class="badge badge-success"><i class="fas fa-check"></i> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">активна</font></font></small>
                                </small></p>
                              @endif
                              </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                              <form method="POST" action="{{ route('moderator_olimpiada_update_status1', $olimpiada['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="status" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Активный
                                        <span class="float-right text-sm">@if (intval($olimpiada->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                          
                                    </div>
                                  </div>
                                </button>
                              </form> 
                              <div class="dropdown-divider  mb-0 mt-0"></div>

                              <form method="POST" action="{{ route('moderator_olimpiada_update_status0', $olimpiada['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="status2" min="0" max="1" maxlength="1" class="form-control" value="0" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Скрытый
                                        <span class="float-right text-sm">@if (intval($olimpiada->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                                    </div>
                                  </div>
                                  <!-- Message End -->
                                </button>
                              </form> 
                            </div>
                            <!-- dropdown-menu -->
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-1 text-right tools2" style="line-height: 2.2rem; word-spacing: 30px;">
                          <a class="btn btn-tool w-1001" href="{{ route('moderator_olimpiada_tury_index', $olimpiada['id']) }}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Туры олимпиады">
                              <i class="fas fa-list-ul"></i>
                            </span>
                          </a>

                          <a class="btn btn-tool" role="button" href="{{ route('moderator_olimpiada_user_zaiavka', ['olimpiada_id' => $olimpiada->id, 'oplata' => '0']) }}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Заявкалар">
                              <i class="fas fa-users"></i>
                            </span>
                          </a>

                          <!--<a class="btn btn-tool w-1001 for_modal_view" data-toggle="collapse" href="#testr{{ $loop->iteration }}" role="button">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Посмотреть видео о курсе">
                              <i class="far fa-eye"></i>
                            </span>
                          </a>-->
                        
                          <a class="btn btn-tool" href="{{ route('moderator_olimpiada_edit', ['olimpiada_id' => $olimpiada['id']]) }}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Редактировать">
                              <i class="far fa-edit" style="transform: scale(-1, 1);"></i>
                            </span>
                          </a>
                          <!--
                          <a class="btn btn-tool w-1001 for_modal_delete" type="button" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $olimpiada->title }}" data-kol="{{$olimpiada->kupit_count}}" data-price="{{ $olimpiada->price / 100 }}" data-id2="{{route('moderator_vitrina_destroy', $olimpiada['id'])}}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Удалить">
                              <i class="fas fa-trash"></i>
                            </span>
                          </a>-->
                    </div>


                  </div>
                </div>
              </div>
            </div>
          @endforeach
          
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема <span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-0">Цена <span class="float-right"><span class="var_title6"></span> <span>сом</span></span></p><hr class="mt-1">
                      <p class="mb-0">Количество продаж <span class="float-right var_title2"></span></p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Нет, не удалять</button>
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




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(function() {
  $(".for_modal_delete").click(
    function() {
      var kol = $(this).attr('data-kol');
      var title = $(this).attr('data-title');
      var price = $(this).attr('data-price');
      var id2 = $(this).attr('data-id2');


      $(".var_title").text(title);
      $(".var_title2").text(kol);
      $(".var_title6").text(price);
      $("#delet").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});





$(document).ready(function() {
        $(document).on('click', '.dropdown-menu', function (e) {
            $(this).hasClass('keep_open') && e.stopPropagation(); // This replace if conditional.
        }); 
    });


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 

</script>
@endsection