@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')


    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить новый тест</h1>
                </div>
            </div>
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

    <!-- Контент -->
    <style>
    .fon{
        background: #f0ecf8;
    }
   .fig {
    text-align: center;
    margin-bottom: 0px; /* Выравнивание по центру */ 
   }
   .shapka_testa{
    background: #DCDCDC;
   }
   .test_margin{

    margin-right: 80px;
    margin-left: 80px;
   }
   .clearfix{
    margin-bottom: 0px;
   }

   
   .fileUpload {
    background: ;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 100%;
    color: ;
    font-size: 1em;
    font-weight: bold;
    margin: 0em auto;/*20px/16px 0*/
    overflow: hidden;
    padding: 0.2em;/*14px/16px*/
    position: relative;
    text-align: center;
    width: 35px;
    cursor:pointer
}
.fileUpload:hover, .fileUpload:active, .fileUpload:focus {
    background: #FFFFFF;
    color: #0000FF;
    cursor:pointer
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 148px;
    height: 46px;
}

input[type="file"] {
    position: fixed;
    right: 100%;
    bottom: 100%;
}
  </style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <form action="{{ route('testy.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header shapka_testa">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label>Название теста</label>
                                            <input type="text" name="title" class="form-control" placeholder="Введите название теста" required>
                                            <label>Описание теста</label>
                                            <textarea type="text" name="opisanye" class="form-control" placeholder="Введите описание теста" required></textarea>
                                            <label>Выберите подкатегорию</label>
                                            <select name="podcat_id" class="form-control" required="">
                                                @foreach ($podcategories as $podcategory)
                                                <option value="{{$podcategory['id']}}">{{$podcategory['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Картинка для карточки теста</label><br>
                                            <img id="rebate_old_imag" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/img/net_kartinki2.jpg" alt="" style="cursor:pointer; display: block; height: 187px">
                                            <input type="file" id="rebate_imag" name="rebate_imag" readonly="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label>Выберите урок</label>
                                            <select name="urok_id" class="form-control" required="">
                                                @foreach ($urokies as $urokies)
                                                <option value="{{$urokies['id']}}">{{$urokies['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Время (максимум 180 мин.)</label>
                                            <input type="number" pattern="\d+" name="time" min="1" max="180" value="30" name="title" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid card-body fon">
                                <div class="form-group test_margin">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 align="center"><strong>Вопросы теста</strong><br><small>(максимальное количество вопросов: 30)</small></h5>
                                        </div>
                                        <div class="col-lg-2">
                                            <p style="color: #228B22;" align="center"><strong>Добавлено: <a id="clicks">1</a></strong></p>
                                        </div>
                                    </div>
                                    <table class="table table-borderless price" id="linksTable">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="card card-primary" id="remov">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <h3 class="card-title"><span class="number">1</span> вопрос</h3>
                                                                <div class="col">
                                                                    <div class="fileUpload">
                                                                        <input type="file" class="upload" id="rebate_image1" name="rebate_image[]" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i class="fas fa-image"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                                    <button type="button" class="btn btn-tool remove-tr" onclick="clickM()"><i class="fas fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="fig"><img id="rebate_old_image1" src="/img/testy.png" alt="" style="width: 50%"></p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="container">
                                                                <div class="row">
                                                                        <div class="col icheck-success d-inline input-group" align="center">
                                                                            <input type="radio" name="variant[]" id="r11" value="А">
                                                                            <label for="r11">А</label>
                                                                        </div>
                                                                        <div class="col icheck-success d-inline input-group" align="center">
                                                                            <input type="radio" name="variant[]" id="r21" value="Б">
                                                                            <label for="r21">Б</label>
                                                                        </div>
                                                                        <div class="col icheck-success d-inline input-group" align="center">
                                                                            <input type="radio" name="variant[]" id="r31" value="В">
                                                                            <label for="r31">В</label>
                                                                        </div>
                                                                        <div class="col icheck-success d-inline input-group" align="center">
                                                                            <input type="radio" name="variant[]" id="r41" value="Г">
                                                                            <label for="r41">Г</label>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" name="add" id="add" class="btn btn-success btn-lg btn-block nomer_testa rem ret"><i class="fas fa-plus"></i> Добавить вопрос</button>
                                    <p id="demo"></p>
                                </div>
                            </div>
                            <div class="card-footer shapka_testa d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary izmenit_name"><i class="fas fa-save"></i> Сохранить тест</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        
           





<!-- Для добавления вопросов теста -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>   

<script type="text/javascript">

var elements = document.querySelectorAll('.number');
elements.forEach(function(item, i, arr) {
    item.innerHTML = i+1+'';
});




var clicks = 1;
$(document).on('click', '.nomer_testa', function(){    
    if (clicks < 3){
        //Для счета количество тестов
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
        //Для счета количество тестов
        // Для добавления вопросов теста
        var i = 0;
            ++i;
            $("#linksTable").append('<tr><td><div class="card card-primary"><div class="card-header"><div class="row"><h3 class="card-title"><span class="number"></span> вопрос</h3><div class="col"><div class="fileUpload"><input type="file" class="upload" id="rebate_image" name="rebate_image" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i class="fas fa-image"></i></div></div><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button><button type="button" onclick="clickM()" class="btn btn-tool remove-tr"><i class="fas fa-trash"></i></button></div></div></div><div class="card-body"><p class="fig"><img id="rebate_old_image" src="/img/testy.png" alt="" style="width: 50%"></p></div><div class="card-footer"><div class="container"><div class="row"><div class="col icheck-success d-inline input-group" align="center"><input type="radio" name="variant[]" id="r1"><label for="r1">А</label></div><div class="col icheck-success d-inline input-group" align="center"><input type="radio" name="variant[]" id="r2"><label for="r2">Б</label></div><div class="col icheck-success d-inline input-group" align="center"><input type="radio" name="variant[]" id="r3"><label for="r3">В</label></div><div class="col icheck-success d-inline input-group" align="center"><input type="radio" name="variant[]" id="r4"><label for="r4">Г</label></div></div></div></div></div></td></tr>');
        // Для добавления вопросов теста

        // Для нумерации вопросов теста
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {item.innerHTML = i+1+'';})
        // Для нумерации вопросов теста
    }
    else{
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
        Toast.fire({
            icon: 'error',
            title: '.. Вы уже добавили все 30 тестов!'
        })
    } 
});

            $(document).on('click', '.rem', function(){
                $("[id='rebate_image4']").each(function (i){$(this).attr("id", "rebate_image" + (i+5));})
                $("[id='rebate_image3']").each(function (i){$(this).attr("id", "rebate_image" + (i+4));})
                $("[id='rebate_image2']").each(function (i){$(this).attr("id", "rebate_image" + (i+3));})
                $("[id='rebate_image1']").each(function (i){$(this).attr("id", "rebate_image" + (i+2));})
                $("[id='rebate_image']").each(function (i){$(this).attr("id", "rebate_image" + (i+1));})
                
                
                $("[id='rebate_old_image5']").each(function (i){$(this).attr("id", "rebate_old_image" + (i+6));})
                $("[id='rebate_old_image4']").each(function (i){$(this).attr("id", "rebate_old_image" + (i+5));})            
                $("[id='rebate_old_image3']").each(function (i){$(this).attr("id", "rebate_old_image" + (i+4));})
                $("[id='rebate_old_image2']").each(function (i){$(this).attr("id", "rebate_old_image" + (i+3));})
                $("[id='rebate_old_image1']").each(function (i){$(this).attr("id", "rebate_old_image" + (i+2));})
                $("[id='rebate_old_image']").each(function (i){$(this).attr("id", "rebate_old_image" + (i+1));})

            });

        
//Для счета количество тестов 
var clicks = 1;
    function clickM() {
        clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    }            
//Для счета количество тестов

            

 // Для удаления и нумерации вопросов теста
            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
                var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });
            });
// Для удаления и нумерации вопросов теста 
</script>





<!-- Для добавления картинки после нажатия кнопоки добавить вопрос-->
<script type="text/javascript">         
// Для добавления картинки 
    $(document).on('click', '.ret', function(){
                       
            // отображения картинки
                $(document).ready(function() {
                    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                        reader.onload = function (e) {$('#rebate_old_image1').attr('src', e.target.result);}
                        reader.readAsDataURL(input.files[0]);}}
                        $("#rebate_image1").change(function(){readURL(this);});});
            // отображения картинки


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image2').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image2").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image3').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image3").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image4').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image4").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_5').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_5").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_6').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_6").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_7').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_7").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_8').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_8").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_9').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_9").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_10').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_10").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_11').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_11").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_12').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_12").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_13').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_13").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_14').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_14").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_15').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_15").change(function(){readURL(this);});});
         


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_16').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_16").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_17').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_17").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_18').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_18").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_19').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_19").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_20').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_20").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_21').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_21").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_22').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_22").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_23').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_23").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_24').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_24").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_25').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_25").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_26').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_26").change(function(){readURL(this);});});
          


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_27').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_27").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_28').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_28").change(function(){readURL(this);});});
          


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_29').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_29").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_30').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_30").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_31').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_31").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_32').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_32").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_33').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_33").change(function(){readURL(this);});});



            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_34').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_34").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_35').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_35").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_36').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_36").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_37').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_37").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_38').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_38").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_39').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_39").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_40').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_40").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_41').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_41").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_42').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_42").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_43').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_43").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_44').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_44").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_45').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_45").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_46').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_46").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_47').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_47").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_48').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_48").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_49').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_49").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_50').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_50").change(function(){readURL(this);});});
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


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {
                            if (input.files && input.files[0]) {
                              var reader = new FileReader();
                              reader.onload = function (e) {
                                $('#rebate_old_image').attr('src', e.target.result);
                              }            
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $("#rebate_image").change(function(){
                            readURL(this);
                          });
                        });
                    // отображения картинки

                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image").click(function () {
                        $("#rebate_image").trigger('click');
                    });
                    // Картинка как кнопка для загрузки картинку

                </script>

 
        


        
    </section>

    
@endsection