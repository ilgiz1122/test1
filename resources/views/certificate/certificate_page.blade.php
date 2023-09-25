@extends('layouts.app')

@section('content')
<style>
    .cursor{
        cursor: pointer;
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
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h5 class="pt-3 mb-2">Сертификаты <small>(выберите нужный шаблон сертификата)</small></h5>
            <div class="row">
                @foreach ($certificate_shablons as $certificate_shablon)
                <div class="col-md-4 col-sm-6 col-12 block23 two for_color_navedenii px-lg-2 py-lg-2">
                    <a style="display:block" href="{{ route('moderator_kurs_certificate_shablon', ['kurs_id' => $kurs_id, 'certificate_shablon_id' => $certificate_shablon->id]) }}"></a>
                    <img class="" width="100%" src="{{asset('')}}/storage/certificate/images/{{$certificate_shablon->img}}">
                </div>
                @endforeach
            </div>
            <a  href="{{ route('moderator_kurs_certificate_download') }}">sdfsf</a>
            <!-- /.card -->
          </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  <script type="text/javascript">

var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});




$('.for_shadow').mouseover(function(){
$(this).addClass('shadow');
});
$('.for_shadow').mouseleave(function(){
$(this).removeClass('shadow');
});


</script>
@endsection