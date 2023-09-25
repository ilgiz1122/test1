@extends('layouts.moderator_layouts')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"/>

<style type="text/css">
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    

    <!-- Main content -->
    <section class="content">
        <div class="row align-items-center">
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
                        <li class="breadcrumb-item active">{{$podcategory->title}}
                            <span data-bs-toggle="tooltip" data-bs-placement="right" title="Бардык студенттер">(табло)</span>
                            <a data-bs-toggle="tooltip" data-bs-placement="right" title="Группаны тандоо" type="button" data-toggle="dropdown" id="dropdownMenuOffset3" aria-expanded="false" data-offset="0,0" class="btn-link">/ @if ($grup_number == 10000001) Архив @else {{$grup_number}}-группа @endif</a>
                            <div class="dropdown-menu dropdown-menu-left" role="menu" style="">
                                @for ($i2 = $podcategory->col_grup; $i2 >= 0; $i2--)
                                    <a class="dropdown-item @if($grup_number == $i2) active @endif" href="{{ route('moderator_kurs_dostijenie_studentov', ['kurs_id' => $podcategory->id, 'grup_number' => $i2]) }}">{{$i2}}-группа</a>
                                @endfor
                                <a class="dropdown-item @if($grup_number == 10000001) active @endif" href="{{ route('moderator_kurs_dostijenie_studentov', ['kurs_id' => $podcategory->id, 'grup_number' => 10000001]) }}">Архив</a>
                            </div>
                        </li>
                    </ol>
                </section>
            </div>
            <div class="col-auto">
                <a class="btn btn-default" title="Кошумча орнотуулар" type="button" data-toggle="dropdown" id="dropdownMenuOffset1" aria-expanded="false" data-offset="-250,0"><i class="fal fa-cog"></i></a>
                <div class="dropdown-menu dropdown-menu-left" role="menu" style="">
                    <a class="dropdown-item" href="{{ route('moderator_kurs_dostijenie_studentov_gruppa22', ['kurs_id' => $podcategory->id])}}">Группа</a>
                </div>
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
              
            <div class="table-responsive" >
                <table class="table table-hover text-nowrap border" id="table">
                    <thead>
                        <tr>
                            <th class="" style="max-width: 170px;">ФИО</th>
                            @foreach ($uroky as $urok)
                              <th class=""  title="Тема: {{$urok->title}}">{{ $loop->iteration }}-сабак</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                      @foreach ($kupits as $kupit)
                        <tr class="todo-list2">
                            <td class="align-middle block23 pr-0" style="max-width: 170px;">
                                <a style="display:block" href="{{ route('moderator_kurs_dostijenie_studentov2', ['kurs_id'=>$podcategory->id, 'kupit_id'=>$kupit->id]) }}"></a>
                                <div class="user-block1">
                                    <span class="username1 ml-0 d-inline-block text-truncate truncate2" style="max-width: 170px;" title="{{$kupit->user->name}}">{{$loop->iteration}}.
                                        @if($kupit->user->f_fio != null)
                                            <span>{{$kupit->user->f_fio}} {{$kupit->user->i_fio}} {{$kupit->user->o_fio}}</span>
                                        @else
                                            <span>{{$kupit->user->name}}</span>
                                        @endif
                                    </span>
                                    <span class="description1 ml-0 truncate2" style="max-width: 170px;">{{$kupit->created_at->format('d.m.Y')}} / {{$kupit->created_at->format('H:i')}}</span>
                                </div>
                            </td>
                            @foreach ($uroky as $urok)
                                <?php
                                    $progress1 = $progress->where('user_id', $kupit->user_id)->where('urok_id', $urok->id)->where('kupit_id', $kupit->id)->first();

                                    if ($urok->test_id != null){
                                        $test1 = $test->where('id', $urok->test_id)->first();
                                        $test_controls1 = $test_controls->where('user_id', $kupit->user_id)->where('test_id', $urok->test_id)->first();
                                    }else{
                                        $test1 = null;
                                        $test_controls1 = null;
                                    }
                                    
                                    $zadanie1 = $zadanie->where('urok_id', $urok->id)->first();
                                    if ($zadanie1 != null) {
                                        $zadanie_otvety1 = $zadanie_otvety->where('user_id', $kupit->user_id)->where('urok_id', $urok->id)->where('kupit_id', $kupit->id)->where('zadanie_id', $zadanie1->id)->first();
                                    }
                                ?>
                            <td class="align-middle block23">
                                <a style="display:block" href="{{ route('moderator_kurs_dostijenie_studentov2', ['kurs_id'=>$podcategory->id, 'kupit_id'=>$kupit->id]) }}"></a>

                                @if($progress1)
                                    @if($test1)
                                        @if($test_controls1)
                                            @if($zadanie1)
                                                @if($zadanie_otvety1 != null)
                                                    @if($progress1->status_vypol_zadanii == 2)
                                                        <i class="far fa-check-circle pr-2" style="color: #28a745;" title="ачты, тест тапшырылды, тапшырма туура аткарылды"></i>
                                                    @endif
                                                    @if($progress1->status_vypol_zadanii == 4)
                                                        <span title="ачты, тест тапшырылды, тапшырма туура эмес аткарылды" hidden="">ачты, тест тапшырылды, тапшырма туура эмес аткарылды</span>
                                                        <span title="ачты, тест тапшырылды, тапшырма туура эмес аткарылды">
                                                            <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                            <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i> 
                                                            <i class="fas fa-laptop-house pr-2" style="color: red;"></i>
                                                        </span>
                                                    @endif
                                                    @if($progress1->status_vypol_zadanii == 0)
                                                        <span title="ачты, тест тапшырылды, тапшырма текшериле элек" hidden="">ачты, тест тапшырылды, тапшырма текшериле элек</span>
                                                        <span title="ачты, тест тапшырылды, тапшырма текшериле элек">
                                                            <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                            <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i> 
                                                            <i class="fas fa-laptop-house pr-2" style="color: blue;"></i>
                                                        </span>
                                                    @endif
                                                @else
                                                    <span title="ачты, тест тапшырылды, тапшырма аткарылган жок" hidden="">ачты, тест тапшырылды, тапшырма аткарылган жок</span>
                                                    <span title="ачты, тест тапшырылды, тапшырма аткарылган жок">
                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                        <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i> 
                                                        <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>
                                                    </span>
                                                @endif
                                            @else
                                                <span title="ачты, тест тапшырылды" hidden="">ачты, тест тапшырылды</span>
                                                <span title="ачты, тест тапшырылды">
                                                    <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i>   
                                                </span>  
                                            @endif
                                        @else
                                            @if($zadanie1 != null)
                                                @if($zadanie_otvety1 != null)
                                                    @if($progress1->status_vypol_zadanii == 2)
                                                        <span title="ачты, тест тапшырылган жок, тапшырма туура аткарылды" hidden="">ачты, тест тапшырылган жок, тапшырма туура аткарылды</span>
                                                        <span title="ачты, тест тапшырылган жок, тапшырма туура аткарылды">
                                                            <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                            <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                            <i class="fas fa-laptop-house pr-2" style="color: #28a745;"></i>
                                                        </span>
                                                    @endif
                                                    @if($progress1->status_vypol_zadanii == 4)
                                                        <span title="ачты, тест тапшырылган жок, тапшырма туура эмес аткарылды" hidden="">ачты, тест тапшырылган жок, тапшырма туура эмес аткарылды</span>
                                                        <span title="ачты, тест тапшырылган жок, тапшырма туура эмес аткарылды">
                                                            <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                            <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                            <i class="fas fa-laptop-house pr-2" style="color: red;"></i>
                                                        </span>
                                                    @endif
                                                    @if($progress1->status_vypol_zadanii == 0)
                                                        <span title="ачты, тест тапшырылган жок, тапшырма текшериле элек" hidden="">ачты, тест тапшырылган жок, тапшырма текшериле элек</span>
                                                        <span title="ачты, тест тапшырылган жок, тапшырма текшериле элек">
                                                            <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                            <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                            <i class="fas fa-laptop-house pr-2" style="color: blue;"></i>
                                                        </span>
                                                    @endif
                                                @else
                                                    <span title="ачты, тест тапшырылган жок, тапшырма аткарылган жок" hidden="">ачты, тест тапшырылган жок, тапшырма аткарылган жок</span>
                                                    <span title="ачты, тест тапшырылган жок, тапшырма аткарылган жок">
                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                        <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                        <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>   
                                                    </span>                            
                                                @endif
                                            @else
                                                <span title="ачты, тест тапшырылган жок" hidden="">ачты, тест тапшырылган жок</span>
                                                <span title="ачты, тест тапшырылган жок">
                                                    <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>   
                                                </span>  
                                            @endif
                                        @endif
                                    @else
                                        @if($zadanie1)
                                            @if($zadanie_otvety1)
                                                @if($progress1->status_vypol_zadanii == 2)
                                                    <i class="far fa-check-circle pr-2" style="color: #28a745;" title="ачты, тапшырма туура аткарылды"></i>
                                                @endif
                                                @if($progress1->status_vypol_zadanii == 4)
                                                    <span title="ачты, тапшырма туура эмес аткарылды" hidden="">ачты, тапшырма туура эмес аткарылды</span>
                                                    <span title="ачты, тапшырма туура эмес аткарылды">
                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                        <i class="fas fa-laptop-house pr-2" style="color: red;"></i>
                                                    </span>
                                                @endif
                                                @if($progress1->status_vypol_zadanii == 0)
                                                    <span title="ачты, тапшырма текшериле элек" hidden="">ачты, тапшырма текшериле элек</span> 
                                                    <span title="ачты, тапшырма текшериле элек">
                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                        <i class="fas fa-laptop-house pr-2" style="color: blue;"></i>
                                                    </span> 
                                                @endif
                                            @else
                                                <span title="ачты, тапшырма аткарылган жок" hidden="">ачты, тапшырма аткарылган жок</span>
                                                <span title="ачты, тапшырма аткарылган жок">
                                                    <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                    <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>
                                                </span>
                                            @endif
                                        @else
                                            <span title="ачты" hidden="">ачты</span>
                                            <span title="ачты">
                                                <i class="far fa-eye pr-2" style="color: #28a745;"></i>  
                                            </span>
                                        @endif
                                    @endif
                                @else
                                    <i class="far fa-eye pr-2" style="color: #adb5bd;" title="ача элек"></i>
                                    @if($test1 != null)
                                        <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                    @endif
                                    @if($zadanie1 != null)
                                        <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>
                                    @endif
                                @endif
                            </td>
                            @endforeach
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">
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





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script>

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
//для модального окна удаления

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// для блока, чтобы стал кнопкой
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
// для блока, чтобы стал кнопкой
//$(document).ready( function () {
 //   $('#table').DataTable({
 //   sScrollX: "100%",
  //  fixedColumns : {
 //       leftColumns : 1,
 //       rightColumns : 0
//        },
 //   });
//} );

$(document).ready(function() {
    var table = $('#table').DataTable( {
        scrollY:        "490px",
        scrollX:        true,
        scrollCollapse: true,
        bInfo: false,
        paging:         false,
        fixedColumns : {
            leftColumns : 1,
            rightColumns : 0
        },
        language: {
            sSearch:  "Издөө:",
            emptyTable: "Бул группада бир да студент жок",
        },
        dom: 'Bfrtip',
     
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o pr-2"></i> Excel',
                title: 'Курс: {{$podcategory->title}} (жетишкендиктер)'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o pr-2"></i> PDF',
                title: 'Курс: {{$podcategory->title}} (жетишкендиктер)'
            },
        ],

        order: [], 
            
    } );
});
</script>
@endsection