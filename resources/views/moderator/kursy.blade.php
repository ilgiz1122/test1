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

.hover11:hover {
      background-color: #f4f6f9;
  }



.hover11:hover .color11{
    background: #f4f6f9;
}



.number {
  display: inline-block;
  position: relative;
  width: 110px;
}

.number input[type="number"] {
  display: block;
  height: 32px;
  line-height: 32px;
  width: 100%;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  text-align: center;
  -moz-appearance: textfield;
  -webkit-appearance: textfield;
  appearance: textfield;
  border: none;
  font-weight: bold;
  color: green;
}
.number input[type="number"]::-webkit-outer-spin-button,
.number input[type="number"]::-webkit-inner-spin-button {
  display: none;
}
.number-minus {
  position: absolute;
  top: 1px;
  left: 2px;
  bottom: 1px;
  width: 30px;
  padding: 0;
  display: block;
  text-align: center;
  border: none;
  border-right: 1px solid #ddd;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
}
.number-plus {
  position: absolute;
  top: 1px;
  right: 2px;
  bottom: 1px;
  width: 30px;
  padding: 0;
  display: block;
  text-align: center;
  border: none;
  border-left: 1px solid #ddd;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
}
   
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <!-- Main content -->
    <section class="content">

          

          <div class="row align-items-center">
            <div class="col-10" >
              <section class="content-header pl-0 pr-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('moderator_panel')}}">
                            <i class="nav-icon fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Курс</li>
                </ol>
              </section>
            </div>
            <div class="col-2" >
              <a class="btn btn-sm btn-success float-right text-nowrap" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить курс" href="{{ route('moderator_kursy_create')}}">
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
          <p class="pt-2 mb-4 text-center" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-content="Партнерская программа поможет вам продавать еще больше. Наши партнеры будут рекламировать ваш товар и за это будут получать вознограждение равным к 5% от стоимости материала, а покупатель получает 10% скидки. В итоге вы теряете 15%, но если вы соглашаетесь на партнерскую программу, тогда комиссия системы составить не 20%, а 15% от стоимости товара. В конце ваш чистый прибыль составить 70% от стоимости товара."><b>Курстардын тизмеси <span data-bs-toggle="tooltip" data-bs-placement="right" title="Курстардын саны: {{$kol}}">({{$kol}})</span></b></p>
          
            
          @foreach ($podcategories as $podcategory)
            <div class="card mb-3 todo-list2 accordion{{$podcategory->id}}"  id="accordion{{$podcategory->id}}">
              <div class="row no-gutters align-items-center">
                <div class="col-md-3">
                  <img src="{{asset('')}}/storage/kursy/images/thumbnail/{{$podcategory->img}}" class="card-img shadow-sm" alt="..." style="border-radius: 4px;">
                </div>
                <div class="col-md-9">
                  <div class="row mr-0 ml-0  align-items-center"> 
                    <div class="col-md-11 pr-0 pl-0">
                      <div class="card-body pr-2 pl-2 pt-3 pb-3">
                        <div class="row">
                          <div class="col-11">
                            <h5 class="card-title"><a href="{{ route('kurs', $podcategory['id']) }}" style="color: black;">{{$podcategory->title}}</a></h5>
                            <p class="card-text mb-0"><small class="text-muted">Язык: @if(intval($podcategory->language) != 4 ){{$podcategory->languages['language']}}@else - @endif / Количество уроков: {{$podcategory->uroky_count}} / Количество продаж: {{$podcategory->kupit_count}}</small></p>
                            <p class="card-text text-muted mb-0 mt-1">Категория: <b>{{$podcategory->category->title}} / <a href="{{ route('moderator_kurs_comment_view', $podcategory['id']) }}">пикир</a></b></p>
                          </div>
                          <div class="col-1 text-right pl-0" style="line-height: 2.2rem; word-spacing: 30px;"> 
                            <!-- <a class="btn btn-tool w-1001 pl-o" href="{{ route('moderator_kurs_certificate', $podcategory['id']) }}">
                              <span style="font-size: 1.4em;" data-toggle="tooltip" data-placement="left" title="Сертификат">
                                <i class="fas fa-award"></i>
                              </span>
                            </a>-->

                            <a class="btn btn-tool collapsed w-1001 pl-0" data-toggle="collapse" href="#collapse{{$loop->iteration}}" aria-expanded="false">
                              <span style="font-size: 1.2em;" title="Дополнительные настройки" data-toggle="tooltip" data-placement="left">
                                <i class="fal fa-cog"></i>
                              </span>
                            </a>

                            @if($podcategory->price > 0)
                              <a class="btn btn-tool w-1001 pl-0" href="{{ route('moderator_kurs_code', $podcategory['id']) }}">
                                <span style="font-size: 1.4em;" title="Коддор" data-toggle="tooltip" data-placement="left">
                                  <i class="far fa-star-shooting"></i>
                                </span>
                              </a>
                            @endif                              
                          </div>
                        </div>
                        
                        <div class="row align-items-center ml-0 mr-0 mt-3">
                          @if($podcategory->price > 0)
                          <div class="col border text-center shadow-sm two dropup" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px;">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset2" type="button"  data-offset="86,15">
                              <p class="card-text pb-1">
                                <small class="text-muted">
                                  @if (intval($podcategory->partnerka) == 0)
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
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Партнерская программа</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form method="POST" action="{{ route('moderator_kursy_update_partnerka1', $podcategory['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="partnerka1" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Участвовать
                                        <span class="float-right text-sm">@if (intval($podcategory->partnerka) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                          
                                    </div>
                                  </div>
                                </button>
                              </form> 
                              <div class="dropdown-divider  mb-0 mt-0"></div>

                              <form method="POST" action="{{ route('moderator_kursy_update_partnerka2', $podcategory['id']) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="partnerka2" min="0" maxlength="1" class="form-control" value="0" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Отказаться
                                        <span class="float-right text-sm">@if (intval($podcategory->partnerka) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
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

                          @if($podcategory->price == 0)
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

                          @if($podcategory->price > 0)
                              <?php
                                $god1 = floor($podcategory->srok_dostupa / 31536000);
                                $mounth1 = floor(($podcategory->srok_dostupa - $god1 * 31536000) / 2592000);
                                $day1 = floor(($podcategory->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                                $hour1 = floor(($podcategory->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                                $minute1 = floor(($podcategory->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                              ?>
                          <div class="col border text-center shadow-sm two dropup">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset10" type="button"  data-offset="@if($loop->iteration == 1) 120,0 @else 120,10 @endif">
                              <p class="card-text pb-1 pr-0 pl-0"><small class="text-muted" style="word-spacing: 10px;">Доступ: @if($podcategory->srok_dostupa == 0) навсегда @else
                                @if($god1 > 0){{$god1}}г....
                                @else
                                  @if($mounth1 > 0){{$mounth1}}мес....
                                  @else
                                    @if($day1 > 0){{$day1}}д....
                                    @else
                                      @if($hour1 > 0){{$hour1}}ч....
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
                                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="customRadio1{{$podcategory->id}}" name="customRadio1{{$podcategory->id}}" data-toggle="collapse" href="#collapseExample2{{$podcategory->id}}" role="button" aria-expanded="false" aria-controls="customRadio1{{$podcategory->id}}" @if($podcategory->srok_dostupa == 0) checked="" @endif>
                                      <label for="customRadio1{{$podcategory->id}}" class="text-muted custom-control-label">Навсегда</label>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="custom-control custom-radio">
                                      <input class="custom-control-input custom-control-input-info custom-control-input-outline" type="radio" id="customRadio2{{$podcategory->id}}" name="customRadio1{{$podcategory->id}}" data-toggle="collapse" href="#collapseExample{{$podcategory->id}}" role="button" aria-expanded="false" aria-controls="customRadio2{{$podcategory->id}}" @if($podcategory->srok_dostupa != 0) checked="" @endif>
                                      <label for="customRadio2{{$podcategory->id}}" class="text-muted custom-control-label">Задать срок</label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="collapse @if($podcategory->srok_dostupa != 0) show @endif" id="collapseExample{{$podcategory->id}}" data-parent=".accordion{{$podcategory->id}}">
                                <form class="" method="POST" action="{{ route('moderator_kursy_update_srok_dostup1', $podcategory['id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-row form-group pt-0 pb-0 pr-2 pl-2 mb-0">
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">год</span>
                                    <select name="god" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($gods as $god)
                                      <option value="{{$god['god']}}" @if($god1 == $god['god']) selected @endif>{{ $god['title'] }}
                                      </option>
                                      @endforeach
                                    </select>   
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">месяц</span>
                                    <select name="mounth" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($mounths as $mounth)
                                      <option value="{{$mounth['mounth']}}" @if($mounth1 == $mounth['mounth']) selected @endif>{{ $mounth['title'] }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">день</span>
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
                                    <span class="text-muted">час</span>
                                    <select name="hour" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($hours as $hour)
                                      <option value="{{$hour['hour']}}" @if($hour1 == $hour['hour']) selected @endif>{{ $hour['title'] }}
                                      </option>
                                      @endforeach
                                    </select>  
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted">минута</span>
                                    <select name="minute" class="form-control form-control-sm">
                                      <option value="0">0</option>
                                      @foreach ($minutes as $minute)
                                      <option value="{{$minute['minute']}}" @if($minute1 == $minute['minute']) selected @endif>{{ $minute['title'] }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-4 mb-0">
                                    <span class="text-muted" style="opacity: 0;">Обновить</span>
                                    <button type="submit" class="btn btn-info btn-sm float-right">Обновить</button>
                                  </div>
                                </div>
                                </form> 
                              </div>

                              <div class="collapse @if($podcategory->srok_dostupa == 0) show @endif" id="collapseExample2{{$podcategory->id}}"  data-parent=".accordion{{$podcategory->id}}">
                                <form class="" method="POST" action="{{ route('moderator_kursy_update_srok_dostup2', $podcategory['id']) }}">
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
                                    <span class="text-muted" style="opacity: 0;">Обновить</span>
                                    <button type="submit" class="btn btn-info btn-sm float-right">Обновить</button>
                                  </div>
                                </div>
                                </form> 
                              </div>
                            </div>
                            <!-- dropdown-menu -->
                          </div>
                          @endif
                          @if($podcategory->price == 0)
                          <div class="col border text-center shadow-sm">
                              <p class="card-text pb-1 pr-2 pl-2"><small class="text-muted" style="word-spacing: 10px;">Доступ: <span style="opacity: 0">цена0</span></small></p>
                          </div>
                          @endif

                          <div class="col border text-center shadow-sm two dropup">
                            <a class="" data-toggle="dropdown" id="dropdownMenuOffset3" type="button"  data-offset="50,15">
                            <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 10px;">Цена: <b>{{$podcategory->price / 100}}</b></span> сом</small></p>
                            </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Цена курса</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form class="" method="POST" action="{{ route('moderator_kursy_update_price', $podcategory['id']) }}">
                              @csrf
                              @method('PUT')
                                <div class="input-group pt-2 pb-2 pr-2 pl-2">
                                  <input type="number" pattern="\d+" name="price2" min="0" max="99999" maxlength="5" class="form-control" placeholder="Например: 30 " value="{{$podcategory->price / 100}}">
                                  <div class="input-group-append">
                                    <span class="input-group-text">сом</span>
                                  </div>
                                </div>
                                <div class="pt-2 pb-2 pr-2 pl-2 mb-2">
                                  <button type="submit" class="btn btn-info btn-sm float-right">Обновить</button>
                                </div>
                                <div class="pt-2 pb-2 pr-2 pl-2 mb-2"></div>
                              </form> 
                            </div>
                            <!-- dropdown-menu -->
                          </div>
                          <div class="col border text-center shadow-sm two dropup" style="border-top-right-radius: 3px; border-bottom-right-radius: 3px;">
                              <a class="" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="10,15">
                              @if (intval($podcategory->status) == 0)
                              <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 15px;">Статус: </span>
                                  <span class="badge"><i class="fas fa-times" style="font-size: 13px; color: #dc3545;"></i></span>
                              </small></p>
                                @else
                                <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                  <small class="badge badge-success"><i class="fas fa-check"></i> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">активна</font></font></small>
                                </small></p>
                              @endif
                              </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2">Статус курса</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <form method="POST" action="{{ route('moderator_kursy_update_status1', ['podcat_id'=>$podcategory->id, 'podcatcat_id'=>$podcategory->cat_id]) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="status" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Активный
                                        <span class="float-right text-sm">@if (intval($podcategory->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                      </h3>
                          
                                    </div>
                                  </div>
                                </button>
                              </form> 
                              <div class="dropdown-divider  mb-0 mt-0"></div>

                              <form method="POST" action="{{ route('moderator_kursy_update_status2', ['podcat_id'=>$podcategory->id, 'podcatcat_id'=>$podcategory->cat_id]) }}">
                              @csrf
                              @method('PUT')
                                <input type="number" name="status2" min="0" max="1" maxlength="1" class="form-control" value="0" hidden="">
                                <button type="submit"  class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        Скрытый
                                        <span class="float-right text-sm">@if (intval($podcategory->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
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
                    <div class="col-md-1 text-right tools2" style="line-height: 2.2rem; word-spacing: 30px;">
                          <a class="btn btn-tool w-1001" href="{{ route('moderator_kurs_urok_index', $podcategory['id']) }}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Уроки даннога курса">
                              <i class="fas fa-list-ul"></i>
                            </span>
                          </a>

                          <a class="btn btn-tool" role="button" href="{{ route('moderator_kurs_dostijenie_studentov', ['kurs_id' => $podcategory->id, 'grup_number' => 0]) }}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Достижение студентов">
                              <i class="far fa-chart-bar"></i>
                            </span>
                          </a>

                          <!--<a class="btn btn-tool w-1001 for_modal_view" data-toggle="collapse" href="#testr{{ $loop->iteration }}" role="button">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Посмотреть видео о курсе">
                              <i class="far fa-eye"></i>
                            </span>
                          </a>-->
                        
                          <a class="btn btn-tool" href="{{ route('moderator_kursy_edit', $podcategory['id']) }}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Редактировать">
                              <i class="far fa-edit" style="transform: scale(-1, 1);"></i>
                            </span>
                          </a>
                          <a class="btn btn-tool w-1001 for_modal_delete" type="button" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $podcategory->title }}" data-kol="{{$podcategory->kupit_count}}" data-price="{{ $podcategory->price / 100 }}" data-id2="{{route('moderator_kursy_destroy', $podcategory['id'])}}">
                            <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Удалить">
                              <i class="fas fa-trash"></i>
                            </span>
                          </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="collapse" id="collapse{{$loop->iteration}}">
                <div class="card-body pt-0 mt-3 pl-2 pr-2 pb-0 border-top">
                  <form method="POST" action="{{route('moderator_kursy_update_contact1', $podcategory['id'])}}">
                  @csrf
                  @method('PUT')
                    <div class="row align-items-center">
                      <div class="col border-right">
                        <div class="row">
                          <div class="col pt-3 pl-2 pr-2 pb-2 hover11">
                            <p class="text-center">Контакт </p>
                            <div class="row align-items-center">
                              <div class="col-md-4 mt-2 text-center">
                                <div class="form-group mb-0 required align-items-top">
                                  <div class="row align-items-end hover1">
                                    <div class="col-auto pr-0">
                                      <p class="form-control form-control-border color1 color11 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fas fa-phone-alt pr-3" style="color: green;"></i> +996</p>
                                    </div>
                                    <div class="col pl-0">
                                      <input name="phone_for_zvonok" value="{{ $podcategory->phone_for_zvonok }}" type="text" class="form-control color1 form-control-border color11 pr-1 pl-1 pt-2 pb-1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999" style="max-width: 100px;">
                                      <div class="invalid-tooltip">Телефон номериңизди жазыңыз!</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 mt-2 text-center">
                                <div class="form-group mb-0 required align-items-top">
                                  <div class="row align-items-end hover1">
                                    <div class="col-auto pr-0">
                                      <p class="form-control form-control-border color1 color11 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-whatsapp pr-3" style="color: green; font-size: 20px;"></i> +996</p>
                                    </div>
                                    <div class="col pl-0">
                                      <input name="phone_for_whatsapp" value="{{ $podcategory->phone_for_whatsapp }}" type="text" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-1 color1 color11" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999" style="max-width: 100px;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 mt-2 text-center">
                                <div class="form-group mb-0 required align-items-top">
                                  <div class="row align-items-end hover1">
                                    <div class="col-auto pr-0">
                                      <p class="form-control form-control-border color11 color1 pr-0 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-telegram-plane pr-3" style="color: green;"></i> https://t.me/</p>
                                    </div>
                                    <div class="col pl-0">
                                      <input name="telegram" value="{{ $podcategory->telegram }}" id="for_telefram_input" type="text" class="form-control form-control-border pr-1 pl-0 pt-2 pb-1 color1 color11" placeholder="nonsi_kg">
                                      <div class="invalid-tooltip">Толтуруңуз, болбосо өчүрүңүз!</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="col hover11 pt-3 pl-2 pr-2 pb-2 border-top">
                            <p class="text-center">Модуль</p>
                            <div class="row align-items-center">
                              <div class="col-md-4 ">
                                <div class="row align-items-bottom">
                                  <div class="col-auto">
                                    <div class="user-block">
                                      <span class="pl-1 pr-1">Модулдардын саны:</span>
                                    </div>
                                  </div>
                                  <div class="col pr-0 pl-0">
                                    <hr>
                                  </div>
                                  <div class="col-auto text-center">
                                    <div class="form-group mb-0 required align-items-top">
                                      <div class="row align-items-center">
                                        <div class="col pl-0">
                                          <div class="number border" style="border-radius: 4px">
                                            <i class="fal fa-minus number-minus pt-2" onclick="this.nextElementSibling.stepDown()"></i>
                                            <input name="col_modulei" type="number" class="form-control form-control-border color1 color11" min="1" max="15" value="{{$podcategory->col_modulei}}" readonly style="background: none;">
                                            <i class="fal fa-plus number-plus pt-2" onclick="this.previousElementSibling.stepUp()"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-8 border-left">
                                <div class="row align-items-center">
                                  <div class="col-md-4 mt-2">
                                    <div class="user-block">
                                      <span class="pl-1 pr-1">Өтүү ыкмасы:</span>
                                      <span class="description ml-0 pl-1 pr-1"><small>(Акылуу курстарда гана иштейт)</small></span>
                                    </div>
                                  </div>
                                  <div class="col-md-8 mt-2">
                                    <div class="form-group">
                                      <select name="otuu_ykmasy" class="form-control form-control-border color1 color11 form-control-sm">
                                          <option value="0" @if($podcategory->otuu_ykmasy == 0) selected="" @endif>Бардык модулдар автоматтык түрдө ачылат</option>
                                          <option value="1" @if($podcategory->otuu_ykmasy == 1) selected="" @endif>Бардык модулдар автордун уруксаты менен ачылат</option>
                                          <option value="2" @if($podcategory->otuu_ykmasy == 2) selected="" @endif>1-модуль автоматтык түрдө, ал эми калганы автордун уруксаты менен ачылат</option>
                                          <!--<option value="3" @if($podcategory->otuu_ykmasy == 3) selected="" @endif>1-модуль автоматтык түрдө, ал эми калганы проценттик чектен ашканда ачылат</option>-->
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-auto">
                        <button type="submit" class="btn btn-outline-info btn-sm pt-1 pb-1 mt-2 mb-2 float-right">Сактоо <i class="far fa-arrow-right pl-2 pt-1"></i></button>
                      </div>
                    </div>
                  </form>                  
                </div>
              </div>
            </div>
          @endforeach
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема <span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-0">Цена <span class="float-right"><span class="var_title6"></span> <span>сом</span></span></p><hr class="mt-1">
                      <p class="mb-0">Количество продаж <span class="float-right var_title2"></span></p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Нет, не удалять</button>
                        <form method="POST" id="delet"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fas fa-trash"></i> Да, удалить
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