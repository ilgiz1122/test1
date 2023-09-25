@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">

.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
    padding-right: 15px;
   }

   
</style>

    

    <!-- Main content -->
    <section class="content">
        <section class="content-header pl-0 pr-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('moderator_panel')}}">
                        <i class="nav-icon fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('moderator_kurs_index')}}">Курс</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('moderator_kurs_comment_view', $comment['product_id']) }}">Пикирлер</a>
                </li>
                <li class="breadcrumb-item active">
                    <span>
                        @if($comment->user->f_fio != null)
                            <span title="{{$comment->user->name}}">{{$comment->user->f_fio}} {{$comment->user->i_fio}} {{$comment->user->o_fio}}</span>
                        @else
                            <span>{{$comment->user->name}}</span>
                        @endif
                    </span>
                    (пикир өзгөртүү)
                </li>
            </ol>
        </section>
          
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                </div>
            @endif
            @if (session('success2'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                    <h5><i class="icon fas fa-check"></i> {{ session('success2') }}</h5>
                </div>
            @endif

            <div id="comment_textarea_{{$comment->id}}" class="ttrree">
                <form  action="{{ route('moderator_kurs_comment_update_text', $comment->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <textarea name="text" id="summernote" class="form-control" required>{!!$comment->text!!}</textarea>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info float-right mt-2 pt-1 pb-1 pl-3 pr-3">Өзгөртүү <i class="fas fa-arrow-right pl-2"></i></button>
                    </div>
                </form>
            </div>
          
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>
<script>

  





</script>
@endsection