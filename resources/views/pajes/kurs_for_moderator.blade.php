@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/packages/slick/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/packages/slick/slick-theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/packages/custom_scroll/jquery.mCustomScrollbar.css') }}">
<style type="text/css">

.morecontent span {
    display: none;
}
 
.slick-slide {
      margin: 0px 10px;
    }

    .slick-slide img {
      width: 100%;
    }


    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }
    @media screen and (max-device-width: 400px) {
    .slick-slide {
          margin: 0px 0px;
        }
   }
   .img2{ 
        filter: blur(1px);
    } 

    @media (max-width: 768px) {
      .for_skryt {
        display: none;
      }
    }

    .bs-stepper-header {
        display: flex;
        overflow: auto;
    }
    @media (min-width: 768px) {
        .bs-stepper-header::-webkit-scrollbar { width: 0; display: none; }
    }

</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            
                                
    
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                </div>
            @endif
            @if (session('success2')) 
                <div class="alert alert-info alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <p class="mb-0"><i class="icon fas fa-check"></i> {{ session('success2') }}</p>
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
                        @if($category->id == 21)
                        <li class="breadcrumb-item">
                            <a href="{{ route('vse_testy', ['for_action' => '1'])}}">
                                ЖРТ <small>(ОРТ)</small>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('podcat', $category['id'])}}">
                                Курс
                            </a>
                        </li>
                        @else
                        <li class="breadcrumb-item">
                            <a href="{{ route('vse_kursy')}}">
                                Курс
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('podcat', $category['id'])}}">
                                {{$category->title}}
                            </a>
                        </li>
                        @endif
                        <li class="breadcrumb-item active">{{$podcategories['title']}}</li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>


            @if($comments != null)
                <p class="text-center "><b>Пикирлер</b></p>
                <section class="for_comment_slider slider mt-3">
                    @foreach ($comments as $comment)
                    @php
                        $oblast1 = $oblast->where('id', $comment->user->oblast_id)->first();
                        $raion_shaar1 = $raion_shaar->where('id', $comment->user->raion_shaar_id)->first();
                    @endphp
                    <div>
                        <div class="card pr-2 pl-2 pb-3 pt-3" style="border-radius: 5px;">
                          <div class="row">
                              <div class="col-auto">
                                @if($comment->user->img_600_600 == null)
                                    <img src="https://nonsi.kg/public/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{$comment->user->name}}" width="100%"  style="max-width: 80px;">
                                @else
                                    <img src="{{ asset('public/storage/users/img_160_160/') }}/{{$comment->user->img_160_160}}" class="img-circle  shadow-sm"  alt="{{$comment->user->name}}" width="100%"  style="max-width: 80px;">
                                @endif 
                              </div>
                              <div class="col">
                                    <div class="content-4" style="max-height: 100px; verflow: auto; position: relative; height: 400px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;"><p><em>{!!$comment->text!!}</em></p></div>
                                    <p class="name mb-1">
                                        <b>
                                            @if($comment->user->f_fio != null)
                                                <span title="{{$comment->user->name}}">{{$comment->user->f_fio}} {{$comment->user->i_fio}} {{$comment->user->o_fio}}</span>
                                            @else
                                                <span>{{$comment->user->name}}</span>
                                            @endif
                                        </b>
                                    </p>
                                    <span class="position">
                                        @if($oblast1 != null)
                                            <i class="fas fa-map-marker-alt pr-2 text-muted"></i> {{$oblast1->title}} обл. / 
                                            @if($raion_shaar1 != null)
                                                {{$raion_shaar1->title}}
                                            @endif
                                        @endif
                                        
                                    </span>
                              </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </section>
            <div class="mt-5 mb-5"></div>
            @endif


            
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-light">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p class="text-muted mb-0"><b>Курс: {{$podcategories['title']}}</b></p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body pt-3 pb-2 pl-3 pr-3">
                                @if($podcategories['video'] != null)
                                 <video oncontextmenu="return false;" controls controlsList="nodownload" width="100%" height="100%" style="border-radius: 3px;">
                                      <source id="video" src="https://nonsi.kg/public/storage/kursy/reklamnoevideo/{{$podcategories->video}}" type="video/mp4">
                                          Ваш браузер не поддерживает видео tag.
                                  </video>
                                @endif
                                @if($podcategories['youtube_video'] != null)
                                     <?php
                                      // http://youtu.be/dQw4w9WgXcQ
                                      // http://www.youtube.com/embed/dQw4w9WgXcQ
                                      // http://www.youtube.com/watch?v=dQw4w9WgXcQ
                                      // http://www.youtube.com/?v=dQw4w9WgXcQ
                                      // http://www.youtube.com/v/dQw4w9WgXcQ
                                      // http://www.youtube.com/e/dQw4w9WgXcQ
                                      // http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
                                      // http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
                                      // http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
                                      // http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
                                      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $podcategories->youtube_video, $match);
                                      $youtube_id = $match[1];

                                      ?>
                                  <div class="embed-responsive embed-responsive-16by9">
                                  <iframe style="border-radius: 3px;"
                                    class="embed-responsive-item"

                                      width="100%"
                                      height="100%"
                                      src="https://www.youtube.com/embed/<?php echo $youtube_id;  ?>"
                                      srcdoc="<style>*{padding:0;margin:0;overflow:hidden}
                                      html,body{height:100%}
                                      img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
                                      span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
                                      </style>
                                      <a href=https://www.youtube.com/embed/<?php echo $youtube_id;  ?>?autoplay=1>
                                      <img src=https://img.youtube.com/vi/<?php echo $youtube_id;  ?>/hqdefault.jpg alt='Demo video'>
                                      <span>▶</span>
                                      </a>"
                                      frameborder="0"
                                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                      allowfullscreen
                                      title="Play">
                                  </iframe>
                                  </div>
                                @endif
                                <div>
                                    <p class="">{!!$podcategories['opisanie']!!}</p>
                                </div>
                            
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    @if($podcategories->price > 0)
                        @if($podcategories->col_modulei > 1)
                        <p class="mt-1 mb-3 text-center">
                            @if($podcategories->otuu_ykmasy == 0) Бардык модулдар автоматтык түрдө ачылат. @endif
                            @if($podcategories->otuu_ykmasy == 1) Бардык модулдар автордун уруксаты менен ачылат. @endif
                            @if($podcategories->otuu_ykmasy == 2) 1-модуль автоматтык түрдө, ал эми калганы автордун уруксаты менен ачылат. @endif
                            @if($podcategories->otuu_ykmasy == 3) 1-модуль автоматтык түрдө, ал эми калганы  {{$podcategory->procent_perehoda}}% ашканда ачылат. @endif
                        </p>
                        @endif
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @for ($i = 1; $i <= $podcategories->col_modulei; $i++)
                              <div class="row mt-2 align-items-center">
                                <div class="col">
                                  <hr class="mt-1 mb-3">
                                </div>
                                <div class="col-auto">
                                  <p class="mt-1 mb-3 text-muted"><b>{{$i}}-модуль</b></p>
                                </div>
                                <div class="col">
                                  <hr class="mt-1 mb-3">
                                </div>
                              </div>
                                @foreach ($urokies->where('modul_number', $i) as $urok)
                                    <div class="card card-light block23">
                                            <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}"></a>
                                            <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                            <p class="timeline-header no-border mb-0"><b>{{$urok['title']}}</b><br><span class="text-muted" style="font-size: 15px;">Статус: Модератор үчүн ачык</span></p>
                                            </div>
                                        </div>
                                @endforeach
                            @endfor
                        </div><!-- /.col -->
                    </div>
                    
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="sticky-top mb-3 mt-3">
                        <h6 class="text-muted text-center mb-0 pt-0 pb-2"><b>Автор ({{$podcategories->user['name']}}) менен байланышуу</b></h6>

                        @if($podcategories->phone_for_zvonok != null)
                        <div class="card card-body pt-2 pb-0 mb-2 mt-4 two">
                            <div class="row align-items-center block23">
                                <a href="tel:+996{{preg_replace('~[^0-9]+~','', $podcategories->phone_for_zvonok)}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #28a745;">
                                      <i class="fal fa-phone-alt"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>Чалуу</b> (позвонить)</p>
                                    <p class="text-muted text-center mb-0 pb-2">0{{$podcategories->phone_for_zvonok}}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($podcategories->phone_for_whatsapp != null)
                        <div class="card card-body pt-2 pb-0 mb-2 mt-4 two">
                            <div class="row align-items-center block23">
                                <a href="https://wa.me/+996{{preg_replace('~[^0-9]+~','', $podcategories->phone_for_whatsapp)}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #28a745;">
                                      <i class="fab fa-whatsapp"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp</b></p>
                                    <p class="text-muted text-center mb-0 pb-2">0{{$podcategories->phone_for_whatsapp}}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($podcategories->telegram != null)
                        <div class="card card-body pt-2 pb-0  mb-2 mt-4 two">
                            <div class="row align-items-center  block23">
                                <a href="https://t.me/{{$podcategories->telegram}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #17a2b8;">
                                      <i class="fab fa-telegram-plane"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>Telegram</b></p>
                                    <p class="text-muted text-center mb-0 pb-2"><a href="https://t.me/{{$podcategories->telegram}}">https://t.me/
                                        @if(strlen($podcategories->telegram) < 8)
                                            {{$podcategories->telegram}}
                                        @else
                                            {{substr($podcategories->telegram, 0, 5)}}...
                                        @endif
                                    </a></p>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
    <!-- /.content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('public/packages/custom_scroll/jquery-1.11.0.min.js') }}"></script>
    <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
    <script src="{{ asset('public/packages/custom_scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript">

$(document).on('click', '.nomer_testa1', function(){    
    $('#modal-default').modal('show')
});

var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});




$(function() {
    var Toast2 = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000
    });
    $('.for_alert_block').click(function() {
        Toast2.fire({icon: 'error', title: 'Автордун уруксаты менен ачылат'});        
      });
  });

</script>
<script>
    (function($){
        $(window).on("load",function(){
            $(".content-4").mCustomScrollbar({
                theme:"dark-2",
            });
        });
    })(jQuery);
</script>
@endsection