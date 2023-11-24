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
.form-control-border {
    outline: 0; width: 100%;
    resize: none;
    border-bottom: none;
}
.form-control-border:hover {
    background: #f8f9fa;
    outline: 0; width: 100%;
    resize: none;
    border-bottom: none;
}
.hover1:hover {
    background: #f8f9fa;
}
.hover1:hover .color1{
    background: #f8f9fa;
}
.hover1:hover .for_date_input{
    background: #f8f9fa;
}

.hover1 .for_date_input{
    background: white;
}



.form-control-border:focus {
  background: #f8f9fa;
  outline: 0; width: 100%;
  resize: none;
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


    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid"  id="accordion">
          <div class="row align-items-center mb-3 pt-2">
            <div class="col" >
              <h5 class="pt-2 mb-2">Список туров<span data-bs-toggle="tooltip" data-bs-placement="right" title="Количество уроков"> ({{count($olimpiada_tury)}})</span></h5>
            </div>
            <div class="col-auto" >
              @if(count($olimpiada_tury) <= 5)
              <a class="btn btn-sm btn-success float-right text-nowrap" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить товар" href="{{ route('moderator_olimpiada_tury_create', $olimpiada01['id'])}}">
                  <i class="fas fa-plus"></i> Добавить
              </a>
              @endif
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
          <div class="row align-items-top pt-3">
            <div class="col">
              <section class="connectedSortable">          

              @if(count($olimpiada_tury) > 0)
              <div class="row align-items-center">
                <div class="col">
                  <hr class="mt-1 mb-3">
                </div>
                <div class="col-auto">
                  <p class="mt-1 mb-3 text-muted"><b>Ачык турлар</b></p>
                </div>
                <div class="col">
                  <hr class="mt-1 mb-3">
                </div>
              </div>
              @endif

              @foreach ($olimpiada_tury as $olimpiada)
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
                            <h5 class="card-title"><b>{{$olimpiada->tur_number}}-тур.</b> {{$olimpiada->title}}</h5>
                            <p class="card-text mb-0">
                            </p>
                          </div>
                        
                        <div class="row mr-0 ml-0 pb-1 align-items-center remove_panel"> 
                          <div class="col for_num_id1">
                            <div class="row  align-items-center">
                              <div class="col">
                              </div>
                              <div class="col-auto text-center dropup">
                                    <a class="" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="15,5">
                                    @if (intval($olimpiada->status) == 0)
                                    <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                        <span class="badge">жабык</span>
                                    </small></p>
                                      @else
                                      <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                        <small class="badge badge-success"><i class="fas fa-check"></i> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ачык</font></font></small>
                                      </small></p>
                                    @endif
                                    </a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                    <p class="h3 dropdown-item-title text-center pt-2 pb-2">Статус тура</p>
                                    <div class="dropdown-divider mb-0 mt-0"></div>
                                    <form method="POST" action="{{ route('moderator_olimpiada_tury_update_status1', ['olimpiada_tury_id'=>$olimpiada->id]) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Ачык
                                              <span class="float-right text-sm">@if (intval($olimpiada->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                            </h3>
                                
                                          </div>
                                        </div>
                                      </button>
                                    </form> 
                                    <div class="dropdown-divider  mb-0 mt-0"></div>

                                    <form method="POST" action="{{ route('moderator_olimpiada_tury_update_status2', ['olimpiada_tury_id'=>$olimpiada->id]) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status2" min="0" max="1" maxlength="1" class="form-control" value="0" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Жабык
                                              <span class="float-right text-sm">@if (intval($olimpiada->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
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


                          
                          <div class="col-auto tools2 for_num_id1"> 
                                <a class="btn btn-tool" href="{{ route('moderator_olimpiada_tury_class', ['olimpiada_id'=>$olimpiada01->id, 'olimpiada_tury_id'=>$olimpiada->id]) }}">
                                  <span style="font-size: 1.2em;" title="Классы">
                                    <i class="fas fa-users"></i>
                                  </span>
                                </a>
                          </div> 
                          <div class="col-auto tools2 for_num_id1"> 
                                <a class="btn btn-tool" href="{{ route('moderator_olimpiada_tury_edit', ['olimpiada_id'=>$olimpiada01->id, 'olimpiada_tury_id'=>$olimpiada->id]) }}">
                                  <span style="font-size: 1.2em;" title="Редактировать">
                                    <i class="far fa-edit" style="transform: scale(-1, 1);"></i>
                                  </span>
                                </a>
                          </div>
                          <!--
                          <div class="col-auto tools2 for_num_id1">
                                <a class="btn btn-tool w-1001 for_modal_delete" type="button" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $olimpiada->title }}" data-kol="{{$olimpiada->id}}" data-price="@if (intval($olimpiada->status) == 0)Бесплатный@elseПлатный@endif" data-id2="{{route('moderator_kurs_urok_destroy', ['podid'=>$olimpiada->id, 'id'=>$olimpiada->id])}}">
                                  <span style="font-size: 1.2em;" title="Удалить">
                                    <i class="fas fa-trash"></i>
                                  </span>
                                </a>
                          </div>-->
                        </div>
                    </div>
                  </div>
                </div>
              @endforeach

              @if(count($olimpiada_tury2) > 0)
              <div class="row align-items-center">
                <div class="col">
                  <hr class="mt-5 mb-3">
                </div>
                <div class="col-auto">
                  <p class="mt-5 mb-3 text-muted"><b>Жабык турлар</b></p>
                </div>
                <div class="col">
                  <hr class="mt-5 mb-3">
                </div>
              </div>
              @endif
              
              @foreach ($olimpiada_tury2 as $olimpiada)
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
                            <h5 class="card-title"><b>X-тур.</b> {{$olimpiada->title}}</h5>
                            <p class="card-text mb-0"><small class="text-muted">Башталышы: {{date('d.m.Y', $olimpiada->nachalo_zdachi_tura)}} ({{date('H:i', $olimpiada->nachalo_zdachi_tura)}})</small></p>
                          </div>
                        
                        <div class="row mr-0 ml-0 pb-1 align-items-center remove_panel"> 
                          <div class="col for_num_id1">
                            <div class="row  align-items-center">
                              <div class="col">
                              </div>
                              <div class="col-auto text-center dropup">
                                    <a class="" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="15,5">
                                    @if (intval($olimpiada->status) == 0)
                                    <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                        <span class="badge">жабык</span>
                                    </small></p>
                                      @else
                                      <p class="card-text pb-1"><small class="text-muted"><span style="word-spacing: 5px;">Статус: </span>
                                        <small class="badge badge-success"><i class="fas fa-check"></i> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ачык</font></font></small>
                                      </small></p>
                                    @endif
                                    </a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                    <p class="h3 dropdown-item-title text-center pt-2 pb-2">Статус тура</p>
                                    <div class="dropdown-divider mb-0 mt-0"></div>
                                    <form method="POST" action="{{ route('moderator_olimpiada_tury_update_status1', ['olimpiada_tury_id'=>$olimpiada->id]) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status" min="0" max="1" maxlength="1" class="form-control" value="1" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Ачык
                                              <span class="float-right text-sm">@if (intval($olimpiada->status) == 1)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
                                            </h3>
                                
                                          </div>
                                        </div>
                                      </button>
                                    </form> 
                                    <div class="dropdown-divider  mb-0 mt-0"></div>

                                    <form method="POST" action="{{ route('moderator_olimpiada_tury_update_status2', ['olimpiada_tury_id'=>$olimpiada->id]) }}">
                                    @csrf
                                    @method('PUT')
                                      <input type="number" name="status2" min="0" max="1" maxlength="1" class="form-control" value="0" hidden="">
                                      <button type="submit"  class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              Жабык
                                              <span class="float-right text-sm">@if (intval($olimpiada->status) == 0)<i class="far fa-check-square" style="font-size: 20px; color: #28a745;"></i>@else<i class="far fa-square" style="font-size: 20px; color: #28a745;"></i>@endif</span>
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


                          
                          @if($olimpiada->dostup == 0)
                          <div class="col-auto tools2 for_num_id1"> 
                                <a class="btn btn-tool" href="{{ route('moderator_kurs_urok_zadanie_create', ['kurs_id'=>$olimpiada->id, 'urok_id'=>$olimpiada->id]) }}">
                                  <span style="font-size: 1.2em;" title="Задание">
                                    <i class="fas fa-users"></i>
                                  </span>
                                </a>
                          </div>
                          @else
                          <div class="col-auto tools2 for_num_id1 dropup">
                            <a class="btn btn-tool" role="button" data-toggle="dropdown" id="dropdownMenuOffset{{$loop->iteration}}" type="button"  data-offset="120,0">
                              <span style="font-size: 1.2em;" title="Задание">
                                <i class="fas fa-users" style="color: #28a745;"></i>
                              </span>
                            </a>
                            <!-- dropdown-menu -->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0 keep_open">
                              <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Задание</p>
                              <div class="dropdown-divider mb-0 mt-0"></div>
                              <a class="dropdown-item" href="{{ route('moderator_kurs_urok_zadanie_edit', ['kurs_id'=>$olimpiada->id, 'urok_id'=>$olimpiada->id]) }}">
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
                              <a class="dropdown-item w-100111 for_modal_delete2" type="button" data-toggle="modal" data-target="#staticBackdrop2" data-title="{{ $olimpiada->title }}" data-id2="{{route('moderator_kurs_urok_zadanie_destroy', ['id'=>$olimpiada->id])}}">
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
                                <div class="col-auto tools2 for_num_id1 dropup">
                                  <a class="btn btn-tool" role="button" data-toggle="dropdown" id="dropdownMenuOffset22{{$loop->iteration}}" type="button"  data-offset="120,0">
                                    <span style="font-size: 1.2em;" title="Тест">
                                        <i class="fas fa-spell-check" @if($olimpiada->test_id != null) style="color: #28a745;" @endif></i>
                                      </span>
                                  </a>
                                  <!-- dropdown-menu -->
                                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pt-0 pb-0 keep_open">
                                    <p class="h3 dropdown-item-title text-center pt-2 pb-2 pr-2 pl-2">Тест: 
                                      <small>
                                        @if($olimpiada->test_id != null)
                                          {{$olimpiada->title}}
                                        @else
                                          жок
                                        @endif
                                      </small> 
                                    </p>

                                    <div class="dropdown-divider mb-0 mt-0"></div>
                                    @if($olimpiada->test_id == null)
                                      <a class="dropdown-item" href="{{ route('moderator_kurs_urok_tests_create', ['kurs_id'=>$olimpiada->id, 'urok_id'=>$olimpiada->id]) }}">
                                    @else
                                      @if($olimpiada->test_id == null)
                                        <a class="dropdown-item" href="{{ route('moderator_kurs_urok_tests_edit', ['kurs_id'=>$olimpiada->id, 'urok_id'=>$olimpiada->id]) }}">
                                      @else
                                        <a class="dropdown-item for_modal_delete4" type="button" data-toggle="modal" data-target="#staticBackdrop4" data-title="{{ $olimpiada->title }}" data-id2="{{route('moderator_olimpiada_tury_tests_vybrate', ['olimpiada_tury_id'=>$olimpiada->id])}}">
                                      @endif
                                    @endif
                                      <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              <div class="row">
                                                @if($olimpiada->test_id == null)
                                                <div class="col">Создать</div>
                                                <div class="col-auto"><i class="fas fa-plus btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                @else
                                                  @if($olimpiada->test_id == null)
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
                                    @if($olimpiada->test_id == null)
                                      <a class="dropdown-item for_modal_delete4" type="button" data-toggle="modal" data-target="#staticBackdrop4" data-title="{{ $olimpiada->title }}" data-id2="{{route('moderator_olimpiada_tury_tests_vybrate', ['olimpiada_tury_id'=>$olimpiada->id])}}">
                                    @else
                                      @if($olimpiada->test_id == null)
                                        <a class="dropdown-item w-100111 for_modal_delete3" type="button" data-toggle="modal" data-target="#staticBackdrop3" data-title="{{ $olimpiada->title }}" data-id2="{{route('moderator_kurs_urok_tests_destroy', ['kurs_id'=>$olimpiada->id, 'urok_id'=>$olimpiada->id, 'test_id'=>$olimpiada->id])}}">
                                      @else
                                        <a class="dropdown-item for_modal_delete5" type="button" data-toggle="modal" data-target="#staticBackdrop5" data-title="{{ $olimpiada->title }}" data-title55="{{ $olimpiada->title }}" data-id2="{{route('moderator_olimpiada_tury_tests_izyat', ['olimpiada_tury_id'=>$olimpiada->id])}}">
                                      @endif
                                    @endif
                                      <div class="media">
                                          <div class="media-body">
                                            <h3 class="dropdown-item-title pt-2 pb-2">
                                              <div class="row">
                                                @if($olimpiada->test_id == null)
                                                  <div class="col">Выбрать</div>
                                                  <div class="col-auto"><i class="fas fa-angle-left btn btn-tool pb-2" style="font-size: 15px;"></i></div>
                                                @else
                                                  @if($olimpiada->test_id == null)
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
                                <a class="btn btn-tool" href="{{ route('moderator_olimpiada_tury_edit', ['olimpiada_id'=>$olimpiada01->id, 'olimpiada_tury_id'=>$olimpiada->id]) }}">
                                  <span style="font-size: 1.2em;" title="Редактировать">
                                    <i class="far fa-edit" style="transform: scale(-1, 1);"></i>
                                  </span>
                                </a>
                          </div>
                          <!--
                          <div class="col-auto tools2 for_num_id1">
                                <a class="btn btn-tool w-1001 for_modal_delete" type="button" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $olimpiada->title }}" data-kol="{{$olimpiada->id}}" data-price="@if (intval($olimpiada->status) == 0)Бесплатный@elseПлатный@endif" data-id2="{{route('moderator_kurs_urok_destroy', ['podid'=>$olimpiada->id, 'id'=>$olimpiada->id])}}">
                                  <span style="font-size: 1.2em;" title="Удалить">
                                    <i class="fas fa-trash"></i>
                                  </span>
                                </a>
                          </div>-->
                        </div>
                    </div>
                  </div>
                </div>
              @endforeach
              </section>
            </div>
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
                          <a id="delet115" href="" type="button" class="btn btn-info btn-sm">
                            <i class="fas fa-trash"></i> Да, изъять
                          </a>                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
@foreach ($olimpiada_tury as $olimpiada)
$('#customSwitch2{{$loop->iteration}}').click(function() {
  document.getElementById("form{{$olimpiada->id}}").submit()
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

$('.for_button_izmenit').click(function() {
  $('.remove_panel').remove();
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
      $("#delet115").attr('href', id2);

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