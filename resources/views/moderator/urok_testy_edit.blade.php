@extends('layouts.moderator_layouts')

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
      transform: translateX(-4px);
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


.custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
.custom-file-upload input.upload {
    display: none;
}


.text11:hover {
    outline: 0; width: 100%;
    resize: none;
    border-bottom: 1px solid #17a2b8;
}

.text11:focus {
  background: #f8f9fa;
  outline: 0; width: 100%;
  resize: none;
}

.text11 {
  outline: 0; border-top: 0; border-left: 0; border-right: 0; border-bottom: 0; width: 100%;
  resize: none;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom: 1px solid white;
}


.custom-radio>input {
      position: absolute;
      z-index: -1;
      opacity: 0;
    }

 /*    для элемента label связанного с .custom-radio */
    .custom-radio>span {
      display: inline-flex;
      align-items: center;
      user-select: none;
    }

    /* создание в label псевдоэлемента  before со следующими стилями */
    .custom-radio>span::before {
      content: '';
      display: inline-block;
      width: 1em;
      height: 1em;
      flex-shrink: 0;
      flex-grow: 0;
      border: 1px solid #adb5bd;
      border-radius: 50%;
      margin-right: 0.5em;
      background-repeat: no-repeat;
      background-position: center center;
      background-size: 50% 50%;
    }

    /* стили при наведении курсора на радио */
    .custom-radio>input:not(:disabled):not(:checked)+span:hover::before {
      border-color: #17a2b8;
    }

    /* стили для активной радиокнопки (при нажатии на неё) */
    .custom-radio>input:not(:disabled):active+span::before {
      background-color: #17a2b8;
      border-color: #17a2b8;
    }

    /* стили для радиокнопки, находящейся в фокусе */
    .custom-radio>input:focus+span::before {
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* стили для радиокнопки, находящейся в фокусе и не находящейся в состоянии checked */
    .custom-radio>input:focus:not(:checked)+span::before {
      border-color: #80bdff;
    }

    /* стили для радиокнопки, находящейся в состоянии checked */
    .custom-radio>input:checked+span::before {
      border-color: #0b76ef;
      background-color: #0b76ef;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
    }

    /* стили для радиокнопки, находящейся в состоянии disabled */
    .custom-radio>input:disabled+span::before {
      background-color: #e9ecef;
    }

    .for_delet_variant .for_delet_variant_1 {
      display: none;
    }

    .for_delet_variant:hover .for_delet_variant_1 {
      display: inline-block;
    }
    .for_delet_variant:hover .text11 {
      border-bottom: 1px solid #17a2b8;
    }

    .for_peremestit .for_peremestit_1 {
      display: none;
    }

    .for_peremestit:hover .for_peremestit_1 {
      display: inline-block;
      cursor: move;
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

.foto1 .foto2:hover {
}

.for_foto1 .for_foto2 {
      display: none;
    }

    .for_foto1:hover .for_foto2 {
      display: inline-block;
    }

.foto1 {
  display: none;
}
</style>


    <!-- Тема -->
    <div class="content-header">
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
                <li class="breadcrumb-item active">
                    <a href="{{ route('moderator_kurs_urok_index', $podcategory->id) }}">{{$podcategory->title}} (сабактар)</a>
                </li>
                <li class="breadcrumb-item active">{{$urok->title}} (тестти оңдоо)</li>
            </ol>
        </section>
            
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                </div>
            @endif
            <!--Окно для уведомлений (успушно добавлена) -->
    </div>
    <!-- Тема -->



    
            
        <section class="preorder-snails content">
                <div class="row">
                    <div class="col-md-9">
                        <form id="fileUploadForm" action="{{ route('moderator_tests_update', [$for_action, $test->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <h5 class="mb-0 text-center"><b>Тестти өзгөртүү</b></h5>
                                <div class="form-group required mt-4 pt-3">
                                    <label class="">Тема</label>
                                        <input type="text" id='files2' name="title" maxlength="100" class="form-control" placeholder="Тесттин аталышы" required autocomplete="title" value="{{ $test->title }}">
                                    <div class="invalid-feedback">Тесттин аталышын жазыңыз!</div>
                                </div>

                                <div class="form-group mt-4 pt-3">
                                    <div class="required"><label>Описание</label></div>                                        
                                        <textarea name="opisanie" id="summernote" required>{{ $test->opisanie }}</textarea>
                                    <div class="invalid-feedback">Описаниени толтуруңуз</div>
                                </div>

                                <div class="form-row form-group mt-4 pt-3">
                                    <div class="form-group col-md-6 mb-0">
                                        <p class="mb-1">Мүмкүндүктөрдүн саны</p>
                                        <input type="number" pattern="\d+" name="popytki" min="0" max="99999" maxlength="5" class="form-control strelki" placeholder="Мисалы: 3" value="{{$test->kol_popytkov}}">
                                        <span class="res"></span>
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <p class="mb-1">Узактыгы (минута менен)</p>
                                        <input type="number" pattern="\d+" name="prodoljitelnost" min="1" max="99999" maxlength="5" class="form-control strelki" placeholder="Мисалы: 30 " value="{{$test->time / 60}}">
                                        <span class="res"></span>
                                    </div>
                                </div>



                                <div class="pt-3 mt-4">
                                    <div class="form-group test_margin">
                                        <div class="card sticky-top">
                                            <div class="card-body p-2">
                                                <div class="row align-items-center ">
                                                    <div class="col">
                                                        <h7 align="center"><strong>Тесттин суроолору </strong>(<span><a id="clicks">{{$test->test_voprosy_count}}</a> / 30</span>)</h7>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a class="btn btn-sm btn-default float-right text-nowrap nomer_testa rem ret two" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить вопрос" type="button" name="add" id="add">
                                                            <i class="fas fa-plus"></i> Кошуу
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                                    <table class="table table-borderless mb-0" id="linksTable">
                                                        <tbody class="connectedSortable">
                                                            @foreach ($test_voprosy as $key => $value)
                                                            <tr id="{{$loop->iteration}}" class="vopros_testa">
                                                                <td class="pt-2 pb-0 pr-0 pl-0">
                                                                    <div class="card card-primary card-outline for_peremestit">
                                                                        <div class="card-header pl-3 pr-2 pt-1 pb-1">
                                                                            <input type="number" name="for_edit{{$loop->iteration}}" value="1" hidden="">
                                                                            <input type="number" name="for_id{{$loop->iteration}}" id="for_id{{$loop->iteration}}" value="{{$test_voprosy[$key]->id}}" hidden="">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <p class="mb-0"><span class="number">1</span>-суроо</p>
                                                                                </div>
                                                                                <div class="col-auto text-muted">
                                                                                    <i class="fas fa-grip-horizontal for_peremestit_1 card-header22"></i>
                                                                                </div>
                                                                                <div class="col text-right">
                                                                                    <div class="card-tools">
                                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                                                        <button type="button" class="btn btn-tool remove-tr remove-trtr"><i class="fas fa-trash"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body pb-2 pt-2 pr-3 pl-3 class11">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    <textarea class="text11" rows="1" placeholder="Тесттин суроосун жазыңыз" name="vopros_testa{{$loop->iteration}}">{{$test_voprosy[$key]->text_voprosa}}</textarea>
                                                                                </div>

                                                                                <div class="col-auto">
                                                                                    <label class="custom-file-upload p-0 m-0">
                                                                                        <input type="file" class="upload" id="rebate_image{{$loop->iteration}}" name="rebate_image{{$loop->iteration}}" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i class="fas fa-image btn-tool pl-0 pr-0 mb-2"></i>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <input id="for_img{{$loop->iteration}}" type="number" name="for_img{{$loop->iteration}}" value="@if($test_voprosy[$key]->img_voprosa != null){{1}}@else{{0}}@endif" hidden="">
                                                                            <div class="foto1 for_foto1 mb-2 mt-2">
                                                                                <img id="rebate_old_image{{$loop->iteration}}" class="mb-2 shadow-sm optional" src="@if($test_voprosy[$key]->img_voprosa != null)https://nonsi.kg/public/storage/testy/images/imgvoprosa/{{$test_voprosy[$key]->img_voprosa}}@endif" alt="" style="width: 100%; border-radius: 4px;">
                                                                                <div class="timeline foto2 for_foto2">
                                                                                    <div>
                                                                                        <i class="fas fa-times bg-light remove-img2" title="Удалить" type="button"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                                $for_num_iteration = $loop->iteration;
                                                                            ?>
                                                                            @foreach ($test_otvety->where('test_voprosy_id', $test_voprosy[$key]->id) as $test_otvet)
                                                                            <div class="row align-items-center for_delet_variant remove-variant">
                                                                                <div class="col">
                                                                                    <label class="custom-radio">
                                                                                      <input type="checkbox" name="variant_radio{{$for_num_iteration}}[]" value="1" @if ($test_otvet->status_otveta == 1)  checked="" @endif>
                                                                                      <span><textarea class="text11" rows="1" cols="100%" placeholder="А" name="variant_text{{$for_num_iteration}}[]">{{$test_otvet->test_otvety}}</textarea></span>
                                                                                    </label>
                                                                                    <input type="hidden" name="variant_radio{{$for_num_iteration}}[]" value="0">
                                                                                </div>
                                                                                <div class="col-auto card-tools">
                                                                                    <i role="button" class="fas fa-trash btn-tool pl-0 pr-0 mb-2 remove-variant-click for_delet_variant_1"></i>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                            <div class="sdsdsd">
                                                                                <p id="nomer_voprosa{{$loop->iteration}}" class="mb-0 text-right"><i class="fas fa-plus btn-tool variantvoprosaplus" role="button" title="Добавить вариант"> Вариант кошуу</i></p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="card-footer pl-3 pr-2 pt-1 pb-1">
                                                                            <div class="row">
                                                                                <div class="col-auto">
                                                                                    
                                                                                </div>
                                                                                <div class="col-auto text-muted">
                                                                                    
                                                                                </div>
                                                                                <div class="col text-right nowrap">
                                                                                    <input type="number" pattern="\d+" name="ball{{$loop->iteration}}" min="0" max="999" maxlength="3" class="text11 text-right" placeholder="0" value="{{$test_voprosy[$key]->ball}}" style="background: none; width: 45px;">балл
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div id="linksTable0101">
                                                    </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                        <p id="demo"></p>
                                    </div>
                                </div>


                            <button type="submit" class="btn btn-block btn-info izmenit_name mb-3">Сактоо</button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <p class="mb-0 text-center"><b>Алдын ала көрүү</b><br></p>
                            
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            <p id="clicks2" style="display: none;">0</p>
            

        </section><!-- /.content -->    



                            
                            



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>
<!-- для инпут тайп файл -->    
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<!-- для инпут тайп файл --> 



   <script>
  $(function () {
    // Summernote
    $('#summernote').summernote({
        lang: 'ru-RU',
  height: 120,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  placeholder: 'Описание',
  disableDragAndDrop: true,
  toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'italic', 'strikethrough', 'superscript', 'subscript', 'height',  'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table', 'hr']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['undo', 'redo', 'fullscreen', 'help']],
    ],
});
  });
</script>
<script type="text/javascript">

//<!-- для инпут тайп файл --> 
$(document).ready(function () {
  bsCustomFileInput.init()
})
//<!-- для инпут тайп файл --> 

</script>



<script>
 $('#firstname3').on('change keyup', function() {
  var res = $(this).val()
  console.log(res.length);
  if(res.length > 5) $(this).val(res.substring(0, 5));
});

// для кнопки выберите фото

// для вычисления процентов
function calc() {
  let firstname3 = Number(document.getElementById("firstname3").value);
  let num2 = 0.8;
  let precision = 2;
  let multiplier = Math.pow(10, precision);
  let result = Math.round(firstname3 * num2 * multiplier) / multiplier;
  document.getElementById("result").innerHTML = result; 
  return result;
}

document.getElementById("firstname3").addEventListener("input", function() {
    calc(this.value);
});
// для вычисления процентов


</script>



<script>
   $(document).ready(function(){
   $('#e-fileinfo3').keyup(function() {
       $('#dateD').val($('#div.timing').text());
   });
});
</script>



<script type="text/javascript">

var elements = document.querySelectorAll('.number');
elements.forEach(function(item, i, arr) {
    item.innerHTML = i+1+'';
});

$('input[name="variant_radio1[]"]').on('change', function() {
    $('input[name="variant_radio1[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio2[]"]').on('change', function() {
   $('input[name="variant_radio2[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio3[]"]').on('change', function() {
   $('input[name="variant_radio3[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio4[]"]').on('change', function() {
   $('input[name="variant_radio4[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio5[]"]').on('change', function() {
   $('input[name="variant_radio5[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio6[]"]').on('change', function() {
   $('input[name="variant_radio6[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio7[]"]').on('change', function() {
   $('input[name="variant_radio7[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio8[]"]').on('change', function() {
   $('input[name="variant_radio8[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio9[]"]').on('change', function() {
   $('input[name="variant_radio9[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio10[]"]').on('change', function() {
   $('input[name="variant_radio10[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio11[]"]').on('change', function() {
   $('input[name="variant_radio11[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio12[]"]').on('change', function() {
   $('input[name="variant_radio12[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio13[]"]').on('change', function() {
   $('input[name="variant_radio13[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio14[]"]').on('change', function() {
   $('input[name="variant_radio14[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio15[]"]').on('change', function() {
   $('input[name="variant_radio15[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio16[]"]').on('change', function() {
   $('input[name="variant_radio16[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio17[]"]').on('change', function() {
   $('input[name="variant_radio17[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio18[]"]').on('change', function() {
   $('input[name="variant_radio18[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio19[]"]').on('change', function() {
   $('input[name="variant_radio19[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio20[]"]').on('change', function() {
   $('input[name="variant_radio20[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio21[]"]').on('change', function() {
   $('input[name="variant_radio21[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio22[]"]').on('change', function() {
   $('input[name="variant_radio22[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio23[]"]').on('change', function() {
   $('input[name="variant_radio23[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio24[]"]').on('change', function() {
   $('input[name="variant_radio24[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio25[]"]').on('change', function() {
   $('input[name="variant_radio25[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio26[]"]').on('change', function() {
   $('input[name="variant_radio26[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio27[]"]').on('change', function() {
   $('input[name="variant_radio27[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio28[]"]').on('change', function() {
   $('input[name="variant_radio28[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio29[]"]').on('change', function() {
   $('input[name="variant_radio29[]"]').not(this).prop('checked', false);
});
$('input[name="variant_radio30[]"]').on('change', function() {
   $('input[name="variant_radio30[]"]').not(this).prop('checked', false);
});



if($('img#rebate_old_image1').attr('src') != "") {
  $('#rebate_old_image1').parents('.foto1').show();
}
if($('img#rebate_old_image2').attr('src') != "") {
  $('#rebate_old_image2').parents('.foto1').show();
}
if($('img#rebate_old_image3').attr('src') != "") {
  $('#rebate_old_image3').parents('.foto1').show();
}
if($('img#rebate_old_image4').attr('src') != "") {
  $('#rebate_old_image4').parents('.foto1').show();
}
if($('img#rebate_old_image5').attr('src') != "") {
  $('#rebate_old_image5').parents('.foto1').show();
}
if($('img#rebate_old_image6').attr('src') != "") {
  $('#rebate_old_image6').parents('.foto1').show();
}
if($('img#rebate_old_image7').attr('src') != "") {
  $('#rebate_old_image7').parents('.foto1').show();
}
if($('img#rebate_old_image8').attr('src') != "") {
  $('#rebate_old_image8').parents('.foto1').show();
}
if($('img#rebate_old_image9').attr('src') != "") {
  $('#rebate_old_image9').parents('.foto1').show();
}
if($('img#rebate_old_image10').attr('src') != "") {
  $('#rebate_old_image10').parents('.foto1').show();
}
if($('img#rebate_old_image11').attr('src') != "") {
  $('#rebate_old_image11').parents('.foto1').show();
}
if($('img#rebate_old_image12').attr('src') != "") {
  $('#rebate_old_image12').parents('.foto1').show();
}
if($('img#rebate_old_image13').attr('src') != "") {
  $('#rebate_old_image13').parents('.foto1').show();
}
if($('img#rebate_old_image14').attr('src') != "") {
  $('#rebate_old_image14').parents('.foto1').show();
}
if($('img#rebate_old_image14').attr('src') != "") {
  $('#rebate_old_image14').parents('.foto1').show();
}
if($('img#rebate_old_image15').attr('src') != "") {
  $('#rebate_old_image15').parents('.foto1').show();
}
if($('img#rebate_old_image16').attr('src') != "") {
  $('#rebate_old_image16').parents('.foto1').show();
}
if($('img#rebate_old_image17').attr('src') != "") {
  $('#rebate_old_image17').parents('.foto1').show();
}
if($('img#rebate_old_image18').attr('src') != "") {
  $('#rebate_old_image18').parents('.foto1').show();
}
if($('img#rebate_old_image19').attr('src') != "") {
  $('#rebate_old_image19').parents('.foto1').show();
}
if($('img#rebate_old_image20').attr('src') != "") {
  $('#rebate_old_image20').parents('.foto1').show();
}
if($('img#rebate_old_image21').attr('src') != "") {
  $('#rebate_old_image21').parents('.foto1').show();
}
if($('img#rebate_old_image22').attr('src') != "") {
  $('#rebate_old_image22').parents('.foto1').show();
}
if($('img#rebate_old_image23').attr('src') != "") {
  $('#rebate_old_image23').parents('.foto1').show();
}
if($('img#rebate_old_image24').attr('src') != "") {
  $('#rebate_old_image24').parents('.foto1').show();
}
if($('img#rebate_old_image25').attr('src') != "") {
  $('#rebate_old_image25').parents('.foto1').show();
}
if($('img#rebate_old_image26').attr('src') != "") {
  $('#rebate_old_image26').parents('.foto1').show();
}
if($('img#rebate_old_image27').attr('src') != "") {
  $('#rebate_old_image27').parents('.foto1').show();
}
if($('img#rebate_old_image28').attr('src') != "") {
  $('#rebate_old_image28').parents('.foto1').show();
}
if($('img#rebate_old_image29').attr('src') != "") {
  $('#rebate_old_image29').parents('.foto1').show();
}
if($('img#rebate_old_image30').attr('src') != "") {
  $('#rebate_old_image30').parents('.foto1').show();
}




var clicks = {{$test->test_voprosy_count}};
$(document).on('click', '.nomer_testa', function(){    
    if (clicks < 30){
        //Для счета количество тестов
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
        //Для счета количество тестов
        // Для добавления вопросов теста
        var i = 0;
            ++i;

            const inputsCounter = $('.needs-validation').find('textarea[name^="vopros_testa"]').length;
            const inputsCounter01 = (inputsCounter + 1);
            const inputName = 'vopros_testa' + (inputsCounter + 1);
            const inputforedit = 'for_edit' + (inputsCounter + 1);
            const inputforimg = 'for_img' + (inputsCounter + 1);

            const inputsCounter2 = $('.needs-validation').find('input[name^="rebate_image"]').length;
            const inputName2 = 'rebate_image' + (inputsCounter2 + 1);

            const inputsCounter3 = $('.needs-validation').find('img[id^="rebate_old_image"]').length;
            const inputName3 = 'rebate_old_image' + (inputsCounter3 + 1);

            const inputsCounter4 = $('.needs-validation').find('p[id^="nomer_voprosa"]').length;
            const inputName4 = 'nomer_voprosa' + (inputsCounter4 + 1);

            const inputName5 = 'variant_radio' + (inputsCounter4 + 1) + '[]';

            const inputName6 = 'variant_text' + (inputsCounter4 + 1) + '[]';

            const inputName7 = 'ball' + (inputsCounter4 + 1);

            $("#linksTable").append('<tr id="' + inputsCounter01 + '" class="vopros_testa"><td class="pt-2 pb-0 pr-0 pl-0"><div class="card card-primary card-outline for_peremestit"><div class="card-header pl-3 pr-2 pt-1 pb-1"><input type="number" name="' + inputforedit + '" value="0" hidden><div class="row"><div class="col"><p class="mb-0"><span class="number">1</span>-суроо</p></div><div class="col-auto text-muted"><i class="fas fa-grip-horizontal for_peremestit_1 card-header22"></i></div><div class="col text-right"><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button><button type="button" class="btn btn-tool remove-tr"><i class="fas fa-trash"></i></button></div></div></div></div><div class="card-body pb-2 pt-2 pr-3 pl-3 class11"><div class="row align-items-center"><div class="col"><textarea class="text11" rows="1" placeholder="Тесттин суроосун жазыңыз" name="' + inputName + '"></textarea></div><div class="col-auto"><label class="custom-file-upload p-0 m-0"><input type="file" class="upload" id="' + inputName2 + '" name="' + inputName2 + '" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i class="fas fa-image btn-tool pl-0 pr-0 mb-2"></i></label></div></div><div class="foto1 for_foto1 mb-2 mt-2"><img id="' + inputName3 + '" class="mb-2 shadow-sm" src="" alt="" style="width: 100%; border-radius: 4px;"><input id="' + inputforimg + '" type="number" name="' + inputforimg + '" value="0" hidden=""><div class="timeline foto2 for_foto2"><div><i class="fas fa-times bg-light remove-img" title="Удалить" type="button"></i></div></div></div><div class="row align-items-center for_delet_variant remove-variant"><div class="col"><label class="custom-radio"><input type="checkbox" name="' + inputName5 + '" value="1"><span><textarea class="text11" rows="1" cols="100%" placeholder="А" name="' + inputName6 + '">А</textarea></span></label><input type="hidden" name="' + inputName5 + '" value="0"></div><div class="col-auto card-tools"><i role="button" class="fas fa-trash btn-tool pl-0 pr-0 mb-2 remove-variant-click for_delet_variant_1"></i></div></div><div class="row align-items-center for_delet_variant remove-variant"><div class="col"><label class="custom-radio"><input type="checkbox" name="' + inputName5 + '" value="1"><span><textarea class="text11" rows="1" cols="100%" placeholder="Б" name="' + inputName6 + '">Б</textarea></span></label><input type="hidden" name="' + inputName5 + '" value="0"></div><div class="col-auto card-tools"><i role="button" class="fas fa-trash btn-tool pl-0 pr-0 mb-2 remove-variant-click for_delet_variant_1"></i></div></div><div class="row align-items-center for_delet_variant remove-variant"><div class="col"><label class="custom-radio"><input type="checkbox" name="' + inputName5 + '" value="1"><span><textarea class="text11" rows="1" cols="100%" placeholder="В" name="' + inputName6 + '">В</textarea></span></label><input type="hidden" name="' + inputName5 + '" value="0"></div><div class="col-auto card-tools"><i role="button" class="fas fa-trash btn-tool pl-0 pr-0 mb-2 remove-variant-click for_delet_variant_1"></i></div></div><div class="row align-items-center for_delet_variant remove-variant"><div class="col"><label class="custom-radio"><input type="checkbox" name="' + inputName5 + '" value="1"><span><textarea class="text11" rows="1" cols="100%" placeholder="Г" name="' + inputName6 + '">Г</textarea></span></label><input type="hidden" name="' + inputName5 + '" value="0"></div><div class="col-auto card-tools"><i role="button" class="fas fa-trash btn-tool pl-0 pr-0 mb-2 remove-variant-click for_delet_variant_1"></i></div></div><div class="sdsdsd"><p id="' + inputName4 + '" class="mb-0 text-right"><i class="fas fa-plus btn-tool variantvoprosaplus" role="button" title="Добавить вариант"> Вариант кошуу</i></p></div></div><div class="card-footer pl-3 pr-2 pt-1 pb-1"><div class="row"><div class="col-auto"></div><div class="col-auto text-muted"></div><div class="col text-right nowrap"><input type="number" pattern="\d+" name="' + inputName7 + '" min="0" max="999" maxlength="3" class="text11 text-right" placeholder="0" value="0" style="background: none; width: 45px;">балл</div></div></div></div></td></tr>');
        // Для добавления вопросов теста

        // Для нумерации вопросов теста
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {item.innerHTML = i+1+'';})
        // Для нумерации вопросов теста

        $(".remove-img").click(function () {
            const parentimg = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
            const idimg = 'rebate_image' + parentimg;
            const idsrcimg = 'rebate_old_image' + parentimg;

            $("#" + idimg).val("");
            $('#' + idsrcimg).removeAttr('src');
            $('#' + idsrcimg).show();
            $('#' + idsrcimg).parents('.foto1').hide();
           
        });
    }
    else{
        var Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 4000
        });
        Toast.fire({
            icon: 'error',
            title: '.. Сиз 30 тесттин баарын коштуңуз!'
        })
    } 
});

$(".remove-img2").click(function () {
    const parentimg = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
    const idsrcimg = 'rebate_old_image' + parentimg;
    const idsrcimg2 = 'for_img' + parentimg;
    
    $('#' + idsrcimg2).attr("value", "2");
    $('#' + idsrcimg).removeAttr('src');
    $('#' + idsrcimg).parents('.foto1').hide();
   
});

$(document).on('click', '.variantvoprosaplus', function(){    

            const parent_id = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
            
            const inputName8 = 'variant_radio' + parent_id + '[]';
            const inputName9 = 'variant_text' + parent_id + '[]';
    
            $(this).parents('.sdsdsd').before('<div class="row align-items-center for_delet_variant remove-variant"><div class="col"><label class="custom-radio"><input type="checkbox" name="' + inputName8 + '" value="1"><span><textarea class="text11" rows="1" cols="100%" placeholder="Жаңы вариант" name="' + inputName9 + '"></textarea></span></label><input type="hidden" name="' + inputName8 + '" value="0"></div><div class="col-auto card-tools"><i role="button" class="fas fa-trash btn-tool pl-0 pr-0 mb-2 remove-variant-click for_delet_variant_1"></i></div></div>');
            $(document).on("input", "textarea", function () {
                $(this).outerHeight(38).outerHeight(this.scrollHeight);
            });         
            checked();   
});


$(document).on('click', '.remove-variant-click', function(){
    $(this).parents('.remove-variant').remove();
});

$(document).on('click', '.remove-trtr', function(){
    const id_tr = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
    const name_tr = 'for_id' + id_tr;
    var input_tr = $("#" + name_tr).val();
    $("#linksTable0101").append('<input hidden type="number" name="delet_vopros[]" value="' + input_tr + '">');
    
});


  


            $(".remove-img").click(function () {
                const parentimg = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
                const idimg = 'rebate_image' + parentimg;
                const idsrcimg = 'rebate_old_image' + parentimg;

                $("#" + idimg).val("");
                $('#' + idsrcimg).removeAttr('src')
                $('#' + idsrcimg).show();
                $('#' + idsrcimg).parents('.foto1').hide();
               
            });
            


 // Для удаления и нумерации вопросов теста
            $(document).on('click', '.remove-tr', function(){
                var parentDiv = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                var parentDiv2 = parentDiv.getAttribute("id");
                var udalenie_voprosa = parseInt(parentDiv2, 10);

                $(this).parents('tr').remove();
                var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });

                
                clicks -= 1;
                document.getElementById("clicks").innerHTML = clicks;
                 


                if (udalenie_voprosa === 1){
                    for_id1(); for_id2(); for_id3(); for_id4(); for_id5(); for_id6(); for_id7(); for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 2){
                    for_id2(); for_id3(); for_id4(); for_id5(); for_id6(); for_id7(); for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 3){
                    for_id3(); for_id4(); for_id5(); for_id6(); for_id7(); for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 4){
                    for_id4(); for_id5(); for_id6(); for_id7(); for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 5){
                    for_id5(); for_id6(); for_id7(); for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 6){
                    for_id6(); for_id7(); for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 7){
                    for_id7(); for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 8){
                    for_id8(); for_id9(); for_id10(); for_id11(); for_id12(); for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 9){
                    for_id9(); for_id10(); for_id11(); for_id12();for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 10){
                    for_id10(); for_id11(); for_id12();for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 11){
                    for_id11(); for_id12();for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 12){
                    for_id12();for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 13){
                    for_id13(); for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 14){
                    for_id14(); for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 15){
                    for_id15(); for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 16){
                    for_id16(); for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 17){
                    for_id17(); for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 18){
                    for_id18(); for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 19){
                    for_id19(); for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 20){
                    for_id20(); for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 21){
                    for_id21(); for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 22){
                    for_id22(); for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 23){
                    for_id23(); for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 24){
                    for_id24(); for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 25){
                    for_id25(); for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 26){
                    for_id26(); for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 27){
                    for_id27(); for_id28(); for_id29();
                };
                if (udalenie_voprosa === 28){
                    for_id28(); for_id29();
                };
                if (udalenie_voprosa === 29){
                    for_id29();
                };

            });

            $(document).on('mousemove', '.content', function(){
                var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });
            });

//Для счета количество тестов 
             
//Для счета количество тестов

function for_id1() {
    $("[id='2']").each(function (i){$(this).attr("id", "1");})
    $("[name='for_edit2']").each(function (i){$(this).attr("name", "for_edit1");})
    $("[name='vopros_testa2']").each(function (i){$(this).attr("name", "vopros_testa1");})
    $("[id='rebate_image2']").each(function (i){$(this).attr("id", "rebate_image1");})
    $("[name='rebate_image2']").each(function (i){$(this).attr("name", "rebate_image1");})
    $("[id='rebate_old_image2']").each(function (i){$(this).attr("id", "rebate_old_image1");})
    $("[name='variant_radio2']").each(function (i){$(this).attr("name", "variant_radio1");})
    $("[name='variant_text2']").each(function (i){$(this).attr("name", "variant_text1");})
    $("[name='ball2']").each(function (i){$(this).attr("name", "ball1");})
    $("[id='for_img2']").each(function (i){$(this).attr("id", "for_img1");})
    $("[name='for_img2']").each(function (i){$(this).attr("name", "for_img1");})
    $("[id='for_id2']").each(function (i){$(this).attr("id", "for_id1");})
}
function for_id2() {
    $("[id='3']").each(function (i){$(this).attr("id", "2");})
    $("[name='for_edit3']").each(function (i){$(this).attr("name", "for_edit2");})
    $("[name='vopros_testa3']").each(function (i){$(this).attr("name", "vopros_testa2");})
    $("[id='rebate_image3']").each(function (i){$(this).attr("id", "rebate_image2");})
    $("[name='rebate_image3']").each(function (i){$(this).attr("name", "rebate_image2");})
    $("[id='rebate_old_image3']").each(function (i){$(this).attr("id", "rebate_old_image2");})
    $("[name='variant_radio3']").each(function (i){$(this).attr("name", "variant_radio2");})
    $("[name='variant_text3']").each(function (i){$(this).attr("name", "variant_text2");})
    $("[name='ball3']").each(function (i){$(this).attr("name", "ball2");})
    $("[id='for_img3']").each(function (i){$(this).attr("id", "for_img2");})
    $("[name='for_img3']").each(function (i){$(this).attr("name", "for_img2");})
    $("[id='for_id3']").each(function (i){$(this).attr("id", "for_id2");})
}
function for_id3() {
    $("[id='4']").each(function (i){$(this).attr("id", "3");})
    $("[name='for_edit4']").each(function (i){$(this).attr("name", "for_edit3");})
    $("[name='vopros_testa4']").each(function (i){$(this).attr("name", "vopros_testa3");})
    $("[id='rebate_image4']").each(function (i){$(this).attr("id", "rebate_image3");})
    $("[name='rebate_image4']").each(function (i){$(this).attr("name", "rebate_image3");})
    $("[id='rebate_old_image4']").each(function (i){$(this).attr("id", "rebate_old_image3");})
    $("[name='variant_radio4']").each(function (i){$(this).attr("name", "variant_radio3");})
    $("[name='variant_text4']").each(function (i){$(this).attr("name", "variant_text3");})
    $("[name='ball4']").each(function (i){$(this).attr("name", "ball3");})
    $("[id='for_img4']").each(function (i){$(this).attr("id", "for_img3");})
    $("[name='for_img4']").each(function (i){$(this).attr("name", "for_img3");})
    $("[id='for_id4']").each(function (i){$(this).attr("id", "for_id3");})
}
function for_id4() {
    $("[id='5']").each(function (i){$(this).attr("id", "4");})
    $("[name='for_edit5']").each(function (i){$(this).attr("name", "for_edit4");})
    $("[name='vopros_testa5']").each(function (i){$(this).attr("name", "vopros_testa4");})
    $("[id='rebate_image5']").each(function (i){$(this).attr("id", "rebate_image4");})
    $("[name='rebate_image5']").each(function (i){$(this).attr("name", "rebate_image4");})
    $("[id='rebate_old_image5']").each(function (i){$(this).attr("id", "rebate_old_image4");})
    $("[name='variant_radio5']").each(function (i){$(this).attr("name", "variant_radio4");})
    $("[name='variant_text5']").each(function (i){$(this).attr("name", "variant_text4");})
    $("[name='ball5']").each(function (i){$(this).attr("name", "ball4");})
    $("[id='for_img5']").each(function (i){$(this).attr("id", "for_img4");})
    $("[name='for_img5']").each(function (i){$(this).attr("name", "for_img4");})
    $("[id='for_id5']").each(function (i){$(this).attr("id", "for_id5");})
}
function for_id5() {
    $("[id='6']").each(function (i){$(this).attr("id", "5");})
    $("[name='for_edit6']").each(function (i){$(this).attr("name", "for_edit5");})
    $("[name='vopros_testa6']").each(function (i){$(this).attr("name", "vopros_testa5");})
    $("[id='rebate_image6']").each(function (i){$(this).attr("id", "rebate_image5");})
    $("[name='rebate_image6']").each(function (i){$(this).attr("name", "rebate_image5");})
    $("[id='rebate_old_image6']").each(function (i){$(this).attr("id", "rebate_old_image5");})
    $("[name='variant_radio6']").each(function (i){$(this).attr("name", "variant_radio5");})
    $("[name='variant_text6']").each(function (i){$(this).attr("name", "variant_text5");})
    $("[name='ball6']").each(function (i){$(this).attr("name", "ball5");})
    $("[id='for_img6']").each(function (i){$(this).attr("id", "for_img5");})
    $("[name='for_img6']").each(function (i){$(this).attr("name", "for_img5");})
    $("[id='for_id6']").each(function (i){$(this).attr("id", "for_id5");})
}
function for_id6() {
    $("[id='7']").each(function (i){$(this).attr("id", "6");})
    $("[name='for_edit7']").each(function (i){$(this).attr("name", "for_edit6");})
    $("[name='vopros_testa7']").each(function (i){$(this).attr("name", "vopros_testa6");})
    $("[id='rebate_image7']").each(function (i){$(this).attr("id", "rebate_image6");})
    $("[name='rebate_image7']").each(function (i){$(this).attr("name", "rebate_image6");})
    $("[id='rebate_old_image7']").each(function (i){$(this).attr("id", "rebate_old_image6");})
    $("[name='variant_radio7']").each(function (i){$(this).attr("name", "variant_radio6");})
    $("[name='variant_text7']").each(function (i){$(this).attr("name", "variant_text6");})
    $("[name='ball7']").each(function (i){$(this).attr("name", "ball6");})
    $("[id='for_img7']").each(function (i){$(this).attr("id", "for_img6");})
    $("[name='for_img7']").each(function (i){$(this).attr("name", "for_img6");})
    $("[id='for_id7']").each(function (i){$(this).attr("id", "for_id6");})
}
function for_id7() {
    $("[id='8']").each(function (i){$(this).attr("id", "7");})
    $("[name='for_edit8']").each(function (i){$(this).attr("name", "for_edit7");})
    $("[name='vopros_testa8']").each(function (i){$(this).attr("name", "vopros_testa7");})
    $("[id='rebate_image8']").each(function (i){$(this).attr("id", "rebate_image7");})
    $("[name='rebate_image8']").each(function (i){$(this).attr("name", "rebate_image7");})
    $("[id='rebate_old_image8']").each(function (i){$(this).attr("id", "rebate_old_image7");})
    $("[name='variant_radio8']").each(function (i){$(this).attr("name", "variant_radio7");})
    $("[name='variant_text8']").each(function (i){$(this).attr("name", "variant_text7");})
    $("[name='ball8']").each(function (i){$(this).attr("name", "ball7");})
    $("[id='for_img8']").each(function (i){$(this).attr("id", "for_img7");})
    $("[name='for_img8']").each(function (i){$(this).attr("name", "for_img7");})
    $("[id='for_id8']").each(function (i){$(this).attr("id", "for_id7");})
}
function for_id8() {
    $("[id='9']").each(function (i){$(this).attr("id", "8");})
    $("[name='for_edit9']").each(function (i){$(this).attr("name", "for_edit8");})
    $("[name='vopros_testa9']").each(function (i){$(this).attr("name", "vopros_testa8");})
    $("[id='rebate_image9']").each(function (i){$(this).attr("id", "rebate_image8");})
    $("[name='rebate_image9']").each(function (i){$(this).attr("name", "rebate_image8");})
    $("[id='rebate_old_image9']").each(function (i){$(this).attr("id", "rebate_old_image8");})
    $("[name='variant_radio9']").each(function (i){$(this).attr("name", "variant_radio8");})
    $("[name='variant_text9']").each(function (i){$(this).attr("name", "variant_text8");})
    $("[name='ball9']").each(function (i){$(this).attr("name", "ball8");})
    $("[id='for_img9']").each(function (i){$(this).attr("id", "for_img8");})
    $("[name='for_img9']").each(function (i){$(this).attr("name", "for_img8");})
    $("[id='for_id9']").each(function (i){$(this).attr("id", "for_id8");})
}
function for_id9() {
    $("[id='10']").each(function (i){$(this).attr("id", "9");})
    $("[name='for_edit10']").each(function (i){$(this).attr("name", "for_edit9");})
    $("[name='vopros_testa10']").each(function (i){$(this).attr("name", "vopros_testa9");})
    $("[id='rebate_image10']").each(function (i){$(this).attr("id", "rebate_image9");})
    $("[name='rebate_image10']").each(function (i){$(this).attr("name", "rebate_image9");})
    $("[id='rebate_old_image10']").each(function (i){$(this).attr("id", "rebate_old_image9");})
    $("[name='variant_radio10']").each(function (i){$(this).attr("name", "variant_radio9");})
    $("[name='variant_text10']").each(function (i){$(this).attr("name", "variant_text9");})
    $("[name='ball10']").each(function (i){$(this).attr("name", "ball9");})
    $("[id='for_img10']").each(function (i){$(this).attr("id", "for_img9");})
    $("[name='for_img10']").each(function (i){$(this).attr("name", "for_img9");})
    $("[id='for_id10']").each(function (i){$(this).attr("id", "for_id9");})
}
function for_id10() {
    $("[id='11']").each(function (i){$(this).attr("id", "10");})
    $("[name='for_edit11']").each(function (i){$(this).attr("name", "for_edit10");})
    $("[name='vopros_testa11']").each(function (i){$(this).attr("name", "vopros_testa10");})
    $("[id='rebate_image11']").each(function (i){$(this).attr("id", "rebate_image10");})
    $("[name='rebate_image11']").each(function (i){$(this).attr("name", "rebate_image10");})
    $("[id='rebate_old_image11']").each(function (i){$(this).attr("id", "rebate_old_image10");})
    $("[name='variant_radio11']").each(function (i){$(this).attr("name", "variant_radio10");})
    $("[name='variant_text11']").each(function (i){$(this).attr("name", "variant_text10");})
    $("[name='ball11']").each(function (i){$(this).attr("name", "ball10");})
    $("[id='for_img11']").each(function (i){$(this).attr("id", "for_img10");})
    $("[name='for_img11']").each(function (i){$(this).attr("name", "for_img10");})
    $("[id='for_id11']").each(function (i){$(this).attr("id", "for_id10");})
}
function for_id11() {
    $("[id='12']").each(function (i){$(this).attr("id", "11");})
    $("[name='for_edit12']").each(function (i){$(this).attr("name", "for_edit11");})
    $("[name='vopros_testa12']").each(function (i){$(this).attr("name", "vopros_testa11");})
    $("[id='rebate_image12']").each(function (i){$(this).attr("id", "rebate_image11");})
    $("[name='rebate_image12']").each(function (i){$(this).attr("name", "rebate_image11");})
    $("[id='rebate_old_image12']").each(function (i){$(this).attr("id", "rebate_old_image11");})
    $("[name='variant_radio12']").each(function (i){$(this).attr("name", "variant_radio11");})
    $("[name='variant_text12']").each(function (i){$(this).attr("name", "variant_text11");})
    $("[name='ball12']").each(function (i){$(this).attr("name", "ball11");})
    $("[id='for_img12']").each(function (i){$(this).attr("id", "for_img11");})
    $("[name='for_img12']").each(function (i){$(this).attr("name", "for_img11");})
    $("[id='for_id12']").each(function (i){$(this).attr("id", "for_id11");})
}
function for_id12() {
    $("[id='13']").each(function (i){$(this).attr("id", "12");})
    $("[name='for_edit13']").each(function (i){$(this).attr("name", "for_edit12");})
    $("[name='vopros_testa13']").each(function (i){$(this).attr("name", "vopros_testa12");})
    $("[id='rebate_image13']").each(function (i){$(this).attr("id", "rebate_image12");})
    $("[name='rebate_image13']").each(function (i){$(this).attr("name", "rebate_image12");})
    $("[id='rebate_old_image13']").each(function (i){$(this).attr("id", "rebate_old_image12");})
    $("[name='variant_radio13']").each(function (i){$(this).attr("name", "variant_radio12");})
    $("[name='variant_text13']").each(function (i){$(this).attr("name", "variant_text12");})
    $("[name='ball13']").each(function (i){$(this).attr("name", "ball12");})
    $("[id='for_img13']").each(function (i){$(this).attr("id", "for_img12");})
    $("[name='for_img13']").each(function (i){$(this).attr("name", "for_img12");})
    $("[id='for_id13']").each(function (i){$(this).attr("id", "for_id12");})
}
function for_id13() {
    $("[id='14']").each(function (i){$(this).attr("id", "13");})
    $("[name='for_edit14']").each(function (i){$(this).attr("name", "for_edit13");})
    $("[name='vopros_testa14']").each(function (i){$(this).attr("name", "vopros_testa13");})
    $("[id='rebate_image14']").each(function (i){$(this).attr("id", "rebate_image13");})
    $("[name='rebate_image14']").each(function (i){$(this).attr("name", "rebate_image13");})
    $("[id='rebate_old_image14']").each(function (i){$(this).attr("id", "rebate_old_image13");})
    $("[name='variant_radio14']").each(function (i){$(this).attr("name", "variant_radio13");})
    $("[name='variant_text14']").each(function (i){$(this).attr("name", "variant_text13");})
    $("[name='ball14']").each(function (i){$(this).attr("name", "ball13");})
    $("[id='for_img14']").each(function (i){$(this).attr("id", "for_img13");})
    $("[name='for_img14']").each(function (i){$(this).attr("name", "for_img13");})
    $("[id='for_id14']").each(function (i){$(this).attr("id", "for_id13");})
}
function for_id14() {
    $("[id='15']").each(function (i){$(this).attr("id", "14");})
    $("[name='for_edit15']").each(function (i){$(this).attr("name", "for_edit14");})
    $("[name='vopros_testa15']").each(function (i){$(this).attr("name", "vopros_testa14");})
    $("[id='rebate_image15']").each(function (i){$(this).attr("id", "rebate_image14");})
    $("[name='rebate_image15']").each(function (i){$(this).attr("name", "rebate_image14");})
    $("[id='rebate_old_image15']").each(function (i){$(this).attr("id", "rebate_old_image14");})
    $("[name='variant_radio15']").each(function (i){$(this).attr("name", "variant_radio14");})
    $("[name='variant_text15']").each(function (i){$(this).attr("name", "variant_text14");})
    $("[name='ball15']").each(function (i){$(this).attr("name", "ball14");})
    $("[id='for_img15']").each(function (i){$(this).attr("id", "for_img14");})
    $("[name='for_img15']").each(function (i){$(this).attr("name", "for_img14");})
    $("[id='for_id15']").each(function (i){$(this).attr("id", "for_id14");})
}
function for_id15() {
    $("[id='16']").each(function (i){$(this).attr("id", "15");})
    $("[name='for_edit16']").each(function (i){$(this).attr("name", "for_edit15");})
    $("[name='vopros_testa16']").each(function (i){$(this).attr("name", "vopros_testa15");})
    $("[id='rebate_image16']").each(function (i){$(this).attr("id", "rebate_image15");})
    $("[name='rebate_image16']").each(function (i){$(this).attr("name", "rebate_image15");})
    $("[id='rebate_old_image16']").each(function (i){$(this).attr("id", "rebate_old_image15");})
    $("[name='variant_radio16']").each(function (i){$(this).attr("name", "variant_radio15");})
    $("[name='variant_text16']").each(function (i){$(this).attr("name", "variant_text15");})
    $("[name='ball16']").each(function (i){$(this).attr("name", "ball15");})
    $("[id='for_img16']").each(function (i){$(this).attr("id", "for_img15");})
    $("[name='for_img16']").each(function (i){$(this).attr("name", "for_img15");})
    $("[id='for_id16']").each(function (i){$(this).attr("id", "for_id15");})
}
function for_id16() {
    $("[id='17']").each(function (i){$(this).attr("id", "16");})
    $("[name='for_edit17']").each(function (i){$(this).attr("name", "for_edit16");})
    $("[name='vopros_testa17']").each(function (i){$(this).attr("name", "vopros_testa16");})
    $("[id='rebate_image17']").each(function (i){$(this).attr("id", "rebate_image16");})
    $("[name='rebate_image17']").each(function (i){$(this).attr("name", "rebate_image16");})
    $("[id='rebate_old_image17']").each(function (i){$(this).attr("id", "rebate_old_image16");})
    $("[name='variant_radio17']").each(function (i){$(this).attr("name", "variant_radio16");})
    $("[name='variant_text17']").each(function (i){$(this).attr("name", "variant_text16");})
    $("[name='ball17']").each(function (i){$(this).attr("name", "ball16");})
    $("[id='for_img17']").each(function (i){$(this).attr("id", "for_img16");})
    $("[name='for_img17']").each(function (i){$(this).attr("name", "for_img16");})
    $("[id='for_id17']").each(function (i){$(this).attr("id", "for_id16");})
}
function for_id17() {
    $("[id='18']").each(function (i){$(this).attr("id", "17");})
    $("[name='for_edit18']").each(function (i){$(this).attr("name", "for_edit17");})
    $("[name='vopros_testa18']").each(function (i){$(this).attr("name", "vopros_testa17");})
    $("[id='rebate_image18']").each(function (i){$(this).attr("id", "rebate_image17");})
    $("[name='rebate_image18']").each(function (i){$(this).attr("name", "rebate_image17");})
    $("[id='rebate_old_image18']").each(function (i){$(this).attr("id", "rebate_old_image17");})
    $("[name='variant_radio18']").each(function (i){$(this).attr("name", "variant_radio17");})
    $("[name='variant_text18']").each(function (i){$(this).attr("name", "variant_text17");})
    $("[name='ball18']").each(function (i){$(this).attr("name", "ball17");})
    $("[id='for_img18']").each(function (i){$(this).attr("id", "for_img17");})
    $("[name='for_img18']").each(function (i){$(this).attr("name", "for_img17");})
    $("[id='for_id18']").each(function (i){$(this).attr("id", "for_id17");})
}
function for_id18() {
    $("[id='19']").each(function (i){$(this).attr("id", "18");})
    $("[name='for_edit19']").each(function (i){$(this).attr("name", "for_edit18");})
    $("[name='vopros_testa19']").each(function (i){$(this).attr("name", "vopros_testa18");})
    $("[id='rebate_image19']").each(function (i){$(this).attr("id", "rebate_image18");})
    $("[name='rebate_image19']").each(function (i){$(this).attr("name", "rebate_image18");})
    $("[id='rebate_old_image19']").each(function (i){$(this).attr("id", "rebate_old_image18");})
    $("[name='variant_radio19']").each(function (i){$(this).attr("name", "variant_radio18");})
    $("[name='variant_text19']").each(function (i){$(this).attr("name", "variant_text18");})
    $("[name='ball19']").each(function (i){$(this).attr("name", "ball18");})
    $("[id='for_img19']").each(function (i){$(this).attr("id", "for_img18");})
    $("[name='for_img19']").each(function (i){$(this).attr("name", "for_img18");})
    $("[id='for_id19']").each(function (i){$(this).attr("id", "for_id18");})
}
function for_id19() {
    $("[id='20']").each(function (i){$(this).attr("id", "19");})
    $("[name='for_edit20']").each(function (i){$(this).attr("name", "for_edit19");})
    $("[name='vopros_testa20']").each(function (i){$(this).attr("name", "vopros_testa19");})
    $("[id='rebate_image20']").each(function (i){$(this).attr("id", "rebate_image19");})
    $("[name='rebate_image20']").each(function (i){$(this).attr("name", "rebate_image19");})
    $("[id='rebate_old_image20']").each(function (i){$(this).attr("id", "rebate_old_image19");})
    $("[name='variant_radio20']").each(function (i){$(this).attr("name", "variant_radio19");})
    $("[name='variant_text20']").each(function (i){$(this).attr("name", "variant_text19");})
    $("[name='ball20']").each(function (i){$(this).attr("name", "ball19");})
    $("[id='for_img20']").each(function (i){$(this).attr("id", "for_img19");})
    $("[name='for_img20']").each(function (i){$(this).attr("name", "for_img19");})
    $("[id='for_id20']").each(function (i){$(this).attr("id", "for_id19");})
}
function for_id20() {
    $("[id='21']").each(function (i){$(this).attr("id", "20");})
    $("[name='for_edit21']").each(function (i){$(this).attr("name", "for_edit20");})
    $("[name='vopros_testa21']").each(function (i){$(this).attr("name", "vopros_testa20");})
    $("[id='rebate_image21']").each(function (i){$(this).attr("id", "rebate_image20");})
    $("[name='rebate_image21']").each(function (i){$(this).attr("name", "rebate_image20");})
    $("[id='rebate_old_image21']").each(function (i){$(this).attr("id", "rebate_old_image20");})
    $("[name='variant_radio21']").each(function (i){$(this).attr("name", "variant_radio20");})
    $("[name='variant_text21']").each(function (i){$(this).attr("name", "variant_text20");})
    $("[name='ball21']").each(function (i){$(this).attr("name", "ball20");})
    $("[id='for_img21']").each(function (i){$(this).attr("id", "for_img20");})
    $("[name='for_img21']").each(function (i){$(this).attr("name", "for_img20");})
    $("[id='for_id21']").each(function (i){$(this).attr("id", "for_id20");})
}
function for_id21() {
    $("[id='22']").each(function (i){$(this).attr("id", "21");})
    $("[name='for_edit22']").each(function (i){$(this).attr("name", "for_edit21");})
    $("[name='vopros_testa22']").each(function (i){$(this).attr("name", "vopros_testa21");})
    $("[id='rebate_image22']").each(function (i){$(this).attr("id", "rebate_image21");})
    $("[name='rebate_image22']").each(function (i){$(this).attr("name", "rebate_image21");})
    $("[id='rebate_old_image22']").each(function (i){$(this).attr("id", "rebate_old_image21");})
    $("[name='variant_radio22']").each(function (i){$(this).attr("name", "variant_radio21");})
    $("[name='variant_text22']").each(function (i){$(this).attr("name", "variant_text21");})
    $("[name='ball22']").each(function (i){$(this).attr("name", "ball21");})
    $("[id='for_img22']").each(function (i){$(this).attr("id", "for_img21");})
    $("[name='for_img22']").each(function (i){$(this).attr("name", "for_img21");})
    $("[id='for_id22']").each(function (i){$(this).attr("id", "for_id21");})
}
function for_id22() {
    $("[id='23']").each(function (i){$(this).attr("id", "22");})
    $("[name='for_edit23']").each(function (i){$(this).attr("name", "for_edit22");})
    $("[name='vopros_testa23']").each(function (i){$(this).attr("name", "vopros_testa22");})
    $("[id='rebate_image23']").each(function (i){$(this).attr("id", "rebate_image22");})
    $("[name='rebate_image23']").each(function (i){$(this).attr("name", "rebate_image22");})
    $("[id='rebate_old_image23']").each(function (i){$(this).attr("id", "rebate_old_image22");})
    $("[name='variant_radio23']").each(function (i){$(this).attr("name", "variant_radio22");})
    $("[name='variant_text23']").each(function (i){$(this).attr("name", "variant_text22");})
    $("[name='ball23']").each(function (i){$(this).attr("name", "ball22");})
    $("[id='for_img23']").each(function (i){$(this).attr("id", "for_img22");})
    $("[name='for_img23']").each(function (i){$(this).attr("name", "for_img22");})
    $("[id='for_id23']").each(function (i){$(this).attr("id", "for_id22");})
}
function for_id23() {
    $("[id='24']").each(function (i){$(this).attr("id", "23");})
    $("[name='for_edit24']").each(function (i){$(this).attr("name", "for_edit23");})
    $("[name='vopros_testa24']").each(function (i){$(this).attr("name", "vopros_testa23");})
    $("[id='rebate_image24']").each(function (i){$(this).attr("id", "rebate_image23");})
    $("[name='rebate_image24']").each(function (i){$(this).attr("name", "rebate_image23");})
    $("[id='rebate_old_image24']").each(function (i){$(this).attr("id", "rebate_old_image23");})
    $("[name='variant_radio24']").each(function (i){$(this).attr("name", "variant_radio23");})
    $("[name='variant_text24']").each(function (i){$(this).attr("name", "variant_text23");})
    $("[name='ball24']").each(function (i){$(this).attr("name", "ball23");})
    $("[id='for_img24']").each(function (i){$(this).attr("id", "for_img23");})
    $("[name='for_img24']").each(function (i){$(this).attr("name", "for_img23");})
    $("[id='for_id24']").each(function (i){$(this).attr("id", "for_id23");})
}
function for_id24() {
    $("[id='25']").each(function (i){$(this).attr("id", "24");})
    $("[name='for_edit25']").each(function (i){$(this).attr("name", "for_edit24");})
    $("[name='vopros_testa25']").each(function (i){$(this).attr("name", "vopros_testa24");})
    $("[id='rebate_image25']").each(function (i){$(this).attr("id", "rebate_image24");})
    $("[name='rebate_image25']").each(function (i){$(this).attr("name", "rebate_image24");})
    $("[id='rebate_old_image25']").each(function (i){$(this).attr("id", "rebate_old_image24");})
    $("[name='variant_radio25']").each(function (i){$(this).attr("name", "variant_radio24");})
    $("[name='variant_text25']").each(function (i){$(this).attr("name", "variant_text24");})
    $("[name='ball25']").each(function (i){$(this).attr("name", "ball24");})
    $("[id='for_img25']").each(function (i){$(this).attr("id", "for_img24");})
    $("[name='for_img25']").each(function (i){$(this).attr("name", "for_img24");})
    $("[id='for_id25']").each(function (i){$(this).attr("id", "for_id24");})
}
function for_id25() {
    $("[id='26']").each(function (i){$(this).attr("id", "25");})
    $("[name='for_edit26']").each(function (i){$(this).attr("name", "for_edit25");})
    $("[name='vopros_testa26']").each(function (i){$(this).attr("name", "vopros_testa25");})
    $("[id='rebate_image26']").each(function (i){$(this).attr("id", "rebate_image25");})
    $("[name='rebate_image26']").each(function (i){$(this).attr("name", "rebate_image25");})
    $("[id='rebate_old_image26']").each(function (i){$(this).attr("id", "rebate_old_image25");})
    $("[name='variant_radio26']").each(function (i){$(this).attr("name", "variant_radio25");})
    $("[name='variant_text26']").each(function (i){$(this).attr("name", "variant_text25");})
    $("[name='ball26']").each(function (i){$(this).attr("name", "ball25");})
    $("[id='for_img26']").each(function (i){$(this).attr("id", "for_img25");})
    $("[name='for_img26']").each(function (i){$(this).attr("name", "for_img25");})
    $("[id='for_id26']").each(function (i){$(this).attr("id", "for_id25");})
}
function for_id26() {
    $("[id='27']").each(function (i){$(this).attr("id", "26");})
    $("[name='for_edit27']").each(function (i){$(this).attr("name", "for_edit26");})
    $("[name='vopros_testa27']").each(function (i){$(this).attr("name", "vopros_testa26");})
    $("[id='rebate_image27']").each(function (i){$(this).attr("id", "rebate_image26");})
    $("[name='rebate_image27']").each(function (i){$(this).attr("name", "rebate_image26");})
    $("[id='rebate_old_image27']").each(function (i){$(this).attr("id", "rebate_old_image26");})
    $("[name='variant_radio27']").each(function (i){$(this).attr("name", "variant_radio26");})
    $("[name='variant_text27']").each(function (i){$(this).attr("name", "variant_text26");})
    $("[name='ball27']").each(function (i){$(this).attr("name", "ball26");})
    $("[id='for_img27']").each(function (i){$(this).attr("id", "for_img26");})
    $("[name='for_img27']").each(function (i){$(this).attr("name", "for_img26");})
    $("[id='for_id27']").each(function (i){$(this).attr("id", "for_id26");})
}
function for_id27() {
    $("[id='28']").each(function (i){$(this).attr("id", "27");})
    $("[name='for_edit28']").each(function (i){$(this).attr("name", "for_edit27");})
    $("[name='vopros_testa28']").each(function (i){$(this).attr("name", "vopros_testa27");})
    $("[id='rebate_image28']").each(function (i){$(this).attr("id", "rebate_image27");})
    $("[name='rebate_image28']").each(function (i){$(this).attr("name", "rebate_image27");})
    $("[id='rebate_old_image28']").each(function (i){$(this).attr("id", "rebate_old_image27");})
    $("[name='variant_radio28']").each(function (i){$(this).attr("name", "variant_radio27");})
    $("[name='variant_text28']").each(function (i){$(this).attr("name", "variant_text27");})
    $("[name='ball28']").each(function (i){$(this).attr("name", "ball27");})
    $("[id='for_img28']").each(function (i){$(this).attr("id", "for_img27");})
    $("[name='for_img28']").each(function (i){$(this).attr("name", "for_img27");})
    $("[id='for_id28']").each(function (i){$(this).attr("id", "for_id27");})
}
function for_id28() {
    $("[id='29']").each(function (i){$(this).attr("id", "28");})
    $("[name='for_edit29']").each(function (i){$(this).attr("name", "for_edit28");})
    $("[name='vopros_testa29']").each(function (i){$(this).attr("name", "vopros_testa28");})
    $("[id='rebate_image29']").each(function (i){$(this).attr("id", "rebate_image28");})
    $("[name='rebate_image29']").each(function (i){$(this).attr("name", "rebate_image28");})
    $("[id='rebate_old_image29']").each(function (i){$(this).attr("id", "rebate_old_image28");})
    $("[name='variant_radio29']").each(function (i){$(this).attr("name", "variant_radio28");})
    $("[name='variant_text29']").each(function (i){$(this).attr("name", "variant_text28");})
    $("[name='ball29']").each(function (i){$(this).attr("name", "ball28");})
    $("[id='for_img29']").each(function (i){$(this).attr("id", "for_img28");})
    $("[name='for_img29']").each(function (i){$(this).attr("name", "for_img28");})
    $("[id='for_id29']").each(function (i){$(this).attr("id", "for_id28");})
}
function for_id29() {
    $("[id='30']").each(function (i){$(this).attr("id", "29");})
    $("[name='for_edit30']").each(function (i){$(this).attr("name", "for_edit29");})
    $("[name='vopros_testa30']").each(function (i){$(this).attr("name", "vopros_testa29");})
    $("[id='rebate_image30']").each(function (i){$(this).attr("id", "rebate_image29");})
    $("[name='rebate_image30']").each(function (i){$(this).attr("name", "rebate_image29");})
    $("[id='rebate_old_image30']").each(function (i){$(this).attr("id", "rebate_old_image29");})
    $("[name='variant_radio30']").each(function (i){$(this).attr("name", "variant_radio29");})
    $("[name='variant_text30']").each(function (i){$(this).attr("name", "variant_text29");})
    $("[name='ball30']").each(function (i){$(this).attr("name", "ball29");})
    $("[id='for_img30']").each(function (i){$(this).attr("id", "for_img29");})
    $("[name='for_img30']").each(function (i){$(this).attr("name", "for_img29");})
    $("[id='for_id30']").each(function (i){$(this).attr("id", "for_id29");})
}

function checked() {
            $('input[name="variant_radio1[]"]').on('change', function() {
               $('input[name="variant_radio1[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio2[]"]').on('change', function() {
               $('input[name="variant_radio2[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio3[]"]').on('change', function() {
               $('input[name="variant_radio3[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio4[]"]').on('change', function() {
               $('input[name="variant_radio4[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio5[]"]').on('change', function() {
               $('input[name="variant_radio5[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio6[]"]').on('change', function() {
               $('input[name="variant_radio6[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio7[]"]').on('change', function() {
               $('input[name="variant_radio7[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio8[]"]').on('change', function() {
               $('input[name="variant_radio8[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio9[]"]').on('change', function() {
               $('input[name="variant_radio9[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio10[]"]').on('change', function() {
               $('input[name="variant_radio10[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio11[]"]').on('change', function() {
               $('input[name="variant_radio11[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio12[]"]').on('change', function() {
               $('input[name="variant_radio12[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio13[]"]').on('change', function() {
               $('input[name="variant_radio13[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio14[]"]').on('change', function() {
               $('input[name="variant_radio14[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio15[]"]').on('change', function() {
               $('input[name="variant_radio15[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio16[]"]').on('change', function() {
               $('input[name="variant_radio16[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio17[]"]').on('change', function() {
               $('input[name="variant_radio17[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio18[]"]').on('change', function() {
               $('input[name="variant_radio18[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio19[]"]').on('change', function() {
               $('input[name="variant_radio19[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio20[]"]').on('change', function() {
               $('input[name="variant_radio20[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio21[]"]').on('change', function() {
               $('input[name="variant_radio21[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio22[]"]').on('change', function() {
               $('input[name="variant_radio22[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio23[]"]').on('change', function() {
               $('input[name="variant_radio23[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio24[]"]').on('change', function() {
               $('input[name="variant_radio24[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio25[]"]').on('change', function() {
               $('input[name="variant_radio25[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio26[]"]').on('change', function() {
               $('input[name="variant_radio26[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio27[]"]').on('change', function() {
               $('input[name="variant_radio27[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio28[]"]').on('change', function() {
               $('input[name="variant_radio28[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio29[]"]').on('change', function() {
               $('input[name="variant_radio29[]"]').not(this).prop('checked', false);
            });
            $('input[name="variant_radio30[]"]').on('change', function() {
               $('input[name="variant_radio30[]"]').not(this).prop('checked', false);
            });
        }
// Для удаления и нумерации вопросов теста 

</script>





<!-- Для добавления картинки после нажатия кнопки добавить вопрос-->
<script type="text/javascript">         

            $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#rebate_old_image1').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                        $('#rebate_old_image1').parents('.foto1').show();
                    }
                }
                $("#rebate_image1").change(function(){readURL(this);});
            });

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image2').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image2').parents('.foto1').show();}}
                    $("#rebate_image2").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image3').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image3').parents('.foto1').show();}}
                    $("#rebate_image3").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image4').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image4').parents('.foto1').show();}}
                    $("#rebate_image4").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image5').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image5').parents('.foto1').show();}}
                    $("#rebate_image5").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image6').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image6').parents('.foto1').show();}}
                    $("#rebate_image6").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image7').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image7').parents('.foto1').show();}}
                    $("#rebate_image7").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image8').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image8').parents('.foto1').show();}}
                    $("#rebate_image8").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image9').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image9').parents('.foto1').show();}}
                    $("#rebate_image9").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image10').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image10').parents('.foto1').show();}}
                    $("#rebate_image10").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image11').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image11').parents('.foto1').show();}}
                    $("#rebate_image11").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image12').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image12').parents('.foto1').show();}}
                    $("#rebate_image12").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image13').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image13').parents('.foto1').show();}}
                    $("#rebate_image13").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image14').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image14').parents('.foto1').show();}}
                    $("#rebate_image14").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image15').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image15').parents('.foto1').show();}}
                    $("#rebate_image15").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image16').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image16').parents('.foto1').show();}}
                    $("#rebate_image16").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image17').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image17').parents('.foto1').show();}}
                    $("#rebate_image17").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image18').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image18').parents('.foto1').show();}}
                    $("#rebate_image18").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image19').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image19').parents('.foto1').show();}}
                    $("#rebate_image19").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image20').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image20').parents('.foto1').show();}}
                    $("#rebate_image20").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image21').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image21').parents('.foto1').show();}}
                    $("#rebate_image21").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image22').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image22').parents('.foto1').show();}}
                    $("#rebate_image22").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image23').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image23').parents('.foto1').show();}}
                    $("#rebate_image23").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image24').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image24').parents('.foto1').show();}}
                    $("#rebate_image24").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image25').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image25').parents('.foto1').show();}}
                    $("#rebate_image25").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image26').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image26').parents('.foto1').show();}}
                    $("#rebate_image26").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image27').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image27').parents('.foto1').show();}}
                    $("#rebate_image27").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image28').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image28').parents('.foto1').show();}}
                    $("#rebate_image28").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image29').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image29').parents('.foto1').show();}}
                    $("#rebate_image29").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image30').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image30').parents('.foto1').show();}}
                    $("#rebate_image30").change(function(){readURL(this);});});

// Для добавления картинки 
    $(document).on('click', '.ret', function(){
        checked();
            // отображения картинки
            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image1').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                $('#rebate_old_image1').parents('.foto1').show();}}
                    $("#rebate_image1").change(function(){readURL(this);});});
            // отображения картинки


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image2').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image2').parents('.foto1').show();}}
                    $("#rebate_image2").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image3').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image3').parents('.foto1').show();}}
                    $("#rebate_image3").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image4').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image4').parents('.foto1').show();}}
                    $("#rebate_image4").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image5').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image5').parents('.foto1').show();}}
                    $("#rebate_image5").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image6').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image6').parents('.foto1').show();}}
                    $("#rebate_image6").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image7').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image7').parents('.foto1').show();}}
                    $("#rebate_image7").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image8').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image8').parents('.foto1').show();}}
                    $("#rebate_image8").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image9').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image9').parents('.foto1').show();}}
                    $("#rebate_image9").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image10').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image10').parents('.foto1').show();}}
                    $("#rebate_image10").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image11').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image11').parents('.foto1').show();}}
                    $("#rebate_image11").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image12').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image12').parents('.foto1').show();}}
                    $("#rebate_image12").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image13').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image13').parents('.foto1').show();}}
                    $("#rebate_image13").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image14').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image14').parents('.foto1').show();}}
                    $("#rebate_image14").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image15').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image15').parents('.foto1').show();}}
                    $("#rebate_image15").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image16').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image16').parents('.foto1').show();}}
                    $("#rebate_image16").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image17').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image17').parents('.foto1').show();}}
                    $("#rebate_image17").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image18').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image18').parents('.foto1').show();}}
                    $("#rebate_image18").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image19').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image19').parents('.foto1').show();}}
                    $("#rebate_image19").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image20').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image20').parents('.foto1').show();}}
                    $("#rebate_image20").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image21').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image21').parents('.foto1').show();}}
                    $("#rebate_image21").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image22').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image22').parents('.foto1').show();}}
                    $("#rebate_image22").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image23').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image23').parents('.foto1').show();}}
                    $("#rebate_image23").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image24').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image24').parents('.foto1').show();}}
                    $("#rebate_image24").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image25').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image25').parents('.foto1').show();}}
                    $("#rebate_image25").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image26').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image26').parents('.foto1').show();}}
                    $("#rebate_image26").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image27').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image27').parents('.foto1').show();}}
                    $("#rebate_image27").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image28').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image28').parents('.foto1').show();}}
                    $("#rebate_image28").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image29').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image29').parents('.foto1').show();}}
                    $("#rebate_image29").change(function(){readURL(this);});});

            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image30').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);
                    $('#rebate_old_image30').parents('.foto1').show();}}
                    $("#rebate_image30").change(function(){readURL(this);});});
    });
</script>
        <!-- Для добавления вопросов теста -->
           



                <script type="text/javascript">
                //<!-- Для добавления картинки -->
                   // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {
                            if (input.files && input.files[0]) {
                              var reader = new FileReader();
                              reader.onload = function (e) {
                                $('#rebate_old_imag').attr('src', e.target.result);
                              }            
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $("#rebate_imag").change(function(){
                            readURL(this);
                          });
                        });
                    // отображения картинки

                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_imag").click(function () {
                        $("#rebate_imag").trigger('click');
                    });
                    // Картинка как кнопка для загрузки картинку





                </script>

@endsection