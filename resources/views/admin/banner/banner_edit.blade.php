
@extends('layouts.app')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">

.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}

 .img2{ 
        filter: blur(2px);
        -webkit-box-shadow: inset 0px 0px 85px rgba(0,0,0,0.4);
        -moz-box-shadow:    inset 0px 0px 85px rgba(0,0,0,0.4);
        box-shadow:         inset 0px 0px 85px rgba(0,0,0,0.4);
    }
    .img3{ 
        filter: brightness(90%);
    }
</style>



    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
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
                    <div class="col-md-6">
                        <div class="card card-outline card-info pt-0 pb-0">
                            <div class="card-header"> 
                                <p class="mb-0 text-center"><b>Создание рекламы</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('banner_update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                                <div class="card-body pt-0 pb-0">
                                    <div class="form-group required pt-2">
                                        <label>Тема материала</label>
                                            <input type="text" name="title" maxlength="100" class="form-control" placeholder="Введите тему материала" onkeyUp="document.getElementById('div').innerHTML = this.value" required autocomplete="off" value="{{$banner->title}}">
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Введите тему материала.</div>
                                    </div>

                                    <div class="form-group mt-0 pt-0 required">
                                        <label>Краткое описание материала</label>
                                            <textarea type="text" name="opisanie" maxlength="255" style="height: 100px;" class="form-control" id="firstname2" placeholder="Описание (максимум 255 символов)" required onkeyUp="document.getElementById('div2').innerHTML = this.value">{{$banner->opisanie}}</textarea>
                                        <div class="valid-feedback">Заполнено</div>
                                        <div class="invalid-feedback">Заполните описание материала.</div>
                                    </div>

                                    <div class="form-group mt-0 pt-0">
                                        <label>Ссылка</label>
                                        <input type="text" name="ssylka" maxlength="255" class="form-control" placeholder="Введите ссылку" onkeyUp="document.getElementById('div').innerHTML = this.value" autocomplete="off" value="{{$banner->ssylka}}">
                                    </div>
                                
                                 

                                    <div class="">
                                        <label class="mt-0 pt-0">Картинки для фона</label><br>
                                        <div class="form-group align-items-center">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rebate_imag" name="img" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" title="Изменить">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Изменить" >{{$banner->img}}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-info">Сохранить</button>
                                </div>
                            </form>
                            
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <div class="sticky-top mb-3">
                                <div class="card mb-2 bg-gradient-dark" style="border-radius: 10px;">
                                    <div class="img3">
                                        <img class="card-img-top img2" id="rebate_old_imag" style="border-radius: 10px;" src="{{asset('')}}/storage/banner/{{$banner->img}}">
                                    </div>
                                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <h2 class="text-white "><b id="div">{{$banner->title}}</b></h2>
                                    <p class="card-text text-white pb-1 pt-3" id="div2">{{$banner->opisanie}}</p>
                                    <div class="text-right">
                                        <a href="#" class="btn btn-outline-info text-white" style="border-radius: 20px;"><span class="p-1">Кененирээк <i class="fas fa-long-arrow-alt-right mt-1 pl-2"></i></span></a>
                                    </div>
                                    
                                  </div>
                                </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->    



                            
                        
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script type="text/javascript">
//<!-- для инпут тайп файл --> 
$(document).ready(function () {
  bsCustomFileInput.init()
})
//<!-- для инпут тайп файл --> 

    $(document).ready(function() {
    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
        reader.onload = function (e) {$('#rebate_old_imag').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);}}
        $("#rebate_imag").change(function(){readURL(this);});});
    // Картинка как кнопка для загрузки картинку
    $("#rebate_old_imag").click(function () {
        $("#rebate_imag").trigger('click');
    });

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