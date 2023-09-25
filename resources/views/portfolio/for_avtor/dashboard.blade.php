@extends('layouts.portfolio_layouts')

@section('title', 'панел')

@section('content')
<style>
.margin1{
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
                      <h5>Dashboard CRM</h5>
                      <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                  <ul class=" breadcrumb breadcrumb-title p-r-0">
                      <li class="breadcrumb-item">
                          <a href="../index.html"><i class="feather icon-home"></i></a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a> </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <div class="pcoded-inner-content">
      <div class="main-body">
              <div class="page-body">

                  <div class="row">

                      <div class="col-xl-3 col-md-6">
                          <div class="card prod-p-card card-red">
                              <div class="card-body">
                                  <div class="row align-items-center m-b-30">
                                      <div class="col">
                                          <h6 class="m-b-5 text-white">Total Profit</h6>
                                          <h3 class="m-b-0 f-w-700 text-white">$1,783</h3>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                      </div>
                                  </div>
                                  <p class="m-b-0 text-white"><span
                                          class="label label-danger m-r-10">+11%</span>From
                                      Previous Month</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-md-6">
                          <div class="card prod-p-card card-blue">
                              <div class="card-body">
                                  <div class="row align-items-center m-b-30">
                                      <div class="col">
                                          <h6 class="m-b-5 text-white">Total Orders</h6>
                                          <h3 class="m-b-0 f-w-700 text-white">15,830</h3>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-database text-c-blue f-18"></i>
                                      </div>
                                  </div>
                                  <p class="m-b-0 text-white"><span
                                          class="label label-primary m-r-10">+12%</span>From
                                      Previous Month</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-md-6">
                          <div class="card prod-p-card card-green">
                              <div class="card-body">
                                  <div class="row align-items-center m-b-30">
                                      <div class="col">
                                          <h6 class="m-b-5 text-white">Average Price</h6>
                                          <h3 class="m-b-0 f-w-700 text-white">$6,780</h3>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-dollar-sign text-c-green f-18"></i>
                                      </div>
                                  </div>
                                  <p class="m-b-0 text-white"><span
                                          class="label label-success m-r-10">+52%</span>From
                                      Previous Month</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-md-6">
                          <div class="card prod-p-card card-yellow">
                              <div class="card-body">
                                  <div class="row align-items-center m-b-30">
                                      <div class="col">
                                          <h6 class="m-b-5 text-white">Product Sold</h6>
                                          <h3 class="m-b-0 f-w-700 text-white">6,784</h3>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-tags text-c-yellow f-18"></i>
                                      </div>
                                  </div>
                                  <p class="m-b-0 text-white"><span
                                          class="label label-warning m-r-10">+52%</span>From
                                      Previous Month</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-md-12">
                          <div class="card comp-card">
                              <div class="card-body">
                                  <div class="row align-items-center">
                                      <div class="col">
                                          <h6 class="m-b-25">Impressions</h6>
                                          <h3 class="f-w-700 text-c-blue">1,563</h3>
                                          <p class="m-b-0">May 23 - June 01 (2017)</p>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-eye bg-c-blue"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-md-6">
                          <div class="card comp-card">
                              <div class="card-body">
                                  <div class="row align-items-center">
                                      <div class="col">
                                          <h6 class="m-b-25">Goal</h6>
                                          <h3 class="f-w-700 text-c-green">30,564</h3>
                                          <p class="m-b-0">May 23 - June 01 (2017)</p>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-bullseye bg-c-green"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-md-6">
                          <div class="card comp-card">
                              <div class="card-body">
                                  <div class="row align-items-center">
                                      <div class="col">
                                          <h6 class="m-b-25">Impact</h6>
                                          <h3 class="f-w-700 text-c-yellow">42.6%</h3>
                                          <p class="m-b-0">May 23 - June 01 (2017)</p>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-hand-paper bg-c-yellow"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>



                  </div>

              </div>
      </div>
  </div>



<script type="text/javascript">

</script>
@endsection