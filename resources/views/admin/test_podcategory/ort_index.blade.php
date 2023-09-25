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
</style>
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 class="m-0">Подкатегориялар ({{$test_categories->title}})</h1>
                </div>
                <div class="col-auto">
                    <div class="card-tools">
                        <a class="btn btn-sm btn-success" href="{{ route('test_podcat_create', ['for_action' => $for_action, 'id' => $test_categories->id])}}">
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
                            <th class="pt-2 pb-2">Иконка</th>
                            <th class="pt-2 pb-2">ID</th>
                            <th class="pt-2 pb-2">Название</th>
                            <th class="pt-2 pb-2">Презентациялар</th>
                            <th class="pt-2 pb-2"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       @foreach ($test_podcategories as $test_podcategories)
                        <tr class="todo-list2">
                            <td class="align-middle"><img class="img-svg mt-2 mb-2 mr-3 ml-2" src="https://nonsi.kg/public/{{$test_podcategories['img']}}"></td>
                            <td class="align-middle">{{$test_podcategories['id']}}</td>
                            <td class="align-middle">{{$test_podcategories['title']}}</td>
                            <td class="align-middle">{{$test_podcategories->testy_count}} <a class="btn btn-tool w-1001  tools2" type="button" href="{{ route('test_podcat_index', ['for_action' => $for_action, 'id' => $test_podcategories->id])}}"><i class="fas fa-long-arrow-alt-right" style="font-size: 1em;"></i></a></td>
                            <td class="align-middle">
                                <!--<a class="btn btn-tool w-1001  tools2" type="button" >
                                    <i class="far fa-eye" style="font-size: 1.2em;"></i>
                                </a>-->
                              
                                <a class="btn btn-tool tools2" href="{{route('test_podcat_edit', ['for_action' => $for_action, 'id' => $test_podcategories->id])}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Редактировать">
                                  <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                </a>
                                <a type="button" class="btn btn-tool w-10000 w-1001 tools2" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" data-toggle="modal" @if($test_podcategories->testy_count > 0) data-target="#staticBackdrop2" @else data-target="#staticBackdrop" data-title="{{$test_podcategories['title']}}" data-id="{{route('test_podcat_destroy', ['for_action' => $for_action, 'id' => $test_podcategories->id])}}" data-kol="{{$test_podcategories->testy_count}}" @endif>
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
    </script>
@endsection