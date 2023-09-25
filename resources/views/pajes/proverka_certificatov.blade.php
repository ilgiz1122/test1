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
                    <section class="content-header pl-0 pr-0">
                      <div class="container-fluid p-0">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('home')}}">
                                        <i class="nav-icon fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Сертификатты текшерүү
                                </li>
                            </ol>
                      </div><!-- /.container-fluid -->
                    </section>

                    <form method="POST"  action="{{ route('proverka_sertificatov_search') }}">
                    @csrf
                      <h2 class="text-center mt-5" style="color: #17a2b8;"><b>Сертификаттын аныктыгын текшерүү</b></h2>
                      <div class="row align-items-center mt-5">
                          <div class="col-md-2"></div>
                          <div class="col">
                            <div class="row align-items-center">
                              <div class="col">
                                <input name="fio" class="form-control form-control-lg text-center mt-2" type="text" placeholder="Асанов Асан Асанович">
                              </div>
                              <div class="col-md-auto">
                                <button type="submit" class="btn btn-info btn-lg mt-2 float-right"><i class="far fa-search pr-2"></i> Текшерүү</button>
                              </div>
                            
                            </div>
                          </div>
                          <div class="col-md-2"></div>
                      </div>
                    </form> 


                    <div class="row pt-5 mt-5 pb-3">
                      <div class="col"></div>
                      <div class="col-auto pt-5 mt-5">
                        <div class="row align-items-center pt-5 mt-5">
                          <div class="col pt-3 mt-3"><h7 class="mt-5">Толук маалымат алуу үчүн сайттын администраторлору менен байланышыңыз</h7></div>
                          <div class="col-auto pt-3 mt-3">
                            <a href="{{ route('contact')}}" class="btn btn-block btn-outline-info pr-4 pl-4" style="border-radius: 20px">Байланышуу <i class="far fa-arrow-right pl-2"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="col"></div>
                    </div>
            
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

           
</script>
@endsection