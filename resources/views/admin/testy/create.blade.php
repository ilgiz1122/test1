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
}
.fileUpload:hover, .fileUpload:active, .fileUpload:focus {
    background: ;
    color: #90EE90;
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
                                            <input type="text" name="test_title" class="form-control" placeholder="Введите название теста" required>
                                            <label>Описание теста</label>
                                            <textarea type="text" name="text" class="form-control" placeholder="Введите описание теста" required></textarea>
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
                                            <input type="file" id="rebate_imag" name="img" readonly="" required>
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
                                            <h5 align="center"><strong>Вопросы теста</strong><br><small></small></h5>
                                        </div>
                                        <div class="col-lg-2">
                                            <p style="color: #228B22;" align="center"><strong>Добавлено: <a id="clicks">3</a></strong></p>
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
                                                                        <input type="file" class="upload" id="rebate_image1" name="rebate_image1" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i style="font-size: 27px;" class="fas fa-image"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
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
                                                                        <input type="radio" name="r1" id="r1a" value="А">
                                                                        <label for="r1a">А</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r1" id="r1b" value="Б">
                                                                        <label for="r1b">Б</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r1" id="r1v" value="В">
                                                                        <label for="r1v">В</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r1" id="r1g" value="Г">
                                                                        <label for="r1g">Г</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="card card-primary" id="remov">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <h3 class="card-title"><span class="number">2</span> вопрос</h3>
                                                                <div class="col">
                                                                    <div class="fileUpload">
                                                                        <input type="file" class="upload" id="rebate_image2" name="rebate_image2" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i style="font-size: 27px;" class="fas fa-image"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="fig"><img id="rebate_old_image2" src="/img/testy.png" alt="" style="width: 50%"></p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r2" id="r2a" value="А">
                                                                        <label for="r2a">А</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r2" id="r2b" value="Б">
                                                                        <label for="r2b">Б</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r2" id="r2v" value="В">
                                                                        <label for="r2v">В</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r2" id="r2g" value="Г">
                                                                        <label for="r2g">Г</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="card card-primary" id="remov">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <h3 class="card-title"><span class="number">3</span> вопрос</h3>
                                                                <div class="col">
                                                                    <div class="fileUpload">
                                                                        <input type="file" class="upload" id="rebate_image3" name="rebate_image3" readonly="" required title="Нажмите чтобы загрузить картинку теста"><i style="font-size: 27px;" class="fas fa-image"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="fig"><img id="rebate_old_image3" src="/img/testy.png" alt="" style="width: 50%"></p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r3" id="r3a" value="А">
                                                                        <label for="r3a">А</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r3" id="r3b" value="Б">
                                                                        <label for="r3b">Б</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r3" id="r3v" value="В">
                                                                        <label for="r3v">В</label>
                                                                    </div>
                                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                                        <input type="radio" name="r3" id="r3g" value="Г">
                                                                        <label for="r3g">Г</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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







<!-- Для добавления картинки после нажатия кнопоки добавить вопрос-->
<script type="text/javascript">         
// Для добавления картинки 
    
                       
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
                    reader.onload = function (e) {$('#rebate_old_image5').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image5").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image6').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image6").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image7').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image7").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image8').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image8").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image9').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image9").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image10').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image10").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image11').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image11").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image12').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image12").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image13').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image13").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image14').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image14").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image15').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image15").change(function(){readURL(this);});});
         


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image16').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image16").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image17').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image17").change(function(){readURL(this);});});
        


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image18').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image18").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image19').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image19").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image20').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image20").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image21').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image21").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image22').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image22").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image23').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image23").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image24').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image24").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image25').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image25").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image26').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image26").change(function(){readURL(this);});});
          


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image27').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image27").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image28').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image28").change(function(){readURL(this);});});
          


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image29').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image29").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image30').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image30").change(function(){readURL(this);});});
            


            
   
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