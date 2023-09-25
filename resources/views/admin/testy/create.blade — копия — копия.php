@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')


    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить тест</h1>
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
   .fig {
    text-align: center;
    margin-bottom: 0px; /* Выравнивание по центру */ 
   }
  </style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <form action="{{ route('testy.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="form-group">
                                    <label>Название теста</label>
                                    <input type="text" name="title" class="form-control" placeholder="Введите название теста" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Описание теста</label>
                                            <textarea type="text" name="opisanye" class="form-control" placeholder="Введите описание теста" required></textarea>
                                            <label>Выберите подкатегорию</label>
                                            <select name="podcat_id" class="form-control" required="">
                                                @foreach ($podcategories as $podcategory)
                                                <option value="{{$podcategory['id']}}">{{$podcategory['title']}}</option>
                                                @endforeach
                                            </select>
                                            <label>Выберите урок</label>
                                            <select name="urok_id" class="form-control" required="">
                                                @foreach ($urokies as $urokies)
                                                <option value="{{$urokies['id']}}">{{$urokies['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Картинка для карточки теста</label><br>
                                            <img id="rebate_old_imag" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/img/net_kartinki2.jpg" alt="" style="cursor:pointer; display: block; height: 190px">
                                            <input type="file" id="rebate_imag" name="rebate_imag" readonly="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="form-group">
                                    <table class="table table-borderless price" id="linksTable">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h3 class="card-title"><span class="number"></span> вопрос</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool remove-tr">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="fig"><img id="rebate_old_image1" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить вопрос теста" src="/img/testy.png" alt="" style="cursor:pointer; width: 50%"></p>
                                                            <input type="file" id="rebate_image1" name="rebate_image1" readonly="" required>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <input type="radio" name="r1" id="radioSuccess1">
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" value="A" class="form-control" readonly="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <input type="radio" name="r1" id="radioSuccess1">
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" value="Б" class="form-control" readonly="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <input type="radio" name="r1" id="radioSuccess1">
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" value="В" class="form-control" readonly="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <input type="radio" name="r1" id="radioSuccess1">
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" value="Г" class="form-control" readonly="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" name="add" id="add" class="btn btn-success btn-lg btn-block nomer_testa"><i class="fas fa-plus"></i> Добавить вопрос</button>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить тест</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


           





        <!-- Для добавления вопросов теста -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>   

        <script type="text/javascript">
             var i = 0;
             $("#add").click(function(){
                ++i;
                $("#linksTable").append('<tr><td><div class="card card-primary"><div class="card-header"><h3 class="card-title"><span class="number"></span> вопрос</h3><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button><button type="button" class="btn btn-tool remove-tr"><i class="fas fa-trash"></i></button></div></div><div class="card-body"><p class="fig"><img id="rebate_old_image" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить вопрос теста" src="/img/testy.png" alt="" style="cursor:pointer; width: 50%"></p><input type="file" id="rebate_image" name="rebate_image" readonly="" required></div><div class="card-footer"><div class="container"><div class="row"><div class="col"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio" name="r1" id="radioSuccess1"></span></div><input type="text" value="A" class="form-control" readonly=""></div></div><div class="col"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio" name="r1" id="radioSuccess1"></span></div><input type="text" value="Б" class="form-control" readonly=""></div></div><div class="col"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio" name="r1" id="radioSuccess1"></span></div><input type="text" value="В" class="form-control" readonly=""></div></div><div class="col"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio" name="r1" id="radioSuccess1"></span></div><input type="text" value="Г" class="form-control" readonly=""></div></div></div></div></div></div></td></tr>');
            });
            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });
            // Для нумерации вопросов теста
            $(document).on('click', '.nomer_testa', function(){
                var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });

                // для изменения id, id, name вопросов теста
                    $("[id='rebate_old_image30']").each(function (i){$(this).attr("id", "rebate_old_image31");})
                    $("[id='rebate_old_image29']").each(function (i){$(this).attr("id", "rebate_old_image30");})
                    $("[id='rebate_old_image28']").each(function (i){$(this).attr("id", "rebate_old_image29");})
                    $("[id='rebate_old_image27']").each(function (i){$(this).attr("id", "rebate_old_image28");})
                    $("[id='rebate_old_image26']").each(function (i){$(this).attr("id", "rebate_old_image27");})
                    $("[id='rebate_old_image25']").each(function (i){$(this).attr("id", "rebate_old_image26");})
                    $("[id='rebate_old_image24']").each(function (i){$(this).attr("id", "rebate_old_image25");})
                    $("[id='rebate_old_image23']").each(function (i){$(this).attr("id", "rebate_old_image24");})
                    $("[id='rebate_old_image22']").each(function (i){$(this).attr("id", "rebate_old_image23");})
                    $("[id='rebate_old_image21']").each(function (i){$(this).attr("id", "rebate_old_image22");})
                    $("[id='rebate_old_image20']").each(function (i){$(this).attr("id", "rebate_old_image21");})
                    $("[id='rebate_old_image19']").each(function (i){$(this).attr("id", "rebate_old_image20");})
                    $("[id='rebate_old_image18']").each(function (i){$(this).attr("id", "rebate_old_image19");})
                    $("[id='rebate_old_image17']").each(function (i){$(this).attr("id", "rebate_old_image18");})
                    $("[id='rebate_old_image16']").each(function (i){$(this).attr("id", "rebate_old_image17");})
                    $("[id='rebate_old_image15']").each(function (i){$(this).attr("id", "rebate_old_image16");})
                    $("[id='rebate_old_image14']").each(function (i){$(this).attr("id", "rebate_old_image15");})
                    $("[id='rebate_old_image13']").each(function (i){$(this).attr("id", "rebate_old_image14");})
                    $("[id='rebate_old_image12']").each(function (i){$(this).attr("id", "rebate_old_image13");})
                    $("[id='rebate_old_image11']").each(function (i){$(this).attr("id", "rebate_old_image12");})
                    $("[id='rebate_old_image10']").each(function (i){$(this).attr("id", "rebate_old_image11");})
                    $("[id='rebate_old_image9']").each(function (i){$(this).attr("id", "rebate_old_image10");})
                    $("[id='rebate_old_image8']").each(function (i){$(this).attr("id", "rebate_old_image9");})
                    $("[id='rebate_old_image7']").each(function (i){$(this).attr("id", "rebate_old_image8");})
                    $("[id='rebate_old_image6']").each(function (i){$(this).attr("id", "rebate_old_image7");})
                    $("[id='rebate_old_image5']").each(function (i){$(this).attr("id", "rebate_old_image6");})
                    $("[id='rebate_old_image4']").each(function (i){$(this).attr("id", "rebate_old_image5");})
                    $("[id='rebate_old_image3']").each(function (i){$(this).attr("id", "rebate_old_image4");})
                    $("[id='rebate_old_image2']").each(function (i){$(this).attr("id", "rebate_old_image3");})
                    $("[id='rebate_old_image1']").each(function (i){$(this).attr("id", "rebate_old_image2");})
                    $("[id='rebate_old_image']").each(function (i){$(this).attr("id", "rebate_old_image1");})
                    $("[id='rebate_old_image1']").each(function (i){$(this).attr("id", "rebate_old_image");})
                    $("[id='rebate_old_image2']").each(function (i){$(this).attr("id", "rebate_old_image1");})
                    $("[id='rebate_old_image3']").each(function (i){$(this).attr("id", "rebate_old_image2");})
                    $("[id='rebate_old_image4']").each(function (i){$(this).attr("id", "rebate_old_image3");})
                    $("[id='rebate_old_image5']").each(function (i){$(this).attr("id", "rebate_old_image4");})



                    $("[id='rebate_image30']").each(function (i){$(this).attr("id", "rebate_image31");})
                    $("[id='rebate_image29']").each(function (i){$(this).attr("id", "rebate_image30");})
                    $("[id='rebate_image28']").each(function (i){$(this).attr("id", "rebate_image29");})
                    $("[id='rebate_image27']").each(function (i){$(this).attr("id", "rebate_image28");})
                    $("[id='rebate_image26']").each(function (i){$(this).attr("id", "rebate_image27");})
                    $("[id='rebate_image25']").each(function (i){$(this).attr("id", "rebate_image26");})
                    $("[id='rebate_image24']").each(function (i){$(this).attr("id", "rebate_image25");})
                    $("[id='rebate_image23']").each(function (i){$(this).attr("id", "rebate_image24");})
                    $("[id='rebate_image22']").each(function (i){$(this).attr("id", "rebate_image23");})
                    $("[id='rebate_image21']").each(function (i){$(this).attr("id", "rebate_image22");})
                    $("[id='rebate_image20']").each(function (i){$(this).attr("id", "rebate_image21");})
                    $("[id='rebate_image19']").each(function (i){$(this).attr("id", "rebate_image20");})
                    $("[id='rebate_image18']").each(function (i){$(this).attr("id", "rebate_image19");})
                    $("[id='rebate_image17']").each(function (i){$(this).attr("id", "rebate_image18");})
                    $("[id='rebate_image16']").each(function (i){$(this).attr("id", "rebate_image17");})
                    $("[id='rebate_image15']").each(function (i){$(this).attr("id", "rebate_image16");})
                    $("[id='rebate_image14']").each(function (i){$(this).attr("id", "rebate_image15");})
                    $("[id='rebate_image13']").each(function (i){$(this).attr("id", "rebate_image14");})
                    $("[id='rebate_image12']").each(function (i){$(this).attr("id", "rebate_image13");})
                    $("[id='rebate_image11']").each(function (i){$(this).attr("id", "rebate_image12");})
                    $("[id='rebate_image10']").each(function (i){$(this).attr("id", "rebate_image11");})
                    $("[id='rebate_image9']").each(function (i){$(this).attr("id", "rebate_image10");})
                    $("[id='rebate_image8']").each(function (i){$(this).attr("id", "rebate_image9");})
                    $("[id='rebate_image7']").each(function (i){$(this).attr("id", "rebate_image8");})
                    $("[id='rebate_image6']").each(function (i){$(this).attr("id", "rebate_image7");})
                    $("[id='rebate_image5']").each(function (i){$(this).attr("id", "rebate_image6");})
                    $("[id='rebate_image4']").each(function (i){$(this).attr("id", "rebate_image5");})
                    $("[id='rebate_image3']").each(function (i){$(this).attr("id", "rebate_image4");})
                    $("[id='rebate_image2']").each(function (i){$(this).attr("id", "rebate_image3");})
                    $("[id='rebate_image1']").each(function (i){$(this).attr("id", "rebate_image2");})
                    $("[id='rebate_image']").each(function (i){$(this).attr("id", "rebate_image1");})
                    $("[id='rebate_image1']").each(function (i){$(this).attr("id", "rebate_image");})
                    $("[id='rebate_image2']").each(function (i){$(this).attr("id", "rebate_image1");})
                    $("[id='rebate_image3']").each(function (i){$(this).attr("id", "rebate_image2");})
                    $("[id='rebate_image4']").each(function (i){$(this).attr("id", "rebate_image3");})
                    $("[id='rebate_image5']").each(function (i){$(this).attr("id", "rebate_image4");})
            // $("[id='rebate_image']").each(function (i){$(this).attr("id", "rebate_image" + (i+1));})
                    $("[name='rebate_image30']").each(function (i){$(this).attr("name", "rebate_image31");})
                    $("[name='rebate_image29']").each(function (i){$(this).attr("name", "rebate_image30");})
                    $("[name='rebate_image28']").each(function (i){$(this).attr("name", "rebate_image29");})
                    $("[name='rebate_image27']").each(function (i){$(this).attr("name", "rebate_image28");})
                    $("[name='rebate_image26']").each(function (i){$(this).attr("name", "rebate_image27");})
                    $("[name='rebate_image25']").each(function (i){$(this).attr("name", "rebate_image26");})
                    $("[name='rebate_image24']").each(function (i){$(this).attr("name", "rebate_image25");})
                    $("[name='rebate_image23']").each(function (i){$(this).attr("name", "rebate_image24");})
                    $("[name='rebate_image22']").each(function (i){$(this).attr("name", "rebate_image23");})
                    $("[name='rebate_image21']").each(function (i){$(this).attr("name", "rebate_image22");})
                    $("[name='rebate_image20']").each(function (i){$(this).attr("name", "rebate_image21");})
                    $("[name='rebate_image19']").each(function (i){$(this).attr("name", "rebate_image20");})
                    $("[name='rebate_image18']").each(function (i){$(this).attr("name", "rebate_image19");})
                    $("[name='rebate_image17']").each(function (i){$(this).attr("name", "rebate_image18");})
                    $("[name='rebate_image16']").each(function (i){$(this).attr("name", "rebate_image17");})
                    $("[name='rebate_image15']").each(function (i){$(this).attr("name", "rebate_image16");})
                    $("[name='rebate_image14']").each(function (i){$(this).attr("name", "rebate_image15");})
                    $("[name='rebate_image13']").each(function (i){$(this).attr("name", "rebate_image14");})
                    $("[name='rebate_image12']").each(function (i){$(this).attr("name", "rebate_image13");})
                    $("[name='rebate_image11']").each(function (i){$(this).attr("name", "rebate_image12");})
                    $("[name='rebate_image10']").each(function (i){$(this).attr("name", "rebate_image11");})
                    $("[name='rebate_image9']").each(function (i){$(this).attr("name", "rebate_image10");})
                    $("[name='rebate_image8']").each(function (i){$(this).attr("name", "rebate_image9");})
                    $("[name='rebate_image7']").each(function (i){$(this).attr("name", "rebate_image8");})
                    $("[name='rebate_image6']").each(function (i){$(this).attr("name", "rebate_image7");})
                    $("[name='rebate_image5']").each(function (i){$(this).attr("name", "rebate_image6");})
                    $("[name='rebate_image4']").each(function (i){$(this).attr("name", "rebate_image5");})
                    $("[name='rebate_image3']").each(function (i){$(this).attr("name", "rebate_image4");})
                    $("[name='rebate_image2']").each(function (i){$(this).attr("name", "rebate_image3");})
                    $("[name='rebate_image1']").each(function (i){$(this).attr("name", "rebate_image2");})
                    $("[name='rebate_image']").each(function (i){$(this).attr("name", "rebate_image1");})
                    $("[name='rebate_image1']").each(function (i){$(this).attr("name", "rebate_image");})
                    $("[name='rebate_image2']").each(function (i){$(this).attr("name", "rebate_image1");})
                    $("[name='rebate_image3']").each(function (i){$(this).attr("name", "rebate_image2");})
                    $("[name='rebate_image4']").each(function (i){$(this).attr("name", "rebate_image3");})
                    $("[name='rebate_image5']").each(function (i){$(this).attr("name", "rebate_image4");})
            // $("[name='rebate_image']").each(function (i){$(this).attr("name", "rebate_image" + (i+1));})
                // для изменения id, id, name вопросов теста


                //<!-- Для добавления картинки -->                
                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image1').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image1").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image1").click(function () {$("#rebate_image1").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image2').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image2").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image2").click(function () {$("#rebate_image2").trigger('click');});
                    // Картинка как кнопка для загрузки картинку 


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image3').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image3").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image3").click(function () {$("#rebate_image3").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image4').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image4").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image4").click(function () {$("#rebate_image5").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image6').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image6").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image6").click(function () {$("#rebate_image6").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image7').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image7").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image7").click(function () {$("#rebate_image7").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image8').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image8").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image8").click(function () {$("#rebate_image8").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image9').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image9").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image9").click(function () {$("#rebate_image9").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image10').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image10").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image10").click(function () {$("#rebate_image10").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image11').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image11").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image11").click(function () {$("#rebate_image11").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image12').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image12").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image12").click(function () {$("#rebate_image12").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image13').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image13").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image13").click(function () {$("#rebate_image13").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image14').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image14").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image14").click(function () {$("#rebate_image14").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image15').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image15").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image15").click(function () {$("#rebate_image15").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image16').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image16").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image16").click(function () {$("#rebate_image16").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image17').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image17").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image17").click(function () {$("#rebate_image17").trigger('click');});
                    // Картинка как кнопка для загрузки картинку          
                //<!-- Для добавления картинки -->
            });

            // Для нумерации вопросов теста
            $(document).on('click', '.remove-tr', function(){
                var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });
            });
            var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });
            // Для нумерации вопросов теста 
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
                                $('#rebate_old_image1').attr('src', e.target.result);
                              }            
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $("#rebate_image1").change(function(){
                            readURL(this);
                          });
                        });
                    // отображения картинки

                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image1").click(function () {
                        $("#rebate_image1").trigger('click');
                    });
                    // Картинка как кнопка для загрузки картинку

                </script>

 
        


        
    </section>

    
@endsection


























@extends('layouts.admin_layouts')

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
   .fig {
    text-align: center;
    margin-bottom: 0px; /* Выравнивание по центру */ 
   }
   .shapka_testa{
    background: #DCDCDC;
   }
   .test_margin{
    margin-bottom: 0px;
   }
   .batman-picture{

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
                            <div class="container-fluid card-body">
                                <div class="form-group test_margin">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 align="center"><strong>Вопросы теста</strong><br><small>(максимальное количество вопросов: 30)</small></h5>
                                        </div>
                                        <div class="col-lg-2">
                                            <p style="color: #228B22;" align="center"><strong>Добавлено: <a id="clicks">0</a></strong></p>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <table class="table table-borderless price" id="linksTable">
                                                <div class="file">
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" name="add" id="add" class="btn btn-success btn-lg btn-block nomer_testa" onclick="addItem (this)"><i class="fas fa-plus"></i> Добавить вопрос</button>
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


var i = 0;
             $("#add").click(function(){
                ++i;
                $("#linksTable").append('<tr><td><div class="card card-primary" id="remov"><div class="card-header"><div class="row"><h3 class="card-title"><span class="number"></span> вопрос</h3><div class="col"><div class="fileUpload"><input type="file" class="upload" id="rebate_image" name="rebate_image" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i class="fas fa-download"></i></div></div><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button><button type="button" class="btn btn-tool" id="remove-tr"><i class="fas fa-trash"></i></button></div></div></div><div class="card-body"><p class="fig"><img id="rebate_old_image" src="/img/testy.png" alt="" style="width: 50%"></p></div><div class="card-footer"><div class="container"><div class="row"><div class="form-group clearfix"><div class="icheck-success d-inline input-group"><input type="radio" name="variant[]" id="r1"><label for="r1">А</label></div><div class="icheck-success d-inline input-group"><input type="radio" name="variant[]" id="r2"><label for="r2">Б</label></div><div class="icheck-success d-inline input-group"><input type="radio" name="variant[]" id="r3"><label for="r3">В</label></div><div class="icheck-success d-inline input-group"><input type="radio" name="variant[]" id="r4"><label for="r4">Г</label></div></div></div></div></div></div></td></tr>');
            });
            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });








//Для счета количество тестов
var clicks = 0;
$(document).on('click', '.nomer_testa', function(){    
    if (clicks < 31){
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
    else{
        clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    } 
});
 
var clicks = 0;
    function clickM() {
        clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
//Для счета количество тестов

            // Для нумерации вопросов теста
            $(document).on('click', '.nomer_testa', function(){
                var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });

                // для изменения id, id, name вопросов теста
                    $("[id='rebate_old_image30']").each(function (i){$(this).attr("id", "rebate_old_image31");})
                    $("[id='rebate_old_image29']").each(function (i){$(this).attr("id", "rebate_old_image30");})
                    $("[id='rebate_old_image28']").each(function (i){$(this).attr("id", "rebate_old_image29");})
                    $("[id='rebate_old_image27']").each(function (i){$(this).attr("id", "rebate_old_image28");})
                    $("[id='rebate_old_image26']").each(function (i){$(this).attr("id", "rebate_old_image27");})
                    $("[id='rebate_old_image25']").each(function (i){$(this).attr("id", "rebate_old_image26");})
                    $("[id='rebate_old_image24']").each(function (i){$(this).attr("id", "rebate_old_image25");})
                    $("[id='rebate_old_image23']").each(function (i){$(this).attr("id", "rebate_old_image24");})
                    $("[id='rebate_old_image22']").each(function (i){$(this).attr("id", "rebate_old_image23");})
                    $("[id='rebate_old_image21']").each(function (i){$(this).attr("id", "rebate_old_image22");})
                    $("[id='rebate_old_image20']").each(function (i){$(this).attr("id", "rebate_old_image21");})
                    $("[id='rebate_old_image19']").each(function (i){$(this).attr("id", "rebate_old_image20");})
                    $("[id='rebate_old_image18']").each(function (i){$(this).attr("id", "rebate_old_image19");})
                    $("[id='rebate_old_image17']").each(function (i){$(this).attr("id", "rebate_old_image18");})
                    $("[id='rebate_old_image16']").each(function (i){$(this).attr("id", "rebate_old_image17");})
                    $("[id='rebate_old_image15']").each(function (i){$(this).attr("id", "rebate_old_image16");})
                    $("[id='rebate_old_image14']").each(function (i){$(this).attr("id", "rebate_old_image15");})
                    $("[id='rebate_old_image13']").each(function (i){$(this).attr("id", "rebate_old_image14");})
                    $("[id='rebate_old_image12']").each(function (i){$(this).attr("id", "rebate_old_image13");})
                    $("[id='rebate_old_image11']").each(function (i){$(this).attr("id", "rebate_old_image12");})
                    $("[id='rebate_old_image10']").each(function (i){$(this).attr("id", "rebate_old_image11");})
                    $("[id='rebate_old_image9']").each(function (i){$(this).attr("id", "rebate_old_image10");})
                    $("[id='rebate_old_image8']").each(function (i){$(this).attr("id", "rebate_old_image9");})
                    $("[id='rebate_old_image7']").each(function (i){$(this).attr("id", "rebate_old_image8");})
                    $("[id='rebate_old_image6']").each(function (i){$(this).attr("id", "rebate_old_image7");})
                    $("[id='rebate_old_image5']").each(function (i){$(this).attr("id", "rebate_old_image6");})
                    $("[id='rebate_old_image4']").each(function (i){$(this).attr("id", "rebate_old_image5");})
                    $("[id='rebate_old_image3']").each(function (i){$(this).attr("id", "rebate_old_image4");})
                    $("[id='rebate_old_image2']").each(function (i){$(this).attr("id", "rebate_old_image3");})
                    $("[id='rebate_old_image1']").each(function (i){$(this).attr("id", "rebate_old_image2");})
                    $("[id='rebate_old_image']").each(function (i){$(this).attr("id", "rebate_old_image1");})
                    $("[id='rebate_old_image1']").each(function (i){$(this).attr("id", "rebate_old_image");})
                    $("[id='rebate_old_image2']").each(function (i){$(this).attr("id", "rebate_old_image1");})
                    $("[id='rebate_old_image3']").each(function (i){$(this).attr("id", "rebate_old_image2");})
                    $("[id='rebate_old_image4']").each(function (i){$(this).attr("id", "rebate_old_image3");})
                    $("[id='rebate_old_image5']").each(function (i){$(this).attr("id", "rebate_old_image4");})



                    $("[id='rebate_image30']").each(function (i){$(this).attr("id", "rebate_image31");})
                    $("[id='rebate_image29']").each(function (i){$(this).attr("id", "rebate_image30");})
                    $("[id='rebate_image28']").each(function (i){$(this).attr("id", "rebate_image29");})
                    $("[id='rebate_image27']").each(function (i){$(this).attr("id", "rebate_image28");})
                    $("[id='rebate_image26']").each(function (i){$(this).attr("id", "rebate_image27");})
                    $("[id='rebate_image25']").each(function (i){$(this).attr("id", "rebate_image26");})
                    $("[id='rebate_image24']").each(function (i){$(this).attr("id", "rebate_image25");})
                    $("[id='rebate_image23']").each(function (i){$(this).attr("id", "rebate_image24");})
                    $("[id='rebate_image22']").each(function (i){$(this).attr("id", "rebate_image23");})
                    $("[id='rebate_image21']").each(function (i){$(this).attr("id", "rebate_image22");})
                    $("[id='rebate_image20']").each(function (i){$(this).attr("id", "rebate_image21");})
                    $("[id='rebate_image19']").each(function (i){$(this).attr("id", "rebate_image20");})
                    $("[id='rebate_image18']").each(function (i){$(this).attr("id", "rebate_image19");})
                    $("[id='rebate_image17']").each(function (i){$(this).attr("id", "rebate_image18");})
                    $("[id='rebate_image16']").each(function (i){$(this).attr("id", "rebate_image17");})
                    $("[id='rebate_image15']").each(function (i){$(this).attr("id", "rebate_image16");})
                    $("[id='rebate_image14']").each(function (i){$(this).attr("id", "rebate_image15");})
                    $("[id='rebate_image13']").each(function (i){$(this).attr("id", "rebate_image14");})
                    $("[id='rebate_image12']").each(function (i){$(this).attr("id", "rebate_image13");})
                    $("[id='rebate_image11']").each(function (i){$(this).attr("id", "rebate_image12");})
                    $("[id='rebate_image10']").each(function (i){$(this).attr("id", "rebate_image11");})
                    $("[id='rebate_image9']").each(function (i){$(this).attr("id", "rebate_image10");})
                    $("[id='rebate_image8']").each(function (i){$(this).attr("id", "rebate_image9");})
                    $("[id='rebate_image7']").each(function (i){$(this).attr("id", "rebate_image8");})
                    $("[id='rebate_image6']").each(function (i){$(this).attr("id", "rebate_image7");})
                    $("[id='rebate_image5']").each(function (i){$(this).attr("id", "rebate_image6");})
                    $("[id='rebate_image4']").each(function (i){$(this).attr("id", "rebate_image5");})
                    $("[id='rebate_image3']").each(function (i){$(this).attr("id", "rebate_image4");})
                    $("[id='rebate_image2']").each(function (i){$(this).attr("id", "rebate_image3");})
                    $("[id='rebate_image1']").each(function (i){$(this).attr("id", "rebate_image2");})
                    $("[id='rebate_image']").each(function (i){$(this).attr("id", "rebate_image1");})
                    $("[id='rebate_image1']").each(function (i){$(this).attr("id", "rebate_image");})
                    $("[id='rebate_image2']").each(function (i){$(this).attr("id", "rebate_image1");})
                    $("[id='rebate_image3']").each(function (i){$(this).attr("id", "rebate_image2");})
                    $("[id='rebate_image4']").each(function (i){$(this).attr("id", "rebate_image3");})
                    $("[id='rebate_image5']").each(function (i){$(this).attr("id", "rebate_image4");})
            // $("[id='rebate_image']").each(function (i){$(this).attr("id", "rebate_image" + (i+1));})
                    $("[name='rebate_image30']").each(function (i){$(this).attr("name", "rebate_image31");})
                    $("[name='rebate_image29']").each(function (i){$(this).attr("name", "rebate_image30");})
                    $("[name='rebate_image28']").each(function (i){$(this).attr("name", "rebate_image29");})
                    $("[name='rebate_image27']").each(function (i){$(this).attr("name", "rebate_image28");})
                    $("[name='rebate_image26']").each(function (i){$(this).attr("name", "rebate_image27");})
                    $("[name='rebate_image25']").each(function (i){$(this).attr("name", "rebate_image26");})
                    $("[name='rebate_image24']").each(function (i){$(this).attr("name", "rebate_image25");})
                    $("[name='rebate_image23']").each(function (i){$(this).attr("name", "rebate_image24");})
                    $("[name='rebate_image22']").each(function (i){$(this).attr("name", "rebate_image23");})
                    $("[name='rebate_image21']").each(function (i){$(this).attr("name", "rebate_image22");})
                    $("[name='rebate_image20']").each(function (i){$(this).attr("name", "rebate_image21");})
                    $("[name='rebate_image19']").each(function (i){$(this).attr("name", "rebate_image20");})
                    $("[name='rebate_image18']").each(function (i){$(this).attr("name", "rebate_image19");})
                    $("[name='rebate_image17']").each(function (i){$(this).attr("name", "rebate_image18");})
                    $("[name='rebate_image16']").each(function (i){$(this).attr("name", "rebate_image17");})
                    $("[name='rebate_image15']").each(function (i){$(this).attr("name", "rebate_image16");})
                    $("[name='rebate_image14']").each(function (i){$(this).attr("name", "rebate_image15");})
                    $("[name='rebate_image13']").each(function (i){$(this).attr("name", "rebate_image14");})
                    $("[name='rebate_image12']").each(function (i){$(this).attr("name", "rebate_image13");})
                    $("[name='rebate_image11']").each(function (i){$(this).attr("name", "rebate_image12");})
                    $("[name='rebate_image10']").each(function (i){$(this).attr("name", "rebate_image11");})
                    $("[name='rebate_image9']").each(function (i){$(this).attr("name", "rebate_image10");})
                    $("[name='rebate_image8']").each(function (i){$(this).attr("name", "rebate_image9");})
                    $("[name='rebate_image7']").each(function (i){$(this).attr("name", "rebate_image8");})
                    $("[name='rebate_image6']").each(function (i){$(this).attr("name", "rebate_image7");})
                    $("[name='rebate_image5']").each(function (i){$(this).attr("name", "rebate_image6");})
                    $("[name='rebate_image4']").each(function (i){$(this).attr("name", "rebate_image5");})
                    $("[name='rebate_image3']").each(function (i){$(this).attr("name", "rebate_image4");})
                    $("[name='rebate_image2']").each(function (i){$(this).attr("name", "rebate_image3");})
                    $("[name='rebate_image1']").each(function (i){$(this).attr("name", "rebate_image2");})
                    $("[name='rebate_image']").each(function (i){$(this).attr("name", "rebate_image1");})
                    $("[name='rebate_image1']").each(function (i){$(this).attr("name", "rebate_image");})
                    $("[name='rebate_image2']").each(function (i){$(this).attr("name", "rebate_image1");})
                    $("[name='rebate_image3']").each(function (i){$(this).attr("name", "rebate_image2");})
                    $("[name='rebate_image4']").each(function (i){$(this).attr("name", "rebate_image3");})
                    $("[name='rebate_image5']").each(function (i){$(this).attr("name", "rebate_image4");})
            // $("[name='rebate_image']").each(function (i){$(this).attr("name", "rebate_image" + (i+1));})
                // для изменения id, id, name вопросов теста


                //<!-- Для добавления картинки -->                
                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image1').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image1").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image1").click(function () {$("#rebate_image1").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image2').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image2").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image2").click(function () {$("#rebate_image2").trigger('click');});
                    // Картинка как кнопка для загрузки картинку 


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image3').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image3").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image3").click(function () {$("#rebate_image3").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image4').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image4").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image4").click(function () {$("#rebate_image5").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image6').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image6").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image6").click(function () {$("#rebate_image6").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image7').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image7").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image7").click(function () {$("#rebate_image7").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image8').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image8").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image8").click(function () {$("#rebate_image8").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image9').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image9").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image9").click(function () {$("#rebate_image9").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image10').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image10").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image10").click(function () {$("#rebate_image10").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image11').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image11").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image11").click(function () {$("#rebate_image11").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image12').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image12").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image12").click(function () {$("#rebate_image12").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image13').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image13").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image13").click(function () {$("#rebate_image13").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image14').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image14").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image14").click(function () {$("#rebate_image14").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image15').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image15").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image15").click(function () {$("#rebate_image15").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image16').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image16").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image16").click(function () {$("#rebate_image16").trigger('click');});
                    // Картинка как кнопка для загрузки картинку


                    // отображения картинки
                    $(document).ready(function() {
                          function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                            reader.onload = function (e) {$('#rebate_old_image17').attr('src', e.target.result);}
                            reader.readAsDataURL(input.files[0]);}}
                            $("#rebate_image17").change(function(){readURL(this);});});
                    // отображения картинки
                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image17").click(function () {$("#rebate_image17").trigger('click');});
                    // Картинка как кнопка для загрузки картинку          
                //<!-- Для добавления картинки -->
            });

            // Для нумерации вопросов теста
            $(document).on('click', '.remove-tr', function(){
                var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });
            });
            var elements = document.querySelectorAll('.number');
                elements.forEach(function(item, i, arr) {
                    item.innerHTML = i+1+'';
                });
            // Для нумерации вопросов теста 
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
                                $('#rebate_old_image1').attr('src', e.target.result);
                              }            
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $("#rebate_image1").change(function(){
                            readURL(this);
                          });
                        });
                    // отображения картинки

                    // Картинка как кнопка для загрузки картинку
                    $("#rebate_old_image1").click(function () {
                        $("#rebate_image1").trigger('click');
                    });
                    // Картинка как кнопка для загрузки картинку

                </script>

 
        


        
    </section>

    
@endsection