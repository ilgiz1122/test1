@extends('layouts.app')

@section('title', 'Башкы бет')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/packages/slick/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/packages/slick/slick-theme.css') }}">
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

.for_color_navedenii:hover .for_color{
    color: #17a2b8;
}

hr.new2 {
  border-top: 2px dashed #17a2b8;
  border-radius: 3px;
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

                                            
     
    <div class="row ml-0 mr-0">
        <!--<div class="col-md-6 p-0">
              <img class="card-img-top" src="https://nonsi.kg/public/img/2_l_1280_1(2).jpg" alt="Dist Photo 2">
              <div class="card-img-overlay d-flex flex-column justify-content-center pl-5 pr-5">
                <h1 class="text-dark"><strong>Скачивайте<br><span class="h2"><strong>материалы</strong></span></strong></h1>
                <p class="pb-2 pt-1 text-muted">
                  Презентации, документы,<br>таблицы, pdf файлы,<br>электронные<br>книги и.т.д.
                </p>
                <a class="scrollto" href="#yakor_materialy" style="color: #000000">
                    <strong>
                        <div class="row">
                            <div class="col-auto">
                                <span><i class="far fa-hand-point-down" style="color: #007bff; font-size: 30px;"></i></span>
                            </div>
                            <div class="col">
                                Подробнее
                            </div>
                        </div>
                    </strong>
                </a>
              </div>
        </div>
        <div class="col-md-6 p-0">
              <img class="card-img-top" src="https://nonsi.kg/public/img/2_r_1280_1 (2).jpg" alt="Dist Photo 2">
              <div class="card-img-overlay d-flex flex-column justify-content-center pl-5 pr-5">
                <h1 class="text-dark"><strong>Пройдите <br><span class="h2"><strong>онлайн курсы</strong></span></strong></h1>
                <p class="pb-2 pt-1 text-muted">
                  Подготовка к ОРТ,<br>математика,<br>химия,<br>программирование и.т.д.
                </p>
                <a class="scrollto" href="#yakor_materialy" style="color: #000000">
                    <strong>
                        <div class="row">
                            <div class="col-auto">
                                <span><i class="far fa-hand-point-down" style="color: #ff851b; font-size: 30px;"></i></span>
                            </div>
                            <div class="col">
                                Подробнее
                            </div>
                        </div>
                    </strong>
                </a>
              </div>
        </div> -->       
    </div>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--<h4 class="mt-5 text-center"><strong>Продовайте свои материалы и курсы</strong></h4>
            <p class="text-center text-muted">(Заробатывайте вместе с нами)</hp>                  
            <div class="row p-3" style="border-top-left-radius: 30px; border-bottom-right-radius: 30px;">

                <div class="col-md-6 p-3 border-right">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <img class="" width="100%" src="https://nonsi.kg/public/img/asd3.png" alt="Dist Photo 2" style="max-width: 170px;">
                        </div>
                        <div class="col-md-8 text-center">
                            <h6><strong><span class="info-box-text for_color">Начните продовать материалы</span></strong></h6>
                            <span class="progress-description">У вас есть возможность заробатывать вместе с нами. Опубликуйте свои материалы (word, power point, excel, pdf, rar и.т.д.) и продовайте на нашем сервисе. Деньги которые вы заработали можно обналичить в любое время.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-3 border-left">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <img class="img-circle" src="https://nonsi.kg/public/img/asd5.png" alt="Dist Photo 2" width="100%" style="max-width: 170px;">
                        </div>
                        <div class="col-md-8 text-center">
                            <h6><strong><span class="info-box-text for_color">Начните продовать курсы</span></strong></h6>
                            <span class="progress-description">Создайте курс и продайте на нашем сервисе. Можно загрузить видео с компьютера (телефона) или встраивать видео с ютуба. А также есть возможность загрузить материал для скачивания.</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="new2 mt-5 mb-0">      -->
            <section class="variable variable22 slider mt-3" id="newMessage" style="display:none;">
                @foreach ($banners as $banner)
                <div>
                    <div class="card mb-2 bg-gradient-dark" style="border-radius: 10px;">
                        <div class="img3">
                            <img class="card-img-top img2" style="border-radius: 10px;" src="{{ asset('/storage/banner/') }}/{{$banner->img}}">
                        </div>
                      <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h2 class="text-white "><b>{{$banner->title}}</b></h2>
                        <p class="card-text text-white pb-1 pt-3">{{$banner->opisanie}}</p>
                        <div class="text-right">
                            <a href="{{$banner->ssylka}}" class="btn btn-outline-info text-white" style="border-radius: 20px;"><span class="p-1">Кененирээк <i class="fas fa-long-arrow-alt-right mt-1 pl-2"></i></span></a>
                        </div>
                        
                      </div>
                    </div>
                </div>
                @endforeach
              </section>

              
<!--<div class="embed-responsive embed-responsive-4by3" style="padding-left: 21px; padding-right: 21px;">
  <iframe class="embed-responsive-item" src="https://docs.google.com/presentation/d/e/2PACX-1vRsSWDK6d5-Oi7jD-XXo9Pi_POkNj7IVzPfI5X71sFcWYC-1OTxNfwdZwi-NSIliMLILphIwX5ZEoV4/embed?start=true&loop=true&delayms=3000" ></iframe>
</div>
<br>

<div class="embed-responsive embed-responsive-4by3" style="padding-left: 108px; padding-right: 108px;">
  <iframe class="embed-responsive-item" src="https://docs.google.com/presentation/d/e/2PACX-1vRsSWDK6d5-Oi7jD-XXo9Pi_POkNj7IVzPfI5X71sFcWYC-1OTxNfwdZwi-NSIliMLILphIwX5ZEoV4/embed?start=true&loop=true&delayms=3000" ></iframe>
</div>
<br>
<div class="embed-responsive embed-responsive-16by9" style="padding-left: 20px; padding-right: 20px;">
  <iframe class="embed-responsive-item" src="https://docs.google.com/presentation/d/e/2PACX-1vRsSWDK6d5-Oi7jD-XXo9Pi_POkNj7IVzPfI5X71sFcWYC-1OTxNfwdZwi-NSIliMLILphIwX5ZEoV4/embed?start=true&loop=true&delayms=3000" ></iframe>
</div> -->
                    <div class="mt-4 mb-3"> 
                      <div id="" class="bs-stepper stepper3">
                        <div id="test110" class="bs-stepper-header border shadow-sm" role="tablist" style="border-radius: 4px;">

                          <div class="step" data-target="#test-nlf-01">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger01" aria-controls="test-nlf-01">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-file-powerpoint" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Презентация</span>
                            </button>
                          </div>
                          <div class="bs-stepper-line"></div>

                          <div class="step" data-target="#test-nlf-02">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger02" aria-controls="test-nlf-02">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-scroll" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">План конспект</span>
                            </button>
                          </div>
                          <div class="bs-stepper-line"></div>

                          <div class="step" data-target="#test-nlf-03">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger03" aria-controls="test-nlf-03">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-tasks" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Тест, <small>текшерүү иш, ...</small></span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-04">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger04" aria-controls="test-nlf-04">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-window-restore" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Шаблон <small>(презентация)</small></span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-05">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger05" aria-controls="test-nlf-05">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-award" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Грамота, <small>сертификат, ...</small></span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-06">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger06" aria-controls="test-nlf-06">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-chalkboard-teacher" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Курс</span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-07">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger07" aria-controls="test-nlf-07">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-spell-check" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Онлайн тест</span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-08">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger08" aria-controls="test-nlf-08">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-graduation-cap" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">ЖРТ <small>(ОРТ)</small></span>
                            </button>
                          </div>

                        </div>
                        <div class="bs-stepper-content p-0 mt-4">
                          <div id="test-nlf-01" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger01">
                            <div class="row">
                                @foreach ($materialcategories as $materialcategory)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('materialpodcategory', ['for_action' => '0', 'materialcategory' => $materialcategory['id']])}}"></a>
                                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$materialcategory['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$materialcategory['title']}}</span></strong></h4>
                                            <span class="info-box-number">Материалдардын саны: {{$materialcategory->materialy_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$materialcategory->kupitmaterialov_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                          <div id="test-nlf-02" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger02">
                            <div class="row">
                                @foreach ($plan_conspekts as $materialcategory)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('materialpodcategory', ['for_action' => '0', 'materialcategory' => $materialcategory['id']])}}"></a>
                                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$materialcategory['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$materialcategory['title']}}</span></strong></h4>
                                            <span class="info-box-number">Материалдардын саны: {{$materialcategory->materialy_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$materialcategory->kupitmaterialov_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                          <div id="test-nlf-03" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger03">
                            <div class="row">
                                @foreach ($materialcategories2 as $materialcategory)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('materialpodcategory', ['for_action' => '1', 'materialcategory' => $materialcategory['id']])}}"></a>
                                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$materialcategory['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$materialcategory['title']}}</span></strong></h4>
                                            <span class="info-box-number">Материалдардын саны: {{$materialcategory->materialy_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$materialcategory->kupitmaterialov_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                          <div id="test-nlf-04" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger04">
                            <div class="row">
                                @foreach ($shablons as $materialcategory)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('materialpodcategory', ['for_action' => '1', 'materialcategory' => $materialcategory['id']])}}"></a>
                                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$materialcategory['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$materialcategory['title']}}</span></strong></h4>
                                            <span class="info-box-number">Материалдардын саны: {{$materialcategory->materialy_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$materialcategory->kupitmaterialov_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                          <div id="test-nlf-05" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger05">
                            <div class="row">
                                @foreach ($gramotas as $materialcategory)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('materialpodcategory', ['for_action' => '1', 'materialcategory' => $materialcategory['id']])}}"></a>
                                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$materialcategory['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$materialcategory['title']}}</span></strong></h4>
                                            <span class="info-box-number">Материалдардын саны: {{$materialcategory->materialy_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$materialcategory->kupitmaterialov_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                          <div id="test-nlf-06" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger06">
                            <div class="row">
                                @foreach ($categories->where('id', '!=', 21) as $category)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('podcat', $category['id'])}}"></a>
                                    <div class="info-box  shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$category['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$category['title']}}</span></strong></h4>
                                            <span class="info-box-number">Курстардын саны: {{$category->podcategories2_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$category->kupit_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                          <div id="test-nlf-07" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger07">
                            <div class="row">
                                @foreach ($online_tests as $materialcategory)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('testpodcategory', ['for_action' => '1', 'id' => $materialcategory['id']])}}"></a>
                                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$materialcategory['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$materialcategory['title']}}</span></strong></h4>
                                            <span class="info-box-number">Тесттердин саны: {{$materialcategory->testy_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$materialcategory->tests_kupit_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                          <div id="test-nlf-08" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger08">
                            <div class="row">
                                @foreach ($test_podcategories as $materialcategory)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('testpodcategory', ['for_action' => '1', 'id' => $materialcategory['id']])}}"></a>
                                    <div class="info-box shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$materialcategory['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">{{$materialcategory['title']}}</span></strong></h4>
                                            <span class="info-box-number">Тесттердин саны: {{$materialcategory->testy_count}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$materialcategory->tests_kupit_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach ($categories->where('id', 21) as $category)
                                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                                    <a style="display:block" href="{{ route('podcat', $category['id'])}}"></a>
                                    <div class="info-box  shadow-sm for_shadow" style="background: Light;">
                                        <span class="info-box-icon"><img class="img-svg mt-2 mb-2 mr-3 ml-2"  src="{{ asset('') }}{{$category['img']}}"></span>
                                        <div class="info-box-content">
                                            <h4><strong><span class="info-box-text for_color">Курс</span></strong></h4>
                                            <span class="info-box-number">Курстардын саны: {{$category->kol_podcategories}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%; background-color: #17a2b8"></div>
                                            </div>
                                            <span class="progress-description">Сатылды: {{$category->kupit_count}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


        </div>
    </section>
    <!-- /.content -->

    


    <section class="content">
        <div class="container-fluid mb-3">
            <hr class="new2 mt-5 mb-0"> 
            <h4 id="yakor_materialy" class="mt-5 text-center"><strong>Презентация / Тест / План конспект / Курс / ...</strong></h4>            
                <div class="row">
                    <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                        <section class="invoice" style="background: none; border: none;">
                            <div class="row">
                                <div class="col text-center">
                                    <!--<img class="" src="https://nonsi.kg/public/img/lead-1.png" alt="Dist Photo 2">-->
                                    <i class="fas fa-vote-yea pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                                </div>
                                <div class="w-100"></div>
                                <div class="col text-center pl-3 pr-3">
                                    <h4><strong><span class="info-box-text for_color">Сапат</span></strong></h4>
                                    <span class="progress-description">Биздин өнөктөштөр материалдарды (курстарды) дайыма жаңылап, толуктап турушат. Ал гана эмес сиздин сунуштун негизинде да оңдоп турууга даяр.</span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                        <section class="invoice" style="background: none; border: none;">
                            <div class="row">
                                <div class="col text-center">
                                    <!--<img class="" src="https://nonsi.kg/public/img/lead-3.png" alt="Dist Photo 2">-->
                                    <i class="fas fa-lock pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                                </div>
                                <div class="w-100"></div>
                                <div class="col text-center pl-3 pr-3">
                                    <h4><strong><span class="info-box-text for_color">Мүмкүнчүлүк</span></strong></h4>
                                    <span class="progress-description">Биздин китепканада бекер жана акы төлөнүүчү материалдар (курстар) бар. Акысыз материалдарды (курстарды) каалаган убакта жүктөп алса болот, ал эми акы төлөнүүчү материалдар сатып алгандан кийин гана жеткиликтүү болот.</span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                        <section class="invoice" style="background: none; border: none;">
                            <div class="row">
                                <div class="col text-center">
                                    <!--<img class="" src="https://nonsi.kg/public/img/lead-2.png" alt="Dist Photo 2">-->
                                    <i class="fas fa-crosshairs pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                                </div>
                                <div class="w-100"></div>
                                <div class="col text-center pl-3 pr-3">
                                    <h4><strong><span class="info-box-text for_color">Көзөмөл</span></strong></h4>
                                    <span class="progress-description">Биздин адистер материалдын (курстун) сапатын текшерип турушат. Эгерде биздин талаптарга жооп бербесе, анда өчүрүлөт же жаңыланат.</span>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>           
                <div class="row">
                    <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                        <section class="invoice" style="background: none; border: none;">
                            <div class="row">
                                <div class="col text-center">
                                    <!--<img class="" src="https://nonsi.kg/public/img/lead-4.png" alt="Dist Photo 2">-->
                                    <i class="fas fa-users pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                                </div>
                                <div class="w-100"></div>
                                <div class="col text-center pl-3 pr-3">
                                    <h4><strong><span class="info-box-text for_color">Мыкты мугалимдер</span></strong></h4>
                                    <span class="progress-description">Контентти түзүүгө өлкөнүн мыкты мугалимдерин жана методисттерин тартабыз.</span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                        <section class="invoice" style="background: none; border: none;">
                            <div class="row">
                                <div class="col text-center">
                                    <!--<img class="" src="https://nonsi.kg/public/img/lead-66.png" alt="Dist Photo 2">-->
                                    <i class="fas fa-sitemap pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                                </div>
                                <div class="w-100"></div>
                                <div class="col text-center pl-3 pr-3">
                                    <h4><strong><span class="info-box-text for_color">Баары бир жерде</span></strong></h4>
                                    <span class="progress-description">Бул жерден сиз эң мыкты материалдарды (курстарды) таба аласыз. Ал эми биздин контент жаңы материалдар (курстар) менен толукталып турат.</span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                        <section class="invoice" style="background: none; border: none;">
                            <div class="row">
                                <div class="col text-center">
                                    <!--<img class="" src="https://nonsi.kg/public/img/lead-5.png" alt="Dist Photo 2">-->
                                    <i class="far fa-comments pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                                </div>
                                <div class="w-100"></div>
                                <div class="col text-center pl-3 pr-3">
                                    <h4><strong><span class="info-box-text for_color">Колдоо</span></strong></h4>
                                    <span class="progress-description">Каалаган убакта биздин адистерге суроо берип, жооп ала аласыз.</span>
                                </div>
                            </div>
                        </section>
                    </div>
                    
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

<script>
jQuery(document).ready(function() {
jQuery("a.scrollto").click(function () {
elementClick = jQuery(this).attr("href")
destination = jQuery(elementClick).offset().top -50;
jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1100);
return false;
});
});
</script>



@endsection