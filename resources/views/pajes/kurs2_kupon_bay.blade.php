@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('packages/slick/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/slick/slick-theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('packages/custom_scroll/jquery.mCustomScrollbar.css') }}">
<style type="text/css">

.morecontent span {
    display: none;
}
.slick-slide {
      margin: 0px 10px;
    }

    .slick-slide img {
      width: 100%;
    }


    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }
    @media screen and (max-device-width: 400px) {
    .slick-slide {
          margin: 0px 0px;
        }
   }
   .img2{ 
        filter: blur(1px);
    } 

    @media (max-width: 768px) {
      .for_skryt {
        display: none;
      }
    }

    .bs-stepper-header {
        display: flex;
        overflow: auto;
    }
    @media (min-width: 768px) {
        .bs-stepper-header::-webkit-scrollbar { width: 0; display: none; }
    }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header pl-0 pr-0">
              <div class="container-fluid p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('home')}}">
                                <i class="nav-icon fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('vse_kursy')}}">
                                Курс
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('podcat', $category['id'])}}">
                                {{$category->title}}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$podcategories['title']}}</li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>
            @if($comments != null)
                <p class="text-center "><b>Пикирлер</b></p>
                <section class="for_comment_slider slider mt-3">
                    @foreach ($comments as $comment)
                    @php
                        $oblast1 = $oblast->where('id', $comment->user->oblast_id)->first();
                        $raion_shaar1 = $raion_shaar->where('id', $comment->user->raion_shaar_id)->first();
                    @endphp
                    <div>
                        <div class="card pr-2 pl-2 pb-3 pt-3" style="border-radius: 5px;">
                          <div class="row">
                              <div class="col-auto">
                                @if($comment->user->img_600_600 == null)
                                    <img src="https://nonsi.kg/public/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{$comment->user->name}}" width="100%"  style="max-width: 80px;">
                                @else
                                    <img src="{{ asset('public/storage/users/img_160_160/') }}/{{$comment->user->img_160_160}}" class="img-circle  shadow-sm"  alt="{{$comment->user->name}}" width="100%"  style="max-width: 80px;">
                                @endif 
                              </div>
                              <div class="col">
                                    <div class="content-4" style="max-height: 100px; verflow: auto; position: relative; height: 400px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;"><p><em>{!!$comment->text!!}</em></p></div>
                                    <p class="name mb-1">
                                        <b>
                                            @if($comment->user->f_fio != null)
                                                <span title="{{$comment->user->name}}">{{$comment->user->f_fio}} {{$comment->user->i_fio}} {{$comment->user->o_fio}}</span>
                                            @else
                                                <span>{{$comment->user->name}}</span>
                                            @endif
                                        </b>
                                    </p>
                                    <span class="position">
                                        @if($oblast1 != null)
                                            <i class="fas fa-map-marker-alt pr-2 text-muted"></i> {{$oblast1->title}} обл. / 
                                            @if($raion_shaar1 != null)
                                                {{$raion_shaar1->title}}
                                            @endif
                                        @endif
                                        
                                    </span>
                              </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </section>
            <div class="mt-5 mb-5"></div>
            @endif

            <div class="row">
                <div class="col-md-9">
                    <div class="card card-light">
                        <div class="card-header">
                            <p class="text-muted text-center mb-0"><b>Курс: {{$podcategories['title']}}</b></p>
                        </div>
                        <div class="card-body pt-3 pb-2 pl-3 pr-3">
                            @if($podcategories['video'] != null)
                                 <video oncontextmenu="return false;" controls controlsList="nodownload" width="100%" height="100%" style="border-radius: 3px;">
                                      <source id="video" src="https://nonsi.kg/public/storage/kursy/reklamnoevideo/{{$podcategories->video}}" type="video/mp4">
                                          Ваш браузер не поддерживает видео tag.
                                  </video>
                                @endif
                                @if($podcategories['youtube_video'] != null)
                                     <?php
                                      // http://youtu.be/dQw4w9WgXcQ
                                      // http://www.youtube.com/embed/dQw4w9WgXcQ
                                      // http://www.youtube.com/watch?v=dQw4w9WgXcQ
                                      // http://www.youtube.com/?v=dQw4w9WgXcQ
                                      // http://www.youtube.com/v/dQw4w9WgXcQ
                                      // http://www.youtube.com/e/dQw4w9WgXcQ
                                      // http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
                                      // http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
                                      // http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
                                      // http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
                                      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $podcategories->youtube_video, $match);
                                      $youtube_id = $match[1];

                                      ?>
                                  <div class="embed-responsive embed-responsive-16by9">
                                  <iframe style="border-radius: 3px;"
                                    class="embed-responsive-item"
                                      width="100%"
                                      height="100%"
                                      src="https://www.youtube.com/embed/<?php echo $youtube_id;  ?>"
                                      srcdoc="<style>*{padding:0;margin:0;overflow:hidden}
                                      html,body{height:100%}
                                      img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
                                      span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
                                      </style>
                                      <a href=https://www.youtube.com/embed/<?php echo $youtube_id;  ?>?autoplay=1>
                                      <img src=https://img.youtube.com/vi/<?php echo $youtube_id;  ?>/hqdefault.jpg alt='Demo video'>
                                      <span>▶</span>
                                      </a>"
                                      frameborder="0"
                                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                      allowfullscreen
                                      title="Play">
                                  </iframe>
                                  </div>
                                @endif
                                <div>
                                    <p class="">{!!$podcategories['opisanie']!!}</p>
                                </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-info btn-block float-right nomer_testa1">Сатып алуу</button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-info btn-block float-right nomer_testa3">Код киргизүү</button>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="row">
                        <div class="col-md-12">
                            @if($podcategories->col_modulei > 1)

                            @for ($i = 1; $i <= $podcategories->col_modulei; $i++)
                              <div class="row mt-2 align-items-center">
                                <div class="col">
                                  <hr class="mt-1 mb-3">
                                </div>
                                <div class="col-auto">
                                  <p class="mt-1 mb-3 text-muted"><b>{{$i}}-модуль</b></p>
                                </div>
                                <div class="col">
                                  <hr class="mt-1 mb-3">
                                </div>
                              </div>
                                @foreach ($urokies->where('modul_number', $i) as $uroky)
                                    @if (intval($uroky['status']) === 1)
                                        <div class="card card-light nomer_testa">
                                            <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                            <span class="float-right"><i class="fas fa-lock" style="font-size: 20px; color: Tomato;"></i></span>
                                            <p class="timeline-header no-border mb-0"><b>{{$uroky['title']}}</b><br><span class="text-muted" style="font-size: 15px;">Статус: жабык</span></p>
                                            </div><!-- /.card-body -->
                                        </div><!-- /.card -->
                                    @endif

                                    @if (intval($uroky['status']) === 0)
                                    <div class="card card-light block23">
                                        <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$uroky['id']])}}"></a>
                                        <div class="card-body pt-2 pb-2 pl-3 pr-2">
                                        <p class="timeline-header no-border mb-0"><b>{{$uroky['title']}}</b><br><span class="text-muted" style="font-size: 15px;">Статус: бекер</span></p>
                                        </div><!-- /.card-body -->
                                    </div><!-- /.card -->
                                    @endif
                                @endforeach
                            @endfor
                            @else
                                @foreach ($urokies as $uroky)
                                    @if (intval($uroky['status']) === 1)
                                        <div class="card card-light nomer_testa">
                                            <div class="card-body pt-2 pb-2 pl-3 pr-3">
                                            <span class="time"><i class="fas fa-lock" style="font-size: 25px; color: Tomato;"></i></span>
                                            <p class="timeline-header no-border mb-0"><b>{{$uroky['title']}}</b><br><span class="text-muted" style="font-size: 15px;">Статус: жабык</span></p>
                                            </div><!-- /.card-body -->
                                        </div><!-- /.card -->
                                    @endif

                                    @if (intval($uroky['status']) === 0)
                                    <div class="card card-light block23">
                                        <a style="display:block" href="{{ route('urokpaje', ['podcat_id'=>$podcategories->id, 'id'=>$uroky['id']])}}"></a>
                                        <div class="card-body pt-2 pb-2 pl-3 pr-3">
                                        <p class="timeline-header no-border mb-0"><b>{{$uroky['title']}}</b><br><span class="text-muted" style="font-size: 15px;">Статус: бекер</span></p>
                                        </div><!-- /.card-body -->
                                    </div><!-- /.card -->
                                    @endif
                                @endforeach
                            @endif
                        </div><!-- /.col -->
                    </div>
                    
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="sticky-top mb-3 mt-3">
                        <h6 class="text-muted text-center mb-0 pt-0 pb-2"><b>Автор ({{$podcategories->user['name']}}) менен байланышуу</b></h6>

                        @if($podcategories->phone_for_zvonok != null)
                        <div class="card card-body pt-2 pb-0 mb-2 mt-4 two">
                            <div class="row align-items-center block23">
                                <a href="tel:+996{{preg_replace('~[^0-9]+~','', $podcategories->phone_for_zvonok)}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #28a745;">
                                      <i class="fal fa-phone-alt"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>Чалуу</b> (позвонить)</p>
                                    <p class="text-muted text-center mb-0 pb-2">0{{$podcategories->phone_for_zvonok}}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($podcategories->phone_for_whatsapp != null)
                        <div class="card card-body pt-2 pb-0 mb-2 mt-4 two">
                            <div class="row align-items-center block23">
                                <a href="https://wa.me/+996{{preg_replace('~[^0-9]+~','', $podcategories->phone_for_whatsapp)}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #28a745;">
                                      <i class="fab fa-whatsapp"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp</b></p>
                                    <p class="text-muted text-center mb-0 pb-2">0{{$podcategories->phone_for_whatsapp}}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($podcategories->telegram != null)
                        <div class="card card-body pt-2 pb-0  mb-2 mt-4 two">
                            <div class="row align-items-center  block23">
                                <a href="https://t.me/{{$podcategories->telegram}}"></a>
                                <div class="col-auto">
                                    <span style="font-size: 3em; color: #17a2b8;">
                                      <i class="fab fa-telegram-plane"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>Telegram</b></p>
                                    <p class="text-muted text-center mb-0 pb-2"><a href="https://t.me/{{$podcategories->telegram}}">https://t.me/
                                        @if(strlen($podcategories->telegram) < 8)
                                            {{$podcategories->telegram}}
                                        @else
                                            {{substr($podcategories->telegram, 0, 5)}}...
                                        @endif
                                    </a></p>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>
                </div>
            </div><!-- /.row -->
            @if(\Auth::user())
                @php
                    $comment1 = $comments->where('user_id', \Auth::user()->id)->first();
                @endphp
                @if($comment1 != null)
                    <div class="mt-5 pb-5">
                        <form  action="{{ route('otpravit_otzyv_kursa_update', ['comment_id' => $comment1->id, 'product_id' => $podcategories->id]) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                            <div class="row align-items-top">
                              <div class="col-auto pr-1">
                                <p class="required mb-1"><b>Пикирди өзгөртүү</b></p>
                              </div>
                              <div class="col pr-0 pl-0">
                                <hr>
                              </div>
                              <div class="col-auto opisanie_bottom pl-0">
                                <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                              </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    @if($podcategories->user->img_80_80 == null)
                                    <img src="https://nonsi.kg/public/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{$podcategories->user->name}}" width="100%"  style="max-width: 50px;">
                                    @else
                                    <img src="{{ asset('public/storage/users/img_80_80/') }}/{{$podcategories->user->img_160_160}}" class="img-circle shadow-sm"  alt="{{$podcategories->user->name}}" width="100%" style="max-width: 50px;">
                                    @endif 
                                </div>
                                <div class="col pl-1">
                                    <div id="opisanie_text00">
                                        <div id="ttrr">
                                            <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}">{{$comment1->text}}</textarea>
                                            <div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info float-right mt-2 pt-1 pb-1 pl-3 pr-3">Өзгөртүү <i class="fas fa-arrow-right pl-2"></i></button>
                        </div>
                        </form>
                    </div>
                @else
                    @if($podcategories->price == 0)
                        <div class="mt-5 pb-5">
                            <form  action="{{ route('otpravit_otzyv_kursa', ['for_role' => '1', 'product_id' => $podcategories->id]) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('POST')
                            @if(Auth::user()->oblast_id == null)
                                <div class="row align-items-top">
                                  <div class="col-auto pr-1">
                                    <p class="required mb-1"><b>Пикир калтыруу</b></p>
                                  </div>
                                  <div class="col pr-0 pl-0">
                                    <hr>
                                  </div>
                                  <div class="col-auto opisanie_bottom pl-0">
                                    <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                    <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                                  </div>
                                </div>
                                <div class="row align-items-center">
                                    
                                        <div class="col-md-4 mt-2">
                                            <div class="row">
                                                <div class="col-auto pr-0">
                                                    @if($podcategories->user->img_80_80 == null)
                                                    <img src="https://nonsi.kg/public/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{$podcategories->user->name}}" width="100%"  style="max-width: 50px;">
                                                    @else
                                                    <img src="{{ asset('public/storage/users/img_80_80/') }}/{{$podcategories->user->img_160_160}}" class="img-circle shadow-sm"  alt="{{$podcategories->user->name}}" width="100%" style="max-width: 50px;">
                                                    @endif 
                                                </div>
                                                
                                                <div class="col">
                                                    <select name="oblast" id="materialcategory_id" class="form-control productcategory pt-0 pb-0 pl-1 pr-1" required="">
                                                        <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                                        @foreach ($oblast as $oblast)
                                                        <option value="{{$oblast['id']}}">{{$oblast['title']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Областты тандаңыз!</div>

                                                    <select name="raion_shaar" id="materialpodcategory_id" class="form-control productname pt-0 pb-0 pl-1 pr-1 mt-2" required="">
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
                                                    <div class="invalid-feedback">Районду / шаарды тандаңыз!</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <div id="opisanie_text00">
                                                <div id="ttrr">
                                                    <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                    <div class="invalid-feedback summernote02">Пикир жазыңыз!</div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @else
                                <div class="row align-items-top">
                                  <div class="col-auto pr-1">
                                    <p class="required mb-1"><b>Пикир калтыруу</b></p>
                                  </div>
                                  <div class="col pr-0 pl-0">
                                    <hr>
                                  </div>
                                  <div class="col-auto opisanie_bottom pl-0">
                                    <span id="opisanie_text"><i class="fas fa-pencil-alt pr-0 btn btn-tool"></i></span>
                                    <span id="opisanie_text_summernot"><i class="fas fa-trash btn btn-tool pr-0 btn btn-tool"></i></span>
                                  </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-auto pr-0">
                                        @if($podcategories->user->img_80_80 == null)
                                        <img src="https://nonsi.kg/public/admin/dist/img/user-icon.svg" class="img-circle shadow-sm"  alt="{{$podcategories->user->name}}" width="100%"  style="max-width: 50px;">
                                        @else
                                        <img src="{{ asset('public/storage/users/img_80_80/') }}/{{$podcategories->user->img_160_160}}" class="img-circle shadow-sm"  alt="{{$podcategories->user->name}}" width="100%" style="max-width: 50px;">
                                        @endif 
                                    </div>
                                    <div class="col pl-1">
                                        <div id="opisanie_text00">
                                            <div id="ttrr">
                                                <textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                <div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif 
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info float-right mt-2 pt-1 pb-1 pl-3 pr-3">Жөнөтүү <i class="fas fa-arrow-right pl-2"></i></button>
                            </div>
                            </form>
                        </div>
                    @endif
                @endif
            @endif
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
    <!-- /.content -->
    
                            <?php
                                $srok1 = $podcategories->srok_dostupa;
                                $god1 = floor($srok1 / 31536000);
                                $mounth1 = floor(($srok1 - $god1 * 31536000) / 2592000);
                                $day1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                                $hour1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                                $minute1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                            ?>
    
<div class="modal fade bd-example-modal-lg" id="modal-default" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="text-muted text-center mb-0"><b>Курс: {{$podcategories['title']}}</b></p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                        <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6 pl-3 pr-3">
                        <img class="d-block w-100" id="rebate_old_imag23" src="https://nonsi.kg/public/storage/kursy/images/thumbnail/{{$podcategories['img']}}" style="width: 100%; border-radius: 4px;">
                    </div>
                    <div class="col-md-6 pl-3 pr-3">
                        <p class="text-muted mb-0 pt-3">Автор <span class="float-right">{{$users->name}}</span></p><hr class="mt-2">
                        <p class="text-muted mb-0">Баасы <span class="float-right">(<del>{{$podcategories['price'] / 100}} сом</del>) {{$podcategories['price'] / 100 * 0.9}} сом</span></p><hr class="mt-2">
                        <p class="text-muted mb-0">Сабактардын саны <span class="float-right">{{$urok}}</span></p><hr class="mt-2">
                        <!--<p class="text-muted mb-0">Количество покупок <span class="float-right">{{$kupit}}</span></p><hr class="mt-2">-->
                        <p class="text-muted mb-0">Мүмкүндүк <small>(срок доступа)</small> <span class="float-right"  data-bs-toggle="tooltip" data-bs-placement="left" title="
                        @if(($podcategories->srok_dostupa) > 0) 
                            @if($god1 > 0){{$god1}}жыл  
                            @endif 
                            @if($mounth1 > 0){{$mounth1}}ай  
                            @endif 
                            @if($day1 > 0){{$day1}} күн 
                            @endif 
                            @if($hour1 > 0){{$hour1}} саат 
                            @endif 
                            @if($minute1 > 0){{$minute1}} мин. 
                            @endif 
                        @else
                        Чектөөсүз көрүү мүмкүндүгүнө ээ болосуз
                        @endif">
                                @if($podcategories->srok_dostupa == 0) 
                                    түбөлүк 
                                @else
                                        @if($god1 > 0){{$god1}} жыл ...
                                        @else
                                            @if($mounth1 > 0){{$mounth1}} ай ...
                                            @else
                                                @if($day1 > 0){{$day1}} күн ...
                                                @else
                                                    @if($hour1 > 0){{$hour1}} саат ...
                                                    @else
                                                        @if($minute1 > 0){{$minute1}} мин. ...
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                @endif</span></p><hr class="mt-2">
                        
                         
                    </div>                     
                </div>
                <div class="col-md-12">
                    <p class="text-muted text-center"><span style="font-size: 14px;">Төлөм сиздин балансыңыздан алынат. Бир жолу төлөө менен сиз бул курстун бардык сабактарын көрө аласыз. Кандайдыр бир көйгөйлөр жаралса, анда биз менен байланышыңыз.</span></p>
            </div>
            @if (Auth::user()->balance < $podcategories['price'])
                <p class="text-muted text-center mb-0"><b>Бул курсту сатып алууга каражатыңыз жетишсиз. Сураныч <a href="">балансыңызды толуктаңыз</a>.</b></p>
            @endif
            @if (Auth::user()->balance >= $podcategories['price'] * 0.9)
                
                <form action="{{ route('store_kupon_kurs', ['podcat_id'=>$podcategories['id'], 'id'=>$proverka2['id']]) }}" method="POST">
                    @csrf
                    <input type="number" name="kurs_id" value="{{$podcategories['id']}}" class="form-control" placeholder="id подкатегории" readonly="" hidden="">
                    <button type="submit" class="btn btn-info btn-block float-right">Сатып алуу</button>
                </form>
            @endif
            </div>
        </div>
    </div>
</div>




<div class="modal fade bd-example-modal-lg" id="modal-default3" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="text-muted text-center mb-0"><b>Курс: {{$podcategories['title']}}</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 pl-3 pr-3">
                        <img class="d-block w-100" id="rebate_old_imag23" src="https://nonsi.kg/public/storage/kursy/images/thumbnail/{{$podcategories['img']}}" style="width: 100%; border-radius: 4px;">
                    </div>
                    <div class="col-md-6 pl-3 pr-3">
                        <p class="text-muted mb-0 pt-3">Автор <span class="float-right">{{$users->name}}</span></p><hr class="mt-2">
                        <p class="text-muted mb-0">Сабактардын саны <span class="float-right">{{$urok}}</span></p><hr class="mt-2">
                        <p class="text-muted mb-0">Мүмкүндүк <small>(срок доступа)</small>
                            <span class="float-right" data-bs-toggle="tooltip" data-bs-placement="left" title="
                            @if(($podcategories->srok_dostupa) > 0) 
                                @if($god1 > 0){{$god1}}жыл
                                @endif 
                                @if($mounth1 > 0){{$mounth1}}ай
                                @endif 
                                @if($day1 > 0){{$day1}} күн
                                @endif 
                                @if($hour1 > 0){{$hour1}} саат
                                @endif 
                                @if($minute1 > 0){{$minute1}} мин.
                                @endif 
                            @else
                                Чектөөсүз көрүү мүмкүндүгүнө ээ болосуз
                            @endif">
                                @if($podcategories->srok_dostupa == 0) 
                                    түбөлүк
                                @else
                                        @if($god1 > 0){{$god1}} жыл ...
                                        @else
                                            @if($mounth1 > 0){{$mounth1}} ай ...
                                            @else
                                                @if($day1 > 0){{$day1}} күн ...
                                                @else
                                                    @if($hour1 > 0){{$hour1}} саат ...
                                                    @else
                                                        @if($minute1 > 0){{$minute1}} мин. ...
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                @endif
                            </span>
                        </p><hr class="mt-2">
                    </div>                     
                </div>


              <div class="card card-body pt-3">
                <form action="{{route('kurs_code_proverka', $podcategories['id'])}}" method="POST">
                    @csrf
                  <div class="form-row align-items-center">
                    <div class="col-md-10 pt-2">
                      <input id="code"  class="form-control" name="code" type="text" placeholder="Кодду жазыңыз" autocomplete="off">
                    </div>
                    <div class="col-md-2 text-right pt-2">
                      <button type="submit" class="btn btn-sm btn-info">Текшерүү</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('public/packages/custom_scroll/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('public/packages/custom_scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){$('#modal-default').modal('show');}, 0);
    }); 
</script>
<script type="text/javascript">

$(document).on('click', '.nomer_testa1', function(){    
    $('#modal-default').modal('show')
});

$(document).on('click', '.nomer_testa3', function(){    
    $('#modal-default3').modal('show')
});

$(document).on('click', '.nomer_testa', function(){    
    Swal.fire({
      icon: 'error',
      title: '<h4 class="modal-title">Жабык!</h4>',
      text: 'Алгач курсту сатып алуу керек',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      padding: '1rem',
  })
});


var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});



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



$('#opisanie_text').hide();
$('#opisanie_text_summernot').hide();

$("#opisanie_text").click(function () {
    var opisanie_text = $('#summernote2').val();
    $("#ttrr").remove();
    $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" id="summernote" class="form-control" required></textarea><div class="invalid-feedback summernote02">Пикир жазыңыз!</div></div>');
    $('#summernote').val(opisanie_text);
    $('#opisanie_text').hide();
    $('#opisanie_text_summernot').show();

    $(function () {
    // Summernote
        $('#summernote').summernote({
            lang: 'ru-RU',           // set maximum height of editor
            placeholder: 'Пикир жазыңыз',
            disableDragAndDrop: true,
            toolbar: [
                ['font', ['bold', 'underline', 'italic']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            focus: true,
            });
      });
});

@if(\Auth::user())
    @php
        $comment1 = $comments->where('user_id', \Auth::user()->id)->first();
    @endphp
    @if($comment1 != null)
        $("#opisanie_text_summernot").click(function () {
            $("#ttrr").remove();
            $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз">{{$comment1->text}}</textarea><div class="invalid-feedback summernote02">Пикир жазыңыз!</div></div>');
            document.getElementById("summernote2").focus();
            $('#opisanie_text').show();
            $('#opisanie_text_summernot').hide();
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
        });
    @else
        $("#opisanie_text_summernot").click(function () {
            $("#ttrr").remove();
            $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" rows="3" id="summernote2" class="form-control" required placeholder="Пикир жазыңыз"></textarea><div class="invalid-feedback summernote02">Пикир жазыңыз!</div></div>');
            document.getElementById("summernote2").focus();
            $('#opisanie_text').show();
            $('#opisanie_text_summernot').hide();
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
        });
    @endif
@endif
</script>
<script>
    (function($){
        $(window).on("load",function(){
            $(".content-4").mCustomScrollbar({
                theme:"dark-2",
            });
        });
    })(jQuery);
</script>
@endsection