@extends('layouts.moderator_layouts')

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h5 class="pt-3 mb-2">Статистика ({{ $podcategory->title }})</h5>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                </div>
            @endif
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><font style="vertical-align: inherit;">{{$kolichestvo_prodaj_kurs}}</font></h3>

                    <p><font style="vertical-align: inherit;">Количество продаж</font></p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><font style="vertical-align: inherit;">{{$sum_pribyl_kurs/100}} </font><sup style="font-size: 20px"><font style="vertical-align: inherit;"> сом</font></sup></h3>

                    <p><font style="vertical-align: inherit;">Сумма прибыли</font></p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><font class="number223" style="vertical-align: inherit;">@if (intval($kolichestvo_prodaj_kurs) != 0){{(100 * ($kolichestvo_prodaj_kurs-$kolichestvo_ispolzovanie_kuponov_kurs)) / $kolichestvo_prodaj_kurs}} @else 0 @endif</font><sup style="font-size: 20px"><font style="vertical-align: inherit;"> %</font></sup></h3>

                    <p><font style="vertical-align: inherit;">Промокоды</font></p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-chart-line"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><font class="number223" style="vertical-align: inherit;">@if (intval($sum_pribyl_kurs) != 0){{((100 * ($sum_pribyl_kurs - $sum_promocod_pribyl_kurs)) / $sum_pribyl_kurs)}} @else 0 @endif</font><sup style="font-size: 20px"><font style="vertical-align: inherit;"> %</font></sup></h3>

                    <p><font style="vertical-align: inherit;">Прибыль от промокодов</font></p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <h6 class="pt-3 mb-2">О курсе</h6>
            <div class="card card-primary card-outline">
            <div class="card-header pt-2 pb-2 pr-2 pl-2">
              
            </div><!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages" style="max-height: 490px;">
                
                      <table class="table table-head-fixed table-hover text-nowrap">
                        


                        <thead>
                          <tr>
                              <th class="pt-1 pb-1">Тема</th>
                              <th class="pt-1 pb-1">Категория</th>
                              <th class="pt-1 pb-1">Уроки</th>
                              <th class="pt-1 pb-1">Язык</th>
                              <th class="pt-1 pb-1" class="pt-1 pb-1">Цена</th>
                              <th class="pt-1 pb-1">Продажи</th>
                              <th class="pt-1 pb-1">Прибыль</th>
                              <th class="pt-1 pb-1"><i class="fas fa-tag" data-bs-toggle="tooltip" data-bs-placement="left" title="Партнерка"></i></th>
                          </tr>
                      </thead>
                      <tbody class="align-middle">
                          <tr>
                              <td style="padding-bottom: 6px;">
                                  <div class="user-block1">
                                      <span class="username1 ml-0 d-inline-block text-truncate" style="max-width: 230px;">{{ $podcategory->title }}</span>
                                      <span class="description1 ml-0">Добавлено: {{$podcategory['created_at']->format('d.m.Y')}}</span>
                                  </div>
                              </td>
                              <td style="padding-bottom: 6px;">{{$podcategory->category['title']}}</td>
                              <td style="padding-bottom: 6px;">
                                <div class="user-block1">
                                    <span class="username1 ml-0 d-inline-block text-truncate" style="max-width: 250px;">уроков: {{$podcategory->uroky_count}}</span>
                                    <span class="description1 ml-0">видеофайлы: {{$podcategory->video_count + $podcategory->youtube_count}}</span>
                                </div>
                              </td>
                              <td style="padding-bottom: 6px;">{{$podcategory->languages['language']}}</td>
                              <td style="padding-bottom: 6px;">{{ $podcategory->price / 100}} сом</td>
                              <td style="padding-bottom: 6px;">{{$podcategory->kupit_count}}</td>
                              <td style="padding-bottom: 6px;">{{$sum_pribyl_kurs/100}}  сом</td>
                              <td style="padding-bottom: 6px;">@if (intval($podcategory->partnerka) == 0)<span class="h5">-</span>@else<span class="h5">+</span>@endif</td>
                          </tr>
                      </tbody>
                    </table><!-- /.table --> 
                
              </div><!-- /.mail-box-messages -->
            </div><!-- /.card-body -->
          </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

        



<!-- Модальное окно для вывода картинки и документа -->
<div class="modal fade" id="modal-default2" aria-labelledby="exampleModalLongTitle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
                <div class="card mb-0">
                    <div class="card-header text-center pb-0 pr-0 pl-0 pt-0">
                      <a href="/" class="h5 mb-2 mt-2"><b class="var_title7"></b></a>
                        <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                        </button>
                        <div id="carouselExampleIndicators" data-interval="false" data-keyboard="false" data-touch="true" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li style="background-color: red;" data-target="#carouselExampleIndicators" data-slide-to="0" class="active testr"></li>
                            <li style="background-color: red;" data-target="#carouselExampleIndicators" data-slide-to="1" class="testr1"></li>
                            <li style="background-color: red;" data-target="#carouselExampleIndicators" data-slide-to="2" class="testr2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" id="rebate_old_imag23" src="" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" id="rebate_old_imag24" src="" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" id="rebate_old_imag25" src="" alt="Third slide">
                            </div>
                          </div>
                          
                          <a style="width: 25px;" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon iconc" aria-hidden="true"><i class="fas fa-chevron-circle-left" style="font-size: 40px;"></i></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a style="width: 65px;" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon iconc" aria-hidden="true"><i class="fas fa-chevron-circle-right" style="font-size: 40px; direction: rtl;"></i></span>
                            <span class="sr-only">Next</span>
                          </a>
                          
                      </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
<!-- Модальное окно для вывода картинки и документа -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>



$(function() {
  $(".w-1001").click(
    function() {
      var img1 = $(this).attr('data-img1');
      var img2 = $(this).attr('data-img2');
      var img3 = $(this).attr('data-img3');
      var title1 = $(this).attr('data-title1');
      


      $("#rebate_old_imag23").attr('src', img1);
      $("#rebate_old_imag24").attr('src', img2);
      $("#rebate_old_imag25").attr('src', img3);
      $(".var_title7").text(title1);
      


      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});


document.querySelectorAll('.number223').forEach(function(number){

    var value = parseFloat(number.innerHTML);
    number.innerHTML = Math.round(value);
});

</script>
@endsection