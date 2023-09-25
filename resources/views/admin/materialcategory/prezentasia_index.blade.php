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
    .todo-list2 .for_ico{
    will-change: transform;
    transition: transform 400ms;
  }
  .todo-list2:hover .for_ico {
    transition: transform 300ms;
      transform: translateX(2px);
      color: #28a745;
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
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center mb-3 pt-2">
                <div class="col" >
                    <h5 class="pt-2 mb-2">
                        @if($for_action == 0)
                            Презентация
                        @endif
                        @if($for_action == 1)
                            Тест, <small>текшерүү иш, ...</small>
                        @endif
                        @if($for_action == 2)
                            Шаблон <small>(презентация)</small>
                        @endif
                        @if($for_action == 3)
                            Грамота, <small>сертификат, ...</small>
                        @endif
                        @if($for_action == 4)
                            План конспект
                        @endif
                        <span data-bs-toggle="tooltip" data-bs-placement="right" title="Количество уроков"> ({{$kol}})</span>
                    </h5>
                </div>
                <div class="col-auto for_num1 for_num_id1">
                  <p style="display: none;"></p>
                  <button class="btn btn-sm btn-default float-right text-nowrap" type="submit">
                      Сохранить изменения
                  </button>

                </div>
                @if($kol > 1)
                <div class="col-auto knopka_numerasi">
                  <p style="display: none;"></p>
                  <a class="btn btn-sm btn-default float-right text-nowrap for_button_izmenit" type="button"  onclick="changeClass()">
                      Изменить порядок
                  </a>
                </div>
                @endif
                <div class="col-auto" >
                  <a class="btn btn-sm btn-success float-right text-nowrap" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить категорию" href="{{ route('material_category_create', $for_action)}}">
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
        <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="pt-2 pb-2"></th>
                            <th class="pt-2 pb-2">Иконка</th>
                            <th class="pt-2 pb-2">ID</th>
                            <th class="pt-2 pb-2">Название</th>
                            <th class="pt-2 pb-2">Подкатегории</th>
                            <th class="pt-2 pb-2"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle connectedSortable">
                       @foreach ($materialcategories as $materialcategories)
                        <tr class="todo-list2 banner-message2">
                            <td class="align-middle">
                                <div class="col-auto pr-3 pl-2 btn-tool">
                                  <span class="for_ico for_num1 for_num_id1 card-header22" id="">
                                    <i class="fas fa-grip-vertical" style="font-size: 20px;"></i>
                                  </span>
                                </div>
                            </td>
                            <td class="align-middle"><img class="img-svg mt-2 mb-2 mr-3 ml-2" src="{{asset('')}}/{{$materialcategories['img']}}"></td>
                            <td class="align-middle">{{$materialcategories['id']}}</td>
                            <td class="align-middle">{{$materialcategories['title']}}</td>
                            <td class="align-middle">{{$materialcategories->materialpodcategory_count}} <a class="btn btn-tool w-1001  tools2" type="button" href="{{ route('material_podcategory', ['for_action' => $for_action, 'id' => $materialcategories['id']])}}"><i class="fas fa-long-arrow-alt-right" style="font-size: 1em;"></i></a></td>
                            <td class="align-middle">
                                <!--<a class="btn btn-tool w-1001  tools2" type="button" >
                                    <i class="far fa-eye" style="font-size: 1.2em;"></i>
                                </a>-->
                              
                                <a class="btn btn-tool tools2" href="{{route('material_category_edit', ['for_action' => $for_action, 'id' => $materialcategories['id']])}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Редактировать">
                                  <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                </a>
                                <a type="button" class="btn btn-tool w-10000 w-1001 tools2" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" data-toggle="modal" @if($materialcategories->materialpodcategory_count > 0) data-target="#staticBackdrop2" @else data-target="#staticBackdrop" data-title="{{$materialcategories['title']}}" data-id="{{route('material_category_destroy', ['for_action' => $for_action, 'id' => $materialcategories->id])}}" data-kol="{{$materialcategories->materialpodcategory_count}}" @endif>
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
                        
                        <p class="mb-0 pt-3">Категория <span class="float-right var_title"></span></p><hr class="mt-0">
                        <p class="mb-0">Количество подкатегорий <span class="float-right var_kol"></span></p><hr class="mt-0">
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

        <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <p class="text-center mb-0 pt-2 pb-2"><b>Нельзя удалить эту категорию, так как у него есть подкатегории</b></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Закрыть</button>
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


function changeClass(){
     document.getElementById('button_for_num').classList.toggle('for_num2');
     $('.for_num_id1').toggleClass('for_num1');
     $('.for_num_id2').toggleClass('card-header22');
     $('.ssd11').height($('.ssd12').height());
  }

$('.for_button_izmenit').click(function() {
  $(this).hide().next().show().end().prev().addClass('on');
}).after('<a class="btn btn-sm btn-default float-right text-nowrap for_button_izmenit" type="button"  onClick="window.location.reload()">Отменить изменения</a>').next().hide().click(function() {
  $(this).hide().prev().show().prev().removeClass('on');
});  

$('.banner-message2').hover(
  function(){
  $('#for_hidden').show();
  $('.button2').hide();
  },
  function(){
  $('#for_hidden').hide();
  $('.button2').show();
  }
);


    </script>
@endsection