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
                                @if($count_cat > 1)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('vse_materialy', ['for_action' => $for_action])}}">
                                        @if($for_action == 0)
                                            Презентация
                                        @endif
                                        @if($for_action == 1)
                                            Тест, <small>текшерүү иш, ...</small>
                                        @endif
                                        @if($for_action == 2)
                                            Шаблон
                                        @endif
                                        @if($for_action == 3)
                                            Грамота, <small>сертификат, ...</small>
                                        @endif
                                        @if($for_action == 4)
                                            План конспект
                                        @endif
                                    </a>
                                </li>
                                @endif
                                <li class="breadcrumb-item active">{{$materialcategories->title}}</li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>
            <div class="row">
                @foreach ($materialpodcategories as $materialpodcategory)

                <div class="col-md-4 col-sm-6 col-12 two for_color_navedenii px-lg-2 py-lg-2">
                    
                    <div class="block23 info-box shadow-sm for_shadow" style="background: Light;">
                        <a style="display:block" href="{{ route('vsematerialy', ['for_action' => $for_action, 'id' => $materialpodcategory['id']])}}"></a>
                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="https://nonsi.kg/public/{{$materialpodcategory['img']}}"></span>
                        <div class="info-box-content">
                            <h5><strong><span class="info-box-text for_color">
                                @if(mb_strlen($materialpodcategory->title) < 21)
                                    {{$materialpodcategory->title}}
                                @else
                                    {{mb_substr($materialpodcategory->title, 0, 20)}}...
                                @endif
                            </span></strong></h5>
                            <span class="info-box-number">Материалдардын саны: {{$materialpodcategory->materialy_count}}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                            </div>
                            <span class="progress-description">Сатылды: {{$materialpodcategory->kupitmaterialov_count}}</span>
                            
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