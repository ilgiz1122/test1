@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
  .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-4px);
  }
  .scale {
    transition: 1s; /* Время эффекта */
   }
   .scale:hover {
    transform: scale(1.03); /* Увеличиваем масштаб */
   }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
  }

.todo-list2 .tools2 {
  display: none;
}

.todo-list2:hover .tools2 {
  display: inline-block;
}
label {
    font-size: 1rem;
    font-weight:normal;
}

   
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row align-items-center mb-3 pt-3">
            <div class="col-10" >
              <h5 class="pt-2 mb-2" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-content="Партнерская программа поможет вам продавать еще больше. Наши партнеры будут рекламировать ваш товар и за это будут получать вознограждение равным к 5% от стоимости материала, а покупатель получает 10% скидки. В итоге вы теряете 15%, но если вы соглашаетесь на партнерскую программу, тогда комиссия системы составить не 20%, а 15% от стоимости товара. В конце ваш чистый прибыль составить 70% от стоимости товара.">Тесттер <span data-bs-toggle="tooltip" data-bs-placement="right" title="Количество тестов">({{$kol}})</span></h5>
            </div>
            <div class="col-2" >
              <a class="btn btn-sm btn-success float-right text-nowrap" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить тест" href="{{ route('moderator_tests_create', ['for_action' => $for_action])}}">
                  <i class="fas fa-plus"></i> Добавить
              </a> 
            </div>
          </div>
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

          @foreach ($tests as $test)
            <div class="card mb-3 todo-list2 accordion{{$test->id}} accordion00{{$test->id}}"  id="accordion{{$test->id}}">
              <div class="row no-gutters align-items-center">
                <div class="col-md-3">
                  <img src="https://nonsi.kg/public/storage/testy/images/thumbnail/{{$test->img}}" class="card-img shadow-sm" alt="..." style="border-radius: 4px;">
                </div>
                <div class="col-md-9">
                  <div class="row mr-0 ml-0  align-items-center"> 
                    <div class="col-md-11 pr-0 pl-0">
                      <div class="card-body pr-2 pl-2 pt-3 pb-3">
                        <h5 class="card-title">{{$test->title}} <small class="text-muted">@if(intval($test->language) != 4 )({{$test->languages['language']}})@endif</small></h5>
                        <p class="card-text mb-0"><small class="text-muted">Суроолордун саны: {{$test->test_voprosy_count}} / Мүмкүндүктөрдүн саны: {{$test->kol_popytkov}} / Узактыгы: {{$test->time / 60}} мин.</small></p>
                        <p class="card-text text-muted mb-0 mt-1">Категория: {{$test->test_category->title}} / {{$test->test_podcategory->title}}</p>
                        <div class="row align-items-center ml-0 mr-0 mt-3">
                          @if($test->price > 0)
                          <div class="col border text-center shadow-sm two dropup" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px;">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset2" type="button"  data-offset="86,15">
                              <p class="card-text pb-1">
                                <small class="text-muted">
                                  @if (intval($test->partnerka) == 0)
                                    <span style="word-spacing: 15px;">Партнерка: 
                                      <span class="badge"><i class="fas fa-times" style="font-size: 13px; color: #dc3545;"></i></span>
                                    </span>
                                  @else
                                    <span style="word-spacing: 15px;">Партнерка: 
                                        <span class="badge"><i class="fas fa-check" style="font-size: 13px; color: #28a745;"></i></span>
                                    </span>
                                  @endif
                                </small>
                              </p>
                            </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Партнердук программа</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form method="POST" action="{{ route('moderator_testy_update_partnerka1', $test['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="partnerka1" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Катышуу
                                        <span class="float-right text-sm">@if (intval($test->partnerka) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                          
                                    </div>
                                  </div>
                                </button>
                              </form> 
                              <div class="dropdown-divider  mb-0 mt-0"></div>

                              <form method="POST" action="{{ route('moderator_testy_update_partnerka2', $test['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="partnerka2" min="0" maxlength="1" class="form-control" value="0" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Баш тартуу
                                        <span class="float-right text-sm">@if (intval($test->partnerka) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                                    </div>
                                  </div>
                                  <!-- Message End -->
                                </button>
                              </form> 
                            </div>
                            <!-- dropdown-menu -->
                          </div>
                          @endif

                          @if($test->price == 0)
                          <div class="col border text-center shadow-sm dropup" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px;">
                              <p class="card-text pb-1">
                                <small class="text-muted">
                                    <span style="word-spacing: 15px;">Партнерка: 
                                      <span class="badge"><i class="fas fa-minus" style="font-size: 13px; opacity: 0;"></i></span>
                                    </span>
                                </small>
                              </p>
                          </div>
                          @endif

                          @if($test->price > 0)
                          <?php
                            $god1 = floor($test->srok_dostupa / 31536000);
                            $mounth1 = floor(($test->srok_dostupa - $god1 * 31536000) / 2592000);
                            $day1 = floor(($test->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                            $hour1 = floor(($test->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                            $minute1 = floor(($test->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                          ?>
                          <div class="col border text-center shadow-sm two dropup">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset10" type="button"  data-offset="@if($loop->iteration == 1) 120,0 @else 120,10 @endif">
                              <p class="card-text pb-1 pr-0 pl-0"><small class="text-muted" style="word-spacing: 10px;">Доступ: @if($test->srok_dostupa == 0) чектөөсүз @else
                                @if($god1 > 0){{$god1}}ж....
                                @else
                                  @if($mounth1 > 0){{$mounth1}}ай....
                                  @else
                                    @if($day1 > 0){{$day1}}күн....
                                    @else
                                      @if($hour1 > 0){{$hour1}}саат....
                                      @else
                                        @if($minute1 > 0){{$minute1}}мин....@endif
                                      @endif
                                    @endif
                                  @endif
                                @endif
                              @endif</small></p>
                            </a> 
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0 keep_open">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Срок доступа</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              
                              <div class="form-group mt-2 mb-2 mr-2 ml-2 border" style="border-radius: 4px;">
                                <div class="row pt-2 pb-2 pr-2 pl-2">
                                  <div class="col">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="customRadio1{{$test->id}}" name="customRadio1{{$test->id}}" data-toggle="collapse" href="#collapseExample2{{$test->id}}" role="button" aria-expanded="false" aria-controls="customRadio1{{$test->id}}" @if($test->srok_dostupa == 0) checked="" @endif>
                                      <label for="customRadio1{{$test->id}}" class="text-muted custom-control-label">Чектөөсүз</label>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="customRadio2{{$test->id}}" name="customRadio1{{$test->id}}" data-toggle="collapse" href="#collapseExample{{$test->id}}" role="button" aria-expanded="false" aria-controls="customRadio2{{$test->id}}" @if($test->srok_dostupa != 0) checked="" @endif>
                                      <label for="customRadio2{{$test->id}}" class="text-muted custom-control-label">Задать срок</label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="collapse @if($test->srok_dostupa != 0) show @endif" id="collapseExample{{$test->id}}" data-parent=".accordion{{$test->id}}">
                                <form class="" method="POST" action="{{ route('moderator_testy_update_srok_dostup1', $test['id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-row form-group pt-0 pb-0 pr-2 pl-2 mb-0">
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">жыл</span>
                                    <select name="god" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($gods as $god)
                                      <option value="{{$god['god']}}" @if($god1 == $god['god']) selected @endif>{{ $god['title'] }}
                                      </option>
                                      @endforeach
                                    </select>   
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">ай</span>
                                    <select name="mounth" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($mounths as $mounth)
                                      <option value="{{$mounth['mounth']}}" @if($mounth1 == $mounth['mounth']) selected @endif>{{ $mounth['title'] }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">күн</span>
                                    <select name="day" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($days as $day)
                                      <option value="{{$day['day']}}" @if($day1 == $day['day']) selected @endif>{{ $day['title'] }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row form-group pt-2 pb-2 pr-2 pl-2 mb-0">
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">саат</span>
                                    <select name="hour" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($hours as $hour)
                                      <option value="{{$hour['hour']}}" @if($hour1 == $hour['hour']) selected @endif>{{ $hour['title'] }}
                                      </option>
                                      @endforeach
                                    </select>  
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">мүнөт</span>
                                    <select name="minute" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($minutes as $minute)
                                      <option value="{{$minute['minute']}}" @if($minute1 == $minute['minute']) selected @endif>{{ $minute['title'] }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted" style="opacity: 0;">Өзгөртүү</span>
                                    <button type="submit" class="btn btn-info btn-sm float-right">Өзгөртүү</button>
                                  </div>
                                </div>
                                </form> 
                              </div>

                              <div class="collapse @if($test->srok_dostupa == 0) show @endif" id="collapseExample2{{$test->id}}"  data-parent=".accordion{{$test->id}}">
                                <form class="" method="POST" action="{{ route('moderator_testy_update_srok_dostup2', $test['id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group pt-0 pb-0 pr-2 pl-2 mb-0">
                                  <div class="form-group mb-0">
                                    <span class="text-muted">Срок доступа</span>
                                    <input type="text" name="vechno" class="form-control form-control-sm" readonly="" value="Навсегда">
                                  </div>
                                </div>
                                <div class="form-row form-group pt-2 pb-2 pr-2 pl-2 mb-0">
                                  <div class="form-group col-4 mb-0">
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted" style="opacity: 0;">Өзгөртүү</span>
                                    <button type="submit" class="btn btn-info btn-sm float-right">Өзгөртүү</button>
                                  </div>
                                </div>
                                </form> 
                              </div>
                            </div>
                            <!-- dropdown-menu -->
                          </div>
                          @endif
                          @if($test->price == 0)
                          <div class="col border text-center shadow-sm">
                              <p class="card-text pb-1 pr-2 pl-2"><small class="text-muted" style="word-spacing: 10px;">Доступ: <span style="opacity: 0">цена0</span></small></p>
                          </div>
                          @endif

                          <div class="col border text-center shadow-sm two dropup">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset3" type="button"  data-offset="50,15">
                            <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 10px;">Баасы: <b>{{$test->price / 100}}</b></span> сом</small></p>
                            </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Баасы</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form class="" method="POST" action="{{ route('moderator_testy_update_price', $test['id']) }}">
                              @csrf
                              @method('PUT')
                                <div class="input-group pt-2 pb-2 pr-2 pl-2">
                                  <input type="number" pattern="\d+" name="price2" min="0" max="99999" maxlength="5" class="form-control" placeholder="Например: 30 " value="{{$test->price / 100}}">
                                  <div class="input-group-append">
                                    <span class="input-group-text">сом</span>
                                  </div>
                                </div>
                                <div class="pt-2 pb-2 pr-2 pl-2 mb-2">
                                  <button type="submit" class="btn btn-info btn-sm float-right">Өзгөртүү</button>
                                </div>
                                <div class="pt-2 pb-2 pr-2 pl-2 mb-2"></div>
                              </form> 
                            </div>
                            <!-- dropdown-menu -->
                          </div>
                          <div class="col border text-center shadow-sm two dropup" style="border-top-right-radius: 3px; border-bottom-right-radius: 3px;">
                              <a class="" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="10,15">
                              @if (intval($test->status) == 0)
                              <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 15px;">Статус: </span>
                                  <span class="badge"><i class="fas fa-times" style="font-size: 13px; color: #dc3545;"></i></span>
                              </small></p>
                                @else
                                <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                  <small class="badge badge-success"><i class="fas fa-check"></i> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ачык</font></font></small>
                                </small></p>
                              @endif
                              </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2">Статус</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form method="POST" action="{{ route('moderator_testy_update_status1', $test['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="status" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Ачык
                                        <span class="float-right text-sm">@if (intval($test->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                          
                                    </div>
                                  </div>
                                </button>
                              </form> 
                              <div class="dropdown-divider  mb-0 mt-0"></div>

                              <form method="POST" action="{{ route('moderator_testy_update_status2', $test['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="status2" min="0" max="1" maxlength="1" class="form-control" value="0" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Жабык
                                        <span class="float-right text-sm">@if (intval($test->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                                    </div>
                                  </div>
                                  <!-- Message End -->
                                </button>
                              </form> 
                            </div>
                            <!-- dropdown-menu -->



                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1 text-right tools2 dropup" style="line-height: 2.2rem; word-spacing: 30px;">
                          <!--

                          <a class="btn btn-tool w-1001 for_modal_view" data-toggle="collapse" href="#testr{{ $loop->iteration }}" role="button">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Посмотреть видео о курсе">
                              <i class="far fa-eye"></i>
                            </span>
                          </a>-->
                        
                          <a class="btn btn-tool" href="{{ route('moderator_tests_edit', ['for_action' => $for_action, 'id' => $test->id]) }}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Редактировать">
                              <i class="far fa-edit" style="transform: scale(-1, 1);"></i>
                            </span>
                          </a>
                          <a class="btn btn-tool w-1001 for_modal_delete" type="button" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $test->title }}" data-kol="{{$test->kupit_count}}" data-price="{{ $test->price / 100 }}" data-id2="{{route('moderator_tests_destroy', $test['id'])}}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Удалить">
                              <i class="fas fa-trash"></i>
                            </span>
                          </a>
                          <a class="btn btn-tool" data-toggle="dropdown" id="dropdownMenuOffset111" type="button"  data-offset="-500,-150">
                            <span style="font-size: 1.2em;" >
                              <i class="fas fa-tasks"></i>
                            </span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left pt-0 pb-0 keep_open" style="line-height: normal; word-spacing: normal;">
                            <?php
                              $day01 = floor(($test->pokaz_otvetov) / 86400);
                              $hour01 = floor(($test->pokaz_otvetov - $day01 * 86400) / 3600);
                              $minute01 = floor(($test->pokaz_otvetov - $day01 * 86400 - $hour01 * 3600) / 60);
                            ?>
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Показать / скрыть правильные ответы</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <div class="form-group mt-2 mb-2 mr-2 ml-2 border" style="border-radius: 4px;">
                                <div class="row pt-2 pb-2 pr-2 pl-2">
                                  <div class="col">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="customRadio001{{$test->id}}" name="customRadio001{{$test->id}}" data-toggle="collapse" href="#collapseExample002{{$test->id}}" role="button" aria-expanded="false" aria-controls="customRadio001{{$test->id}}" @if($test->pokaz_otvetov === null) checked="" @endif>
                                      <label for="customRadio001{{$test->id}}" class="text-muted custom-control-label">Скрыть</label>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="customRadio002{{$test->id}}" name="customRadio001{{$test->id}}" data-toggle="collapse" href="#collapseExample00{{$test->id}}" role="button" aria-expanded="false" aria-controls="customRadio002{{$test->id}}" @if($test->pokaz_otvetov === null) @else checked="" @endif>
                                      <label for="customRadio002{{$test->id}}" class="text-muted custom-control-label">Задать срок</label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="collapse @if($test->pokaz_otvetov === null) @else show @endif" id="collapseExample00{{$test->id}}" data-parent=".accordion00{{$test->id}}">
                                <form class="" method="POST" action="{{ route('moderator_testy_update_pokaz_otvetov1', $test['id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-row form-group pt-0 pb-0 pr-2 pl-2 mb-0">
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">күн</span>
                                    <select name="day" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($days as $day)
                                      <option value="{{$day['day']}}" @if($day01 == $day['day']) selected @endif>{{ $day['title'] }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">саат</span>
                                    <select name="hour" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($hours as $hour)
                                      <option value="{{$hour['hour']}}" @if($hour01 == $hour['hour']) selected @endif>{{ $hour['title'] }}
                                      </option>
                                      @endforeach
                                    </select>  
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">мүнөт</span>
                                    <select name="minute" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($minutes as $minute)
                                      <option value="{{$minute['minute']}}" @if($minute01 == $minute['minute']) selected @endif>{{ $minute['title'] }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row form-group pt-2 pb-2 pr-2 pl-2 mb-0">
                                  <div class="form-group col-4 mb-0"></div>
                                  <div class="form-group col-4 mb-0"></div>
                                  <div class="form-group col-4 mb-0">
                                    <button type="submit" class="btn btn-info btn-sm btn-block float-right">Өзгөртүү</button>
                                  </div>
                                </div>                               
                                </form> 
                              </div>

                              <div class="collapse @if($test->pokaz_otvetov === null) show @endif" id="collapseExample002{{$test->id}}"  data-parent=".accordion00{{$test->id}}">
                                <form class="" method="POST" action="{{ route('moderator_testy_update_pokaz_otvetov2', $test['id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group pt-0 pb-0 pr-2 pl-2 mb-0">
                                  <div class="form-group mb-0">
                                    <span class="text-muted">Скрыть</span>
                                    <input type="text" name="vechno" class="form-control form-control-sm" readonly="" value="Скрыть правильные ответы">
                                  </div>
                                </div>
                                <div class="form-row form-group pt-2 pb-2 pr-2 pl-2 mb-0">
                                  <div class="form-group col-4 mb-0">
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <button type="submit" class="btn btn-info btn-sm float-right">Өзгөртүү</button>
                                  </div>
                                </div>
                                </form> 
                              </div>
                            </div>
                            <!-- dropdown-menu -->
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          @endforeach
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Жакшылап ойлонуңуз</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема <span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-0">Баасы <span class="float-right"><span class="var_title6"></span> <span>сом</span></span></p><hr class="mt-1">
                      <p class="mb-0">Сатуулардын саны <span class="float-right var_title2"></span></p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Жабуу</button>
                        <form method="POST" id="delet"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fas fa-trash"></i> Өчүрүү
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(function() {
  $(".for_modal_delete").click(
    function() {
      var kol = $(this).attr('data-kol');
      var title = $(this).attr('data-title');
      var price = $(this).attr('data-price');
      var id2 = $(this).attr('data-id2');


      $(".var_title").text(title);
      $(".var_title2").text(kol);
      $(".var_title6").text(price);
      $("#delet").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});


$(document).ready(function() {
        $(document).on('click', '.dropdown-menu', function (e) {
            $(this).hasClass('keep_open') && e.stopPropagation(); // This replace if conditional.
        }); 
    });


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 

</script>
@endsection