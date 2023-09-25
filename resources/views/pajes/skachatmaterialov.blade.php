@extends('layouts.app')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
 
</style>
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <div class="d-flex justify-content-center">
              
                    <div class="col-md-5 d-flex mt-3">
                        <div class="card shadow-sm flex-fill">
                            <div class="card-header pt-0 pb-0 pl-0 pr-0" >
                                <div id="carouselExampleIndicators" data-interval="false" data-keyboard="false" data-touch="true" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li style="background-color: red;" data-target="#carouselExampleIndicators" data-slide-to="0" class="active testr"></li>
                                    <li style="background-color: red;" data-target="#carouselExampleIndicators" data-slide-to="1" class="testr1"></li>
                                    <li style="background-color: red;" data-target="#carouselExampleIndicators" data-slide-to="2" class="testr2"></li>
                                  </ol>
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img class="d-block w-100" id="rebate_old_imag23" src="/{{$materialies['img1']}}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" id="rebate_old_imag24" src="/{{$materialies['img2']}}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" id="rebate_old_imag25" src="/{{$materialies['img3']}}" alt="Third slide">
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
                            <div class="card-body"><!-- the events -->
                                <h6 style="margin-bottom: 1px;"><strong id="div">Тема: {{$materialies['title']}}</strong></h6>
                                <h7 style="font-size: 16px;">Автор: Таалайбек уулу Илгиз</h7><br>
                                <h7 style="font-size: 16px;">Размер файла: {{$materialies['size']}} мегабайт</h7><br>
                                <h7 style="font-size: 16px;">Расширение файла: {{$materialies['type']}}</h7><br>
                                <h7 style="font-size: 16px;">Язык материала: 
                                      <h7 style="font-size: 16px;">{{$materialies->languages['language']}}</h7>
                                      <br>
                                
                                
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                  
                                    
                                      <a class="btn btn-primary btn-block btn-sm" href="{{ route('download', $materialies['ssylka'])}}">Скачать</a>
                                      
                                    
                            </div>
                        </div><!-- /.card -->
                    </div><!-- /.col -->
        
            </div>
            
        </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->





<script type="text/javascript">
// для блока, чтобы стал кнопкой
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
// для блока, чтобы стал кнопкой  
</script>
@endsection