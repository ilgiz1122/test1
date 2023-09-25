@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">
  .bs-stepper-header {
        display: flex;
        overflow: auto;
    }
    @media (min-width: 768px) {
        .bs-stepper-header::-webkit-scrollbar { width: 0; display: none; }
    }
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
        
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pb-3">
          @if (session('success'))
                <div class="alert alert-success alert-dismissible pt-3 mb-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                </div>
            @endif
            <h5 class="pt-3 mb-3">Статистика</h5>

            
                    <div class="card">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-4 text-center">
                            <div class="info-box-content pr-0 inner">
                              <p class="text-muted mb-0">
                                <span class="info-box-text">
                                    <font style="vertical-align: inherit;" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Сатуулардан түшкөн киреше">
                                      <b>Киреше</b>
                                    </font>
                                </span>
                              </p>
                              <h5 class="mt-2"><font style="vertical-align: inherit;"><b>{{$kupitmaterialov->sum('pribyl')/100 + $sum_pribyl_kursov / 100 + $tests_kupits->sum('pribyl')/100 + $part / 100}} <small>сом</small></b></font></h5>
                            </div>
                          </div>
                          <div class="col-4 text-center border-left border-right">
                            <div class="info-box-content pr-0 inner">
                              <p class="text-muted mb-0">
                                <span class="info-box-text">
                                    <font style="vertical-align: inherit;" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Сатуулардын жалпы саны">
                                      <b>Сатуулар</b>
                                    </font>
                                </span>
                              </p>
                              <h5 class="mt-2"><font style="vertical-align: inherit;"><b>{{ $kupitmaterialov->count() + $tests_kupits->count() + $kolichestvo_prodaj_kursov }}</b></font></h5>
                            </div>
                          </div>
                          <div class="col-4 text-center">
                            <div class="info-box-content pr-0 inner">
                              <p class="text-muted mb-0">
                                <span class="info-box-text">
                                    <font style="vertical-align: inherit;" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Сизге которулган акчанын суммасы">
                                      <b>Төлөм</b>
                                    </font>
                                </span>
                              </p>
                              <h5 class="mt-2"><font style="vertical-align: inherit;"><b>{{$user_vyplatys / 100}} <small>сом</small></b></font></h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
          
            <h6 class="pt-4 mb-2">Бөлүмдөр боюнча</h6>
            <div class="row">
              @php
                  $sum_pribyl = $kupitmaterialov->where('dop_category', 0)->sum('pribyl');
                  $kolichestvo_prodaj = $kupitmaterialov->where('dop_category', 0)->count();
                  $kolichestvo_ispolzovanie_kuponov = $kupitmaterialov->where('dop_category', 0)->where('promocod', '!=', null)->count();
                  $sum_promocod_pribyl = $kupitmaterialov->where('dop_category', 0)->where('promocod', '!=', null)->sum('pribyl');
              @endphp 
              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov}}</b> / {{$kolichestvo_prodaj}} <span class='pl-3 float-right'>(@if($kolichestvo_prodaj != 0) {{round((100 * $kolichestvo_ispolzovanie_kuponov) / $kolichestvo_prodaj)}} @else 0 @endif %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl / 100}} сом</b> / {{$sum_pribyl / 100}} сом <span class='pl-3 float-right'>(@if($sum_pribyl != 0) {{round((100 * $sum_promocod_pribyl) / $sum_pribyl)}} @else 0 @endif %)</span></p></div>">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>Презентация</b></font>
                          <span class="badge badge-info float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl/100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($materialies->where('dop_category', 0))}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>


              @php
                  $sum_pribyl = $kupitmaterialov->where('dop_category', 4)->sum('pribyl');
                  $kolichestvo_prodaj = $kupitmaterialov->where('dop_category', 4)->count();
                  $kolichestvo_ispolzovanie_kuponov = $kupitmaterialov->where('dop_category', 4)->where('promocod', '!=', null)->count();
                  $sum_promocod_pribyl = $kupitmaterialov->where('dop_category', 4)->where('promocod', '!=', null)->sum('pribyl');
              @endphp 
              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov}}</b> / {{$kolichestvo_prodaj}} <span class='pl-3 float-right'>(@if($kolichestvo_prodaj != 0) {{round((100 * $kolichestvo_ispolzovanie_kuponov) / $kolichestvo_prodaj)}} @else 0 @endif %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl / 100}} сом</b> / {{$sum_pribyl / 100}} сом <span class='pl-3 float-right'>(@if($sum_pribyl != 0) {{round((100 * $sum_promocod_pribyl) / $sum_pribyl)}} @else 0 @endif %)</span></p></div>">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>План конспект</b></font>
                          <span class="badge badge-info float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl/100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($materialies->where('dop_category', 4))}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>

              @php
                  $sum_pribyl = $kupitmaterialov->where('dop_category', 1)->sum('pribyl');
                  $kolichestvo_prodaj = $kupitmaterialov->where('dop_category', 1)->count();
                  $kolichestvo_ispolzovanie_kuponov = $kupitmaterialov->where('dop_category', 1)->where('promocod', '!=', null)->count();
                  $sum_promocod_pribyl = $kupitmaterialov->where('dop_category', 1)->where('promocod', '!=', null)->sum('pribyl');
              @endphp 
              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov}}</b> / {{$kolichestvo_prodaj}} <span class='pl-3 float-right'>(@if($kolichestvo_prodaj != 0) {{round((100 * $kolichestvo_ispolzovanie_kuponov) / $kolichestvo_prodaj)}} @else 0 @endif %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl / 100}} сом</b> / {{$sum_pribyl / 100}} сом <span class='pl-3 float-right'>(@if($sum_pribyl != 0) {{round((100 * $sum_promocod_pribyl) / $sum_pribyl)}} @else 0 @endif %)</span></p></div>">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>Тест, <small>текшерүү иш, ...</small></b></font>
                          <span class="badge badge-info float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl/100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($materialies->where('dop_category', 1))}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>

              @php
                  $sum_pribyl = $kupitmaterialov->where('dop_category', 2)->sum('pribyl');
                  $kolichestvo_prodaj = $kupitmaterialov->where('dop_category', 2)->count();
                  $kolichestvo_ispolzovanie_kuponov = $kupitmaterialov->where('dop_category', 2)->where('promocod', '!=', null)->count();
                  $sum_promocod_pribyl = $kupitmaterialov->where('dop_category', 2)->where('promocod', '!=', null)->sum('pribyl');
              @endphp 
              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov}}</b> / {{$kolichestvo_prodaj}} <span class='pl-3 float-right'>(@if($kolichestvo_prodaj != 0) {{round((100 * $kolichestvo_ispolzovanie_kuponov) / $kolichestvo_prodaj)}} @else 0 @endif %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl / 100}} сом</b> / {{$sum_pribyl / 100}} сом <span class='pl-3 float-right'>(@if($sum_pribyl != 0) {{round((100 * $sum_promocod_pribyl) / $sum_pribyl)}} @else 0 @endif %)</span></p></div>">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>Шаблон <small>(презентация)</small></b></font>
                          <span class="badge badge-info float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl/100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($materialies->where('dop_category', 2))}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>

              @php
                  $sum_pribyl = $kupitmaterialov->where('dop_category', 3)->sum('pribyl');
                  $kolichestvo_prodaj = $kupitmaterialov->where('dop_category', 3)->count();
                  $kolichestvo_ispolzovanie_kuponov = $kupitmaterialov->where('dop_category', 3)->where('promocod', '!=', null)->count();
                  $sum_promocod_pribyl = $kupitmaterialov->where('dop_category', 3)->where('promocod', '!=', null)->sum('pribyl');
              @endphp 
              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov}}</b> / {{$kolichestvo_prodaj}} <span class='pl-3 float-right'>(@if($kolichestvo_prodaj != 0) {{round((100 * $kolichestvo_ispolzovanie_kuponov) / $kolichestvo_prodaj)}} @else 0 @endif %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl / 100}} сом</b> / {{$sum_pribyl / 100}} сом <span class='pl-3 float-right'>(@if($sum_pribyl != 0) {{round((100 * $sum_promocod_pribyl) / $sum_pribyl)}} @else 0 @endif %)</span></p></div>">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>Грамота, <small>сертификат, ...</small></b></font>
                          <span class="badge badge-info float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl/100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($materialies->where('dop_category', 3))}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>




              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov_kursov}}</b> / {{$kolichestvo_prodaj_kursov}} <span class='pl-3 float-right'>({{round((100 * $kolichestvo_ispolzovanie_kuponov_kursov) / $kolichestvo_prodaj_kursov)}} %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl_kursov / 100}} сом</b> / {{$sum_pribyl_kursov / 100}} сом <span class='pl-3 float-right'>({{round((100 * $sum_promocod_pribyl_kursov) / $sum_pribyl_kursov)}} %)</span></p></div>">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>Курс</b></font>
                          <span class="badge badge-success float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl_kursov / 100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($podcategories)}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj_kursov}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>

              @php
                  $sum_pribyl = $tests_kupits->where('dop_category', 0)->sum('pribyl');
                  $kolichestvo_prodaj = $tests_kupits->where('dop_category', 0)->count();
                  $kolichestvo_ispolzovanie_kuponov = $tests_kupits->where('dop_category', 0)->where('promocod', '!=', null)->count();
                  $sum_promocod_pribyl = $tests_kupits->where('dop_category', 0)->where('promocod', '!=', null)->sum('pribyl');
              @endphp 
              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov}}</b> / {{$kolichestvo_prodaj}} <span class='pl-3 float-right'>(@if($kolichestvo_prodaj != 0) {{round((100 * $kolichestvo_ispolzovanie_kuponov) / $kolichestvo_prodaj)}} @else 0 @endif %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl / 100}} сом</b> / {{$sum_pribyl / 100}} сом <span class='pl-3 float-right'>(@if($sum_pribyl != 0) {{round((100 * $sum_promocod_pribyl) / $sum_pribyl)}} @else 0 @endif %)</span></p></div>">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>Онлайн тест</b></font>
                          <span class="badge badge-success float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl/100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($tests->where('dop_category', 0))}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>


              @php
                  $sum_pribyl = $tests_kupits->where('dop_category', 1)->sum('pribyl');
                  $kolichestvo_prodaj = $tests_kupits->where('dop_category', 1)->count();
                  $kolichestvo_ispolzovanie_kuponov = $tests_kupits->where('dop_category', 1)->where('promocod', '!=', null)->count();
                  $sum_promocod_pribyl = $tests_kupits->where('dop_category', 1)->where('promocod', '!=', null)->sum('pribyl');
              @endphp 
              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0" tabindex="0" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="<span class='text-center'>Промокод колдонулду</span>" data-content="<div><p class='mb-2'>Сатуу: <b>{{$kolichestvo_ispolzovanie_kuponov}}</b> / {{$kolichestvo_prodaj}} <span class='pl-3 float-right'>(@if($kolichestvo_prodaj != 0) {{round((100 * $kolichestvo_ispolzovanie_kuponov) / $kolichestvo_prodaj)}} @else 0 @endif %)</span></p><p class='mb-0'>Киреше: <b>{{$sum_promocod_pribyl / 100}} сом</b> / {{$sum_pribyl / 100}} сом <span class='pl-3 float-right'>(@if($sum_pribyl != 0) {{round((100 * $sum_promocod_pribyl) / $sum_pribyl)}} @else 0 @endif %)</span></p></div>">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>ЖРТ <small>(ОРТ)</small></b></font>
                          <span class="badge badge-success float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$sum_pribyl/100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($tests->where('dop_category', 1))}}</b></p>
                      <p class="text-muted mb-0">Сатылды:  <b> {{$kolichestvo_prodaj}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>

              <section class="col-md-4 connectedSortable mb-3">
                  <div class="info-box mb-0">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>
                    <div class="info-box-content pr-0">
                      <p class="text-muted mb-0">
                        <span class="info-box-text"><font style="vertical-align: inherit;"><b>Өнөктөш прог...</b></font>
                          <span class="badge badge-success float-right p-2">
                                <font class="p-2" style="vertical-align: inherit;">Киреше: {{$part / 100}} с</font>
                          </span>
                        </span>
                      </p>
                      <p class="text-muted mb-0">Жалпы саны:  <b> {{count($partnerka)}}</b></p>
                      <p class="text-muted mb-0">Колдонулду:  <b> {{$kupitmaterialov->where('promocod', '!=', null)->count() + $kupitkursov->where('promocod', '!=', null)->count() + $tests_kupits->where('promocod', '!=', null)->count()}}</b></p>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </section>

            </div>


            <h6 class="pt-4 mb-2">Кененирээк</h6>
                    <div class="mt-1"> 
                      <div id="" class="bs-stepper stepper3">
                        <div id="test110" class="bs-stepper-header border shadow-sm" role="tablist" style="border-radius: 4px;">

                          <div class="step" data-target="#test-nlf-01">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger01" aria-controls="test-nlf-01">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-file-powerpoint" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Презентация</span>
                            </button>
                          </div>
                          <div class="bs-stepper-line"></div>

                          <div class="step" data-target="#test-nlf-02">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger02" aria-controls="test-nlf-02">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-scroll" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">План конспект</span>
                            </button>
                          </div>
                          <div class="bs-stepper-line"></div>

                          <div class="step" data-target="#test-nlf-03">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger03" aria-controls="test-nlf-03">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-tasks" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Тест, <small>текшерүү иш, ...</small></span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-04">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger04" aria-controls="test-nlf-04">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-window-restore" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Шаблон <small>(презентация)</small></span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-05">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger05" aria-controls="test-nlf-05">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-award" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Грамота, <small>сертификат, ...</small></span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-06">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger06" aria-controls="test-nlf-06">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-chalkboard-teacher" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Курс</span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-07">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger07" aria-controls="test-nlf-07">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-spell-check" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Онлайн тест</span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-08">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger08" aria-controls="test-nlf-08">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-graduation-cap" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">ЖРТ <small>(ОРТ)</small></span>
                            </button>
                          </div>

                          <div class="bs-stepper-line"></div>
                          <div class="step" data-target="#test-nlf-09">
                            <button type="button" class="step-trigger" role="tab" id="stepper3trigger09" aria-controls="test-nlf-09">
                              <span class="bs-stepper-circle">
                                <span class="fas fa-graduation-cap" aria-hidden="true"></span>
                              </span>
                              <span class="bs-stepper-label">Өнөктөш программа<small></small></span>
                            </button>
                          </div>

                        </div>
                        <div class="bs-stepper-content p-0 mt-4">
                          <div id="test-nlf-01" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger01">
                            @if(count($materialies->where('dop_category', 0)) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($materialies->where('dop_category', 0) as $materialy)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                                  <span class="description1 ml-0">{{ $materialy->type }} ({{ $materialy->size }} mb) / {{$materialy['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{ $materialy->price / 100}} сом</td>
                                          <td class="align-middle">{{$materialy->kupitmaterialov_count}}</td>
                                          <td class="align-middle">{{$kupitmaterialov->where('materialy_id', $materialy->id)->sum('pribyl') / 100}} сом</td>
                                          <td  class="align-middle">
                                            @if($materialy->price > 0)
                                              @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                            <!--<div class="btn-group">
                                              <a href="{{ route('moderator_statistika_otdelno', $materialy['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>
                                            </div>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы презентацияңыз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-02" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger02">
                            @if(count($materialies->where('dop_category', 4)) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($materialies->where('dop_category', 4) as $materialy)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                                  <span class="description1 ml-0">{{ $materialy->type }} ({{ $materialy->size }} mb) / {{$materialy['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{ $materialy->price / 100}} сом</td>
                                          <td class="align-middle">{{$materialy->kupitmaterialov_count}}</td>
                                          <td class="align-middle">{{$kupitmaterialov->where('materialy_id', $materialy->id)->sum('pribyl') / 100}} сом</td>
                                          <td  class="align-middle">
                                            @if($materialy->price > 0)
                                              @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                            <!--<div class="btn-group">
                                              <a href="{{ route('moderator_statistika_otdelno', $materialy['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>
                                            </div>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы план конспекттиңиз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-03" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger03">
                            @if(count($materialies->where('dop_category', 1)) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($materialies->where('dop_category', 1) as $materialy)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                                  <span class="description1 ml-0">{{ $materialy->type }} ({{ $materialy->size }} mb) / {{$materialy['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{ $materialy->price / 100}} сом</td>
                                          <td class="align-middle">{{$materialy->kupitmaterialov_count}}</td>
                                          <td class="align-middle">{{$kupitmaterialov->where('materialy_id', $materialy->id)->sum('pribyl') / 100}} сом</td>
                                          <td  class="align-middle">
                                            @if($materialy->price > 0)
                                              @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                            <!--<div class="btn-group">
                                              <a href="{{ route('moderator_statistika_otdelno', $materialy['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>
                                            </div>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы тест, текшерүү ишиңиз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-04" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger04">
                            @if(count($materialies->where('dop_category', 2)) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($materialies->where('dop_category', 2) as $materialy)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                                  <span class="description1 ml-0">{{ $materialy->type }} ({{ $materialy->size }} mb) / {{$materialy['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{ $materialy->price / 100}} сом</td>
                                          <td class="align-middle">{{$materialy->kupitmaterialov_count}}</td>
                                          <td class="align-middle">{{$kupitmaterialov->where('materialy_id', $materialy->id)->sum('pribyl') / 100}} сом</td>
                                          <td  class="align-middle">
                                            @if($materialy->price > 0)
                                              @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                            <!--<div class="btn-group">
                                              <a href="{{ route('moderator_statistika_otdelno', $materialy['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>
                                            </div>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы шаблонуңуз (презентация) жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-05" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger05">
                            @if(count($materialies->where('dop_category', 3)) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($materialies->where('dop_category', 3) as $materialy)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                                  <span class="description1 ml-0">{{ $materialy->type }} ({{ $materialy->size }} mb) / {{$materialy['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{ $materialy->price / 100}} сом</td>
                                          <td class="align-middle">{{$materialy->kupitmaterialov_count}}</td>
                                          <td class="align-middle">{{$kupitmaterialov->where('materialy_id', $materialy->id)->sum('pribyl') / 100}} сом</td>
                                          <td  class="align-middle">
                                            @if($materialy->price > 0)
                                              @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                            <!--<div class="btn-group">
                                              <a href="{{ route('moderator_statistika_otdelno', $materialy['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>
                                            </div>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы грамота, сертификатыңыз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-06" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger06">
                            @if(count($podcategories) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 550px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Сабак</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($podcategories as $podcategory)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $podcategory->title }}" style="max-width: 230px;">{{ $podcategory->title }}</span>
                                                  <span class="description1 ml-0">{{$podcategory['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">
                                            <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" style="max-width: 250px;">сабак: {{$podcategory->uroky_count}}</span>
                                                  <span class="description1 ml-0">видео: {{$podcategory->video_count + $podcategory->youtube_count}}</span>
                                            </div>
                                          </td>
                                          <td class="align-middle">@if(intval($podcategory->language) != 4 ){{$podcategory->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{$podcategory->price / 100}} сом</td>
                                          <td  class="align-middle">{{$podcategory->kupit_count}}</td>
                                          <td  class="align-middle">{{$kupitkursov->where('kurs_id', $podcategory->id)->sum('pribyl') / 100}} сом</td>
                                          <td style="padding-right: 12px; padding-bottom: 6px;"  class="align-middle">
                                            @if($podcategory->price > 0)
                                              @if (intval($podcategory->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                              <!--<a href="{{ route('moderator_statistika_otdelno_kurs', $podcategory['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы курсуңуз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-07" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger07">
                            @if(count($tests->where('dop_category', 0)) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Суроо</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($tests->where('dop_category', 0) as $materialy)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                                  <span class="description1 ml-0">{{$materialy['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">{{$materialy->test_voprosy_count}}</td>
                                          <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{ $materialy->price / 100}} сом</td>
                                          <td class="align-middle">{{$materialy->tests_kupit_count}}</td>
                                          <td class="align-middle">{{$tests_kupits->where('test_id', $materialy->id)->sum('pribyl') / 100}} сом</td>
                                          <td  class="align-middle">
                                            @if($materialy->price > 0)
                                              @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                            <!--<div class="btn-group">
                                              <a href="{{ route('moderator_statistika_otdelno', $materialy['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>
                                            </div>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы онлайн тесттиңиз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-08" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger08">
                            @if(count($tests->where('dop_category', 1)) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Тема</th>
                                          <th class="pt-1 pb-1">Суроо</th>
                                          <th class="pt-1 pb-1">Тили</th>
                                          <th class="pt-1 pb-1">Баасы</th>
                                          <th class="pt-1 pb-1">Сатылды</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                          <th class="pt-1 pb-1"><span title="Өнөктөш программа"><i class="fas fa-tag" style="color: #ffc107"></i></span></th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($tests->where('dop_category', 1) as $materialy)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">
                                              <div class="user-block1">
                                                  <span class="username1 ml-0 d-inline-block text-truncate" title="{{ $materialy->title }}" style="max-width: 230px;">{{ $materialy->title }}</span>
                                                  <span class="description1 ml-0">{{$materialy['created_at']->format('d.m.Y')}}</span>
                                              </div>
                                          </td>
                                          <td class="align-middle">{{$materialy->test_voprosy_count}}</td>
                                          <td class="align-middle">@if(intval($materialy->language) != 4 ){{$materialy->languages['language']}}@else - @endif</td>
                                          <td class="align-middle">{{ $materialy->price / 100}} сом</td>
                                          <td class="align-middle">{{$materialy->tests_kupit_count}}</td>
                                          <td class="align-middle">{{$tests_kupits->where('test_id', $materialy->id)->sum('pribyl') / 100}} сом</td>
                                          <td  class="align-middle">
                                            @if($materialy->price > 0)
                                              @if (intval($materialy->partnerka) == 0)<span title="Өнөктөш программа кошулган эмес"><i class="fas fa-tag" style="color: #6c757d;"></i></span>@else<span title="Өнөктөш программа кошулган"><i class="fas fa-tag" style="color: #ffc107"></i></span>@endif
                                            @endif
                                            <!--<div class="btn-group">
                                              <a href="{{ route('moderator_statistika_otdelno', $materialy['id']) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Больше информации" style="">
                                                <i class="fas fa-info-circle"></i> Подробнее
                                              </a>
                                            </div>-->
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы ЖРТ тесттиңиз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                          <div id="test-nlf-09" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger09">
                            @if(count($partnerka) > 0)
                            <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 550px;">
                              <table class="table table-head-fixed table-hover text-nowrap">
                                  <thead>
                                      <tr>
                                          <th class="pt-1 pb-1 pl-3">№</th>
                                          <th class="pt-1 pb-1">Промокод</th>
                                          <th class="pt-1 pb-1">Колдонулду</th>
                                          <th class="pt-1 pb-1">Киреше</th>
                                      </tr>
                                  </thead>
                                  <tbody class="align-middle">
                                     @foreach ($partnerka as $promo)
                                      <tr class="todo-list2">
                                          <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                          <td class="align-middle">{{$promo->promocod}}</td>
                                          <td class="align-middle">{{$promo->kupitmaterialov_count + $promo->kupit_count}}</td>
                                          <td class="align-middle">{{$kupitmaterialov->where('promocod', $promo->id)->sum('pribyl') + $kupitkursov->where('promocod', $promo->id)->sum('pribyl') + $tests_kupits->where('promocod', $promo->id)->sum('pribyl')}} сом</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                            </div>
                            @else
                            <div class="mt-1 pt-2">
                                <div class="col-12 text-center">
                                  <h4>Сиздин бир дагы промокодуңуз жок!</h4>
                                </div>
                            </div>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>

        </div><!-- /.container-fluid -->
    </section><!-- /.content -->



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

document.querySelectorAll('.number223').forEach(function(number){

    var value = parseFloat(number.innerHTML);
    number.innerHTML = Math.round(value);
});


</script>
@endsection