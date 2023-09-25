@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">
.img-svg path{
        fill: #d3d7df;
    }
    .img-svg {
        width: 35px;
    height: 35px;
    }
.required span:after {
    color: #e32;
    content: ' *';
    display:inline;
}


</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col" >
              <h5 class="pt-3 mb-1">Курс: {{$podcategory->title}}</h5>
            </div>
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
                            <?php
                                $srok1 = $kupit->srok_dostupa - (time() - $kupit->time);
                                $god1 = floor($srok1 / 31536000);
                                $mounth1 = floor(($srok1 - $god1 * 31536000) / 2592000);
                                $day1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                                $hour1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                                $minute1 = floor(($srok1 - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                            ?> 
            <div class="row">
                <div class="col-md-9">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row align-items-top">
                                <div class="col-md-6">
                                    <div class="user-block">
                                        <img class="img-svg direct-chat-img" src="https://nonsi.kg/public/files/icons/user.svg">
                                        <span class="username">
                                          <a href="#">{{$kupit->user_name}}</a>
                                        </span>
                                        <span class="description">Сатып алды: {{$kupit['created_at']->format('d.m.Y')}} / {{$kupit['created_at']->format('H:i')}}</span>
                                    </div>
                                </div>  
                                <div class="col-md-6 user-block">
                                    <span class="float-right description" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-content="
                                    @if($kupit->srok_dostupa == 0)
                                        түбөлүк
                                    @else
                                        @if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0) дагы 
                                            @if($god1 > 0){{$god1}}ж.@endif 
                                            @if($mounth1 > 0){{$mounth1}}ай @endif 
                                            @if($day1 > 0){{$day1}} к.@endif 
                                            @if($hour1 > 0){{$hour1}} с.@endif 
                                            @if($minute1 > 0){{$minute1}} мин.@endif 
                                        @else
                                            убакыт бүттү 
                                        @endif
                                    @endif"><i class="far fa-clock pr-2"></i>Доступ: @if($kupit->srok_dostupa == 0) 
                                            түбөлүк 
                                        @else
                                            @if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0)
                                                @if($god1 > 0)дагы {{$god1}} ж. ...
                                                @else
                                                    @if($mounth1 > 0)дагы {{$mounth1}} ай ...
                                                    @else
                                                        @if($day1 > 0)дагы {{$day1}} к. ...
                                                        @else
                                                            @if($hour1 > 0)дагы {{$hour1}} с. ...
                                                            @else
                                                                @if($minute1 > 0)дагы {{$minute1}} мин. ...
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @else
                                             убакыт бүттү
                                            @endif
                                        @endif</span>
                                </div>                        
                            </div>
                              
                        </div>
                    </div>
                    <p class="mt-4 mb-1"></p>
                    <div class="row mt-2 align-items-center">
                            <div class="col-auto"><p class="mt-1 mb-3"><b>Сабактар</b> ({{$kol}})</p></div>
                        @if($podcategory->col_modulei > 1)
                            <div class="col"><hr class="mt-2 mb-3"></div>
                            <div class="col-auto"><p class="mt-1 mb-3">{{$podcategory->col_modulei}} модуль</div>
                        @endif
                    </div>
                    @if($podcategory->col_modulei > 1)
                    <p class="mt-1 mb-3 text-center">
                        @if($podcategory->otuu_ykmasy == 0) Бардык модулдар автоматтык түрдө ачылат. @endif
                        @if($podcategory->otuu_ykmasy == 1) Бардык модулдар сиздин уруксатыңыз менен ачылат. @endif
                        @if($podcategory->otuu_ykmasy == 2) 1-модуль автоматтык түрдө, ал эми калганы сиздин уруксатыңыз менен ачылат. @endif
                        @if($podcategory->otuu_ykmasy == 3) 1-модуль автоматтык түрдө, ал эми калганы  {{$podcategory->procent_perehoda}}% ашканда ачылат. @endif
                    </p>
                    @endif
                    <div class="row">
                    <div class="col-12" id="accordion">
                        @foreach ($uroky as $urok)
                                        <?php
                                            $progress1 = $progress->where('user_id', $kupit->user_id)->where('urok_id', $urok->id)->where('kupit_id', $kupit->id)->first();

                                            if ($urok->test_id != null){
                                                $test1 = $test->where('id', $urok->test_id)->first();
                                                $test_controls1 = $test_controls->where('user_id', $kupit->user_id)->where('test_id', $urok->test_id)->first();
                                            }else{
                                                $test1 = null;
                                                $test_controls1 = null;
                                            }
                                            $zadanie1 = $zadanie->where('urok_id', $urok->id)->first();
                                            if ($zadanie1 != null) {
                                                $zadanie_otvety1 = $zadanie_otvety->where('user_id', $kupit->user_id)->where('urok_id', $urok->id)->where('kupit_id', $kupit->id)->where('zadanie_id', $zadanie1->id)->first();
                                            }
                                            $summa_ballov2 = $summa_ballov->where('test_id', $urok->test_id)->sum('ball');
                                            $i = 0;
                                            $count_modul_artky = $uroky->where('modul_number', '<', $urok->modul_number)->count();
                                        ?>
                        @if($podcategory->col_modulei > 1)
                            @if($loop->iteration == ($count_modul_artky + 1))
                                <div class="row mt-5 align-items-center">
                                    <div class="col"><hr class="mt-1 mb-3"></div>
                                    <div class="col-auto">
                                      <p class="mt-1 mb-3 text-muted"><b>{{$urok->modul_number}}-модуль</b></p>
                                    </div>
                                    <div class="col"><hr class="mt-1 mb-3"></div>
                                    <div class="col-auto">
                                        @if($podcategory->otuu_ykmasy == 0)
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <p class="mt-1 mb-3 text-muted">Доступ:</p>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-group mb-2">
                                                        <div class="custom-control custom-switch">
                                                            <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$urok->id}}" class="custom-control-input" id="customSwitch0{{$urok->id}}" style="cursor: pointer;" checked="" disabled="">
                                                            <label class="custom-control-label swalDefaultSuccess3"  style="cursor: pointer;" for="customSwitch0{{$urok->id}}" ></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($podcategory->otuu_ykmasy == 1)
                                                                @php
                                                                    $kupit_dostupnye_moduly_array = explode(',', $kupit->dostupnye_moduly);
                                                                    foreach ($kupit_dostupnye_moduly_array as $kupit_dostupnye_moduly_arra){
                                                                        $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                                                        if (intval($kupit_dostupnye_moduly_arra) == $urok->modul_number) {
                                                                            break;
                                                                            $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                                                        }
                                                                    }
                                                                @endphp
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <p class="mt-1 mb-3 text-muted">Доступ:</p>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-group mb-2">
                                                        <div class="custom-control custom-switch">
                                                          @if($kupit_dostupnye_moduly_array1 == $urok->modul_number)
                                                                    <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$urok->id}}" class="custom-control-input" id="customSwitch0{{$urok->id}}" style="cursor: pointer;" checked="">
                                                                @else
                                                                    <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$urok->id}}" class="custom-control-input" id="customSwitch0{{$urok->id}}" style="cursor: pointer;">
                                                                @endif
                                                          <label class="custom-control-label swalDefaultSuccess"  style="cursor: pointer;" for="customSwitch0{{$urok->id}}" data-id="{{$urok->id}}" data-id1="{{$kupit->id}}" data-id2="{{$urok->modul_number}}"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif 
                                        @if($podcategory->otuu_ykmasy == 2)
                                            @if($urok->modul_number != 1)
                                                                @php
                                                                    $kupit_dostupnye_moduly_array = explode(',', $kupit->dostupnye_moduly);
                                                                    foreach ($kupit_dostupnye_moduly_array as $kupit_dostupnye_moduly_arra){
                                                                        $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                                                        if (intval($kupit_dostupnye_moduly_arra) == $urok->modul_number) {
                                                                            break;
                                                                            $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                                                        }
                                                                    }
                                                                @endphp
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <p class="mt-1 mb-3 text-muted">Доступ:</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="form-group mb-2">
                                                            <div class="custom-control custom-switch">
                                                                @if($kupit_dostupnye_moduly_array1 == $urok->modul_number)
                                                                    <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$urok->id}}" class="custom-control-input" id="customSwitch0{{$urok->id}}" style="cursor: pointer;" checked="">
                                                                @else
                                                                    <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$urok->id}}" class="custom-control-input" id="customSwitch0{{$urok->id}}" style="cursor: pointer;">
                                                                @endif
                                                                <label class="custom-control-label swalDefaultSuccess"  style="cursor: pointer;" for="customSwitch0{{$urok->id}}" data-id="{{$urok->id}}" data-id1="{{$kupit->id}}" data-id2="{{$urok->modul_number}}"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <p class="mt-1 mb-3 text-muted">Доступ:</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="form-group mb-2">
                                                            <div class="custom-control custom-switch">
                                                                <input data-id="{{$urok->id}}" type="checkbox" name="checkbox_name_{{$urok->id}}" class="custom-control-input" id="customSwitch0{{$urok->id}}" style="cursor: pointer;" checked="" disabled="">
                                                                <label class="custom-control-label swalDefaultSuccess2"  style="cursor: pointer;" for="customSwitch0{{$urok->id}}" ></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif 
                                        @endif 
                                    </div>
                                </div>
                            @endif 
                        @endif          
                        <div class="card card-info card-outline">
                                <div class="card-header pr-2 pl-2" data-toggle="collapse" href="#collapse{{ $loop->iteration }}" type="button">
                                    <div class="row align-items-center">
                                        <div class="col"><p class="card-title">{{$urok->title}}</p></div>
                                        <div class="col-auto">
                                            @if($progress1)
                                                @if($test1)
                                                    @if($test_controls1)
                                                        @if($zadanie1)
                                                            @if($zadanie_otvety1 != null)
                                                                @if($progress1->status_vypol_zadanii == 2)
                                                                    <i class="far fa-check-circle pr-2" style="color: #28a745;" title="ачты, тест тапшырылды, тапшырма туура аткарылды"></i>
                                                                @endif
                                                                @if($progress1->status_vypol_zadanii == 4)
                                                                    <span title="ачты, тест тапшырылды, тапшырма туура эмес аткарылды" hidden="">ачты, тест тапшырылды, тапшырма туура эмес аткарылды</span>
                                                                    <span title="ачты, тест тапшырылды, тапшырма туура эмес аткарылды">
                                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                        <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i> 
                                                                        <i class="fas fa-laptop-house pr-2" style="color: red;"></i>
                                                                    </span>
                                                                @endif
                                                                @if($progress1->status_vypol_zadanii == 0)
                                                                    <span title="ачты, тест тапшырылды, тапшырма текшериле элек" hidden="">ачты, тест тапшырылды, тапшырма текшериле элек</span>
                                                                    <span title="ачты, тест тапшырылды, тапшырма текшериле элек">
                                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                        <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i> 
                                                                        <i class="fas fa-laptop-house pr-2" style="color: blue;"></i>
                                                                    </span>
                                                                @endif
                                                            @else
                                                                <span title="ачты, тест тапшырылды, тапшырма аткарылган жок" hidden="">ачты, тест тапшырылды, тапшырма аткарылган жок</span>
                                                                <span title="ачты, тест тапшырылды, тапшырма аткарылган жок">
                                                                    <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                    <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i> 
                                                                    <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>
                                                                </span>
                                                            @endif
                                                        @else
                                                            <span title="ачты, тест тапшырылды" hidden="">ачты, тест тапшырылды</span>
                                                            <span title="ачты, тест тапшырылды">
                                                                <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                <i class="fas fa-spell-check pr-2" style="color: #28a745;"></i>   
                                                            </span>  
                                                        @endif
                                                    @else
                                                        @if($zadanie1 != null)
                                                            @if($zadanie_otvety1 != null)
                                                                @if($progress1->status_vypol_zadanii == 2)
                                                                    <span title="ачты, тест тапшырылган жок, тапшырма туура аткарылды" hidden="">ачты, тест тапшырылган жок, тапшырма туура аткарылды</span>
                                                                    <span title="ачты, тест тапшырылган жок, тапшырма туура аткарылды">
                                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                        <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                                        <i class="fas fa-laptop-house pr-2" style="color: #28a745;"></i>
                                                                    </span>
                                                                @endif
                                                                @if($progress1->status_vypol_zadanii == 4)
                                                                    <span title="ачты, тест тапшырылган жок, тапшырма туура эмес аткарылды" hidden="">ачты, тест тапшырылган жок, тапшырма туура эмес аткарылды</span>
                                                                    <span title="ачты, тест тапшырылган жок, тапшырма туура эмес аткарылды">
                                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                        <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                                        <i class="fas fa-laptop-house pr-2" style="color: red;"></i>
                                                                    </span>
                                                                @endif
                                                                @if($progress1->status_vypol_zadanii == 0)
                                                                    <span title="ачты, тест тапшырылган жок, тапшырма текшериле элек" hidden="">ачты, тест тапшырылган жок, тапшырма текшериле элек</span>
                                                                    <span title="ачты, тест тапшырылган жок, тапшырма текшериле элек">
                                                                        <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                        <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                                        <i class="fas fa-laptop-house pr-2" style="color: blue;"></i>
                                                                    </span>
                                                                @endif
                                                            @else
                                                                <span title="ачты, тест тапшырылган жок, тапшырма аткарылган жок" hidden="">ачты, тест тапшырылган жок, тапшырма аткарылган жок</span>
                                                                <span title="ачты, тест тапшырылган жок, тапшырма аткарылган жок">
                                                                    <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                                    <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>   
                                                                </span>                            
                                                            @endif
                                                        @else
                                                            <span title="ачты, тест тапшырылган жок" hidden="">ачты, тест тапшырылган жок</span>
                                                            <span title="ачты, тест тапшырылган жок">
                                                                <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>   
                                                            </span>  
                                                        @endif
                                                    @endif
                                                @else
                                                    @if($zadanie1)
                                                        @if($zadanie_otvety1)
                                                            @if($progress1->status_vypol_zadanii == 2)
                                                                <i class="far fa-check-circle pr-2" style="color: #28a745;" title="ачты, тапшырма туура аткарылды"></i>
                                                            @endif
                                                            @if($progress1->status_vypol_zadanii == 4)
                                                                <span title="ачты, тапшырма туура эмес аткарылды" hidden="">ачты, тапшырма туура эмес аткарылды</span>
                                                                <span title="ачты, тапшырма туура эмес аткарылды">
                                                                    <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                    <i class="fas fa-laptop-house pr-2" style="color: red;"></i>
                                                                </span>
                                                            @endif
                                                            @if($progress1->status_vypol_zadanii == 0)
                                                                <span title="ачты, тапшырма текшериле элек" hidden="">ачты, тапшырма текшериле элек</span> 
                                                                <span title="ачты, тапшырма текшериле элек">
                                                                    <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                    <i class="fas fa-laptop-house pr-2" style="color: blue;"></i>
                                                                </span> 
                                                            @endif
                                                        @else
                                                            <span title="ачты, тапшырма аткарылган жок" hidden="">ачты, тапшырма аткарылган жок</span>
                                                            <span title="ачты, тапшырма аткарылган жок">
                                                                <i class="far fa-eye pr-2" style="color: #28a745;"></i>
                                                                <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span title="ачты, тест тапшырылган жок" hidden="">ачты</span>
                                                        <span title="ачты">
                                                            <i class="far fa-eye pr-2" style="color: #28a745;"></i>  
                                                        </span>
                                                    @endif
                                                @endif
                                            @else
                                                <i class="far fa-eye pr-2" style="color: #adb5bd;" title="ача элек"></i>
                                                @if($test1 != null)
                                                    <i class="fas fa-spell-check pr-2" style="color: #adb5bd;"></i>
                                                @endif
                                                @if($zadanie1 != null)
                                                    <i class="fas fa-laptop-house pr-2" style="color: #adb5bd;"></i>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div id="collapse{{ $loop->iteration }}" class="collapse @if($loop->iteration == 1) show @endif" data-parent="#accordion">
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="col-auto">
                                                    <div class="user-block text-right">
                                                        <span class="mt-2 mb-2 description"><i class="far fa-eye pr-2" style="color: #adb5bd;"></i>@if($progress1 != null)Ачылды: {{$progress1['updated_at']->format('d.m.Y')}} / {{$progress1['updated_at']->format('H:i')}} @else Бул сабакты ача элек @endif</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">

                                        @if($test1 != null)
                                        <p class="mb-1 text-muted"><b>Тест:</b></p>
                                            @if($test_controls1 != null)
                                                @foreach ($test_controls->where('user_id', $kupit->user_id)->where('test_id', $urok->test_id) as $user_result)
                                                  <div class="border" style="border-radius: 4px;">
                                                      <div class="card-body pb-2 pt-2 pr-2 pl-2 class11">
                                                          <div class="row align-items-center">
                                                              <div class="col-md-6">
                                                                  <div class="row align-items-center">
                                                                      <div class="col-auto">
                                                                          <div class="row align-items-center">
                                                                              <div class="col-auto">
                                                                                  <i class="far fa-clock"></i>
                                                                              </div>
                                                                              <div class="col">
                                                                                  <div class="user-block1">
                                                                                      <span class="username1 ml-0 d-inline-block">{{$user_result['updated_at']->format('d.m.Y')}}</span>
                                                                                      <span class="description1 ml-0">{{$user_result['updated_at']->format('H:i')}}</span>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="col text-right">
                                                                          <span class="">Балл: @if($summa_ballov2 / $user_result->kol_voprosov >= 1 ){{$user_result->kol_ballov_usera}} @else {{$user_result->kol_voprosov}} @endif</span>
                                                                          
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="row align-items-center">
                                                                      <div class="col text-center">
                                                                          <span class="description1 ml-0">Туура жооптордун саны: {{$user_result->kol_pravilnyh_otvetov}} <small class="text-muted">/ {{$user_result->kol_voprosov}}</small></span>
                                                                      </div>
                                                                      <div class="col-auto text-right">
                                                                          <span class="float-right rrttrr"><b>{{round(($user_result->kol_ballov_usera * 100) / $user_result->test_summa_ballov)}} %</b></span>
                                                                      </div>
                                                                  </div>
                                                              </div>                                                        
                                                          </div>
                                                      </div>
                                                  </div>
                                                @endforeach
                                            @else
                                                <small>Азырнча тестти тапшыра элек</small>
                                            @endif
                                            @if($zadanie1 != null)
                                            <hr class="mt-5 mb-5">
                                            @endif
                                        @endif

                                        @if($zadanie1 != null)
                                            @if($zadanie_otvety1 != null)
                                                <div class="row align-items-center mb-1">
                                                    <div class="col">
                                                        <p class="m-0"><b class="text-muted">Тапшырма: <small>(жөнөткөн датасы: {{$zadanie_otvety1['created_at']->format('d.m.Y')}} / {{$zadanie_otvety1['created_at']->format('H:i')}})</small></b></p>
                                                    </div>
                                                    <div class="col-auto">
                                                        @if($zadanie_otvety1->file != null)
                                                        <a class="btn btn-default btn-block btn-tool pt-1 pb-1 pl-3 pr-3" href="{{ route('kurs_zadanie_otvet_download', $zadanie_otvety1->id) }}"><i class="fas fa-download pr-2"></i> Файлды жүктөө (тапшырма)</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @php
                                                    $text = $zadanie_otvety1->text;
                                                    $text = preg_replace('/\b(https?:\/\/[\S]+)/si', '<a target="_blank"  href="$1">$1</a>', $text);
                                                @endphp
                                                <p class="mb-0 mt-3">{!!$text!!}</p>
                                                <div class="row">
                                                    @foreach ($zadanie_otvety_imgs->where('zadanie_otveties_id', $zadanie_otvety1->id) as $zadanie_otvety_img)
                                                    <div class="col-12 mt-2">
                                                        <img class="border shadow-sm" src="https://nonsi.kg/public/storage/kursy/zadanie/images/otvety/{{$zadanie_otvety_img->img}}" style="border-radius: 4px; width: 100%;"> 
                                                    </div>   
                                                    @endforeach                                                 
                                                </div>
                                                <p class="mt-4 mb-1 "><b class="text-muted">Сиздин комментарий: @if($progress1->status_vypol_zadanii != 0)<small>({{$zadanie_otvety1['updated_at']->format('d.m.Y')}} / {{$zadanie_otvety1['updated_at']->format('H:i')}})</small>@endif</b></p>

                                                @if($kupit->srok_dostupa == 0)
                                                    <form id="fileUploadForm" action="{{ route('kurs_zadanie_otvet_comment', ['zadanie_otvet_id'=>$zadanie_otvety1->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                                            @csrf
                                                            @method('PUT')
                                                            <div class=" mb-3">
                                                                <textarea name="text" class="form-control" rows="3" placeholder="Комментарий">{!!$zadanie_otvety1->comment!!}</textarea>
                                                            </div>
                                                            <div class="form-row form-group pt-0 pb-0 mb-0">
                                                                <div class="form-group col-9 mb-0 required">
                                                                    <span class="text-muted">Cтатус</span>
                                                                    <select name="status" id="select{{ $loop->iteration }}" class="form-control" required="">
                                                                        <option value="" disabled="true"  @if($progress1->status_vypol_zadanii == 0) selected @endif>Тандаңыз</option>
                                                                        <option value="1" hidden="" @if($progress1->status_vypol_zadanii == 1) selected @endif>Текшерүү кандайдыр бир убакытты талап кылат, жоопту күтө туруңуз</option>
                                                                        <option value="2" @if($progress1->status_vypol_zadanii == 2) selected @endif>Туура</option>
                                                                        <option value="3" hidden="" @if($progress1->status_vypol_zadanii == 3) selected @endif>Кааласаңыз дагы бир жолу тапшырманы жөнөтө аласыз</option>
                                                                        <option value="4" @if($progress1->status_vypol_zadanii == 4) selected @endif>Туура эмес, кайра жөнөтүңүз!</option>
                                                                    </select>   
                                                                </div>
                                                                <div class="form-group col-3 mb-0 required">
                                                                    <span class="text-muted">Балл <small>(max:{{$zadanie1->ball}})</small></span>
                                                                    <select name="ball" id="select0{{ $loop->iteration }}" class="form-control" required="">
                                                                        @php
                                                                            $iter = $loop->iteration;
                                                                        @endphp
                                                                        @if($progress1->status_vypol_zadanii == 0)
                                                                            <option value="" class="select00{{ $loop->iteration }}" disabled="true"  selected="true">Тандаңыз</option>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 1)
                                                                            <option value="aaa" class="select00{{ $loop->iteration }}" disabled="true"  selected="true"></option>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 4)
                                                                            <option value="0" class="select00{{ $loop->iteration }}" disabled="true"  selected="true">0</option>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 2)
                                                                            <option value="" class="select00{{$iter}}" disabled="true" @if($zadanie_otvety1->ball == null) selected @endif>Тандаңыз</option>
                                                                            @for ($i = -1; $i < $zadanie1->ball; $i++)
                                                                                <option class="select00{{$iter}}" @if($zadanie_otvety1->ball == $i + 1) selected @endif value="{{$i + 1}}">{{$i + 1}}</option>
                                                                            @endfor
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 3)
                                                                            <option value="" class="select00{{$iter}}" disabled="true" @if($zadanie_otvety1->ball == null) selected @endif>Тандаңыз</option>
                                                                            @for ($i = -1; $i < $zadanie1->ball; $i++)
                                                                                <option class="select00{{$iter}}" @if($zadanie_otvety1->ball == $i + 1) selected @endif value="{{$i + 1}}">{{$i + 1}}</option>
                                                                            @endfor
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 mb-3 text-right">
                                                                <button class="btn btn-default btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit">@if($progress1->status_vypol_zadanii != 0) Өзгөртүү @else Жөнөтүү @endif</button>
                                                            </div>
                                                        </form>
                                                @else
                                                    @if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0)
                                                        <form id="fileUploadForm" action="{{ route('kurs_zadanie_otvet_comment', ['zadanie_otvet_id'=>$zadanie_otvety1->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                                            @csrf
                                                            @method('PUT')
                                                            <div class=" mb-3">
                                                                <textarea name="text" class="form-control" rows="3" placeholder="Комментарий">{!!$zadanie_otvety1->comment!!}</textarea>
                                                            </div>
                                                            <div class="form-row form-group pt-0 pb-0 mb-0">
                                                                <div class="form-group col-9 mb-0 required">
                                                                    <span class="text-muted">Cтатус</span>
                                                                    <select name="status" id="select{{ $loop->iteration }}" class="form-control" required="">
                                                                        <option value="" disabled="true"  @if($progress1->status_vypol_zadanii == 0) selected @endif>Тандаңыз</option>
                                                                        <option value="1" hidden="" @if($progress1->status_vypol_zadanii == 1) selected @endif>Текшерүү кандайдыр бир убакытты талап кылат, жоопту күтө туруңуз</option>
                                                                        <option value="2" @if($progress1->status_vypol_zadanii == 2) selected @endif>Туура</option>
                                                                        <option value="3" hidden="" @if($progress1->status_vypol_zadanii == 3) selected @endif>Кааласаңыз дагы бир жолу тапшырманы жөнөтө аласыз</option>
                                                                        <option value="4" @if($progress1->status_vypol_zadanii == 4) selected @endif>Туура эмес, кайра жөнөтүңүз!</option>
                                                                    </select>   
                                                                </div>
                                                                <div class="form-group col-3 mb-0 required">
                                                                    <span class="text-muted">Балл <small>(max:{{$zadanie1->ball}})</small></span>
                                                                    <select name="ball" id="select0{{ $loop->iteration }}" class="form-control" required="">
                                                                        @php
                                                                            $iter = $loop->iteration;
                                                                        @endphp
                                                                        @if($progress1->status_vypol_zadanii == 0)
                                                                            <option value="" class="select00{{ $loop->iteration }}" disabled="true"  selected="true">Тандаңыз</option>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 1)
                                                                            <option value="aaa" class="select00{{ $loop->iteration }}" disabled="true"  selected="true"></option>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 4)
                                                                            <option value="0" class="select00{{ $loop->iteration }}" disabled="true"  selected="true">0</option>
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 2)
                                                                            <option value="" class="select00{{$iter}}" disabled="true" @if($zadanie_otvety1->ball == null) selected @endif>Тандаңыз</option>
                                                                            @for ($i = -1; $i < $zadanie1->ball; $i++)
                                                                                <option class="select00{{$iter}}" @if($zadanie_otvety1->ball == $i + 1) selected @endif value="{{$i + 1}}">{{$i + 1}}</option>
                                                                            @endfor
                                                                        @endif
                                                                        @if($progress1->status_vypol_zadanii == 3)
                                                                            <option value="" class="select00{{$iter}}" disabled="true" @if($zadanie_otvety1->ball == null) selected @endif>Тандаңыз</option>
                                                                            @for ($i = -1; $i < $zadanie1->ball; $i++)
                                                                                <option class="select00{{$iter}}" @if($zadanie_otvety1->ball == $i + 1) selected @endif value="{{$i + 1}}">{{$i + 1}}</option>
                                                                            @endfor
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 mb-3 text-right">
                                                                <button class="btn btn-default btn-tool mt-2 pt-2 pb-2 pl-4 pr-4" type="submit">@if($progress1->status_vypol_zadanii != 0) Өзгөртүү @else Жөнөтүү @endif</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class=" mb-3">
                                                            <textarea name="text" class="form-control" rows="3" placeholder="Комментарий" disabled="">{!!$zadanie_otvety1->comment!!}</textarea>
                                                        </div>
                                                        <div class="form-row form-group pt-0 pb-0 mb-0">
                                                            <div class="form-group col-9 mb-0 required">
                                                                <span class="text-muted">Cтатус</span>
                                                                <select name="status" id="select{{ $loop->iteration }}" class="form-control" required="" disabled="">
                                                                  <option value="" disabled="true"  @if($progress1->status_vypol_zadanii == 0) selected @endif>Тандаңыз</option>
                                                                        <option value="1" hidden="" @if($progress1->status_vypol_zadanii == 1) selected @endif>Текшерүү кандайдыр бир убакытты талап кылат, жоопту күтө туруңуз</option>
                                                                        <option value="2" @if($progress1->status_vypol_zadanii == 2) selected @endif>Туура</option>
                                                                        <option value="3" hidden="" @if($progress1->status_vypol_zadanii == 3) selected @endif>Кааласаңыз дагы бир жолу тапшырманы жөнөтө аласыз</option>
                                                                        <option value="4" @if($progress1->status_vypol_zadanii == 4) selected @endif>Туура эмес, кайра жөнөтүңүз!</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-3 mb-0 required">
                                                                <span class="text-muted">Балл <small>(max:{{$zadanie1->ball}})</small></span>
                                                                <select name="ball" id="select0{{ $loop->iteration }}" class="form-control" required="" disabled="">
                                                                    @php
                                                                        $iter = $loop->iteration;
                                                                    @endphp
                                                                    @if($progress1->status_vypol_zadanii == 0)
                                                                        <option value="" class="select00{{ $loop->iteration }}" disabled="true"  selected="true">Тандаңыз</option>
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 1)
                                                                        <option value="aaa" class="select00{{ $loop->iteration }}" disabled="true"  selected="true"></option>
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 4)
                                                                        <option value="0" class="select00{{ $loop->iteration }}" disabled="true"  selected="true">0</option>
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 2)
                                                                        <option value="" class="select00{{$iter}}" disabled="true" @if($zadanie_otvety1->ball == null) selected @endif>Тандаңыз</option>
                                                                        @for ($i = -1; $i < $zadanie1->ball; $i++)
                                                                            <option class="select00{{$iter}}" @if($zadanie_otvety1->ball == $i + 1) selected @endif value="{{$i + 1}}">{{$i + 1}}</option>
                                                                        @endfor
                                                                    @endif
                                                                    @if($progress1->status_vypol_zadanii == 3)
                                                                        <option value="" class="select00{{$iter}}" disabled="true" @if($zadanie_otvety1->ball == null) selected @endif>Тандаңыз</option>
                                                                        @for ($i = -1; $i < $zadanie1->ball; $i++)
                                                                            <option class="select00{{$iter}}" @if($zadanie_otvety1->ball == $i + 1) selected @endif value="{{$i + 1}}">{{$i + 1}}</option>
                                                                        @endfor
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif


                                                
                                                
                                                <script type="text/javascript">
                                                    var options="";
                                                    $("#select"+'{{ $loop->iteration }}').on('change',function(){
                                                        var value=$(this).val();
                                                        if(value=="1")
                                                        {
                                                             options='<option value="aaa" class="select00{{ $loop->iteration }}" selected="true"></option>';
                                                            $("#select0"+'{{ $loop->iteration }}').html(options);
                                                        }
                                                        else if(value=="2")
                                                        {
                                                            var num = {{$zadanie1->ball}} + 1;
                                                            $(".select00"+'{{ $loop->iteration }}').remove();
                                                            $("#select0"+'{{ $loop->iteration }}').append('<option value="" class="select00{{ $loop->iteration }}" disabled="true" >Тандаңыз</option>');
                                                            for(i = 1; i < num; i++) {
                                                                $("#select0"+'{{ $loop->iteration }}').append('<option class="select00{{ $loop->iteration }}"  value="'+i+'">'+i+'</option>');
                                                            };
                                                            document.querySelector("#select0"+'{{ $loop->iteration }}').selectedIndex = document.querySelector("#select0"+'{{ $loop->iteration }}').length - 1;
                                                        }
                                                        else if(value=="3")
                                                        {
                                                            var num = {{$zadanie1->ball}} + 1;
                                                            $(".select00"+'{{ $loop->iteration }}').remove();
                                                            $("#select0"+'{{ $loop->iteration }}').append('<option value="" class="select00{{ $loop->iteration }}" disabled="true"  selected="true">Тандаңыз</option>');
                                                            for(i = 0; i < num; i++) {
                                                                $("#select0"+'{{ $loop->iteration }}').append('<option class="select00{{ $loop->iteration }}" value="'+i+'">'+i+'</option>');
                                                            }
                                                        }
                                                        else if(value=="4")
                                                        {
                                                            options='<option value="0" class="select00{{ $loop->iteration }}" selected="true">0</option>';
                                                            $("#select0"+'{{ $loop->iteration }}').html(options);
                                                        }
                                                    });
                                                </script>   
                                            @else
                                                <p class="m-0"><b class="text-muted">Тапшырма:</b></p>
                                                @if($kupit->srok_dostupa == 0)
                                                    <small>Азырынча тапшырманы жөнөтө элек</small>
                                                @else
                                                    @if(($kupit->srok_dostupa - (time() - $kupit->time)) > 0)
                                                        <small>Азырынча тапшырманы жөнөтө элек</small>
                                                    @else
                                                        <small>Тапшырманы жөнөтүүгө жетишкен жок</small>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-3 for_skryt">
                    <div class="sticky-top mb-3">

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row --> 
            
        </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Тема урока<span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-0">Статус урока <span class="float-right"><span class="var_title6"></span></span></p><hr class="mt-1">
                      <p class="mb-0">Количество видеофайлов <span class="float-right var_title2"></span></p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Нет, не удалять</button>
                        <form method="POST" id="delet"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Да, удалить
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->



<script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>

  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>


<script>

//для модального окна удаления
$(function() {
  $(".for_modal_delete").click(
    function() {
      var kol = $(this).attr('data-kol');
      var title = $(this).attr('data-title');
      var price = $(this).attr('data-price');
      var id2 = $(this).attr('data-id2');


      $(".var_title").text(title);
      $(".var_title2").text(kol);
      $(".var_title6").text(price);
      $("#delet").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});
//для модального окна удаления

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$('img.img-svg').each(function(){
  var $img = $(this);
  var imgClass = $img.attr('class');
  var imgURL = $img.attr('src');
  $.get(imgURL, function(data) {
    var $svg = $(data).find('svg');
    if(typeof imgClass !== 'undefined') {
      $svg = $svg.attr('class', imgClass+' replaced-svg');
    }
    $svg = $svg.removeAttr('xmlns:a');
    if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
      $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
    }
    $img.replaceWith($svg);
  }, 'xml');
});


$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $(document).ready(function(){
      $('.swalDefaultSuccess').click(function() {
        var countryID1 = $(this).attr('data-id1');
        var countryID2 = $(this).attr('data-id2');
        if(countryID1)
        {
          jQuery.ajax({
              url : '/moderator_panel/kursy/moderator_kurs_dostijenie_studentov2_dostupnye_moduly_plus/' +countryID1 +'/' +countryID2,
              type : "GET",
              dataType : "json",
              success:function(data){Toast.fire({icon: 'success', title: 'Доступ өзгөртүлдү'});}
          });
        }else{}
        
      });
    });


    var Toast2 = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000
    });
    $('.swalDefaultSuccess2').click(function() {
        Toast2.fire({icon: 'success', title: '1-модуль автоматтык түрдө ачылган'});        
      });
    $('.swalDefaultSuccess3').click(function() {
        Toast2.fire({icon: 'success', title: 'Бардык модулдар автоматтык түрдө ачылган'});        
      });

  });
</script>


@endsection