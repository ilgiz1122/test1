@extends('layouts.app')
@section('title', 'Олимпиада')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
  .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-10px);
  }

@foreach ($olimpiadas as $olimpiada)
.countdown{{$olimpiada->id}} {
  display: inline-block;
}
.countdown-number{{$olimpiada->id}} {
  display: inline-block;
}
.countdown-time{{$olimpiada->id}} {
  display: inline-block;
}
.deadline-message{{$olimpiada->id}} {
  display: none;
}

@endforeach
 .visible{
  display: block;
}
.hidden{
  display: none;
}
</style>
    
@php
    $time = strtotime(date("Y-m-d H:i:s"));
@endphp  
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
                        <li class="breadcrumb-item active">
                            Олимпиада <small></small>
                        </li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>
          <div class="row" style="">
            @if(count($olimpiadas) != 0)
            @foreach ($olimpiadas as $olimpiada)


                      <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                        <div class="card shadow-sm flex-fill two block23">
                          <a style="display:block" href="{{ route('olimpiada_info', ['olimpiada_id'=>$olimpiada->id])}}"></a>
                            <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                
                                <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/olimpiada/images/thumbnail/{{$olimpiada['img2']}}">
                            </div>
                            <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                <div class="row rrttrr">
                                  <div class="col">
                                    <p class="widget-user-desc mb-0">{{$olimpiada['title']}} <small class="text-muted" title="Турлардын саны">({{$olimpiada->olimpiada_tury2_count}} тур)</small></p>
                                    <p class="text-muted mb-1">
                                      @if($olimpiada->nazvanie_orgonizasii != null)
                                        <span class="btn-tool p-0" title="Олимпиаданы өткөргөн мекеме"><i class="fas fa-university"></i></span>
                                        <small>{{$olimpiada->nazvanie_orgonizasii}}</small>
                                      @else
                                        <span class="btn-tool p-0" title="Автор"><i class="fas fa-user-circle"></i></span>
                                        <small>{{$olimpiada->user['name']}}</small>
                                      @endif
                                    </p>
                                  </div>
                                  <div class="w-100"></div>
                                  <div class="col align-self-end">
                                    <small class="text-muted">{{$olimpiada->predmety['title']}} / {{$olimpiada->klassy['number']}}-{{$olimpiada->klassy['title']}} / Тили: @if(intval($olimpiada->language) != 4 ){{$olimpiada->languages['language']}}@else - @endif</small>
                                  </div>
                                  <div class="col-auto align-self-end text-center">
                                    @if (intval($olimpiada['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107 "></i>@endif
                                  </div>
                                </div>
                            </div><!-- /.card-body -->

                            <div class="card-footer border-top pr-2 pl-2" style="padding-top: 0px;">                              
                              
                                @php 
                                    $olimpiada_tury1 = $olimpiada_tury->where('olimpiada_id', $olimpiada->id)->first();
                                @endphp
                                  <div class="description-block mb-0 mt-0 text-center">
                                    @if($olimpiada_tury1 != null)
                                      <h5 class="description-header">
                                        <small>
                                          {{$olimpiada_tury1->tur_number}}-турдун башталышы:
                                        </small>
                                      </h5>
                                      <h5 class="description-header">
                                        <small>
                                          {{date('d-m-Y / H:i', $olimpiada_tury1->nachalo_zdachi_tura)}}
                                        </small>
                                      </h5>
                                    @else
                                      <h5 class="description-header">
                                        <small>
                                          Олимпиада соңуна чыкты.
                                        </small>
                                      </h5>
                                      <h5 class="description-header">
                                        <small>
                                          Жыйынтыгын көрүү
                                        </small>
                                      </h5>
                                    @endif
                                  </div>
                            </div>
                        </div><!-- /.card -->
                    </div><!-- /.col -->

          @endforeach
          @else
          <div class="error-page mt-5 pt-5">
              <div class="error-content">
                <h3>Азырынча бул категорияга курс кошула элек, бирок жакында сөзсүз кошулат.</h3>
                <p>
                  Эгерде сиз өзүңүздүн курстарыңызды жайгаштырып сатууну кааласаңыз, анда биз менен <a href="{{ route('contact')}}">байланышыңыз</a>.
                </p>
              </div>
          </div>
          @endif
        </div>
        <div class="d-flex justify-content-center">
          {{$olimpiadas->links()}}
        </div>
          
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">



// для блока, чтобы стал кнопкой
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
// для блока, чтобы стал кнопкой


    function equalHeight(group) {
        var tallest = 0;
        group.each(function() {
            thisHeight = $(this).height();
            if(thisHeight > tallest) {
                tallest = thisHeight;
            }
        });
        group.height(tallest);
    }
    $(document).ready(function(){
        equalHeight($(".rrttrr"));
    });           
</script>
@endsection