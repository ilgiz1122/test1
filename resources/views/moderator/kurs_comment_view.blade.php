@extends('layouts.moderator_layouts')

@section('content')
<style type="text/css">

.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
    padding-right: 15px;
   }

.ttrree{
  display: none;
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
              <li class="breadcrumb-item active">Пикирлер</li>
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

            <div class="table-responsive" >
                <table class="table table-hover table-head-fixed border" id="table">
                    <thead>
                        <tr>
                            <th class="" style="max-width: 170px;">ФИО</th>                            
                            <th class="border-left" >Пикирлер <span data-bs-toggle="tooltip" data-bs-placement="right" title="Пикирлердин саны: {{count($comments)}}">({{count($comments)}})</span></th>
                            <th></th>
                            <th class=""  title="Статус">Статус</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                      @foreach ($comments as $comment)
                        <tr class="todo-list2">
                            <td class="align-middle pr-5" style="max-width: 170px;">
                                <div class="user-block1">
                                    <span class="username1 ml-0 d-inline-block text-truncate truncate2" style="max-width: 170px;" title="{{$comment->user->name}}">{{$loop->iteration}}.
                                        @if($comment->user->f_fio != null)
                                            <span>{{$comment->user->f_fio}} {{$comment->user->i_fio}} {{$comment->user->o_fio}}</span>
                                        @else
                                            <span>{{$comment->user->name}}</span>
                                        @endif
                                    </span>
                                    <span class="description1 ml-0 truncate2" style="max-width: 170px;">{{$comment->created_at->format('d.m.Y')}} / {{$comment->created_at->format('H:i')}}</span>
                                </div>
                            </td>
                            <td class="align-middle border-left">
                              {!!$comment->text!!}
                            </td>
                            <td class="align-middle border-left">
                                <a class="btn btn-tool" href="{{ route('moderator_kurs_comment_edit_text', $comment->id) }}">
                                  <span style="font-size: 1.2em;" data-toggle="tooltip" data-placement="left" title="Редактировать">
                                    <i class="fas fa-pencil-alt pl-2 btn btn-tool for_textarea" style="transform: scale(-1, 1);"></i>
                                  </span>
                                </a>
                            </td>
                            <td class="align-middle">
                              <div class="form-group mb-0">
                                  <div class="custom-control custom-switch">
                                      <input data-id="{{$comment->id}}" type="checkbox" name="checkbox_name_{{$comment->id}}" class="custom-control-input" id="customSwitch0{{$comment->id}}" style="cursor: pointer;" @if($comment->status == 1) checked="" @endif>
                                      <label class="custom-control-label status_comment" data-id1="{{$comment->id}}" style="cursor: pointer;" for="customSwitch0{{$comment->id}}" ></label>
                                  </div>
                              </div>
                            </td>
                        </tr>
                      @endforeach 
                    </tbody>
                </table>
              </div>
          
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Пикирди өзгөртүү</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <textarea name="text" id="summernote" class="form-control" required></textarea>                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Жокко чыгаруу</button>
                        <button type="button" id="comment_id" class="btn btn-sm btn-danger" data-id="" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fas fa-trash"></i> Өзгөртүү
                          </button>                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>
<script>



$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $(document).ready(function(){
      $('.status_comment').click(function() {
        var countryID1 = $(this).attr('data-id1');
        if(countryID1)
        {
          jQuery.ajax({
              url : '/moderator_panel/kursy/moderator_kurs_comment_update_status/' +countryID1,
              type : "GET",
              dataType : "json",
              success:function(data){Toast.fire({icon: 'success', title: 'Статус өзгөртүлдү'});}
          });
        }else{}
        
      });
    });
});




$(function () {
    // Summernote
  $('#summernote').summernote({
      lang: 'ru-RU',           // set maximum height of editor
      placeholder: 'Пикир жазыңыз',
      disableDragAndDrop: true,
      toolbar: [
          ['font', ['bold', 'underline', 'italic']],
          ['para', ['ul', 'ol', 'paragraph']],
      ],
      focus: true,
  });
});
 

</script>
@endsection