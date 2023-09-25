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
                            <div class="card-header"> 
                                <p class="mb-0 text-center"><b>Окно загрузки презентации</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('moderator_materials_store', $for_action) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="card-body">
                                    <div class="form-group required mt-3">
                                        <label>Название</label>
                                            <input type="text" id='files2' name="title" maxlength="100" class="form-control" placeholder="Введите тему материала" onkeyUp="document.getElementById('div').innerHTML = this.value" required autocomplete="off">
                                        <div class="invalid-feedback">Введите название</div>
                                    </div>
                                    <div class="form-group mt-4 pt-3 required">
                                        <label class="">Материал для скачивания <small>(max: 30 MB)</small></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="ssylka" id="uploadInput" accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .jpeg, .jpg, .tiff, .png, .gif, .webp" required>
                                            <span class="custom-file-label" for="rebate_imag" data-browse="Выбрать">Материал не выбрана</span>
                                            <div class="invalid-feedback">Выберите материал для продажи</div>
                                        </div>
                                        <div class="row">
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
                                    <div class="form-row">      
                                        <div class="form-group col-md-6 mb-0 required mt-3">
                                            <label>Язык</label>
                                            <select name="language" class="form-control" required="">
                                                <option value="0" disabled="true" selected="true">Выберите язык</option>
                                                @foreach ($languages as $language)
                                                <option value="{{$language->id}}">{{$language->language}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Выберите язык материала</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required mt-3">
                                            <label>Цена (в сомах)</label>
                                                <input type="number" pattern="\d+" name="price2" min="0" max="99999" maxlength="5" class="form-control" id="firstname3" placeholder="Например: 30 " onkeyUp="document.getElementById('div2').innerHTML = this.value" value="" required>
                                                <span class="res"></span>
                                            <div class="invalid-feedback">Укажите цену</div>
                                                
                                        </div>
                                    </div>

                                    <div class="form-group mt-4 pt-3 required">
                                        <label>Краткое описание</label>
                                            <textarea name="opisanie" id="summernote" required></textarea>
                                        <div class="invalid-feedback">Заполните описание материала.</div>
                                    </div>
                                
                                 
                                    <div class="form-row">      
                                        <div class="form-group col-md-6 mb-0 required mt-3">
                                            <label>Категория</label>
                                            <select name="materialcategory_id" id="materialcategory_id" class="form-control productcategory" required="">
                                                <option value="0" disabled="true" selected="true">Выберите категорию</option>
                                                @foreach ($materialcategories as $materialcategory)
                                                <option value="{{$materialcategory['id']}}">{{$materialcategory['title']}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Выберите категорию</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required mt-3">
                                            <label>Подкатегория</label>
                                            <select name="materialpodcategory_id" id="materialpodcategory_id" class="form-control productname" required="">
                                                <option value="" disabled="true" selected="true">Сначала выберите категорию</option>
                                            </select>
                                            <div class="invalid-feedback">Выберите подкатегорию</div>
                                        </div>
                                    </div>

                                    <div class="required mt-3">
                                        <label class="mt-4 pt-3">Картинки для карточки <small>(min: 1, max: 19)</small></label><br>
                                        <div class="form-group align-items-center">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rebate_imag" name="rebate_imag[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" required multiple="">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Выбрать">Можно выбрать до 19 картинок</span>
                                                <div class="invalid-feedback">Выберите первую картинку</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-info">Опубликовать</button>
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


                            
                            <div class="card flex-fill">
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" style="border-top-left-radius: 4px; border-top-right-radius: 4px; width: 100%; height: 56.25%;">
                                          <div class="carousel-item active">
                                            <img class="d-block w-100" id="rebate_old_imag" src="https://nonsi.kg/public/img/net_kartinki2.jpg" alt="First slide">
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pr-3 pl-3 pb-1" style="padding-top: 30px;">
                                    <div class="row rrttrr">
                                      <div class="col">
                                        <h5 class="widget-user-desc" id="div">Тема материала</h5>
                                        <p class="text-muted">Автор: {{ Auth::user()->name}}</p>
                                      </div>
                                      <div class="w-100"></div>
                                      <div class="col align-self-end">
                                        <p class="text-muted mb-0">Покупок: 0</p>
                                      </div>
                                      <div class="col align-self-end text-center">
                                      </div>
                                      <div class="col align-self-end text-center">
                                        
                                      </div>
                                    </div>
                                </div><!-- /.card-body -->



                                <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                                  <div class="row">
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0">
                                        <span class="description-text">ТИП:</span> <small>(язык: )</small>
                                        <h5 class="description-header" id="e-fileinfo3"></h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0">
                                        <span class="description-text">ЦЕНА:</span>
                                        <h5 class="description-header"><span id="div2">0</span> сом</h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-top">
                                      <div class="description-block mb-0">
                                        <span class="description-text"><p class="mb-0"><span class="btn-tool"><i class="fas fa-download"></i></span> 0</p></span>
                                        <h5 class="description-header"><a style="display:block" href="" disabled>скачать</a></h5>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- /.card -->




                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
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



<!-- для селектов-->
<script type="text/javascript">
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