@extends('layouts.app')

@section('content')
<style type="text/css">

.morecontent span {
    display: none;
}

</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h5 class="pt-3 mb-2"></h5>
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
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-light">
                        <div class="card-header">
                            <p class="text-muted text-center mb-0"><b>Название курса1: {{$podcategories['title']}}</b></p>
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
                            <!-- The time line -->
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
                <p class="text-muted text-center mb-0"><b>Название курса: {{$podcategories['title']}}</b></p>
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
                        <p class="text-muted mb-0">Цена <span class="float-right">{{$podcategories['price'] / 100}} сом</span></p><hr class="mt-2">
                        <p class="text-muted mb-0">Количество уроков <span class="float-right">{{$urok}}</span></p><hr class="mt-2">
                        <!--<p class="text-muted mb-0">Количество покупок <span class="float-right">{{$kupit}}</span></p><hr class="mt-2">-->
                        <p class="text-muted mb-0" data-bs-toggle="tooltip" data-bs-placement="left" title="
                        @if(($podcategories->srok_dostupa) > 0) 
                            @if($god1 > 0){{$god1}}г. 
                            @endif 
                            @if($mounth1 > 0){{$mounth1}}мес. 
                            @endif 
                            @if($day1 > 0){{$day1}} д. 
                            @endif 
                            @if($hour1 > 0){{$hour1}} ч. 
                            @endif 
                            @if($minute1 > 0){{$minute1}} мин. 
                            @endif 
                        @else
                        навсегда
                        @endif" 
                        >Срок доступа <span class="float-right">
                                @if($podcategories->srok_dostupa == 0) 
                                    навсегда 
                                @else
                                        @if($god1 > 0){{$god1}} г. ...
                                        @else
                                            @if($mounth1 > 0){{$mounth1}} мес. ...
                                            @else
                                                @if($day1 > 0){{$day1}} д. ...
                                                @else
                                                    @if($hour1 > 0){{$hour1}} ч. ...
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
                    <p class="text-muted text-center"><span style="font-size: 14px;">Оплата взимается с вашего баланса. Оплатив один раз вы получаете доступ к всем урокам данного курса.</span><br>Если при оплате возникнуть проблемы обращайтесь к нам.</p>
            </div>
            @if (Auth::user()->balance < $podcategories['price'])
                <p class="text-muted text-center mb-0"><b>У вас недостаточно средств для покупки данного материала. Пожалуйста <a href="">пополните баланс</a>.</b></p>
            @endif
            @if (Auth::user()->balance >= $podcategories['price'])
                <form action="{{ route('pokupky', $podcategories['id']) }}" method="POST">
                    @csrf
                    <input type="number" name="kurs_id" value="{{$podcategories['id']}}" class="form-control" id="inputEmail3" placeholder="id подкатегории" readonly="" hidden="">
                    <input type="text" name="kurs_title" value="{{$podcategories['title']}}" class="form-control" id="inputPassword3" placeholder="тема курса" readonly="" hidden="">
                    <input type="number" name="user_id" value="{{ Auth::user()->id }}" class="form-control" id="inputPassword3" placeholder="id пользователья" readonly="" hidden="">
                    <input type="text" name="user_name" value="{{ Auth::user()->name }}" class="form-control" id="inputPassword3" placeholder="ФИО" readonly="" hidden="">
                    <input type="number" name="price" value="{{$podcategories['price'] / 100}}" class="form-control" id="inputPassword3" placeholder="id пользователья" readonly="" hidden="">
                    <input type="text" name="proverka" value="{{ Auth::user()->id }}-{{$podcategories['id']}}" class="form-control" id="inputPassword3" placeholder="ФИО" readonly="" hidden="">
                    <button type="submit" class="btn btn-info btn-block float-right">Купить</button>
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
      title: '<h4 class="modal-title">У вас нет доступа!</h4>',
      text: 'Сначала оформите подписку',
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


</script>
@endsection