@extends('layouts.app')

@section('content')

 
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />
<style type="text/css">
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
.for_upload_img{
  width: calc(50% - 16px);
  padding: 0px;
}
.for_upload_img2{
  width: calc(50% - 18px);
  padding: 0px;
}

@if($urokies->youtube_control_status == 2)
.plyr__video-embed {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */  
    padding-top: 25px;
    width: 300%; /* enlarge beyond browser width */
    left: -100%; /* center */
}

.plyr__video-embed iframe {
    position: absolute; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%;
}

@endif

.wrapper {
   overflow: hidden;
   max-width: 100%;
}

</style>

<section class="content">
  <div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
            <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
        </div>
    @endif
    @if (session('success2'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
            <h5><i class="icon fas fa-check"></i> {{ session('success2') }}</h5>
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
                        <li class="breadcrumb-item">
                            <a href="{{route('kurs', $podcategory['id'])}}">
                                {{$podcategory['title']}}
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
                        <li class="breadcrumb-item">
                            <a href="{{route('kurs', $podcategory['id'])}}">
                                {{$podcategory['title']}}
                            </a>
                        </li>
                        @endif
                        <li class="breadcrumb-item active">{{$urokies['title']}}</li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>
    <div class="row">
      <div class="col-md-9">
        <div class=""> 
          <div id="" class="bs-stepper stepper3">
            <div id="test110" class="bs-stepper-header border shadow-sm" role="tablist" style="border-radius: 4px;">
              @if($count3 > 0)
              <div class="step" data-target="#test-nlf-01">
                <button type="button" class="step-trigger" role="tab" id="stepper3trigger01" aria-controls="test-nlf-01">
                  <span class="bs-stepper-circle">
                    <span class="fas fa-video" aria-hidden="true"></span>
                  </span>
                  <span class="bs-stepper-label">Видео</span>
                </button>
              </div>
              <div class="bs-stepper-line"></div>
              @endif
              @if($urokies->text != null)
              <div class="step" data-target="#test-nlf-02">
                <button type="button" class="step-trigger" role="tab" id="stepper3trigger02" aria-controls="test-nlf-02">
                  <span class="bs-stepper-circle">
                    <span class="fas fa-align-center" aria-hidden="true"></span>
                  </span>
                  <span class="bs-stepper-label">Текст</span>
                </button>
              </div>
              <div class="bs-stepper-line"></div>
              @endif
              @if($urokies->test_id != null)
              <div class="step" data-target="#test-nlf-03">
                <button type="button" class="step-trigger" role="tab" id="stepper3trigger03" aria-controls="test-nlf-03">
                  <span class="bs-stepper-circle">
                    <span class="fas fa-spell-check" aria-hidden="true"></span>
                  </span>
                  <span class="bs-stepper-label">Тест</span>
                </button>
              </div>
              @endif
              @foreach ($frames as $frame)
              <div class="bs-stepper-line"></div>
              <div class="step" data-target="#test-nlf-{{$loop->iteration}}">
                <button type="button" class="step-trigger" role="tab" id="stepper3trigger{{$loop->iteration}}" aria-controls="test-nlf-{{$loop->iteration}}">
                  <span class="bs-stepper-circle">
                    <span class="far fa-lightbulb" aria-hidden="true"></span>
                  </span>
                  <span class="bs-stepper-label">{{$frame->title}}</span>
                </button>
              </div>
              @endforeach
              @if($urokies->ssylka != null)
              <div class="bs-stepper-line"></div>
              <div class="step" data-target="#test-nlf-0001">
                <button type="button" class="step-trigger" role="tab" id="stepper3trigger0001" aria-controls="test-nlf-0001">
                  <span class="bs-stepper-circle">
                    <span class="fas fa-download" aria-hidden="true"></span>
                  </span>
                  <span class="bs-stepper-label">Скачать</span>
                </button>
              </div>
              @endif
              @if($zadanie != null)
              <div class="bs-stepper-line"></div>
              <div class="step" data-target="#test-nlf-0002">
                <button type="button" class="step-trigger" role="tab" id="stepper3trigger0002" aria-controls="test-nlf-0002">
                  <span class="bs-stepper-circle">
                    <span class="fas fa-laptop-house" aria-hidden="true"></span>
                  </span>
                  <span class="bs-stepper-label">Тапшырма</span>
                </button>
              </div>
              @endif
            </div>
            <div class="bs-stepper-content p-0 mt-4">
              @if($count3 > 0)
              <div id="test-nlf-01" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger01">
                @foreach($youtube as $key => $value)
                <span class="pt-2 pb-2">{{$youtube[$key]->youtube_video_title}}</span>
                <div class="card bg-light d-flex flex-fill mb-4 mt-2">
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
                  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_ssylke[$key]->youtube_video_ssylka, $match);
                  $youtube_id = $match[1];
                  ?>

                  @if($urokies->youtube_control_status == 0)
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe style="border-radius: 3px;"
                        class="embed-responsive-item"
                          width="1920" height="1080"
                          src="https://www.youtube.com/embed/<?php echo $youtube_id;  ?>?VQ=HD1080"
                          frameborder="0"
                          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen>
                      </iframe>
                    </div>
                  @endif

                  @if($urokies->youtube_control_status == 1)
                    <div class="wrapper" style="border-radius: 3px;">
                      <div class="plyr__video-embed js-player" >
                          <iframe
                              src="https://www.youtube.com/embed/<?php echo $youtube_id;  ?>?VQ=HD1080"
                              allowfullscreen
                              allowtransparency    
                              allow="autoplay" width="1920" height="1080"
                          ></iframe>
                      </div>
                    </div>
                  @endif

                  @if($urokies->youtube_control_status == 2)
                    <div class="wrapper" style="border-radius: 3px;">
                      <div class="plyr__video-embed js-player" >
                          <iframe
                              src="https://www.youtube.com/embed/<?php echo $youtube_id;  ?>?VQ=HD1080"
                              allowfullscreen
                              allowtransparency    
                              allow="autoplay" width="1920" height="1080"
                          ></iframe>
                      </div>
                    </div>
                  @endif
                  
                  
                </div>
                @endforeach
                @foreach($video as $key => $value)
                <span class="pt-2 pb-2">{{$video[$key]->video_title}}</span>
                <div class="card bg-light d-flex flex-fill mb-4 mt-2">
                  <video oncontextmenu="return false;" controls controlsList="nodownload" width="100%" height="100%" style="border-radius: 3px;">
                    <source id="video" src="{{asset('')}}/storage/kursy/videos/{{$video_name[$key]->video_name}}" type="video/mp4">
                      Ваш браузер не поддерживает видео tag.
                  </video>
                </div>
                @endforeach
              </div>
              @endif
              @if($urokies->text != null)
              <div id="test-nlf-02" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger02">
                {!!$urokies['text']!!}
                <!--<button class="btn btn-primary" onclick="stepper3.next()">Next</button>-->
              </div>
              @endif
              @if($urokies->test_id != null)
              <div id="test-nlf-03" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger03">
                <div class="card">
                  <div class="card-body p-0 class11">
                    <div class="row">
                      <div class="col-md-6">
                        <img style="width: 100%; border-radius: 4px;" @if($tests['img'] != null) src="{{asset('')}}/storage/testy/images/thumbnail/{{$tests['img']}}" @else src="https://assets-global.website-files.com/5e78ee1f2f0ca263f9b67c56/5f04a4babe7bb91e10639f9a_ssat-at-home01%402x.png" @endif>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body pr-3 pl-3 pt-4 pb-3">
                          <h5 class="card-title">{{$tests->title}}</h5>
                          <p class="card-text mb-0 pt-3"><small class="">Тесттин узактыгы: {{$tests->time / 60}} минут</small></p>
                          <p class="card-text mb-0"><small class="">Суроолордун саны: {{$tests->test_voprosy_count}}</small></p>
                          <p class="card-text mb-0 mt-2">Мүмкүндүктөрдүн саны: 
                            @if (\Auth::user()) 
                              @if($proverka != null) {{$tests->kol_popytkov - $proverka}} / 
                                {{$tests->kol_popytkov}}
                              @else 
                                0 / {{$tests->kol_popytkov}}
                              @endif
                            @else 
                              0 / {{$tests->kol_popytkov}}
                            @endif
                          </p>
                          <a type="button"
                            @if (\Auth::user())
                              @if($proverka < $tests->kol_popytkov)
                                class="btn btn-block btn-info mt-3 play_test"
                              @else
                                class="btn btn-block btn-info mt-3" disabled
                              @endif
                            @else
                              class="btn btn-block btn-info mt-3 kupit_test"
                            @endif>

                            @if (\Auth::user())
                              @if($proverka < $tests->kol_popytkov)
                                Баштоо
                              @else
                                0 попыток
                              @endif
                            @else
                              Баштоо
                            @endif
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group test_margin pt-3 mt-4">
                  <div class="card card-primary card-outline for_peremestit">
                    <div class="card-header pl-3 pr-2 pt-1 pb-1">
                      <div class="row">
                        <div class="col">
                          <p class="mb-0"><b>Менин жыйынтыктарым</b></p>
                        </div>
                      </div>
                    </div>
                    <div class="card-body pb-0 pt-3 pr-2 pl-2 class11">
                      @if (\Auth::user())
                      @foreach ($test_controls_one as $user_result)
                      <div class="card block23 two">
                        <a style="display:block" href="{{route('result_test_one', [$tests->id, $user_result->id])}}"></a>
                        <div class="card-body pb-2 pt-2 pr-2 pl-2 class11">
                          <div class="row align-items-center">
                            <div class="col-md-6">
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <div class="row align-items-center">
                                    <div class="col-auto"><i class="far fa-clock"></i></div>
                                    <div class="col">
                                      <div class="user-block1">
                                        <span class="username1 ml-0 d-inline-block">{{$user_result['updated_at']->format('d.m.Y')}}</span>
                                        <span class="description1 ml-0">{{$user_result['updated_at']->format('H:i:s')}}</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col text-right">
                                  <span class="">Балл: @if($summa_ballov / $tests->test_voprosy_count >= 1 ){{$user_result->kol_ballov_usera}} @else {{$tests->test_voprosy_count}} @endif</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="row align-items-center">
                                <div class="col text-center">
                                  <span class="description1 ml-0">Туура жооптордун саны: {{$user_result->kol_pravilnyh_otvetov}} <small class="text-muted">/ {{$tests->test_voprosy_count}}</small></span>
                                </div>
                                <div class="col-auto text-right">
                                  <span class="float-right rrttrr"><b>{{round(($user_result->kol_ballov_usera * 100) / $user_result->test_summa_ballov)}} %</b></span>
                                </div>
                              </div>
                            </div>            
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @else
                      <div class="row align-items-center">
                        <div class="col-md-10">
                          <p class="mb-2">Тесттин результаттарын көрүү үчүн, алгач системага кирүү керек </p>
                        </div>
                        <div class="col-md-2 text-right mb-2">
                          <a href="{{route('showurok2', ['podcat_id'=>$podcat_id02, 'id'=>$urokies['id']])}}" class="btn btn-block btn-outline-info pt-1">Кирүү</a>
                        </div>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
                @if(count($test_controls_many) > 0)
                <div class="form-group test_margin pt-3 mt-4">
                  <div class="card card-primary card-outline for_peremestit">
                    <div class="card-header pl-3 pr-2 pt-1 pb-1">
                      <div class="row">
                        <div class="col">
                          <p class="mb-0"><b>Жогорку жыйынтыктар</b></p>
                          <p class="mb-0 text-muted"><small>Бул жерде алдыңкы 50 жыйынтык көрсөтүлөт</small></p>
                        </div>
                      </div>
                    </div>
                    <div class="card-body pb-0 pt-4 pr-3 pl-3 class11">
                      @foreach ($test_controls_many as $user_result2)
                      <h7 class="mb-0 pt-3">{{$loop->iteration}}. {{$user_result2->user['name']}}<span class="float-right">{{round(($user_result2->kol_ballov_usera * 100) / $user_result2->test_summa_ballov)}} %</span></h7><hr class="mt-0 mb-4">
                      @endforeach
                    </div>
                  </div>
                  <p id="demo"></p>
                </div>
                @endif
                <div class="modal fade bd-example-modal-lg" id="modal-default2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="text-muted text-center mb-0"><b>Тестти баштоо</b></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6 pl-3 pr-3">
                            <p class="text-muted mb-0 pt-3">Тестти баштоого даярсызбы?<br> Тест узактыгы: {{$tests->time / 60}} минута</p>
                          </div>           
                        </div>
                        <a type="button" href="{{route('play_test_for_kurs', $tests['id'])}}" class="btn btn-block btn-info mt-3">Баштоо</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade bd-example-modal-lg" id="modal-default" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="text-muted text-center mb-0"><b>Тесттин аталышы: {{$tests->title}}</b></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row align-items-center">
                          <div class="col-md-6 pl-3 pr-3">
                            <img  class="d-block w-100" id="rebate_old_imag23"  style="width: 100%; border-radius: 4px;" @if($tests['img'] != null) src="{{asset('')}}/storage/testy/images/thumbnail/{{$tests['img']}}" @else src="https://assets-global.website-files.com/5e78ee1f2f0ca263f9b67c56/5f04a4babe7bb91e10639f9a_ssat-at-home01%402x.png" @endif>
                          </div>
                          <div class="col-md-6 pl-3 pr-3">
                            <p class="text-muted mb-0 pt-3">Автор <span class="float-right">{{$tests->user['name']}}</span></p><hr class="mt-2">
                            <p class="text-muted mb-0">Мүмкүндүктөрдүн саны <span class="float-right">{{$tests->kol_popytkov}}</span></p><hr class="mt-2">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row align-items-center mt-3">
                            <div class="col-md-10">
                              <p class="mb-2">Тестти баштоо үчүн алгач системага кирүү керек</p>
                            </div>
                            <div class="col-md-2 text-right mb-2">
                              <a href="{{route('showurok2', ['podcat_id'=>$podcat_id02, 'id'=>$urokies['id']])}}" class="btn btn-block btn-info pt-1">Кирүү</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @foreach ($frames as $frame)
              <div id="test-nlf-{{$loop->iteration}}" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger{{$loop->iteration}}">
                <span class="pt-2">{{$frame->title}}</span><br>
                <div class="mt-2">{!!$frame->frame!!}</div>
              </div>
              @endforeach
              @if($urokies->ssylka != null)
              <div id="test-nlf-0001" role="tabpanel" class="bs-stepper-pane fade text-center" aria-labelledby="stepper3trigger0001">
                <span class="pt-2">Файлды жүктөп алуу үчүн басыңыз</span><br>
                <div class="mt-5"><a class="btn btn-tool" href="{{ route('kurs_download', $urokies->id) }}"><i class="fas fa-download" style="font-size: 120px;"></i></a></div>
              </div>
              @endif
              @if($zadanie != null)
              <div id="test-nlf-0002" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger0002">
                <div class="row align-items-center mt-2 mb-4">
                  <div class="col-md-8">
                    <p class="pt-2 pl-2"><b>Тапшырманы аткарыңыз:</b> <small class="">(max: {{$zadanie->ball}} балл)</small></span>
                  </div>
                  @if($zadanie->file != null)
                  <div class="col-md-4 float-right text-right">
                    <a class="btn btn-default btn-tool pt-1 pb-1 pl-3 pr-3" href="{{ route('kurs_zadanie_download', $zadanie->id) }}"><i class="fas fa-download pr-2"></i> Скачать (тапшырма)</a>
                  </div>
                  @endif
                </div>
                <div class="mt-3">
                  <span class="pt-2">{!!$zadanie->text!!}</span>
                </div>
                <div class="row mt-4 mb-3">
                  @foreach ($zadanie_img as $img)
                  <div class="col-12 px-lg-2 py-lg-2 pt-2">
                    <div class="">
                      <img class="border" src="{{asset('')}}/storage/kursy/zadanie/images/{{$img['img']}}" style="width: 100%; border-radius: 5px;">
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="bs-stepper-line"></div>
                <div class="row m-2">
                  <div class="col-5"></div>
                  <div class="col-2"><div class="bs-stepper-line"></div></div>
                  <div class="col-5"></div>
                </div>
                @if (\Auth::user()) 
                  @if ($kupits != null)

                    @if($kupits->srok_dostupa == 0)
                      @if($zadanie_otvety != null)
                        @if($progress->status_vypol_zadanii == 0)
                        <p class="mb-0 mt-5"><b>Задание отправлено.</b></p>
                        <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                          <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa_update', ['zadanie_otvet_id'=>$zadanie_otvety->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group required mt-0">
                              <div class="row align-items-center mt-2 mb-3">
                                <div class="col">
                                  <label class="text-muted m-0">Тапшырма <small>(өзгөртүүгө болот)</small></label>
                                </div>
                                <div class="col-auto dropup">
                                  <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                    <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                    <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Файл
                                            <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                    <div class="dropdown-divider  mb-0 mt-0"></div>
                                    <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                    <button type="submit" class="dropdown-item" id="btn-img_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Сүрөт
                                            <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="mt-2 mb-3">
                                <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required="">{{$zadanie_otvety->text}}</textarea>
                                <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз!</div>
                              </div>
                              @if($zadanie_otvety->file != null)
                                <div class="row mt-3 align-items-center file_hide2 file_in_server">
                                  <div class="col-auto">
                                    <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                  </div>
                                  <div class="col"></div>
                                  <div class="col-auto">
                                    <i class="fas fa-trash btn btn-tool pr-0 delete-file" data-id="{{$zadanie_otvety->id}}"></i>
                                  </div>
                                </div>
                                <div class="bs-stepper-line file_hide2 file_in_server"></div>
                              @endif
                              <div class="row mt-3 align-items-center file_hide">
                                <div class="col">
                                  <p class="m-0" id="uploadfile_view"></p>
                                </div>
                                <div class="col-auto">
                                  <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                </div>
                              </div>
                              <div class="bs-stepper-line file_hide"></div>
                              @if (count($zadanie_otvety_img) > 0) 
                              <div class="col p-0 mt-4 img_hide2" id="imgs_in_server">
                                <div class="row mt-2 align-items-center">
                                  <div class="col">
                                    <p class="m-0">Сүрөттөр</p>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-trash btn btn-tool pr-0 delete-imgs" data-id="{{$zadanie_otvety->id}}"></i>
                                  </div>
                                </div>
                                <div class="border" style="border-radius: 4px;">
                                  @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                  <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                  @endforeach         
                                </div>
                              </div>
                              @endif
                              <div class="col p-0 mt-4">
                                <div class="row mt-2 align-items-center img_hide">
                                  <div class="col">
                                    <p class="m-0" id="">Сүрөттөр</p>
                                  </div>
                                  <div class="col-auto">
                                    <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                  </div>
                                </div>
                                <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                              </div>
                            </div>
                            <div class="mt-5 mb-3">
                              <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырма өзгөртүү</button>
                            </div>
                          </form>
                        </div>
                        @endif


                        @if($progress->status_vypol_zadanii == 1)
                          <p class="mb-0 mt-5"><b>Текшерүүгө бир аз убакыт талап кылынат, жооп күтө туруңуз</b> </p>
                          @if($zadanie_otvety->comment != null)
                          <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                          @endif

                          <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                            <div class="form-group required mt-0">
                              <div class="row align-items-center mt-2 mb-3">
                                <div class="col">
                                  <label class="text-muted m-0">Тапшырма <small></small></label>
                                </div>
                              </div>
                              <div class="mt-2 mb-3">
                                <p>Текст: {!!$zadanie_otvety->text!!}</p>
                              </div>
                              @if($zadanie_otvety->file != null)
                                <div class="row mt-3 align-items-center">
                                  <div class="col-auto">
                                    <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                  </div>
                                  <div class="col"></div>
                                </div>
                                <div class="bs-stepper-line"></div>
                              @endif
                              @if (count($zadanie_otvety_img) > 0) 
                              <div class="col p-0 mt-4">
                                <div class="row mt-2 align-items-center">
                                  <div class="col">
                                    <p class="m-0">Сүрөттөр</p>
                                  </div>
                                </div>
                                <div class="border" style="border-radius: 4px;">
                                  @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                  <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                  @endforeach         
                                </div>
                              </div>
                              @endif
                            </div>
                            <div class="mt-3 mb-3">
                              
                            </div>
                          </div>

                        @endif


                        @if($progress->status_vypol_zadanii == 2)
                        <p class="mb-0 mt-5"><b>Тапшырма текшерилди</b></p>
                          <p class="m-0">Балл: {{$zadanie_otvety->ball}} / {{$zadanie->ball}}</p>
                          @if($zadanie_otvety->comment != null)
                          <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                          @endif
                        <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                          <div class="form-group required mt-0">
                              <label class="text-muted m-0">Тапшырма</label>
                              <div class="mt-2 mb-3">
                                <p>Текст: {!!$zadanie_otvety->text!!}</p>
                              </div>
                              @if($zadanie_otvety->file != null)
                                <div class="row mt-3 align-items-center">
                                  <div class="col-auto">
                                    <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                  </div>
                                  <div class="col"></div>
                                </div>
                                <div class="bs-stepper-line"></div>
                              @endif
                              @if (count($zadanie_otvety_img) > 0) 
                              <div class="col p-0 mt-4">
                                <div class="row mt-2 align-items-center">
                                  <div class="col">
                                    <p class="m-0">Сүрөттөр</p>
                                  </div>
                                </div>
                                <div class="border" style="border-radius: 4px;">
                                  @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                  <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                  @endforeach         
                                </div>
                              </div>
                              @endif
                            </div>
                          </div>
                        @endif



                        @if($progress->status_vypol_zadanii == 3)
                        <p class="mb-0 mt-5"><b>Тапшырма текшерилди.</b> <small>(тапшырманы кайра жөнөтсөңүз болот)</small></p>
                          <p class="m-0">Балл: {{$zadanie_otvety->ball}} / {{$zadanie->ball}}</p>
                          @if($zadanie_otvety->comment != null)
                          <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                          @endif
                        <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                          <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa_update', ['zadanie_otvet_id'=>$zadanie_otvety->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group required mt-0">
                              <div class="row align-items-center mt-2 mb-3">
                                <div class="col">
                                  <label class="text-muted m-0">Тапшырма <small>(өзгөртүүгө болот)</small></label>
                                </div>
                                <div class="col-auto dropup">
                                  <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                    <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                    <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Файл
                                            <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                    <div class="dropdown-divider  mb-0 mt-0"></div>
                                    <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                    <button type="submit" class="dropdown-item" id="btn-img_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Сүрөт
                                            <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="mt-2 mb-3">
                                <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required="">{{$zadanie_otvety->text}}</textarea>
                                <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                              </div>
                              @if($zadanie_otvety->file != null)
                                <div class="row mt-3 align-items-center file_hide2 file_in_server">
                                  <div class="col-auto">
                                    <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                  </div>
                                  <div class="col"></div>
                                  <div class="col-auto">
                                    <i class="fas fa-trash btn btn-tool pr-0 delete-file" data-id="{{$zadanie_otvety->id}}"></i>
                                  </div>
                                </div>
                                <div class="bs-stepper-line file_hide2 file_in_server"></div>
                              @endif
                              <div class="row mt-3 align-items-center file_hide">
                                <div class="col">
                                  <p class="m-0" id="uploadfile_view"></p>
                                </div>
                                <div class="col-auto">
                                  <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                </div>
                              </div>
                              <div class="bs-stepper-line file_hide"></div>
                              @if (count($zadanie_otvety_img) > 0) 
                              <div class="col p-0 mt-4 img_hide2" id="imgs_in_server">
                                <div class="row mt-2 align-items-center">
                                  <div class="col">
                                    <p class="m-0">Сүрөттөр</p>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-trash btn btn-tool pr-0 delete-imgs" data-id="{{$zadanie_otvety->id}}"></i>
                                  </div>
                                </div>
                                <div class="border" style="border-radius: 4px;">
                                  @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                  <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                  @endforeach         
                                </div>
                              </div>
                              @endif
                              <div class="col p-0 mt-4">
                                <div class="row mt-2 align-items-center img_hide">
                                  <div class="col">
                                    <p class="m-0" id="">Сүрөттөр</p>
                                  </div>
                                  <div class="col-auto">
                                    <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                  </div>
                                </div>
                                <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                              </div>
                            </div>
                            <div class="mt-5 mb-3">
                              <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы өзгөртүү</button>
                            </div>
                          </form>
                        </div>
                        @endif


                        @if($progress->status_vypol_zadanii == 4)
                        <p class="mb-0 mt-5"><b>Тапшырма текшерилди.</b> <small>(Тапшырманы кайра сөзсүз жөнөтүңүз!)</small></p>
                          @if($zadanie_otvety->comment != null)
                          <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                          @endif
                        <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                          <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa_update', ['zadanie_otvet_id'=>$zadanie_otvety->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group required mt-0">
                              <div class="row align-items-center mt-2 mb-3">
                                <div class="col">
                                  <label class="text-muted m-0">Тапшырма <small>(өзгөртүүгө болот)</small></label>
                                </div>
                                <div class="col-auto dropup">
                                  <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                    <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                    <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Файл
                                            <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                    <div class="dropdown-divider  mb-0 mt-0"></div>
                                    <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                    <button type="submit" class="dropdown-item" id="btn-img_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Сүрөт
                                            <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="mt-2 mb-3">
                                <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required="">{{$zadanie_otvety->text}}</textarea>
                                <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                              </div>
                              @if($zadanie_otvety->file != null)
                                <div class="row mt-3 align-items-center file_hide2 file_in_server">
                                  <div class="col-auto">
                                    <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                  </div>
                                  <div class="col"></div>
                                  <div class="col-auto">
                                    <i class="fas fa-trash btn btn-tool pr-0 delete-file" data-id="{{$zadanie_otvety->id}}"></i>
                                  </div>
                                </div>
                                <div class="bs-stepper-line file_hide2 file_in_server"></div>
                              @endif
                              <div class="row mt-3 align-items-center file_hide">
                                <div class="col">
                                  <p class="m-0" id="uploadfile_view"></p>
                                </div>
                                <div class="col-auto">
                                  <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                </div>
                              </div>
                              <div class="bs-stepper-line file_hide"></div>
                              @if (count($zadanie_otvety_img) > 0) 
                              <div class="col p-0 mt-4 img_hide2" id="imgs_in_server">
                                <div class="row mt-2 align-items-center">
                                  <div class="col">
                                    <p class="m-0">Сүрөттөр</p>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-trash btn btn-tool pr-0 delete-imgs" data-id="{{$zadanie_otvety->id}}"></i>
                                  </div>
                                </div>
                                <div class="border" style="border-radius: 4px;">
                                  @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                  <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                  @endforeach         
                                </div>
                              </div>
                              @endif
                              <div class="col p-0 mt-4">
                                <div class="row mt-2 align-items-center img_hide">
                                  <div class="col">
                                    <p class="m-0" id="">Сүрөттөр</p>
                                  </div>
                                  <div class="col-auto">
                                    <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                  </div>
                                </div>
                                <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                              </div>
                            </div>
                            <div class="mt-5 mb-3">
                              <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы өзгөртүү</button>
                            </div>
                          </form>
                        </div>
                        @endif
                      @else
                      <p class="mb-0 mt-5"><b>Сиз тапшырманы жөнөтө элексиз.</b></p>
                      <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                        <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa', ['urok_id'=>$urokies->id, 'zadanie_id'=>$zadanie->id, 'kupit_id' => $kupits->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                          @csrf
                          <div class="form-group required mt-0">
                            <div class="row align-items-center mt-2 mb-3">
                              <div class="col">
                                <label class="text-muted m-0">Тапшырма</label>
                              </div>
                              <div class="col-auto dropup">
                                <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                <!-- dropdown-menu -->
                                <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                  <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                  <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                    <div class="media">
                                      <div class="media-body">
                                        <h3 class="dropdown-item-title pt-2 pb-2">
                                          Файл
                                          <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                        </h3>
                                      </div>
                                    </div>
                                  </button>
                                  <div class="dropdown-divider  mb-0 mt-0"></div>
                                  <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                  <button type="submit" class="dropdown-item" id="btn-img_upload">
                                    <div class="media">
                                      <div class="media-body">
                                        <h3 class="dropdown-item-title pt-2 pb-2">
                                          Сүрөт
                                          <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                        </h3>
                                      </div>
                                    </div>
                                  </button>
                                </div>
                              </div>
                            </div>
                            <div class="mt-2 mb-3">
                              <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required=""></textarea>
                              <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                            </div>
                            <div class="row mt-3 align-items-center file_hide">
                              <div class="col">
                                <p class="m-0" id="uploadfile_view"></p>
                              </div>
                              <div class="col-auto">
                                <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                              </div>
                            </div>
                            <div class="bs-stepper-line file_hide"></div>
                            <div class="col p-0 mt-4">
                              <div class="row mt-2 align-items-center img_hide">
                                <div class="col">
                                  <p class="m-0" id="">Сүрөттөр</p>
                                </div>
                                <div class="col-auto">
                                  <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                </div>
                              </div>
                              <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                            </div>
                          </div>
                          <div class="mt-5 mb-3">
                            <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы жөнөтүү</button>
                          </div>
                        </form>
                      </div>
                      @endif
                    @else
                      @if(($kupits->srok_dostupa - (time() - $kupits->time)) > 0)
                        @if($zadanie_otvety != null)
                          @if($progress->status_vypol_zadanii == 0)
                          <p class="mb-0 mt-5"><b>Задание отправлено.</b></p>
                          <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                            <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa_update', ['zadanie_otvet_id'=>$zadanie_otvety->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                              @csrf
                              @method('PUT')
                              <div class="form-group required mt-0">
                                <div class="row align-items-center mt-2 mb-3">
                                  <div class="col">
                                    <label class="text-muted m-0">Тапшырма <small>(өзгөртүүгө болот)</small></label>
                                  </div>
                                  <div class="col-auto dropup">
                                    <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                    <!-- dropdown-menu -->
                                    <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                      <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                      <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Файл
                                              <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                            </h3>
                                          </div>
                                        </div>
                                      </button>
                                      <div class="dropdown-divider  mb-0 mt-0"></div>
                                      <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                      <button type="submit" class="dropdown-item" id="btn-img_upload">
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Сүрөт
                                              <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                            </h3>
                                          </div>
                                        </div>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div class="mt-2 mb-3">
                                  <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required="">{{$zadanie_otvety->text}}</textarea>
                                  <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз!</div>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center file_hide2 file_in_server">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col-auto">
                                      <i class="fas fa-trash btn btn-tool pr-0 delete-file" data-id="{{$zadanie_otvety->id}}"></i>
                                    </div>
                                  </div>
                                  <div class="bs-stepper-line file_hide2 file_in_server"></div>
                                @endif
                                <div class="row mt-3 align-items-center file_hide">
                                  <div class="col">
                                    <p class="m-0" id="uploadfile_view"></p>
                                  </div>
                                  <div class="col-auto">
                                    <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                  </div>
                                </div>
                                <div class="bs-stepper-line file_hide"></div>
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4 img_hide2" id="imgs_in_server">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-trash btn btn-tool pr-0 delete-imgs" data-id="{{$zadanie_otvety->id}}"></i>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center img_hide">
                                    <div class="col">
                                      <p class="m-0" id="">Сүрөттөр</p>
                                    </div>
                                    <div class="col-auto">
                                      <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                    </div>
                                  </div>
                                  <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                                </div>
                              </div>
                              <div class="mt-5 mb-3">
                                <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырма өзгөртүү</button>
                              </div>
                            </form>
                          </div>
                          @endif


                          @if($progress->status_vypol_zadanii == 1)
                            <p class="mb-0 mt-5"><b>Текшерүүгө бир аз убакыт талап кылынат, жооп күтө туруңуз</b> </p>
                            @if($zadanie_otvety->comment != null)
                            <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                            @endif

                            <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                              <div class="form-group required mt-0">
                                <div class="row align-items-center mt-2 mb-3">
                                  <div class="col">
                                    <label class="text-muted m-0">Тапшырма <small></small></label>
                                  </div>
                                </div>
                                <div class="mt-2 mb-3">
                                  <p>Текст: {!!$zadanie_otvety->text!!}</p>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                @endif
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                              </div>
                              <div class="mt-3 mb-3">
                                
                              </div>
                            </div>

                          @endif


                          @if($progress->status_vypol_zadanii == 2)
                          <p class="mb-0 mt-5"><b>Тапшырма текшерилди</b></p>
                            <p class="m-0">Балл: {{$zadanie_otvety->ball}} / {{$zadanie->ball}}</p>
                            @if($zadanie_otvety->comment != null)
                            <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                            @endif
                          <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                            <div class="form-group required mt-0">
                                <label class="text-muted m-0">Тапшырма</label>
                                <div class="mt-2 mb-3">
                                  <p>Текст: {!!$zadanie_otvety->text!!}</p>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                @endif
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                              </div>
                            </div>
                          @endif



                          @if($progress->status_vypol_zadanii == 3)
                          <p class="mb-0 mt-5"><b>Тапшырма текшерилди.</b> <small>(тапшырманы кайра жөнөтсөңүз болот)</small></p>
                            <p class="m-0">Балл: {{$zadanie_otvety->ball}} / {{$zadanie->ball}}</p>
                            @if($zadanie_otvety->comment != null)
                            <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                            @endif
                          <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                            <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa_update', ['zadanie_otvet_id'=>$zadanie_otvety->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                              @csrf
                              @method('PUT')
                              <div class="form-group required mt-0">
                                <div class="row align-items-center mt-2 mb-3">
                                  <div class="col">
                                    <label class="text-muted m-0">Тапшырма <small>(өзгөртүүгө болот)</small></label>
                                  </div>
                                  <div class="col-auto dropup">
                                    <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                    <!-- dropdown-menu -->
                                    <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                      <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                      <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Файл
                                              <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                            </h3>
                                          </div>
                                        </div>
                                      </button>
                                      <div class="dropdown-divider  mb-0 mt-0"></div>
                                      <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                      <button type="submit" class="dropdown-item" id="btn-img_upload">
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Сүрөт
                                              <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                            </h3>
                                          </div>
                                        </div>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div class="mt-2 mb-3">
                                  <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required="">{{$zadanie_otvety->text}}</textarea>
                                  <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center file_hide2 file_in_server">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col-auto">
                                      <i class="fas fa-trash btn btn-tool pr-0 delete-file" data-id="{{$zadanie_otvety->id}}"></i>
                                    </div>
                                  </div>
                                  <div class="bs-stepper-line file_hide2 file_in_server"></div>
                                @endif
                                <div class="row mt-3 align-items-center file_hide">
                                  <div class="col">
                                    <p class="m-0" id="uploadfile_view"></p>
                                  </div>
                                  <div class="col-auto">
                                    <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                  </div>
                                </div>
                                <div class="bs-stepper-line file_hide"></div>
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4 img_hide2" id="imgs_in_server">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-trash btn btn-tool pr-0 delete-imgs" data-id="{{$zadanie_otvety->id}}"></i>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center img_hide">
                                    <div class="col">
                                      <p class="m-0" id="">Сүрөттөр</p>
                                    </div>
                                    <div class="col-auto">
                                      <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                    </div>
                                  </div>
                                  <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                                </div>
                              </div>
                              <div class="mt-5 mb-3">
                                <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы өзгөртүү</button>
                              </div>
                            </form>
                          </div>
                          @endif


                          @if($progress->status_vypol_zadanii == 4)
                          <p class="mb-0 mt-5"><b>Тапшырма текшерилди.</b> <small>(Тапшырманы кайра сөзсүз жөнөтүңүз!)</small></p>
                            @if($zadanie_otvety->comment != null)
                            <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                            @endif
                          <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                            <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa_update', ['zadanie_otvet_id'=>$zadanie_otvety->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                              @csrf
                              @method('PUT')
                              <div class="form-group required mt-0">
                                <div class="row align-items-center mt-2 mb-3">
                                  <div class="col">
                                    <label class="text-muted m-0">Тапшырма <small>(өзгөртүүгө болот)</small></label>
                                  </div>
                                  <div class="col-auto dropup">
                                    <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                    <!-- dropdown-menu -->
                                    <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                      <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                      <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Файл
                                              <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                            </h3>
                                          </div>
                                        </div>
                                      </button>
                                      <div class="dropdown-divider  mb-0 mt-0"></div>
                                      <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                      <button type="submit" class="dropdown-item" id="btn-img_upload">
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Сүрөт
                                              <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                            </h3>
                                          </div>
                                        </div>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div class="mt-2 mb-3">
                                  <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required="">{{$zadanie_otvety->text}}</textarea>
                                  <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center file_hide2 file_in_server">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col-auto">
                                      <i class="fas fa-trash btn btn-tool pr-0 delete-file" data-id="{{$zadanie_otvety->id}}"></i>
                                    </div>
                                  </div>
                                  <div class="bs-stepper-line file_hide2 file_in_server"></div>
                                @endif
                                <div class="row mt-3 align-items-center file_hide">
                                  <div class="col">
                                    <p class="m-0" id="uploadfile_view"></p>
                                  </div>
                                  <div class="col-auto">
                                    <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                  </div>
                                </div>
                                <div class="bs-stepper-line file_hide"></div>
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4 img_hide2" id="imgs_in_server">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-trash btn btn-tool pr-0 delete-imgs" data-id="{{$zadanie_otvety->id}}"></i>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center img_hide">
                                    <div class="col">
                                      <p class="m-0" id="">Сүрөттөр</p>
                                    </div>
                                    <div class="col-auto">
                                      <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                    </div>
                                  </div>
                                  <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                                </div>
                              </div>
                              <div class="mt-5 mb-3">
                                <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы өзгөртүү</button>
                              </div>
                            </form>
                          </div>
                          @endif
                        @else
                        <p class="mb-0 mt-5"><b>Сиз тапшырманы жөнөтө элексиз.</b></p>
                        <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                          <form id="fileUploadForm" action="{{ route('otpravit_zadanie_k_avtoru_kursa', ['urok_id'=>$urokies->id, 'zadanie_id'=>$zadanie->id, 'kupit_id' => $kupits->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group required mt-0">
                              <div class="row align-items-center mt-2 mb-3">
                                <div class="col">
                                  <label class="text-muted m-0">Тапшырма</label>
                                </div>
                                <div class="col-auto dropup">
                                  <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                    <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                    <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Файл
                                            <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                    <div class="dropdown-divider  mb-0 mt-0"></div>
                                    <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                    <button type="submit" class="dropdown-item" id="btn-img_upload">
                                      <div class="media">
                                        <div class="media-body">
                                          <h3 class="dropdown-item-title pt-2 pb-2">
                                            Сүрөт
                                            <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                          </h3>
                                        </div>
                                      </div>
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="mt-2 mb-3">
                                <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required=""></textarea>
                                <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                              </div>
                              <div class="row mt-3 align-items-center file_hide">
                                <div class="col">
                                  <p class="m-0" id="uploadfile_view"></p>
                                </div>
                                <div class="col-auto">
                                  <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                </div>
                              </div>
                              <div class="bs-stepper-line file_hide"></div>
                              <div class="col p-0 mt-4">
                                <div class="row mt-2 align-items-center img_hide">
                                  <div class="col">
                                    <p class="m-0" id="">Сүрөттөр</p>
                                  </div>
                                  <div class="col-auto">
                                    <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                  </div>
                                </div>
                                <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                              </div>
                            </div>
                            <div class="mt-5 mb-3">
                              <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы жөнөтүү</button>
                            </div>
                          </form>
                        </div>
                        @endif
                      @else
                        @if($zadanie_otvety != null)
                          @if($progress->status_vypol_zadanii == 0)
                            <p class="mb-0 mt-5"><b>Тапшырма жөнөтүлдү.</b></p>
                            <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                              <div class="form-group required mt-0">
                                <div class="row align-items-center mt-2 mb-3">
                                  <div class="col">
                                    <label class="text-muted m-0">Тапшырма <small></small></label>
                                  </div>
                                </div>
                                <div class="mt-2 mb-3">
                                  <p>Текст: {!!$zadanie_otvety->text!!}</p>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                @endif
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                              </div>
                              <div class="mt-3 mb-3"></div>
                            </div>
                          @endif
                          @if($progress->status_vypol_zadanii == 1)
                            <p class="mb-0 mt-5"><b>Текшерүүгө бир аз убакыт талап кылынат, жооп күтө туруңуз</b> </p>
                            @if($zadanie_otvety->comment != null)
                            <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                            @endif
                            <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                              <div class="form-group required mt-0">
                                <div class="row align-items-center mt-2 mb-3">
                                  <div class="col">
                                    <label class="text-muted m-0">Тапшырма <small></small></label>
                                  </div>
                                </div>
                                <div class="mt-2 mb-3">
                                  <p>Текст: {!!$zadanie_otvety->text!!}</p>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                @endif
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                              </div>
                              <div class="mt-3 mb-3"></div>
                            </div>
                          @endif
                          @if($progress->status_vypol_zadanii > 1)
                            <p class="mb-0 mt-5"><b>Тапшырма текшерилди</b></p>
                            <p class="m-0">Балл: {{$zadanie_otvety->ball}} / {{$zadanie->ball}}</p>
                            @if($zadanie_otvety->comment != null)
                            <p class="m-0">Комментарий: {!!$zadanie_otvety->comment!!}</p>
                            @endif
                            <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                              <div class="form-group required mt-0">
                                <div class="row align-items-center mt-2 mb-3">
                                  <div class="col">
                                    <label class="text-muted m-0">Тапшырма <small></small></label>
                                  </div>
                                </div>
                                <div class="mt-2 mb-3">
                                  <p>Текст: {!!$zadanie_otvety->text!!}</p>
                                </div>
                                @if($zadanie_otvety->file != null)
                                  <div class="row mt-3 align-items-center">
                                    <div class="col-auto">
                                      <p class="m-0 block23" title="Скачать"><a href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety->id) }}"></a>Файл: {{$zadanie_otvety->file}} </p>
                                    </div>
                                    <div class="col"></div>
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                @endif
                                @if (count($zadanie_otvety_img) > 0) 
                                <div class="col p-0 mt-4">
                                  <div class="row mt-2 align-items-center">
                                    <div class="col">
                                      <p class="m-0">Сүрөттөр</p>
                                    </div>
                                  </div>
                                  <div class="border" style="border-radius: 4px;">
                                    @foreach ($zadanie_otvety_img as $zadanie_otvety_im)
                                    <img src="{{asset('')}}/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_im->img}}" class="for_upload_img2 border shadow-sm m-2" style="border-radius: 4px;">
                                    @endforeach         
                                  </div>
                                </div>
                                @endif
                              </div>
                              <div class="mt-3 mb-3"></div>
                            </div>
                          @endif
                        @else
                          <div class="mt-5 mb-2">
                            <span class="pt-2 pl-2"><b>Тапшырма жөнөтүүгө үлгүргөн жоксуз!</b> <small>(Время доступа истекло)</small></span><br>
                          </div>
                        @endif
                      @endif
                    @endif


                    




                    
                  @else
                  <div class="mt-5 mb-2">
                    <span class="pt-2 pl-2"><b>Тапшырманы жөнөтүү <small>(курстун авторуна)</small></b></span><br>
                  </div>
                  <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                  <div class="form-group required mt-0">
                    <div class="row align-items-center mt-2 mb-3">
                      <div class="col">
                        <label class="text-muted m-0">Тапшырма</label>
                      </div>
                      <div class="col-auto dropup">
                        <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                        <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                          <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                          <button type="submit"  class="dropdown-item" id="btn-file_upload"> 
                            <div class="media">
                              <div class="media-body">
                                <h3 class="dropdown-item-title pt-2 pb-2">
                                  Файл
                                  <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                </h3>
                              </div>
                            </div>
                          </button>
                          <div class="dropdown-divider  mb-0 mt-0"></div>
                          <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                          <button type="submit" class="dropdown-item" id="btn-img_upload">
                            <div class="media">
                              <div class="media-body">
                                <h3 class="dropdown-item-title pt-2 pb-2">
                                  Сүрөт
                                  <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                </h3>
                              </div>
                            </div>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="mt-2 mb-3">
                      <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required=""></textarea>
                      <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                    </div>
                    <div class="row mt-3 align-items-center file_hide">
                      <div class="col">
                        <p class="m-0" id="uploadfile_view"></p>
                      </div>
                      <div class="col-auto">
                        <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                      </div>
                    </div>
                    <div class="bs-stepper-line file_hide"></div>
                    <div class="col p-0 mt-4">
                      <div class="row mt-2 align-items-center img_hide">
                        <div class="col">
                          <p class="m-0" id="">Сүрөттөр</p>
                        </div>
                        <div class="col-auto">
                          <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                        </div>
                      </div>
                      <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                    </div>
                  </div>
                  <div class="mt-5 mb-3">
                    <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4 otpavit_zadanie" type="button"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы жөнөтүү</button>
                  </div>
                </div>
                  @endif 
                @else
                <div class="mt-5 mb-2">
                    <span class="pt-2 pl-2"><b>Тапшырманы жөнөтүү <small>(курстун авторуна)</small></b></span><br>
                  </div>
                  <div class="border p-2 mb-3 mt-2" style="border-radius: 4px;">
                  <div class="form-group required mt-0">
                    <div class="row align-items-center mt-2 mb-3">
                      <div class="col">
                        <label class="text-muted m-0">Тапшырма</label>
                      </div>
                      <div class="col-auto dropup">
                        <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Файлды тиркөө <i class="fas fa-angle-right pl-2"></i></a>
                        <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                          <input type="file" name="file"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                          <button type="submit"  class="dropdown-item" id="btn-file_upload"> 
                            <div class="media">
                              <div class="media-body">
                                <h3 class="dropdown-item-title pt-2 pb-2">
                                  Файл
                                  <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                </h3>
                              </div>
                            </div>
                          </button>
                          <div class="dropdown-divider  mb-0 mt-0"></div>
                          <input type="file" hidden="" id="uploadimg" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                          <button type="submit" class="dropdown-item" id="btn-img_upload">
                            <div class="media">
                              <div class="media-body">
                                <h3 class="dropdown-item-title pt-2 pb-2">
                                  Сүрөт
                                  <span class="float-right text-sm"><i class="far fa-image btn btn-tool" style="font-size: 20px;"></i></span>
                                </h3>
                              </div>
                            </div>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="mt-2 mb-3">
                      <textarea name="text" class="form-control" required rows="3" placeholder="Текст жазыңыз" required=""></textarea>
                      <div class="invalid-feedback">Кыскача түшүндүрмө жазыңыз</div>
                    </div>
                    <div class="row mt-3 align-items-center file_hide">
                      <div class="col">
                        <p class="m-0" id="uploadfile_view"></p>
                      </div>
                      <div class="col-auto">
                        <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                      </div>
                    </div>
                    <div class="bs-stepper-line file_hide"></div>
                    <div class="col p-0 mt-4">
                      <div class="row mt-2 align-items-center img_hide">
                        <div class="col">
                          <p class="m-0" id="">Сүрөттөр</p>
                        </div>
                        <div class="col-auto">
                          <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                        </div>
                      </div>
                      <div id="image-holder2" class="border img_hide" style="border-radius: 4px;"></div>
                    </div>
                  </div>
                  <div class="mt-5 mb-3">
                    <button class="btn btn-default btn-block btn-tool mt-2 pt-2 pb-2 pl-4 pr-4 otpavit_zadanie" type="button"><i class="fas fa-upload pr-3" style="font-size: 20px;"></i> Тапшырманы жөнөтүү</button>
                  </div>
                </div>
                @endif
              </div>
              @endif
            </div>
          </div>
        </div>
      </div><!-- /.col -->
      <div class="col-md-3 for_skryt">
        <div class="sticky-top mb-3">
        </div>
      </div><!-- /.col -->
    </div><!-- /.row --> 
  </div><!-- /.container-fluid -->
</section><!-- /.content -->

    
<script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>

<script src="{{asset('')}}/admin/plyr.js"></script>
<script type="text/javascript">


const players = Plyr.setup('.js-player');




  $('.delete-file').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    bootbox.confirm({
        title: "Аракетти ырастоо",
        message: "Бул файлды чын эле өчүрүгүңүз келеби? (Файл биротоло өчүрүлөт)",
        buttons: {
            confirm: {
                label: 'Өчүрүү',
                className: 'btn btn-success pt-1 pb-1 pl-3 pr-3'
            },
            cancel: {
                label: 'Жабуу',
                className: 'btn btn-link'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url : '/category/podcat/kurs/user/delete_user_otvet_file/'+id,
                    type : 'GET',
                    data : {
                        id : id,
                    },
                    success : function(response){
                        if(response){
                            $('.file_in_server').remove();
                        }
                    }.bind(this)
                })
            }
        }.bind(this)
    });
});

$('.delete-imgs').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    bootbox.confirm({
        title: "Аракетти ырастоо",
        message: "Бул сүрөттөрдү чын эле өчүрүгүңүз келеби? (Сүрөттөр биротоло өчүрүлөт)",
        buttons: {
            confirm: {
                label: 'Өчүрүү',
                className: 'btn btn-success pt-1 pb-1 pl-3 pr-3'
            },
            cancel: {
                label: 'Жабуу',
                className: 'btn btn-link'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url : '/category/podcat/kurs/user/delete_user_otvet_imgs/'+id,
                    type : 'GET',
                    data : {
                        id : id,
                    },
                    success : function(response){
                        if(response){
                            $('#imgs_in_server').remove();
                        }
                    }.bind(this)
                })
            }
        }.bind(this)
    });
});



$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })  
$(document).on('click', '.play_test', function(){    
    $('#modal-default2').modal('show')
});

$(document).on('click', '.kupit_test', function(){    
    $('#modal-default').modal('show')
});

$('.file_hide').hide();
$('.img_hide').hide();

$(function () {
    $('#btn-file_upload').click(function (e) {
        e.preventDefault();
        $('#uploadfile').click();
    });

     $('#uploadfile').on('change', function() {
          var splittedFakePath = this.value.split('\\');
          $('#uploadfile_view').text(splittedFakePath[splittedFakePath.length - 1]);
          $('.file_hide').show();
          $('.file_hide2').hide();
          
        });
     $("#uploadfile_clear").click(function () {
        $("#uploadfile").val("");
        $('#uploadfile_view').text("");
        $('.file_hide').hide();
        $('.file_hide2').show();
    });
});

$(function () {
    $('#btn-img_upload').click(function (e) {
        e.preventDefault();
        $('#uploadimg').click();
    });

    $('#uploadimg').on('change', function() {
          
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder2 = $("#image-holder2");
          image_holder2.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "for_upload_img border shadow-sm m-2",
                    "style": "border-radius: 4px;"
                  }).appendTo(image_holder2);
                }
                image_holder2.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
          $('.img_hide').show();
          $('.img_hide2').hide();
      });

    $("#uploadimg_clear").click(function () {
        $("#uploadimg").val("");
        $('.img_hide').hide();
        $('.img_hide2').show();
        $('.for_upload_img').remove();

        
    });
});
        


$(document).on('click', '.otpavit_zadanie', function(){    
    Swal.fire({
      icon: 'error',
      title: '<h1 class="modal-title">Токтоңуз!</h1>',
      text: 'Бул параметр акы төлөнүүчү курстар үчүн гана жеткиликтүү. (Тапшырма жөнөтүү үчүн алгач курсту сатып алышыңыз керек)',
      showConfirmButton: false,
      timer: 4000,
      timerProgressBar: true,
      padding: '1rem',
  })
});

// для блока, чтобы стал кнопкой
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
// для блока, чтобы стал кнопкой


</script>

<!-- запрет правой кнопки мыши, F12, Ctrl+U, Ctrl+Shift+I, Ctrl+Shift+J -->
<script type="text/javascript">
  function click(e) {
    if (document.all) {
          if (event.button == 2 || event.button == 3) {alert ("Пожалуйста, свяжитесь с центром источников! Спасибо за сотрудничество !!!");
          oncontextmenu='return false'; 
      }
    }
    if (document.layers) {
      if (e.which == 3) {
        oncontextmenu='return false';
      }
    }
  }
  if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
  }
  document.onmousedown=click;
  document.oncontextmenu = new Function("return false;")
 
  document.onkeydown =document.onkeyup = document.onkeypress=function(){ 
    if(window.event.keyCode == 123) { 
      window.event.returnValue=false;
      return(false); 
    } 
  }
</script>
<script type="text/javascript">
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script>
<!-- запрет правой кнопки мыши, F12, Ctrl+U, Ctrl+Shift+I, Ctrl+Shift+J -->
@endsection