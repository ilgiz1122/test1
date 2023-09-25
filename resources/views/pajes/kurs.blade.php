@extends('layouts.app')

@section('content')


<link rel="stylesheet" type="text/css" href="{{ asset('/packages/slick/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/packages/slick/slick-theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/packages/custom_scroll/jquery.mCustomScrollbar.css') }}">
<style type="text/css">

.morecontent span {
    display: none;
}

.form-control-border:hover {
    background: #f8f9fa;
    outline: 0; width: 100%;
    resize: none;
    border-bottom: 1px solid #17a2b8;
}
.hover1:hover {
    background: #f8f9fa;
}
.hover1:hover .color1{
    background: #f8f9fa;
}

.form-control-border:focus {
  background: #f8f9fa;
  outline: 0; width: 100%;
  resize: none;
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
    .timeline-header a {
        color: black;
    }

</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            
                                <?php
                                if($podcategories->price > 0){
                                    $srok1 = $kupits->srok_dostupa - (time() - $kupits->time);
                                    $god1 = floor($srok1 / 31536000);
                                    $mounth1 = floor(($srok1 - $god1 * 31536000) / 2592000);
                                    $day1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                                    $hour1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                                    $minute1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);}
                                ?> 
    
    

    <!-- Main content -->
    <section class="content">
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
<div class="row">
    <div class="col-3">
        
        
    </div>
</div>

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
                                    <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{$comment->user->name}}" width="100%"  style="max-width: 80px;">
                                @else
                                    <img src="{{ asset('/storage/users/img_160_160/') }}/{{$comment->user->img_160_160}}" class="img-circle  shadow-sm"  alt="{{$comment->user->name}}" width="100%"  style="max-width: 80px;">
                                @endif 
                              </div>
                              <div class="col" >
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
                                <div class="col-auto user-block">
                                    <span class="float-right description" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-content="
                                    @if($podcategories->price > 0)
                                        @if($kupits->srok_dostupa == 0) 
                                            түбөлүк 
                                        @else
                                            @if(($kupits->srok_dostupa - (time() - $kupits->time)) > 0) дагы 
                                                @if($god1 > 0){{$god1}}жыл @endif
                                                @if($mounth1 > 0){{$mounth1}}ай @endif
                                                @if($day1 > 0){{$day1}} күн @endif
                                                @if($hour1 > 0){{$hour1}} саат @endif
                                                @if($minute1 > 0){{$minute1}} мин.@endif
                                            @else
                                                убакыт бүттү
                                            @endif
                                        @endif
                                    @else
                                        Ачык
                                    @endif"><i class="far fa-clock pr-2"></i>Доступ:  
                                    @if($podcategories->price > 0) 
                                        @if($kupits->srok_dostupa == 0) 
                                            түбөлүк 
                                        @else
                                            @if(($kupits->srok_dostupa - (time() - $kupits->time)) > 0)
                                                @if($god1 > 0)дагы {{$god1}} жыл ...
                                                @else
                                                    @if($mounth1 > 0)дагы {{$mounth1}} ай ...
                                                    @else
                                                        @if($day1 > 0)дагы {{$day1}} күн ...
                                                        @else
                                                            @if($hour1 > 0)дагы {{$hour1}} саат ...
                                                            @else
                                                                @if($minute1 > 0)дагы {{$minute1}} мин. ...
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @else
                                             убакыт бүттү
                                            @endif
                                        @endif</span>
                                    @else
                                        ачык
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3 pb-2 pl-3 pr-3">
                                @if($podcategories['video'] != null)
                                 <video oncontextmenu="return false;" controls controlsList="nodownload" width="100%" height="100%" style="border-radius: 3px;">
                                      <source id="video" src="{{asset('')}}/storage/kursy/reklamnoevideo/{{$podcategories->video}}" type="video/mp4">
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
                                    @if($podcategories->price > 0)
                                        @if(\Auth::user())
                                            <?php
                                                $progress1 = $progress->where('user_id', $kupits->user_id)->where('urok_id', $urok->id)->where('kupit_id', $kupits->id)->first();

                                                if ($urok->test_id != null){
                                                    $test1 = $test->where('id', $urok->test_id)->first();
                                                    $test_controls1 = $test_controls->where('user_id', $kupits->user_id)->where('test_id', $urok->test_id)->first();
                                                }else{
                                                    $test1 = null;
                                                    $test_controls1 = null;
                                                }
                                                $zadanie1 = $zadanie->where('urok_id', $urok->id)->first();
                                                if ($zadanie1 != null) {
                                                    $zadanie_otvety1 = $zadanie_otvety->where('user_id', $kupits->user_id)->where('urok_id', $urok->id)->where('kupit_id', $kupits->id)->where('zadanie_id', $zadanie1->id)->first();
                                                }
                                            ?>
                                        @endif
                                        @if($urok->status == 0)
                                            <div class="card card-light block23">
                                                <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}"></a>
                                                <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                                    @if(\Auth::user())
                                                    
                                                        <span class="float-right">
                                                            @if($progress1)
                                                                <i class="far fa-eye pr-2" style="color: #28a745;" title="ачты"></i>
                                                            @else
                                                                <i class="far fa-eye pr-2" style="color: #adb5bd;" title="ача элек"></i>
                                                            @endif


                                                            @if($progress1)
                                                                @if($test1)
                                                                    @if($test_controls1)
                                                                        <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                    @else
                                                                        <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if($test1)
                                                                    @if($test_controls1)
                                                                        <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                    @else
                                                                        <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            


                                                            @if($progress1)
                                                                @if($zadanie1 != null)
                                                                    @if($zadanie_otvety1 != null)
                                                                        @if($progress1->status_vypol_zadanii == 2)
                                                                            <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 4)
                                                                            <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 0)
                                                                            <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                        @endif
                                                                    @else
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if($zadanie1 != null)
                                                                    @if($zadanie_otvety1 != null)
                                                                        @if($progress1->status_vypol_zadanii == 2)
                                                                            <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 4)
                                                                            <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 0)
                                                                            <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                        @endif
                                                                    @else
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </span>
                                                    @endif
                                                    <p class="timeline-header no-border mb-0"><b><a href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}">{{$urok['title']}}</a></b><br><span class="text-muted" style="font-size: 15px;">Статус: ачык</span></p>
                                                </div>
                                            </div>
                                        @else
                                            @if($podcategories->otuu_ykmasy == 0)
                                                <div class="card card-light block23">
                                                    <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}"></a>
                                                    <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                                    @if(\Auth::user())
                                                    <span class="float-right">
                                                        @if($progress1)
                                                            <i class="far fa-eye pr-2" style="color: #28a745;" title="ачты"></i>
                                                        @else
                                                            <i class="far fa-eye pr-2" style="color: #adb5bd;" title="ача элексиз"></i>
                                                        @endif


                                                        @if($progress1)
                                                            @if($test1)
                                                                @if($test_controls1)
                                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                @else
                                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if($test1)
                                                                @if($test_controls1)
                                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                @else
                                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                @endif
                                                            @endif
                                                        @endif
                                                        


                                                        @if($progress1)
                                                            @if($zadanie1 != null)
                                                                @if($zadanie_otvety1 != null)
                                                                    @if($progress1->status_vypol_zadanii == 2)
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 4)
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 0)
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                    @endif
                                                                @else
                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if($zadanie1 != null)
                                                                @if($zadanie_otvety1 != null)
                                                                    @if($progress1->status_vypol_zadanii == 2)
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 4)
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 0)
                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                    @endif
                                                                @else
                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </span>
                                                    @endif
                                                    <p class="timeline-header no-border mb-0"><b><a href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}">{{$urok['title']}}</a></b><br><span class="text-muted" style="font-size: 15px;">Статус: сиз үчүн ачылды</span></p>
                                                    </div>
                                                </div>
                                            @else
                                                @php
                                                    $kupit_dostupnye_moduly_array = explode(',', $kupits->dostupnye_moduly);
                                                    foreach ($kupit_dostupnye_moduly_array as $kupit_dostupnye_moduly_arra){
                                                        $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                                        if (intval($kupit_dostupnye_moduly_arra) == $urok->modul_number) {
                                                            break;
                                                            $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                                        }
                                                    }
                                                @endphp

                                                @if($podcategories->otuu_ykmasy == 1)
                                                    @if($kupit_dostupnye_moduly_array1 == $urok->modul_number)
                                                        <div class="card card-light block23">
                                                            <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}"></a>
                                                            <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                                                @if(\Auth::user())
                                                                <span class="float-right">
                                                                    @if($progress1)
                                                                        <i class="far fa-eye pr-2" style="color: #28a745;" title="ачты"></i>
                                                                    @else
                                                                        <i class="far fa-eye pr-2" style="color: #adb5bd;" title="ача элексиз"></i>
                                                                    @endif

                                                                    @if($progress1)
                                                                        @if($test1)
                                                                            @if($test_controls1)
                                                                                <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                            @else
                                                                                <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                            @endif
                                                                        @endif
                                                                    @else
                                                                        @if($test1)
                                                                            @if($test_controls1)
                                                                                <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                            @else
                                                                                <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                            @endif
                                                                        @endif
                                                                    @endif

                                                                    @if($progress1)
                                                                        @if($zadanie1 != null)
                                                                            @if($zadanie_otvety1 != null)
                                                                                @if($progress1->status_vypol_zadanii == 2)
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                                @endif
                                                                                @if($progress1->status_vypol_zadanii == 4)
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                                @endif
                                                                                @if($progress1->status_vypol_zadanii == 0)
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                                @endif
                                                                            @else
                                                                                <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                            @endif
                                                                        @endif
                                                                    @else
                                                                        @if($zadanie1 != null)
                                                                            @if($zadanie_otvety1 != null)
                                                                                @if($progress1->status_vypol_zadanii == 2)
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                                @endif
                                                                                @if($progress1->status_vypol_zadanii == 4)
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                                @endif
                                                                                @if($progress1->status_vypol_zadanii == 0)
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                                @endif
                                                                            @else
                                                                                <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                </span>
                                                                @endif
                                                            <p class="timeline-header no-border mb-0"><b><a href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}">{{$urok['title']}}</a></b><br><span class="text-muted" style="font-size: 15px;">Статус: сиз үчүн ачылды</span></p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="card card-light for_alert_block" type="button">
                                                            <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                                            <p class="timeline-header no-border mb-0"><b>{{$urok['title']}}</b><br><span class="text-muted" style="font-size: 15px;">Статус: автордун уруксаты менен ачылат</span></p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if($podcategories->otuu_ykmasy == 2)
                                                    @if($urok->modul_number == 1)
                                                        <div class="card card-light block23">
                                                            <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}"></a>
                                                            <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                                                @if(\Auth::user())
                                                                    <span class="float-right">
                                                                        @if($progress1)
                                                                            <i class="far fa-eye pr-2" style="color: #28a745;" title="ачты"></i>
                                                                        @else
                                                                            <i class="far fa-eye pr-2" style="color: #adb5bd;" title="ача элексиз"></i>
                                                                        @endif

                                                                        @if($progress1)
                                                                            @if($test1)
                                                                                @if($test_controls1)
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                                @else
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                                @endif
                                                                            @endif
                                                                        @else
                                                                            @if($test1)
                                                                                @if($test_controls1)
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                                @else
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                                @endif
                                                                            @endif
                                                                        @endif


                                                                        @if($progress1)
                                                                            @if($zadanie1 != null)
                                                                                @if($zadanie_otvety1 != null)
                                                                                    @if($progress1->status_vypol_zadanii == 2)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 4)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 0)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                                    @endif
                                                                                @else
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                                @endif
                                                                            @endif
                                                                        @else
                                                                            @if($zadanie1 != null)
                                                                                @if($zadanie_otvety1 != null)
                                                                                    @if($progress1->status_vypol_zadanii == 2)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 4)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 0)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                                    @endif
                                                                                @else
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    </span>
                                                                @endif
                                                            <p class="timeline-header no-border mb-0"><b><a href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}">{{$urok['title']}}</a></b><br><span class="text-muted" style="font-size: 15px;">Статус: сиз үчүн ачылды</span></p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @if($kupit_dostupnye_moduly_array1 == $urok->modul_number)
                                                            <div class="card card-light block23">
                                                                <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}"></a>
                                                                <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                                                    @if(\Auth::user())
                                                                    <span class="float-right">
                                                                        @if($progress1)
                                                                            <i class="far fa-eye pr-2" style="color: #28a745;" title="ачылды"></i>
                                                                        @else
                                                                            <i class="far fa-eye pr-2" style="color: #adb5bd;" title="ача элексиз"></i>
                                                                        @endif

                                                                        @if($progress1)
                                                                            @if($test1)
                                                                                @if($test_controls1)
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                                @else
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                                @endif
                                                                            @endif
                                                                        @else
                                                                            @if($test1)
                                                                                @if($test_controls1)
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;" title="тест тапшырылды"></i> 
                                                                                @else
                                                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;" title="тест тапшырыла элек"></i> 
                                                                                @endif
                                                                            @endif
                                                                        @endif

                                                                        @if($progress1)
                                                                            @if($zadanie1 != null)
                                                                                @if($zadanie_otvety1 != null)
                                                                                    @if($progress1->status_vypol_zadanii == 2)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 4)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 0)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                                    @endif
                                                                                @else
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                                @endif
                                                                            @endif
                                                                        @else
                                                                            @if($zadanie1 != null)
                                                                                @if($zadanie_otvety1 != null)
                                                                                    @if($progress1->status_vypol_zadanii == 2)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #28a745;" title="тапшырма туура аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 4)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: red;" title="тапшырма туура эмес аткарылды"></i>
                                                                                    @endif
                                                                                    @if($progress1->status_vypol_zadanii == 0)
                                                                                        <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: blue;" title="тапшырма текшериле элек"></i>
                                                                                    @endif
                                                                                @else
                                                                                    <i class="fas fa-laptop-house pr-2 tapshyrma{{ $loop->iteration }}" style="color: #adb5bd;" title="тапшырма аткарылган жок"></i>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    </span>
                                                                    @endif
                                                                <p class="timeline-header no-border mb-0"><b><a href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}">{{$urok['title']}}</a></b><br><span class="text-muted" style="font-size: 15px;">Статус: сиз үчүн ачылды</span></p>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="card card-light for_alert_block" type="button">
                                                                <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                                                <p class="timeline-header no-border mb-0"><b>{{$urok['title']}}</b><br><span class="text-muted" style="font-size: 15px;">Статус: автордун уруксаты менен ачылат</span></p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    @else
                                        <div class="card card-light block23">
                                            <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}"></a>
                                            <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                            <p class="timeline-header no-border mb-0"><b><a href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$urok['id']])}}">{{$urok['title']}}</a></b><br><span class="text-muted" style="font-size: 15px;">Статус: ачык</span></p>
                                            </div>
                                        </div>
                                    @endif
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
            @if(\Auth::user())
                @php
                    $comment1 = $comments->where('user_id', \Auth::user()->id)->first();
                @endphp
                @if($comment1 != null)
                    <div class="mt-5 pb-5">
                        <form  action="{{ route('otpravit_otzyv_kursa_update', ['comment_id' => $comment1->id, 'product_id' => $podcategories->id]) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                            <div class="row align-items-top">
                              <div class="col-auto pr-1">
                                <p class="required mb-1"><b>Пикирди өзгөртүү</b></p>
                              </div>
                              <div class="col pr-0 pl-0">
                                <hr>
                              </div>
                              <div class="col-auto opisanie_bottom pl-0">
                                <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                              </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    @if(\Auth::user()->img_160_160 == null)
                                    <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%"  style="max-width: 50px;">
                                    @else
                                    <img src="{{ asset('/storage/users/img_160_160/') }}/{{\Auth::user()->img_160_160}}" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%" style="max-width: 50px;">
                                    @endif 
                                </div>
                                <div class="col pl-1">
                                    <div id="opisanie_text00">
                                        <div id="ttrr">
                                            <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}">{!!$comment1->text!!}</textarea>
                                            <div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info float-right mt-2 pt-1 pb-1 pl-3 pr-3">Өзгөртүү <i class="fas fa-arrow-right pl-2"></i></button>
                        </div>
                        </form>
                    </div>
                @else
                    @if($podcategories->price > 0)
                        @if($kupits != null) 
                            <div class="mt-5 pb-5">
                                <form  action="{{ route('otpravit_otzyv_kursa', ['for_role' => '1', 'product_id' => $podcategories->id]) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('POST')
                                @if(Auth::user()->oblast_id == null)
                                    <div class="row align-items-top">
                                      <div class="col-auto pr-1">
                                        <p class="required mb-1"><b>Пикир калтыруу</b></p>
                                      </div>
                                      <div class="col pr-0 pl-0">
                                        <hr>
                                      </div>
                                      <div class="col-auto opisanie_bottom pl-0">
                                        <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                        <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                                      </div>
                                    </div>
                                    <div class="row align-items-center">
                                        
                                            <div class="col-md-4 mt-2">
                                                <div class="row">
                                                    <div class="col-auto pr-0">
                                                        @if(\Auth::user()->img_160_160 == null)
                                                        <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%"  style="max-width: 50px;">
                                                        @else
                                                        <img src="{{ asset('/storage/users/img_160_160/') }}/{{\Auth::user()->img_160_160}}" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%" style="max-width: 50px;">
                                                        @endif 
                                                    </div>
                                                    
                                                    <div class="col">
                                                        <select name="oblast" id="materialcategory_id" class="form-control productcategory pt-0 pb-0 pl-1 pr-1" required="">
                                                            <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                                            @foreach ($oblast as $oblast)
                                                            <option value="{{$oblast['id']}}">{{$oblast['title']}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">Областты тандаңыз!</div>

                                                        <select name="raion_shaar" id="materialpodcategory_id" class="form-control productname pt-0 pb-0 pl-1 pr-1 mt-2" required="">
                                                            @if(Auth::user()->oblast_id != null)
                                                                @if(Auth::user()->raion_shaar_id != null)
                                                                    @php
                                                                        $raion_shaar1 = $raion_shaar->where('id', Auth::user()->raion_shaar_id)->first();
                                                                    @endphp
                                                                    <option value="{{$raion_shaar1->id}}" selected="true">{{$raion_shaar1->title}}</option>
                                                                @else
                                                                    <option value="" disabled="true" selected="true">Алгач областты тандаңыз</option>
                                                                @endif
                                                            @else
                                                                <option value="" disabled="true" selected="true">Алгач областты тандаңыз</option>
                                                            @endif
                                                        </select>
                                                        <div class="invalid-feedback">Районду / шаарды тандаңыз!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <div id="opisanie_text00">
                                                    <div id="ttrr">
                                                        <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                        <div class="invalid-feedback summernote02">Пикир жазыңыз!</div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                @else
                                    <div class="row align-items-top">
                                      <div class="col-auto pr-1">
                                        <p class="required mb-1"><b>Пикир калтыруу</b></p>
                                      </div>
                                      <div class="col pr-0 pl-0">
                                        <hr>
                                      </div>
                                      <div class="col-auto opisanie_bottom pl-0">
                                        <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                        <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                                      </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-auto pr-0">
                                            @if(\Auth::user()->img_160_160 == null)
                                            <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%"  style="max-width: 50px;">
                                            @else
                                            <img src="{{ asset('/storage/users/img_160_160/') }}/{{\Auth::user()->img_160_160}}" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%" style="max-width: 50px;">
                                            @endif 
                                        </div>
                                        <div class="col pl-1">
                                            <div id="opisanie_text00">
                                                <div id="ttrr">
                                                    <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                    <div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif 
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-info float-right mt-2 pt-1 pb-1 pl-3 pr-3">Жөнөтүү <i class="fas fa-arrow-right pl-2"></i></button>
                                </div>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="mt-5 pb-5">
                            <form  action="{{ route('otpravit_otzyv_kursa', ['for_role' => '1', 'product_id' => $podcategories->id]) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('POST')
                            @if(Auth::user()->oblast_id == null)
                                <div class="row align-items-top">
                                  <div class="col-auto pr-1">
                                    <p class="required mb-1"><b>Пикир калтыруу</b></p>
                                  </div>
                                  <div class="col pr-0 pl-0">
                                    <hr>
                                  </div>
                                  <div class="col-auto opisanie_bottom pl-0">
                                    <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                    <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                                  </div>
                                </div>
                                <div class="row align-items-center">
                                    
                                        <div class="col-md-4 mt-2">
                                            <div class="row">
                                                <div class="col-auto pr-0">
                                                    @if(\Auth::user()->img_160_160 == null)
                                                    <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%"  style="max-width: 50px;">
                                                    @else
                                                    <img src="{{ asset('/storage/users/img_160_160/') }}/{{\Auth::user()->img_160_160}}" class="img-circle shadow-sm"  alt="\Auth::user()->name}}" width="100%" style="max-width: 50px;">
                                                    @endif 
                                                </div>
                                                
                                                <div class="col">
                                                    <select name="oblast" id="materialcategory_id" class="form-control productcategory pt-0 pb-0 pl-1 pr-1" required="">
                                                        <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                                        @foreach ($oblast as $oblast)
                                                        <option value="{{$oblast['id']}}">{{$oblast['title']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Областты тандаңыз!</div>

                                                    <select name="raion_shaar" id="materialpodcategory_id" class="form-control productname pt-0 pb-0 pl-1 pr-1 mt-2" required="">
                                                        @if(Auth::user()->oblast_id != null)
                                                            @if(Auth::user()->raion_shaar_id != null)
                                                                @php
                                                                    $raion_shaar1 = $raion_shaar->where('id', Auth::user()->raion_shaar_id)->first();
                                                                @endphp
                                                                <option value="{{$raion_shaar1->id}}" selected="true">{{$raion_shaar1->title}}</option>
                                                            @else
                                                                <option value="" disabled="true" selected="true">Алгач областты тандаңыз</option>
                                                            @endif
                                                        @else
                                                            <option value="" disabled="true" selected="true">Алгач областты тандаңыз</option>
                                                        @endif
                                                    </select>
                                                    <div class="invalid-feedback">Районду / шаарды тандаңыз!</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <div id="opisanie_text00">
                                                <div id="ttrr">
                                                    <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                    <div class="invalid-feedback summernote02">Пикир жазыңыз!</div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @else
                                <div class="row align-items-top">
                                  <div class="col-auto pr-1">
                                    <p class="required mb-1"><b>Пикир калтыруу</b></p>
                                  </div>
                                  <div class="col pr-0 pl-0">
                                    <hr>
                                  </div>
                                  <div class="col-auto opisanie_bottom pl-0">
                                    <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                    <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                                  </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-auto pr-0">
                                        @if(\Auth::user()->img_160_160 == null)
                                        <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%"  style="max-width: 50px;">
                                        @else
                                        <img src="{{ asset('/storage/users/img_160_160/') }}/{{\Auth::user()->img_160_160}}" class="img-circle shadow-sm"  alt="{{\Auth::user()->name}}" width="100%" style="max-width: 50px;">
                                        @endif 
                                    </div>
                                    <div class="col pl-1">
                                        <div id="opisanie_text00">
                                            <div id="ttrr">
                                                <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                <div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif 
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info float-right mt-2 pt-1 pb-1 pl-3 pr-3">Жөнөтүү <i class="fas fa-arrow-right pl-2"></i></button>
                            </div>
                            </form>
                        </div>
                    @endif
                @endif
            @endif

                                    

    </section><!-- /.content -->
    <!-- /.content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('/packages/custom_scroll/jquery-1.11.0.min.js') }}"></script>
<script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
<script src="{{ asset('/packages/custom_scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>

  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('select[name="oblast"]').on('change',function(){
            var countryID = jQuery(this).val();
            if(countryID)
            {
                jQuery.ajax({
                    url : '/olimpiada/info/raion/' +countryID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        jQuery('select[name="raion_shaar"]').empty();
                        $('select[name="raion_shaar"]').append('<option value="" disabled="true" selected="true">Районду / шаарды тандаңыз</option>');
                        jQuery.each(data, function(key,value) {
                            $('select[name="raion_shaar"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="raion_shaar"]').empty();
            }
        });
    });



$('#opisanie_text').hide();
$('#opisanie_text_summernot').hide();

$("#opisanie_text").click(function () {
    var opisanie_text = $('#summernote2').val();
    $("#ttrr").remove();
    $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" id="summernote" class="form-control" required></textarea><div class="invalid-feedback summernote02">Пикир жазыңыз!</div></div>');
    $('#summernote').val(opisanie_text);
    $('#opisanie_text').hide();
    $('#opisanie_text_summernot').show();

    $(function () {
    // Summernote
        $('#summernote').summernote({
            lang: 'ru-RU',           // set maximum height of editor
            placeholder: 'Пикир жазыңыз',
            disableDragAndDrop: true,
            toolbar: [
                ['font', ['bold', 'underline', 'italic']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            focus: true,
            });
      });
});

@if(\Auth::user())
    @php
        $comment1 = $comments->where('user_id', \Auth::user()->id)->first();
    @endphp
    @if($comment1 != null)
        $("#opisanie_text_summernot").click(function () {
            $("#ttrr").remove();
            $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз">{{$comment1->text}}</textarea><div class="invalid-feedback summernote02">Пикир жазыңыз!</div></div>');
            document.getElementById("summernote2").focus();
            $('#opisanie_text').show();
            $('#opisanie_text_summernot').hide();
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
        });
    @else
        $("#opisanie_text_summernot").click(function () {
            $("#ttrr").remove();
            $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз"></textarea><div class="invalid-feedback summernote02">Пикир жазыңыз!</div></div>');
            document.getElementById("summernote2").focus();
            $('#opisanie_text').show();
            $('#opisanie_text_summernot').hide();
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
        });
    @endif
@endif


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