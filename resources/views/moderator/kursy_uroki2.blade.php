@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
  .todo-list2 .for_ico{
    will-change: transform;
    transition: transform 400ms;
  }
  .todo-list2:hover .for_ico {
    transition: transform 300ms;
      transform: translateX(2px);
      color: #28a745;
  }
  .two2{
    will-change: transform;
    transition: transform 400ms;
  }
  .two2:hover {
    transition: transform 300ms;
      background-color: #f4f6f9;
  }

@media (max-width: 768px) {
  .knopka_numerasi {
    display: none;
  }
}


.for_num1 {
  display: none;
}

.for_num2 {
  display: inline-block;
}

.card-header22{
  cursor: move;
}
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-wrapper" style="margin-left: 0px;">
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid"  id="accordion">
            <form method="POST" action="{{ route('moderator_kurs_uroki_num_update', $podcategory->id) }}">
            @csrf
            @method('PUT')
          <div class="row align-items-center mb-3 pt-2">
            <div class="col" >
              <h5 class="pt-2 mb-2">Курс: {{$podcategory->title}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Количество уроков">({{$kol}})</span></h5>
            </div>
            <div class="col-auto for_num1 for_num_id1">
              <p style="display: none;"></p>
              <button class="btn btn-sm btn-default float-right text-nowrap" type="submit">
                  Сохранить изменения
              </button>
            </div>
            <div class="col-auto knopka_numerasi">
              <p style="display: none;"></p>
              <a class="btn btn-sm btn-default float-right text-nowrap for_button_izmenit" type="button"  onclick="changeClass()">
                  Изменить порядок
              </a>
            </div>
            <div class="col-auto" >
              <a class="btn btn-sm btn-success float-right text-nowrap" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить урок" href="{{ route('moderator_kurs_urok_create', $podcategory['id'])}}">
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
          <div class="row align-items-top">
            <div class="col-auto for_num1" id="button_for_num">
              <section class="connectedSortable">  
              @foreach ($uroky as $urok)
              <div class="mb-3 ssd11">
                <span class="pr-2 pl-2">{{ $loop->iteration }}</span>
              </div>
              @endforeach
            </section>
            </div>
            <div class="col">
              <section class="connectedSortable">          
              @foreach ($uroky as $urok)
                <div class="card ssd12 mb-3 banner-message2 todo-list2">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto pr-3 pl-2 btn-tool for_num_id2">
                      <span class="for_ico for_num_id1" id="">
                        <i class="fas fa-project-diagram" style="font-size: 20px;"></i>
                      </span>
                      <span class="for_ico for_num1 for_num_id1" id="">
                        <i class="fas fa-grip-vertical" style="font-size: 20px;"></i>
                      </span>
                      
                    </div>
                    <div class="col">
                        
                          <div class="card-body pr-2 pl-2 pt-3 pb-1">
                            <input type="number" name="id_uroka[]" value="{{$urok->id}}" hidden="">
                            <h5 class="card-title">{{$urok->title}}</h5>
                            <p class="card-text mb-0"><small class="text-muted">Количество видеофайлов: {{$urok->youtube_ssylke_count + $urok->video_name_count}} @if($urok->ssylka != null) / <a class="btn btn-tool" href="{{ route('moderator_kurs_urok_material_download', $urok->ssylka) }}">
                              <span style="font-size: 0.8em;" title="Материал для скачивания">
                                <i class="fas fa-download pb-2"></i>
                              </span>
                            </a>@endif</small>
                            <span class="float-right  tools2 for_num_id1 remove_panel">
                              <a class="d-block w-100 btn btn-tool collapsed" data-toggle="collapse" href="#collapse{{$loop->iteration}}" aria-expanded="false">
                                <span style="font-size: 1.2em;" title="Настройки">
                                  <i class="fal fa-cog"></i>
                                </span>
                              </a>
                            </span>
                            </p>
                          </div>
                        
                        <div class="row mr-0 ml-0 pb-1 align-items-center remove_panel"> 
                          <div class="col for_num_id1">
                            <div class="row  align-items-center">
                              <div class="col">
                              </div>
                              <div class="col-auto text-center dropup">
                                    <a class="" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="15,5">
                                    @if (intval($urok->status) == 0)
                                    <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                        <span class="badge">бесплатный</span>
                                    </small></p>
                                      @else
                                      <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                        <small class="badge badge-success"><i class="fas fa-check"></i> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">платный</font></font></small>
                                      </small></p>
                                    @endif
                                    </a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                    <p class="h3 dropdown-item-title text-center pt-2 pb-2">Статус урока</p>
                                    <div class="dropdown-divider mb-0 mt-0"></div>
                                    <form method="POST" action="{{ route('moderator_kurs_urok_update_status1', ['podcat_id'=>$podcategory->id, 'id'=>$urok->id]) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Платный
                                              <span class="float-right text-sm">@if (intval($urok->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                            </h3>
                                
                                          </div>
                                        </div>
                                      </button>
                                    </form> 
                                    <div class="dropdown-divider  mb-0 mt-0"></div>

                                    <form method="POST" action="{{ route('moderator_kurs_urok_update_status2', ['podcat_id'=>$podcategory->id, 'id'=>$urok->id]) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status2" min="0" max="1" maxlength="1" class="form-control" value="0" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Бесплатный
                                              <span class="float-right text-sm">@if (intval($urok->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
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
                          <?php
                              $zad = $zadanie->where('urok_id', $urok->id)->first();
                          ?>

                          @if($zadanie->where('urok_id', $urok->id)->first() == null)
                          <div class="col-auto tools2 for_num_id1"> 
                                <a class="btn btn-tool" href="{{ route('moderator_kurs_urok_zadanie_create', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id]) }}">
                                  <span style="font-size: 1.2em;" title="Задание">
                                    <i class="far fa-question-circle"></i>
                                  </span>
                                </a>
                          </div>
                          @else
                          <div class="col-auto tools2 for_num_id1 dropup">
                            <a class="btn btn-tool" role="button" data-toggle="dropdown" id="dropdownMenuOffset{{$loop->iteration}}" type="button"  data-offset="120,0">
                              <span style="font-size: 1.2em;" title="Задание">
                                <i class="far fa-question-circle" style="color: #28a745;"></i>
                              </span>
                            </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0 keep_open">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Задание</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <a class="dropdown-item" href="{{ route('moderator_kurs_urok_zadanie_edit', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id]) }}">
                                <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        <div class="row">
                                          <div class="col">
                                            Редактировать
                                          </div>
                                          <div class="col-auto">
                                            <i class="far fa-edit btn btn-tool pb-2" style="font-size: 15px;"></i>
                                          </div>
                                        </div>
                                      </h3>
                                    </div>
                                  </div>
                              </a>
                              <div class="dropdown-divider  mb-0 mt-0"></div>
                              <a class="dropdown-item w-100111 for_modal_delete2" type="button" data-toggle="modal" data-target="#staticBackdrop2" data-title="{{ $urok->title }}" data-id2="{{route('moderator_kurs_urok_zadanie_destroy', ['id'=>$zad->id])}}">
                                <div class="media">
                                    <div class="media-body">
                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                        <div class="row">
                                          <div class="col">
                                            Удалить
                                          </div>
                                          <div class="col-auto">
                                            <i class="fas fa-trash btn btn-tool pb-2" style="font-size: 15px;"></i>
                                          </div>
                                        </div>
                                      </h3>
                                    </div>
                                  </div>
                              </a>
                            </div>
                            <!-- dropdown-menu -->
                          </div>
                          @endif

                          <div class="col-auto tools2 for_num_id1">
                                <?php
                                    $test1 = $test->where('id', $urok->test_id)->first();
                                ?>
                                <div class="col-auto tools2 for_num_id1 dropup">
                                  <a class="btn btn-tool" role="button" data-toggle="dropdown" id="dropdownMenuOffset22{{$loop->iteration}}" type="button"  data-offset="120,0">
                                    <span style="font-size: 1.2em;" title="Тест">
                                        <i class="fas fa-spell-check" @if($urok->test_id != null) style="color: #28a745;" @endif></i>
                                      </span>
                                  </a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0 keep_open">
                                    <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Тест: <br>@if($urok->test_id != null)
                                      <small class="">{{$test1->title}}</small>
                                    @endif</p>

                                    <div class="dropdown-divider mb-0 mt-0"></div>
                                    @if($urok->test_id == null)
                                      <a class="dropdown-item" href="{{ route('moderator_kurs_urok_tests_create', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id]) }}">
                                    @else
                                      @if($test1->test_category_id == null)
                                        <a class="dropdown-item" href="{{ route('moderator_kurs_urok_tests_edit', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id]) }}">
                                      @else
                                        <a class="dropdown-item for_modal_delete4" type="button" data-toggle="modal" data-target="#staticBackdrop4" data-title="{{ $urok->title }}" data-id2="{{route('moderator_kurs_urok_tests_vybrate', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id])}}">
                                      @endif
                                    @endif
                                      <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              <div class="row">
                                                @if($urok->test_id == null)
                                                <div class="col">Создать</div>
                                                <div class="col-auto"><i class="fas fa-plus btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                @else
                                                  @if($test1->test_category_id == null)
                                                    <div class="col">Редактировать</div>
                                                    <div class="col-auto"><i class="far fa-edit btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                  @else
                                                    <div class="col">Изменить</div>
                                                    <div class="col-auto"><i class="fas fa-angle-left btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                  @endif
                                                @endif
                                              </div>
                                            </h3>
                                          </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider  mb-0 mt-0"></div>
                                    @if($urok->test_id == null)
                                      <a class="dropdown-item for_modal_delete4" type="button" data-toggle="modal" data-target="#staticBackdrop4" data-title="{{ $urok->title }}" data-id2="{{route('moderator_kurs_urok_tests_vybrate', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id])}}">
                                    @else
                                      @if($test1->test_category_id == null)
                                        <a class="dropdown-item w-100111 for_modal_delete3" type="button" data-toggle="modal" data-target="#staticBackdrop3" data-title="{{ $test1->title }}" data-id2="{{route('moderator_kurs_urok_tests_destroy', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id, 'test_id'=>$test1->id])}}">
                                      @else
                                        <a class="dropdown-item for_modal_delete5" type="button" data-toggle="modal" data-target="#staticBackdrop5" data-title="{{ $urok->title }}" data-title55="{{ $test1->title }}" data-id2="{{route('moderator_kurs_urok_tests_izyat', ['kurs_id'=>$podcategory->id, 'urok_id'=>$urok->id])}}">
                                      @endif
                                    @endif
                                      <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              <div class="row">
                                                @if($urok->test_id == null)
                                                  <div class="col">Выбрать</div>
                                                  <div class="col-auto"><i class="fas fa-angle-left btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                @else
                                                  @if($test1->test_category_id == null)
                                                    <div class="col">Удалить</div>
                                                    <div class="col-auto"><i class="fas fa-trash btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                  @else
                                                    <div class="col">Изъять</div>
                                                    <div class="col-auto"><i class="fas fa-exchange-alt btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                  @endif
                                                @endif
                                              </div>
                                            </h3>
                                          </div>
                                        </div>
                                    </a>
                                  </div>
                                  <!-- dropdown-menu -->
                                </div>
                                




                          </div>   
                          <div class="col-auto tools2 for_num_id1"> 
                                <a class="btn btn-tool" href="{{ route('moderator_kurs_urok_edit', ['podcat_id'=>$podcategory->id, 'id'=>$urok->id]) }}">
                                  <span style="font-size: 1.2em;" title="Редактировать">
                                    <i class="far fa-edit" style="transform: scale(-1, 1);"></i>
                                  </span>
                                </a>
                          </div>
                          <div class="col-auto tools2 for_num_id1">
                                <a class="btn btn-tool w-1001 for_modal_delete" type="button" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $urok->title }}" data-kol="{{$urok->youtube_ssylke_count + $urok->video_name_count}}" data-price="@if (intval($urok->status) == 0)Бесплатный@elseПлатный@endif" data-id2="{{route('moderator_kurs_urok_destroy', ['podid'=>$podcategory->id, 'id'=>$urok->id])}}">
                                  <span style="font-size: 1.2em;" title="Удалить">
                                    <i class="fas fa-trash"></i>
                                  </span>
                                </a>
                          </div>
                        </div>
                    </div>
                  </div>

                  <div id="collapse{{$loop->iteration}}" class="collapse tools2 for_num_id1 remove_panel" style="">
                    
                      <div class="card-body pt-0 pl-2 pr-2 pb-2">
                        <div class="row align-items-center pl-2 pr-2">
                          <div class="col-md-4 border">
                            <div class="row align-items-center">
                              <div class="col">
                                <div class="user-block">
                                  <span class="pl-1 pr-1"><small>Youtube плеер</small></span>
                                  <span class="description ml-0 pl-1 pr-1"><small>(оригинальный плеер видеохостинга Youtube)</small></span>
                                </div>
                              </div>
                              <div class="col-auto">
                                <div class="form-group mb-0">
                                  <div class="custom-control custom-switch block23">
                                    @if($urok->youtube_control_status == 0)
                                      <a style="display: block;" href="javascript:void(0)"></a>
                                    @else
                                      <a style="display: block;" href="{{route('moderator_kurs_urok_youtube_control_status', ['urok_id'=>$urok->id, 'type'=>'0'])}}"></a>
                                    @endif
                                    <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$loop->iteration}}" class="custom-control-input" id="customSwitch0{{$loop->iteration}}" style="cursor: pointer;" @if($urok->youtube_control_status == 0) checked="" @endif>
                                    <label class="custom-control-label"  style="cursor: pointer;" for="customSwitch0{{$loop->iteration}}" data-id="{{$urok->id}}"></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 border">
                            <div class="row align-items-center">
                              <div class="col">
                                <div class="user-block">
                                  <span class="pl-1 pr-1"><small>Плеер сайта</small></span>
                                  <span class="description ml-0 pl-1 pr-1"><small>(показывает логотип ютуба)</small></span>
                                </div>
                              </div>
                              <div class="col-auto">
                                <div class="form-group mb-0">
                                  <div class="custom-control custom-switch block23">
                                    @if($urok->youtube_control_status == 1)
                                      <a style="display: block;" href="javascript:void(0)"></a>
                                    @else
                                      <a style="display: block;" href="{{route('moderator_kurs_urok_youtube_control_status', ['urok_id'=>$urok->id, 'type'=>'1'])}}"></a>
                                    @endif
                                    <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$loop->iteration}}" class="custom-control-input" id="customSwitch1{{$loop->iteration}}" style="cursor: pointer;" @if($urok->youtube_control_status == 1) checked="" @endif>
                                    <label class="custom-control-label"  style="cursor: pointer;" for="customSwitch1{{$loop->iteration}}" data-id="{{$urok->id}}"></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 border">
                            <div class="row align-items-center">
                              <div class="col">
                                <div class="user-block">
                                  <span class="pl-1 pr-1"><small>Плеер сайта</small></span>
                                  <span class="description ml-0 pl-1 pr-1"><small>(скрывает логотип ютуба, но обрезает с двух сторон)</small></span>
                                </div>
                              </div>
                              <div class="col-auto">
                                <div class="form-group mb-0">
                                  <div class="custom-control custom-switch block23">
                                    @if($urok->youtube_control_status == 2)
                                      <a style="display: block;" href="javascript:void(0)"></a>
                                    @else
                                      <a style="display: block;" href="{{route('moderator_kurs_urok_youtube_control_status', ['urok_id'=>$urok->id, 'type'=>'2'])}}"></a>
                                    @endif
                                    <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$loop->iteration}}" class="custom-control-input" id="customSwitch2{{$loop->iteration}}" style="cursor: pointer;" @if($urok->youtube_control_status == 2) checked="" @endif>
                                    <label class="custom-control-label"  style="cursor: pointer;" for="customSwitch2{{$loop->iteration}}" data-id="{{$urok->id}}"></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          
                      </div>
                  </div>
                </div>
              @endforeach
              </section>
            </div>
          </div>
          </form>
          </div>
        </div><!-- /.container-fluid -->
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
                      <p class="mb-0 pt-1">Тема урока<span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-0">Статус урока <span class="float-right"><span class="var_title6"></span></span></p><hr class="mt-1">
                      <p class="mb-0">Количество видеофайлов <span class="float-right var_title2"></span></p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Нет, не удалять</button>
                        <form method="POST" id="delet"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Да, удалить
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop2" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема урока<span class="float-right var_title11"></span></p><hr class="mt-1">
                      <p class="mb-0">Действительно хотите удалить задание для этого урока? </p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Нет, не удалять</button>
                        <form method="POST" id="delet11"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Да, удалить
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop3" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема теста<span class="float-right var_title113"></span></p><hr class="mt-1">
                      <p class="mb-0">Действительно хотите удалить тест для этого урока? </p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Нет, не удалять</button>
                        <form method="POST" id="delet113"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Да, удалить
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="staticBackdrop4" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h5 class="modal-title var_title114" id="staticBackdropLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" id="delet114"  style="display: inline-block;" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-0">

                      <div class="table-responsive p-0">
                        <table class="table table-hover text-nowrap mb-0">
                          <tbody>
                            @foreach ($test as $test)
                            <tr>
                              <td width="25px">
                                <div class="icheck-primary d-inline ml-2">
                                  <input type="radio" value="{{$test->id}}" name="test_id" id="todoCheck{{$loop->iteration}}">
                                  <label for="todoCheck{{$loop->iteration}}"></label>
                                </div></td>
                              <td>{{$test->title}}</td>
                            </tr>
                            @endforeach 
                          </tbody>
                        </table>
                      </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-sm btn-default m-0 pt-1 pb-1 pl-4 pr-4">
                        <i class="fas fa-check pr-2"></i> Выбрать
                      </button>               
                    </div>
                    </form> 
                </div>
            </div>
        </div>


        <div class="modal fade" id="staticBackdrop5" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема урока<span class="float-right var_title115"></span></p><hr class="mt-1">
                      <p class="mb-0">Действительно хотите изъять тест <b><span class="var_title1155"></span></b> из этого урока? </p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Отменить</button>
                        <form method="POST" id="delet115"  style="display: inline-block;" action="">
                            @csrf
                            @method('PUT')
                              <button type="submit" class="btn btn-info btn-sm">
                            <i class="fas fa-trash"></i> Да, изъять
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

  var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});

@foreach ($uroky as $urok)    

$('input[name="checkbox_name_{{$loop->iteration}}"]').on('change', function() {
    $('input[name="checkbox_name_{{$loop->iteration}}"]').not(this).prop('checked', false);
});
@endforeach

//для определения порядка вывода уроков
function changeClass(){
     document.getElementById('button_for_num').classList.toggle('for_num2');
     $('.for_num_id1').toggleClass('for_num1');
     $('.for_num_id2').toggleClass('card-header22');
     $('.ssd11').height($('.ssd12').height());
  }

$('.for_button_izmenit').click(function() {
  $(this).hide().next().show().end().prev().addClass('on');
}).after('<a class="btn btn-sm btn-default float-right text-nowrap for_button_izmenit" type="button"  onClick="window.location.reload()">Отменить изменения</a>').next().hide().click(function() {
  $(this).hide().prev().show().prev().removeClass('on');
});    

$('.banner-message2').hover(
  function(){
  $('#for_hidden').show();
  $('.button2').hide();
  },
  function(){
  $('#for_hidden').hide();
  $('.button2').show();
  }
);
//для определения порядка вывода уроков


//для модального окна удаления
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

$(function() {
  $(".for_modal_delete2").click(
    function() {
      var title = $(this).attr('data-title');
      var id2 = $(this).attr('data-id2');


      $(".var_title11").text(title);
      $("#delet11").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});

$(function() {
  $(".for_modal_delete3").click(
    function() {
      var title = $(this).attr('data-title');
      var id2 = $(this).attr('data-id2');


      $(".var_title113").text(title);
      $("#delet113").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});

$(function() {
  $(".for_modal_delete4").click(
    function() {
      var title = $(this).attr('data-title');
      var id2 = $(this).attr('data-id2');


      $(".var_title114").text(title);
      $("#delet114").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});

$(function() {
  $(".for_modal_delete5").click(
    function() {
      var title = $(this).attr('data-title');
      var title55 = $(this).attr('data-title55');
      var id2 = $(this).attr('data-id2');


      $(".var_title115").text(title);
      $(".var_title1155").text(title55);
      $("#delet115").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});
//для модального окна удаления

//для высоты блоков нумерации
$('.ssd11').height($('.ssd12').height());
//для высоты блоков нумерации




$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>
@endsection