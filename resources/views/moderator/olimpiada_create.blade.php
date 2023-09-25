@extends('layouts.moderator_layouts')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">

.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}
.required .required:after {
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
.for_upload_img{
  width: calc(33.3333% - 16px);
  padding: 0px;
}
.for_upload_img2{
  width: calc(50% - 18px);
  padding: 0px;
}

.form-control-border:hover {
    background: #f8f9fa;
    outline: 0; width: 100%;
    resize: none;
    border-bottom: 1px solid #17a2b8;
}
.hover1:hover {
    background: #f8f9fa;
}
.hover1:hover .color1{
    background: #f8f9fa;
}

color1
.form-control-border:focus {
  background: #f8f9fa;
  outline: 0; width: 100%;
  resize: none;
}
.note-group-select-from-files {
  display: none;
}
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
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
                                <p class="mb-0 text-center"><b>Олимпиада түзүү</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('moderator_olimpiada_store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="card-body pl-3 pr-3">
                                    <div class="form-group required mt-3 mb-0">
                                        <p class="required mb-0">Мекеменин аталышы <small>(Билим берүү борбору, мектеп, ...)</small></p>
                                            <input type="text" name="nazvanie_organizasii" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Билим берүү борбору, мектеп, ..." value="{{ old('nazvanie_organizasii') }}" required autocomplete="off">
                                        <div class="invalid-feedback">Мекеменин аталышын жазыңыз!</div>
                                    </div>
                                    <div class="form-group required mt-5 mb-3">
                                        <p class="required mb-0">Темасы</p>
                                            <input type="text" id='files2' name="title" maxlength="100" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Темасын жазыңыз" value="{{ old('title') }}" required autocomplete="off">
                                        <div class="invalid-feedback">Темасын жазыңыз!</div>
                                    </div>
                                    <div class="form-group mt-5 required">
                                        <div class="row align-items-top">
                                          <div class="col">
                                            <p class="required mb-1">Кыскача түшүндүрмөсү</p>
                                          </div>
                                          <div class="col-auto opisanie_bottom">
                                            <i id="opisanie_text" class="fas fa-pencil-alt btn btn-tool pr-0"></i>
                                            <i id="opisanie_text_summernot" class="fas fa-trash btn btn-tool pr-0"></i>
                                          </div>
                                        </div>
                                        <div id="opisanie_text00">
                                            <div id="ttrr">
                                                <textarea name="opisanie" rows="1" id="summernote2" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required placeholder="Кыскача түшүндүрмөсүн жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                <div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-row m-0">      
                                        <div class="form-group col-md-4 mb-0 required mt-5 pl-0">
                                            <p class="required mb-0">Предмети</p>
                                            <select name="predmety" id="predmety_id" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required="">
                                                <option value="" disabled="true" selected="true">Предметти тандаңыз</option>
                                                @foreach ($predmety as $predmety)
                                                <option value="{{$predmety['id']}}">{{$predmety['title']}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Предметти тандаңыз!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5 pr-0">
                                            <p class="required mb-0">Классы</p>
                                            <select name="klassy" id="klassy_id" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required="">
                                                <option value="" disabled="true" selected="true">Классты тандаңыз</option>
                                                @foreach ($klassy as $klassy)
                                                <option value="{{$klassy['id']}}">{{$klassy['number']}}-{{$klassy['title']}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Классты тандаңыз!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5 pl-0">
                                            <p class="required mb-0">Тили</p>
                                            <select name="language" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" required="">
                                                <option value="" disabled="true" selected="true">Тилин тандаңыз</option>
                                                @foreach ($languages as $language)
                                                <option value="{{$language->id}}">{{$language->language}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Тилин тандаңыз!</div>
                                        </div>
                                    </div>
                                    

                                    <div class="required mt-5">
                                        <div class="row align-items-top">
                                          <div class="col">
                                            <p class="required mb-1">Сүрөт <small>(карточка үчүн)</small></p>
                                          </div>
                                          <div class="col-auto img_hide">
                                            <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                          </div>
                                        </div>
                                        <div class="form-group align-items-center mb-1">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control-border" id="rebate_imag" name="img" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp"  required>
                                                <span class="custom-file-label span_img" for="rebate_imag" data-browse="Жүктөө">Сүрөттү тандаңыз</span>
                                                <div class="invalid-feedback">Сүрөттү тандаңыз!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col p-0 mt-1">
                                        <div id="image-holder2" class="img_hide" style="border-radius: 4px; margin-left: -8px; margin-right: -8px;"></div>
                                    </div>





                                    <div class="form-row m-0">      
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="required mb-1">Телефон номериңиз <small>(чалуу үчүн)</small></p>
                                            <div class="row align-items-end hover1">
                                              <div class="col-auto pr-0">
                                                <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fas fa-phone-alt pr-3" style="color: green;"></i> +996</p>
                                              </div>
                                              <div class="col pl-0">
                                                <input name="phone_for_zvonok" value="{{ old('phone_for_zvonok') }}" type="text" class="form-control color1 form-control-border  pr-1 pl-1 pt-2 pb-1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999" required="true">
                                                <div class="invalid-tooltip">Телефон номериңизди жазыңыз!</div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="mb-1">WhatsApp номериңиз</p>
                                            <div class="row align-items-end hover1">
                                              <div class="col-auto pr-0">
                                                <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-whatsapp pr-3" style="color: green; font-size: 20px;"></i> +996</p>
                                              </div>
                                              <div class="col pl-0">
                                                <input name="phone_for_whatsapp" value="{{ old('phone_for_whatsapp') }}" type="text" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-1 color1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999">
                                              </div>
                                            </div>
                                        </div>
                                    </div>


                               
                                    <div class="form-row align-items-end m-0">
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <!-- 
                                            <p class="required mb-0">Каттоонун башталыш датасы</p>
                                            <div class="row align-items-end hover1">
                                              <div class="col-auto pr-0">
                                                <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fas fa-calendar pr-1 btn-tool"></i></p>
                                              </div>
                                              <div class="col pl-0">
                                                <input name="data_nachalo_registrasii" value="{{ old('data_nachalo_registrasii') }}" type="text" class="form-control color1 form-control-border  pr-1 pl-1 pt-2 pb-1" data-inputmask='"mask": "99/99/9999  (99:99)"' data-mask placeholder="25/05/2025  (16:00)" required="true">
                                                <span class="res"></span>
                                                <div class="invalid-feedback">Каттоонун башталыш датасын көрсөтүңүз!</div>
                                              </div>
                                            </div>-->
                                        </div>
                                        <div class="form-group col-md-8 mb-2 required mt-5">
                                            <div class="col-auto dropup mt-0 text-right p-0">
                                              <a class="btn btn-default btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Маалымат кошуу <i class="fas fa-plus pl-2"></i></a>
                                              <!-- dropdown-menu -->
                                              <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                                <button class="dropdown-item for_click_telefram" type="button">
                                                  <div class="media">
                                                    <div class="media-body">
                                                      <h3 class="dropdown-item-title pt-2 pb-2">
                                                        Telegram
                                                        <span class="float-right text-sm"><i class="fab fa-telegram-plane btn btn-tool" style="font-size: 25px;"></i></span>
                                                      </h3>
                                                    </div>
                                                  </div>
                                                </button>
                                                
                                              </div>
                                            </div>
                                        </div>
                                    </div>


                                    

                                    <div class="form-group file_hide_telefram mb-0 required mt-3">
                                        <div class="row align-items-top">
                                            <div class="col">
                                                <p class="required mb-1">Telegram <small>(Имя пользователя)</small></p>
                                            </div>
                                            <div class="col-auto">
                                                <i id="telegram_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                            </div>
                                        </div>
                                        <div class="row align-items-end hover1">
                                          <div class="col-auto pr-0">
                                            <p class="form-control form-control-border color1 pr-0 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-telegram-plane pr-3" style="color: green;"></i> https://t.me/</p>
                                          </div>
                                          <div class="col pl-0">
                                            <input name="telegram" value="{{ old('telegram') }}" id="for_telefram_input" type="text" class="form-control form-control-border pr-1 pl-0 pt-2 pb-1 color1" placeholder="nonsi_kg">
                                            <div class="invalid-tooltip">Толтуруңуз, болбосо өчүрүңүз!</div>
                                          </div>
                                        </div>
                                    </div>
 

                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-info">Сактоо</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">

                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->    



                            
                            
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>



  <script type="text/javascript">


$('#opisanie_text').show();
$('#opisanie_text_summernot').hide();
$('.file_hide_telefram').hide();

$(".for_click_telefram").click(function () {
    $('.file_hide_telefram').show();
    $('#for_telefram_input').focus();
    $('#for_telefram_input').prop('required', true);
});

$("#telegram_clear").click(function () {
    $('.file_hide_telefram').hide();
    $('#for_telefram_input').prop('required', false);
    $('#for_telefram_input').val("");
});






$("#opisanie_text").click(function () {
    var opisanie_text = $('#summernote2').val();
    $("#ttrr").remove();
    $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" id="summernote" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required></textarea><div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div></div>');
    $('#summernote').val(opisanie_text);
    $('#opisanie_text').hide();
    $('#opisanie_text_summernot').show();

    $(function () {
    // Summernote
        $('#summernote').summernote({
            lang: 'ru-RU',            // set maximum height of editor
              placeholder: 'Кыскача түшүндүрмөсүн жазыңыз',
              disableDragAndDrop: true,
              toolbar: [
                  ['font', ['style', 'bold', 'underline', 'italic', 'strikethrough', 'superscript', 'subscript', 'height']],
                  ['fontname', ['fontname']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table', 'hr', 'link', 'picture', 'video', 'undo', 'redo', 'fullscreen']],
                ],
                focus: true,
            });
      });
});


$("#opisanie_text_summernot").click(function () {
    $("#ttrr").remove();
    $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" rows="1" id="summernote2" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required placeholder="Кыскача түшүндүрмөсүн жазыңыз"></textarea><div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div></div>');
    document.getElementById("summernote2").focus();
    $('#opisanie_text').show();
    $('#opisanie_text_summernot').hide();
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
});
</script>






   
<script type="text/javascript">

//<!-- для инпут тайп файл --> 
$(document).ready(function () {
  bsCustomFileInput.init()
})
//<!-- для инпут тайп файл --> 
</script>


<script>
// для карусели
    // отображение картинки
    $(document).ready(function() {
    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
        reader.onload = function (e) {$('#rebate_old_imag').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);}}
        $("#rebate_imag").change(function(){readURL(this);});});
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



$('.img_hide').hide();



$(function () {
    $('#btn-img_upload').click(function (e) {
        e.preventDefault();
        $('#rebate_imag').click();
    });

    $('#rebate_imag').on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder2 = $("#image-holder2");
          image_holder2.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "for_upload_img border shadow-sm m-2",
                    "style": "border-radius: 4px;"
                  }).appendTo(image_holder2);
                }
                image_holder2.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
          $('.img_hide').show();
          $('.img_hide2').hide();
      });

    $("#uploadimg_clear").click(function () {
        $("#rebate_imag").val("");
        $(".span_img").text("Сүрөттөрдү тандаңыз");
        $('.img_hide').hide();
        $('.img_hide2').show();
        $('.for_upload_img').remove();
    });
});
</script>



@endsection