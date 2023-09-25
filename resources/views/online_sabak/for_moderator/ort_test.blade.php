@extends('layouts.ort_moderator_layouts')

@section('title', 'Панель')

@section('content')
    <style>
        .margin1 {
            margin-left: 10px;
            margin-right: 10px;

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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Тесттер</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Сабак кошуу --}}
    <div class="pcoded-inner-content col-12">
        <div class="text-right">
            <a class="btn waves-effect waves-light btn-primary btn-md btn-mat mb-40" href="{{ route('ort_moderator_online_test_create') }}">
                <span class="p-20"><i class="fas fa-plus pr-10"></i>Тест кошуу</span>
            </a>
        </div>
    </div>
    {{-- Сабак кошуу x --}}

    


    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <h5>Тесттер</h5>
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
                                <th class="">Тема</th>
                                <th>Категория</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($tests as $test)
                                <tr>
                                    <td class="align-middle">
                                        <a href="{{ route('ort_moderator_online_test_edit', $test->id) }}">
                                            <div class="d-inline-block align-middle">
                                                <p class="mb-0"><b>{{$loop->iteration}}.</b> {{ $test->title }}</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-inline-block align-middle">
                                            <p class="mb-0">{{$test->test_category->title}} / {{$test->test_podcategory->title}}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('ort_moderator_online_test_edit', $test->id) }}">
                                            <i class="far fa-edit" style="font-size: 16px"></i>
                                        </a>
                                        <a href="{{ route('ort_moderator_online_test_destroy', $test->id) }}" class="pl-15 for_modal_delete"  data-toggle="modal" data-target="#large-Modal" data-title="{{ $test->title }}" data-price="{{ $test->price / 100 }}" data-id2="{{route('ort_moderator_online_test_destroy', $test['id'])}}">
                                            <i class="fas fa-trash" style="font-size: 16px"></i>
                                        </a>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Сабакты өчүрүү</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i
                            class="fal fa-times" style="font-size: 24px;"></i></button>
                </div>
                    <div class="modal-body">
                        <p class="mb-10 pt-25">Тема <span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-10">Баасы <span class="float-right"><span class="var_title6"></span> <span>сом</span></span></p><hr class="mt-1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Жабуу</button>
                        <a id="delet" href="" class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">
                                <i class="fas fa-trash" style="font-size: 16px"></i> Өчүрүү
                        </a>
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
                $("#delet").attr('href', id2);
            })
        });
    </script>
   
@endsection
