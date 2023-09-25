@extends('layouts.app')

@section('title', 'Все категории')

@section('content')

<style>
    .cursor{
        cursor: pointer;
    }
    .img-svg {
        width: 35px;
    height: 35px;
    }
    .img-svg path{
        fill: #d3d7df;
    }

    .text11:hover {
    outline: 0; width: 100%;
    resize: none;
    border-bottom: 1px solid #17a2b8;
}

.text11:focus {
  background: #f8f9fa;
  outline: 0; width: 100%;
  resize: none;
}

.text11 {
  outline: 0; border-top: 0; border-left: 0; border-right: 0; border-bottom: 0; width: 100%;
  resize: none;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom: 1px solid white;
}

</style>
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">

            <!--Окно для уведомлений (успушно удалена) -->
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
            <!--/.Окно для уведомлений (успушно удалена) -->
        </div>
    </div>
    <!-- /.Тема -->
    <!-- Контент -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success card-outline direct-chat direct-chat-success">
                      <div class="card-header">
                        <h3 class="card-title">Сообщения</h3>

                        <div class="card-tools">
                          <!-- <span title="3 New Messages" class="badge bg-success">3</span> -->
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <!-- <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                          </button>-->
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        @foreach ($sms1s as $sms1)
                        <div class="direct-chat-messages" style="height: auto;">
                          <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-left">{{$sms1->name}} <span class="pl-3">{{$sms1->phone}}</span></span>
                              <span class="direct-chat-timestamp float-right">{{$sms1['updated_at']->format('d.m.Y')}} ({{$sms1['updated_at']->format('H:i')}})</span>
                            </div>
                            <div class="row align-items-top">
                              <div class="col-auto pr-0 dropleft">
                                <a class="btn btn-tool p-0" role="button" data-toggle="dropdown" id="dropdownMenuOffset{{$loop->iteration}}" type="button"  data-offset="0,0">
                                  <img class="img-svg direct-chat-img" src="https://nonsi.kg/public/files/icons/user.svg">
                                </a>
                                <!-- dropdown-menu -->
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0 keep_open">
                                  <a class="dropdown-item" href="{{route('udalit_sms', ['sms_id'=> $sms1->id])}}">
                                    <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            <div class="row">
                                              <div class="col">Удалить</div>
                                              <div class="col-auto">
                                                <i class="fas fa-trash btn btn-tool pb-2" style="font-size: 15px;"></i>
                                              </div>
                                            </div>
                                          </h3>
                                        </div>
                                      </div>
                                  </a>
                                  <!--<div class="dropdown-divider  mb-0 mt-0"></div>
                                  <a class="dropdown-item" href="{{route('otkaz_rola_moderatora', ['id'=> $sms1->id, 'user_id' => $sms1->id])}}">
                                    <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            <div class="row">
                                              <div class="col">Баш тартуу</div>
                                              <div class="col-auto">
                                                <i class="fas fa-times btn btn-tool pb-2" style="font-size: 15px;"></i>
                                              </div>
                                            </div>
                                          </h3>
                                        </div>
                                      </div>
                                  </a>-->
                                </div>
                                <!-- dropdown-menu -->
                              </div>
                              <div class="col">
                                <div class="direct-chat-text m-0">
                                  {{$sms1->sms}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                          {{$sms1s->links()}}
                        </div>
                        <div class="direct-chat-contacts">
                          <ul class="contacts-list">
                            <li>
                              <a href="#">
                                <img class="contacts-list-img img-svg" src="https://nonsi.kg/public/files/icons/user.svg">
                                <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                  </span>
                                  <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success card-outline direct-chat direct-chat-success">
                      <div class="card-header">
                        <h3 class="card-title">Запрос роля модератора</h3>

                        <div class="card-tools">
                          <!-- <span title="3 New Messages" class="badge bg-success">3</span> -->
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <!-- 
                          <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                          </button>
                          -->
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body" style="overflow:  hidden;">
                        @foreach ($moderators as $moderator)
                        <div class="direct-chat-messages" style="height: auto;">
                          <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-left">{{$moderator->user_name}} <span class="pl-3">{{$moderator->user_phone}}</span></span>
                              <span class="direct-chat-timestamp float-right">{{$moderator['updated_at']->format('d.m.Y')}} ({{$moderator['updated_at']->format('H:i')}})</span>
                            </div>
                            <div class="row align-items-top">
                              <div class="col-auto pr-0 dropleft">
                                <a class="btn btn-tool p-0" role="button" data-toggle="dropdown" id="dropdownMenuOffset{{$loop->iteration}}" type="button"  data-offset="0,0">
                                  <img class="img-svg direct-chat-img" src="https://nonsi.kg/public/files/icons/user.svg">
                                </a>
                                <!-- dropdown-menu -->
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0 keep_open">
                                  <a class="dropdown-item" href="{{route('sdelat_moderatorom', ['id'=> $moderator->id, 'user_id' => $moderator->user_id])}}">
                                    <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            <div class="row">
                                              <div class="col">Модератор кылуу</div>
                                              <div class="col-auto">
                                                <i class="fas fa-plus btn btn-tool pb-2" style="font-size: 15px;"></i>
                                              </div>
                                            </div>
                                          </h3>
                                        </div>
                                      </div>
                                  </a>
                                  <div class="dropdown-divider  mb-0 mt-0"></div>
                                  <a class="dropdown-item" href="{{route('otkaz_rola_moderatora', ['id'=> $moderator->id, 'user_id' => $moderator->user_id])}}">
                                    <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            <div class="row">
                                              <div class="col">Баш тартуу</div>
                                              <div class="col-auto">
                                                <i class="fas fa-times btn btn-tool pb-2" style="font-size: 15px;"></i>
                                              </div>
                                            </div>
                                          </h3>
                                        </div>
                                      </div>
                                  </a>
                                </div>
                                <!-- dropdown-menu -->
                              </div>
                              <div class="col">
                                <div class="direct-chat-text m-0">
                                <p class="text-muted mb-0 pt-3">Email: <span class="float-right">{{$moderator->user_email}}</span></p><hr class="mt-0">
                                <p class="text-muted mb-0">Област: <span class="float-right">{{$moderator->user_obl}}</span></p><hr class="mt-0">
                                <p class="text-muted mb-0">Роль: <span class="float-right">{{$moderator->user_role}}</span></p><hr class="mt-0">
                            </div>
                              </div>
                            </div>
                            
                            
                            
                          </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                          {{$moderators->links()}}
                        </div>
                        <div class="direct-chat-contacts">
                          <ul class="contacts-list">
                            <li>
                              <a href="#">
                                <img class="contacts-list-img img-svg" src="https://nonsi.kg/public/files/icons/user.svg">
                                <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                  </span>
                                  <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-6">
                  <div class="card card-success card-outline direct-chat direct-chat-success">
                      <div class="card-header">
                        <h3 class="card-title">Балансты акчага алмаштыруу</h3>

                        <div class="card-tools">
                          <!-- <span title="3 New Messages" class="badge bg-success">3</span> -->
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <!-- 
                          <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                          </button>
                          -->
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body" style="overflow:  hidden;">
                        @foreach ($user_vyplatys as $user_vyplaty)
                        <div class="direct-chat-messages" style="height: auto;">
                          <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-left">{{$user_vyplaty->user->name}} <span class="pl-3">{{$user_vyplaty->user->phone}}</span></span>
                              <span class="direct-chat-timestamp float-right">{{$user_vyplaty->created_at->format('d.m.Y')}} / {{$user_vyplaty->created_at->format('H:i')}}</span>
                            </div>
                            <div class="row align-items-top">
                              <div class="col">
                                
                                            <div class="card">
                                                <div class="card-body pb-0 pt-2 pr-2 pl-2 class11">
                                                    <a class="" data-toggle="collapse" href="#collapse{{ $loop->iteration }}" aria-expanded="false" style="color: black;">
                                                            <div class="row align-items-center border-bottom">
                                                                        <div class="col">
                                                                            <p class="mb-0">
                                                                                <span>
                                                                                    @if($user_vyplaty->variant_vyplaty->vid == 1)
                                                                                        Бирдик (единица)
                                                                                    @endif
                                                                                    @if($user_vyplaty->variant_vyplaty->vid == 2)
                                                                                        Электрондук капчык
                                                                                    @endif
                                                                                    @if($user_vyplaty->variant_vyplaty->vid == 3)
                                                                                        Карта
                                                                                    @endif
                                                                                </span><br>
                                                                                <small>
                                                                                    {{$user_vyplaty->variant_vyplaty->variant}}
                                                                                </small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p class="mb-0">
                                                                                <span>
                                                                                    @if($user_vyplaty->variant_vyplaty->vid == 3)
                                                                                        {{substr_replace($user_vyplaty->schet, ' **** **** ', 4, 11)}}
                                                                                    @else
                                                                                        {{$user_vyplaty->schet}}
                                                                                    @endif
                                                                                </span><br>
                                                                                <small>
                                                                                    {{$user_vyplaty->summa / 100}} сом / {{$user_vyplaty->user->balance / 100}} баланс
                                                                                </small>
                                                                            </p>
                                                                        </div>
                                                            </div>
                                                    </a>
                                                    <div id="collapse{{ $loop->iteration }}" class="collapse @if($loop->iteration == 1) show @endif  mt-2 mb-2"  style="">
                                                      <form action="{{ route('otvet_balans_na_som', ['id' => $user_vyplaty->id]) }}" method="POST" class="needs-validation" novalidate>
                                                        @csrf
                                                        @method('PUT')
                                                      <div class="row  align-items-center">
                                                        <div class="col-md-9">
                                                          <div class="row">
                                                            <div class="col-auto">
                                                              <select name="status" class="form-control form-control-sm" required="">
                                                                  <option value="" disabled="true" selected="true">Тандаңыз</option>
                                                                  @if($user_vyplaty->user->balance > $user_vyplaty->summa)<option value="1">Төлөндү</option>@endif
                                                                  <option value="2">Отказать</option>
                                                              </select>
                                                            </div>
                                                            <div class="col">
                                                              <textarea class="text11" rows="1" placeholder="Комментарий" name="comment">@if($user_vyplaty->user->balance < $user_vyplaty->summa)Балансыңыздагы акча каражаты жетишсиз. Азыраак сумманы көрсөтүңүз! @else Акча сиз көрсөткөн номерге (картага, электрондук капчыкка) которулду.@endif</textarea>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                          <button type="submit" class="btn float-right btn-default btn-sm">Обновить курс</button>
                                                        </div>
                                                      </div>
                                                        
                                                      </form>
                                                    </div>
                                                </div>
                                            </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                          {{$user_vyplatys->links()}}
                        </div>
                        <div class="direct-chat-contacts">
                          <ul class="contacts-list">
                            <li>
                              <a href="#">
                                <img class="contacts-list-img img-svg" src="https://nonsi.kg/public/files/icons/user.svg">
                                <div class="contacts-list-info">
                                  <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                  </span>
                                  <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
            



        <!-- Модальное окно для удаления категорий -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <p class="text-center mb-0 pt-2 pb-2"><b>Чындап эле өчүрүүнү каалайсызбы?</b></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <p class="mb-0 pt-3">Тема <span class="float-right var_title"></span></p><hr class="mt-0">
                        <p class="mb-0">Статус <span class="float-right var_kol"></span></p><hr class="mt-0">
                    </div>
                    <div class="modal-footer">
                        
                        <form action="" id="var_id" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Да, удалить
                            </button>
                        </form> 
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop2"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content" style="border-radius: 10px;">
                    <div class="card mb-0 bg-gradient-dark" style="border-radius: 10px;">
                        <div class="img3">
                            <img class="card-img-top img2" id="var_img" style="border-radius: 10px;" src="https://nonsi.kg/public/img/net_kartinki2.jpg">
                        </div>
                      <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h2 class="text-white "><b class="var_title">Тема рекламы</b></h2>
                        <p class="card-text text-white pb-1 pt-3" class="var_opisanie">Описание рекламы</p>
                        <div class="text-right">
                            <a href="#" id="var_ssylka" class="btn btn-outline-info text-white" style="border-radius: 20px;"><span class="p-1">Кененирээк <i class="fas fa-long-arrow-alt-right mt-1 pl-2"></i></span></a>
                        </div>
                        
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления категорий -->
        </div>
    </section>

<script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>
    <script type="text/javascript">
        
$('img.img-svg').each(function(){
  var $img = $(this);
  var imgClass = $img.attr('class');
  var imgURL = $img.attr('src');
  $.get(imgURL, function(data) {
    var $svg = $(data).find('svg');
    if(typeof imgClass !== 'undefined') {
      $svg = $svg.attr('class', imgClass+' replaced-svg');
    }
    $svg = $svg.removeAttr('xmlns:a');
    if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
      $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
    }
    $img.replaceWith($svg);
  }, 'xml');
});

$(function() {
  $(".w-1001").click(
    function() {
      var title = $(this).attr('data-title');
      var id = $(this).attr('data-id');
      var kol = $(this).attr('data-kol');

      $(".var_title").text(title);
      $("#var_id").attr('action', id);
      $(".var_kol").text(kol);
    })
});

$(function() {
  $(".w-1002").click(
    function() {
      var title = $(this).attr('data-title');
      var opisanie = $(this).attr('data-opisanie');
      var img = $(this).attr('data-img');
      var ssylka = $(this).attr('data-ssylka');

      $(".var_title").text(title);
      $(".var_opisanie").text(opisanie);
      $("#var_img").attr('src', img);
      $("#var_ssylka").attr('href', ssylka);;
    })
});
    </script>
@endsection

              