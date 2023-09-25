@extends('layouts.ort_layouts')

@section('title', 'Профил')

@section('content')
<style type="text/css">
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
@media (max-width: 768px) {
  .w-100 {
    display: none;
  }
}
</style>
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <!--Окно для уведомлений (успушно удалена) -->
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
            <!--/.Окно для уведомлений (успушно удалена) -->
        </div>
    </div>
    <!-- /.Тема -->



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="card card-outline card-widget widget-user1 shadow-sm">
                            <div class="widget-user-header text-white" style="background: url('{{asset('')}}/admin/dist/img/photo1.png') center center;">
                                <h3 class="widget-user-username text-right">Менин профилим</h3>
                                <h5 class="widget-user-desc text-right"></h5>
                            </div>
                            <div class="widget-user-image1">
                                @if($users->img_600_600 != null)
                                      <img class=" img-circle" src="{{ asset('public/storage/users/img_600_600/') }}/{{$users->img_600_600}}">
                                @else
                                      <img class="img-circle" src="{{asset('')}}/admin/dist/img/user-3331256_960_720 (1).png">
                                @endif
                                
                            </div>
                            <div class="card-body box-profile mt-4">
                                <h3 class="profile-username text-center">{{$users['name']}}</h3>
                                <p class="text-muted text-center">Маалымат</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>E-Mail</b> <a style="cursor: default;" class="float-right">{{$users['email']}}</a>
                                    </li>
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Телефон</b> <a style="cursor: default;" class="float-right">{{$users['phone']}}</a>
                                    </li>
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Баланс</b> <a style="cursor: default;" class="float-right">{{$users['balance'] / 100}} сом</a>
                                    </li>
                                    @if($users->for_role == 1)
                                        @if($moderator1 != null)
                                            <li class="list-group-item pb-0 pt-3">
                                                <b>Роль</b> <a class="float-right">
                                                    Колдонуучу <small class="pl-2"><i class="fas fa-spinner fa-spin"></i></small></a>
                                            </li>
                                        @else
                                            @if($moderator2 != null)
                                                @if($moderator3 < 1)
                                                <li class="list-group-item pb-0 pt-3">
                                                    <b>Роль</b> <a class="float-right" style="cursor: pointer;" data-toggle="modal" data-target="#modal-default">
                                                    Колдонуучу <small>(өзгөртүү)</small></a>
                                                </li>
                                                @endif
                                            @else
                                                <li class="list-group-item pb-0 pt-3">
                                                    <b>Роль</b> <a class="float-right" style="cursor: pointer;" data-toggle="modal" data-target="#modal-default">
                                                    Колдонуучу <small>(өзгөртүү)</small></a>
                                                </li>
                                            @endif
                                        @endif
                                    @endif
                                    @if ($users->for_role == 2)
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Роль</b> <a class="float-right" style="cursor: default;">Админ</a>
                                    </li>
                                    @endif

                                    @if ($users->for_role == 3)
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Роль</b> <a class="float-right" style="cursor: default;">Модератор</a>
                                    </li>
                                    @endif
                                    @if ($users->f_fio != null)
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Фамилия</b> <a class="float-right" style="cursor: default;">{{$users->f_fio}}</a>
                                    </li>
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Аты</b> <a class="float-right" style="cursor: default;">{{$users->i_fio}}</a>
                                    </li>
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Атасынын аты</b> <a class="float-right" style="cursor: default;">{{$users->o_fio}}</a>
                                    </li>
                                    @endif
                                    @if ($users->oblast_id != null)
                                    @php
                                        $oblast = $oblast->where('id', $users->oblast_id)->first();
                                    @endphp
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Область</b> <a class="float-right" style="cursor: default;">{{$oblast->title}}</a>
                                    </li>
                                    @endif
                                    @if ($users->raion_shaar_id != null)
                                    @php
                                        $raion_shaar = $raion_shaar->where('id', $users->raion_shaar_id)->first();
                                    @endphp
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Район / шаар</b> <a class="float-right" style="cursor: default;">{{$raion_shaar->title}}</a>
                                    </li>
                                    @endif
                                    @if ($users->aiyl_title != null)
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Айыл</b> <a class="float-right" style="cursor: default;">{{$users->aiyl_title}}</a>
                                    </li>
                                    @endif
                                    @if ($users->mektep_title != null)
                                    <li class="list-group-item pb-0 pt-3">
                                        <b>Мектеп/Мекеме</b> <a class="float-right" style="cursor: default;">{{$users->mektep_title}}</a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="row text-center">
                                    <div class="col text-center p-0">
                                        <a class="btn btn-link p-0" href="{{route('ort_profile_edit', ['subdomain' => 'ort'])}}">
                                            <i class="fas fa-pencil-alt pr-1"></i>
                                            Профиль
                                        </a>
                                    </div>
                                    <div class="col text-center p-0">
                                        <a class="btn btn-link p-0" href="{{route('profile_password', ['subdomain' => 'ort'])}}">
                                            <i class="fas fa-key pr-1"></i>
                                            Паролду өзгөртүү
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($users->for_role == 1)
                        @if($moderator > 0)
                            @if($moderator1 != null)
                                <div class="pt-2 pb-2 mb-2">
                                  <button type="button" class="btn btn-success btn-block p-3">Модератор болгум келет <br> <small>Өтүнүч кабыл алынды, жоопту күтө туруңуз.</small></button>
                                </div>
                            @else
                                @if($moderator2 != null)
                                    @if($moderator3 != 1)
                                    <div class="card">
                                        <div class="card-body p-2">
                                            <p class="text-center"><b>Модератор болгум келет</b></p>
                                            @foreach ($moderator2 as $moderator2)
                                            <div class="callout callout-warning">
                                              <p><b>Кабыл алынган жок!</b> <small class="float-right pt-1">({{$moderator2->updated_at->format('d.m.Y')}} / {{$moderator2->updated_at->format('H:i')}})</small></p>
                                              <p>{{$moderator2->comment}}</p>
                                            </div>
                                            @endforeach
                                            <div class="pt-2">
                                              <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-block p-2">Дагы бир жолу жөнөтүү</button>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </div><!-- /.card -->
                                    @endif
                                @else
                                    <div class="pt-2 pb-2 mb-2">
                                      <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-block p-3">Модератор болгум келет</button>
                                    </div>
                                @endif
                            @endif
                        @else
                            <div class="pt-2 pb-2 mb-2">
                              <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-block p-3">Модератор болгум келет</button>
                            </div>
                        @endif
                    @endif
                </div>

                    

                <div class="col-md-8">
                    <!--  
                    <div class="card">
                        <div class="card-body">
                            <p class="h2 dropdown-item-title pt-2 pb-2"><b>Балансты толуктоо</b></p>
                            <form class="needs-validation" novalidate method="POST" action="{{ route('popolnenie_balansa',) }}">
                              @csrf
                                <div class="input-group pt-2 pb-2">
                                  <input type="number" pattern="\d+" name="summa_balansa" min="0" max="99999" maxlength="5" class="form-control" placeholder="Мисалы: 120" required="">
                                  <div class="input-group-append">
                                    <span class="input-group-text">сом</span>
                                  </div>
                                  <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                </div>
                                <div class="pt-2 pb-2 mb-2">
                                  <button type="submit" class="btn btn-success float-right pr-3 pl-3">Балансты толуктоо</button>
                                </div>
                                <div class="pt-2 pb-2 mb-2"></div>
                            </form> 
                        </div>
                    </div>   --> 
                    <div class="card">
                        <div class="card-body">
                            <p class="h2 dropdown-item-title pt-2 pb-2"><b>Балансты акчага айландыруу</b></p>
                            <p class="pt-2 mb-1 text-muted">
                                Балансты акчага айландыруунун талаптары:
                                <ul class="list-unstyled text-muted">
                                    <ul style="padding-left: 25px;">
                                      <li>Модератор же болбосо өнөктөш программасынын катышуучусу болушуңуз керек.</li>
                                      <li>Балансыңыздагы акча каражаты 250 сомдон жогору болушу керек.</li>
                                      <li>Акчаны кандай жол менен алууну тандашыңыз керек.</li>
                                    </ul>
                                  </li>
                                </ul>
                            </p>
                            <hr class="mt-5 mb-5">
                            <p class="mb-0">Балансты акчага айландыруу үчүн төмөндөгү форманы толтуруңуз:</p>
                            @if ($users->for_role == 3)
                                <form class="needs-validation" novalidate method="POST" action="{{ route('zaiavka_balansa_na_som') }}">
                                @csrf
                            @else
                                @if($users->for_role == 2)
                                    <form class="needs-validation" novalidate method="POST" action="{{ route('zaiavka_balansa_na_som') }}">
                                    @csrf
                                @else
                                    @if(count($partnerka) > 0)
                                        <form class="needs-validation" novalidate method="POST" action="{{ route('zaiavka_balansa_na_som') }}">
                                        @csrf
                                    @endif
                                @endif
                            @endif
                            
                                    <div class="form-row form-group pt-1 mb-0">
                                        <div class="form-group col-md-4 mt-3 required">
                                            <div class="input-group">
                                              <input type="number" pattern="\d+" name="balans_na_som" min="250" max="99999" maxlength="5" class="form-control" placeholder="min: 250, max: 25 000 сом" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">сом</span>
                                              </div>
                                              <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 mt-3 required">
                                            <select name="value01" class="form-control" required="" id="select1">
                                                <option value="" disabled="true" selected="true">Тандаңыз</option>
                                                <option value="1">Бирдик (единица)</option>
                                                <option value="2">Электрондук капчык</option>
                                                <option value="3">Карта</option>
                                            </select>
                                            <div class="invalid-feedback">Сөзсүз тандоо керек!</div>
                                        </div>

                                        <div class="form-group col-md-4 mt-3 required" id="select001">
                                            <select name="value02" class="form-control select001" required="">
                                                <option value="" disabled="true" selected="true">Жеткиликтүү эмес (алгач биринчи пунктту тандаңыз)</option>
                                            </select>
                                            <div class="invalid-feedback select001">Сөзсүз тандоо керек!</div>
                                        </div>
                                    </div>
                                    <div class="for_num0003">
                                        <p class="mb-1">Картанын номерин жазыңыз</p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                                            </div>
                                            <input name="nomer_karty" id="name03" type="text" class="form-control" data-inputmask="'mask': ['9999 9999 9999 9999']" data-mask placeholder="0000 0000 0000 0000" required="true">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                    </div>
                                    <div class="for_num0001">
                                        <p class="mb-1">Телефондун номерин жазыңыз</p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input name="nomer_telefona" id="name01" type="text" class="form-control" data-inputmask='"mask": "0(999) 999-999"' data-mask placeholder="0(000) 999-999" required="true">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                    </div>
                                    <div class="for_num0002">
                                        <p class="mb-1">Электрондук капчыктын номерин жазыңыз</p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-phone pr-3"></i> +996</span>
                                            </div>
                                            <input name="nomer_kashelka" id="name02" type="text" class="form-control" data-inputmask='"mask": "0(999) 999-999"' data-mask placeholder="0(000) 999-999" required="true">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                    </div>
                                <div class="pt-2 pb-2 mb-2">
                                    @if ($users->for_role == 3)
                                        <button type="submit" class="btn btn-success float-right pr-3 pl-3">Жөнөтүү</button>
                                    @else
                                        @if($users->for_role == 2)
                                            <button type="submit" class="btn btn-success float-right pr-3 pl-3">Жөнөтүү</button>
                                        @else
                                            @if(count($partnerka) > 0)
                                                <button type="submit" class="btn btn-success float-right pr-3 pl-3">Жөнөтүү</button>
                                            @else
                                                <button id="for_otkaz_button" type="" class="btn btn-success float-right pr-3 pl-3">Жөнөтүү</button>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </form> 
                            @if(count($user_vyplatys) > 0)
                            <br>
                            <hr class="mt-5 mb-5">
                            <p class="">Өтүнүчтөр:</p>
                            <div class="" id="accordion">
                                            @foreach ($user_vyplatys as $user_vyplaty)
                                            <div class="card">
                                                <div class="card-body pb-2 pt-2 pr-2 pl-2 class11">
                                                    <a class="" data-toggle="collapse" href="#collapse{{ $loop->iteration }}" aria-expanded="false" style="color: black;">
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            @if($user_vyplaty->status == 0)
                                                                                <i class="fas fa-spinner fa-spin"></i>
                                                                            @endif
                                                                            @if($user_vyplaty->status == 1)
                                                                                <i class="icon fas fa-check" style="color: #28a745;"></i>
                                                                            @endif
                                                                            @if($user_vyplaty->status == 2)
                                                                                <i class="fas fa-times" style="color: #dc3545;"></i>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col border-left border-right border-bottom">
                                                                            <p class="mb-0 text-center">
                                                                                <span>
                                                                                    {{$user_vyplaty->created_at->format('d.m.Y')}}
                                                                                </span><br>
                                                                                <small>
                                                                                    {{$user_vyplaty->created_at->format('H:i')}}
                                                                                </small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <div class="row align-items-center">
                                                                        <div class="col border-bottom">
                                                                            <p class="mb-0">
                                                                                <span>
                                                                                    @if($user_vyplaty->variant_vyplaty->vid == 1)
                                                                                        Бирдик (единица)
                                                                                    @endif
                                                                                    @if($user_vyplaty->variant_vyplaty->vid == 2)
                                                                                        Электрондук капчык
                                                                                    @endif
                                                                                    @if($user_vyplaty->variant_vyplaty->vid == 3)
                                                                                        Карта
                                                                                    @endif
                                                                                </span><br>
                                                                                <small>
                                                                                    {{$user_vyplaty->variant_vyplaty->variant}}
                                                                                </small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center border-bottom">
                                                                <div class="col text-center">
                                                                    <span class="description1 ml-0 pl-1 ml-1">
                                                                        @if($user_vyplaty->variant_vyplaty->vid == 3)
                                                                            {{substr_replace($user_vyplaty->schet, ' **** **** ', 4, 11)}}
                                                                        @else
                                                                            {{$user_vyplaty->schet}}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                                <div class="w-100"></div>
                                                                <div class="col text-center">
                                                                    <span class="text-center pl-3"><small>{{$user_vyplaty->summa / 100}} сом</small></span>
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                    </a>
                                                    <div id="collapse{{ $loop->iteration }}" class="collapse @if($loop->iteration == 1) show @endif"  style="">
                                                    <div class="alert  alert-dismissible mb-0 pt-1 pb-1 pl-3 pr-2" style="background: #AFEEEE;">
                                                        <p class="mb-0">
                                                                <i class="icon fas fa-info"></i> 
                                                                @if($user_vyplaty->status == 0)
                                                                    Өтүнүч кабыл алынды, жоопту күтө туруңуз.
                                                                @endif
                                                                @if($user_vyplaty->status == 1)
                                                                    {!! $user_vyplaty->comment !!}
                                                                    <small>
                                                                        ({{$user_vyplaty->updated_at->format('d.m.Y')}} / {{$user_vyplaty->updated_at->format('H:i')}})
                                                                    </small>
                                                                @endif
                                                                @if($user_vyplaty->status == 2)
                                                                    {!! $user_vyplaty->comment !!}
                                                                    <small>
                                                                        ({{$user_vyplaty->updated_at->format('d.m.Y')}} / {{$user_vyplaty->updated_at->format('H:i')}})
                                                                    </small>
                                                                @endif
                                                        </p>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                            </div>
                            @endif
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center"><b>Өнөктөш программа (Партнерская программа)</b></p>
                            Урматтуу колдонуучу, сиз эми <b>ort.mugalim.edu.kg</b> аркылуу акча таба баштасаңыз болот. Өнөктөш программа бул — <a href="https://ort.mugalim.edu.kg">ort.mugalim.edu.kg</a> сайтына сатып алуучуларды тартуу аркылуу акча табуунун жолу. Программага кошулуу абдан оңой жана бекер. Ар бир адам биздин өнөктөш боло алат. Ал үчүн: 
                                <ul class="list-unstyled">
                                    <ul style="padding-left: 25px;">
                                      <li>Өзүңүздүн веб-сайтыңызга же интернеттеги баракчаңызга <a href="https://ort.mugalim.edu.kg">ort.mugalim.edu.kg</a> шилтемесин промо-кодуңуз менен кошо жайгаштырыңыз.</li>
                                      <li>Блогуңузда сизге жаккан матриалдарды же курстарды сунуштаңыз.</li>
                                      <li>Биздин материалдарды же курстарды WhatsApp, Telegram, Instagram, Facebook ж.б. социалдык тармактардан бөлүшүңүз.</li>
                                    </ul>
                                  </li>
                                </ul>
                            Биздин өнөктөш программа сиздин промокод аркылуу сатылган ар бир материалдардын же курстардын баасынын 5% сизге берет.
                            @if(count($partnerka) > 0)
                            <hr>
                            <p class="text-center pt-3"><b>Менин промокоддорум</b> ({{count($partnerka)}})</p>
                            <div class="row">
                                @foreach ($partnerka as $promo)
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col pr-0">
                                            <p class="text-muted mb-0 pt-3"><b>{{$promo->promocod}}</b> <span class="float-right pr-3" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-content="Колдонуу саны">({{$promo->kupitmaterialov_count + $promo->kupit_count}})</span></p><hr class="mt-0">
                                        </div>
                                        <div class="col-auto text-right pl-0">
                                                <p class="text-muted mb-0 text-right" style="padding-top: 14px;">
                                                    <button type="submit" data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить" class="text-muted w-10012" style="outline: none; border: 0; background: transparent;" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $promo->promocod }}"  data-id2="{{route('promocod.destroy', $promo['id'])}}"><i class="fas fa-trash"></i></button>
                                                </p>
                                            <hr class="mt-0">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-12 p-0">
                                    <p class="mb-0 pt-3 pr-0 pl-0">Промокоддон түшкөн пайда <small tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-content="Жалпы колдонуу саны">({{$users->kupitmaterialov_count}})</small><span class="float-right" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-content="Жалпы киреше">{{$part / 100}} сом</span></p><hr class="mt-0">
                                </div>
                            @endif
                            <p class="pt-4">
                              <a class="btn btn-outline-info btn-sm btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Промокод түзүү
                              </a>
                            </p>
                            <div class="collapse @error('promocod') show @enderror" id="collapseExample">
                              <div class="card card-body pt-3">
                                <form action="{{route('promocod.store')}}" method="POST">
                                    @csrf
                                  <div class="form-row align-items-center">
                                    <div class="col-md-10 pt-2">
                                      <input id="promocod"  class="form-control @error('promocod') is-invalid @enderror" name="promocod" type="text" placeholder="Промокод ойлоп табыңыз">
                                      @error('promocod')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 text-right pt-2">
                                      <button type="submit" class="btn btn-sm btn-info">Сактоо</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row --> 
        </div><!-- /.container-fluid -->
    </section>
    
    
@if ($users->for_role == 1)
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="card card-outline card-primary mb-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Модератордун ролуна өтүнүч</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body" style="padding-top: 10px;">
                        <p class="text-center" style="padding-bottom: 10px;">Анкета</p>
                        <form class="needs-validation" novalidate method="POST" action="{{ route('zaiavka.store') }}" novalidate="novalidate">
                        @csrf
                            <div class="input-group mt-3 mb-3">
                                <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus placeholder="ФИО" readonly="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="input-group mt-3 mb-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required autocomplete="email" placeholder="Email" readonly="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <h8><p class="text-muted" style="margin-bottom: 3px;">Телефон номериңиз</p></h8>
                            <div class="input-group mb-3">                                
                                <input id="phone" name="phone" value="{{Auth::user()->phone}}" required="" autocomplete="off" type="text" class="form-control" data-inputmask='"mask": "0(999) 999-999"' data-mask placeholder="0(000) 999-999">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <h8><p class="text-muted" style="margin-bottom: 3px;">Областты тандаңыздар</p></h8>
                            <div class="form-group">
                                <select class="form-control" name="obl" required="">
                                    <option value="" disabled="true" selected="true">Тандаңыз</option>
                                    <option>Чүй</option>
                                    <option>Талас</option>
                                    <option>Ысык-Көл</option>
                                    <option>Нарын</option>
                                    <option>Ош</option>
                                    <option>Жалал-Абад</option>
                                    <option>Баткен</option>
                                </select>
                            </div>
                            <h8><p class="text-muted" style="margin-bottom: 3px;">Тизмеден бирөөсүн тандаңыз</p></h8>
                            <div class="form-group">
                                <select class="form-control" name="role" required="">
                                    <option value="" disabled="true" selected="true">Тандаңыз</option>
                                    <option>Окуучу</option>
                                    <option>Мугалим</option>
                                    <option>Ата-эне</option>
                                    <option>Башка</option>
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-block">Жөнөтүү</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endif

<!-- Модальное окно для удаления промокодов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Аракетти ырастоо</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Промокод: <span class="float-right var_title"></span></p><hr class="mt-1">                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Жабуу</button>
                        <form id="delet" method="POST"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                              <i class="fas fa-trash"></i> өчүрүү
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
$("#for_otkaz_button").click(
    function() {
      Swal.fire({
          icon: 'error',
          text: 'Балансты акчага айландыруу үчүн модератор же болбосо өнөктөш программасынын катышуучусу болушуңуз керек.',
          showConfirmButton: false,
          timer: 7000,
          timerProgressBar: true,
          padding: '1rem',
      });
    });


  $(function() {
  $(".w-10012").click(
    function() {
      var title = $(this).attr('data-title');
      var id2 = $(this).attr('data-id2');

      $(".var_title").text(title);     
      $("#delet").attr('action', id2);
    })
});
</script>

<script type="text/javascript">
    $("#select1").on('change',function(){
        var value=$(this).val();
        if(value=="1")
        {
            $(".select001").remove();
            $("#select001").append('<select name="value02" class="form-control select001" required=""><option value="" disabled="true" selected="true">Тандаңыз</option>@foreach ($variant_vyplaty1 as $variant)<option value="{{$variant->id}}">{{$variant->variant}}</option>@endforeach</select><div class="invalid-feedback select001">Сөзсүз тандоо керек!</div>');
            $(".for_num0001").show();
            $(".for_num0002").hide();
            $(".for_num0003").hide();
            $('#name01').prop('required', true);
            $('#name02').prop('required', false);
            $('#name03').prop('required', false);
            $('#name02').val('');
            $('#name03').val('');
        }
        else if(value=="2")
        {
            $(".select001").remove();
            $("#select001").append('<select name="value02" class="form-control select001" required=""><option value="" disabled="true" selected="true">Тандаңыз</option>@foreach ($variant_vyplaty2 as $variant)<option value="{{$variant->id}}">{{$variant->variant}}</option>@endforeach</select><div class="invalid-feedback select001">Сөзсүз тандоо керек!</div>');
            $(".for_num0001").hide();
            $(".for_num0002").show();
            $(".for_num0003").hide();
            $('#name01').prop('required', false);
            $('#name02').prop('required', true);
            $('#name03').prop('required', false);
            $('#name01').val('');
            $('#name03').val('');
        }
        else if(value=="3")
        {
            $(".select001").remove();
            $("#select001").append('<select name="value02" class="form-control select001" required=""><option value="" disabled="true" selected="true">Тандаңыз</option>@foreach ($variant_vyplaty3 as $variant)<option value="{{$variant->id}}">{{$variant->variant}}</option>@endforeach</select><div class="invalid-feedback select001">Сөзсүз тандоо керек!</div>');
            $(".for_num0001").hide();
            $(".for_num0002").hide();
            $(".for_num0003").show();
            $('#name01').prop('required', false);
            $('#name02').prop('required', false);
            $('#name03').prop('required', true);
            $('#name01').val('');
            $('#name02').val('');
        }
    });
    $(".for_num0001").hide();
    $(".for_num0002").hide();
    $(".for_num0003").hide();
</script> 
@endsection