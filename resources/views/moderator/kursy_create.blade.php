@extends('layouts.moderator_layouts')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">


input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
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
/* .note-group-select-from-files {
  display: none;
} */
</style>


    <!-- Тема -->
<div class="content">
    <div class="content-header pl-0 pr-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('moderator_panel')}}">
                        <i class="nav-icon fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('moderator_kurs_index')}}">Курс</a>
                </li>
                <li class="breadcrumb-item active">Курс кошуу</li>
            </ol>  
        <!--Окно для уведомлений (успушно добавлена) -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
            </div>
        @endif
        <!--Окно для уведомлений (успушно добавлена) -->
    </div>
</div>
    <!-- Тема -->

   

    
            
        <section class="preorder-snails content">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <p class="mb-0 text-center"><b>Окно добавления курса</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('moderator_kursy_store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="card-body">
                                    <div class="form-group required">
                                        <label class="">Название курса</label>
                                            <input type="text" id='files2' name="title" maxlength="100" class="form-control" placeholder="Введите название курса" onkeyUp="document.getElementById('div').innerHTML = this.value" required autocomplete="off">
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Введите название курса.</div>
                                    </div>
 
                                    <div class="form-group mt-4 pt-3">
                                        <div class="required"><label>Краткое описание курса</label></div>                                        
                                            <textarea name="opisanie" id="summernote" required></textarea>
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Заполните описание курса.</div>
                                    </div>

                                    <div class="form-row form-group mt-4 pt-3">      
                                        
                                        <div class="form-group col-md-4 mb-0 required">
                                            <label>Категория курса</label>
                                            <select name="materialcategory_id" id="materialcategory_id" class="form-control productcategory" required="">
                                                <option value="" disabled="true" selected="true">Выберите категорию</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category['id']}}">{{$category['title']}}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите категорию</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required">
                                            <label>Язык курса</label>
                                            <select name="language" class="form-control" required="">
                                                <option value="" disabled="true" selected="true">Выберите язык</option>
                                                @foreach ($languages as $language)
                                                <option value="{{$language->id}}">{{$language->language}}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите язык курса</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required">
                                            <label>Цена курса (в сомах)</label>
                                                <input type="number" pattern="\d+" name="price2" min="0" max="99999" maxlength="5" class="form-control" id="firstname3" placeholder="Например: 30 " onkeyUp="document.getElementById('div2').innerHTML = this.value" value="" required>
                                                <span class="res"></span>
                                            <div class="valid-feedback">Цена выставлена</div>
                                            <div class="invalid-feedback">Укажите цену</div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group required mt-4 pt-3">
                                        <p class="mb-1"><b>Картинка</b> (для карточки курса)</p>
                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="rebate_imag" name="rebate_imag" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">
                                            <span class="custom-file-label" for="rebate_imag" data-browse="Выбрать">Картинка не выбрана</span>
                                        </div>
                                    </div>
            
                                    
                                    <a class="mt-4 pt-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Добавить поле для видео
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                      <div class=" border shadow-sm mt-2" style="border-radius: 3px;">
                                        <p class=" pt-2 pb-2 pr-2 pl-3 border-bottom"><b>Видео</b> (краткое содержание курса для ознокомления)</p>
                                        <div class="form-group align-items-center ml-0 mr-0  pb-3 pr-2 pl-2 mb-0 border-bottom">
                                            <div class="form-group mb-0  pr-0 pl-o" id="linksTable">
                                                <div class="block-text2" id="block-2" style="display: block;">
                                                    <p class="mb-1">Вставьте ссылку видео (Youtube)</p>
                                                    <input type="text" name="youtube_video" maxlength="100" class="form-control" placeholder="Пример: https://www.youtube.com/watch?v=rcoW4_W4U4U" autocomplete="off">
                                                </div>
                                            </div>                                       
                                        </div>
                                       </div>
                                    </div>
            


                                    
                                    <div class="form-group mb-0 mt-2">
                                        <div class="progress" style="height: 30px; border-radius: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">Загружается, подождите .....</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-info">Создать курс</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">

                            <div class="card">
                                <div class="card-header">
                                    <p class="mb-0 text-center">С каждой продажи вы получаете: <strong><span id="result">0</span> с.</strong></p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header pl-1 pr-1">
                                    <p class="mb-0 text-center"><b>Предварительный просмотр</b></p>
                                </div>
                                <div class="card-body pb-2 pt-2 pl-1 pr-1">
                                    <p class="mb-0 text-center">Напоминаем что это просто пример, и не все данные соответствуют к тем, что вы ввели.</p>
                                </div>
                            </div>

                            <div class="card card-widget widget-user shadow flex-fill">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="card-header pt-0 pb-0 pl-0 pr-0" style="max-height: 196px;">
                                <img class="" id="rebate_old_imag" style="width: 100%; max-height: 196px; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}//img/net_kartinki2.jpg">
                              </div>
                              <div class="card-body pr-3 pl-3 pb-3" style="padding-top: 35px;">
                                
                                <h5 class="widget-user-desc" id="div">Название курса</h5>
                                <p class="text-muted">Автор: {{ Auth::user()->name }}</p>
                                
                                
                                <!-- /.row -->
                              </div>
                              <div class="card-footer pr-3 pl-3 block23" style="padding-top: 0px;">
                                <div class="row">
                                  <div class="col-4 border-right border-top">
                                    <div class="description-block mb-0">
                                      <span class="description-text">УРОКОВ:</span>
                                      <h5 class="description-header">0</h5>
                                      
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-4 border-right border-top">
                                    <div class="description-block mb-0">
                                      <span class="description-text">ПОКУП.:</span>
                                      <h5 class="description-header">0</h5>
                                      
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-4 border-top">
                                    <div class="description-block mb-0">
                                      <span class="description-text">Цена:</span>
                                      <h5 class="description-header"><span id="div2">0</span> сом</h5>
                                      
                                      
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            <p id="clicks" style="display: none;">0</p>
            <p id="clicks2" style="display: none;">0</p>
            

        </section><!-- /.content -->    



                            
                            



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- для инпут тайп файл -->    
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<!-- для инпут тайп файл --> 
   <script>

  $(function () {
    // Summernote
    $('#summernote').summernote({
        lang: 'ru-RU',
  height: 200,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  placeholder: 'Введите описание курса',
  // disableDragAndDrop: true,
  toolbar: [
      ['style', ['style']],
      ['fontsize', ['fontsize']],
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




// для карусели
    // отображение картинки
    $(document).ready(function() {
    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
        reader.onload = function (e) {$('#rebate_old_imag').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);}}
        $("#rebate_imag").change(function(){readURL(this);});});
    // Картинка как кнопка для загрузки картинку
    $("#rebate_old_imag").click(function () {
        $("#rebate_imag").trigger('click');
    });
// для карусели
</script>



 <script>
   $(document).ready(function(){
   $('#e-fileinfo3').keyup(function() {
       $('#dateD').val($('#div.timing').text());
   });
});
</script>

@endsection