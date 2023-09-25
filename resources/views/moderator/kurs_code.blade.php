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
          <div class="row align-items-center mb-3">
            <div class="col">
              <section class="content-header pl-0 pr-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('moderator_panel')}}">
                            <i class="nav-icon fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('moderator_kurs_index')}}">Курс</a>
                    </li>
                    <li class="breadcrumb-item active">Коддор</li>
                </ol>
            </section>
            </div>
            <div class="col-auto">
              <div class="row align-items-center">
                <div class="col">
                  @if(\Auth::user()->for_role == 3)
                    @if($moderator_function->kurs_plus_code === 1)
                      <i class="far fa-check-circle pr-2" title="Курска коддорду бекер кошуу мүмкүнчүлүгүңүз бар" style="color: #28a745;"></i>
                    @endif
                  @endif
                  @if(\Auth::user()->for_role == 2)
                    <i class="far fa-check-circle pr-2" title="Курска коддорду бекер кошуу мүмкүнчүлүгүңүз бар" style="color: #28a745;"></i>
                  @endif
                </div>
                <div class="col-auto">
                  <a class="btn btn-success btn-block btn-sm for_plus_code" type="button" data-toggle="modal" data-target="#staticBackdrop" data-id1="{{route('moderator_olimpiada_plus_user', ['olimpiada_id' => $podcategory->id, 'user_id' => $podcategory->id])}}"><i class="fas fa-plus pr-2"></i> Код кошуу</a>
                </div>
              </div>
              
            </div>
            <div class="col-md-auto text-right float-right">
              <div class="row align-items-center">
                <div class="col">
                </div>
                <div class="col-auto">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-block btn-sm active float-right" href="#tab_1" data-toggle="tab">Коддор
                            ({{count($code_vhods->where('status', 0)) + count($code_vhods->where('status', 1))}})
                        </a>
                    </li>
                    <li class="nav-item pr-0 pl-2">
                        <a class="btn btn-outline-info btn-sm btn-block float-right" href="#tab_2" data-toggle="tab">Колдонуучулар 
                            ({{count($code_vhods->where('status', 2))}})
                        </a>
                    </li>
                  </ul>
                </div>
              </div>
              
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


            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <div class="row align-items-top">
                <div class="col">
                  <div class="row mt-5 align-items-center">
                    <div class="col">
                      <hr class="mt-1 mb-3">
                    </div>
                    <div class="col-auto">
                      <p class="mt-1 mb-3 text-muted"><b>Бериле элек ({{count($code_vhods->where('status', 0))}})</b></p>
                    </div>
                    <div class="col">
                      <hr class="mt-1 mb-3">
                    </div>
                  </div>
                  <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                      <table class="table table-head-fixed table-hover text-nowrap mb-0">
                        <tbody class="align-middle" id="main001">
                           @foreach ($code_vhods->where('status', 0) as $code_vhod)
                          <tr id="main01{{$loop->iteration}}">
                            <td width="1px" class="pt-2 pb-0 pl-0 pr-0 align-middle ">
                              <div class="icheck-primary d-inline ml-0">
                                <input type="checkbox" value="{{$code_vhod->id}}" name="test_id" id="todoCheck{{$loop->iteration}}" disabled="">
                                <label for="todoCheck{{$loop->iteration}}"></label>
                              </div>
                            </td>
                            <td class="p-2 align-middle ">
                              <input class="form-control color1 form-control-border  pr-1 pl-1 pt-2 pb-1" type="text" value="{{$code_vhod->text_coda}}" id="myInput{{$loop->iteration}}" >
                            </td>
                            <td class="p-2 align-middle ">
                                <a class="btn btn-tool swalDefaultSuccess" type="button" id="{{$loop->iteration}}" data-id="{{$code_vhod->id}}">
                                  <i class="fal fa-copy" style="font-size: 20px;"></i>
                                </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table><!-- /.table --> 
                  </div><!-- /.mail-box-messages -->
                </div>
                <div class="col-md-auto border p-0">
                  
                </div>
                <div class="col">
                  <div class="row mt-5 align-items-center">
                    <div class="col">
                      <hr class="mt-1 mb-3">
                    </div>
                    <div class="col-auto">
                      <p class="mt-1 mb-3 text-muted"><b>Берилген, бирок колдонула элек ({{count($code_vhods->where('status', 1))}})</b></p>
                    </div>
                    <div class="col">
                      <hr class="mt-1 mb-3">
                    </div>
                  </div>
                  <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                      <table class="table table-head-fixed table-hover text-nowrap mb-0">
                        <tbody class="align-middle" id="main002">
                           @foreach ($code_vhods->where('status', 1) as $code_vhod)
                          <tr id="main02{{$loop->iteration}}">
                            <td width="1px" class="pt-2 pb-0 pl-0 pr-0 align-middle ">
                              <div class="icheck-primary d-inline ml-0">
                                <input type="checkbox" value="{{$code_vhod->id}}" name="test_id" id="todoCheck{{$loop->iteration}}" disabled="">
                                <label for="todoCheck{{$loop->iteration}}"></label>
                              </div>
                            </td>
                            <td class="p-2 align-middle ">
                              <input class="form-control color1 form-control-border  pr-1 pl-1 pt-2 pb-1" type="text" value="{{$code_vhod->text_coda}}" id="myInput{{$loop->iteration}}" >
                            </td>
                            <td class="p-2 align-middle ">
                                <a class="btn btn-tool swalDefaultSuccess" type="button" id="{{$loop->iteration}}" data-id="{{$code_vhod->id}}">
                                  <i class="fal fa-copy" style="font-size: 20px;"></i>
                                </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table><!-- /.table --> 
                  </div><!-- /.mail-box-messages -->

                </div>
              </div>
              </div>

              <div class="tab-pane" id="tab_2">
                <div class="row mt-5 align-items-center">
                    <div class="col">
                      <hr class="mt-1 mb-3">
                    </div>
                    <div class="col-auto">
                      <p class="mt-1 mb-3 text-muted"><b>Колдонуучулар</b> <small>(код менен киргендер)</small></p>
                    </div>
                    <div class="col">
                      <hr class="mt-1 mb-3">
                    </div>
                  </div>
                <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                      <table class="table table-head-fixed table-hover text-nowrap mb-0">
                        <tbody class="align-middle">
                           @foreach ($code_vhods->where('status', 2) as $code_vhod)
                          <tr>
                            <td width="1px" class="pt-1 pb-0 pl-0 pr-0 align-middle ">
                              <div class="icheck-primary d-inline ml-0">
                                <input type="checkbox" value="{{$code_vhod->id}}" name="test_id" id="todoCheck{{$loop->iteration}}">
                                <label for="todoCheck{{$loop->iteration}}"></label>
                              </div>
                            </td>
                            <td class="p-1 align-middle ">
                              <div class="user-block1">
                                  <span class="username1 ml-0 d-inline-block text-truncate pb-0" style="max-width: 230px;">{{$code_vhod->user->name}}</span>
                                  <span class="description1 ml-0 pt-0">Колдонулду: {{$code_vhod['updated_at']->format('d.m.Y (H:i)')}}</span>
                              </div>
                            </td>
                            <td class="p-1 align-middle ">
                              <div class="user-block1">
                                @php
                                  
                                @endphp
                                  <span class="username1 ml-0 d-inline-block text-truncate pb-0" style="max-width: 230px;">{{$code_vhod->text_coda}}</span>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table><!-- /.table --> 
                </div><!-- /.mail-box-messages -->
              </div>
            </div>
    </section><!-- /.content -->
            

        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Курска коддорду кошуу</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="plus_1" action="{{route('moderator_kursy_code_store', ['kurs_id' => $podcategory->id])}}" method="POST" class="needs-validation" novalidate>
                            @csrf 
                    <div class="modal-body">
                      <br>
                      <p class="mb-0 pt-1">
                        <div class="row align-items-center">
                          <div class="col">
                            Саны <small>(min:1; max:10)</small>
                          </div>
                          <div class="col-auto">
                            <input type="number" id="for_input" class="form-control" min="1" max="10" name="kol" value="1" onfocus="true">
                            <div class="invalid-feedback">Тесттин темасын жазыңыз</div>
                          </div> 
                        </div>
                      </p><hr class="mt-1">
                      <p class="mb-0 pt-1 text-center">
                        <small>(                          
                            @if(\Auth::user()->for_role == 3)
                              @if($moderator_function->kurs_plus_code === 1)
                                Бекер кошулат
                              @else
                                Сиздин эсептен кемитилет
                              @endif
                            @endif
                            @if(\Auth::user()->for_role == 2)
                              Бекер кошулат
                            @endif
                        )</small>
                      </p>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Отмена</button>   
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus pr-2"></i> Ок</button>                      
                    </div>
                  </form>
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

</script>
@endsection