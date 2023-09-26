@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('')}}/packages/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="{{asset('')}}/packages/slick/slick-theme.css">
<style>
.iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
    .cursor{
        cursor: pointer;
    }
    .img-svg path{
        fill: #FFFFFF;
    }
    .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-4px);
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
      opacity: .3;
    }

    .slick-current {
      opacity: 1;
    }
    
</style>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible pt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <div class="row">
                        <div class="col-auto">
                            <h5><i class="fas fa-times"></i></h5>
                        </div>
                        <div class="col">
                            <h5>{{ session('success') }}</h5>
                        </div>
                    </div>
                    
                </div>
            @endif
                    <section class="content-header pl-0 pr-0">
                      <div class="container-fluid p-0">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('home')}}">
                                        <i class="nav-icon fas fa-home"></i>
                                    </a>
                                </li>
                                @if($count_cat > 1)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('vse_materialy', ['for_action' => $for_action])}}">
                                        @if($for_action == 0)
                                            Презентация
                                        @endif
                                        @if($for_action == 1)
                                            Тест, <small>текшерүү иш, ...</small>
                                        @endif
                                        @if($for_action == 2)
                                            Шаблон
                                        @endif
                                        @if($for_action == 3)
                                            Грамота, <small>сертификат, ...</small>
                                        @endif
                                        @if($for_action == 4)
                                            План конспект
                                        @endif
                                    </a>
                                </li>
                                @endif
                                <li class="breadcrumb-item"><a href="{{ route('materialpodcategory', ['for_action' => $for_action, 'materialcategory' => $materialcategories['id']])}}">{{$materialcategories->title}}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('vsematerialy', ['for_action' => $for_action, 'id' => $materialpodcategories->id])}}">{{$materialpodcategories->title}}</a></li>
                                <li class="breadcrumb-item active">{{$materialies['title']}}</li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>
            <div class="row">
                <div class="col-md-9">
                    <section class="slider-for slider mt-0" style="margin-left: -10px; margin-right: -10px;">
                        @foreach ($materialimgs as $img)
                        <div style="border-radius: 10px;">
                            <img class="border" style="border-radius: 5px; width: 100%;" src="{{asset('')}}/storage/files/images/{{$img['img1']}}">
                        </div>
                        @endforeach
                    </section>
                    <section class="slider-nav slider mt-3" style="margin-left: -10px; margin-right: -10px;">
                        @foreach ($materialimgs as $img)
                        <div>
                            <img class="border shadow-sm" style="border-radius: 5px; width: 100%;" src="{{asset('')}}/storage/files/thumbnail/{{$img['img2']}}">
                        </div>
                        @endforeach
                    </section>
                    <p class="text-muted mb-3 mt-4">{!! $materialies->opisanie !!}</p>
                    <div class="row mt-3">
                        <div class="col-md-6 pl-2 pr-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted mb-0">Автор2 <span class="float-right">{{$materialies->user['name']}}</span></p><hr class="mt-1">
                                    <p class="text-muted mb-0">Тили <span class="float-right">@if(intval($materialies->language) != 4 ){{$materialies->languages['language']}}@else - @endif</span></p><hr class="mt-1">
                                    <p class="text-muted mb-0">Файл <span class="float-right">{{$materialies->type}} ({{$materialies->size}} мб)</span></p><hr class="mt-1 mb-0">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 pl-2 pr-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted mb-0">Баасы <span class="float-right">{{$materialies->price / 100}} сом</span></p><hr class="mt-1">
                                    <p class="text-muted mb-0">Жүктөлдү <span class="float-right">{{$materialies->kol_skachek}}</span></p><hr class="mt-1">
                                    <p class="text-muted mb-0">Сатылды <span class="float-right">{{$kupitmaterialovs}}</span></p><hr class="mt-1 mb-0">
                                </div>
                            </div>
                            
                        </div>                     
                    </div>
                        @if ($materialies->price != 0)
                            @if (Auth::user())
                                @if ($proverka != null)
                                @else
                                    @if($materialies->partnerka == 1)
                                    <p class="pt-2 pb-2 mb-0">
                                      <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <span style="color: white;">. </span><span class="float-right">Промокод колдонуу</span>
                                      </a>
                                    </p>
                                    <div class="shadow-lg collapse @error('promocod') show @enderror" id="collapseExample">
                                      <div class="card card-body pt-3">
                                        
                                        <form action="{{route('proverka_promo', $materialies['id'])}}" method="POST">
                                            @csrf
                                          <div class="form-row align-items-center">
                                            <div class="col-md-10 pt-2">
                                              <input id="promocod"  class="form-control @error('promocod') is-invalid @enderror" name="promocod" type="text" placeholder="Промокодду жазыңыз">
                                              @error('promocod')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 text-right pt-2">
                                              <button type="submit" class="btn btn-sm btn-info">Текшерүү</button>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                    @endif
                                @endif
                            @else
                                @if($materialies->partnerka == 1)
                                <p class="pt-2 pb-2 mb-0">
                                  <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <span style="color: white;">. </span><span class="float-right">Промокод колдонуу</span>
                                  </a>
                                </p>
                                <div class="shadow-lg collapse @error('promocod') show @enderror" id="collapseExample">
                                  <div class="card card-body pt-3">
                                    
                                    <form action="{{route('proverka_promo', $materialies['id'])}}" method="POST">
                                        @csrf
                                      <div class="form-row align-items-center">
                                        <div class="col-md-10 pt-2">
                                          <input id="promocod"  class="form-control @error('promocod') is-invalid @enderror" name="promocod" type="text" placeholder="Промокодду жазыңыз">
                                          @error('promocod')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 text-right pt-2">
                                          <button type="submit" class="btn btn-sm btn-info">Текшерүү</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                @endif
                            @endif
                        @endif

                            @if ($materialies->price != 0)
                                @if (Auth::user())
                                    @if ($proverka != null)
                                        <a href="{{ route('download02', $materialies['id'])}}" class="btn btn-block btn-info pt-1 mb-3">Жүктөп алуу</a>
                                    @else
                                        @if (Auth::user()->balance >= $materialies['price'])
                                            <!--<a href="{{ route('pokupkymaterialov', $materialies['id'])}}" class="btn btn-block btn-info pt-1  mb-3">Сатып алуу</a>-->
                                            <a type="button" class="btn btn-block btn-info pt-1  mb-3" data-toggle="modal" data-target="#exampleModal2">Сатып алуу</a>
                                        @else
                                            <a type="button" class="btn btn-block btn-info pt-1  mb-3" data-toggle="modal" data-target="#exampleModal">Сатып алуу</a>
                                        @endif
                                    @endif
                                @else
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-10">
                                            <p class="mb-2">Жүктөп же сатып алуу үчүн алгач системага кирүү керек</p>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <a href="{{ route('skachatmaterialov2', $materialies['id'])}}" class="btn btn-block btn-outline-info pt-1">Кирүү</a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <a href="{{ route('download', $materialies['ssylka'])}}" class="btn btn-block btn-info pt-1 mb-3">Жүктөп алуу</a>
                            @endif
                            

                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <h6 class="text-muted text-center mb-0 pt-0 pb-2"><b>Презентацияны кантип сатып алса болот?</b></h6>
                        <div class="card card-body pt-2 pb-0 mb-2 mt-2 two">
                            <div class="row align-items-center block23">
                                <a href="https://wa.me/+996505919600?text="></a>
                                <div class="col-auto">
                                    <span style="font-size: 5em; color: #28a745;">
                                      <i class="fab fa-whatsapp"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp</b></p>
                                    <p class="text-muted text-center mb-0 pb-2">0505 919 600</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-body pt-2 pb-0  mb-2 mt-4 two">
                            <div class="row align-items-center  block23">
                                <a href="https://t.me/ilgiz1209?text="></a>
                                <div class="col-auto">
                                    <span style="font-size: 5em; color: #17a2b8;">
                                      <i class="fab fa-telegram-plane"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-2"><b>Telegram</b></p>
                                    <p class="text-muted text-center mb-0 pb-2"><a href="https://t.me/ilgiz1209">ilgiz1209</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
    <!-- /.content -->


@if (Auth::user())
    @if (Auth::user()->balance <= $materialies['price'])
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content ">
          <div class="modal-header pt-2 pb-2" style="background: #f4f6f9;">
            <p class="mb-0"><b>Маалымат</b></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-center mb-0 pt-2 pb-2">Урматтуу колдонуучу, сиздин балансыныздагы акча каражаты бул презентацияны сатып алууга жетишсиз.</p>
            <small>
                <p class="text-muted mb-0 pt-3">Сиздин балансыңыз <span class="float-right">{{ Auth::user()->balance / 100 }} сом</span></p><hr class="mt-0">
                <p class="text-muted mb-0">Презентациянын баасы <span class="float-right">{{ $materialies['price']/ 100 }} сом</span></p><hr class="mt-0">
            </small>
            
          </div>
          <div class="modal-footer" style="background: #f4f6f9;">
            <p class="text-center text-muted mb-0 pt-0 pb-2"> Эгерде балансыңызды толуктап, ушул презентацияны сатып алууну кааласаңыз, анда биз менен байланышыңыз.</p>
            <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                <div class="row align-items-center block23">
                    <a href="https://wa.me/+996505919600?text="></a>
                    <div class="col-auto">
                        <span style="font-size: 3em; color: #28a745;">
                          <i class="fab fa-whatsapp"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="text-muted text-center mb-0 pt-0"><b>WhatsApp</b></p>
                    </div>
                </div>
            </div>
            <div class="card card-body pt-0 pb-0 mb-0 mt-2 two">
                <div class="row align-items-center  block23">
                    <a href="https://t.me/ilgiz1209?text="></a>
                    <div class="col-auto">
                        <span style="font-size: 3em; color: #17a2b8;">
                          <i class="fab fa-telegram-plane"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="text-muted text-center mb-0 pt-0"><b>Telegram</b></p>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content ">
          <div class="modal-header pt-2 pb-2" style="background: #f4f6f9;">
            <p class="mb-0"><b>Тастыктоо</b></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-center mb-0 pt-2 pb-2">Чындап эле сатып алууну каалайсызбы?</p>
                <p class="text-muted mb-0 pt-3">Тема <span class="float-right">{{ $materialies['title'] }}</span></p><hr class="mt-0">
                <p class="text-muted mb-0">Баасы <span class="float-right">{{ $materialies['price']/ 100 }} сом</span></p><hr class="mt-0">
            
          </div>
          <div class="modal-footer" style="background: #f4f6f9;">
            <a href="{{ route('pokupkymaterialov', $materialies['id'])}}" class="btn btn-block btn-info pt-1">Сатып алуу</a>
          </div>
        </div>
      </div>
    </div>
@endif


<script type="text/javascript">
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
</script>
@endsection