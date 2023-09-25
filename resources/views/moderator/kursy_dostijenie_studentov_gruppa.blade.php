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

.form-control-border:focus {
  background: none;
  outline: 0;
  resize: none;
}

.form-control-border {
  width: 100px;
  background: none;
    outline: 0;
    resize: none;
    border-bottom: none;
}
.form-control-border:hover {
    background: none;
    outline: 0;
    resize: none;
    border-bottom: none;
}


</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    

    <!-- Main content -->
    <section class="content" id="accordion">
          <div class="row align-items-center mb-1">
            <div class="col">
              <section class="content-header pl-0 pr-0 mb-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('moderator_panel')}}">
                            <i class="nav-icon fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('moderator_kurs_index')}}">Курс</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('moderator_kurs_dostijenie_studentov', ['kurs_id' => $podcategory->id, 'grup_number' => 0]) }}">{{$podcategory->title}} <span data-bs-toggle="tooltip" data-bs-placement="right" title="Бардык студенттер">(табло)</span></a>
                    </li>
                    <li class="breadcrumb-item active">Группалар</li>
                </ol>
              </section>
            </div>
            <div class="col-md-auto">
              <a class="btn btn-success btn-sm for_plus_code float-right" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus pr-2"></i> Группа</a>
            </div>
          </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h7><i class="icon fas fa-check"></i> {{ session('success') }}</h7>
                </div>
            @endif
            @if (session('success2'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h7><i class="icon fas fa-check"></i> {{ session('success2') }}</h7>
                </div>
            @endif
            
            
            <div class="content mb-2">
              <ul class="nav nav-pills">
                @for ($i = $podcategory->col_grup; $i >= 0; $i--)
                <li class="nav-item">
                    <a class="nav-link pt-1 pb-1 @if($i == 0) active @endif" href="#tab_{{$i}}" data-toggle="tab">{{$i}}-группа</a>
                </li>
                @endfor
                <li class="nav-item">
                    <a class="nav-link pt-1 pb-1" href="#tab_10000001" data-toggle="tab">Архив</a>
                </li>
              </ul>
            </div>
            
            
            <div class="tab-content pb-3">
              @for ($i = $podcategory->col_grup; $i >= 0; $i--)
              @php
                  $kktt = $kupits->where('grup_number', $i)->first();
              @endphp
              <div class="tab-pane @if($i == 0) active @endif" id="tab_{{$i}}">
                <form method="POST" action="{{route('moderator_kursy_dostijenie_studentov_perevod_gruppa', ['kurs_id' => $podcategory->id])}}">
                  @csrf
                  @method('PUT')
                <div class="table-responsive"  style="overflow-x: hidden;" width="100%">
                  <table class="table table-hover table-striped text-nowrap border mb-0" id="table_{{$i}}" width="100%">
                      <thead>
                          <tr>
                              <th class="align-middle" width="1px">
                                <div class="icheck-primary d-inline ml-0">
                                  <input type="checkbox" value="{{$i}}" name="test_id" id="todoCheck0{{$i}}" class="all" data-id="d{{$i}}">
                                  <label for="todoCheck0{{$i}}"></label>
                                </div>
                              </th>
                              <th class="">ФИО</th>
                              <th class="">Группа</th>
                          </tr>
                      </thead>
                      <tbody class="align-middle">
                        @foreach ($kupits->where('grup_number', $i) as $kupit)
                          <tr class="todo-list2">
                            <td class="align-middle block23">
                              <div class="icheck-primary d-inline ml-0">
                                <input type="checkbox" name="for_kupit_id[]" id="todoCheck{{$kupit->id}}" class="one" data-id="d{{$i}}" value="{{$kupit->id}}">
                                <label for="todoCheck{{$kupit->id}}"></label>
                                <input type="hidden" name="for_kupit_id[]" value="0">
                              </div>
                            </td>
                              <td class="align-middle pr-0" style="max-width: 250px;">
                                  <div class="user-block1">
                                      <span class="username1 ml-0 d-inline-block text-truncate truncate2" style="max-width: 250px;" title="{{$kupit->user->name}}">{{$loop->iteration}}.
                                          @if($kupit->user->f_fio != null)
                                              <span>{{$kupit->user->f_fio}} {{$kupit->user->i_fio}} {{$kupit->user->o_fio}}</span>
                                          @else
                                              <span>{{$kupit->user->name}}</span>
                                          @endif
                                      </span>
                                      <span class="description1 ml-0 truncate2" style="max-width: 250px;">{{$kupit['created_at']->format('d.m.Y (H:i)')}}</span>
                                  </div>
                              </td>
                              
                              <td class="align-middle block23">
                                {{$kupit->grup_number}}
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                      @if ($kktt != null)
                      <tfoot>
                        <tr>
                            <th class="align-middle">
                            </th>
                            <th class="align-middle pr-0 pl-0">
                              <div class="form-group row align-items-end mb-0">
                                <div class="col">
                                  <div class="form-group row align-items-center mb-0">
                                    <div class="col-auto" style="font-weight: normal;">Группаны тандаңыз</div>
                                    <div class="col">
                                      <select class="custom-select" width="100%" name="for_grup_number">
                                        @for ($i2 = $podcategory->col_grup; $i2 >= 0; $i2--)
                                          <option value="{{$i2}}">{{$i2}}-группа</option>
                                        @endfor
                                        <option value="10000001">Архив</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <button class="btn btn-default float-right">Сактоо</button>
                                </div>
                              </div>
                            </th>
                            <th class="align-middle">
                            </th>
                        </tr>
                      </tfoot>
                      @endif
                  </table>
                </div>
              </form>
                
                @if ($kktt == null)
                  @if ($i == $podcategory->col_grup)
                    <div class="row align-items-center mt-5">
                      <div class="col"></div>
                      <div class="col-auto">
                        <button class="btn btn-default" data-toggle="modal" data-target="#staticBackdrop2">Группаны өчүрүү</button>
                      </div>
                      <div class="col"></div>
                    </div>
                  @endif
                @endif
              </div>
              
              @endfor



              @php
              $kktt = $kupits->where('grup_number', 10000001)->first();
          @endphp
              <div class="tab-pane" id="tab_10000001">
                <form method="POST" action="{{route('moderator_kursy_dostijenie_studentov_perevod_gruppa', ['kurs_id' => $podcategory->id])}}">
                  @csrf
                  @method('PUT')
                <div class="table-responsive"  style="overflow-x: hidden;" width="100%">
                  <table class="table table-hover table-striped text-nowrap border mb-0" id="table_10000001" width="100%">
                      <thead>
                          <tr>
                              <th class="align-middle" width="1px">
                                <div class="icheck-primary d-inline ml-0">
                                  <input type="checkbox" value="10000001" name="test_id" id="todoCheck010000001" class="all" data-id="d10000001">
                                  <label for="todoCheck010000001"></label>
                                </div>
                              </th>
                              <th class="">ФИО</th>
                              <th class="">Группа</th>
                          </tr>
                      </thead>
                      <tbody class="align-middle">
                        @foreach ($kupits->where('grup_number', 10000001) as $kupit)
                          <tr class="todo-list2">
                            <td class="align-middle block23">
                              <div class="icheck-primary d-inline ml-0">
                                <input type="checkbox" name="for_kupit_id[]" id="todoCheck{{$kupit->id}}" class="one" data-id="d10000001" value="{{$kupit->id}}">
                                <label for="todoCheck{{$kupit->id}}"></label>
                                <input type="hidden" name="for_kupit_id[]" value="0">
                              </div>
                            </td>
                              <td class="align-middle pr-0" style="max-width: 250px;">
                                  <div class="user-block1">
                                      <span class="username1 ml-0 d-inline-block text-truncate truncate2" style="max-width: 250px;" title="{{$kupit->user->name}}">{{$loop->iteration}}.
                                          @if($kupit->user->f_fio != null)
                                              <span>{{$kupit->user->f_fio}} {{$kupit->user->i_fio}} {{$kupit->user->o_fio}}</span>
                                          @else
                                              <span>{{$kupit->user->name}}</span>
                                          @endif
                                      </span>
                                      <span class="description1 ml-0 truncate2" style="max-width: 250px;">{{$kupit['created_at']->format('d.m.Y (H:i)')}}</span>
                                  </div>
                              </td>
                              
                              <td class="align-middle block23">
                                {{$kupit->grup_number}}
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                      
                      @if ($kktt != null)
                      <tfoot>
                        <tr>
                            <th class="align-middle">
                            </th>
                            <th class="align-middle pr-0 pl-0">
                              <div class="form-group row align-items-end mb-0">
                                <div class="col">
                                  <div class="form-group row align-items-center mb-0">
                                    <div class="col-auto" style="font-weight: normal;">Группаны тандаңыз</div>
                                    <div class="col">
                                      <select class="custom-select" width="100%" name="for_grup_number">
                                        @for ($i2 = $podcategory->col_grup; $i2 >= 0; $i2--)
                                          <option value="{{$i2}}">{{$i2}}-группа</option>
                                        @endfor
                                        <option value="10000001">Архив</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <button class="btn btn-default float-right">Сактоо</button>
                                </div>
                              </div>
                            </th>
                            <th class="align-middle">
                            </th>
                        </tr>
                      </tfoot>
                      @endif
                  </table>
                </div>
              </form>
            </div>
          
    </section><!-- /.content -->
            

        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Курска группа кошуу</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <br>
                      <p class=" pt-1 text-center">
                        {{$podcategory->col_grup + 1}}-группаны кошууну каалайсызбы?
                      </p>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Отмена</button>   
                        <a type="button" class="btn btn-sm btn-success" href="{{route('moderator_kursy_dostijenie_studentov_plus_gruppa', ['kurs_id' => $podcategory->id])}}"><i class="fas fa-plus pr-2"></i> Ок</a>                      
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="staticBackdrop2" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-top">  
              <div class="modal-content bg-default">
                  <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel2">Акыркы группаны өчүрүү</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <br>
                    <p class=" pt-1 text-center">
                      {{$podcategory->col_grup}}-группаны өчүрүүнү каалайсызбы?
                    </p>                    
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Отмена</button>   
                      <a type="button" class="btn btn-sm btn-success" href="{{route('moderator_kursy_dostijenie_studentov_minus_gruppa', ['kurs_id' => $podcategory->id])}}"><i class="fas fa-plus pr-2"></i> Ок</a>                      
                  </div>
              </div>
          </div>
      </div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $(document).ready(function(){
      $('.swalDefaultSuccess').click(function() {
        var clickId = this.id;
        var idimg = 'myInput' + clickId;
        var idimg2 = 'main01' + clickId;
        var copyText = document.getElementById(idimg);
        copyText.select();
        document.execCommand("copy");
        Toast.fire({icon: 'success', title: 'Көчүрүлдү'});
        var countryID = $(this).attr('data-id');
        if(countryID)
        {
          jQuery.ajax({
              url : '/moderator_panel/kursy/code/cheked/' +countryID,
              type : "GET",
              dataType : "json",
              success:function(data){}
          });
        }else{}
        $("#" + idimg2).appendTo($("#main002"));
      });
    });
  });


  $(document).ready(function() {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    });
    $('table.table').DataTable({
        scrollY:        "440px",
        scrollX:        true,
        scrollCollapse: true,
        bInfo: false,
        paging:         false,
        fixedColumns : {
            leftColumns : 1,
            rightColumns : 0
        },
        searching: false,
        language: {
          emptyTable: "Бул группада бир да студент жок"
        }
    } );
  });



  $(document).ready(function() { 
    $(".all").on("change", function() {
        var groupId = $(this).data('id');
        $('.one[data-id="' + groupId + '"]').prop("checked", this.checked);
    });

    $(".one").on("change", function() {
        var groupId = $(this).data('id');
        var allChecked = $('.one[data-id="' + groupId + '"]:not(:checked)').length == 0;
        $('.all[data-id="' + groupId + '"]').prop("checked", allChecked);
    });
  });

</script>
@endsection