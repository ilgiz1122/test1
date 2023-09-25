@extends('layouts.app')

@section('content')
<style>
    .cursor{
        cursor: pointer;
    }
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            

            <h5 class="mt-4 mb-2">Мои курсы</h5>
            <h5><strong><span class="info-box-text">У вас пока нет купленных курсов</span></strong></h5>
            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
@endsection