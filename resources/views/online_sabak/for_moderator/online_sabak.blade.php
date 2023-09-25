@extends('layouts.ort_moderator_layouts')

@section('title', 'Панель')

@section('content')
    <style>
        .margin1 {
            margin-left: 10px;
            margin-right: 10px;

        }
        @media screen and (max-width: 768px) {
            td {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }

            .for-padding {
                padding-top: 40px;
            }


            th {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
        }
   

   


       
    </style>



    <div class="page-header card margin1" style="margin-left: 10px; margin-right: 10px;">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Модератор панель</h5>
                        <span>Онлайн сабак уюштурууга керектүү инструменттер</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title p-r-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('moderator_panel_ort') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Онлайн сабак</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Сабак кошуу --}}
    <div class="pcoded-inner-content col-12">
        <div class="text-right">
            <button class="btn waves-effect waves-light btn-primary btn-md btn-mat mb-40" data-toggle="modal"
                data-target="#large-Modal">
                <span class="p-20"><i class="fas fa-plus pr-10"></i>Сабак кошуу</span>
            </button>
        </div>
        <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Сабак кошуу</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i
                                class="fal fa-times" style="font-size: 24px;"></i></button>
                    </div>
                    <form action="{{ route('ort_moderator_sabak_koshuu') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="col-12 mb-30 mt-30">
                                <p class="">Онлайн сабак өтүүчү предметти тандаңыз</p>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <select name="select" class="form-control">
                                        <option value="1" selected>ЖРТ <small>(ОРТ)</small></option>
                                    </select>
                                </div>
                                <div class="col-8">
                                    <select name="sabak_plus" class="form-control" title="Предметти тандаңыз" required
                                    oninvalid="this.setCustomValidity('Сураныч керектүү пунктту тандаңыз!')"
                                    oninput="setCustomValidity('')">
                                        <option selected disabled value="">Тандаңыз</option>
                                        @foreach ($onlain_sabak_predmety as $onlain_sabak_predmety)
                                            <option value="{{ $onlain_sabak_predmety->id }}">
                                                {{ $onlain_sabak_predmety->predmet_title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Сураныч керектүү пунктту тандаңыз!
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Жабуу</button>
                            <button type="submit"
                                class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">Кошуу</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Сабак кошуу x --}}

    


    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <h5>Онлайн сабактарым</h5>
                {{-- <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-refresh-cw reload-card"></i></li>
                        <li><i class="feather icon-trash close-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div> --}}
            </div>
            <div class="card-block pb-0 pl-5 pr-5">
                <div class="table-responsive">
                    <table class="table table-hover overflow-x mb-0">
                        <thead>
                            <tr>
                                <th class="">Предмет</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($onlain_sabak_predmet_sabaks as $onlain_sabak_predmet_sabak)
                                <tr>
                                    <td class="align-middle">
                                        <a href="{{ route('moderator_panel_online_sabak_edit', $onlain_sabak_predmet_sabak->id) }}">
                                            <div class="d-inline-block align-middle">
                                                <p class="mb-0"><b>{{$loop->iteration}}.</b> {{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}</p>
                                                <p class="text-muted mb-0 pl-15"><small>{{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-группа</small></p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('moderator_panel_online_sabak_edit_kunu', $onlain_sabak_predmet_sabak->id)}}">
                                            <i class="far fa-stream pr-15" style="font-size: 16px"></i>
                                        </a>
                                        <a href="{{ route('moderator_panel_online_sabak_edit', $onlain_sabak_predmet_sabak->id) }}">
                                            <i class="far fa-edit pr-15" style="font-size: 16px"></i>
                                        </a>
                                        <a href="{{ route('moderator_panel_online_sabak_delete', $onlain_sabak_predmet_sabak->id) }}">
                                            <i class="fas fa-trash" style="font-size: 16px"></i>
                                        </a>
                                        
                                        {{-- <input type="checkbox" class="js-small js-switch js-primary" @if ($onlain_sabak_predmet_sabak->status == 1) checked @endif /> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <div class="card ">
                
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        // Сабак кошуу уведомление
        @if (session('success'))
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif
        // Сабак кошуу уведомление х

        //  уведомление2
        @if (session('false'))
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'false',
                title: '{{ session('false') }}'
            });
        @endif
        // уведомление2 х
    </script>
   
@endsection
