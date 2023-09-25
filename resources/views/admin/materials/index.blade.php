@extends('layouts.app')

@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-wrapper" style="margin-left: 0px;">
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h5 class="pt-3 mb-2"></h5>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                </div>
            @endif
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title pt-1">Список материалов</h3>

              <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('moderator_materials_create')}}">
                    <i class="fas fa-plus"></i> Добавить
                </a> 
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <!--<div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>-->
              <div class="table-responsive mailbox-messages">
                <table class="table  table-hover text-nowrap table-striped">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Тема</th>
                            <th>Тип (размер)</th>
                            <th>Подкатегория</th>
                            <th>Язык</th>
                            <th>Цена</th>
                            <th>Кол. продаж</th>
                            <th>Прибыль</th>
                            <th style="padding-right: 12px;"></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       @foreach ($materialies as $materialy)
                        <tr>
                            <td style="padding-bottom: 6px;"><b>{{ $loop->iteration }}</b></td>
                            <td style="padding-bottom: 6px;">
                                <div class="user-block1">
                                    <span class="username1 ml-0">{{ $materialy->title }}</span>
                                    <span class="description1 ml-0">{{$materialy['created_at']->format('d.m.Y')}}</span>
                                </div>
                            </td>
                            <td style="padding-bottom: 6px;">{{ $materialy->type }} ({{ $materialy->size }} MB)</td>
                            <td style="padding-bottom: 6px;">{{$materialy->materialpodcategory['title']}}</td>
                            <td style="padding-bottom: 6px;">@if (intval($materialy['language']) === 4)
                                    KG
                                @endif
                                @if (intval($materialy['language']) === 1)
                                    RU
                                @endif
                                @if (intval($materialy['language']) === 2)
                                    EN
                                @endif
                                @if (intval($materialy['language']) === 3)
                                    -
                                @endif
                            </td style="padding-bottom: 6px;">
                            <td style="padding-bottom: 6px;">{{ $materialy->price }} сом</td>
                            <td style="padding-bottom: 6px;">{{$materialy->kupitmaterialov_count}}</td>
                            <td style="padding-bottom: 6px;">{{$materialy->kupitmaterialov_count * $materialy->price * 0.8}} сом</td>
                            <td style="padding-right: 12px; padding-bottom: 6px;"  class="align-middle">
                                <span style="font-size: 1.5em; margin-right: 10px;">
                                  <i class="far fa-eye"></i>
                                </span>
                                <div class="btn-group" style="margin-bottom: 10px;">
                                    <button type="button" class="btn btn-sm btn-info" style="width: 42px;">
                                      <i class="far fa-edit"></i>
                                    </button>
                                    <form method="POST" style="display: inline-block;" action="{{route('materialy.destroy', $materialy['id'])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" style="width: 42px;">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    </form> 
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table --> 
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <!--<div class="card-footer p-0">
              <div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                  <i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>

     


@endsection