@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
<style type="text/css">
    .custom-file-upload {
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
    .custom-file-upload input.upload {
        display: none;
    }
</style>
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            
            <!--Окно для уведомлений (успушно удалена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--/.Окно для уведомлений (успушно удалена) -->
        </div>
    </div>
    <!-- /.Тема -->






            <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    
                </div>
                <div class="col-md-6">
                    <div class="card card-outline card-widget widget-user1 shadow-lg">
                        <form method="POST" action="{{ route('profil.update', $users['id']) }}"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                        <h3 class="profile-username text-center pb-1 mt-2 pt-3">Маалыматтарды өзгөртүү</h3>
                        <div class="row align-items-center">
                            <div class="col-4"></div>
                            <div class="col-4 text-center">
                                <label class="p-0 m-0" for="rebate_image1">
                                    @if(Auth::user()->img_600_600 != null)
                                        <img id="rebate_old_image1" class="mb-0 mt-3 img-circle" src="{{ asset('public/storage/users/img_600_600/') }}/{{Auth::user()->img_600_600}}" style="width: 100%;" type="button" title="Нажмите чтобы загрузить картинку">
                                    @else
                                        <img id="rebate_old_image1" class="mb-0 mt-3" src="https://nonsi.kg/public/admin/dist/img/user_plus1.png" style="width: 100%;" type="button" title="Нажмите чтобы загрузить картинку">
                                    @endif
                                </label>
                                <input type="file" class="upload" id="rebate_image1" name="rebate_image1"   title="Нажмите чтобы загрузить картинку теста" hidden="" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">                                
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <div class="card-body box-profile mt-1">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b style="color: #28a745;">Логин</b> <a class="float-right"><input type="text" id="name" style="height: 25px; border: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" class="text-right form-control form-control-border @error('name') is-invalid @enderror" name="name" value="{{Request::old('name') ?: Auth::user()->name}}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b style="color: #28a745;">Телефон</b> <a class="float-right">
                                        <input type="text" style="height: 25px; border: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" id="phone" class="text-right form-control form-control-border @error('phone') is-invalid @enderror" data-inputmask='"mask": "0(999) 999-999"' data-mask name="phone" value="{{Request::old('phone') ?: Auth::user()->phone}}" required="" placeholder="0(709) 999-999">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b style="color: #28a745;">Фамилия</b> <a class="float-right"><input type="text" style="height: 25px; border: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" class="text-right form-control form-control-border @error('f_fio') is-invalid @enderror" name="f_fio" value="{{Request::old('f_fio') ?: Auth::user()->f_fio}}" autocomplete="f_fio" required="" autofocus placeholder="Фамилия">
                                    @error('f_fio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b style="color: #28a745;">Аты</b> <a class="float-right"><input type="text" style="height: 25px; border: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" class="text-right form-control form-control-border @error('i_fio') is-invalid @enderror" name="i_fio" value="{{Request::old('i_fio') ?: Auth::user()->i_fio}}" autocomplete="i_fio" autofocus placeholder="Аты" required="">
                                    @error('i_fio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b style="color: #28a745;">Атасынын аты</b> <a class="float-right"><input type="text" style="height: 25px; border: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" class="text-right form-control form-control-border @error('o_fio') is-invalid @enderror" name="o_fio" value="{{Request::old('o_fio') ?: Auth::user()->o_fio}}" autocomplete="o_fio" required="" autofocus placeholder="Атасынын аты">
                                    @error('o_fio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </a>
                                </li>
                                <li class="list-group-item pb-0">
                                    <b style="color: #28a745;">Область</b>
                                    <a class="float-right">
                                        <select name="oblast" id="materialcategory_id" class="form-control form-control-border productcategory pt-0 pb-2 text-right" @error('oblast') is-invalid @enderror style="border-bottom: none;" required="">
                                            <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                            @foreach ($oblast as $oblast)
                                            <option value="{{$oblast['id']}}" @if(Auth::user()->oblast_id == $oblast['id']) selected="" @endif>{{$oblast['title']}}</option>
                                            @endforeach
                                        </select>
                                        @error('oblast')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </a>
                                </li>
                                <li class="list-group-item pb-0">
                                    <b style="color: #28a745;">Район/шаар</b>
                                    <a class="float-right">
                                        <select name="raion_shaar" id="materialpodcategory_id" class="form-control form-control-border productname pt-0 pb-2 text-right" @error('raion_shaar') is-invalid @enderror style="border-bottom: none;" required="">
                                            @if(Auth::user()->oblast_id != null)
                                                @if(Auth::user()->raion_shaar_id != null)
                                                    @php
                                                        $raion_shaar1 = $raion_shaar->where('id', Auth::user()->raion_shaar_id)->first();
                                                    @endphp
                                                    <option value="{{$raion_shaar1->id}}" selected="true">{{$raion_shaar1->title}}</option>
                                                @else
                                                    <option value="" disabled="true" selected="true">Алгач областты тандаңыз</option>
                                                @endif
                                            @else
                                                <option value="" disabled="true" selected="true">Алгач областты тандаңыз</option>
                                            @endif
                                        </select>
                                        @error('raion_shaar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b style="color: #28a745;">Айыл</b> <a class="float-right"><input type="text" style="height: 25px; border: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" class="text-right form-control form-control-border @error('aiyl_title') is-invalid @enderror" name="aiyl_title" value="{{Request::old('aiyl_title') ?: Auth::user()->aiyl_title}}" required autocomplete="aiyl_title" autofocus placeholder="Айыл">
                                    @error('aiyl_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b style="color: #28a745;">Мектеп/Мекеме</b> <a class="float-right"><input type="text" style="height: 25px; border: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" class="text-right form-control form-control-border @error('mektep_title') is-invalid @enderror" name="mektep_title" value="{{Request::old('mektep_title') ?: Auth::user()->mektep_title}}" required autocomplete="mektep_title" autofocus placeholder="Мектеп/Мекеме">
                                    @error('mektep_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </a>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-info btn-block"><i class="fas fa-pencil-alt pr-2"></i> Өзгөртүү</button>
                            
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-3">
                    
                </div>
            </div><!-- /.row --> 
        </div><!-- /.container-fluid -->
    </section>
        
    <!-- Контент -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function(){

        jQuery('select[name="oblast"]').on('change',function(){
            var countryID = jQuery(this).val();
            if(countryID)
            {
                jQuery.ajax({
                    url : '/olimpiada/info/raion/' +countryID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        jQuery('select[name="raion_shaar"]').empty();
                        $('select[name="raion_shaar"]').append('<option value="" disabled="true" selected="true">Районду / шаарды тандаңыз</option>');
                        jQuery.each(data, function(key,value) {
                            $('select[name="raion_shaar"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="raion_shaar"]').empty();
            }
        });
    });


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
                $("#rebate_image1").change(function(){readURL(this);});
            });
</script>


@endsection