@extends('layouts.moderator_layouts')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">

.required label:after {
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

.for_foto1 .for_foto2 {
    display: none;
}

.for_foto1:hover .for_foto2 {
    display: inline-block;
}

.note-group-select-from-files {
  display: none;
}
</style>



    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
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
                            <div class="card-body">
                                <p class="mb-0 text-center"><b>Окно редактирования</b></p>
                            <form id="fileUploadForm2" action="{{ route('moderator_materials_update3', $materialy['id']) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                                    <div class="form-group required pt-3 ">
                                        <label>Название</label>
                                            <input type="text" id='files2' value="{{$materialy['title']}}" name="title" maxlength="100" class="form-control" placeholder="Введите тему материала" onkeyUp="document.getElementById('div').innerHTML = this.value" required autocomplete="off">
                                        <div class="invalid-feedback">Введите тему материала.</div>
                                    </div>

                                    <div class="form-group mt-4 pt-3 required">
                                        <label class="">Материал для скачивания (max: 30 MB)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="ssylka" id="uploadInput" accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .jpeg, .jpg, .tiff, .png, .gif, .webp" title="{{$materialy['ssylka']}}">
                                            <span class="custom-file-label" for="rebate_imag" data-browse="Изменить">{{$materialy['ssylka']}}</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mb-0 pt-3 pl-2 pb-0">Размер: 
                                                    <a id="e-fileinfo5" style="cursor: default;" class="float-right ml-2">мегабайт</a>
                                                    <a style="cursor: default;" id="e-fileinfo2" class="float-right product_number_active">{{$materialy['size']}}</a>
                                                </p>
                                                <hr class="mt-1 mb-0">
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-0 pt-3 pl-2 pb-0">Расширение: 
                                                    <a style="cursor: default;" id="e-fileinfo4" class="float-right product_number_active2">{{$materialy['type']}}</a>
                                                </p>
                                                <hr class="mt-1 mb-0">
                                            </div>
                                        </div>
                                        <input type="text" name="data_num" hidden="" value="{{$materialy['size']}}">
                                        <input type="text" name="data_num2" hidden="" value="{{$materialy['type']}}">
                                        <input type="text" name="filename01" hidden="" value="{{$materialy['ssylka']}}">
                                    </div>


                                    <div class="form-row">      
                                        <div class="form-group col-md-4 mb-0 required mt-4 pt-3">
                                            <label>Язык</label>
                                            <select name="language" class="form-control" required="">
                                                <option value="0" disabled="true" selected="true">Выберите язык</option>
                                                @foreach ($languages as $languages)
                                                    <option value="{{$languages->id}}" @if ($languages->id == $materialy->language) selected @endif>{{ $languages->language }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Выберите язык</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 mt-4 pt-3">
                                            <label>Старая цена (<del>100</del> сом)</label>
                                                <input type="number" pattern="\d+" name="price22" min="0" max="99999" maxlength="5" class="form-control" id="firstname32" placeholder="Например: 30 " onkeyUp="document.getElementById('div22').innerHTML = this.value" value="{{$materialy['oldprice'] / 100}}">
                                                <span class="res"></span>
                                            <div class="invalid-feedback">Укажите старую цену</div>
                                                
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-4 pt-3">
                                            <label>Цена</label>
                                                <input type="number" pattern="\d+" name="price2" min="0" max="99999" maxlength="5" class="form-control" id="firstname3" placeholder="Например: 30 " onkeyUp="document.getElementById('div2').innerHTML = this.value" value="{{$materialy['price'] / 100}}" required>
                                                <span class="res"></span>
                                            <div class="invalid-feedback">Укажите цену</div>
                                                
                                        </div>
                                    </div>

                                    <div class="form-group mt-4 pt-3 required">
                                        <label>Краткое описание</label>
                                            <textarea name="opisanie" id="summernote" required>{{$materialy['opisanie']}}</textarea>
                                        <div class="invalid-feedback">Заполните описание материала.</div>
                                    </div>
                                
                                 
                                    <div class="form-row">      
                                        <div class="form-group col-md-6 mb-0 required mt-4">
                                            <label>Категория</label>
                                            <select name="materialcategory_id" id="materialcategory_id" class="form-control productcategory" required="">
                                                <option value="0" disabled="true" selected="true">Выберите категорию</option>
                                                @foreach ($materialcategories as $materialcategory)
                                                <option value="{{$materialcategory['id']}}" @if ($materialcategory['id'] == $materialy['materialcategory_id']) selected @endif>{{ $materialcategory['title'] }}
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Выберите категорию</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required mt-4">
                                            <label>Подкатегория</label>
                                            <select name="materialpodcategory_id" id="materialpodcategory_id" class="form-control productname" required="">
                                                <option value="{{$materialy['materialpodcategory_id']}}">
                                                    {{$materialpodcategories->title}}
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">Выберите подкатегорию</div>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-3">
                                        <label>Картинки для карточки</label><br>
                                        <div class="form-group align-items-center">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rebate_imag" name="rebate_imag[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="" title="Добавить">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Добавить">Добавить картинку</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 pt-3">
                                        @foreach ($materialimgs as $img)
                                        <div id="{{ $loop->iteration }}" class="col-md-6 col-sm-6 col-12 px-lg-2 py-lg-2 album{{ $loop->iteration }} pt-2">
                                            <div class="foto1 for_foto1">
                                                <img class="border" src="https://nonsi.kg/public/storage/files/images/{{$img['img1']}}" style="width: 100%; border-radius: 5px;">
                                                <div class="timeline foto2 for_foto2">
                                                    <div>
                                                        <i class="fas fa-times bg-light delete-image" title="Удалить" type="button" data-id="{{$img->id}}"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="pt-3">
                                        <button type="submit" class="btn btn-block btn-info">Обновить</button>
                                    </div>
                            </form>
                            </div>
                        </div>         
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">

                            

                            <div class="card">
                                <div class="card-header pl-1 pr-1">
                                    <p class="mb-0 text-center"><b>Предварительный просмотр</b></p>
                                </div>
                                <div class="card-body pb-2 pt-2 pl-1 pr-1">
                                    <p class="mb-0 text-center"><small>Напоминаем что это просто пример, и не все данные соответствуют к тем, что вы ввели.</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <p class="mb-0 text-center">С каждой продажи вы получаете: <strong><span id="result">{{$materialy['price'] * 0.8 / 100}}</span> с.</strong></p>
                                </div>
                            </div>

                            
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->    



                            
                            

  <script type="text/javascript">
      $(function () {
    // Summernote
        $('#summernote').summernote({
            lang: 'ru-RU',
              height: 200,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              placeholder: 'Введите описание',
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


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>


<!-- для селектов-->
<script type="text/javascript">

    

$('.delete-image').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');

    bootbox.confirm({
        title: "Подтвердите действие",
        message: "Вы уверены, что хотите удалить эту картинку? (Картинка удаляется навсегда)",
        buttons: {
            confirm: {
                label: 'Удалить',
                className: 'btn btn-success pt-1 pb-1 pl-3 pr-3'
            },
            cancel: {
                label: 'Закрыть',
                className: 'btn btn-link'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url : '/moderator_panel/materialy/edit3/deleteimage/'+id,
                    type : 'GET',
                    data : {
                        id : id,
                    },
                    success : function(response){
                        if(response){
                            const parentimg = this.parentNode.parentNode.parentNode.parentNode.id;
                            const idsrcimg = 'album' + parentimg;
                            $('.' + idsrcimg).remove();
                            
                        }
                    }.bind(this)
                })
            }
        }.bind(this)
    });
});


    //<!-- для инпут тайп файл --> 
$(document).ready(function () {
  bsCustomFileInput.init()
})
//<!-- для инпут тайп файл --> 




    jQuery(document).ready(function(){

        jQuery('select[name="materialcategory_id"]').on('change',function(){
            var countryID = jQuery(this).val();
            if(countryID)
            {
                jQuery.ajax({
                    url : '/moderator_panel/materialy/findProductName/' +countryID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        jQuery('select[name="materialpodcategory_id"]').empty();
                        jQuery.each(data, function(key,value) {
                            $('select[name="materialpodcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="materialpodcategory_id"]').empty();
            }
        });
    });
</script>
<!-- для селектов-->


   
<script type="text/javascript">
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
  document.getElementById("e-fileinfo").innerHTML = [
  file.name,    
  ].join("<br>");
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


$('.my2').change(function() {
    if ($(this).val() != '') $(this).prev().text('Изменить');
    else $(this).prev().text('Выберите файл');
});

// для кнопки выберите фото
$('.my').change(function() {
if ($(this).val() != '') $(this).prev().text('Изменить');
else $(this).prev().text('Выберите фото');
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
// для карусели



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