@extends('layouts.app')

@section('content')
<style>
    .cursor{
        cursor: pointer;
    }
    .truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }
     .img-svg path{
        fill: #17a2b8;
    }
  .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-5px);
  }
.for_color_navedenii .for_color{
}

.for_color_navedenii:hover .for_color{
    color: #17a2b8;
}
   }
</style>
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                    <section class="content-header pl-0 pr-0">
                      <div class="container-fluid p-0">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('home')}}">
                                        <i class="nav-icon fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('vse_testy', ['for_action' => $for_action])}}">
                                        @if($for_action == 0)
                                            Онлайн тест
                                        @endif
                                        @if($for_action == 1)
                                            ЖРТ <small>(ОРТ)</small>
                                        @endif
                                        @if($for_action == 2)
                                            НЦТ <small>(тест)</small>
                                        @endif
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">{{$test_categories->title}}</li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>
            <div class="row">
                @foreach ($test_podcategories as $test_podcategory)

                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                    <a style="display:block" href="{{ route('vsetesty', ['for_action' => $for_action, 'id' => $test_podcategory->id])}}"></a>
                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{asset('')}}/{{$test_podcategory['img']}}"></span>
                        <div class="info-box-content">
                            <h4><strong><span class="info-box-text for_color truncate2">{{$test_podcategory['title']}}</span></strong></h4>
                            <span class="info-box-number">Тесттердин саны: {{$test_podcategory->testy_count}}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                            </div>
                            <span class="progress-description">Сатуулар: {{$test_podcategory->tests_kupit_count}}</span>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- /.card -->
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <script type="text/javascript">

var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});

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


$('.for_shadow').mouseover(function(){
$(this).addClass('shadow');
});
$('.for_shadow').mouseleave(function(){
$(this).removeClass('shadow');
});


</script>
@endsection