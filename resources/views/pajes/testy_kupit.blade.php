@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')
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

.required p:after {
    color: #e32;
    content: ' *';
    display:inline;
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

.countdown {
  display: inline-block;
}
.countdown-number {
  display: inline-block;
}
.countdown-time {
  display: inline-block;
}
.deadline-message{
  display: none;
}
.visible{
  display: block;
}
.hidden{
  display: none;
}

</style>

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
                            <li class="breadcrumb-item"><a href="{{ route('testpodcategory', ['for_action' => $for_action, 'id' => $test_category->id])}}">{{$test_category->title}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('vsetesty', ['for_action' => $for_action, 'id' => $test_podcategory->id])}}">{{$test_podcategory->title}}</a></li>
                            <li class="breadcrumb-item active">{{$tests->title}}</li>
                        </ol>
                  </div><!-- /.container-fluid -->
                </section>
                <div class="row">
                    <div class="col-md-9">
                                <div class="container-fluid mt-4">
                                    <div class="card">
                                        <div class="card-body p-0 class11">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img style="width: 100%; border-radius: 4px;" src="{{asset('')}}/storage/testy/images/thumbnail/{{$tests['img']}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body pr-3 pl-3 pt-4 pb-3">
                                                        <h5 class="card-title">{{$tests->title}}</h5>
                                                        <p class="card-text mb-0 pt-3"><small class="">Тесттин узактыгы: {{$tests->time / 60}} минут</small></p>
                                                        <p class="card-text mb-0"><small class="">Суроолордун саны: {{$tests->test_voprosy_count}}</small></p>
                                                        <p class="card-text mb-0 mt-2">Мүмкүндүктөрдүн саны: 
                                                            @if($tests->price > 0)
                                                                @if (\Auth::user()) 
                                                                    @if($proverka != null) {{$proverka->kol_popytkov}} / 
                                                                        {{$tests->kol_popytkov}}
                                                                    @else 
                                                                        0 / {{$tests->kol_popytkov}}
                                                                    @endif
                                                                @else 
                                                                    0 / {{$tests->kol_popytkov}}
                                                                @endif
                                                            @else 
                                                                чектөө жок
                                                            @endif
                                                        </p>
                                                        
                                                        <a type="button"  class="btn btn-block btn-info mt-3 
                                                        @if($tests->price > 0)
                                                            @if (\Auth::user()) 
                                                                @if($proverka != null)
                                                                    @if($proverka->kol_popytkov > 0)
                                                                        play_test
                                                                    @else
                                                                        kupit_test
                                                                    @endif
                                                                @else
                                                                    kupit_test
                                                                @endif
                                                            @else
                                                                kupit_test
                                                            @endif
                                                        @else
                                                            play_test
                                                        @endif">
                                                                @if($tests->price > 0)
                                                                    @if (\Auth::user()) 
                                                                        @if($proverka != null)
                                                                            @if($proverka->kol_popytkov > 0)
                                                                                Баштоо
                                                                            @else
                                                                                Баштоо
                                                                            @endif
                                                                        @else
                                                                            Сатып алуу
                                                                        @endif
                                                                    @else
                                                                        Баштоо
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
                                </div>
                                <div class="container-fluid pt-3 mt-4">
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
                                                                        <div class="col-auto">
                                                                            <i class="far fa-clock"></i>
                                                                        </div>
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
                                                    <a href="{{route('opentest2', $tests['id'])}}" class="btn btn-block btn-outline-info pt-1">Кирүү</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid pt-3 mt-4">
                                    <div class="form-group test_margin">
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
                                </div>                         
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <h6 class="text-muted text-center mb-0 pt-3 pb-2"><b>Тестти кантип сатып алса болот?</b></h6>
                            <div class="card card-body pt-2 pb-0 mb-2 mt-2 two">
                                <div class="row align-items-center block23">
                                    <a href="https://wa.me/+996505919600?text="></a>
                                    <div class="col-auto">
                                        <span style="font-size: 4em; color: #28a745;">
                                          <i class="fab fa-whatsapp"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp</b></p>
                                        <p class="text-muted text-center mb-0 pb-2">0505 919 600</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body pt-2 pb-0  mb-2 mt-4 two">
                                <div class="row align-items-center  block23">
                                    <a href="https://t.me/ilgiz1209?text="></a>
                                    <div class="col-auto">
                                        <span style="font-size: 4em; color: #17a2b8;">
                                          <i class="fab fa-telegram-plane"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted text-center mb-0 pt-2"><b>Telegram</b></p>
                                        <p class="text-muted text-center mb-0 pb-2"><a href="https://t.me/ilgiz1209">ilgiz1209</a></p>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
@if($tests->price > 0)
    @if (\Auth::user())
        @if($proverka != null)
            @if($proverka->kol_popytkov > 0)
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
                                <a type="button" href="{{route('play_test', $tests['id'])}}" class="btn btn-block btn-info mt-3">Баштоо</a>
                            </div>
                        </div>
                    </div>
                </div>  
            @else
                <div class="modal fade bd-example-modal-lg" id="modal-default" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header pt-2 pb-2" style="background: #f4f6f9;">
                                <p class="mb-0"><b>Маалымат</b></p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class=" text-center pt-3">Сиз бардык мүмкүндүктөрдү колдонгонсуз. Эгерде тестти дагы тапшырууну кааласаңыз, анда тестти сатып алууңуз керек.</p>
                                @if (Auth::user()->balance < $tests['price'])
                                <small>
                                    <p class="text-muted mb-0 pt-3">Сиздин балансыңыз <span class="float-right">{{ Auth::user()->balance / 100 }} сом</span></p><hr class="mt-0">
                                    <p class="text-muted mb-0">Тесттин баасы <span class="float-right">{{ $tests->price / 100 }} сом</span></p><hr class="mt-0">
                                </small>
                                @endif
                            </div>
                            <div class="modal-footer" style="background: #f4f6f9;">
                                @if (Auth::user()->balance < $tests['price'])
                                    <p class="text-center text-muted mb-0 pt-0 pb-2">Эгерде балансыңызды толуктап, ушул тестти сатып алууну кааласаңыз, анда биз менен байланышыңыз.</p>
                                    <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                                        <div class="row align-items-center block23">
                                            <a href="https://wa.me/+996505919600?text="></a>
                                            <div class="col-auto">
                                                <span style="font-size: 3em; color: #28a745;">
                                                  <i class="fab fa-whatsapp"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted text-center mb-0 pt-0"><b>WhatsApp</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                                        <div class="row align-items-center  block23">
                                            <a href="https://t.me/ilgiz1209?text="></a>
                                            <div class="col-auto">
                                                <span style="font-size: 3em; color: #17a2b8;">
                                                  <i class="fab fa-telegram-plane"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted text-center mb-0 pt-0"><b>Telegram</b></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->balance >= $tests['price'])
                                    <a type="button" href="{{route('kupit_test', $tests['id'])}}" class="btn btn-block btn-info mt-3 kupit_test">Сатып алуу</a>
                                @endif                            
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
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
                            <div class="row">
                                <div class="col-md-6 pl-3 pr-3">
                                    <img class="d-block w-100 shadow-sm" id="rebate_old_imag23" src="{{asset('')}}/storage/testy/images/thumbnail/{{$tests['img']}}" style="width: 100%; border-radius: 4px;">
                                </div>
                                <div class="col-md-6 pl-3 pr-3">
                                @if (Auth::user()->balance < $tests['price'])
                                    <p class=" text-center pt-3">Урматтуу колдонуучу, сиздин балансыныздагы акча каражаты бул тестти сатып алууга жетишсиз.</p>
                                        <p class="text-muted mb-0 pt-3">Сиздин балансыңыз <span class="float-right">{{ Auth::user()->balance / 100 }} сом</span></p><hr class="mt-0">
                                        <p class="text-muted mb-0">Тесттин баасы <span class="float-right">{{ $tests->price / 100 }} сом</span></p><hr class="mt-0">
                                @else
                                    <p class="text-muted mb-0 pt-3">Автор <span class="float-right">{{$tests->user['name']}}</span></p><hr class="mt-2">
                                    <p class="text-muted mb-0">Баасы <span class="float-right">{{$tests->price / 100}} сом</span></p><hr class="mt-2">
                                    <p class="text-muted mb-0">Мүмкүндүктөрдүн саны <span class="float-right">{{$tests->kol_popytkov}}</span></p><hr class="mt-2">
                                    <p class="text-muted mb-0">Сатып алуулардын саны <span class="float-right">{{$kol_pokupok}}</span></p><hr class="mt-2">
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background: #f4f6f9;">
                        @if (Auth::user()->balance < $tests['price'])
                            <p class="text-center text-muted mb-0 pt-0 pb-2"> Эгерде балансыңызды толуктап, ушул тестти сатып алууну кааласаңыз, анда биз менен байланышыңыз.</p>
                            <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                                <div class="row align-items-center block23">
                                    <a href="https://wa.me/+996505919600?text="></a>
                                    <div class="col-auto">
                                        <span style="font-size: 3em; color: #28a745;">
                                          <i class="fab fa-whatsapp"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted text-center mb-0 pt-0"><b>WhatsApp</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                                <div class="row align-items-center  block23">
                                    <a href="https://t.me/ilgiz1209?text="></a>
                                    <div class="col-auto">
                                        <span style="font-size: 3em; color: #17a2b8;">
                                          <i class="fab fa-telegram-plane"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted text-center mb-0 pt-0"><b>Telegram</b></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (Auth::user()->balance >= $tests['price'])
                            <a type="button" href="{{route('kupit_test', $tests['id'])}}" class="btn btn-block btn-info mt-3 kupit_test">Сатып алуу</a>
                        @endif                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" id="modal-default" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header pt-2 pb-2" style="background: #f4f6f9;">
                                <p class="mb-0"><b>Тесттин аталышы: {{$tests->title}}</b></p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-muted mb-0 pt-3">Автор <span class="float-right">{{$tests->user['name']}}</span></p><hr class="mt-2">
                                    <p class="text-muted mb-0">Цена <span class="float-right">{{$tests->price / 100}} сом</span></p><hr class="mt-2">
                                    <p class="text-muted mb-0">Мүмкүндүктөрдүн саны <span class="float-right">{{$tests->kol_popytkov}}</span></p><hr class="mt-2">
                                    <p class="text-muted mb-0">Сатып алуулардын саны <span class="float-right">{{$kol_pokupok}}</span></p><hr class="mt-2">
                                    
                                <p class=" text-center pt-3">Урматтуу колдонуучу, сиздин балансыныздагы акча каражаты бул тестти сатып алууга жетишсиз.</p>
                                @if (Auth::user()->balance < $tests['price'])
                                <small>
                                    <p class="text-muted mb-0 pt-3">Сиздин балансыңыз <span class="float-right">{{ Auth::user()->balance / 100 }} сом</span></p><hr class="mt-0">
                                    <p class="text-muted mb-0">Тесттин баасы <span class="float-right">{{ $tests->price / 100 }} сом</span></p><hr class="mt-0">
                                </small>
                                @endif
                            </div>
                            <div class="modal-footer" style="background: #f4f6f9;">
                                @if (Auth::user()->balance < $tests['price'])
                                    <p class="text-center text-muted mb-0 pt-0 pb-2">Эгерде балансыңызды толуктап, ушул тестти сатып алууну кааласаңыз, анда биз менен байланышыңыз.</p>
                                    <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                                        <div class="row align-items-center block23">
                                            <a href="https://wa.me/+996505919600?text="></a>
                                            <div class="col-auto">
                                                <span style="font-size: 3em; color: #28a745;">
                                                  <i class="fab fa-whatsapp"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted text-center mb-0 pt-0"><b>WhatsApp</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                                        <div class="row align-items-center  block23">
                                            <a href="https://t.me/ilgiz1209?text="></a>
                                            <div class="col-auto">
                                                <span style="font-size: 3em; color: #17a2b8;">
                                                  <i class="fab fa-telegram-plane"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted text-center mb-0 pt-0"><b>Telegram</b></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->balance >= $tests['price'])
                                    <a type="button" href="{{route('kupit_test', $tests['id'])}}" class="btn btn-block btn-info mt-3 kupit_test">Сатып алуу</a>
                                @endif                            
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    @else
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
                        <div class="row">
                            <div class="col-md-6 pl-3 pr-3">
                                <img class="d-block w-100" id="rebate_old_imag23" src="{{asset('')}}/storage/testy/images/thumbnail/{{$tests['img']}}" style="width: 100%; border-radius: 4px;">
                            </div>
                            <div class="col-md-6 pl-3 pr-3">
                                <p class="text-muted mb-0 pt-3">Автор <span class="float-right">{{$tests->user['name']}}</span></p><hr class="mt-2">
                                <p class="text-muted mb-0">Баасы <span class="float-right">{{$tests->price / 100}} сом</span></p><hr class="mt-2">
                                <p class="text-muted mb-0">Мүмкүндүктөрдүн саны <span class="float-right">{{$tests->kol_popytkov}}</span></p><hr class="mt-2">
                                <p class="text-muted mb-0">Сатып алуулардын саны <span class="float-right">{{$kol_pokupok}}</span></p><hr class="mt-2">
                            </div>                     
                        </div>
                        <div class="col-md-12">
                            <div class="row align-items-center mt-3">
                                <div class="col-md-10">
                                    <p class="mb-2">Тестти баштоо үчүн алгач системага кирүү керек</p>
                                </div>
                                <div class="col-md-2 text-right mb-2">
                                    <a href="{{route('opentest2', $tests['id'])}}" class="btn btn-block btn-info pt-1">Кирүү</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
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
                    <a type="button" href="{{route('play_test', $tests['id'])}}" class="btn btn-block btn-info mt-3">Баштоо</a>
                </div>
            </div>
        </div>
    </div>   
@endif
        




        </section><!-- /.content -->    



                            
                            



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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