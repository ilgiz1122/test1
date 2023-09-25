@extends('layouts.app')

@section('title', 'Добавить категорию')

@section('content')

<style type="text/css">
    .img-svg {
        width: 100%;
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
                <div class="col-sm-6">
                    
                </div>
            </div>
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--Окно для уведомлений (успушно добавлена) -->
        </div>
    </div>
    <!-- Тема -->

    <!-- Контент -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0"><b>Добавить подкатегорию (p)</b></h5>
                        </div>
                        <form action="{{ route('material_podcat_store', ['for_action' => $for_action, 'id' => $materialcategories->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <input type="number" name="cat_id" required value="{{$materialcategories->id}}" hidden="">
                                <div class="row align-items-center">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Название</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        placeholder="Введите название подкатегории" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="feature_image">Иконка (svg)</label>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img src="" alt="" class="img-uploade img-svg">
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="text" id="feature_image" name="img" readonly="" placeholder="Картинка появиться здесь" required hidden="">
                                                    <a href="" class="popup_selector btn btn-default" data-inputid="feature_image">Загрузить иконку</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

        $(document).on('mousemove', '.content', function(){
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
            });
    </script>
@endsection