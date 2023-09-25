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
                                <li class="breadcrumb-item active">{{$materialpodcategories->title}}</li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>
            <div class="row scroll">
                @if(count($materialies) != 0)
                @foreach ($materialies as $materialy)
                    <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                        <div class="card shadow-sm flex-fill two">
                            <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                <div id="carouselExampleIndicators" data-interval="false" data-keyboard="false"  data-touch="true" class="carousel slide" data-ride="carousel">
                                    <!--<ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active testr"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="1" class="testr1"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="2" class="testr2"></li>
                                    </ol>-->
                                    <div class="carousel-inner" style="border-top-left-radius: 4px; border-top-right-radius: 4px; width: 100%; height: 56.25%;">
                                      
                                        @foreach ($materialimgs->where('materialy_id', $materialy->id) as $img)
                                        <div class="carousel-item @if($loop->iteration === 1)active @endif">
                                        <img class="d-block w-100" src="https://nonsi.kg/public/storage/files/thumbnail/{{$img['img2']}}" alt="{{$materialy['title']}}">
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                    <a style="width: 25px;" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                      <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-left" style="font-size: 30px;"></i>
                                      </span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                      <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-right" style="font-size: 30px;"></i>
                                      </span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                <div class="row rrttrr">
                                  <div class="col">
                                    <p class="widget-user-desc mb-0">{{$materialy['title']}}</p>
                                    <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$materialy->user['name']}}</small></p>
                                  </div>
                                  <div class="w-100"></div>
                                  <div class="col align-self-end">
                                    <p class="text-muted mb-0"><small>Тили: @if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</small></p>
                                  </div>
                                  <div class="col align-self-end text-center">
                                    @if (intval($materialy['oldprice']) != 0)<span class="text-muted"><small><del>{{$materialy['oldprice'] / 100}} сом</del></small></span>@endif
                                  </div>
                                  <div class="col align-self-end text-center">
                                    @if (intval($materialy['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107"></i>@endif
                                  </div>
                                </div>
                            </div><!-- /.card-body -->

                            <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                              <div class="row">
                                <div class="col-4 border-right border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Сатылды:</small></span>
                                    <h5 class="description-header"><small>{{$materialy->kupitmaterialov_count}}</small></h5>
                                  </div>
                                </div>
                                <div class="col-4 border-right border-top">
                                  <div class="description-block mb-0 mt-0">
                                    @if (intval($materialy['price']) === 0)
                                    <span class="description-text"><small>ДОСТУП:</small></span>
                                    <h5 class="description-header"><small>бекер</small></h5>
                                    @else
                                    <span class="description-text"><small>Баасы:</small></span>
                                    <h5 class="description-header"><small>{{$materialy['price'] / 100}} сом</small></h5>
                                    @endif
                                  </div>
                                </div>
                                <div class="col-4 border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><p class="mb-0"><span class="btn-tool"><i class="fas fa-download"></i></span> <small>{{$materialy->kol_skachek}}</small></p></span>
                                    <h5 class="description-header">
                                        <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $for_action, 'podcat_id' => $materialpodcategories->id, 'id' => $materialy->id])}}">скачать</a></small>
                                    </h5>
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
              {{$materialies->links()}}
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