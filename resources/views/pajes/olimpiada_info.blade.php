@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<style type="text/css">


.strelki::-webkit-outer-spin-button,
.strelki::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }


   .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-2px);
  }


.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}

.required .required:after {
    color: #e32;
    content: ' *';
    display:inline;
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
.note-group-select-from-files {
  display: none;
}



.foto1 {
    position: relative;
    width: 100%;
}

.foto1 img {
    width: 100%;
    height: auto;
}

.foto1 .foto2 {
    position: absolute;
    top: 2px;
    left: -4px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    cursor: pointer;
    text-align: center;
}
input[type=radio]{
  opacity: 0;
  visablity: hidden;
}
.t-radio__indicator{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: white;
  padding: 3px 20px;
  border-radius: 4px;
  cursor: pointer;

}
input[type=radio]:checked + .t-radio__indicator{
  background: #17a2b8;
  color: white;
}


.numbers {
  font-family: 'Montserrat', sans-serif;
  color: #183059;
  font-size: 2.5em;
}
.tur_title {
  font-family: 'Montserrat', sans-serif;
  color: green;
  font-size: 1em;
}
.tur_title2 {
  font-family: 'Montserrat', sans-serif;
  color: red;
  font-size: 1em;
}
.countdown-text{
    font-family: 'Lato', sans-serif;
    text-transform: uppercase;
  font-size: .7em;
  letter-spacing: 5px;
  color: #183059;
}

.deadline-message{
  display: none;
  font-size: 24px;
  font-style: italic;
}

.visible{
  display: block;
}
.hidden{
  display: none;
}

.countdown002 {
  display: inline-block;
}
.countdown-number002 {
  display: inline-block;
}
.countdown-time002 {
  display: inline-block;
}
.deadline-message002{
  display: none;
}

.for_border_right{
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    border-right: none;
}

.for_border_left{
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
    border-left: none;
}



.table.table-bordered td{
    border: 0 none !important;
}




</style>
@php
    $time = strtotime(date("Y-m-d H:i:s"));
    if($time_max > $time){
        $olimpiada_tury001 = $olimpiada_tury->where('olimpiada_id', $olimpiada->id)->where('status', 1)->where('nachalo_zdachi_tura', '>', $time)->first();
        $mes = date('m', $olimpiada_tury001['nachalo_zdachi_tura']) - 1;
    }else{
        
    }

    $status_olimpiady = $olimpiada_tury->where('olimpiada_id', $olimpiada->id)->where('status', 1)->where('tur_number', 1)->first();
@endphp  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




            
        <section class="content">
            <div class="container-fluid">
                <!--Окно для уведомлений (успушно добавлена) -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                        <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                    </div>
                @endif

                <!--Окно для уведомлений (успушно добавлена) -->
                <section class="content-header pl-0 pr-0">
                  <div class="container-fluid p-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="{{ route('home')}}">
                                    <i class="nav-icon fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('olimpiada')}}">Олимпиада</a>
                            </li>
                            <li class="breadcrumb-item active">{{$olimpiada->title}}</li>
                        </ol>
                  </div><!-- /.container-fluid -->
                </section>
                <div class="row">
                    <div class="col-md-9">
                                <div class="mt-4">
                                    @if($time_max > $time)
                                        <p class="text-center tur_title">{{$olimpiada_tury001->tur_number}}-турдун башталышы:</p>
                                        <div class="row  mb-3">
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-8 text-center">
                                                <div id="deadline-message" class="deadline-message">
                                                  <b style="color: red;">Убакыт бүттү!</b>
                                                </div>
                                                <div id="countdown" class="row countdown">
                                                  <div class="col m-2 text-center pb-2" style="background: #f4a460; border-radius: 4px;">
                                                    <span class="days numbers"></span><br>
                                                    <b><span class="countdown-text ">Күн</span></b>
                                                  </div>
                                                  <div class="col mb-2 mt-2 mr-1 ml-0 text-center pb-2" style="background: #f4a460; border-radius: 4px;">
                                                    <span class="hours numbers"></span><br>
                                                    <b><span class="countdown-text">Саат</span></b>
                                                  </div>
                                                  <div class="col mb-2 mt-2 mr-0 ml-1 pb-2 text-center" style="background: #f4a460; border-radius: 4px;">
                                                    <span class="minutes numbers"></span><br>
                                                    <b><span class="countdown-text">Мүнөт</span></b>
                                                  </div>
                                                  <div class="col m-2 text-center pb-2" style="background: #f4a460; border-radius: 4px;">
                                                    <span class="seconds numbers"></span><br>
                                                    <b><span class="countdown-text">Секунд</span></b>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center tur_title2">Олимпиада соңуна чыкты.</p>
                                    @endif

                                    <div class="card">
                                        <div class="card-body p-0 class11">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <img class="shadow" style="width: 100%; border-radius: 4px;" src="https://nonsi.kg/public/storage/olimpiada/images/thumbnail/{{$olimpiada->img2}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body pr-3 pl-3 pt-4 pb-3">
                                                        <h5 class="card-title">{{$olimpiada->title}} <small class="text-muted" title="Турлардын саны">({{$olimpiada->olimpiada_tury2_count}} тур)</small></h5>
                                                        <p class="card-text text-muted mb-1 pt-2">
                                                          @if($olimpiada->nazvanie_orgonizasii != null)
                                                            <span class="btn-tool p-0" title="Олимпиаданы өткөргөн мекеме"><i class="fas fa-university"></i></span>
                                                            {{$olimpiada->nazvanie_orgonizasii}}
                                                          @else
                                                            <span class="btn-tool p-0" title="Автор"><i class="fas fa-user-circle"></i></span>
                                                            {{$olimpiada->user['name']}}
                                                          @endif
                                                        </p>
                                                        <div class="row">
                                                            <div class="col align-self-end">
                                                                <span class="text-muted">{{$olimpiada->predmety['title']}} / {{$olimpiada->klassy['number']}}-{{$olimpiada->klassy['title']}} / Тили: @if(intval($olimpiada->language) != 4 ){{$olimpiada->languages['language']}}@else - @endif</span>
                                                            </div>
                                                            <div class="col-auto align-self-end text-center">
                                                                @if (intval($olimpiada['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107 "></i>@endif
                                                            </div>
                                                        </div>

                                                        @if (\Auth::user())
                                                            @if($status_olimpiady->nachalo_zdachi_tura > $time)
                                                                @if ($olimpiada_registrasia != null)
                                                                    @if($olimpiada_registrasia->tur_number === 0)
                                                                        Катталдыныз бирок толом жургузо элексиз
                                                                    @else
                                                                        Катталдыныз
                                                                    @endif
                                                                @else
                                                                    <a type="button"  class="btn btn-block btn-info mt-3 play_test">Катталуу / Регистрация</a>
                                                                @endif
                                                            @else
                                                                @if($time_max > $time)
                                                                    Олимпиада жүрүп жатат
                                                                @else
                                                                    Олимпиада соңуна чыкты
                                                                @endif
                                                            @endif
                                                        @else
                                                            <a type="button"  class="btn btn-block btn-info mt-3 kupit_test">Катталуу / Регистрация</a>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-4 pb-4">
                                    <p>{!!$olimpiada->opisanie!!}</p>
                                </div>
                                <h6 class="text-center mb-0 pt-3 pb-2"><b>Олимпиаданын турлары жөнүндө маалымат</b></h6>
                                <div class="pt-1 mt-1">
                                    <div class="form-group test_margin">
                                        @foreach ($olimpiada_tury as $olimpiada_tury)
                                        @php
                                            $test = $tests->where('id', $olimpiada_tury->test_id)->first();
                                            $nomer02 = $loop->iteration;
                                        @endphp
                                        <div class="card card-primary card-outline for_peremestit">
                                            <div class="card-header pl-2 pr-2 pt-1 pb-1">
                                                <p class="mb-0 text-center">
                                                    @if($time_max > $time)
                                                        @if($olimpiada_tury->id === $olimpiada_tury001->id)
                                                            <i class="far fa-check-circle pr-2 pl-2" style="color: green;"></i>
                                                        @endif
                                                    @endif
                                                    <b>{{$olimpiada_tury->tur_number}}-тур / {{$olimpiada_tury->title}} </b><br>
                                                    <small>(жөнүндө маалымат)</small>
                                                </p>

                                                @if (\Auth::user())
                                                    @if ($olimpiada_registrasia != null)
                                                        @if($olimpiada_registrasia->tur_number === 0)
                                                            @if($olimpiada_tury->nachalo_zdachi_tura > $time)
                                                                <div class="row align-items-center pt-3">
                                                                    <div class="col-md-6 mt-3 border-right">
                                                                        <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                        <p class="mb-0">Башталуу датасы: 
                                                                            <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                       <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="mb-0  pb-0">
                                                                                    Катталдыныз бирок толом жургузо элексиз
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <a class="btn btn-outline-success pt-1 pb-1"> Төлөө <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if($olimpiada_tury->data_okonchanie_tura != null)
                                                                    @if($olimpiada_tury->data_okonchanie_tura < $time)
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: 
                                                                                    <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            Катталдыныз бирок толом жургузо элексиз
                                                                                            {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            <div class="user-block">
                                                                                                <span class="">
                                                                                                        {{$olimpiada_tury->tur_number}}-тур жүрүп жатат:
                                                                                                        <i class="far fa-clock pr-2 pl-2" style="color: green;"></i>
                                                                                                        @if(($olimpiada_tury->data_okonchanie_tura - $time) > 3600)
                                                                                                            <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                              <span class="countdown-number002"><span class="hours0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                            </span>
                                                                                                        @else
                                                                                                            <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                              <span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                        <span id="deadline-message0{{$nomer02}}" class="deadline-message0{{$nomer02}} deadline-message002">Убакыт бүттү!</span>
                                                                                                </span>
                                                                                                <span class="description ml-0">
                                                                                                  <small>
                                                                                                      (Көрсөтүлгөн убакытта соңуна чыгат)
                                                                                                  </small>
                                                                                                </span>
                                                                                            </div>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Төлөө <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    @if(($olimpiada_tury->nachalo_zdachi_tura + $test->time) < $time)
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: 
                                                                                    <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            Катталдыныз бирок толом жургузо элексиз
                                                                                            {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            <div class="user-block">
                                                                                                <span class="">
                                                                                                        {{$olimpiada_tury->tur_number}}-тур жүрүп жатат:
                                                                                                        <i class="far fa-clock pr-2 pl-2" style="color: green;"></i>
                                                                                                        @if(($olimpiada_tury->data_okonchanie_tura - $time) > 3600)
                                                                                                            <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                              <span class="countdown-number002"><span class="hours0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                            </span>
                                                                                                        @else
                                                                                                            <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                              <span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                        <span id="deadline-message0{{$nomer02}}" class="deadline-message0{{$nomer02}} deadline-message002">Убакыт бүттү!</span>
                                                                                                </span>
                                                                                                <span class="description ml-0">
                                                                                                  <small>
                                                                                                      (Көрсөтүлгөн убакытта соңуна чыгат)
                                                                                                  </small>
                                                                                                </span>
                                                                                            </div>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Төлөө <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if($olimpiada_tury->nachalo_zdachi_tura > $time)
                                                                <div class="row align-items-center pt-3">
                                                                    <div class="col-md-6 mt-3 border-right">
                                                                        <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                        <p class="mb-0">Башталуу датасы: 
                                                                            <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                       <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="mb-0  pb-0">
                                                                                    Жакында ачылат
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if($olimpiada_tury->data_okonchanie_tura != null)
                                                                    @if($olimpiada_tury->data_okonchanie_tura < $time)
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: 
                                                                                    <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: 
                                                                                    @if(strtotime(date("Y-m-d H:i:s")) > $olimpiada_tury->nachalo_zdachi_tura)
                                                                                        <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                                    @else
                                                                                        <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            {{$olimpiada_tury->tur_number}}-турдун тапшырмасы
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    @if(($olimpiada_tury->nachalo_zdachi_tura + $test->time) < $time)
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: 
                                                                                    <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="row align-items-center pt-3">
                                                                            <div class="col-md-6 mt-3 border-right">
                                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                                <p class="mb-0">Башталуу датасы: 
                                                                                    @if(strtotime(date("Y-m-d H:i:s")) > $olimpiada_tury->nachalo_zdachi_tura)
                                                                                        <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                                    @else
                                                                                        <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col">
                                                                                        <p class="mb-0  pb-0">
                                                                                            {{$olimpiada_tury->tur_number}}-турдун тапшырмасы
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if($olimpiada_tury->nachalo_zdachi_tura > $time)
                                                            <div class="row align-items-center pt-3">
                                                                <div class="col-md-6 mt-3 border-right">
                                                                    <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                    <p class="mb-0">Башталуу датасы: 
                                                                        <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 mt-3">
                                                                   <div class="row align-items-center">
                                                                        <div class="col">
                                                                            <p class="mb-0  pb-0">
                                                                                Регистрация олимп
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @if($olimpiada_tury->data_okonchanie_tura != null)
                                                                @if($olimpiada_tury->data_okonchanie_tura < $time)
                                                                    <div class="row align-items-center pt-3">
                                                                        <div class="col-md-6 mt-3 border-right">
                                                                            <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                            <p class="mb-0">Башталуу датасы: 
                                                                                <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6 mt-3">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    <p class="mb-0  pb-0">
                                                                                        {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="row align-items-center pt-3">
                                                                        <div class="col-md-6 mt-3 border-right">
                                                                            <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                            <p class="mb-0">Башталуу датасы: <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6 mt-3">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    <p class="mb-0  pb-0">
                                                                                        <div class="user-block">
                                                                                            <span class="">
                                                                                                    {{$olimpiada_tury->tur_number}}-тур жүрүп жатат:
                                                                                                    <i class="far fa-clock pr-2 pl-2" style="color: green;"></i>
                                                                                                    @if(($olimpiada_tury->data_okonchanie_tura - $time) > 3600)
                                                                                                        <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                          <span class="countdown-number002"><span class="hours0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                        </span>
                                                                                                    @else
                                                                                                        <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                          <span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                        </span>
                                                                                                    @endif
                                                                                                    <span id="deadline-message0{{$nomer02}}" class="deadline-message0{{$nomer02}} deadline-message002">Убакыт бүттү!</span>
                                                                                            </span>
                                                                                            <span class="description ml-0">
                                                                                              <small>
                                                                                                  (Көрсөтүлгөн убакытта соңуна чыгат)
                                                                                              </small>
                                                                                            </span>
                                                                                        </div>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                @if(($olimpiada_tury->nachalo_zdachi_tura + $test->time) < $time)
                                                                    <div class="row align-items-center pt-3">
                                                                        <div class="col-md-6 mt-3 border-right">
                                                                            <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                            <p class="mb-0">Башталуу датасы: 
                                                                                <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6 mt-3">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    <p class="mb-0  pb-0">
                                                                                        {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="row align-items-center pt-3">
                                                                        <div class="col-md-6 mt-3 border-right">
                                                                            <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                            <p class="mb-0">Башталуу датасы: <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6 mt-3">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    <p class="mb-0  pb-0">
                                                                                        <div class="user-block">
                                                                                            <span class="">
                                                                                                    {{$olimpiada_tury->tur_number}}-тур жүрүп жатат:
                                                                                                    <i class="far fa-clock pr-2 pl-2" style="color: green;"></i>
                                                                                                    @if(($olimpiada_tury->data_okonchanie_tura - $time) > 3600)
                                                                                                        <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                          <span class="countdown-number002"><span class="hours0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                        </span>
                                                                                                    @else
                                                                                                        <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                          <span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                        </span>
                                                                                                    @endif
                                                                                                    <span id="deadline-message0{{$nomer02}}" class="deadline-message0{{$nomer02}} deadline-message002">Убакыт бүттү!</span>
                                                                                            </span>
                                                                                            <span class="description ml-0">
                                                                                              <small>
                                                                                                  (Көрсөтүлгөн убакытта соңуна чыгат)
                                                                                              </small>
                                                                                            </span>
                                                                                        </div>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @else
                                                    @if($olimpiada_tury->nachalo_zdachi_tura > $time)
                                                        <div class="row align-items-center pt-3">
                                                            <div class="col-md-6 mt-3 border-right">
                                                                <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                <p class="mb-0">Башталуу датасы: 
                                                                    <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                               <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="mb-0  pb-0">
                                                                            Кирүү
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @if($olimpiada_tury->data_okonchanie_tura != null)
                                                            @if($olimpiada_tury->data_okonchanie_tura < $time)
                                                                <div class="row align-items-center pt-3">
                                                                    <div class="col-md-6 mt-3 border-right">
                                                                        <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                        <p class="mb-0">Башталуу датасы: 
                                                                            <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="mb-0  pb-0">
                                                                                    {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="row align-items-center pt-3">
                                                                    <div class="col-md-6 mt-3 border-right">
                                                                        <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                        <p class="mb-0">Башталуу датасы: <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="mb-0  pb-0">
                                                                                    <div class="user-block">
                                                                                        <span class="">
                                                                                                {{$olimpiada_tury->tur_number}}-тур жүрүп жатат:
                                                                                                <i class="far fa-clock pr-2 pl-2" style="color: green;"></i>
                                                                                                @if(($olimpiada_tury->data_okonchanie_tura - $time) > 3600)
                                                                                                    <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                      <span class="countdown-number002"><span class="hours0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                    </span>
                                                                                                @else
                                                                                                    <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                      <span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                    </span>
                                                                                                @endif
                                                                                                <span id="deadline-message0{{$nomer02}}" class="deadline-message0{{$nomer02}} deadline-message002">Убакыт бүттү!</span>
                                                                                        </span>
                                                                                        <span class="description ml-0">
                                                                                          <small>
                                                                                              (Көрсөтүлгөн убакытта соңуна чыгат)
                                                                                          </small>
                                                                                        </span>
                                                                                    </div>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @else
                                                            @if(($olimpiada_tury->nachalo_zdachi_tura + $test->time) < $time)
                                                                <div class="row align-items-center pt-3">
                                                                    <div class="col-md-6 mt-3 border-right">
                                                                        <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                        <p class="mb-0">Башталуу датасы: 
                                                                            <i class="fas fa-history pr-2 pl-2" style="color: red;"></i> Убакыт бүттү! <small>({{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}})</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="mb-0  pb-0">
                                                                                    {{$olimpiada_tury->tur_number}}-турдун жыйынтыгы
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <a class="btn btn-outline-success pt-1 pb-1"> Ачуу <i class="far fa-arrow-right pl-2 pt-1"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="row align-items-center pt-3">
                                                                    <div class="col-md-6 mt-3 border-right">
                                                                        <p class="mb-0  pb-2">Баасы: {{$olimpiada_tury->price / 100}} сом</p>
                                                                        <p class="mb-0">Башталуу датасы: <i class="far fa-clock pr-2 pl-2" style="color: green;"></i> {{date('d-m-Y / H:i', $olimpiada_tury->nachalo_zdachi_tura)}}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="mb-0  pb-0">
                                                                                    <div class="user-block">
                                                                                        <span class="">
                                                                                                {{$olimpiada_tury->tur_number}}-тур жүрүп жатат:
                                                                                                <i class="far fa-clock pr-2 pl-2" style="color: green;"></i>
                                                                                                @if(($olimpiada_tury->data_okonchanie_tura - $time) > 3600)
                                                                                                    <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                      <span class="countdown-number002"><span class="hours0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                    </span>
                                                                                                @else
                                                                                                    <span id="countdown0{{$nomer02}}" class="countdown0{{$nomer02}} countdown002">
                                                                                                      <span class="countdown-number002"><span class="minutes0{{$nomer02}} countdown-time002"></span></span>:<span class="countdown-number002"><span class="seconds0{{$nomer02}} countdown-time002"></span></span>
                                                                                                    </span>
                                                                                                @endif
                                                                                                <span id="deadline-message0{{$nomer02}}" class="deadline-message0{{$nomer02}} deadline-message002">Убакыт бүттү!</span>
                                                                                        </span>
                                                                                        <span class="description ml-0">
                                                                                          <small>
                                                                                              (Көрсөтүлгөн убакытта соңуна чыгат)
                                                                                          </small>
                                                                                        </span>
                                                                                    </div>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif

                                                <hr>
                                                <p class="mb-0 pt-0 pb-3">{!!$olimpiada_tury->opisanie!!}</p>
                                            </div>
                                        </div>

                                        @if($olimpiada_tury->nachalo_zdachi_tura > $time)

                                        @else
                                        @if($olimpiada_tury->data_okonchanie_tura != null)
                                        <script type="text/javascript">
                                            if({{$olimpiada_tury->data_okonchanie_tura - $time}} > 3600){
                                                function getTimeRemaining(endtime) {
                                                  var t0{{$nomer02}} = Date.parse(endtime) - Date.parse(new Date());
                                                  var seconds0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000) % 60);
                                                  var minutes0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000 / 60) % 60);
                                                  var hours0{{$nomer02}} = Math.floor((t0{{$nomer02}} / (1000 * 60 * 60)) % 24);
                                                  return {
                                                    total0{{$nomer02}}: t0{{$nomer02}},
                                                    hours0{{$nomer02}}: hours0{{$nomer02}},
                                                    minutes0{{$nomer02}}: minutes0{{$nomer02}},
                                                    seconds0{{$nomer02}}: seconds0{{$nomer02}}
                                                  };
                                                }

                                                function initializeClock(id, endtime) {
                                                  var clock0{{$nomer02}} = document.getElementById(id);
                                                  var hours0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".hours0{{$nomer02}}");
                                                  var minutes0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".minutes0{{$nomer02}}");
                                                  var seconds0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".seconds0{{$nomer02}}");

                                                  function updateClock() {
                                                    var t0{{$nomer02}} = getTimeRemaining(endtime);

                                                    if (t0{{$nomer02}}.total0{{$nomer02}} <= 0) {
                                                      document.getElementById("countdown0{{$nomer02}}").className = "hidden";
                                                      document.getElementById("deadline-message0{{$nomer02}}").className = "visible";
                                                      clearInterval(timeinterval);
                                                      
                                                      return true;
                                                    }

                                                    hours0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.hours0{{$nomer02}}).slice(-2);
                                                    minutes0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.minutes0{{$nomer02}}).slice(-2);
                                                    seconds0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.seconds0{{$nomer02}}).slice(-2);
                                                  }

                                                  updateClock();
                                                  var timeinterval = setInterval(updateClock, 1000);
                                                }

                                                //var deadline = "January 01 2018 00:00:00 GMT+0300"; //for Ukraine
                                                var deadline = new Date(Date.parse(new Date()) + ({{$olimpiada_tury->data_okonchanie_tura - $time}}) * 1000); // for endless timer
                                                initializeClock("countdown0{{$nomer02}}", deadline);
                                            }
                                            else{


                                                function getTimeRemaining(endtime) {
                                                  var t0{{$nomer02}} = Date.parse(endtime) - Date.parse(new Date());
                                                  var seconds0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000) % 60);
                                                  var minutes0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000 / 60) % 60);
                                                  return {
                                                    total0{{$nomer02}}: t0{{$nomer02}},
                                                    minutes0{{$nomer02}}: minutes0{{$nomer02}},
                                                    seconds0{{$nomer02}}: seconds0{{$nomer02}}
                                                  };
                                                }

                                                function initializeClock(id, endtime) {
                                                  var clock0{{$nomer02}} = document.getElementById(id);
                                                  var minutes0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".minutes0{{$nomer02}}");
                                                  var seconds0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".seconds0{{$nomer02}}");

                                                  function updateClock() {
                                                    var t0{{$nomer02}} = getTimeRemaining(endtime);

                                                    if (t0{{$nomer02}}.total0{{$nomer02}} <= 0) {
                                                      document.getElementById("countdown0{{$nomer02}}").className = "hidden";
                                                      document.getElementById("deadline-message0{{$nomer02}}").className = "visible";
                                                      clearInterval(timeinterval);
                                                      return true;
                                                    }

                                                    minutes0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.minutes0{{$nomer02}}).slice(-2);
                                                    seconds0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.seconds0{{$nomer02}}).slice(-2);
                                                  }

                                                  updateClock();
                                                  var timeinterval = setInterval(updateClock, 1000);
                                                }

                                                //var deadline = "January 01 2018 00:00:00 GMT+0300"; //for Ukraine
                                                var deadline = new Date(Date.parse(new Date()) + ({{$olimpiada_tury->data_okonchanie_tura - $time}}) * 1000); // for endless timer
                                                initializeClock("countdown0{{$nomer02}}", deadline);
                                            }
                                        </script>
                                        @else
                                            
                                            <script type="text/javascript">
                                            if({{$test->time}} > 3600){
                                                function getTimeRemaining(endtime) {
                                                  var t0{{$nomer02}} = Date.parse(endtime) - Date.parse(new Date());
                                                  var seconds0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000) % 60);
                                                  var minutes0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000 / 60) % 60);
                                                  var hours0{{$nomer02}} = Math.floor((t0{{$nomer02}} / (1000 * 60 * 60)) % 24);
                                                  return {
                                                    total0{{$nomer02}}: t0{{$nomer02}},
                                                    hours0{{$nomer02}}: hours0{{$nomer02}},
                                                    minutes0{{$nomer02}}: minutes0{{$nomer02}},
                                                    seconds0{{$nomer02}}: seconds0{{$nomer02}}
                                                  };
                                                }

                                                function initializeClock(id, endtime) {
                                                  var clock0{{$nomer02}} = document.getElementById(id);
                                                  var hours0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".hours0{{$nomer02}}");
                                                  var minutes0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".minutes0{{$nomer02}}");
                                                  var seconds0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".seconds0{{$nomer02}}");

                                                  function updateClock() {
                                                    var t0{{$nomer02}} = getTimeRemaining(endtime);

                                                    if (t0{{$nomer02}}.total0{{$nomer02}} <= 0) {
                                                      document.getElementById("countdown0{{$nomer02}}").className = "hidden";
                                                      document.getElementById("deadline-message0{{$nomer02}}").className = "visible";
                                                      clearInterval(timeinterval);
                                                      
                                                      return true;
                                                    }

                                                    hours0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.hours0{{$nomer02}}).slice(-2);
                                                    minutes0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.minutes0{{$nomer02}}).slice(-2);
                                                    seconds0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.seconds0{{$nomer02}}).slice(-2);
                                                  }

                                                  updateClock();
                                                  var timeinterval = setInterval(updateClock, 1000);
                                                }

                                                //var deadline = "January 01 2018 00:00:00 GMT+0300"; //for Ukraine
                                                var deadline = new Date(Date.parse(new Date()) + ({{$test->time}}) * 1000); // for endless timer
                                                initializeClock("countdown0{{$nomer02}}", deadline);
                                            }
                                            else{


                                                function getTimeRemaining(endtime) {
                                                  var t0{{$nomer02}} = Date.parse(endtime) - Date.parse(new Date());
                                                  var seconds0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000) % 60);
                                                  var minutes0{{$nomer02}} = Math.floor((t0{{$nomer02}} / 1000 / 60) % 60);
                                                  return {
                                                    total0{{$nomer02}}: t0{{$nomer02}},
                                                    minutes0{{$nomer02}}: minutes0{{$nomer02}},
                                                    seconds0{{$nomer02}}: seconds0{{$nomer02}}
                                                  };
                                                }

                                                function initializeClock(id, endtime) {
                                                  var clock0{{$nomer02}} = document.getElementById(id);
                                                  var minutes0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".minutes0{{$nomer02}}");
                                                  var seconds0{{$nomer02}}Span = clock0{{$nomer02}}.querySelector(".seconds0{{$nomer02}}");

                                                  function updateClock() {
                                                    var t0{{$nomer02}} = getTimeRemaining(endtime);

                                                    if (t0{{$nomer02}}.total0{{$nomer02}} <= 0) {
                                                      document.getElementById("countdown0{{$nomer02}}").className = "hidden";
                                                      document.getElementById("deadline-message0{{$nomer02}}").className = "visible";
                                                      clearInterval(timeinterval);
                                                      return true;
                                                    }

                                                    minutes0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.minutes0{{$nomer02}}).slice(-2);
                                                    seconds0{{$nomer02}}Span.innerHTML = ("0" + t0{{$nomer02}}.seconds0{{$nomer02}}).slice(-2);
                                                  }

                                                  updateClock();
                                                  var timeinterval = setInterval(updateClock, 1000);
                                                }

                                                //var deadline = "January 01 2018 00:00:00 GMT+0300"; //for Ukraine
                                                var deadline = new Date(Date.parse(new Date()) + ({{$test->time}}) * 1000); // for endless timer
                                                initializeClock("countdown0{{$nomer02}}", deadline);
                                            }
                                            </script>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </div>                         
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <h6 class="text-muted text-center mb-0 pt-3 pb-2"><b>Олимпиаданын уюштуруучулары менен байланышуу:</b></h6>

                            @if ($olimpiada->phone_for_zvonok != null)
                                <div class="card card-body p-2 mb-2 mt-2 two">
                                    @php
                                        $nomer1 = preg_replace('~[^0-9]+~','', $olimpiada->phone_for_zvonok);
                                    @endphp
                                    <div class="row align-items-center block23">
                                        <a href="tel:+996{{$nomer1}}"></a>
                                        <div class="col-auto">
                                            <span style="font-size: 2em; color: #28a745;">
                                              <i class="fas fa-phone-alt pl-3"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <p class="text-muted text-center mb-0 pt-2"><b>Чалуу</b></p>
                                            <p class="text-muted text-center mb-0 pb-2">0{{$olimpiada->phone_for_zvonok}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if ($olimpiada->phone_for_whatsapp != null)
                            <div class="card card-body p-2 mb-2 mt-4 two">
                                @php
                                    $nomer2 = preg_replace('~[^0-9]+~','', $olimpiada->phone_for_whatsapp);
                                @endphp
                                <div class="row align-items-center block23">
                                    <a href="https://wa.me/+996{{$nomer2}}?text="></a>
                                    <div class="col-auto">
                                        <span style="font-size: 2em; color: #28a745;">
                                          <i class="fab fa-whatsapp pl-3"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp</b></p>
                                        <p class="text-muted text-center mb-0 pb-2"></p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($olimpiada->telegram != null)
                            <div class="card card-body p-2  mb-2 mt-4 two">
                                <div class="row align-items-center  block23">
                                    <a href="https://t.me/{{$olimpiada->telegram}}?text="></a>
                                    <div class="col-auto">
                                        <span style="font-size: 2em; color: #17a2b8;">
                                          <i class="fab fa-telegram-plane pl-3"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted text-center mb-0 pt-2"><b>Telegram</b></p>
                                        <p class="text-muted text-center mb-0 pb-2"></p>
                                    </div>
                                </div>
                            </div>  
                            @endif                      
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

    @if (\Auth::user())
                <div class="modal fade bd-example-modal-lg" id="modal-default2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="text-muted text-center mb-0"><b>Олимпиадага катталуу</b></p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pb-1 pr-1 pl-1 pt-0">
                                <form id="fileUploadForm" action="{{ route('olimpiada_registrasia_user', ['olimpiada_id'=>$olimpiada->id])}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf

                                <table class="table border-bottom">
                                  <tbody>
                                @if (\Auth::user()->f_fio != null)
                                    <tr>
                                      <td class="pb-1">Фамилия:</td>
                                      <td class="pb-1">{{\Auth::user()->f_fio}}</td>
                                    </tr>
                                @endif
                                
                                @if (\Auth::user()->i_fio != null)
                                    <tr>
                                      <td class="pb-1">Аты:</td>
                                      <td class="pb-1">{{\Auth::user()->i_fio}}</td>
                                    </tr>
                                @endif

                                @if (\Auth::user()->o_fio != null)
                                    <tr>
                                      <td class="pb-1">Атасынын аты:</td>
                                      <td class="pb-1">{{\Auth::user()->o_fio}}</td>
                                    </tr>
                                @endif

                                @if (\Auth::user()->phone != null)
                                    <tr>
                                      <td class="pb-1">Телефон:</td>
                                      <td class="pb-1">{{\Auth::user()->phone}}</td>
                                    </tr>
                                @endif

                                @if (\Auth::user()->oblast_id != null)
                                    <tr>
                                      <td class="pb-1">Область:</td>
                                      <td class="pb-1">{{\Auth::user()->oblast->title}}</td>
                                    </tr>
                                @endif

                                @if (\Auth::user()->raion_shaar_id != null)
                                    <tr>
                                      <td class="pb-1">Район / шаар:</td>
                                      <td class="pb-1">{{\Auth::user()->raion_shaar->title}}</td>
                                    </tr>
                                @endif

                                @if (\Auth::user()->aiyl_title != null)
                                    <tr>
                                      <td class="pb-1">Айыл:</td>
                                      <td class="pb-1">{{\Auth::user()->aiyl_title}}</td>
                                    </tr>
                                @endif

                                @if (\Auth::user()->mektep_title != null)
                                    <tr>
                                      <td class="pb-1">Мектеп:</td>
                                      <td class="pb-1">{{\Auth::user()->mektep_title}}</td>
                                    </tr>
                                @endif

                                @if (\Auth::user()->mugalim_fio != null)
                                    <tr>
                                      <td class="pb-1">Мугалим:</td>
                                      <td class="pb-1">{{\Auth::user()->mugalim_fio}}</td>
                                    </tr>
                                @endif

                                
                                    
                                  </tbody>
                                </table>
                                <div class="p-2">

                                @if (\Auth::user()->f_fio === null)
                                    <div class="form-group mb-0 required mt-2">
                                        <p class="required mb-1 for_margin-left">Фамилия:<small></small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1">
                                          <div class="col-auto pr-0 pl-0">
                                            <span class="form-control  color1 pr-1 pl-1 pt-2 pb-0 mb-0 for_border_right"><i class="fas fa-user-tie pr-2 pl-2" style="color: green;"></i></span>
                                          </div>
                                          <div class="col pr-0 pl-0">
                                            <input name="familia" value="{{ old('familia') }}" type="text" class="form-control color1 for_border_left pr-1 pl-1 pt-2 pb-1" placeholder="Асанов" required="true" autocomplete="off">
                                            <div class="invalid-feedback">Фамилияңызды жазыңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif
                                
                                @if (\Auth::user()->i_fio === null)
                                    <div class="form-group mb-0 required mt-3">
                                        <p class="required mb-1 pl-0 for_margin-left">Аты:<small></small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1">
                                          <div class="col-auto pr-0 pl-0">
                                            <span class="form-control  color1 pr-1 pl-1 pt-2 pb-0 mb-0 for_border_right"><i class="fas fa-user-graduate pr-2 pl-2" style="color: green;"></i></span>
                                          </div>
                                          <div class="col pr-0 pl-0">
                                            <input name="name" value="{{ old('name') }}" type="text" class="form-control color1 for_border_left pr-1 pl-1 pt-2 pb-1" placeholder="Асан" required="true" autocomplete="off">
                                            <div class="invalid-feedback">Атыңызды жазыңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif

                                @if (\Auth::user()->o_fio === null)
                                    <div class="form-group mb-0 required mt-3">
                                        <p class="required mb-1 pl-0 for_margin-left">Атасынын аты:<small></small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1">
                                          <div class="col-auto pr-0 pl-0">
                                            <span class="form-control  color1 pr-1 pl-1 pt-2 pb-0 mb-0 for_border_right"><i class="fas fa-user pr-2 pl-2" style="color: green;"></i></span>
                                          </div>
                                          <div class="col pr-0 pl-0">
                                            <input name="ochestvo" value="{{ old('ochestvo') }}" type="text" class="form-control color1 for_border_left pr-1 pl-1 pt-2 pb-1" placeholder="Асанович" required="true" autocomplete="off">
                                            <div class="invalid-feedback">Атаңыздын атын жазыңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif

                                @if (\Auth::user()->phone === null)
                                    <div class="form-group mb-0 required mt-3">
                                        <p class="required mb-1 pl-0 for_margin-left">Телефон:<small></small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1" >
                                          <div class="col-auto pr-0 pl-0">
                                            <span class="form-control  color1 pr-1 pl-1 pt-2 pb-0 mb-0 for_border_right"><i class="fas fa-phone-alt pr-2 pl-2" style="color: green;"></i>+996</span>
                                          </div>
                                          <div class="col pr-0 pl-0">
                                            <input name="phone" value="{{ old('phone') }}" type="text" class="form-control color1 for_border_left pr-1 pl-1 pt-2 pb-1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999" required="true" autocomplete="off" >
                                            <div class="invalid-feedback">Телефон номериңизди жазыңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif

                                @if (\Auth::user()->oblast_id === null)
                                <div class="form-group mb-0 required mt-3">
                                    <p class="required mb-1 pl-0 for_margin-left">Область:<small></small></p>
                                    <div class="row align-items-top hover1 pr-1 pl-1">
                                      <div class="col pr-0 pl-0">                                        
                                        <select name="oblast" id="materialcategory_id" class="form-control productcategory" required="">
                                            <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                            @foreach ($oblast as $oblast)
                                            <option value="{{$oblast['id']}}">{{$oblast['title']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Областты тандаңыз!</div>
                                      </div>
                                    </div>
                                </div>
                                @endif

                                @if (\Auth::user()->raion_shaar_id === null)
                                    <div class="form-group mb-0 required mt-3">
                                        <p class="required mb-1 pl-0 for_margin-left">Район / шаар:<small></small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1">
                                          <div class="col pr-0 pl-0">
                                            <select name="raion_shaar" id="materialpodcategory_id" class="form-control productname" required="">
                                                <option value="" disabled="true" selected="true">Алгач областты тандоо керек</option>
                                            </select>
                                            <div class="invalid-feedback">Районду / шаарды тандаңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif

                                @if (\Auth::user()->aiyl_title === null)
                                    <div class="form-group mb-0 required mt-3">
                                        <p class="required mb-1 pl-0 for_margin-left">Айыл:<small></small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1">
                                          <div class="col pr-0 pl-0">
                                            <input name="aiyl" value="{{ old('aiyl') }}" type="text" class="form-control color1" placeholder="Шекер" required="true" autocomplete="off">
                                            <div class="invalid-feedback">Айылдын аталышын жазыңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif

                                @if (\Auth::user()->mektep_title === null)
                                    <div class="form-group mb-0 required mt-3">
                                        <p class="required mb-1 pl-0 for_margin-left">Мектеп:<small></small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1">
                                          <div class="col pr-0 pl-0">
                                            <input name="mektep" value="{{ old('mektep') }}" type="text" class="form-control color1" placeholder="А.Асанов атындагы №17 гимназиясы" required="true" autocomplete="off">
                                            <div class="invalid-feedback">Мектептин аталышын жазыңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif

                                @if (\Auth::user()->mugalim_fio === null)
                                    <div class="form-group mb-0 required mt-3">
                                        <p class="required mb-1 pl-0 for_margin-left">Мугалим:<small>(предмет боюнча)</small></p>
                                        <div class="row align-items-top hover1 pr-1 pl-1">
                                          <div class="col pr-0 pl-0">
                                            <input name="mugalim" value="{{ old('mugalim') }}" type="text" class="form-control color1" placeholder="Үсөнов Үсөн Үсөнович" required="true" autocomplete="off">
                                            <div class="invalid-feedback">Мугалимдин аты-жөнүн жазыңыз!</div>
                                          </div>
                                        </div>
                                    </div>
                                @endif
                                </div>
                                <div class="pt-2 pb-1 pl-1 pr-1">
                                    <button type="submit" class="btn btn-block btn-info mt-0">Катталуу / Регистрация</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    @else
        <div class="modal fade bd-example-modal-lg" id="modal-default" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="text-muted text-center mb-0"><b>Тесттин аталышы: {{$olimpiada->title}}</b></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 pl-3 pr-3">
                                <img class="d-block w-100" id="rebate_old_imag23" src="https://nonsi.kg/public/storage/olimpiada/images/thumbnail/{{$olimpiada->img2}}" style="width: 100%; border-radius: 4px;">
                            </div>
                            <div class="col-md-6 pl-3 pr-3">
                                <p class="text-muted mb-0 pt-3">Автор <span class="float-right">{{$olimpiada->title}}</span></p><hr class="mt-2">
                                <p class="text-muted mb-0">Баасы <span class="float-right">{{$olimpiada->title}} сом</span></p><hr class="mt-2">
                                <p class="text-muted mb-0">Мүмкүндүктөрдүн саны <span class="float-right">{{$olimpiada->title}}</span></p><hr class="mt-2">
                                <p class="text-muted mb-0">Сатып алуулардын саны <span class="float-right">{{$olimpiada->title}}</span></p><hr class="mt-2">
                            </div>                     
                        </div>
                        <div class="col-md-12">
                            <div class="row align-items-center mt-3">
                                <div class="col-md-10">
                                    <p class="mb-2">Тестти баштоо үчүн алгач системага кирүү керек</p>
                                </div>
                                <div class="col-md-2 text-right mb-2">
                                    <a href="{{route('opentest2', $olimpiada['id'])}}" class="btn btn-block btn-info pt-1">Кирүү</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

        




        </section><!-- /.content -->    



       
                   
                            


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- для селектов-->




<script type="text/javascript">

@if($time_max > $time)


  function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    total: t,
    days: days,
    hours: hours,
    minutes: minutes,
    seconds: seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector(".days");
  var hoursSpan = clock.querySelector(".hours");
  var minutesSpan = clock.querySelector(".minutes");
  var secondsSpan = clock.querySelector(".seconds");

  function updateClock() {
    var t = getTimeRemaining(endtime);

    if (t.total <= 0) {
      document.getElementById("countdown").className = "hidden";
      document.getElementById("deadline-message").className = "visible";
      clearInterval(timeinterval);
      return true;
    }

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
    minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
    secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

//var deadline = "January 01 2018 00:00:00 GMT+0300"; //for Ukraine
var deadline = new Date(Date.parse(new Date({{date('Y', $olimpiada_tury001['nachalo_zdachi_tura'])}},{{$mes}},{{date('d', $olimpiada_tury001['nachalo_zdachi_tura'])}},{{date('H', $olimpiada_tury001['nachalo_zdachi_tura'])}},{{date('i', $olimpiada_tury001['nachalo_zdachi_tura'])}},0))); // for endless timer
initializeClock("countdown", deadline);
@else
@endif


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
    
</script>
<!-- для селектов-->
<script>
$(document).on('click', '.kupit_test', function(){    
    $('#modal-default').modal('show')
});

$(document).on('click', '.play_test', function(){    
    $('#modal-default2').modal('show')
});


function changeClass(){
     $('.ssd11').width($('.ssd12').width());
  }
</script>

<script type="text/javascript">
// для блока, чтобы стал кнопкой
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
// для блока, чтобы стал кнопкой


    function equalHeight(group) {
        var tallest = 0;
        group.each(function() {
            thisHeight = $(this).width();
            if(thisHeight > tallest) {
                tallest = thisHeight;
            }
        });
        group.width(tallest);
    }
    $(document).ready(function(){
        equalHeight($(".rrttrr"));
    });           
</script>
@endsection