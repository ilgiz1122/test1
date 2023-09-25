@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('')}}/packages/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="{{asset('')}}/packages/slick/slick-theme.css">
<style>
.iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
    .cursor{
        cursor: pointer;
    }
    .img-svg path{
        fill: #FFFFFF;
    }
    .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-4px);
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
      opacity: .3;
    }

    .slick-current {
      opacity: 1;
    }
    
</style>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible pt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <div class="row">
                        <div class="col-auto">
                            <h5><i class="fas fa-times"></i></h5>
                        </div>
                        <div class="col">
                            <h5>{{ session('success') }}</h5>
                        </div>
                    </div>
                    
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
                                <li class="breadcrumb-item">
                                    <a href="{{ route('vitrina', ['for_action' => '0'])}}">
                                        @if($for_action == 0)
                                            Витрина
                                        @endif
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">{{$vitrina['title']}}</li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>
            <div class="row">
                <div class="col-md-9">
                    <section class="slider-for slider mt-0" style="margin-left: -10px; margin-right: -10px;">
                        @foreach ($vitrinaimgs as $img)
                        <div style="border-radius: 10px;">
                            <img class="border" style="border-radius: 5px; width: 100%;" src="{{ asset('public/storage/vitrina/img1/') }}/{{$img->img1}}">
                        </div>
                        @endforeach
                    </section>
                    <section class="slider-nav slider mt-3" style="margin-left: -10px; margin-right: -10px;">
                        @if(count($vitrinaimgs) > 1)
                            @foreach ($vitrinaimgs as $img)
                            <div>
                                <img class="border shadow-sm" style="border-radius: 5px; width: 100%;" src="{{ asset('public/storage/vitrina/img2/') }}/{{$img->img2}}">
                            </div>
                            @endforeach
                        @endif
                    </section>

                    @if($vitrina->youtube != null)

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
                      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $vitrina->youtube, $match);
                      $youtube_id = $match[1];
                    ?>
                    <hr class="mt-5">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe style="border-radius: 3px;"
                          class="embed-responsive-item"
                            width="100%"
                            height="100%"
                            src="https://www.youtube.com/embed/<?php echo $youtube_id;  ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            title="Play">
                        </iframe>
                    </div>
                    @endif

                    <p class="mb-4 mt-4">{!! $vitrina->opisanie !!}</p>

                    @if($vitrina->demofile != null)
                        <hr class="mt-4 mb-4">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="mb-0"><b>Файл:</b> <em>{{substr($vitrina->title, 0, 10)}}.....{{substr($vitrina->title, -5)}}.{{ pathinfo($vitrina->demofile)['extension'] }}</em></p>
                            </div>   
                            <div class="col-auto">
                                <a class="btn btn-outline-info btn-block btn-sm" download="{{$vitrina->title}}.{{ pathinfo($vitrina->demofile)['extension'] }}" style="display:block" href="{{ asset('public/storage/vitrina/demofile/'.$vitrina->demofile)}}">Скачать <i class="fal fa-download pl-2"></i></a>
                            </div>                          
                        </div>                        
                    @endif

                    <hr class="mt-4 mb-4">
                    <p class="mb-1 mt-4 text-center"><b>Жеткирүү ыкмасы</b>
                        <small>(
                            @if($vitrina->type_dostavki == 1)
                                Өзүңүз алып кетесиз
                            @endif
                            @if($vitrina->type_dostavki == 2)
                                Акы төлөнүүчү жеткирүү
                            @endif
                            @if($vitrina->type_dostavki == 3)
                                Акысыз жеткирүү
                            @endif
                        )</small>
                    </p>
                    <p class="mb-1 mt-2">
                        @if($vitrina->type_dostavki == 1)
                            Алып кетүүчү дарактердин тизмеси:
                        @endif
                        @if($vitrina->type_dostavki == 2)
                            Жеткирип берүүчү аймактардын тизмеси:
                        @endif
                        @if($vitrina->type_dostavki == 3)
                            Акысыз жеткирип берүүчү аймактардын тизмеси:
                        @endif
                    </p>
                        @foreach ($vitrina_dop_infos->where('tipe_info', 0) as $vitrina_dop_info)
                            <div class="row align-items-center mt-0 ml-0 mr-0">
                                <div class="col-auto pr-1"><i class="far fa-genderless pr-1" style="font-size: 12px;"></i></div> 
                                <div class="col pr-0 pl-0">
                                    <span>{{$vitrina_dop_info->info}}</span>
                                </div>
                            </div>
                        @endforeach
                    

                    <div class="row mt-5">
                        <div class="col-md-6 pl-2 pr-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted mb-0">Автор <span class="float-right">{{$vitrina->user['name']}}</span></p><hr class="mt-1">
                                    <p class="text-muted mb-0">Тили <span class="float-right">@if(intval($vitrina->language) != 4 ){{$vitrina->languages['language']}}@else - @endif</span></p><hr class="mt-1 mb-0">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 pl-2 pr-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted mb-0">Баасы <span class="float-right">
                                        @if (intval($vitrina['oldprice']) != 0)<span class="pr-3" style="color: red;"><del>{{$vitrina['oldprice'] / 100}} сом</del></span>@endif
                                        {{$vitrina->price / 100}} сом</span></p><hr class="mt-1">
                                    <p class="text-muted mb-0">Көрдү <span class="float-right"><i class="far fa-eye pr-2"></i> {{$vitrina->view}}</span></p><hr class="mt-1 mb-0">
                                </div>
                            </div>
                            
                        </div>                     
                    </div>
                        

                            
                            

                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="sticky-top mb-3 mt-3">
                        <h6 class="text-muted text-center mb-0 pt-0 pb-2"><b>Автор ({{$vitrina->user['name']}}) менен байланышуу</b></h6>

                        @if($vitrina->phone_for_zvonok != null)
                        <div class="card card-body pt-2 pb-0 mb-2 mt-4 two">
                            <div class="row align-items-center block23">
                                <a href="tel:+996{{preg_replace('~[^0-9]+~','', $vitrina->phone_for_zvonok)}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #28a745;">
                                      <i class="fal fa-phone-alt"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>Чалуу</b> (позвонить)</p>
                                    <p class="text-muted text-center mb-0 pb-2">0{{$vitrina->phone_for_zvonok}}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($vitrina->phone_for_whatsapp != null)
                        <div class="card card-body pt-2 pb-0 mb-2 mt-4 two">
                            <div class="row align-items-center block23">
                                <a href="https://wa.me/+996{{preg_replace('~[^0-9]+~','', $vitrina->phone_for_whatsapp)}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #28a745;">
                                      <i class="fab fa-whatsapp"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp</b></p>
                                    <p class="text-muted text-center mb-0 pb-2">0{{$vitrina->phone_for_whatsapp}}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($vitrina->telegram != null)
                        <div class="card card-body pt-2 pb-0  mb-2 mt-4 two">
                            <div class="row align-items-center  block23">
                                <a href="https://t.me/{{$vitrina->telegram}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #17a2b8;">
                                      <i class="fab fa-telegram-plane"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>Telegram</b></p>
                                    <p class="text-muted text-center mb-0 pb-2"><a href="https://t.me/{{$vitrina->telegram}}">https://t.me/
                                        @if(strlen($vitrina->telegram) < 9)
                                            {{$vitrina->telegram}}
                                        @else
                                            {{substr($vitrina->telegram, 0, 5)}}...
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



<script type="text/javascript">
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
</script>
@endsection