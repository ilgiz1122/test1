@extends('layouts.moderator_layouts')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">
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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

</style>


    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <p class="mb-0 text-center"><b>Окно редактирования курса</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('moderator_kursy_update', $podcategories['id']) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                                <div class="card-body">
                                    <div class="form-group required">
                                        <label class="">Название курса</label>
                                            <input type="text" id='files2' name="title" maxlength="100" class="form-control" placeholder="Введите тему материала" onkeyUp="document.getElementById('div').innerHTML = this.value" required autocomplete="off" value="{{$podcategories->title}}">
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Введите название курса.</div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="required"><label>Краткое описание курса</label></div>
                                        
                                            <textarea name="opisanie" id="summernote" class="summernote" required>{{$podcategories->opisanie}}</textarea>
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Заполните описание курса.</div>
                                    </div>

                                    <div class="form-row form-group">      
                                        
                                        <div class="form-group col-md-6 mb-0 required">
                                            <label>Категория курса</label>
                                            <select name="materialcategory_id" id="materialcategory_id" class="form-control productcategory" required="">
                                                <option value="" disabled="true" selected="true">Выберите категорию</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category['id']}}" @if ($podcategories['cat_id'] == $category['id']) selected @endif>{{ $category['title'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите категорию</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required">
                                            <label>Язык курса</label>
                                            <select name="language" class="form-control" required="">
                                                <option value="" disabled="true" selected="true">Выберите язык</option>
                                                @foreach ($languages as $languages)
                                                <option value="{{$languages['id']}}" @if ($languages['id'] == $podcategories['language']) selected @endif>{{ $languages['language'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите язык курса</div>
                                        </div>
                                        
                                    </div>

                                    

                                    <div class="form-row form-group">      
                                        
                                        <div class="form-group col-md-6 mb-0">
                                            <label>Старая цена курса</label>
                                                <input type="number" pattern="\d+" name="price22" min="0" max="99999" maxlength="5" class="form-control" id="firstname32" placeholder="Например: 30 " value="{{$podcategories['oldprice'] / 100}}">
                                                <span class="res"></span>
                                            <div class="valid-feedback">Цена выставлена</div>
                                            <div class="invalid-feedback">Укажите старую цену</div>
                                                
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required">
                                            <label>Цена курса (в сомах)</label>
                                                <input type="number" pattern="\d+" name="price2" min="0" max="99999" maxlength="5" class="form-control" id="firstname3" placeholder="Например: 30 " onkeyUp="document.getElementById('div2').innerHTML = this.value"  value="{{$podcategories->price / 100}}" required>
                                                <span class="res"></span>
                                            <div class="valid-feedback">Цена выставлена</div>
                                            <div class="invalid-feedback">Укажите цену</div>
                                                
                                        </div>
                                    </div>

                            
                                    <div class="form-group border two shadow-sm ml-0 mt-3 mr-0 pt-3 pb-3 pr-2 pl-2 mb-3" style="border-radius: 3px;">
                                        <p class="mb-1"><b>Картинка</b> (для карточки курса)</p>
                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="rebate_imag" name="rebate_imag" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">
                                            <span class="custom-file-label" for="rebate_imag" data-browse="Изменить">{{$podcategories->img}}</span>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите картинку для карточки курса</div>
                                        </div>
                                    </div>
            
                                    @if ($podcategories->video != null)
                                    <a class="mt-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Добавить поле для видео
                                    </a>
                                    <div class="collapse show" id="collapseExample">
                                      <div class=" border shadow-sm two mt-2" style="border-radius: 3px;">
                                        <p class=" pt-2 pb-2 pr-2 pl-3 border-bottom"><b>Видео</b> (краткое содержание курса для ознокомления)</p>
                                        <div class="form-row form-group align-items-center ml-0 mr-0  pb-3 pr-2 pl-2 mb-0 border-bottom">
                                            <div class="form-group col-md-4 mb-0 pr-0 pl-o">
                                                <div id="">
                                                    <p class="mb-1"><input type="radio" name="radio" class="nomer_testa nomer_testa3" value="1" checked="" style="width:17px; height:17px;  vertical-align:middle;"><span style="vertical-align:middle;"> Загрузить видео</span></p>
                                                    <p class="mb-0"><input type="radio" name="radio" class="nomer_testa2" value="2" style="width:17px; height:17px; vertical-align:middle;"><span style="vertical-align:middle;"> Видео с ютуба</span></p>
                                                </div>
                                            </div>



                                            <div class="form-group col-md-8 mb-0  pr-0 pl-o" id="linksTable">
                                                <div class="block-text2" id="block-1" style="display: block;">
                                                    <p class="mb-1">Загрузите видео с компьютера (телефона)</p>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ssylka" id="uploadInput" accept=".mp4, .mpg, .mpeg, .wmv, .mov, .avi, .ogg, .qt">
                                                        <span class="custom-file-label" for="uploadInput" data-browse="Изменить">{{$podcategories->video}}</span>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                       </div>
                                    </div>
                                    @endif


                                    @if ($podcategories->youtube_video != null)
                                    <a class="mt-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Добавить поле для видео
                                    </a>
                                    <div class="collapse show" id="collapseExample">
                                      <div class=" border shadow-sm two mt-2" style="border-radius: 3px;">
                                        <p class=" pt-2 pb-2 pr-2 pl-3 border-bottom"><b>Видео</b> (краткое содержание курса для ознокомления)</p>
                                        <div class="form-row form-group align-items-center ml-0 mr-0  pb-3 pr-2 pl-2 mb-0 border-bottom">
                                            <div class="form-group col-md-4 mb-0 pr-0 pl-o">
                                                <div id="">
                                                    <p class="mb-1"><input type="radio" name="radio" class="nomer_testa nomer_testa3" value="1" style="width:17px; height:17px;  vertical-align:middle;"><span style="vertical-align:middle;"> Загрузить видео</span></p>
                                                    <p class="mb-0"><input type="radio" name="radio" class="nomer_testa2" value="2" checked="" style="width:17px; height:17px; vertical-align:middle;"><span style="vertical-align:middle;"> Видео с ютуба</span></p>
                                                </div>
                                            </div>



                                            <div class="form-group col-md-8 mb-0  pr-0 pl-o" id="linksTable">
                                                <div class="block-text2" id="block-2" style="display: block;">
                                                    <p class="mb-1">Вставьте ссылку видео (Youtube)</p>
                                                    <input type="text" name="youtube_video" maxlength="100" class="form-control" placeholder="Пример: https://www.youtube.com/watch?v=rcoW4_W4U4U" autocomplete="off" value="{{$podcategories->youtube_video}}">
                                                </div>
                                            </div>                                       
                                        </div>
                                       </div>
                                    </div>
                                    @endif


                                    @if ($podcategories->youtube_video == null)
                                    @if ($podcategories->video == null)
                                    <a class="mt-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Добавить поле для видео
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                      <div class=" border shadow-sm two mt-2" style="border-radius: 3px;">
                                        <p class=" pt-2 pb-2 pr-2 pl-3 border-bottom"><b>Видео</b> (краткое содержание курса для ознокомления)</p>
                                        <div class="form-row form-group align-items-center ml-0 mr-0  pb-3 pr-2 pl-2 mb-0 border-bottom">
                                            <div class="form-group col-md-4 mb-0 pr-0 pl-o">
                                                <div id="">
                                                    <p class="mb-1"><input type="radio" name="radio" class="nomer_testa nomer_testa3" value="1" style="width:17px; height:17px;  vertical-align:middle;"><span style="vertical-align:middle;"> Загрузить видео</span></p>
                                                    <p class="mb-0"><input type="radio" name="radio" class="nomer_testa2" value="2" checked="" style="width:17px; height:17px; vertical-align:middle;"><span style="vertical-align:middle;"> Видео с ютуба</span></p>
                                                </div>
                                            </div>



                                            <div class="form-group col-md-8 mb-0  pr-0 pl-o" id="linksTable">
                                                <div class="block-text2" id="block-2" style="display: block;">
                                                    <p class="mb-1">Вставьте ссылку видео (Youtube)</p>
                                                    <input type="text" name="youtube_video" maxlength="100" class="form-control" placeholder="Пример: https://www.youtube.com/watch?v=rcoW4_W4U4U" autocomplete="off">
                                                </div>
                                            </div>                                       
                                        </div>
                                       </div>
                                    </div>
                                    @endif
                                    @endif

                                    
                                    <div class="form-group mb-0 mt-2">
                                        <div class="progress" style="height: 30px; border-radius: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">Загружается, подождите .....</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-info">Обновить курс</button>
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
                                <img class="" id="rebate_old_imag" style="width: 100%; max-height: 196px; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/storage/kursy/images/thumbnail/{{$podcategories->img}}">
                              </div>
                              <div class="widget-user-image" style="">
                                <img class="img-circle elevation-2" style="" src="/admin/dist/img/inform.png" alt="User Avatar">
                              </div>
                              <div class="card-body pr-3 pl-3 pb-3" style="padding-top: 35px;">
                                
                                <h5 class="widget-user-desc" id="div">{{$podcategories->title}}</h5>
                                <p class="text-muted">Автор: {{ Auth::user()->name }}</p>
                                
                                
                                <!-- /.row -->
                              </div>
                              <div class="card-footer pr-3 pl-3 block23" style="padding-top: 0px;">
                                <div class="row">
                                  <div class="col-4 border-right border-top">
                                    <div class="description-block mb-0">
                                      <span class="description-text">УРОКОВ:</span>
                                      <h5 class="description-header">{{$podcategories->uroky_count}}</h5>
                                      
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-4 border-right border-top">
                                    <div class="description-block mb-0">
                                      <span class="description-text">ПОКУПОК:</span>
                                      <h5 class="description-header">{{$podcategories->kupit_count}}</h5>
                                      
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-4 border-top">
                                    <div class="description-block mb-0">
                                      <span class="description-text">Цена:</span>
                                      <h5 class="description-header"><span id="div2">{{$podcategories->price / 100}}</span> сом</h5>
                                      
                                      
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
            </div><!-- /.container-fluid -->
            <p id="clicks" style="display: none;">0</p>
            <p id="clicks2" style="display: none;">0</p>
            

        </section><!-- /.content -->    



                            
                            



<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
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


    $(document).on('click', '.nomer_testa', function(){    
        // Для добавления вопросов теста
            var el = document.getElementById('block-2');
            el.remove();
            var clicks = 0;
            if (clicks < 1){
                //Для счета количество тестов
                clicks += 1;
                document.getElementById("clicks").innerHTML = clicks;
                //Для счета количество тестов
                
                $("#linksTable").append('<div class="block-text2" id="block-1" style="display: block;"><p class="mb-1">Загрузите видео с компьютера (телефона)</p><div class="custom-file"><input type="file" class="custom-file-input" name="ssylka" id="uploadInput" accept=".mp4, .mpg, .mpeg, .wmv, .mov, .avi, .ogg, .qt"><span class="custom-file-label" for="uploadInput" data-browse="Выбрать">Видео не выбрана</span><div class="valid-feedback">Выбрано</div><div class="invalid-feedback">Загрузите рекламное видео курса</div></div></div>');

            }
            
        // Для добавления вопросов теста
    });


$(document).on('click', '.nomer_testa3', function(){                
        $(document).ready(function () {
          bsCustomFileInput.init()
        })

        $('#uploadInput').bind('change', function() {
    
            if (this.files[0].size > 31457280) // 30 mb for bytes.
            {
                Swal.fire({
                          icon: 'error',
                          text: 'Размер файла превышает 30 мб!',
                          showConfirmButton: false,
                          timer: 4000,
                          timerProgressBar: true,
                          padding: '1rem',
                      })
                $(this).val('');
            }
            
        });
    });

    $(document).on('click', '.nomer_testa2', function(){    
        // Для добавления вопросов теста
            var el = document.getElementById('block-1');
            el.remove();
            var clicks2 = 0;
            if (clicks2 < 1){
                //Для счета количество тестов
                clicks2 += 1;
                document.getElementById("clicks2").innerHTML = clicks2;
                //Для счета количество тестов
            $("#linksTable").append('<div class="block-text2" id="block-2" style="display: block;"><p class="mb-1">Вставьте ссылку видео (Youtube)</p><input type="text" name="youtube_video" maxlength="100" class="form-control" placeholder="Пример: https://www.youtube.com/watch?v=rcoW4_W4U4U" autocomplete="off"><div class="valid-feedback">Заполнено</div><div class="invalid-feedback">Вставьте ссылку видео (Youtube)</div></div>');
            }
        // Для добавления вопросов теста
    });
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