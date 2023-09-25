@extends('layouts.app')

@section('content')
<style>
    .cursor{
        cursor: pointer;
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

.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }
    
</style>

                                            
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <section class="content-header pl-0 pr-0">
              <div class="container-fluid p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('home')}}">
                                <i class="nav-icon fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Курс
                        </li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>
            <div class="row">
                @foreach ($categories as $category)
                
                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                    <a style="display:block" href="{{ route('podcat', $category['id'])}}"></a>
                    <div class="info-box  shadow-sm for_shadow" style="background: Light;">
                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}/{{$category['img']}}"></span>
                        <div class="info-box-content">
                            <h5><strong><span class="info-box-text for_color" title="{{$category['title']}}">
                                @if(mb_strlen($category->title) < 21)
                                    {{$category['title']}}
                                @else
                                    {{mb_substr($category->title, 0, 20)}}...
                                @endif
                                </span></strong></h5>
                            <span class="info-box-number">Курстардын саны: <span title="Жабык курстар: {{$category->podcategories3_count}}">{{$category->podcategories2_count}}</span></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                            </div>
                            <span class="progress-description">Сатылды: {{$category->kupit_count}}</span>
                            
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </section>
   

  <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
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