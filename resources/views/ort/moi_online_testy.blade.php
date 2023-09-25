@extends('layouts.ort_layouts')

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
                          Менин ЖРТ <small>(тесттерим)</small>
                        </li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>
          <div class="row">
            @if($count != null)
            @foreach ($tests as $test2)
                            <?php
                                $test = $test2->test;
                            ?>


                      <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                        <div class="card shadow-sm flex-fill two block23">

                          @if ($test->test_category_id == 5)
                              <a style="display:block" href="{{ route('ort_negizgi_test_opentest', ['subdomain' => 'ort', 'for_action' => '1', 'id' => $test->id]) }}"></a>
                          @endif
                          @if ($test->test_category_id == 17)
                              <a style="display:block" href="{{ route('ort_predmettik_test_opentest', ['subdomain' => 'ort', 'for_action' => '2', 'id' => $test->id]) }}"></a>
                          @endif


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
                                                <?php
                                                    $nomer22 = $test_voprosy->where('test_id', $test->id)->count();
                                                ?>
                            <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                              <div class="row">
                                <div class="col-4 border-right border-top pr-1 pl-1">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>КУПЛЕНО:</small></span>
                                    <h5 class="description-header"><small>{{$test['created_at']->format('d.m.Y')}}</small></h5>
                                  </div>
                                </div>
                                <div class="col-4 border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Суроолор:</small></span>
                                    <h5 class="description-header"><small>{{$nomer22}}</small></h5>
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
                      <h3>Сиз азырынча бир дагы тест сатып ала элексиз.</h3>
                      <p>
                        Бирок тесттерди каалаган убакта сатып алсаңыз болот жана ошол сатып алган тесттерди бул жерден көрө аласыз.
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