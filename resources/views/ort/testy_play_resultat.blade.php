@extends('layouts.ort_layouts')

@section('title', 'Добавить тест')

@section('content')
    <style type="text/css">
        .strelki::-webkit-outer-spin-button,
        .strelki::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .truncate2 {

            white-space: nowrap;
            /* Текст не переносится */
            overflow: hidden;
            /* Обрезаем всё за пределами блока */
            text-overflow: ellipsis;
            /* Добавляем многоточие */
        }
        .unselectable {
  -webkit-touch-callout: none; /* iOS Safari */
  -webkit-user-select: none;   /* Chrome/Safari/Opera */
  -khtml-user-select: none;    /* Konqueror */
  -moz-user-select: none;      /* Firefox */
  -ms-user-select: none;       /* Internet Explorer/Edge */
  user-select: none;           /* Non-prefixed version, currently
                                  not supported by any browser */
}

        .two {
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
            display: inline;
        }

        .required p:after {
            color: #e32;
            content: ' *';
            display: inline;
        }

        .note-group-select-from-files {
            display: none;
        }

        .br2 {
            white-space: pre;
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

        input[type=radio] {
            opacity: 0;
            visablity: hidden;
        }

        .t-radio__indicator {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: white;
            padding: 3px 13px;
            border-radius: 5px;

        }

        input[type=radio]:checked+.t-radio__indicator {
            background: white;
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

        .deadline-message {
            display: none;
        }

        .visible {
            display: block;
        }

        .hidden {
            display: none;
        }

        .highcharts-figure .chart-container {
            width: 400px;
            height: 200px;
            float: left;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            width: 600px;
            margin: 0 auto;
        }

        .highcharts-data-table table {
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        @media (max-width: 600px) {

            .highcharts-figure,
            .highcharts-data-table table {
                width: 100%;
            }

            .highcharts-figure .chart-container {
                width: 300px;
                float: none;
                margin: 0 auto;
            }

        }
    </style>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Тема -->

    <section class="content">
        <section class="content-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('ort_view1', ['subdomain' => 'ort']) }}">
                        <i class="nav-icon fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item">{{ $test_category->title }}
                </li>
                <li class="breadcrumb-item">
                    @if ($for_action == 1)
                        <a href="{{ route('ort_negizgi_test_podcat', ['subdomain' => 'ort', 'id' => $test_podcategory->id]) }}">{{ $test_podcategory->title }}</a>
                    @endif
                    @if ($for_action == 2)
                        <a href="{{ route('ort_predmettik_test_podcat', ['subdomain' => 'ort', 'id' => $test_podcategory->id]) }}">{{ $test_podcategory->title }}</a>
                    @endif
                </li>
                <li class="breadcrumb-item">
                    @if ($for_action == 1)
                        <a href="{{ route('ort_negizgi_test_opentest', ['subdomain' => 'ort', 'for_action' => '1', 'id' => $tests->id]) }}">{{ $tests->title }}</a>
                    @endif
                    @if ($for_action == 2)
                        <a href="{{ route('ort_predmettik_test_opentest', ['subdomain' => 'ort', 'for_action' => '2', 'id' => $tests->id]) }}">{{ $tests->title }}</a>
                    @endif
                </li>
                <li class="breadcrumb-item active">Жыйынтык</li>
            </ol>
        </section>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i
                        class="fas fa-times"></i></button>
                <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
            </div>
        @endif
        <div class="row">
            <div class="col-md-9">
                <div class="container-fluid mt-4">
                    <div class="card card-light">
                        <div class="card-header">
                            <h7 class="mb-0 pt-3"><b>Тесттин жыйынтыгы</b><span class="float-right text-muted">Попытка:
                                    {{ $test_controls_one['popytka'] }}</span></h7>
                        </div>
                        <div class="card-body p-0 class11">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-center">
                                    <figure class="highcharts-figure">
                                        <div id="container-speed" class="chart-container"></div>
                                    </figure>
                                </div>
                                <?php
                                $time = strtotime($test_controls_one->updated_at) - strtotime($test_controls_one->created_at) - 3600 * 6;
                                ?>
                                <div class="col-md-6">
                                    <div class="card-body pr-3 pl-3 pt-3 pb-3">
                                        <h7 class="mb-0 pt-3 text-muted">Туура жооптордун саны:<span
                                                class="float-right">{{ $test_controls_one->kol_pravilnyh_otvetov }}
                                                <small class="text-muted">/
                                                    {{ $tests->test_voprosy_count }}</small></span></h7>
                                        <hr class="mt-0 mb-4">
                                        <h7 class="mb-0 pt-3 text-muted">Топтолгон баллдын саны:<span class="float-right">
                                                @if ($test_controls_one->test_summa_ballov / $test_controls_one->kol_voprosov >= 1)
                                                    {{ $test_controls_one->kol_ballov_usera }}
                                                @else
                                                    {{ $test_controls_one->kol_pravilnyh_otvetov }}
                                                @endif <small class="text-muted">/
                                                    @if ($test_controls_one->test_summa_ballov / $tests->test_voprosy_count >= 1)
                                                        {{ $test_controls_one->test_summa_ballov }}
                                                    @else
                                                        {{ $tests->test_voprosy_count }}
                                                    @endif
                                                </small>
                                            </span></h7>
                                        <hr class="mt-0 mb-4">
                                        <h7 class="mb-0 pt-3 text-muted">Проценти:<span class="float-right">
                                                @if ($test_controls_one->test_summa_ballov / $test_controls_one->kol_voprosov >= 1)
                                                    {{ round(($test_controls_one->kol_ballov_usera * 100) / $test_controls_one->test_summa_ballov) }}
                                                @else
                                                    {{ round(($test_controls_one->kol_pravilnyh_otvetov * 100) / $test_controls_one->kol_voprosov) }}
                                                @endif
                                                %
                                            </span></h7>
                                        <hr class="mt-0 mb-4">
                                        <h7 class="mb-0 pt-3 text-muted">Коротулган убакыт:<span
                                                class="float-right">{{ date('H:i:s', $time) }}</span></h7>
                                        <hr class="mt-0 mb-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="mb-0 float-right text-muted">Тапшырган датасы:
                                {{ $test_controls_one['updated_at']->format('d.m.Y') }}
                                <small>({{ $test_controls_one['updated_at']->format('H:i:s') }})</small>
                            </p>
                        </div>
                    </div>
                </div>

                <?php
                $time = time();
                $test_controls_one_updated_at = strtotime($test_controls_one->updated_at);
                $time_result = intval($time) - intval($test_controls_one_updated_at);
                ?>

                @if ($tests->pokaz_otvetov === null)
                @else
                    @if (intval($tests->pokaz_otvetov) == 0)
                        <p class="mb-0 pl-2 pt-3 mt-4">Суроолор боюнча анализ</p>
                        <div class="container-fluid ">
                            <div class="form-group test_margin">
                                <table class="table table-borderless mb-0" id="linksTable">
                                    <tbody class="connectedSortable">
                                        @foreach ($test_voprosy as $test_voprosy)
                                            <tr class="vopros_testa">
                                                <td class="pt-2 pb-0 pr-0 pl-0">
                                                    <?php
                                                    $nomer22 = $test_controls_variants->where('vopros_id', $test_voprosy->id)->first();
                                                    $nomer23 = $test_otvety
                                                        ->where('test_voprosy_id', $test_voprosy->id)
                                                        ->where('status_otveta', 1)
                                                        ->first();
                                                    ?>

                                                    <div class="card card-primary card-outline for_peremestit">
                                                        <div class="card-header pl-3 pr-2 pt-1 pb-1">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <p class="mb-0"><span
                                                                            class="number">{{ $loop->iteration }}</span>-суроо
                                                                    </p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <p class="mb-0">
                                                                        @if ($nomer22 != null)
                                                                            @if ($nomer23->id === $nomer22->otvet_id)
                                                                                <i class="pl-2 fas fa-check"
                                                                                    style="color: #28a745;"></i>
                                                                            @else
                                                                                <i class="pl-2 fas fa-times"
                                                                                    style="color: red;"></i>
                                                                            @endif
                                                                        @else
                                                                            <i class="fas fa-question"
                                                                                style="color: blueviolet;"></i>
                                                                        @endif
                                                                </div>
                                                                <div class="col text-right text-muted">
                                                                    <p class="mb-0">
                                                                        @if ($nomer22 != null)
                                                                            @if ($nomer23->id === $nomer22->otvet_id)
                                                                                @if ($summa_ballov / $tests->test_voprosy_count >= 1)
                                                                                    {{ $test_voprosy->ball }}
                                                                                @else
                                                                                    1 @endif
                                                                            @else
                                                                                0
                                                                            @endif
                                                                        @else
                                                                            0
                                                                        @endif
                                                                        <small> / @if ($summa_ballov / $tests->test_voprosy_count >= 1)
                                                                                {{ $test_voprosy->ball }}
                                                                            @else
                                                                                1 @endif
                                                                            балл</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body pb-2 pt-2 pr-3 pl-3 class11">
                                                            @if ($test_voprosy->text_voprosa != null)
                                                                <p class="unselectable">{!! nl2br($test_voprosy->text_voprosa) !!}</p>
                                                            @endif
                                                            @if ($test_voprosy->img_voprosa != null)
                                                                <div class="foto1 for_foto1 mb-2 mt-2">
                                                                    <img class="mb-2 shadow-sm"
                                                                        src="{{asset('')}}/storage/testy/images/imgvoprosa/{{ $test_voprosy->img_voprosa }}"
                                                                        alt=""
                                                                        style="width: 100%; border-radius: 4px;">
                                                                </div>
                                                            @endif
                                                            @foreach ($test_otvety->where('test_voprosy_id', $test_voprosy->id) as $variant)
                                                                @if (intval(strcasecmp($variant->test_otvety, '<p>А</p>')) == 0)
                                                                @elseif(intval(strcasecmp($variant->test_otvety, '<p>Б</p>')) == 0)

                                                                @elseif(intval(strcasecmp($variant->test_otvety, '<p>В</p>')) == 0)

                                                                @elseif(intval(strcasecmp($variant->test_otvety, '<p>Г</p>')) == 0)

                                                                @elseif(intval(strcasecmp($variant->test_otvety, '<p>Д</p>')) == 0)
                                                                @else
                                                                <div class="row">
                                                                    <div class="col-auto p-0">
                                                                        <p class="unselectable pr-1">
                                                                            @if ($loop->iteration === 1)
                                                                                А)
                                                                            @endif
                                                                            @if ($loop->iteration === 2)
                                                                                Б)
                                                                            @endif
                                                                            @if ($loop->iteration === 3)
                                                                                В)
                                                                            @endif
                                                                            @if ($loop->iteration === 4)
                                                                                Г)
                                                                            @endif
                                                                            @if ($loop->iteration === 5)
                                                                                Д)
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <div class="col p-0 unselectable">
                                                                        {!! $variant->test_otvety !!}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            @endforeach

                                                        </div>
                                                        <div class="card-footer pb-2 pt-2 pr-3 pl-3">
                                                            <div class="row text-center">
                                                                @foreach ($test_otvety->where('test_voprosy_id', $test_voprosy->id) as $variant)
                                                                    <div class="col p-0">
                                                                        <label class="t-radio__control mb-0 pr-0 pl-0">
                                                                            <?php
                                                                            $nomer22 = $test_controls_variants->where('vopros_id', $test_voprosy->id)->first();
                                                                            ?>
                                                                            <input type="radio"
                                                                                name="otvet_{{ rand(1, 1000) }}[]"
                                                                                data-tilda-req="1"
                                                                                class="t-radio js-tilda-rule"
                                                                                hidden="">
                                                                            <p
                                                                                class="t-radio__indicator rrttrr mb-0 border 
                                                                    @if ($nomer22 != null) @if ($variant->status_otveta === 0)
                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                               border-danger @endif
                                                                        @endif
                                                                        @if ($variant->status_otveta === 1) border-success @endif
                                                                    @endif
                                                                    ">

                                                                                @if ($nomer22 != null)
                                                                                    @if ($loop->iteration === 1)
                                                                                        А
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($variant->status_otveta === 0)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-times"
                                                                                                    style="color: red;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 2)
                                                                                        Б
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($variant->status_otveta === 0)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-times"
                                                                                                    style="color: red;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 3)
                                                                                        В
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($variant->status_otveta === 0)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-times"
                                                                                                    style="color: red;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 4)
                                                                                        Г
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($variant->status_otveta === 0)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-times"
                                                                                                    style="color: red;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 5)
                                                                                        Д
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($variant->status_otveta === 0)
                                                                                            @if ($variant->id === $nomer22->otvet_id)
                                                                                                <i class="pl-2 fas fa-times"
                                                                                                    style="color: red;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                @else
                                                                                    @if ($loop->iteration === 1)
                                                                                        А
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            <i class="pl-2 fas fa-check"
                                                                                                style="color: #28a745;"></i>
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 2)
                                                                                        Б
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            <i class="pl-2 fas fa-check"
                                                                                                style="color: #28a745;"></i>
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 3)
                                                                                        В
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            <i class="pl-2 fas fa-check"
                                                                                                style="color: #28a745;"></i>
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 4)
                                                                                        Г
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            <i class="pl-2 fas fa-check"
                                                                                                style="color: #28a745;"></i>
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($loop->iteration === 5)
                                                                                        Д
                                                                                        @if ($variant->status_otveta === 1)
                                                                                            <i class="pl-2 fas fa-check"
                                                                                                style="color: #28a745;"></i>
                                                                                        @endif
                                                                                    @endif
                                                                                @endif

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
                            </div>
                        </div>
                    @endif

                    @if (intval($tests->pokaz_otvetov) > 0)
                        <p class="mb-0 pl-2 pt-3 mt-4">Суроолор боюнча анализ</p>
                        @if ($time_result >= $tests->pokaz_otvetov)
                            <div class="container-fluid ">
                                <div class="form-group test_margin">
                                    <table class="table table-borderless mb-0" id="linksTable">
                                        <tbody class="connectedSortable">
                                            @foreach ($test_voprosy as $test_voprosy)
                                                <tr class="vopros_testa">
                                                    <td class="pt-2 pb-0 pr-0 pl-0">
                                                        <?php
                                                        $nomer22 = $test_controls_variants->where('vopros_id', $test_voprosy->id)->first();
                                                        $nomer23 = $test_otvety
                                                            ->where('test_voprosy_id', $test_voprosy->id)
                                                            ->where('status_otveta', 1)
                                                            ->first();
                                                        ?>

                                                        <div class="card card-primary card-outline for_peremestit">
                                                            <div class="card-header pl-3 pr-2 pt-1 pb-1">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="mb-0"><span
                                                                                class="number">{{ $loop->iteration }}</span>-суроо
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <p class="mb-0">
                                                                            @if ($nomer22 != null)
                                                                                @if ($nomer23->id === $nomer22->otvet_id)
                                                                                    <i class="pl-2 fas fa-check"
                                                                                        style="color: #28a745;"></i>
                                                                                @else
                                                                                    <i class="pl-2 fas fa-times"
                                                                                        style="color: red;"></i>
                                                                                @endif
                                                                            @endif
                                                                    </div>
                                                                    <div class="col text-right text-muted">
                                                                        <p class="mb-0">
                                                                            @if ($nomer22 != null)
                                                                                @if ($nomer23->id === $nomer22->otvet_id)
                                                                                    @if ($summa_ballov / $tests->test_voprosy_count >= 1)
                                                                                        {{ $test_voprosy->ball }}
                                                                                    @else
                                                                                        1 @endif
                                                                                @else
                                                                                    0
                                                                                @endif
                                                                            @else
                                                                                0
                                                                            @endif
                                                                            <small> / @if ($summa_ballov / $tests->test_voprosy_count >= 1)
                                                                                    {{ $test_voprosy->ball }}
                                                                                @else
                                                                                    1 @endif
                                                                                балл</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body pb-2 pt-2 pr-3 pl-3 class11">

                                                                @if ($test_voprosy->text_voprosa != null)
                                                                    <p class="unselectable">
                                                                        {!! nl2br($test_voprosy->text_voprosa) !!}</p>
                                                                @endif
                                                                @if ($test_voprosy->img_voprosa != null)
                                                                    <div class="foto1 for_foto1 mb-2 mt-2">
                                                                        <img class="mb-2 shadow-sm"
                                                                            src="{{asset('')}}/storage/testy/images/imgvoprosa/{{ $test_voprosy->img_voprosa }}"
                                                                            alt=""
                                                                            style="width: 100%; border-radius: 4px;">
                                                                    </div>
                                                                @endif
                                                                @foreach ($test_otvety->where('test_voprosy_id', $test_voprosy->id) as $variant)
                                                                    @if (intval(strcasecmp($variant->test_otvety, '<p>А</p>')) == 0)
                                                                    @elseif(intval(strcasecmp($variant->test_otvety, '<p>Б</p>')) == 0)

                                                                    @elseif(intval(strcasecmp($variant->test_otvety, '<p>В</p>')) == 0)

                                                                    @elseif(intval(strcasecmp($variant->test_otvety, '<p>Г</p>')) == 0)

                                                                    @elseif(intval(strcasecmp($variant->test_otvety, '<p>Д</p>')) == 0)
                                                                    @else
                                                                        <div class="row">
                                                                            <div class="col-auto p-0">
                                                                                <p class="unselectable pr-1">
                                                                                    @if ($loop->iteration === 1)
                                                                                        А)
                                                                                    @endif
                                                                                    @if ($loop->iteration === 2)
                                                                                        Б)
                                                                                    @endif
                                                                                    @if ($loop->iteration === 3)
                                                                                        В)
                                                                                    @endif
                                                                                    @if ($loop->iteration === 4)
                                                                                        Г)
                                                                                    @endif
                                                                                    @if ($loop->iteration === 5)
                                                                                        Д)
                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                            <div class="col p-0 unselectable">
                                                                                {!! $variant->test_otvety !!}
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="card-footer pb-2 pt-2 pr-3 pl-3">
                                                                <div class="row text-center">
                                                                    @foreach ($test_otvety->where('test_voprosy_id', $test_voprosy->id) as $variant)
                                                                        <div class="col p-0">
                                                                            <label class="t-radio__control mb-0 pr-0 pl-0">
                                                                                <?php
                                                                                $nomer22 = $test_controls_variants->where('vopros_id', $test_voprosy->id)->first();
                                                                                ?>
                                                                                <input type="radio"
                                                                                    name="otvet_{{ rand(1, 1000) }}[]"
                                                                                    data-tilda-req="1"
                                                                                    class="t-radio js-tilda-rule"
                                                                                    hidden="">
                                                                                <p
                                                                                    class="t-radio__indicator rrttrr mb-0 border 
                                                                            @if ($nomer22 != null) @if ($variant->status_otveta === 0)
                                                                                    @if ($variant->id === $nomer22->otvet_id)
                                                                                       border-danger @endif
                                                                                @endif
                                                                                @if ($variant->status_otveta === 1) border-success @endif
                                                                            @endif
                                                                            ">

                                                                                    @if ($nomer22 != null)
                                                                                        @if ($loop->iteration === 1)
                                                                                            А
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-check"
                                                                                                        style="color: #28a745;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                            @if ($variant->status_otveta === 0)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-times"
                                                                                                        style="color: red;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 2)
                                                                                            Б
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-check"
                                                                                                        style="color: #28a745;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                            @if ($variant->status_otveta === 0)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-times"
                                                                                                        style="color: red;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 3)
                                                                                            В
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-check"
                                                                                                        style="color: #28a745;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                            @if ($variant->status_otveta === 0)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-times"
                                                                                                        style="color: red;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 4)
                                                                                            Г
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-check"
                                                                                                        style="color: #28a745;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                            @if ($variant->status_otveta === 0)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-times"
                                                                                                        style="color: red;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 5)
                                                                                            Д
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-check"
                                                                                                        style="color: #28a745;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                            @if ($variant->status_otveta === 0)
                                                                                                @if ($variant->id === $nomer22->otvet_id)
                                                                                                    <i class="pl-2 fas fa-times"
                                                                                                        style="color: red;"></i>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endif
                                                                                    @else
                                                                                        @if ($loop->iteration === 1)
                                                                                            А
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 2)
                                                                                            Б
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 3)
                                                                                            В
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 4)
                                                                                            Г
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                        @if ($loop->iteration === 5)
                                                                                            Д
                                                                                            @if ($variant->status_otveta === 1)
                                                                                                <i class="pl-2 fas fa-check"
                                                                                                    style="color: #28a745;"></i>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif

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
                                </div>
                            </div>
                        @else
                            <?php
                            $day001 = floor($tests->pokaz_otvetov / 86400);
                            $hour001 = floor(($tests->pokaz_otvetov - $day001 * 86400) / 3600);
                            $minute001 = floor(($tests->pokaz_otvetov - $day001 * 86400 - $hour001 * 3600) / 60);
                            ?>
                            <p class="mb-0 pl-2 pt-2">
                                @if ($day001 > 0){{ $day001 }}
                                    күн
                                @else
                                    @if ($hour001 > 0)
                                        {{ $hour001 }} саат
                                    @else
                                        @if ($minute001 > 0)
                                            {{ $minute001 }} минутадан @endif
                                    @endif
                                @endif кийин көрө аласыз.
                            </p>
                        @endif
                    @endif
                @endif
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <p class="mb-0 text-center"><b>Сиздин жыйынтык</b><br></p>
                    <p class="mb-0 text-muted text-center" style="line-height: 0.9em;"><small>Ийгилик
                            каалайбыз!</small></p>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->


    </section><!-- /.content -->








    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript">
        var gaugeOptions = {
            chart: {
                type: 'solidgauge'
            },
            title: null,
            pane: {
                center: ['50%', '85%'],
                size: '140%',
                startAngle: -90,
                endAngle: 90,
                background: {
                    backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                    innerRadius: '60%',
                    outerRadius: '100%',
                    shape: 'arc'
                }
            },
            exporting: {
                enabled: false
            },
            tooltip: {
                enabled: false
            },
            // the value axis
            yAxis: {
                stops: [
                    [0.1, '#55BF3B'], // green
                ],
                lineWidth: 0,
                tickWidth: 0,
                minorTickInterval: null,
                tickAmount: 2,
                title: {
                    y: -70
                },
                labels: {
                    y: 16
                }
            },
            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        y: 5,
                        borderWidth: 0,
                        useHTML: true
                    }
                }
            }
        };

        // The speed gauge
        var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: 0,
                max: 100,
                title: {
                    text: ''
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Speed',
                @if ($test_controls_one->test_summa_ballov / $test_controls_one->kol_voprosov >= 1)
                    data: [
                        {{ round(($test_controls_one->kol_ballov_usera * 100) / $test_controls_one->test_summa_ballov) }}
                    ],
                @else

                    data: [
                        {{ round(($test_controls_one->kol_pravilnyh_otvetov * 100) / $test_controls_one->kol_voprosov) }}
                    ],
                @endif

                dataLabels: {
                    format: '<div style="text-align:center">' +
                        '<span style="font-size:30px; color: #007bff;"><b>{y}%</b></span><br/>' +
                        '<span style="font-size:12px;opacity:0.4; color: white;">%</span>' +
                        '</div>'
                },
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

        }));




        function equalHeight(group) {
            var tallest = 0;
            group.each(function() {
                thisHeight = $(this).width();
                if (thisHeight > tallest) {
                    tallest = thisHeight;
                }
            });
            group.width(tallest);
        }
        $(document).ready(function() {
            equalHeight($(".rrttrr"));
        });
    </script>

<!-- запрет правой кнопки мыши, F12, Ctrl+U, Ctrl+Shift+I, Ctrl+Shift+J -->
<script type="text/javascript">
    function click(e) {
      if (document.all) {
            if (event.button == 2 || event.button == 3) {alert ("Пожалуйста, свяжитесь с центром источников! Спасибо за сотрудничество !!!");
            oncontextmenu='return false'; 
        }
      }
      if (document.layers) {
        if (e.which == 3) {
          oncontextmenu='return false';
        }
      }
    }
    if (document.layers) {
      document.captureEvents(Event.MOUSEDOWN);
    }
    document.onmousedown=click;
    document.oncontextmenu = new Function("return false;")
   
    document.onkeydown =document.onkeyup = document.onkeypress=function(){ 
      if(window.event.keyCode == 123) { 
        window.event.returnValue=false;
        return(false); 
      } 
    }
  </script>
  <script type="text/javascript">
  document.onkeydown = function(e) {
  if(event.keyCode == 123) {
  return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
  return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
  return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
  return false;
  }
  }
  </script>
  <!-- запрет правой кнопки мыши, F12, Ctrl+U, Ctrl+Shift+I, Ctrl+Shift+J -->
@endsection
