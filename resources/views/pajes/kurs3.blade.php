@extends('layouts.app')

@section('content')
<style>
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
                        <li class="breadcrumb-item">Менин курстарым</li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>
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
                
                @if(count($kupits) != 0)
                @foreach ($kupits as $kupit)

                    @if($kupit->srok_dostupa != 0)
                        @if((time() - $kupit->time) < $kupit->srok_dostupa)
                                    <?php
                                $srok1 = $kupit->srok_dostupa - (time() - $kupit->time);
                                $god1 = floor($srok1 / 31536000);
                                $mounth1 = floor(($srok1 - $god1 * 31536000) / 2592000);
                                $day1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                                $hour1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                                $minute1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                            ?>
                            <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                                <div class="card card-widget widget-user shadow-sm flex-fill @if((time() - $kupit->time) < $kupit->srok_dostupa) two block23 @endif @if($kupit->srok_dostupa == 0) two block23 @endif">
                                    @if((time() - $kupit->time) < $kupit->srok_dostupa)
                                      <a style="display:block" href="{{route('kurs', $kupit['kurs_id'])}}"></a>
                                    @endif
                                    @if($kupit->srok_dostupa == 0)
                                      <a style="display:block" href="{{route('kurs', $kupit['kurs_id'])}}"></a>
                                    @endif
                                    <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                        <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/storage/kursy/images/thumbnail/{{$kupit->podcategories['img']}}">
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr">
                                          <div class="col">
                                            <p class="widget-user-desc mb-0">{{$kupit->podcategories['title']}}</p>
                                            <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$kupit->podcategories->user['name']}}</small></p>
                                          </div>
                                          <div class="w-100"></div>
                                          <div class="col-4 align-self-end border-right">
                                            <small class="text-muted mb-0">Тили: @if(intval($kupit->podcategories->language) != 4 ){{$kupit->podcategories->languages['language']}}@else - @endif</small>
                                          </div>
                                          <div class="col-4 align-self-end border-right">
                                            <small class="text-muted mb-0">{{$kupit['created_at']->format('d.m.Y')}}</small>
                                          </div>
                                          <div class="col-4 align-self-end text-center">
                                            <small class="text-muted mb-0" @if($kupit->srok_dostupa != 0) data-bs-toggle="tooltip" data-bs-placement="left" title="@if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0) @if($god1 > 0){{$god1}}жыл @endif @if($mounth1 > 0){{$mounth1}}ай @endif @if($day1 > 0){{$day1}} күн@endif @if($hour1 > 0){{$hour1}} саат@endif @if($minute1 > 0){{$minute1}} мин.@endif @endif" @endif><span class="text-muted pr-1"><i class="fas fa-unlock"></i></span>
                                                @if($kupit->srok_dostupa == 0) 
                                                    түбөлүк 
                                                @else
                                                    @if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0)
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
                                                    @else
                                                     <i class="fas fa-lock"></i>
                                                    @endif
                                                @endif
                                            </small>
                                          </div>
                                        </div>
                                    </div><!-- /.card-body -->
                                    <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                                      <div class="row">
                                        <div class="col-4 border-right border-top">
                                          <div class="description-block mb-0 mt-0">
                                            <span class="description-text"><small>Сабак:</small></span>
                                            <h5 class="description-header"><small>{{$kupit->uroky_count}}</small></h5>
                                          </div>
                                        </div>
                                        <div class="col-4 border-right border-top">
                                          <div class="description-block mb-0 mt-0">
                                            <span class="description-text"><small>Сатылды:</small></span>
                                            <h5 class="description-header"><small>{{DB::table('kupits')->where('kurs_id', $kupit->kurs_id)->count()}}</small></h5>
                                          </div>
                                        </div>
                                        <div class="col-4 border-top">
                                          <div class="description-block mb-0 mt-0">
                                            <span class="description-text"><small>Баасы:</small></span>
                                            <h5 class="description-header"><small>{{$kupit['price'] / 100}} сом</small></h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endif
                    @else
                            <?php
                                $srok1 = $kupit->srok_dostupa - (time() - $kupit->time);
                                $god1 = floor($srok1 / 31536000);
                                $mounth1 = floor(($srok1 - $god1 * 31536000) / 2592000);
                                $day1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                                $hour1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                                $minute1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                            ?>
                        <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                            <div class="card card-widget widget-user shadow-sm flex-fill @if((time() - $kupit->time) < $kupit->srok_dostupa) two block23 @endif @if($kupit->srok_dostupa == 0) two block23 @endif">
                                @if((time() - $kupit->time) < $kupit->srok_dostupa)
                                  <a style="display:block" href="{{route('kurs', $kupit['kurs_id'])}}"></a>
                                @endif
                                @if($kupit->srok_dostupa == 0)
                                  <a style="display:block" href="{{route('kurs', $kupit['kurs_id'])}}"></a>
                                @endif
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                    <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/storage/kursy/images/thumbnail/{{$kupit->podcategories['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr">
                                      <div class="col">
                                        <p class="widget-user-desc mb-0">{{$kupit->podcategories['title']}}</p>
                                        <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$kupit->podcategories->user['name']}}</small></p>
                                      </div>
                                      <div class="w-100"></div>
                                      <div class="col-4 align-self-end border-right">
                                        <small class="text-muted mb-0">Тили: @if(intval($kupit->podcategories->language) != 4 ){{$kupit->podcategories->languages['language']}}@else - @endif</small>
                                      </div>
                                      <div class="col-4 align-self-end border-right">
                                        <small class="text-muted mb-0">{{$kupit['created_at']->format('d.m.Y')}}</small>
                                      </div>
                                      <div class="col-4 align-self-end text-center">
                                        <small class="text-muted mb-0" @if($kupit->srok_dostupa != 0) data-bs-toggle="tooltip" data-bs-placement="left" title="@if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0) @if($god1 > 0){{$god1}}жыл @endif @if($mounth1 > 0){{$mounth1}}ай @endif @if($day1 > 0){{$day1}} күн@endif @if($hour1 > 0){{$hour1}} саат@endif @if($minute1 > 0){{$minute1}} мин.@endif @endif" @endif><span class="text-muted pr-1"><i class="fas fa-unlock"></i></span>
                                            @if($kupit->srok_dostupa == 0) 
                                                түбөлүк 
                                            @else
                                                @if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0)
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
                                                @else
                                                 <i class="fas fa-lock"></i>
                                                @endif
                                            @endif
                                        </small>
                                      </div>
                                    </div>
                                </div><!-- /.card-body -->
                                <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                                  <div class="row">
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0 mt-0">
                                        <span class="description-text"><small>Сабак:</small></span>
                                        <h5 class="description-header"><small>{{$kupit->uroky_count}}</small></h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0 mt-0">
                                        <span class="description-text"><small>Сатылды:</small></span>
                                        <h5 class="description-header"><small>{{DB::table('kupits')->where('kurs_id', $kupit->kurs_id)->count()}}</small></h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-top">
                                      <div class="description-block mb-0 mt-0">
                                        <span class="description-text"><small>Баасы:</small></span>
                                        <h5 class="description-header"><small>{{$kupit['price'] / 100}} сом</small></h5>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif
                @endforeach
                @else
                <div class="error-page mt-5 pt-5">
                    <div class="error-content">
                      <h3>Сиз азырынча бир дагы курс сатып ала элексиз.</h3>
                      <p>
                        Бирок курстарды каалаган убакта сатып алсаңыз болот жана ошол сатып алган курстарды бул жерден көрө аласыз.
                      </p>
                    </div>
                </div>
                @endif
            </div>

                         

        
            <h6 class="pt-3 mb-2 pl-2">Убактысы өтүп кеткен курстар</h6>
            <div class="row">
                @foreach ($kupits2 as $kupit)
                  <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                        <div class="card card-widget widget-user shadow-sm flex-fill">
                            <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/storage/kursy/images/thumbnail/{{$kupit->podcategories['img']}}">
                            </div>
                            <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                <div class="row rrttrr">
                                  <div class="col">
                                    <p class="widget-user-desc mb-0">{{$kupit->podcategories['title']}}</p>
                                    <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$kupit->podcategories->user['name']}}</small></p>
                                  </div>
                                  <div class="w-100"></div>
                                  <div class="col-4 align-self-end border-right">
                                    <small class="text-muted mb-0">Тили: @if(intval($kupit->podcategories->language) != 4 ){{$kupit->podcategories->languages['language']}}@else - @endif</small>
                                  </div>
                                  <div class="col-4 align-self-end border-right">
                                    <small class="text-muted mb-0">{{$kupit['created_at']->format('d.m.Y')}}</small>
                                  </div>
                                  <div class="col-4 align-self-end text-center">
                                    <small class="text-muted mb-0"><i class="fas fa-lock"></i></small>
                                  </div>
                                </div>
                            </div><!-- /.card-body -->
                            <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                              <div class="row">
                                <div class="col-4 border-right border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Сабак:</small></span>
                                    <h5 class="description-header"><small>{{$kupit->uroky_count}}</small></h5>
                                  </div>
                                </div>
                                <div class="col-4 border-right border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Сатылды:</small></span>
                                    <h5 class="description-header"><small>{{DB::table('kupits')->where('kurs_id', $kupit->kurs_id)->count()}}</small></h5>
                                  </div>
                                </div>
                                <div class="col-4 border-top">
                                  <div class="description-block mb-0 mt-0">
                                    <span class="description-text"><small>Баасы:</small></span>
                                    <h5 class="description-header"><small>{{$kupit['price'] / 100}} сом</small></h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div><!-- /.card -->
                    </div><!-- /.col -->
                  
                @endforeach
                @foreach ($kupits as $kupit)

                    @if($kupit->srok_dostupa != 0)
                        @if((time() - $kupit->time) < $kupit->srok_dostupa)
                            
                        @else
                            <?php
                                $srok1 = $kupit->srok_dostupa - (time() - $kupit->time);
                                $god1 = floor($srok1 / 31536000);
                                $mounth1 = floor(($srok1 - $god1 * 31536000) / 2592000);
                                $day1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                                $hour1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                                $minute1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                            ?>
                            <div class="col-md-3 d-flex px-lg-3 py-lg-2">
                                <div class="card card-widget widget-user shadow-sm flex-fill">
                                    <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                        <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="{{asset('')}}/storage/kursy/images/thumbnail/{{$kupit->podcategories['img']}}">
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr">
                                          <div class="col">
                                            <p class="widget-user-desc mb-0">{{$kupit->podcategories['title']}}</p>
                                            <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$kupit->podcategories->user['name']}}</small></p>
                                          </div>
                                          <div class="w-100"></div>
                                          <div class="col-4 align-self-end border-right">
                                            <small class="text-muted mb-0">Тили: @if(intval($kupit->podcategories->language) != 4 ){{$kupit->podcategories->languages['language']}}@else - @endif</small>
                                          </div>
                                          <div class="col-4 align-self-end border-right">
                                            <small class="text-muted mb-0">{{$kupit['created_at']->format('d.m.Y')}}</small>
                                          </div>
                                          <div class="col-4 align-self-end text-center">
                                            <small class="text-muted mb-0"><i class="fas fa-lock"></i>
                                            </small>
                                          </div>
                                        </div>
                                    </div><!-- /.card-body -->
                                    <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                                      <div class="row">
                                        <div class="col-4 border-right border-top">
                                          <div class="description-block mb-0 mt-0">
                                            <span class="description-text"><small>Сабак:</small></span>
                                            <h5 class="description-header"><small>{{$kupit->uroky_count}}</small></h5>
                                          </div>
                                        </div>
                                        <div class="col-4 border-right border-top">
                                          <div class="description-block mb-0 mt-0">
                                            <span class="description-text"><small>Сатылды:</small></span>
                                            <h5 class="description-header"><small>{{DB::table('kupits')->where('kurs_id', $kupit->kurs_id)->count()}}</small></h5>
                                          </div>
                                        </div>
                                        <div class="col-4 border-top">
                                          <div class="description-block mb-0 mt-0">
                                            <span class="description-text"><small>Баасы:</small></span>
                                            <h5 class="description-header"><small>{{$kupit['price'] / 100}} сом</small></h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endif
                    @endif
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </section>

<script type="text/javascript">
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});



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