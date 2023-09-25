@extends('layouts.app')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">


input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }


   .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateX(-4px);
  }

   .two2{
    will-change: transform;
    transition: transform 400ms;
  }
  .two2:hover {
    transition: transform 300ms;
      background-color: #f4f6f9;
  }


.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}

.required p:after {
    color: #e32;
    content: ' *';
    display:inline;
}
.note-group-select-from-files {
  display: none;
}
</style>
    <!-- Тема -->
    <div class="content">
        <section class="content-header pl-0 pr-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="">
                        <i class="nav-icon fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">Сертификаттар</li>
            </ol>
        </section>
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
              </div>
          @endif
          @if (session('success2'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h5><i class="icon fas fa-check"></i> {{ session('success2') }}</h5>
              </div>
          @endif
            <!--Окно для уведомлений (успушно добавлена) -->
    </div>
    <!-- Тема -->



    
            
        <section class="preorder-snails content">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <p class="mb-0 text-center"><b>Сертификатты өзгөртүү</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('admin_certificate_users_plus_update', $certificate_user->id) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                                <div class="card-body p-2">
                                    <div class="form-group mt-2 pt-3">
                                        <label>Текст сертификата</label>
                                        <textarea name="text_certificata" id="summernote">{{$certificate_user->text}}</textarea>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8 border two2 mt-4 pt-3 pb-1 pr-2 pl-2" style="border-radius: 3px;">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 required">
                                                <label>Роль сертификата</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                        <input type="radio" name="rol" id="r1a" value="1" @if($certificate_user->for_role == 1) checked="" @endif>
                                                        <label for="r1a">Ручной</label>
                                                    </div>
                                                    <div class="col icheck-success d-inline input-group" align="center">
                                                        <input type="radio" name="rol" id="r1b" value="0" @if($certificate_user->for_role == 0) checked="" @endif>
                                                        <label for="r1b">Автоматический</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 required align-items-top border two2 mt-4 pt-3 pb-1 pr-2 pl-2" style="border-radius: 3px;">
                                        <p class="required mb-0">Датасы</p>
                                        <div class="row align-items-top hover1">
                                          <div class="col-auto pr-0">
                                            <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fas fa-calendar pr-1 btn-tool"></i></p>
                                          </div>
                                          <div class="col pl-0">
                                            <input name="data" value="{{date('d/m/Y', $certificate_user->data_in_certificate)}}" type="text" class="form-control color1 form-control-border  pr-1 pl-1 pt-2 pb-1" data-inputmask='"mask": "99/99/9999"' data-mask placeholder="25/05/2025" required="true" >
                                            <span class="res"></span>
                                            <div class="invalid-feedback">Датасын көрсөтүңүз!</div>
                                          </div>
                                        </div>
                                    </div>
                                </div>    
                                    

                                    
                                    <table class="table table-borderless price" id="linksTable">
                                        <tbody>
                                            <tr>
                                                <td class="pt-0 pb-0 pl-0 pr-0">
                                                    <div class="border shadow-sm two2 required ml-0 mr-0 pt-2 pb-3 pr-2 pl-2 mb-3" id="" style="border-radius: 3px;">
                                                        <div class="card-header ui-sortable-handle pt-0 pr-0 pl-0 pb-2" style="border-bottom: none;">
                                                            <p class="card-title" style=" font-size: 16px;">ФИО</p><div class="card-tools">
                                                                <button type="button" class="btn btn-tool remove-tr" onClick="clickM()" title="Удалить поле"><i class="fas fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="block-text2" id="block-2" style="display: block;">
                                                                    <input type="text" name="fio" maxlength="100" class="form-control" placeholder="ФИО" required autocomplete="off" value="{{$certificate_user->fio}}">
                                                                    <div class="invalid-feedback">ФИО жазылган жок</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="block-text2" id="block-2" style="display: block;">
                                                                    <input type="number" name="number" min="20000000" max="99999999" class="form-control" placeholder="20000000" autocomplete="off" value="{{$certificate_user->nomer_certificata}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer p-2">
                                    <button value="submit" name="submit" type="submit" class="btn btn-block btn-info">Сактоо</button>
                                </div>
                            </form>
                            
                        </div>
            <p id="clicks" style="display: none;">1</p>
            <p id="clicks_reer" style="display: none;">0</p>
            <p id="clicks_download" style="display: none;">0</p>

        </section><!-- /.content -->    
 


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- для инпут тайп файл -->    
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<!-- для инпут тайп файл --> 

<!-- для текстового редактора --> 

<script>

  $(function () {
    // Summernote
    $('#summernote').summernote({
        lang: 'ru-RU',
  height: 100,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  placeholder: 'Текст сертификата',
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
<!-- для текстового редактора --> 
@endsection