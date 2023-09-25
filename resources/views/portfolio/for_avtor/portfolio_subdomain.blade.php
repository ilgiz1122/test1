@extends('layouts.portfolio_layouts')

@section('title', 'панел')

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
                        <h5>Домен жана статус</h5>
                        <span>Протфолиого уникалдуу домен алуу баракчасы</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title p-r-0">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Домен жана статус</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card comp-card">
                            <div class="card-body">
                                <div class="row align-items-end">
                                    <div class="col">
                                        <h6 class="m-b-50">Портфолионун дарегин түзүү</h6>
                                        <div class="row align-items-center">
                                            <div class="col-auto m-b-25">
                                                <h6 class="m-b-0 p-b-0">Домен</h6>
                                                <p class="text-muted m-b-0"><small>Домен ойлоп табыңыз</small></p>
                                            </div>
                                            <div class="col p-r-0 text-right">
                                                <div class="form-group m-b-0">
                                                    <input type="text"
                                                        style="border: none; border-radius: 0%; width: 100%;"
                                                        class=" form-control-primary border-bottom form-control-right text-right p-r-0"
                                                        placeholder="my-portfolio" id="input_subdomain">
                                                </div>
                                            </div>
                                            <div class="col-auto p-l-0">
                                                <div class="form-group">
                                                    <input type="text"
                                                        style="border: none; border-radius: 0%; width: 70px;"
                                                        class=" form-control-primary border-bottom form-txt-primary p-l-0"
                                                        value=".nonsi.kg" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-mat waves-effect waves-light btn-primary float-right m-t-20">Сактоо</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('input_subdomain').onkeyup = function() {
            var reg = /[а-яА-ЯёЁ]/g;
            if (this.value.search(reg) != -1) {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: 'Англисче тамгаларды колдонуу керек!'
                });
                this.value = this.value.replace(reg, '');
            }
        }
    </script>

@endsection
