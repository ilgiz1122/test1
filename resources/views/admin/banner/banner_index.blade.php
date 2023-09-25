@extends('layouts.app')

@section('title', 'Все категории')

@section('content')

<style>
    .cursor{
        cursor: pointer;
    }
    .img-svg {
        width: 25px;
    height: 25px;
    }
    .img-svg path{
        fill: #17a2b8;
    }

    .img2{ 
        filter: blur(2px);
        -webkit-box-shadow: inset 0px 0px 85px rgba(0,0,0,0.4);
        -moz-box-shadow:    inset 0px 0px 85px rgba(0,0,0,0.4);
        box-shadow:         inset 0px 0px 85px rgba(0,0,0,0.4);
    }
    .img3{ 
        filter: brightness(90%);
    }
</style>
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 class="m-0">Баннер</h1>
                </div>
                <div class="col-auto">
                    <div class="card-tools">
                        <a class="btn btn-sm btn-success" href="{{ route('banner_create')}}">
                            <i class="fas fa-plus"></i> Добавить
                        </a> 
                    </div>
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
        <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="pt-2 pb-2">№</th>
                            <th class="pt-2 pb-2">Тема</th>
                            <th class="pt-2 pb-2">Описание</th>
                            <th class="pt-2 pb-2">Статус</th>
                            <th class="pt-2 pb-2"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       @foreach ($banners as $banner)
                        <tr class="todo-list2">
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class="align-middle">{{$banner->title}}</td>
                            <td class="align-middle text-truncate"  style="max-width: 230px;">{{$banner->opisanie}}</td>
                            
                            <td class="align-middle dropleft">
                              <a class="" data-toggle="dropdown" id="dropdownMenuOffset2" type="button"  data-offset="0,10">
                                @if (intval($banner->status) == 0)<span><i class="fas fa-times" style="color: #6c757d;"></i></span>@else<span><i class="fa fa-check" style="color: #28a745"></i></span>@endif
                              </a>


                                <div class="dropdown-menu dropdown-menu-right pt-0 pb-0 ">
                                    <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Статус</p>
                                    <div class="dropdown-divider mb-0 mt-0"></div>
                                    <form method="POST" action="{{ route('banner_update_status1', $banner['id']) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status1" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Активна
                                              <span class="float-right text-sm">@if (intval($banner->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                            </h3>
                                
                                          </div>
                                        </div>
                                      </button>
                                    </form> 
                                    <div class="dropdown-divider  mb-0 mt-0"></div>

                                    <form method="POST" action="{{ route('banner_update_status2', $banner['id']) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status2" min="0" maxlength="1" class="form-control" value="0" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Не активна
                                              <span class="float-right text-sm">@if (intval($banner->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                            </h3>
                                          </div>
                                        </div>
                                        <!-- Message End -->
                                      </button>
                                    </form> 
                                  </div>
                              </td>
                            <td class="align-middle">
                                <a class="btn btn-tool w-1002  tools2" type="button" data-toggle="modal" data-target="#staticBackdrop2" data-title="{{$banner['title']}}" data-opisanie="{{$banner['opisanie']}}" data-img="https://nonsi.kg/public/storage/banner/{{$banner['img']}}" data-ssylka="{{$banner['ssylka']}}">
                                    <i class="far fa-eye" style="font-size: 1.2em;"></i>
                                </a>
                                <a class="btn btn-tool tools2" href="{{route('banner_edit', $banner['id'])}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Редактировать">
                                  <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                </a>
                                <a type="button" class="btn btn-tool w-10000 w-1001 tools2" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" data-toggle="modal" data-target="#staticBackdrop" data-title="{{$banner['title']}}" data-id="{{route('banner_destroy', $banner['id'])}}" data-kol="@if($banner->status == 0) не активный @else активный @endif">
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