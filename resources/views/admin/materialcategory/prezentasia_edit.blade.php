@extends('layouts.app')

@section('title', 'Редактировать категорию')

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
    
    <div class="content-header">
        <div class="container-fluid">
            <!--Окно для уведомлений (успушно обновлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--Окно для уведомлений (успушно обновлена) -->
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
                                <h5 class="m-0"><b>Редактировать категорию: {{$materialcategory['title']}}</b></h5>
                            </div>
                            <form action="{{ route('material_category_update', ['for_action' => $for_action, 'id' => $materialcategory->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="number" name="dop_category" value="1" hidden="">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img id="img2" src="{{asset('')}}/{{$materialcategory['img']}}" alt="" class="img-svg">
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Название</label>
                                            <input type="text" name="title" value="{{$materialcategory['title']}}" class="form-control" id="exampleInputEmail1"
                                                placeholder="Введите название категории" required>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="feature_image">Иконка (svg)</label>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img id="img1" src="" alt="" class="img-uploade img-svg">
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="text" id="feature_image" value="{{ $materialcategory['img'] }}" name="img" readonly="" placeholder="Картинка появиться здесь" required hidden="">
                                                    <a href="" class="popup_selector btn btn-default" data-inputid="feature_image">Изменить иконку</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                
                            </div>
                            
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Обновить</button>
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