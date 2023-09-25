@extends('layouts.app')

@section('content')
<style>
    .cursor{
        cursor: pointer;
    }
    .img-svg path{
        fill: #FFFFFF;
    }
    .scale {
    transition: 1s; /* Время эффекта */
   }
   .scale:hover {
    transform: scale(1.03); /* Увеличиваем масштаб */
   }
</style>
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h5 class="pt-3 mb-2"></h5>
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-light">
                        <div class="card-header">
                            <p class="text-muted text-center mb-0"><b>Оформление покупки со стоимостью {{$materialies['price'] / 100}} сом.</b></p>
                        </div>
                        <div class="card-body pt-2 pb-2 pl-3 pr-3">
                            <div class="row">
                                <div class="col-md-8 border-right">
                                    
                                        <p class="text-muted text-center">Материал, который вы покупаете</p>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item pb-1">
                                                <p class="mb-0">Тема <a style="cursor: default;" class="float-right">{{$materialies['title']}}</a></p> 
                                            </li>
                                            <li class="list-group-item pb-1">
                                                <p class="mb-0">Автор <a style="cursor: default;" class="float-right">{{$materialies->user['name']}}</a></p> 
                                            </li>
                                            
                                            <li class="list-group-item pb-1">
                                                <p class="mb-0">Язык материала <a style="cursor: default;" class="float-right">
                                                    {{$materialies->languages['language']}}
                                                </a>
                                                </p>
                                                
                                            </li>
                                            
                                            <li class="list-group-item pb-1">
                                                <p class="mb-0">Расширение файла <a style="cursor: default;" class="float-right">{{$materialies->type}}</a></p> 
                                            </li>
                                            <li class="list-group-item pb-1">
                                                <p class="mb-0">Количество покупок <a style="cursor: default;" class="float-right">{{$kupitmaterialovs}}</a></p> 
                                            </li>
                                            
                                            
                                            <li class="list-group-item pb-1">
                                                <b>Цена <a style="cursor: default;" class="float-right">{{$materialies->price / 100}} сом</a></b> 
                                            </li>
                                            
                                        </ul>
                                    
                                </div>
                                <div class="col-md-4">
                                    
                                        <p class="text-muted text-center" style="font-size: 14px;">Оплата взимается с вашего баланса. Оплатив один раз вы получаете доступ к скачиванию данного материала.</p><hr><p class="text-muted text-center">Если при оплате возникнуть проблемы обращайтесь к нам.</p>
                                        <div class="btn-group btn-block pl-4 pr-3">
                                            <button href="tel: +996709313050" type="button" class="btn btn-outline-success">
                                              <i class="fas fa-phone" style="font-size: 20px;"></i>
                                            </button>                                            
                                            <button href="https://telegram.me/sasaed" target="_blank" type="button" class="btn btn-outline-info">
                                              <i class="fab fa-telegram-plane" style="font-size: 20px;"></i>
                                            </button>
                                            <button href="https://api.whatsapp.com/send?phone=+996709313050&text=Введите свой вопрос" target="_blank" type="button" class="btn btn-outline-success">
                                              <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                                            </button>
                                      </div>
                                </div>
                            </div>  
                        </div><!-- /.card-body -->
                        <div class="card-footer pt-2 pb-2 pl-2 pr-2 mb-0">
                            @if (Auth::user()->balance < $materialies['price'])
                                <p class="text-muted text-center mb-0"><b>У вас недостаточно средств для покупки данного материала. Пожалуйста <a href="">пополните баланс</a>.</b></p>
                            @endif
                            @if (Auth::user()->balance >= $materialies['price'])
                            <form action="{{ route('pokupkymaterialov.store') }}" method="POST">
                                @csrf
                                <input type="number" name="materialy_id" value="{{$materialies['id']}}" class="form-control" id="inputEmail3" placeholder="id подкатегории" readonly="" hidden="">
                                <input type="text" name="materialy_title" value="{{$materialies['title']}}" class="form-control" id="inputPassword3" placeholder="тема курса" readonly="" hidden="">
                                <input type="number" name="user_id" value="{{ Auth::user()->id }}" class="form-control" id="inputPassword3" placeholder="id пользователья" readonly="" hidden="">
                                <input type="text" name="user_name" value="{{ Auth::user()->name }}" class="form-control" id="inputPassword3" placeholder="ФИО" readonly="" hidden="">
                                <input type="number" name="price" value="{{$materialies['price'] / 100}}" class="form-control" id="inputPassword3" placeholder="id пользователья" readonly="" hidden="">
                                <input type="text" name="proverka" value="{{ Auth::user()->id }}-{{$materialies['id']}}" class="form-control" id="inputPassword3" placeholder="ФИО" readonly="" hidden="">
                                <button type="submit" class="btn btn-info btn-block float-right">Купить</button>
                            </form>
                            @endif
                        </div>
                    </div><!-- /.card -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header pr-2 pl-2">
                                <h4 class="card-title  text-center">Данные покупателья</h4>
                            </div>
                            <div class="card-body pr-2 pl-2">
                                        <p class="mb-0">ФИО <a style="cursor: default;" class="float-right">{{ Auth::user()->name }}</a></p> <hr>
                                        <p class="mb-0">E-mail <a style="cursor: default;" class="float-right">{{ Auth::user()->email }}</a></p> <hr>
                                        <p class="mb-0">Баланс <a style="cursor: default;" class="float-right">{{ Auth::user()->balance / 100 }} сом</a></p> 
                            </div><!-- /.card-body -->
                            <div class="card-footer pr-2 pl-2 pt-2 pb-2">
                                <button type="submit" class="btn btn-outline-info btn-block float-right">Пополнить баланс</button>
                            </div>
                        </div><!-- /.card -->
                    <!--<div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Тут будет реклама</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                    </ul>
                                </div>
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
    <!-- /.content -->

<script type="text/javascript">
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
</script>
@endsection