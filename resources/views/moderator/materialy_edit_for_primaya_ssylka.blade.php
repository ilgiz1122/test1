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
                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <p class="mb-0 text-center"><b>Окно редактирования материала</b></p>
                            </div>
                            <form id="fileUploadForm2" action="{{ route('moderator_materials_update_for_primaya_ssylka', $materialy['id']) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                                <div class="card-body">
                                    <div class="form-group required">
                                        <label>Тема материала</label>
                                            <input type="text" id='files2' value="{{$materialy['title']}}" name="title" maxlength="100" class="form-control" placeholder="Введите тему материала" onkeyUp="document.getElementById('div').innerHTML = this.value" required autocomplete="off">
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Введите тему материала.</div>
                                    </div>

                                    <div class="form-row mt-4 pt-3">
                                        <div class="form-group col-md-9 mb-0 required">
                                            <label class="">Материал для скачивания (ссылка)</label>
                                            <input type="text" name="primaya_ssylka" class="form-control" placeholder="Примая ссылка на материал" autocomplete="off" required value="{{$materialy['primaya_ssylka']}}">
                                            <div class="valid-feedback">Заполнено</div>
                                            <div class="invalid-feedback">Введите ссылку на материала.</div>
                                        </div>
                                        <div class="form-group col-md-3 mb-0 required">
                                            <label class="">Тип</label>
                                            <input type="text" name="type" class="form-control" placeholder="ppt, pdf, ..." autocomplete="off" onkeyUp="document.getElementById('e-fileinfo3').innerHTML = this.value" value="{{$materialy['type']}}">
                                            <div class="valid-feedback">Заполнено</div>
                                            <div class="invalid-feedback">Введите тип</div>
                                        </div>
                                    </div>

                                        <input type="text" name="filename02" hidden="" value="{{$materialy['img1']}}">
                                        <input type="text" name="filename03" hidden="" value="{{$materialy['img1_1']}}">
                                        <input type="text" name="filename04" hidden="" value="{{$materialy['img2']}}">
                                        <input type="text" name="filename05" hidden="" value="{{$materialy['img2_2']}}">
                                        <input type="text" name="filename06" hidden="" value="{{$materialy['img3']}}">
                                        <input type="text" name="filename07" hidden="" value="{{$materialy['img3_3']}}">

                                    <div class="form-row mt-4 pt-3">      
                                        <div class="form-group col-md-4 mb-0 required">
                                            <label>Язык материала</label>
                                            <select name="language" class="form-control" required="">
                                                <option value="" disabled="true" selected="true">Выберите язык</option>
                                                @foreach ($languages as $languages)
                                                    <option value="{{$languages['id']}}" @if ($languages['id'] == $materialy['language']) selected @endif>{{ $languages['language'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите язык материала</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0">
                                            <label>Старая цена (<del>100</del> сом)</label>
                                                <input type="number" pattern="\d+" name="price22" min="0" max="99999" maxlength="5" class="form-control" id="firstname32" placeholder="Например: 30 " onkeyUp="document.getElementById('div22').innerHTML = this.value" value="{{$materialy['oldprice'] / 100}}">
                                                <span class="res"></span>
                                            <div class="valid-feedback">Цена выставлена</div>
                                            <div class="invalid-feedback">Укажите старую цену</div>
                                                
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required">
                                            <label>Новая цена </label>
                                                    <input type="number" pattern="\d+" name="price2" min="0" max="99999" maxlength="5" class="form-control" id="firstname3" placeholder="Например: 30 " onkeyUp="document.getElementById('div2').innerHTML = this.value" value="{{$materialy['price'] / 100}}" required>
                                                <span class="res"></span>
                                            <div class="valid-feedback">Цена выставлена</div>
                                            <div class="invalid-feedback">Укажите цену</div>
                                                
                                        </div>
                                    </div>

                                    <div class="form-group mt-4 pt-3 required">
                                        <label>Краткое описание материала</label>
                                            <textarea type="text" value="" name="opisanie" maxlength="255" style="height: 100px;" class="form-control" id="firstname2" placeholder="Описание (максимум 255 символов)" required>{{$materialy['opisanie']}}</textarea>
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Заполните описание материала.</div>
                                    </div>
                                
                                 
                                    <div class="form-row mt-4 pt-3">      
                                        <div class="form-group col-md-6 mb-0 required">
                                            <label>Категория материала</label>
                                            <select name="materialcategory_id" id="materialcategory_id" class="form-control productcategory" required="">
                                                <option value="" disabled="true" selected="true">Выберите категорию</option>
                                                @foreach ($materialcategories as $materialcategory)
                                                <option value="{{$materialcategory['id']}}" @if ($materialcategory['id'] == $materialy['materialcategory_id']) selected @endif>{{ $materialcategory['title'] }}

                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите категорию</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required">
                                            <label>Подкатегория материала</label>
                                            <select name="materialpodcategory_id" id="materialpodcategory_id" class="form-control productname" required="">
                                                
                                                <option value="{{$materialy['materialpodcategory_id']}}">
                                                    {{$podcategory->title}}
                                                </option>
                                               
                                            </select>
                                            <div class="valid-feedback">Выбрано</div>
                                            <div class="invalid-feedback">Выберите подкатегорию</div>
                                        </div>
                                    </div>

                                    <div class="required mt-4 pt-3">
                                        <label>Картинки для карточки материала</label><br>
                                        <div class="form-group align-items-center">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rebate_imag" name="rebate_imag" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Изменить">{{$materialy['img1']}}</span>
                                                <div class="valid-feedback">Выбрано</div>
                                                <div class="invalid-feedback">Выберите первую картинку</div>
                                            </div>
                                            <div class="custom-file mt-3">
                                                <input type="file" class="custom-file-input" id="rebate_imag1" name="rebate_imag1" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">
                                                <span class="custom-file-label" for="rebate_imag1" data-browse="Изменить">{{$materialy['img2']}}</span>
                                                <div class="valid-feedback">Выбрано</div>
                                                <div class="invalid-feedback">Выберите вторую картинку</div>
                                            </div>
                                            <div class="custom-file mt-3 mb-3">
                                                <input type="file" class="custom-file-input" id="rebate_imag2" name="rebate_imag2" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">
                                                <span class="custom-file-label" for="rebate_imag2" data-browse="Изменить">{{$materialy['img3']}}</span>
                                                <div class="valid-feedback">Выбрано</div>
                                                <div class="invalid-feedback">Выберите третью картинку</div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-0">
                                        <div class="progress" style="height: 30px; border-radius: 4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">Загружается, подождите .....</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-info"><i class="fas fa-save"></i> Обновить</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <div class="sticky-top mb-3">

                            <div class="card">
                                <div class="card-header">
                                    <p class="mb-0 text-center">С каждой продажи вы получаете: <strong><span id="result">{{$materialy['price'] * 0.8 / 100}}</span> с.</strong></p>
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

                            <div class="card">
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" style="border-top-left-radius: 4px; border-top-right-radius: 4px; width: 100%; height: 56.25%;">
                                          <div class="carousel-item active">
                                            <img style="cursor: zoom-in;" class="d-block w-100" id="rebate_old_imag" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/storage/files/thumbnail/{{$materialy['img1_1']}}" alt="First slide">
                                          </div>
                                          <div class="carousel-item">
                                            <img style="cursor: zoom-in;" class="d-block w-100" id="rebate_old_imag1" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/storage/files/thumbnail/{{$materialy['img2_2']}}" alt="Second slide">
                                          </div>
                                          <div class="carousel-item">
                                            <img style="cursor: zoom-in;" class="d-block w-100" id="rebate_old_imag2" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/storage/files/thumbnail/{{$materialy['img3_3']}}" alt="Third slide">
                                          </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                          <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-left"></i>
                                          </span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                          <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-right"></i>
                                          </span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body pr-3 pl-3 pb-1" style="padding-top: 30px;">
                                    <div class="row rrttrr">
                                      <div class="col">
                                        <h5 class="widget-user-desc" id="div">{{$materialy['title']}}</h5>
                                        <p class="text-muted">Автор: {{ Auth::user()->name}}</p>
                                      </div>
                                      <div class="w-100"></div>
                                      <div class="col align-self-end">
                                        <p class="text-muted mb-0">Покупок: 0</p>
                                      </div>
                                      <div class="col align-self-end text-center">
                                        <p class="text-muted mb-0"><del><span id="div22">@if (intval($materialy['oldprice']) != null){{$materialy['oldprice'] / 100}} сом @endif</span></del></p>
                                      </div>
                                      <div class="col align-self-end text-center">
                                        @if (intval($materialy['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107"></i>@endif
                                      </div>
                                    </div>
                                </div><!-- /.card-body -->

                                <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                                  <div class="row">
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0">
                                        <span class="description-text">ТИП:</span> <small>(язык: @if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif)</small>
                                        <h5 class="description-header" id="e-fileinfo3">.{{$materialy['type']}}</h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0">
                                        <span class="description-text">ЦЕНА:</span>
                                        <h5 class="description-header" id="div2">{{$materialy['price'] / 100}} сом</h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-top">
                                      <div class="description-block mb-0">
                                        <span class="description-text"><p class="mb-0"><span class="btn-tool"><i class="fas fa-download"></i></span> {{$materialy->kol_skachek}}</p></span>
                                        <h5 class="description-header"><a style="display:block" href="{{ route('skachatmaterialov', $materialy['id'])}}">скачать</a></h5>

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



                            
                            



<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<!-- для селектов-->
<script type="text/javascript">


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



    $(document).ready(function() {
    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
        reader.onload = function (e) {$('#rebate_old_imag1').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);}}
        $("#rebate_imag1").change(function(){readURL(this);});});
    // Картинка как кнопка для загрузки картинку
    $("#rebate_old_imag1").click(function () {
        $("#rebate_imag1").trigger('click');
    });



    $(document).ready(function() {
    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
        reader.onload = function (e) {$('#rebate_old_imag2').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);}}
        $("#rebate_imag2").change(function(){readURL(this);});});
    // Картинка как кнопка для загрузки картинку
    $("#rebate_old_imag2").click(function () {
        $("#rebate_imag2").trigger('click');
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