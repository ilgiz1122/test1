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
                                <li class="breadcrumb-item">
                                    <a href="{{ route('vse_testy', ['for_action' => $for_action])}}">
                                        @if($for_action == 0)
                                            Онлайн тест
                                        @endif
                                        @if($for_action == 1)
                                            ЖРТ <small>(ОРТ)</small>
                                        @endif
                                        @if($for_action == 2)
                                            НЦТ <small>(тест)</small>
                                        @endif
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('testpodcategory', ['for_action' => $for_action, 'id' => $test_category->id])}}">{{$test_category->title}}</a></li>
                                <li class="breadcrumb-item active">{{$test_podcategories->title}}</li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>
          <div class="row">
            @if(count($tests) != 0)
            @foreach ($tests as $test)

              <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                        <div class="card shadow-sm flex-fill two block23">
                          <a style="display:block" href="{{route('opentest', ['for_action' => $for_action, 'id' => $test->id])}}"></a>
                            <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                              <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/storage/testy/images/thumbnail/{{$test['img']}}">
                            </div>
                            <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                <div class="row rrttrr">
                                  <div class="col">
                                    <p class="widget-user-desc mb-0">{{$test['title']}}</p>
                                    <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$test->user['name']}}</small></p>
                                  </div>
                                  <div class="w-100"></div>
                                  <div class="col align-self-end">
                                    <p class="text-muted mb-0"><small>Тили: @if(intval($test->language) != 4 ){{$test->languages['language']}}@else - @endif</small></p>
                                  </div>
                                  <div class="col align-self-end text-center">
                                    @if (intval($test['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107"></i>@endif
                                  </div>
                                  <div class="col align-self-end text-center">
                                    @if (intval($test['oldprice']) != 0)<span class="text-muted"><small><del>{{$test['oldprice'] / 100}} сом</del></small></span>@endif
                                  </div>
                                </div>
                            </div><!-- /.card-body -->

                            <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                              <div class="row">
                                <div class="col-4 border-right border-top pr-1 pl-1">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Суроолор:</small></span>
                                    <h5 class="description-header"><small>{{$test->test_voprosy_count}}</small></h5>
                                  </div>
                                </div>
                                <div class="col-4 border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Сатылды:</small></span>
                                    <h5 class="description-header"><small>{{$test->tests_kupit_count}}</small></h5>
                                  </div>
                                </div>
                                <div class="col-4 border-right border-top">
                                  <div class="description-block mb-0 mt-0">
                                    @if (intval($test['price']) === 0)
                                    <span class="description-text"><small>ДОСТУП:</small></span>
                                    <h5 class="description-header"><small>бекер</small></h5>
                                    @else
                                    <span class="description-text"><small>Баасы:</small></span>
                                    <h5 class="description-header"><small>{{$test['price'] / 100}} сом</small></h5>
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
                <h3>Азырынча бул категорияга тест кошула элек, бирок жакында сөзсүз кошулат.</h3>
                <p>
                  Эгерде сиз өзүңүздүн тесттериңизди жайгаштырып сатууну кааласаңыз, анда биз менен <a href="{{ route('contact')}}">байланышыңыз</a>.
                </p>
              </div>
          </div>
          @endif
        </div>
        <div class="d-flex justify-content-center">
          {{$tests->links()}}
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