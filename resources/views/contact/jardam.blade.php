@extends('layouts.app')

@section('content')
<style type="text/css">
  .two2{
    will-change: transform;
    transition: transform 400ms;
  }
  .two2:hover {
    transition: transform 300ms;
      background-color: #f4f6f9;
  }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h7><i class="icon fas fa-check"></i> {{ session('success') }}</h7>
                </div>
            @endif
            @if (session('success2'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h7><i class="icon fas fa-check"></i> {{ session('success2') }}</h7>
                </div>
            @endif

          <section class="content-header pl-0 pr-0">
            <div class="container-fluid p-0">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item active">
                          <a href="{{ route('home')}}">
                              <i class="nav-icon fas fa-home"></i>
                          </a>
                      </li>
                      <li class="breadcrumb-item active">
                          Жардам
                      </li>
                  </ol>
            </div><!-- /.container-fluid -->
          </section>

          <div class="row align-items-top mb-5">
            <div class="col">
              <div class="row mt-3 align-items-center">
                <div class="col">
                  <hr class="mt-1 mb-3">
                </div>
                <div class="col-auto">
                  <p class="mt-1 mb-3 text-muted"><b>Сайтка катталуу</b></p>
                </div>
                <div class="col">
                  <hr class="mt-1 mb-3">
                </div>
              </div>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe style="border-radius: 3px;"
                  class="embed-responsive-item"
                    width="1920" height="1080"
                    src="https://www.youtube.com/embed/ndljAZACmto?VQ=HD1080"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
              </div>
            </div>
          </div>

          <div class="row align-items-top mb-3">
            <div class="col">
              <div class="row mt-5 align-items-center">
                <div class="col">
                  <hr class="mt-1 mb-3">
                </div>
                <div class="col-auto">
                  <p class="mt-1 mb-3 text-muted"><b>Курска доступ алуу</b></p>
                </div>
                <div class="col">
                  <hr class="mt-1 mb-3">
                </div>
              </div>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe style="border-radius: 3px;"
                  class="embed-responsive-item"
                    width="1920" height="1080"
                    src="https://www.youtube.com/embed/_lZaNyCzAcc?VQ=HD1080"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
              </div>
            </div>
          </div>


        </div><!-- /.container-fluid -->
    </section><!-- /.content -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  

</script>
@endsection