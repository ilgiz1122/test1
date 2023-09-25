@extends('layouts.app')

@section('content')
<style type="text/css">

    @media (max-width: 768px) {
        .for_moderator_img1 {
            width: 50%;
        }
    }

    @media (min-width: 768px) {
        .for_moderator_img2 {
            width: 100%;
        }
    }

    @media (min-width: 768px) {
        .for_moderator_img22 {
            padding-right: 25px;
        }
    }

    .two{
        will-change: transform;
        transition: transform 400ms;
      }
      .two:hover {
        transition: transform 300ms;
          transform: translateY(-5px);
      }
    
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
        
    <!-- Main content -->
    <section class="content">
            <div class="pb-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible pt-3 mb-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <p class="mb-0"><i class="icon fas fa-check"></i> {{ session('success') }}</p>
                </div>
            @endif
            @if (session('success2'))
                <div class="alert alert-info alert-dismissible pt-3 mb-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <p class="mb-0"><i class="icon fas fa-check"></i> {{ session('success2') }}</p>
                </div>
            @endif
            </div>
            <section class="content-header pl-0 pr-0">
              <div class="container-fluid p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home')}}"><i class="nav-icon fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('moderatorlor_for_user')}}">Модераторлор</a>
                        </li>
                        <li class="breadcrumb-item active">
                            @if($moderator->f_fio != null)
                                <span title="{{$moderator->name}}">{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}</span>
                            @else
                                <span title="{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}">{{$moderator->name}}</span>
                            @endif
                        </li>
                    </ol>
              </div><!-- /.container-fluid -->
            </section>
            <div class="">
                    <div class="card mb-5">
                        <div class="card-body p-2 ">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center for_moderator_img22">
                                    @if($moderator->img_600_600 == null)
                                    <img src="https://nonsi.kg/public/admin/dist/img/user-icon.svg" class="img-circle for_moderator_img1 for_moderator_img2 shadow-sm"  alt="User Image">
                                    @else
                                    <img src="{{ asset('public/storage/users/img_600_600/') }}/{{$moderator->img_600_600}}" class="img-circle for_moderator_img1 for_moderator_img2 shadow-sm"  alt="User Image">
                                    @endif 
                                </div>
                                <div class="col-md-10 pt-3 pb-3">
                                    <div class="pb-1">
                                    <span>
                                        <b>
                                            @if($moderator->f_fio != null)
                                                <span title="{{$moderator->name}}">{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}</span>
                                            @else
                                                <span title="{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}">{{$moderator->name}}</span>
                                            @endif
                                        </b>
                                    </span>
                                    </div>
                                    @if($moderator->oblast_id != null)
                                    <div class="pb-1">
                                    <span><i class="fas fa-map-marker-alt pr-2 text-muted"></i> {{$moderator->oblast->title}} обл. / {{$moderator->raion_shaar->title}} @if($moderator->aiyl_title != null) / {{$moderator->aiyl_title}} айылы @endif</span></div>
                                    @endif
                                    @if($moderator->mektep_title != null)
                                    <div class="pb-1">
                                    <span><i class="fas fa-landmark pr-2 text-muted"></i> {{$moderator->mektep_title}}</span></div>
                                    @endif
                                    @if($moderator->phone != null)
                                    <span>Телефон: 
                                        <a href="tel:+996{{preg_replace('~[^0-9]+~','', substr($moderator->phone, 1))}}">{{$moderator->phone}}</a>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count($podcategories) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>Курстар</b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">  
                    @if(count($podcategories) == 5)                                
                        @foreach ($podcategories->take(3) as $podcategory)
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('kurs', $podcategory['id'])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                    <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/kursy/images/thumbnail/{{$podcategory['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr1">
                                      <div class="col">
                                        <p class="widget-user-desc mb-0">{{$podcategory['title']}}</p>
                                        <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$podcategory->user['name']}}</small></p>
                                      </div>
                                      <div class="w-100"></div>
                                      <div class="col align-self-end">
                                        <p class="text-muted mb-0"><small>Тили: @if(intval($podcategory->language) != 4 ){{$podcategory->languages['language']}}@else - @endif</small></p>
                                      </div>
                                      <div class="col align-self-end text-center">
                                        @if (intval($podcategory['oldprice']) != 0)<small class="text-muted"><del>{{$podcategory['oldprice'] / 100}} сом</del></small>@endif
                                      </div>
                                      <div class="col align-self-end text-center">
                                        @if (intval($podcategory['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107"></i>@endif
                                      </div>
                                    </div>
                                </div><!-- /.card-body -->
                                <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                                  <div class="row">
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0 mt-0">
                                        <span class="description-text"><small>Сабак:</small></span>
                                        <h5 class="description-header"><small>{{$podcategory->uroky_count}}</small></h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0 mt-0">
                                        <span class="description-text"><small>Сатылды:</small></span>
                                        <h5 class="description-header"><small>{{$podcategory->kupit_count}}</small></h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-top">
                                      <div class="description-block mb-0 mt-0">
                                        @if (intval($podcategory['price']) === 0)
                                        <span class="description-text"><small>ДОСТУП:</small></span>
                                        <h5 class="description-header"><small>бекер</small></h5>
                                        @else
                                        <span class="description-text"><small>Баасы:</small></span>
                                        <h5 class="description-header"><small>{{$podcategory['price'] / 100}} сом</small></h5>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                        @endforeach
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{ route('moderator_user_id_kurs', $moderator->id)}}"></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif
                    @if(count($podcategories) < 5)
                        @foreach ($podcategories as $podcategory)
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('kurs', $podcategory['id'])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                    <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/kursy/images/thumbnail/{{$podcategory['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr1">
                                      <div class="col">
                                        <p class="widget-user-desc mb-0">{{$podcategory['title']}}</p>
                                        <p class="text-muted mb-1"><span class="btn-tool p-0"><i class="fas fa-user-circle"></i></span> <small>{{$podcategory->user['name']}}</small></p>
                                      </div>
                                      <div class="w-100"></div>
                                      <div class="col align-self-end">
                                        <p class="text-muted mb-0"><small>Тили: @if(intval($podcategory->language) != 4 ){{$podcategory->languages['language']}}@else - @endif</small></p>
                                      </div>
                                      <div class="col align-self-end text-center">
                                        @if (intval($podcategory['oldprice']) != 0)<small class="text-muted"><del>{{$podcategory['oldprice'] / 100}} сом</del></small>@endif
                                      </div>
                                      <div class="col align-self-end text-center">
                                        @if (intval($podcategory['partnerka']) === 1)<i class="fas fa-tag" style="color: #ffc107"></i>@endif
                                      </div>
                                    </div>
                                </div><!-- /.card-body -->
                                <div class="card-footer pr-2 pl-2" style="padding-top: 0px;">                              
                                  <div class="row">
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0 mt-0">
                                        <span class="description-text"><small>Сабак:</small></span>
                                        <h5 class="description-header"><small>{{$podcategory->uroky_count}}</small></h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-right border-top">
                                      <div class="description-block mb-0 mt-0">
                                        <span class="description-text"><small>Сатылды:</small></span>
                                        <h5 class="description-header"><small>{{$podcategory->kupit_count}}</small></h5>
                                      </div>
                                    </div>
                                    <div class="col-4 border-top">
                                      <div class="description-block mb-0 mt-0">
                                        @if (intval($podcategory['price']) === 0)
                                        <span class="description-text"><small>ДОСТУП:</small></span>
                                        <h5 class="description-header"><small>бекер</small></h5>
                                        @else
                                        <span class="description-text"><small>Баасы:</small></span>
                                        <h5 class="description-header"><small>{{$podcategory['price'] / 100}} сом</small></h5>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                        @endforeach
                    @endif 
                    </div>
                    @endif




                   @if(count($prezentasias) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>Презентациялар</b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                    @if(count($prezentasias) == 5)  
                        @foreach ($prezentasias->take(3) as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr2">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($prezentasias) < 5)
                        @foreach ($prezentasias as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr2">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                    @endif 
                    </div>
                    @endif

                  @if(count($plan_konspects) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>План конспект</b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($plan_konspects) == 5)  
                        @foreach ($plan_konspects->take(3) as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr3">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($plan_konspects) < 5)
                        @foreach ($plan_konspects as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr3">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                    @endif 
                    </div>
                    @endif


                   @if(count($test_tek_ishs) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>Тест, <small>текшерүү иш, ...</small></h5></p>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($test_tek_ishs) == 5)  
                        @foreach ($test_tek_ishs->take(3) as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr4">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($test_tek_ishs) < 5)
                        @foreach ($test_tek_ishs as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr4">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                    @endif 
                    </div>
                    @endif



                   @if(count($shablon_prezentasias) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>Шаблон <small>(презентация)</small></b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($shablon_prezentasias) == 5)  
                        @foreach ($shablon_prezentasias->take(3) as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr5">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($shablon_prezentasias) < 5)
                        @foreach ($shablon_prezentasias as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr5">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                    @endif 
                    </div>
                    @endif



                    @if(count($gramota_sertificats) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>Грамота, <small>сертификат, ...</small></b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($gramota_sertificats) == 5)  
                        @foreach ($gramota_sertificats->take(3) as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr6">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($gramota_sertificats) < 5)
                        @foreach ($gramota_sertificats as $materialy)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <i class="fas fa-chevron-left" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a style="width: 25px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right pl-1" style="font-size: 25px; color: red;"></i>
                                              </span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                        <div class="row rrttrr6">
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
                                                <small><a class="pt-1" style="display:block" href="{{ route('skachatmaterialov', ['for_action' => $materialy->dop_category, 'podcat_id' => $materialy->materialpodcategory_id, 'id' => $materialy->id])}}">скачать</a></small>
                                            </h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        @endforeach
                    @endif 
                    </div>
                    @endif





                    @if(count($online_tests) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>Онлайн тест</b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($online_tests) == 5)  
                        @foreach ($online_tests->take(3) as $test)
                          <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('opentest', ['for_action' => $test->dop_category, 'id' => $test->id])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                  <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/testy/images/thumbnail/{{$test['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr7">
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
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($online_tests) < 5)
                        @foreach ($online_tests as $test)
                          <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('opentest', ['for_action' => $test->dop_category, 'id' => $test->id])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                  <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/testy/images/thumbnail/{{$test['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr7">
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
                    @endif 
                    </div>
                    @endif




                    @if(count($ort_tests) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>ЖРТ / ОРТ <small>(онлайн тест)</small></b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($ort_tests) == 5)  
                        @foreach ($ort_tests->take(3) as $test)
                          <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('opentest', ['for_action' => $test->dop_category, 'id' => $test->id])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                  <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/testy/images/thumbnail/{{$test['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr8">
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
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($ort_tests) < 5)
                        @foreach ($ort_tests as $test)
                          <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('opentest', ['for_action' => $test->dop_category, 'id' => $test->id])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                  <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/testy/images/thumbnail/{{$test['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr8">
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
                    @endif 
                    </div>
                    @endif




                    @if(count($nct_tests) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>НЦТ <small>(онлайн тест)</small></b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($nct_tests) == 5)  
                        @foreach ($nct_tests->take(3) as $test)
                          <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('opentest', ['for_action' => $test->dop_category, 'id' => $test->id])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                  <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/testy/images/thumbnail/{{$test['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr9">
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
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($nct_tests) < 5)
                        @foreach ($nct_tests as $test)
                          <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href="{{route('opentest', ['for_action' => $test->dop_category, 'id' => $test->id])}}"></a>
                                <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                  <img class="" style="width: 100%; border-top-right-radius: 4px; border-top-left-radius: 4px;" src="https://nonsi.kg/public/storage/testy/images/thumbnail/{{$test['img']}}">
                                </div>
                                <div class="card-body pr-2 pl-2 pb-0" style="padding-top: 10px;">
                                    <div class="row rrttrr9">
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
                    @endif 
                    </div>
                    @endif




                    @if(count($vitrinas) > 0)
                    <div class="row mt-5 align-items-center">
                        <div class="col"><hr class="mt-1 mb-3"></div>
                        <div class="col-auto">
                          <h5 class="mt-1 mb-3 text-muted"><b>Витрина</b></h5>
                        </div>
                        <div class="col"><hr class="mt-1 mb-3"></div>
                    </div>
                    <div class="row">
                        @if(count($vitrinas) == 5)  
                        @foreach ($vitrinas->take(3) as $vitrina)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <img class="d-block w-100" src="{{ asset('public/storage/vitrina/img2/') }}/{{$img->img2}}" alt="{{$vitrina['title']}}">
                                                </div>
                                                @endforeach
                                              
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0 block23" style="padding-top: 10px;">
                                        <a style="display:block" href="{{ route('vitrina_one', ['for_action' => '0', 'vitrina_id' => $vitrina->id])}}"></a>
                                        <div class="row rrttrr10">
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
                        <div class="col-md-3 d-flex px-lg-2 py-lg-2">
                            <div class="card shadow-sm flex-fill two block23">
                              <a style="display:block" href=""></a>
                                <div class="card-body p-4">
                                    <div class="row  align-items-center">
                                      <button type="button" class="btn btn-block btn-flat pt-5 pb-5 mt-5 mb-5 text-muted">Баарын көрүү <i class="far fa-arrow-right pt-2 pl-2"></i></button>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    @endif 
                    @if(count($vitrinas) < 5)
                        @foreach ($vitrinas as $vitrina)
                            <div class="col-md-3 d-flex px-lg-2 py-lg-2">
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
                                                <img class="d-block w-100" src="{{ asset('public/storage/vitrina/img2/') }}/{{$img->img2}}" alt="{{$vitrina['title']}}">
                                                </div>
                                                @endforeach
                                              
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body pr-2 pl-2 pb-0 block23" style="padding-top: 10px;">
                                        <a style="display:block" href="{{ route('vitrina_one', ['for_action' => '0', 'vitrina_id' => $vitrina->id])}}"></a>
                                        <div class="row rrttrr10">
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
                    @endif 
                    </div>
                    @endif





            </div>
    </section><!-- /.content -->



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

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
        equalHeight($(".rrttrr1"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr2"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr3"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr4"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr5"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr6"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr7"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr8"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr9"));
    });
    $(document).ready(function(){
        equalHeight($(".rrttrr10"));
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