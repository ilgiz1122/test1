@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')
<style type="text/css">


.strelki::-webkit-outer-spin-button,
.strelki::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }


   .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateX(-4px);
  }


.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}

.required p:after {
    color: #e32;
    content: ' *';
    display:inline;
}
.note-group-select-from-files {
  display: none;
}



.foto1 {
    position: relative;
    width: 100%;
}

.foto1 img {
    width: 100%;
    height: auto;
}

.foto1 .foto2 {
    position: absolute;
    top: 2px;
    left: -4px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    cursor: pointer;
    text-align: center;
}
input[type=radio]{
  opacity: 0;
  visablity: hidden;
}
.t-radio__indicator{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: white;
  padding: 3px 20px;
  border-radius: 4px;
  cursor: pointer;

}
input[type=radio]:checked + .t-radio__indicator{
  background: #17a2b8;
  color: white;
}

.countdown {
  display: inline-block;
}
.countdown-number {
  display: inline-block;
}
.countdown-time {
  display: inline-block;
}
.deadline-message{
  display: none;
}
.visible{
  display: block;
}
.hidden{
  display: none;
}

</style>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                </div>
            @endif

            <!--Окно для уведомлений (успушно добавлена) -->
        </div>
    </div>
    <!-- Тема -->



    
            
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                            <h5 class="mb-0">{{$tests->title}}</h5>
                                <div class="container-fluid mt-4 sticky-top">
                                    <div class="card">
                                        <div class="card-body pb-2 pt-2 pr-3 pl-3 class11">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-0"><i class="fas fa-question" style="color: tomato;"></i> - {{$tests->test_voprosy_count}}</p>
                                                </div>
                                                <div class="col-auto text-muted">
                                                    <p class="mb-0">max: @if($summa_ballov / $tests->test_voprosy_count >= 1 ){{$summa_ballov}} @else {{$tests->test_voprosy_count}} @endif балл</p>

                                                </div>
                                                <div class="col text-right">
                                                    <p class="mb-0"><i class="far fa-clock" style="color: tomato;"></i>
                                                        @if($tests->time > 3600)
                                                        <span id="countdown" class="countdown">
                                                          <span class="countdown-number"><span class="hours countdown-time"></span></span>:<span class="countdown-number"><span class="minutes countdown-time"></span></span>:<span class="countdown-number"><span class="seconds countdown-time"></span></span>
                                                        </span>
                                                        @else
                                                        <span id="countdown" class="countdown">
                                                          <span class="countdown-number"><span class="minutes countdown-time"></span></span>:<span class="countdown-number"><span class="seconds countdown-time"></span></span>
                                                        </span>
                                                        @endif
                                                        <span id="deadline-message" class="deadline-message">Убакыт бүттү!</span>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid pt-3 mt-4">
                                    <div class="form-group test_margin">
                                        <form id="test_form" action="{{ route('result_test', [$tests->id, $test_controls->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        @csrf
                                        <table class="table table-borderless mb-0" id="linksTable">
                                            <tbody class="connectedSortable">
                                                @foreach ($test_voprosy as $test_voprosy)
                                                <tr class="vopros_testa">
                                                    <td class="pt-2 pb-0 pr-0 pl-0">
                                                        <div class="card card-primary card-outline for_peremestit">
                                                            <div class="card-header pl-3 pr-2 pt-1 pb-1">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="mb-0"><span class="number">{{$loop->iteration}}</span>-суроо</p>
                                                                    </div>
                                                                    <div class="col text-right text-muted">
                                                                        <p class="mb-0">@if($summa_ballov / $tests->test_voprosy_count >= 1 ){{$test_voprosy->ball}} @else 1 @endif балл</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body pb-2 pt-2 pr-3 pl-3 class11">
                                                                @if($test_voprosy->text_voprosa != null)<p class="mb-0">{!!nl2br($test_voprosy->text_voprosa)!!}</p>@endif
                                                                @if($test_voprosy->img_voprosa != null)
                                                                <div class="foto1 for_foto1 mb-2 mt-2">
                                                                    <img class="mb-2 shadow-sm" src="{{asset('')}}/storage/testy/images/imgvoprosa/{{$test_voprosy->img_voprosa}}" alt="" style="width: 100%; border-radius: 4px;">
                                                                </div>
                                                                @endif
                                                                <span class="mt-2">
                                                                @foreach ($test_otvety->where('test_voprosy_id', $test_voprosy->id) as $variant)
                                                                    @if(intval(strcasecmp($variant->test_otvety, 'А')) == 0)
                                                                    @elseif(intval(strcasecmp($variant->test_otvety, 'Б')) == 0)
                                                                    @elseif(intval(strcasecmp($variant->test_otvety, 'В')) == 0)
                                                                    @elseif(intval(strcasecmp($variant->test_otvety, 'Г')) == 0)
                                                                    @elseif(intval(strcasecmp($variant->test_otvety, 'Д')) == 0)
                                                                    @else
                                                                    <p class="mb-0">
                                                                        @if($loop->iteration === 1)А) @endif
                                                                        @if($loop->iteration === 2)Б) @endif
                                                                        @if($loop->iteration === 3)В) @endif
                                                                        @if($loop->iteration === 4)Г) @endif
                                                                        @if($loop->iteration === 5)Д) @endif
                                                                        {{$variant->test_otvety}}</p>
                                                                    @endif
                                                                @endforeach
                                                                </span>
                                                            </div>
                                                            <div class="card-footer pb-2 pt-2 pr-3 pl-3">
                                                                <div class="row text-center">
                                                                    <?php
                                                                        $nomer = $loop->iteration;
                                                                    ?>
                                                                    <input type="number" name="vopros_{{$nomer}}" value="{{$test_voprosy->id}}" data-tilda-req="1" class="t-radio js-tilda-rule" hidden="">
                                                                        @foreach ($test_otvety->where('test_voprosy_id', $test_voprosy->id) as $variant)
                                                                        <div class="col p-0">
                                                                           <label class="t-radio__control mb-0  pr-0 pl-0">
                                                                                <input type="radio" name="otvet_{{$nomer}}[]" value="{{$variant->id}}" data-tilda-req="1" class="t-radio js-tilda-rule" hidden="">
                                                                                <p class="t-radio__indicator rrttrr mb-0 border">
                                                                                    @if($loop->iteration === 1)А@endif
                                                                                    @if($loop->iteration === 2)Б@endif
                                                                                    @if($loop->iteration === 3)В@endif
                                                                                    @if($loop->iteration === 4)Г@endif
                                                                                    @if($loop->iteration === 5)Д@endif
                                                                                </p>
                                                                            </label> 
                                                                        </div>
                                                                        @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" id="zavershit" class="btn btn-block btn-info">Бүтүрүү</button>
                                        </form>
                                        <p id="demo"></p>
                                    </div>
                                </div>

                    <div id="buttonID" style="cursor: pointer;"></div>
                            
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <p class="mb-0 text-center"><b>Ийгилик каалабыз!</b><br></p>
                            <p class="mb-0 text-muted text-center" style="line-height: 0.9em;"><small>(Белгиленген убакыт ичинде тестти тапшыруу керек.)</small></p>                            
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            

        </section><!-- /.content -->    



                            
                            



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).on('click', '#buttonID', function(){    
    Swal.fire({
      icon: 'error',
      title: '<h4 class="modal-title">Убакыт бүттү!</h4>',
      text: 'Жыйынтыкты күтө туруңуз',
      showConfirmButton: false,
      //timer: 3000,
      timerProgressBar: true,
      padding: '1rem',
  })
});

$(document).on('click', '#zavershit', function(){    
    form.submit();
});



if({{$tests->time}} > 3600){
    function getTimeRemaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      return {
        total: t,
        hours: hours,
        minutes: minutes,
        seconds: seconds
      };
    }

    function initializeClock(id, endtime) {
      var clock = document.getElementById(id);
      var hoursSpan = clock.querySelector(".hours");
      var minutesSpan = clock.querySelector(".minutes");
      var secondsSpan = clock.querySelector(".seconds");

      function updateClock() {
        var t = getTimeRemaining(endtime);

        if (t.total <= 0) {
            document.getElementById("buttonID").click();
            
          document.getElementById("countdown").className = "hidden";
          document.getElementById("deadline-message").className = "visible";
          clearInterval(timeinterval);
          
          return true;
        }

        hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
        minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
        secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }

    //var deadline = "January 01 2018 00:00:00 GMT+0300"; //for Ukraine
    var deadline = new Date(Date.parse(new Date()) + ({{$tests->time}} - 50) * 1000); // for endless timer
    initializeClock("countdown", deadline);
}
else{


    function getTimeRemaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      return {
        total: t,
        minutes: minutes,
        seconds: seconds
      };
    }

    function initializeClock(id, endtime) {
      var clock = document.getElementById(id);
      var minutesSpan = clock.querySelector(".minutes");
      var secondsSpan = clock.querySelector(".seconds");

      function updateClock() {
        var t = getTimeRemaining(endtime);

        if (t.total <= 0) {
            document.getElementById("buttonID").click();
            document.getElementById("zavershit").click();
            document.getElementById("zavershit").className = "hidden";
          document.getElementById("countdown").className = "hidden";
          document.getElementById("deadline-message").className = "visible";
          clearInterval(timeinterval);
          return true;
        }

        minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
        secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }

    //var deadline = "January 01 2018 00:00:00 GMT+0300"; //for Ukraine
    var deadline = new Date(Date.parse(new Date()) + ({{$tests->time}} - 50) * 1000); // for endless timer
    initializeClock("countdown", deadline);
}





function equalHeight(group) {
    var tallest = 0;
    group.each(function() {
        thisHeight = $(this).width();
        if(thisHeight > tallest) {
            tallest = thisHeight;
        }
    });
    group.width(tallest);
}
$(document).ready(function(){
    equalHeight($(".rrttrr"));
});   
</script>
@endsection
