@extends('layouts.moderator_layouts')

@section('title', 'Редактировать урок')

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

   .two2{
    will-change: transform;
    transition: transform 400ms;
  }
  .two2:hover {
    transition: transform 300ms;
      background-color: #f4f6f9;
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
                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <p class="mb-0 text-center"><b>Окно редактирования урока</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('moderator_kurs_urok_update', ['podcat_id'=>$podcategory->id, 'id'=>$urok->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                             @method('PUT')
                                <div class="card-body">
                                    <div class="form-group required">
                                        <label class="">Название урока</label>
                                            <input type="text" id='files2' name="title" maxlength="100" class="form-control" placeholder="Введите название урока" onkeyUp="document.getElementById('div').innerHTML = this.value" required autocomplete="off" value="{{$urok->title}}">
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Введите название урока.</div>
                                    </div>
                                    <div class="form-group border two2 pt-2 pb-1 pr-2 pl-2" style="border-radius: 3px;">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 required">
                                                <label>Статус урока</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                        <input type="radio" name="status" id="r1a" value="1" checked="">
                                                        <label for="r1a">Платный</label>
                                                    </div>
                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                        <input type="radio" name="status" id="r1b" value="0">
                                                        <label for="r1b">Бесплатный</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Текстовый материал урока</label>
                                            <textarea name="text_uroka" id="summernote">{{$urok->text}}</textarea>
                                    </div>

                                    <div class="pt-3 pb-1" id="">
                                        <div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;">
                                            <h7 class="card-title" style=" font-size: 16px;"><b>Видео</b> (можно добавить максимум 3 видео)</h7>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool for_youtube_video" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить поле для Youtube видео" style=" font-size: 16px;"><i class="fab fa-youtube"></i> Youtube видео</button>
                                                <button type="button" class="btn btn-tool for_video" data-bs-toggle="tooltip" data-bs-placement="left" title="Добавить поле для загрузки видео" style=" font-size: 16px;"><i class="far fa-folder-open"></i> Загрузить видео</button>
                                            </div>
                                        </div>
                                    </div> 
                                    <table class="table table-borderless price" id="linksTable">
                                        <tbody>
                                                    
                                            @foreach($youtube as $key => $value) 
                                            <tr>
                                                <td class="pt-0 pb-0 pl-0 pr-0">
                                                    <div class="border shadow-sm two2 required ml-0 mr-0 pt-2 pb-3 pr-2 pl-2 mb-3" id="" style="border-radius: 3px;">
                                                        <div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;">
                                                            <p class="card-title" style=" font-size: 16px;">Название видео</p><div class="card-tools">
                                                                <button type="button" class="btn btn-tool remove-tr" onClick="clickM()" data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить поле"><i class="fas fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="block-text2" id="block-2" style="display: block;">
                                                            <input type="text" name="youtube_video_title[]" maxlength="100" class="form-control" placeholder="Введите название видео" required autocomplete="off" value="{{$youtube[$key]->youtube_video_title}}">
                                                            <div class="valid-feedback">Заполнено</div>
                                                            <div class="invalid-feedback">Введите название видео</div>
                                                        </div>
                                                        <div class="block-text2 pt-3" id="block-2" style="display: block;">
                                                            <p class="mb-1">Вставьте ссылку на видео (Youtube)</p>
                                                            <input type="text" name="youtube_video_ssylka[]" maxlength="100" class="form-control" placeholder="https://www.youtube.com/watch?v=rcoW4_W4U4U" required autocomplete="off" value="{{$youtube_ssylke[$key]->youtube_video_ssylka}}">
                                                            <div class="valid-feedback">Заполнено</div>
                                                            <div class="invalid-feedback">Вставьте ссылку на видео</div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach



                                            @foreach($video as $key => $value)
                                            <tr>
                                                <td class="pt-0 pb-0 pl-0 pr-0">
                                                    <div class="border shadow-sm two2 required ml-0 mr-0 pt-2 pb-3 pr-2 pl-2 mb-3" id="" style="border-radius: 3px;">
                                                        <div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;">
                                                            <p class="card-title" style=" font-size: 16px;">Название видео</p>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool remove-tr" onClick="clickM()" data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить поле"><i class="fas fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="block-text2" id="block-2" style="display: block;">
                                                            <input type="text" name="video_title[]" maxlength="100" class="form-control" placeholder="Введите название видео" required autocomplete="off" value="{{$video[$key]->video_title}}">
                                                            <div class="valid-feedback">Заполнено</div>
                                                            <div class="invalid-feedback">Введите название видео</div>
                                                        </div>
                                                        <div class="block-text2 pt-3" id="block-2" style="display: block;">
                                                            <input type="number" name="video_test{{ $loop->iteration }}" value="{{$video_name[$key]->id}}" hidden="">
                                                            <p class="mb-1">Загрузите видео с компьютера (телефона)</p>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="video_name{{$loop->iteration}}" accept=".mp4, .mpg, .mpeg, .wmv, .mov, .avi, .ogg, .qt" title="Изменить">
                                                                <span class="custom-file-label" for="uploadInput" data-browse="Изменить">{{$video_name[$key]->video_name}}</span>
                                                                <div class="valid-feedback">Выбрано</div>
                                                                <div class="invalid-feedback">Загрузите рекламное видео курса</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    @foreach($video_name as $vid1)
                                        <input type="number" name="video_test1_{{ $loop->iteration }}" value="{{$vid1->id}}" hidden="">
                                    @endforeach
                                    <p class="mb-1 mt-2" >
                                      <a class="mat_for_download" type="button" data-toggle="collapse" role="button" >
                                        Добавить материал для скачивания
                                      </a>
                                    </p>
                                    <div id="mat_for_download" class="mb-2">
                                        @if($urok->ssylka != null)
                                        <div class="border two2 shadow-sm ml-0 mr-0 pt-2 pb-3 pr-2 pl-2 mb-0" id="mat_for_download_view" style="border-radius: 3px;">
                                            <div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;">
                                                <h7 class="card-title" style=" font-size: 16px;">Материал для скачивания (max: 20 MB)</h7>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool mat_for_download_delete" data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить поле"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="for_download" name="for_download1" accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .jpeg, .jpg, .tiff, .png, .gif, .webp"  title="Изменить">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Изменить">{{$urok->ssylka}}</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-0 mt-2 pt-1">
                                        <div class="progress" style="height: 30px; border-radius: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">Загружается, подождите .....</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button value="submit" name="submit" type="submit" class="btn btn-block btn-info">Обновить урок</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-4">
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
                                <img class="" id="rebate_old_imag" style="width: 100%; max-height: 196px; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/img/net_kartinki2.jpg">
                              </div>
                              <div class="widget-user-image" style="">
                                <img class="img-circle elevation-2" style="" src="{{asset('')}}/admin/dist/img/inform.png" alt="User Avatar">
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
                                      <span class="description-text">ПОКУПОК:</span>
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
            </div><!-- /.container-fluid -->
            <p id="clicks" style="display: none;">{{$count3}}</p>
            <p id="clicks_download" style="display: none;">
                @if ($urok->ssylka != null)
                1
                @endif
                @if ($urok->ssylka = null)
                0
                @endif
            </p>

        </section><!-- /.content -->    



<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- для инпут тайп файл -->    
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<!-- для инпут тайп файл --> 

<!-- для текстового редактора --> 
<script src="{{asset('')}}/admin/plugins/summernote/summernote-bs4.min.js"></script>   
<script>

$(function () {
    // Summernote
    $('#summernote').summernote({
        lang: 'ru-RU',
  height: 200,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  placeholder: 'Введите текстовый материал для урока',
//   disableDragAndDrop: true,
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
<!-- для текстового редактора --> 



<script type="text/javascript">

//<!-- для добавления материала скачивания --> 
$(document).on('click', '.mat_for_download', function(){
        var clicks_download = document.getElementById("clicks_download").innerHTML;
        if (clicks_download < 1){
            clicks_download += 1;
            document.getElementById("clicks_download").innerHTML = clicks_download;
            
            $("#mat_for_download").append('<div class="border two2 shadow-sm ml-0 mr-0 pt-2 pb-3 pr-2 pl-2 mb-0" id="mat_for_download_view" style="border-radius: 3px;"><div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;"><h7 class="card-title" style=" font-size: 16px;">Материал для скачивания (max: 20 MB)</h7><div class="card-tools"><button type="button" class="btn btn-tool mat_for_download_delete" data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить поле"><i class="fas fa-trash"></i></button></div></div><div class="custom-file"><input type="file" class="custom-file-input" id="for_download" name="for_download" accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .jpeg, .jpg, .tiff, .png, .gif, .webp"><span class="custom-file-label" for="rebate_imag" data-browse="Выбрать">Материал не выбрана</span></div></div>');

            $(document).ready(function () {
              bsCustomFileInput.init()
            })
        }
});

$(document).on('click', '.mat_for_download_delete', function(){
        var el = document.getElementById('mat_for_download_view');
            el.remove();

            clicks_download = 0;
            document.getElementById("clicks_download").innerHTML = clicks_download;
});
//<!-- для добавления материала скачивания --> 



//<!-- для добавления поле видео --> 
    $(document).on('click', '.for_youtube_video', function(){   
            var clicks = {{$count3}};
            if (document.getElementById("clicks").innerHTML < 3){
                clicks += 1;
                document.getElementById("clicks").innerHTML = clicks;
                
                $("#linksTable").append('<tr><td class="pt-0 pb-0 pl-0 pr-0"><div class="border shadow-sm two2 required ml-0 mr-0 pt-2 pb-3 pr-2 pl-2 mb-3" id="" style="border-radius: 3px;"><div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;"><p class="card-title" style=" font-size: 16px;">Название видео</p><div class="card-tools"><button type="button" class="btn btn-tool remove-tr" onClick="clickM()" data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить поле"><i class="fas fa-trash"></i></button></div></div><div class="block-text2" id="block-2" style="display: block;"><input type="text" name="youtube_video_title2[]" maxlength="100" class="form-control" placeholder="Введите название видео" required autocomplete="off"><div class="valid-feedback">Заполнено</div><div class="invalid-feedback">Введите название видео</div></div><div class="block-text2 pt-3" id="block-2" style="display: block;"><p class="mb-1">Вставьте ссылку на видео (Youtube)</p><input type="text" name="youtube_video_ssylka2[]" maxlength="100" class="form-control" placeholder="https://www.youtube.com/watch?v=rcoW4_W4U4U" required autocomplete="off"><div class="valid-feedback">Заполнено</div><div class="invalid-feedback">Вставьте ссылку на видео</div></div></div></td></tr>');
                $(document).ready(function () {
                  bsCustomFileInput.init()
                })

            }
    });

    $(document).on('click', '.for_video', function(){   
            var clicks = {{$count3}};
            if (document.getElementById("clicks").innerHTML < 3){
                clicks += 1;
                document.getElementById("clicks").innerHTML = clicks;
                
                $("#linksTable").append('<tr><td class="pt-0 pb-0 pl-0 pr-0"><div class="border shadow-sm two2 required ml-0 mr-0 pt-2 pb-3 pr-2 pl-2 mb-3" id="" style="border-radius: 3px;"><div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;"><p class="card-title" style=" font-size: 16px;">Название видео</p><div class="card-tools"><button type="button" class="btn btn-tool remove-tr" onClick="clickM()" data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить поле"><i class="fas fa-trash"></i></button></div></div><div class="block-text2" id="block-2" style="display: block;"><input type="text" name="video_title2[]" maxlength="100" class="form-control" placeholder="Введите название видео" required autocomplete="off"><div class="valid-feedback">Заполнено</div><div class="invalid-feedback">Введите название видео</div></div><div class="block-text2 pt-3" id="block-2" style="display: block;"><p class="mb-1">Загрузите видео с компьютера (телефона)</p><div class="custom-file"><input type="file" class="custom-file-input" name="video_name2[]" accept=".mp4, .mpg, .mpeg, .wmv, .mov, .avi, .ogg, .qt" required><span class="custom-file-label" for="uploadInput" data-browse="Выбрать">Видео не выбрана</span><div class="valid-feedback">Выбрано</div><div class="invalid-feedback">Загрузите рекламное видео курса</div></div></div></div></td></tr>');
                $(document).ready(function () {
                  bsCustomFileInput.init()
                })
            }
    });
//<!-- для добавления поле видео --> 

//<!-- для удаления поле видео --> 
    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
    });
//<!-- для удаления поле видео --> 


//Для счета количество полей
var clicks = {{$count3}};
$(document).on('click', '.for_youtube_video', function(){    
    if (clicks < 3){
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
});


var clicks = {{$count3}};
$(document).on('click', '.for_video', function(){    
    if (clicks < 3){
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
});


var clicks = {{$count3}};
    function clickM() {
        clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
//Для счета количество полей



//Для инпута загрузки файлов
$(document).ready(function () {
  bsCustomFileInput.init()
});
//Для инпута загрузки файлов





</script>
@endsection