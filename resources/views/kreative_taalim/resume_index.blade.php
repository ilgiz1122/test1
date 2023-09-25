@extends('layouts.kreative_layouts')

@section('content')
<style type="text/css">
  .iconc{
    color: red;
  }
  .iconk{
    color: #FF3333;
  }
  .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-4px);
  }
  .scale {
    transition: 1s; /* Время эффекта */
   }
   .scale:hover {
    transform: scale(1.03); /* Увеличиваем масштаб */
   }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
  }

.todo-list2 .tools2 {
  display: none;
}

.todo-list2:hover .tools2 {
  display: inline-block;
}
label {
    font-size: 1rem;
    font-weight:normal;
}
.hover1:hover {
    background: #f8f9fa;
}
.hover1:hover .color1{
    background: #f8f9fa;
}
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }

   .hidden {
  display: none;
}
   
</style>

    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          
            <div class="row">
              <div class="col-md-2">
                
              </div>
              <div class="col-md-8">
                <div class="row align-items-center mb-3 pt-3">
                  <div class="col-10" >
                    <h5 class="pt-2 mb-2">Мугалимдердин тизмеси <span data-bs-toggle="tooltip" data-bs-placement="right" title="Жалпы саны">({{count($resumes)}})</span></h5>
                  </div>
                  <div class="col-2" >
                    <a class="btn btn-sm btn-success float-right text-nowrap" data-bs-toggle="tooltip" data-bs-placement="left" title="Резюме кошуу" href="{{ route('kreative_taalim_resume_create')}}">
                        <i class="fas fa-plus pr-2"></i> Кошуу
                    </a> 
                  </div>
                </div>
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
                <div class="card-body p-0">
                  <div class="table-responsive mailbox-messages border-left border-right border-bottom" style="max-height: 600px;">
                    <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="pt-1 pb-1 pl-3">№</th>
                                <th class="pt-1 pb-1">ФИО</th>
                                <th class="pt-1 pb-1" style="padding-right: 12px;"><span id="msg"></span></th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                           @foreach ($resumes as $resume)
                            <tr class="todo-list2">
                                <td class="align-middle pl-3"><b>{{ $loop->iteration }}</b></td>
                                <td class="align-middle">
                                    <div class="user-block1">
                                        <span class="username1 ml-0 d-inline-block text-truncate">{{ $resume->familya }} {{ $resume->aty }} {{ $resume->at_aty }}</span>
                                        <span class="description1 ml-0">{{$resume['created_at']->format('d.m.Y')}}</span>
                                    </div>
                                </td>
                                
                                <td class="align-middle">
                                  
                                    <a class="btn btn-tool " href="{{ route('kreative_taalim_resume_edit', $resume['id']) }}" title="Редактировать">
                                      <i class="far fa-edit" style="font-size: 1.2em;"></i>
                                    </a>
                  
                                  

                                  <a class="btn btn-tool " href="{{ route('kreative_taalim_resume_frame2', $resume['id']) }}" title="Көрүү">
                                      <i class="far fa-eye" style="font-size: 1.2em;"></i>
                                    </a>


                                    <span id="copyTarget{{ $loop->iteration }}" class="hidden">https://nonsi.kg/service/kreative-taalim/resume/{{$resume['id']}}/frame2</span>  
                                    

                                    <button class="btn btn-tool btn-link" title="Шилтемесин көчүрүү">
                                      <i class="fas fa-code copy_click" id="{{ $loop->iteration }}" style="font-size: 1.2em;"></i>
                                    </button>
                                    @guest
                                    @if (Route::has('login'))

                                    @endif
                                    @else
                                        @if (intval(Auth::user()->for_role) === 2)
                                          <a type="button" class="btn btn-tool w-10000 for_modal_delete" title="Өчүрүү" data-toggle="modal" data-target="#staticBackdrop" data-title="{{ $resume->familya }}" data-kol="{{$resume->aty}}" data-price="{{ $resume->at_aty }}" data-id2="{{route('kreative_taalim_resume_destroy', $resume['id'])}}">
                                            <i class="fas fa-trash" style="font-size: 1.2em;"></i>
                                            </a>
                                        @endif
                                    
                                    @endguest
                                    

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.table --> 
                  </div>
                  <!-- /.mail-box-messages -->
                </div>
              </div>
              <div class="col-md-2">
                
              </div>
            </div>

            
          
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
            

        <!-- Модальное окно для удаления материалов -->
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content bg-default">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="staticBackdropLabel">Аракетти ырастаңыз</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0 pt-1">Фамилиясы <span class="float-right var_title"></span></p><hr class="mt-1">
                      <p class="mb-0">Аты <span class="float-right"><span class="var_title2"></span></span></p><hr class="mt-1">
                      <p class="mb-0">Атасынын аты <span class="float-right var_title6"></span></p>
                                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Жабуу</button>
                        <form method="POST" id="delet"  style="display: inline-block;" action="">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fas fa-trash"></i> Өчүрүү
                          </button>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно для удаления материалов -->




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
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
      $("#delet").attr('action', id2);

      //$("#hide1").attr('value', nametitle);
      //$("#hide2").attr('value', pricetovar);
    })
});





$(document).ready(function() {
        $(document).on('click', '.dropdown-menu', function (e) {
            $(this).hasClass('keep_open') && e.stopPropagation(); // This replace if conditional.
        }); 
    });


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 
$(".copy_click").click(function () {
    const copyid = this.id;
    copyToClipboardMsg(document.getElementById("copyTarget" + copyid), "msg");
});



 function copyToClipboardMsg(elem, msgElem) {
      var succeed = copyToClipboard(elem);
    var msg;
    if (!succeed) {
        msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
    } else {
        msg = "Көчүрүлдү"
    }
    if (typeof msgElem === "string") {
        msgElem = document.getElementById(msgElem);
    }
    msgElem.innerHTML = msg;
    setTimeout(function() {
        msgElem.innerHTML = "";
    }, 2000);
}

function copyToClipboard(elem) {
      // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
          succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}

</script>
@endsection