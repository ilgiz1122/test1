@extends('layouts.app')

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


 
</style>
    

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
                                    @if($for_action == 0)
                                        Витрина
                                    @endif
                                </li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>
            <div class="row scroll">
                @if(count($vitrinas) != 0)
                @foreach ($vitrinas as $vitrina)
                    <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                        <div class="card shadow-sm flex-fill two">
                            <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                @php 
                                    $nomer1212 = $loop->iteration;
                                @endphp
                                <div id="carouselExampleIndicators{{$nomer1212}}" data-interval="false" data-keyboard="false"  data-touch="true" class="carousel slide" data-ride="carousel">
                                    <!--<ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators{{$nomer1212}}" data-slide-to="0" class="active testr"></li>
                                      <li data-target="#carouselExampleIndicators{{$nomer1212}}" data-slide-to="1" class="testr1"></li>
                                      <li data-target="#carouselExampleIndicators{{$nomer1212}}" data-slide-to="2" class="testr2"></li>
                                    </ol>-->
                                    
                                    <a style="width: 25px;" class="carousel-control-prev" href="#carouselExampleIndicators{{$nomer1212}}" role="button" data-slide="prev" @if(count($vitrinaimgs->where('vitrina_id', $vitrina->id)) < 2) hidden @endif>
                                      <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                      </span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators{{$nomer1212}}" role="button" data-slide="next" @if(count($vitrinaimgs->where('vitrina_id', $vitrina->id)) < 2) hidden @endif>
                                      <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                      </span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                    
                                    <div class="carousel-inner" style="border-top-left-radius: 4px; border-top-right-radius: 4px; width: 100%; height: 56.25%;">
                                      
                                        @foreach ($vitrinaimgs->where('vitrina_id', $vitrina->id) as $img)
                                        <div class="carousel-item @if($loop->iteration === 1)active @endif">
                                        <img class="d-block w-100" src="{{ asset('/storage/vitrina/img2/') }}/{{$img->img2}}" alt="{{$vitrina['title']}}">
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body pr-2 pl-2 pb-0 block23" style="padding-top: 10px;">
                                <a style="display:block" href="{{ route('vitrina_one', ['for_action' => '0', 'vitrina_id' => $vitrina->id])}}"></a>
                                <div class="row rrttrr">
                                  <div class="col">
                                    <p class="widget-user-desc mb-0">{{$vitrina['title']}}</p>
                                    <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$vitrina->user['name']}}</small></p>
                                  </div>
                                  <div class="w-100"></div>
                                  <div class="col align-self-end">
                                    <p class="text-muted mb-0"><small>{{$vitrina->vitrina_category->title}} / {{$vitrina->vitrina_podcategory->title}}</small></p>
                                  </div>
                                  <div class="col-auto align-self-end text-center">
                                    @if (intval($vitrina['oldprice']) != 0)<span class="text-muted pr-3"><small><del>{{$vitrina['oldprice'] / 100}} сом</del></small></span>@endif
                                  </div>
                                </div>
                            </div><!-- /.card-body -->

                            <div class="card-footer pr-2 pl-2 block23" style="padding-top: 0px;">       
                                <a style="display:block" href="{{ route('vitrina_one', ['for_action' => '0', 'vitrina_id' => $vitrina->id])}}"></a>                       
                              <div class="row">
                                <div class="col-4 border-right border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Тили:</small></span>
                                    <h5 class="description-header"><small>@if(intval($vitrina->language) != 4 ){{$vitrina->languages['language']}}@else - @endif</small></h5>
                                  </div>
                                </div>
                                <div class="col-4 border-right border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Көрдү:</small></span>
                                    <h5 class="description-header">
                                        <small><i class="far fa-eye pr-1"></i> {{$vitrina->view + 1}}</small>
                                    </h5>
                                  </div>
                                </div>
                                <div class="col-4 border-top">
                                  <div class="description-block mb-0 mt-0">
                                    @if (intval($vitrina['price']) === 0)
                                    <span class="description-text"><small>Баасы:</small></span>
                                    <h5 class="description-header"><small>бекер</small></h5>
                                    @else
                                    <span class="description-text"><small>Баасы:</small></span>
                                    <h5 class="description-header"><small>{{$vitrina['price'] / 100}} сом</small></h5>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div><!-- /.card -->
                    </div><!-- /.col -->
                @endforeach
                @else
                <div class="error-page mt-5 pt-5">
                    <div class="error-content">
                      <h3>Азырынча бул категорияга материал кошула элек, бирок жакында сөзсүз кошулат.</h3>
                      <p>
                        Эгерде сиз өзүңүздүн материалдарыңызды жайгаштырып сатууну кааласаңыз, анда биз менен <a href="{{ route('contact')}}">байланышыңыз</a>.
                      </p>
                    </div>
                </div>
                @endif
            </div>
            <div class="d-flex justify-content-center">
              {{$vitrinas->links()}}
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
    
    
var i=0;
  $(".carousel").each(function(){
    i++;
  $(this).attr("id","carouselExampleIndicators"+i); 
  });
  
  
 var i=0;
  $(".carousel-control-prev").each(function(){
    i++;
  $(this).attr("href","#carouselExampleIndicators"+i); 
  });


  var i=0;
  $(".carousel-control-next").each(function(){
    i++;
  $(this).attr("href","#carouselExampleIndicators"+i); 
  });
           
</script>
@endsection