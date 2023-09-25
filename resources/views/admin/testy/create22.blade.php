@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')


    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить новый тест</h1>
                </div>
            </div>
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <!--Окно для уведомлений (успушно добавлена) -->
        </div>
    </div>
    <!-- Тема -->

    <!-- Контент -->
    <style>
   .fig {
    text-align: center;
    margin-bottom: 0px; /* Выравнивание по центру */ 
   }
   .shapka_testa{
    background: #DCDCDC;
   }
   .test_margin{
    margin-bottom: 0px;
   }
   
   
   .fileUpload {
    background: ;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 100%;
    color: ;
    font-size: 1em;
    font-weight: bold;
    margin: 0em auto;/*20px/16px 0*/
    overflow: hidden;
    padding: 0.2em;/*14px/16px*/
    position: relative;
    text-align: center;
    width: 35px;
    cursor:pointer
}
.fileUpload:hover, .fileUpload:active, .fileUpload:focus {
    background: #FFFFFF;
    color: #0000FF;
    cursor:pointer
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 148px;
    height: 46px;
}

input[type="file"] {
    position: fixed;
    right: 100%;
    bottom: 100%;
}
  </style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <form action="{{ route('testy.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header shapka_testa">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label>Название теста</label>
                                            <input type="text" name="title" class="form-control" placeholder="Введите название теста" required>
                                            <label>Описание теста</label>
                                            <textarea type="text" name="opisanye" class="form-control" placeholder="Введите описание теста" required></textarea>
                                            <label>Выберите подкатегорию</label>
                                            <select name="podcat_id" class="form-control" required="">
                                                @foreach ($podcategories as $podcategory)
                                                <option value="{{$podcategory['id']}}">{{$podcategory['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Картинка для карточки теста</label><br>
                                            <img id="rebate_old_imag" data-bs-toggle="tooltip" data-bs-placement="top" title="Нажмите чтобы изменить картинку" src="/img/net_kartinki2.jpg" alt="" style="cursor:pointer; display: block; height: 187px">
                                            <input type="file" id="rebate_imag" name="rebate_imag" readonly="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label>Выберите урок</label>
                                            <select name="urok_id" class="form-control" required="">
                                                @foreach ($urokies as $urokies)
                                                <option value="{{$urokies['id']}}">{{$urokies['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Время (максимум 180 мин.)</label>
                                            <input type="number" pattern="\d+" name="time" min="1" max="180" value="30" name="title" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid card-body">
                                <div class="form-group test_margin">
                                        <div class="row align-items-center">
                                            <div class="col-lg-2">
                                            </div>
                                            <div class="col-lg-8">
                                                <h5 align="center"><strong>Вопросы теста</strong><br><small>(максимальное количество вопросов: 30)</small></h5>
                                            </div>
                                            <div class="col-lg-2">
                                                <p style="color: #228B22;" align="center"><strong>Добавлено: <a id="clicks">0</a></strong></p>
                                            </div>
                                        </div>
                                    <div class="row batman-picture">
                                        <a class="col-lg-6" id="fieldset">                                   
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <h3 class="card-title"><span class="number"></span> вопрос</h3>
                                                        <div class="col">
                                                            <div class="fileUpload">
                                                                <input type="file" class="upload" id="rebate_image" name="rebate_image" readonly="" required title="Нажмите чтобы загрузить картинку теста">
                                                                <i class="fas fa-download"></i>
                                                            </div>        
                                                        </div>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" onClick="clickM()" id="remove-tr">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p class="fig"><img id="rebate_old_image" src="/img/testy.png" alt="" style="width: 50%"></p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-success d-inline input-group">
                                                                    <input type="radio" name="variant[]" id="r1">
                                                                    <label for="r1">А</label>
                                                                </div>
                                                                <div class="icheck-success d-inline input-group">
                                                                    <input type="radio" name="variant[]" id="r2">
                                                                    <label for="r2">Б</label>
                                                                </div>
                                                                <div class="icheck-success d-inline input-group">
                                                                    <input type="radio" name="variant[]" id="r3">
                                                                    <label for="r3">В</label>
                                                                </div>
                                                                <div class="icheck-success d-inline input-group">
                                                                    <input type="radio" name="variant[]" id="r4">
                                                                    <label for="r4">Г</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <button type="button" name="add" id="btnAddressAdd" class="btn btn-success btn-lg btn-block nomer_testa"><i class="fas fa-plus"></i> Добавить вопрос</button>
                            </div>
                            <div class="card-footer shapka_testa d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary izmenit_name"><i class="fas fa-save"></i> Сохранить тест</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        



<script type="text/javascript">

//Для счета количество тестов
var clicks = 0;
$(document).on('click', '.nomer_testa', function(){    
    if (clicks < 31){
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
    else{
        clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    } 
});
 
var clicks = 0;
    function clickM() {
        clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
//Для счета количество тестов


    

// Для добавления нового вопроса
(function(){
    var button = document.getElementById("btnAddressAdd");
    button.addEventListener("click", function() {
        var sourceNode = document.getElementById("fieldset");
        var node = duplicateNode(sourceNode, ["id", "name", "for"]);
        sourceNode.parentNode.appendChild(node);
    }, false);

    var counter = 0;
    function duplicateNode(/*DOMNode*/sourceNode, /*Array*/attributesToBump) {
        counter++;
        var out = sourceNode.cloneNode(true);
        if (out.hasAttribute("id")) { out["id"] = bump(out["id"]); }
        var nodes = out.getElementsByTagName("*");
        for (var i = 0, len1 = nodes.length; i < len1; i++) {
            var node = nodes[i];
            for (var j = 0, len2 = attributesToBump.length; j < len2; j++) {
                var attribute = attributesToBump[j];
                if (node.hasAttribute(attribute)) {
                    node[attribute] = bump(node[attribute]);
                }
            }
        }
        function bump(/*String*/str) {return str + "_" + counter;}
        return out;
    }
}
)();            
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pure.js/2.82/pure.js" integrity="sha512-fshHVdy0uunF/C4dSGjMsIjOhVvFQKzU2V1mIOtRG9BPj2SJ8kXWsXwVG4mT6v98a39j49exCjsUqPIZY6z2lA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Для добавления нового вопроса-->
        
  

<script type="text/javascript">
         
    // Для удаления вопроса
    $(document).on('click', '#remove-tr_1', function(){
        var node = document.getElementById("fieldset_1");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        // счетчик номер теста
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
        // счетчик номер теста
    });
    $(document).on('click', '#remove-tr_2', function(){
        var node = document.getElementById("fieldset_2");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_3', function(){
        var node = document.getElementById("fieldset_3");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_4', function(){
        var node = document.getElementById("fieldset_4");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_5', function(){
        var node = document.getElementById("fieldset_5");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_6', function(){
        var node = document.getElementById("fieldset_6");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_7', function(){
        var node = document.getElementById("fieldset_7");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_8', function(){
        var node = document.getElementById("fieldset_8");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_9', function(){
        var node = document.getElementById("fieldset_9");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_10', function(){
        var node = document.getElementById("fieldset_10");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_11', function(){
        var node = document.getElementById("fieldset_11");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_12', function(){
        var node = document.getElementById("fieldset_12");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_13', function(){
        var node = document.getElementById("fieldset_13");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_14', function(){
        var node = document.getElementById("fieldset_14");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_15', function(){
        var node = document.getElementById("fieldset_15");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_16', function(){
        var node = document.getElementById("fieldset_16");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_17', function(){
        var node = document.getElementById("fieldset_17");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_18', function(){
        var node = document.getElementById("fieldset_18");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_19', function(){
        var node = document.getElementById("fieldset_19");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_20', function(){
        var node = document.getElementById("fieldset_20");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_21', function(){
        var node = document.getElementById("fieldset_21");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_22', function(){
        var node = document.getElementById("fieldset_22");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_23', function(){
        var node = document.getElementById("fieldset_23");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_24', function(){
        var node = document.getElementById("fieldset_24");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_25', function(){
        var node = document.getElementById("fieldset_25");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_26', function(){
        var node = document.getElementById("fieldset_26");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_27', function(){
        var node = document.getElementById("fieldset_27");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_28', function(){
        var node = document.getElementById("fieldset_28");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_29', function(){
        var node = document.getElementById("fieldset_29");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_30', function(){
        var node = document.getElementById("fieldset_30");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_31', function(){
        var node = document.getElementById("fieldset_31");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_32', function(){
        var node = document.getElementById("fieldset_32");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_33', function(){
        var node = document.getElementById("fieldset_33");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_34', function(){
        var node = document.getElementById("fieldset_34");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_35', function(){
        var node = document.getElementById("fieldset_35");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_36', function(){
        var node = document.getElementById("fieldset_36");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_37', function(){
        var node = document.getElementById("fieldset_37");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_38', function(){
        var node = document.getElementById("fieldset_38");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_39', function(){
        var node = document.getElementById("fieldset_39");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_40', function(){
        var node = document.getElementById("fieldset_40");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_41', function(){
        var node = document.getElementById("fieldset_41");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_42', function(){
        var node = document.getElementById("fieldset_42");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_43', function(){
        var node = document.getElementById("fieldset_43");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_44', function(){
        var node = document.getElementById("fieldset_44");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_45', function(){
        var node = document.getElementById("fieldset_45");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_46', function(){
        var node = document.getElementById("fieldset_46");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_47', function(){
        var node = document.getElementById("fieldset_47");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_48', function(){
        var node = document.getElementById("fieldset_48");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_49', function(){
        var node = document.getElementById("fieldset_49");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    $(document).on('click', '#remove-tr_50', function(){
        var node = document.getElementById("fieldset_50");
        if (node.parentNode) {
            node.parentNode.removeChild(node);
        }
        var elements = document.querySelectorAll('.number');
        elements.forEach(function(item, i, arr) {
            item.innerHTML = i+0+'';
        });
    });
    // Для удаления вопроса
    


    // Для ограничения вопросов теста (удаляет лишних вопросов)
    $(document).on('click', '.nomer_testa', function(){
        $(".batman-picture a:nth-child(n+32)").remove();
    });
    // Для удаления лишних вопросов
            
            


            // Для нумерации вопросов теста
                // привязка к кнопке добавить вопрос
                $(document).on('click', '.nomer_testa', function(){
                    var elements = document.querySelectorAll('.number');
                    elements.forEach(function(item, i, arr) {
                        item.innerHTML = i+0+'';
                    });
                });
                // привязка к кнопке добавить вопрос

                // привязка к кнопке удалить вопрос
                $(document).on('click', '.remove-tr', function(){
                    var elements = document.querySelectorAll('.number');
                    elements.forEach(function(item, i, arr) {
                        item.innerHTML = i+0+'';
                    });
                });
                // привязка к кнопке удалить вопрос

                // нумерация до нажатия каких либо кнопок
                var elements = document.querySelectorAll('.number');
                    elements.forEach(function(item, i, arr) {
                        item.innerHTML = i+0+'';
                    });
                // нумерация до нажатия каких либо кнопок
            // Для нумерации вопросов теста 






    //Для скрытия первого теста (тест который будет вставлятся)
    $("#fieldse").css("display", "none"); 
    //Для скрытия первого теста

// Для показа вопросов теста
$(document).on('click', '.nomer_testa', function(){
    $("#fieldset_1").css("display", "block");
    $("#fieldset_2").css("display", "block");
    $("#fieldset_3").css("display", "block");
    $("#fieldset_4").css("display", "block");
    $("#fieldset_5").css("display", "block");
    $("#fieldset_6").css("display", "block");
    $("#fieldset_7").css("display", "block");
    $("#fieldset_8").css("display", "block");
    $("#fieldset_9").css("display", "block");
    $("#fieldset_10").css("display", "block");
    $("#fieldset_11").css("display", "block");
    $("#fieldset_12").css("display", "block");
    $("#fieldset_13").css("display", "block");
    $("#fieldset_14").css("display", "block");
    $("#fieldset_15").css("display", "block");
    $("#fieldset_16").css("display", "block");
    $("#fieldset_17").css("display", "block");
    $("#fieldset_18").css("display", "block");
    $("#fieldset_19").css("display", "block");
    $("#fieldset_20").css("display", "block");
    $("#fieldset_21").css("display", "block");
    $("#fieldset_22").css("display", "block");
    $("#fieldset_23").css("display", "block");
    $("#fieldset_24").css("display", "block");
    $("#fieldset_25").css("display", "block");
    $("#fieldset_26").css("display", "block");
    $("#fieldset_27").css("display", "block");
    $("#fieldset_28").css("display", "block");
    $("#fieldset_29").css("display", "block");
    $("#fieldset_30").css("display", "block");
    $("#fieldset_31").css("display", "block");
    $("#fieldset_32").css("display", "block");
    $("#fieldset_33").css("display", "block");
    $("#fieldset_34").css("display", "block");
    $("#fieldset_35").css("display", "block");
    $("#fieldset_36").css("display", "block");
    $("#fieldset_37").css("display", "block");
    $("#fieldset_38").css("display", "block");
    $("#fieldset_39").css("display", "block");
    $("#fieldset_40").css("display", "block");
    $("#fieldset_41").css("display", "block");
    $("#fieldset_42").css("display", "block");
    $("#fieldset_43").css("display", "block");
    $("#fieldset_44").css("display", "block");
    $("#fieldset_45").css("display", "block");
    $("#fieldset_46").css("display", "block");
    $("#fieldset_47").css("display", "block");
    $("#fieldset_48").css("display", "block");
    $("#fieldset_49").css("display", "block");
    $("#fieldset_50").css("display", "block");
});
// Для показа вопросов теста

</script>
           



<!-- Для добавления картинки до нажатия каких либо кнопок-->
<script type="text/javascript">                
   // отображения картинки
    $(document).ready(function() {
          function readURL(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                $('#rebate_old_imag').attr('src', e.target.result);
              }            
              reader.readAsDataURL(input.files[0]);
            }
          }
          $("#rebate_imag").change(function(){
            readURL(this);
          });
        });
    // отображения картинки

    // Картинка как кнопка для загрузки картинку
    $("#rebate_old_imag").click(function () {
        $("#rebate_imag").trigger('click');
    });
    // Картинка как кнопка для загрузки картинку
</script>
<!-- Для добавления картинки до нажатия каких либо кнопок-->




 
<!-- Для добавления картинки после нажатия кнопоки добавить вопрос-->
<script type="text/javascript">         
// Для добавления картинки 
    $(document).on('click', '.nomer_testa', function(){
                       
            // отображения картинки
                $(document).ready(function() {
                    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                        reader.onload = function (e) {$('#rebate_old_image_1').attr('src', e.target.result);}
                        reader.readAsDataURL(input.files[0]);}}
                        $("#rebate_image_1").change(function(){readURL(this);});});
            // отображения картинки


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_2').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_2").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_3').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_3").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_4').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_4").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_5').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_5").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_6').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_6").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_7').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_7").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_8').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_8").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_9').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_9").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_10').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_10").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_11').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_11").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_12').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_12").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_13').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_13").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_14').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_14").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_15').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_15").change(function(){readURL(this);});});
         


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_16').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_16").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_17').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_17").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_18').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_18").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_19').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_19").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_20').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_20").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_21').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_21").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_22').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_22").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_23').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_23").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_24').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_24").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_25').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_25").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_26').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_26").change(function(){readURL(this);});});
          


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_27').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_27").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_28').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_28").change(function(){readURL(this);});});
          


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_29').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_29").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_30').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_30").change(function(){readURL(this);});});
            


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_31').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_31").change(function(){readURL(this);});});
           


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_32').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_32").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_33').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_33").change(function(){readURL(this);});});



            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_34').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_34").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_35').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_35").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_36').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_36").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_37').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_37").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_38').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_38").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_39').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_39").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_40').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_40").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_41').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_41").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_42').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_42").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_43').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_43").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_44').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_44").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_45').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_45").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_46').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_46").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_47').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_47").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_48').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_48").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_49').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_49").change(function(){readURL(this);});});


            $(document).ready(function() {
                function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
                    reader.onload = function (e) {$('#rebate_old_image_50').attr('src', e.target.result);}
                    reader.readAsDataURL(input.files[0]);}}
                    $("#rebate_image_50").change(function(){readURL(this);});});
    });
</script>
<!-- Для добавления картинки после нажатия кнопоки добавить вопрос-->






<script type="text/javascript">         
// Для изменения атрибута name (чтобы сохранить нужно изменить) 
$(document).on('click', '.izmenit_name', function(){
     $("[name='rebate_image_1']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_2']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_3']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_4']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_5']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_6']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_7']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_8']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_9']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_10']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_11']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_12']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_13']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_14']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_15']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_16']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_17']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_18']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_19']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_20']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_21']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_22']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_23']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_24']").each(function (i){$(this).attr("name", "rebate_new_image[]");})
     $("[name='rebate_image_25']").each(function (i){$(this).attr("id", "rebate_new_image[]");})
     $("[name='rebate_image_26']").each(function (i){$(this).attr("id", "rebate_new_image[]");})
     $("[name='rebate_image_27']").each(function (i){$(this).attr("id", "rebate_new_image[]");})
     $("[name='rebate_image_28']").each(function (i){$(this).attr("id", "rebate_new_image[]");})
     $("[name='rebate_image_29']").each(function (i){$(this).attr("id", "rebate_new_image[]");})
     $("[name='rebate_image_30']").each(function (i){$(this).attr("id", "rebate_new_image[]");})
     $("[name='rebate_image_31']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_32']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_33']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_34']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_35']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_36']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_37']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_38']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_39']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_40']").each(function (i){$(this).attr("id", "rebate_new_image[]");}) 
     $("[name='rebate_image_41']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_42']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_43']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_44']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_45']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_46']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_47']").each(function (i){$(this).attr("id", "rebate_new_image[]");})     
     $("[name='rebate_image_48']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_49']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   
     $("[name='rebate_image_50']").each(function (i){$(this).attr("id", "rebate_new_image[]");})   



     $("[name='varianty[]_1']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_2']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_3']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_4']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_5']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_6']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_7']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_8']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_9']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_10']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_11']").each(function (i){$(this).attr("name", "varianty[]");})
     $("[name='varianty[]_12']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_13']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_14']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_15']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_16']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_17']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_18']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_19']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_20']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_21']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_22']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_23']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_24']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_25']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_26']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_27']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_28']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_29']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_30']").each(function (i){$(this).attr("id", "varianty[]");})
     $("[name='varianty[]_31']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_32']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_33']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_34']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_35']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_36']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_37']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_38']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_39']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_40']").each(function (i){$(this).attr("id", "varianty[]");}) 
     $("[name='varianty[]_41']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_42']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_43']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_44']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_45']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_46']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_47']").each(function (i){$(this).attr("id", "varianty[]");})     
     $("[name='varianty[]_48']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_49']").each(function (i){$(this).attr("id", "varianty[]");})   
     $("[name='varianty[]_50']").each(function (i){$(this).attr("id", "varianty[]");})   



     $("[name='variant[]_1']").each(function (i){$(this).attr("name", "variant[]");})
     $("[name='variant[]_2']").each(function (i){$(this).attr("name", "variant[]");})
     $("[name='variant[]_3']").each(function (i){$(this).attr("name", "variant[]");})
     $("[name='variant[]_4']").each(function (i){$(this).attr("name", "variant[]");})
     $("[name='variant[]_5']").each(function (i){$(this).attr("name", "variant[]");})
     $("[name='variant[]_6']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_7']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_8']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_9']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_10']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_11']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_12']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_13']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_14']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_15']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_16']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_17']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_18']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_19']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_20']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_21']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_22']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_23']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_24']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_25']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_26']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_27']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_28']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_29']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_30']").each(function (i){$(this).attr("id", "variant[]");})
     $("[name='variant[]_31']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_32']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_33']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_34']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_35']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_36']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_37']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_38']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_39']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_40']").each(function (i){$(this).attr("id", "variant[]");}) 
     $("[name='variant[]_41']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_42']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_43']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_44']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_45']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_46']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_47']").each(function (i){$(this).attr("id", "variant[]");})     
     $("[name='variant[]_48']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_49']").each(function (i){$(this).attr("id", "variant[]");})   
     $("[name='variant[]_50']").each(function (i){$(this).attr("id", "variant[]");})   

});


</script>

        
    </section>
@endsection