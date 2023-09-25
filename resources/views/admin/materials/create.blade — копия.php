@extends('layouts.app')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">
    .formRow {
  position: relative;
  width: 100%;
}

.formRow--item {
  display: block;
  width: 100%;
}

.formRow--input {
  position: relative;
  padding: 15px 20px 11px;
  width: 100%;
  outline: none;
  border: solid 1px #95989a;
  border-radius: 4px;
  color: #2c3235;
  letter-spacing: .2px;
  font-weight: 400;
  font-size: 16px;
  resize: none;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}

.formRow--input-wrapper {
  position: relative;
  display: block;
  width: 100%;
}

.formRow--input-wrapper.active .placeholder {
  top: -5px;
  background-color: #ffffff;
  color: #28a745;
  letter-spacing: .8px;
  font-size: 15px bold;
  line-height: 14px;
  -webkit-transform: translateY(0);
  transform: translateY(0);
}

.formRow--input-wrapper.active .formRow--input:not(:focus):not(:hover) ~ .placeholder { color: #28a745; }

.formRow--input-wrapper .formRow--input:focus, .formRow--input-wrapper .formRow--input:hover { border-color: #28a745;}

.formRow .placeholder {
  position: absolute;
  top: 50%;
  left: 10px;
  display: block;
  padding: 0 10px;
  color: #95989a;
  white-space: nowrap;
  letter-spacing: .2px;
  font-weight: normal;
  font-size: 16px;
  -webkit-transition: all, .2s;
  transition: all, .2s;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  pointer-events: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.chous {
    width: 100%;
    height: 50px;
    border-radius: 4px;
    text-align: center;
    cursor: pointer;
    display: block;
    font: 14px/50px Tahoma;
    transition: all 0.18s ease-in-out;
    border: 1px solid #4FD666;
    background: linear-gradient(to top right, #3EC97A, #69EA49 20%, rgba(255, 255, 255, 0) 80%, rgba(255, 255, 255, 0)) top right/500% 500%;
    color: #4FD666;
}

.chous:hover {
    color: white;
    background-position: bottom left;
}
    
.my {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.my2 {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
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
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Окно загрузки материала</h3>
                            </div>


                            <form action="{{ route('materialy.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="chous mb-0" for="uploadInput">Выберите материал</label>
                                        <input class="my2" name="ssylka" class="input" id="uploadInput" type="file">

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Название:</b><a style="cursor: default;" id="e-fileinfo" class="float-right"></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Размер:</b><a id="e-fileinfo5" style="cursor: default;" class="float-right ml-2"></a><a style="cursor: default;" id="e-fileinfo2" class="float-right product_number_active"></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Расширение:</b><a style="cursor: default;" id="e-fileinfo4" class="float-right product_number_active2"></a>
                                            </li>
                                        </ul>

                                        <input type="text" name="data_num" hidden="">
                                        <input type="text" name="data_num2" hidden="">

                                    </div>
                                    <fieldset class="formRow mt-3">
                                        <div class="formRow--item">
                                            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                                                <input type="text" name="title" maxlength="100" class="formRow--input js-input" placeholder="Тема материала" onkeyUp="document.getElementById('div').innerHTML = this.value" required>
                                            </label>
                                        </div>
                                    </fieldset> 
                                    <fieldset class="formRow mt-3">
                                        <div class="formRow--item">
                                            <label for="firstname2" class="formRow--input-wrapper js-inputWrapper">
                                                <textarea type="text" name="opisanie" maxlength="255" style="height: 100px;" class="form-control formRow--input js-input" id="firstname2" placeholder="Краткое описание" required></textarea>
                                            </label>
                                        </div>
                                    </fieldset> 
                                    <hr>
                                    <div class="form-row">      
                                        <div class="form-group col-md-3 mb-0">
                                            <label>Категорию</label>
                                            <select name="materialcategory_id" class="form-control" required="">
                                                @foreach ($materialcategories as $materialcategory)
                                                <option value="{{$materialcategory['id']}}">{{$materialcategory['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 mb-0">
                                            <label>Подкатегорию</label>
                                            <select name="materialpodcategory_id" class="form-control" required="">
                                                @foreach ($materialpodcategories as $materialpodcategory)
                                                <option value="{{$materialpodcategory['id']}}">{{$materialpodcategory['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 mb-0">
                                            <label>Язык</label>
                                            <select name="language" class="form-control" required="">
                                                @foreach ($languages as $languages)
                                                <option value="{{$languages['id']}}">{{$languages['language']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 mb-0">
                                            <fieldset class="formRow mt-3">
                                                <div class="formRow--item">
                                                    <label for="firstname3" class="formRow--input-wrapper js-inputWrapper">
                                                        <input type="number" pattern="\d+" name="price2" min="0" max="100000" class="formRow--input js-input" id="firstname3" placeholder="Цена (сом)" onkeyUp="document.getElementById('div2').innerHTML = this.value" value="0">
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr>
                                    <label>Картинки для карточки материала</label><br>
                                    <div class="form-row align-items-center">
                                        <div class="form-group col-md-4 mb-0">
                                            <label for="rebate_imag" class="chous mb-0">Выберите фото</label>
                                            <input type="file" class="my" id="rebate_imag" multiple name="rebate_images[]"/>
                                        </div>
                                        <!--<div class="form-group col-md-4 mb-0">
                                            <label for="rebate_imag1" class="chous mb-0">Выберите фото</label>
                                            <input type="file" class="my" id="rebate_imag1" name="rebate_imag"/>
                                        </div>
                                        <div class="form-group col-md-4 mb-0">
                                            <label for="rebate_imag2" class="chous mb-0">Выберите фото</label>
                                            <input type="file" class="my" id="rebate_imag2" name="rebate_imag"/>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Опубликовать</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header pl-1 pr-1">
                                    <h3 class="card-title">Предварительный просмотр</h3>
                                </div>
                                <div class="card-body pb-2 pt-2 pl-1 pr-1">
                                    <p class="mb-0">С каждой продажи вы получаете: <strong><span id="result">0</span> с.</strong></p>
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
                                            <img style="cursor: zoom-in;" class="d-block w-100" id="rebate_old_imag" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/img/net_kartinki2.jpg" alt="First slide">
                                          </div>
                                          <div class="carousel-item">
                                            <img style="cursor: zoom-in;" class="d-block w-100" id="rebate_old_imag1" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/img/net_kartinki2.jpg" alt="Second slide">
                                          </div>
                                          <div class="carousel-item">
                                            <img style="cursor: zoom-in;" class="d-block w-100" id="rebate_old_imag2" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/img/net_kartinki2.jpg" alt="Third slide">
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
                                <div class="card-body" style="padding-top: 3px; padding-bottom: 3px; padding-left: 3px; padding-right: 3px;"><!-- the events -->
                                    <h6 style="margin-bottom: 1px;"><strong id="div">Тема материала</strong></h6>
                                    <h7 style="font-size: 14px;">{{ Auth::user()->name}}</h7><br>
                                    <h6><strong id="div2">0</strong><strong> сом</strong></h6>
                                    <div id="e-fileinfo3"></div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->    

<script>
    


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
    "Расширение: " + ext,
  ].join("<br>");
  document.getElementById("e-fileinfo4").innerHTML = [
ext,
  ].join("<br>");
}
document.getElementById('uploadInput').addEventListener('change', updateSize);


$('.my2').change(function() {
    if ($(this).val() != '') $(this).prev().text('Выбрать новый файл');
    else $(this).prev().text('Выберите файлы');
});

// для кнопки выберите фото
$('.my').change(function() {
if ($(this).val() != '') $(this).prev().append(' <i style="font-size: 25px;" class="fas fa-check"></i>');
else $(this).prev().append('Выберите фото');
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


// для инпутов
    var $inputItem = $(".js-inputWrapper");
$inputItem.length && $inputItem.each(function() {
  var $this = $(this),
      $input = $this.find(".formRow--input"),
      placeholderTxt = $input.attr("placeholder"),
      $placeholder;
  
  $input.after('<span class="placeholder">' + placeholderTxt + "</span>"),
  $input.attr("placeholder", ""),
  $placeholder = $this.find(".placeholder"),
  
  $input.val().length ? $this.addClass("active") : $this.removeClass("active"),
      
  $input.on("focusout", function() {
      $input.val().length ? $this.addClass("active") : $this.removeClass("active");
  }).on("focus", function() {
      $this.addClass("active");
  });
});
// для инпутов
</script>
 <script>
   $(document).ready(function(){
   $('#e-fileinfo3').keyup(function() {
       $('#dateD').val($('#div.timing').text());
   });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script>
jQuery('.preorder-snails').click(function(){
jQuery('input[name="data_num"]').val(jQuery(this).find(".product_number_active").text());
  });
jQuery('.preorder-snails').click(function(){
jQuery('input[name="data_num2"]').val(jQuery(this).find(".product_number_active2").text());
  });
  </script>

@endsection