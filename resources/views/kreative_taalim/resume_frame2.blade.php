@extends('layouts.kreative_layouts')

@section('content')
<style type="text/css">

  .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-4px);
  }

   
</style>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
              
            </div>
            <div class="col-md-8 shadow mt-4 mb-4 p-3" style="border-radius: 5px; background: white;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-body">
                                    @if($resume->img != null)
                                        <img src="{{ asset('storage/kreative/images/mugalim/') }}/{{$resume->img}}" width="100%" class="shadow-lg border" style="border-radius: 4px;">
                                    @else
                                        <img src="https://planetapechey.ru/assets/land_04032021/images/reviews/person-default.png" width="100%" class="shadow-lg border" style="border-radius: 4px;">
                                    @endif
                                    <a href="#page1" class="btn btn-block btn-primary mt-3">Резюме</a>
                                    @if(count($resume_dop_info->where('type_info', 3))  > 0)
                                        <a href="#page2" class="btn btn-block btn-primary mt-2">Сыйлыктары</a>
                                    @else
                                        @if(count($resume_dop_info->where('type_info', 31))  > 0)
                                            <a href="#page2" class="btn btn-block btn-primary mt-2">Сыйлыктары</a>
                                        @else
                                            @if(count($resume_dop_info->where('type_info', 32))  > 0)
                                                <a href="#page2" class="btn btn-block btn-primary mt-2">Сыйлыктары</a>
                                            @endif
                                        @endif
                                    @endif
                                    @if(count($resume_dop_info->where('type_info', 4)) > 0)<a href="#page3" class="btn btn-block btn-primary mt-2">Эмгектери</a>@endif
                                    @if($resume->whatsapp != null)<a href="#page4" class="btn btn-block btn-primary mt-2">Байланыш</a>@endif
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-9">
                        @if(count($resume_dop_info->where('type_info', 6)) > 0)
                            
                             <?php
                             $resume_dop_info666 = $resume_dop_info->where('type_info', 6)->first();
                              preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $resume_dop_info666->info, $match);
                              $youtube_id = $match[1];
                              ?>
                              <div class="embed-responsive embed-responsive-16by9">
                                  <iframe style="border-radius: 3px;"
                                    class="embed-responsive-item"
                                      width="100%"
                                      height="100%"
                                      src="https://www.youtube.com/embed/{{$youtube_id}}"
                                      frameborder="0"
                                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                      allowfullscreen>
                                  </iframe>
                              </div>
                          
                        @endif


                        <h3 class="pt-3 mb-2 text-center" style="color: #007bff;" id="page1"><b>Резюме</b></h3>
                          <div class="row pt-4">
                              <div class="col-auto ssd12 pr-2"><b>Фамилиясы:</b></div>
                              <div class="col">{{$resume->familya}}</div>
                          </div>
                          <div class="row pt-2">
                              <div class="col-auto ssd12 pr-2"><b>Аты:</b></div>
                              <div class="col">{{$resume->aty}}</div>
                          </div>
                          <div class="row pt-2">
                              <div class="col-auto ssd12 pr-2"><b>Атасынын аты:</b></div>
                              <div class="col">{{$resume->at_aty}}</div>
                          </div>
                          <div class="row pt-2">
                              <div class="col-auto ssd12 pr-2"><b>Туулган датасы:</b></div>
                              <div class="col">{{$resume->tuulgan_kunu}}</div>
                          </div>
                          <div class="row pt-2">
                              <div class="col-auto ssd12 pr-2"><b>Үй-бүлөлүк абалы:</b></div>
                              <div class="col">@if($resume->ui_buloluk_abaly == 1) бойдок @endif @if($resume->ui_buloluk_abaly == 2) үй бүлөлүү @endif</div>
                          </div>
                          <div class="row pt-2">
                              <div class="col-auto ssd11 pr-2"><b>Электрондук дареги:</b></div>
                              <div class="col">{{$resume->email}}</div>
                          </div>
                          <div class="row pt-2">
                              <div class="col-auto ssd12 pr-2"><b>Жалпы стажы:</b></div>
                              <div class="col">{{$resume->staj}} жыл</div>
                          </div>
                          <div class="row pt-2 mb-4">
                              <div class="col  pr-2"><b>Азыркы ээлеген кызматы:</b> {{$resume->azyrky_kyzmaty}}</div>
                          </div>
                
                
                          <hr class="mt-4 mb-4">
                            <b>Билими:</b>
                            <ul class="list-unstyled mb-0">
                                        <ul style="padding-left: 25px;">
                                          @foreach ($resume_dop_info->where('type_info', 1) as $resume_dop_info1)
                                          <li>{!! $resume_dop_info1->info !!}</li>
                                          @endforeach
                                        </ul>
                                      </li>
                                    </ul>
                
                
                          
                            @if(count($resume_dop_info->where('type_info', 2)) > 0)
                            <hr class="mt-4 mb-4">
                            <b>Иш тажрыйбасы:</b>
                            <ul class="list-unstyled mt-3">
                                <ul style="padding-left: 30px;">
                                  @foreach ($resume_dop_info->where('type_info', 2) as $resume_dop_info1)
                                  <li>{!! $resume_dop_info1->info !!}</li>
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                            @endif
                
                            @if(count($resume_dop_info->where('type_info', 22)) > 0)
                            <b>Өзгөчө тажрыйбалары:</b>
                            <ul class="list-unstyled mt-3">
                                <ul style="padding-left: 30px;">
                                  @foreach ($resume_dop_info->where('type_info', 22) as $resume_dop_info1)
                                  <li>{!! $resume_dop_info1->info !!}</li>
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                            @endif
                
                
                            @if(count($resume_dop_info->where('type_info', 3))  > 0)
                                <hr class="mt-4 mb-4">
                                <h4 class="pt-2 mb-2 text-center" style="color: #007bff;" id="page2">Сыйлыктары</h4>
                            @else
                                @if(count($resume_dop_info->where('type_info', 31))  > 0)
                                    <hr class="mt-4 mb-4">
                                    <h4 class="pt-2 mb-2 text-center" style="color: #007bff;" id="page2">Сыйлыктары</h4>
                                @else
                                    @if(count($resume_dop_info->where('type_info', 32))  > 0)
                                        <hr class="mt-4 mb-4">
                                        <h4 class="pt-2 mb-2 text-center" style="color: #007bff;" id="page2">Сыйлыктары</h4>
                                    @endif
                                @endif
                            @endif
                            @if(count($resume_dop_info->where('type_info', 3)) > 0)
                            <b>Грамота, диплом, ...</b>
                            <ul class="list-unstyled mt-3">
                                <ul style="padding-left: 30px;">
                                  @foreach ($resume_dop_info->where('type_info', 3) as $resume_dop_info1)
                                  <li>{!! $resume_dop_info1->info !!}</li>
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                            @endif
                
                            @if(count($resume_dop_info->where('type_info', 31)) > 0)
                            <b>Сертификаттары:</b>
                            <ul class="list-unstyled mt-3">
                                <ul style="padding-left: 30px;">
                                  @foreach ($resume_dop_info->where('type_info', 31) as $resume_dop_info1)
                                  <li>{!! $resume_dop_info1->info !!}</li>
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                            @endif
                
                            @if(count($resume_dop_info->where('type_info', 32)) > 0)
                            <b>Наамдар же сыйлыктын башка түрлөрү:</b>
                            <ul class="list-unstyled mt-3">
                                <ul style="padding-left: 30px;">
                                  @foreach ($resume_dop_info->where('type_info', 32) as $resume_dop_info1)
                                  <li>{!! $resume_dop_info1->info !!}</li>
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                            @endif
                
                        
                
                        @if(count($resume_dop_info->where('type_info', 4)) > 0)
                        <hr class="mt-4 mb-4">
                            <h4 class="pt-2 mb-2 text-center" style="color: #007bff;" id="page3">Эмгектери</h4>
                            <ul class="list-unstyled mt-3">
                                <ul style="padding-left: 30px;">
                                  @foreach ($resume_dop_info->where('type_info', 4) as $resume_dop_info1)
                                  <li>{!! $resume_dop_info1->info !!}</li>
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                        @endif
                
                        

                        @if(count($resume_dop_info->where('type_info', 5)) > 0)
                            <hr class="mt-4 mb-4">
                            @if(count($resume_dop_info->where('type_info', 5)) > 1)
                                <h4 class="pt-2 mb-2 text-center" style="color: #007bff;" id="page3">Шилтемелери</h4>
                            @endif
                                        @foreach ($resume_dop_info->where('type_info', 5) as $resume_dop_info1)
                                        <div class="row pt-2">
                                            <div class="col-auto"><b><a class="" style="color: black;" href="{{$resume_dop_info1->info}}">{{$resume_dop_info1->title}}:</a></b></div>
                                            <div class="col text-truncate"><a class="" href="{{$resume_dop_info1->info}}" title="{{$resume_dop_info1->info}}">{{$resume_dop_info1->info}}</a></div>
                                        </div>
                                        @endforeach
                           @endif 



                        @if($resume->whatsapp != null)  
                            <hr class="mt-4 mb-4">
                            @php
                                $nomer2 = preg_replace('~[^0-9]+~','', $resume->whatsapp);
                            @endphp
                            <div class="row mb-3" id="page5">
                                <div class="col-md-3">
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-body p-0 two">
                                      <div class="row align-items-center block23">
                                          <a href="https://wa.me/+996{{$nomer2}}"></a>
                                          <div class="col-auto">
                                              <span style="font-size: 4em; color: #28a745;">
                                                <i class="fab fa-whatsapp pl-3"></i>
                                              </span>
                                          </div>
                                          <div class="col">
                                              <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp аркылуу байланышуу</b></p>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    
                                </div>
                            </div>
                
                        @else
                            <div class="mb-5"></div>
                        @endif  

                
                        
                    </div>
                </div>
              
            </div>
            <div class="col-md-2">
              
            </div>
          </div>
          
        
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
            
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$('.ssd12').width($('.ssd11').width());
 
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
</script>
@endsection