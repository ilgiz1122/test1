@extends('layouts.app')

@section('content')
<style type="text/css">

    @media (max-width: 768px) {
        .for_moderator_img1 {
            width: 50%;
        }
    }

    @media (min-width: 768px) {
        .for_moderator_img2 {
            width: 100%;
        }
    }

    @media (min-width: 768px) {
        .for_moderator_img22 {
            padding-right: 15px;
        }
    }
    
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
        
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pb-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible pt-3 mb-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <p class="mb-0"><i class="icon fas fa-check"></i> {{ session('success') }}</p>
                </div>
            @endif
            @if (session('success2'))
                <div class="alert alert-info alert-dismissible pt-3 mb-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <p class="mb-0"><i class="icon fas fa-check"></i> {{ session('success2') }}</p>
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
                        Модераторлор <small></small>
                    </li>
                </ol>
              </div><!-- /.container-fluid -->
            </section>
            <div class="row">
                <div class="col-md-9">
                    @foreach($moderator1s as $moderator)
                    <div class="card block23">
                        <a style="display:block" href="{{ route('moderatorlor_for_user_one', $moderator['id']) }}"></a>
                        <div class="card-body p-2 ">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center for_moderator_img22">
                                    @if($moderator->img_600_600 == null)
                                    <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle for_moderator_img1 for_moderator_img2 shadow-sm"  alt="User Image">
                                    @else
                                    <img src="{{ asset('public/storage/users/img_600_600/') }}/{{$moderator->img_600_600}}" class="img-circle for_moderator_img1 for_moderator_img2 shadow-sm"  alt="{{$moderator->name}}">
                                    @endif 
                                </div>
                                <div class="col-md-10 pt-3 pb-3">
                                    <div class="pb-1">
                                    <span>
                                        <b>
                                            @if($moderator->f_fio != null)
                                                <span title="{{$moderator->name}}">{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}</span>
                                            @else
                                                <span title="{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}">{{$moderator->name}}</span>
                                            @endif
                                        </b>
                                    </span>
                                    </div>
                                    @if($moderator->oblast_id != null)
                                    <div class="pb-1">
                                    <span><i class="fas fa-map-marker-alt pr-2 text-muted"></i> {{$moderator->oblast->title}} обл. / {{$moderator->raion_shaar->title}} @if($moderator->aiyl_title != null) / {{$moderator->aiyl_title}} айылы @endif</span></div>
                                    @endif
                                    @if($moderator->mektep_title != null)
                                    <div class="pb-1">
                                    <span><i class="fas fa-landmark pr-2 text-muted"></i> {{$moderator->mektep_title}}</span></div>
                                    @endif
                                    @if($moderator->phone != null)
                                    <span>Телефон: 
                                        <a href="tel:+996{{preg_replace('~[^0-9]+~','', substr($moderator->phone, 1))}}">{{$moderator->phone}}</a>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach($moderators as $moderator)
                    <div class="card block23">
                        <a style="display:block" href="{{ route('moderatorlor_for_user_one', $moderator['id']) }}"></a>
                        <div class="card-body p-2 ">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center for_moderator_img22">
                                    @if($moderator->img_600_600 == null)
                                    <img src="{{asset('')}}/admin/dist/img/user-icon.svg" class="img-circle for_moderator_img1 for_moderator_img2 shadow-sm"  alt="User Image">
                                    @else
                                    <img src="{{ asset('public/storage/users/img_600_600/') }}/{{$moderator->img_600_600}}" class="img-circle for_moderator_img1 for_moderator_img2 shadow-sm"  alt="User Image">
                                    @endif 
                                </div>
                                <div class="col-md-10 pt-3 pb-3">
                                    <div class="pb-1">
                                    <span>
                                        <b>
                                            @if($moderator->f_fio != null)
                                                <span title="{{$moderator->name}}">{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}</span>
                                            @else
                                                <span title="{{$moderator->f_fio}} {{$moderator->i_fio}} {{$moderator->o_fio}}">{{$moderator->name}}</span>
                                            @endif
                                        </b>
                                    </span>
                                    </div>
                                    @if($moderator->oblast_id != null)
                                    <div class="pb-1">
                                    <span><i class="fas fa-map-marker-alt pr-2 text-muted"></i> {{$moderator->oblast->title}} обл. / {{$moderator->raion_shaar->title}} / {{$moderator->aiyl_title}} айылы</span></div>
                                    @endif
                                    @if($moderator->mektep_title != null)
                                    <div class="pb-1">
                                    <span><i class="fas fa-landmark pr-2 text-muted"></i> {{$moderator->mektep_title}}</span></div>
                                    @endif
                                    @if($moderator->phone != null)
                                    <span>Телефон: 
                                        <a href="tel:+996{{preg_replace('~[^0-9]+~','', substr($moderator->phone, 1))}}">{{$moderator->phone}}</a>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                      {{ $moderators->onEachSide(5)->links() }}
                    </div>
                    
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>

            
                    
            

        </div><!-- /.container-fluid -->
    </section><!-- /.content -->



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

// для блока, чтобы стал кнопкой
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
// для блока, чтобы стал кнопкой

</script>
@endsection