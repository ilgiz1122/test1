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
          <h5 class="pt-3 mb-2 pl-2">Все олимпиады</h5>
          <div class="row">
            @foreach ($olimpiadas as $olimpiada)
                            
            <div class="col-md-4 d-flex px-lg-3 py-lg-2">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow flex-fill two">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="card-header pt-0 pb-0 pl-0 pr-0 block23">
                 <a style="display:block" href=""></a>
                <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/storage/olimpiada/images/thumbnail/{{$olimpiada['img']}}">
              </div>
              <!--<div class="widget-user-image">
                <img class="img-circle elevation-2" style="" src="/admin/dist/img/inform.png" alt="User Avatar">
              </div>-->
              <div class="card-body pr-3 pl-3 block23 pb-1" style="padding-top: 35px;">
                <a style="display:block" href=""></a>
                
                <div class="row rrttrr">
                  <div class="col">
                    <h5 class="widget-user-desc">{{$olimpiada['title']}}</h5>
                    <p class="text-muted">Автор: {{$olimpiada->user['name']}}</p>
                  </div>
                  <div class="w-100"></div>
                  <div class="col align-self-end">
                    <p class="text-muted mb-0">Язык: {{$olimpiada->languages['language']}}</p>
                  </div>
                  <div class="col align-self-end text-center">
                    @if (intval($olimpiada['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107"></i>@endif
                  </div>
                  <div class="col align-self-end text-center">
                    @if (intval($olimpiada['partnerka']) != 0)<span class="text-muted"><del>{{intval($olimpiada['partnerka']) / 100}}</del> сом</span>@endif
                  </div>
                </div>
              </div>
              <div class="card-footer pr-3 pl-3 block23" style="padding-top: 0px;">
                <a style="display:block" href=""></a>
                
                <div class="row">
                  <div class="col-4 border-right border-top">
                    <div class="description-block mb-0">
                      <span class="description-text">Вопросов:</span>
                      <h5 class="description-header">{{}}</h5>
                      
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-4 border-right border-top">
                    <div class="description-block mb-0">
                      <span class="description-text">ПОКУПОК:</span>
                      <h5 class="description-header"></h5>
                      
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-4 border-top">
                    <div class="description-block mb-0">
                      <span class="description-text">ДОСТУП:</span>
                      <h5 class="description-header">бесплатно</h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          @endforeach
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