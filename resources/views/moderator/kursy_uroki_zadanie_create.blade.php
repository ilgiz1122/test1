@extends('layouts.moderator_layouts')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">

.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
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
/* .note-group-select-from-files {
  display: none;
} */
</style>



    <!-- Тема -->
    <div class="content">
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
                        <a href="{{ route('moderator_kurs_urok_index', $kurs_id) }}">{{$podcategory->title}} (сабактар)</a>
                    </li>
                    <li class="breadcrumb-item active">{{$urok->title}} (тапшырма кошуу)</li>
                </ol>
            </section>
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--Окно для уведомлений (успушно добавлена) -->
    </div>
    <!-- Тема -->

  

    
            
        <section class="preorder-snails content">
                <div class="row">
                    <div class="col-md-9">
                        <form id="fileUploadForm" action="{{ route('moderator_kurs_urok_zadanie_store', ['kurs_id'=>$kurs_id, 'urok_id'=>$urok_id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                        <div class="card card-outline card-info">
                            <div class="card-header"> 
                                <div class="row">
                                    <div class="col">
                                        <p class="mb-0 text-center"><b>Задание</b></p>
                                    </div>
                                    <div class="col-auto text-right nowrap">
                                        max: <input type="number" pattern="\d+" name="ball" min="0" max="999" maxlength="3" class="text11 text-right" placeholder="0" value="1" style="background: none; width: 45px;">балл
                                    </div>
                                </div>
                                
                            </div>
                            
                                <div class="card-body">
                                    <div class="form-group required mt-0">
                                        <label>Задание</label>
                                            <textarea name="text" id="summernote" required></textarea>
                                            <div class="invalid-feedback">Напишите краткое объяснение</div>
                                    </div>
                                    <div class="form-row"> 
                                        <div class="form-group col-md-6 mt-4 pt-3">
                                            <label class="">Прикрепить файл <small>(max: 15 MB)</small></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="ssylka" id="uploadInput" accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Выбрать">Файл не выбрана</span>
                                            </div>
                                            <div class="row" style="display: none;">
                                                <div class="col-md-6">
                                                    <p class="mb-0 pt-3 pl-2 pb-0">Размер: 
                                                        <a id="e-fileinfo5" style="cursor: default;" class="float-right ml-2"></a>
                                                        <a style="cursor: default;" id="e-fileinfo2" class="float-right product_number_active"></a>
                                                    </p>
                                                    <hr class="mt-1 mb-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-0 pt-3 pl-2 pb-0">Расширение: 
                                                        <a style="cursor: default;" id="e-fileinfo4" class="float-right product_number_active2"></a>
                                                    </p>
                                                    <hr class="mt-1 mb-0">
                                                </div>
                                            </div>                               
                                            <input type="text" name="data_num" hidden="">
                                            <input type="text" name="data_num2" hidden="">
                                        </div>                        
                                        
                                        <div class="form-group col-md-6 mt-4 pt-3 align-items-center">
                                            <label class="">Изображение <small>(min: 1, max: 19)</small></label><br>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rebate_imag" name="rebate_imag[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Выбрать">Можно выбрать до 19 картинок</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-info">Сохранить</button>
                                    </div>
                                </div>
                            
                            
                        </div>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">

                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
        </section><!-- /.content -->    



                            
                            
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>



  <script type="text/javascript">
      $(function () {
    // Summernote
        $('#summernote').summernote({
            lang: 'ru-RU',
              height: 200,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              placeholder: 'Задание',
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

   
<script type="text/javascript">
        $('#uploadInput').bind('change', function() {
            
            if (this.files[0].size > 15728640) // 15 mb for bytes.
            {
                Swal.fire({
                          icon: 'error',
                          text: 'Размер файла превышает 15 мб!',
                          showConfirmButton: false,
                          timer: 4000,
                          timerProgressBar: true,
                          padding: '1rem',
                      })
                $(this).val('');
            }
            
        });





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

    function updateSize() {
  var file = document.getElementById("uploadInput").files[0],
    ext = "не определилось",
    parts = file.name.split('.');
  if (parts.length > 1) ext = parts.pop();
  document.getElementById("e-fileinfo2").innerHTML = [
   Math.round((file.size / 1048576) * 100)/100,
  ].join("<br>");
  document.getElementById("e-fileinfo5").innerHTML = [
   "мегабайт",
  ].join("<br>");
  document.getElementById("e-fileinfo3").innerHTML = [
  ext,
  ].join("<br>");
  document.getElementById("e-fileinfo4").innerHTML = [
ext,
  ].join("<br>");
}
document.getElementById('uploadInput').addEventListener('change', updateSize);




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





</script>
 <script>
   $(document).ready(function(){
   $('#e-fileinfo3').keyup(function() {
       $('#dateD').val($('#div.timing').text());
   });
});
</script>



  <script>
jQuery('.preorder-snails').click(function(){
jQuery('input[name="data_num"]').val(jQuery(this).find(".product_number_active").text());
  });
jQuery('.preorder-snails').click(function(){
jQuery('input[name="data_num2"]').val(jQuery(this).find(".product_number_active2").text());
  });
  </script>




<script>
//валидация формы 
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
//валидация формы 




</script>



@endsection