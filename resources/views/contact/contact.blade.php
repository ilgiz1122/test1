@extends('layouts.app')

@section('content')
<style>
    @font-face {
  font-family: Montserrat-Regular;
  src: url('{{asset('')}}/contact/fonts/montserrat/Montserrat-Regular.ttf'); 
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('{{asset('')}}/contact/fonts/montserrat/Montserrat-Bold.ttf'); 
}

@font-face {
  font-family: Montserrat-ExtraBold;
  src: url('{{asset('')}}/contact/fonts/montserrat/Montserrat-ExtraBold.ttf'); 
}

@font-face {
  font-family: Montserrat-Medium;
  src: url('{{asset('')}}/contact/fonts/montserrat/Montserrat-Medium.ttf'); 
}

/*---------------------------------------------*/
input {
	outline: none;
	border: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder { color: #aaaaaa; }
input:-moz-placeholder { color: #aaaaaa; }
input::-moz-placeholder { color: #aaaaaa; }
input:-ms-input-placeholder { color: #aaaaaa; }

textarea::-webkit-input-placeholder { color: #aaaaaa; }
textarea:-moz-placeholder { color: #aaaaaa; }
textarea::-moz-placeholder { color: #aaaaaa; }
textarea:-ms-input-placeholder { color: #aaaaaa; }

/*---------------------------------------------*/
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}


/*------------------------------------------------------------------
[  ]*/
.contact100-pic {
  width: 310px;
  padding-top: 55px;
}

.contact100-pic img {
  max-width: 100%;
}


/*------------------------------------------------------------------
[  ]*/
.contact100-form {
  width: 390px;
}

.contact100-form-title {
  display: block;
  font-family: Montserrat-ExtraBold;
  font-size: 24px;
  color: #333333;
  line-height: 1.2;
  text-align: left;
  padding-bottom: 36px;
}

input.input100 {
  height: 50px;
  border-radius: 25px;
  padding: 0 30px 0 50px;
}

input.input100[name="email"] {
  padding: 0 30px 0 54px;
}

textarea.input100 {
  min-height: 150px;
  border-radius: 25px;
  padding: 14px 30px;
}

/*---------------------------------------------*/
.wrap-input100 {
  position: relative;
  width: 100%;
  z-index: 1;
  margin-bottom: 10px;
}

.input100 {
  display: block;
  width: 100%;
  background: #e6e6e6;
  font-family: Montserrat-Bold;
  font-size: 15px;
  line-height: 1.5;
  color: #666666;
}


/*------------------------------------------------------------------
[ Focus ]*/
.focus-input100 {
  display: block;
  position: absolute;
  border-radius: 25px;
  bottom: 0;
  left: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  box-shadow: 0px 0px 0px 0px;
  color: rgba(132,106,221, 0.5);
}

.input100:focus + .focus-input100 {
  -webkit-animation: anim-shadow 0.5s ease-in-out forwards;
  animation: anim-shadow 0.5s ease-in-out forwards;
}

@-webkit-keyframes anim-shadow {
  to {
    box-shadow: 0px 0px 60px 25px;
    opacity: 0;
  }
}

@keyframes anim-shadow {
  to {
    box-shadow: 0px 0px 60px 25px;
    opacity: 0;
  }
}

.symbol-input100 {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  position: absolute;
  border-radius: 25px;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding-left: 30px;
  pointer-events: none;
  color: #aaaaaa;
  font-size: 15px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-input100 + .symbol-input100 {
  color: #846add;
  padding-left: 22px;
}

/*------------------------------------------------------------------
[ Button ]*/
.container-contact100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 20px;
}

.contact100-form-btn {
  width: 100%;
  height: 50px;
  border-radius: 25px;
  background: #846add;
  font-family: Montserrat-Bold;
  font-size: 15px;
  line-height: 1.5;
  color: #fff;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 25px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn:hover {
  background: #333333;
}

/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 1200px) {
  .contact100-pic {
    width: 33.5%;
  }

  .contact100-form {
    width: 44%;
  }
}

@media (max-width: 992px) {
  .wrap-contact100 {
    padding: 110px 80px 157px 90px;
  }

  .contact100-pic {
    width: 35%;
  }

  .contact100-form {
    width: 55%;
  }
}

@media (max-width: 768px) {
  .wrap-contact100 {
    padding: 110px 80px 157px 80px;
  }

  .contact100-pic {
    display: none;
  }

  .contact100-form {
    width: 100%;
  }
}

@media (max-width: 576px) {
  .wrap-contact100 {
    padding: 110px 15px 157px 15px;
  }
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: white;
  border: 1px solid #c80000;
  border-radius: 13px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 8px;
  pointer-events: none;

  font-family: Montserrat-Medium;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 15px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 13px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}
.wrap-contact100 {
  background: #fff;
  border-radius: 10px;
  overflow: hidden;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
 .two{
    will-change: transform;
    transition: transform 400ms;
  }
  .two:hover {
    transition: transform 300ms;
      transform: translateY(-2px);
  }


</style>

<!--===============================================================================================-->

<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('')}}/contact/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('')}}/contact/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('')}}/contact/vendor/select2/select2.min.css">
<!--===============================================================================================-->




    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="container-fluid">
          @if (session('success'))
              <div class="alert alert-success mt-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h6><i class="icon fa fa-check"></i>{{ session('success') }}</h6>
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
                          Байланышуу
                      </li>
                  </ol>
            </div><!-- /.container-fluid -->
          </section>
        	<div class="row pt-2 pb-3 ">
        		<div class="col-md-6 text-center">
        			<div class="card card-body pt-3 pb-0 mb-2 mt-2 two">
                  <div class="row align-items-center block23">
                      <a href="https://wa.me/+996505919600?text="></a>
                      <div class="col-auto">
                          <span style="font-size: 5em; color: #28a745;">
                            <i class="fab fa-whatsapp"></i>
                          </span>
                      </div>
                      <div class="col">
                          <p class="text-muted text-center mb-0 pt-2"><b>WhatsApp аркылуу байланышуу</b></p>
                          <p class="text-muted text-center mb-0 pb-2">0505 919 600</p>
                      </div>
                  </div>
              </div>
        		</div>
        		<div class="col-md-6 text-center">
        	     <div class="card card-body pt-3 pb-0  mb-2 mt-2 two">
                  <div class="row align-items-center  block23">
                      <a href="https://t.me/ilgiz1209?text="></a>
                      <div class="col-auto">
                          <span style="font-size: 5em; color: #17a2b8;">
                            <i class="fab fa-telegram-plane"></i>
                          </span>
                      </div>
                      <div class="col">
                          <p class="text-muted text-center mb-0 pt-2"><b>Telegram аркылуу байланышуу</b></p>
                          <p class="text-muted text-center mb-0 pb-2"><a href="https://t.me/ilgiz1209">ilgiz1209</a></p>
                      </div>
                  </div>
              </div>
        		</div>          
        	</div>
        	
        	<div class="row wrap-contact100 pt-5 pb-5 mt-2">
        		<div class="col-md-6 contact100-pic js-tilt text-center" data-tilt>
								<img src="{{asset('')}}/contact/images/img-01.png" alt="IMG">
        		</div>
        		<div class="col-md-6  mb-2">
              @if (\Auth::user())
        			 <form class="contact100-form validate-form" action="{{ route('contact_sms_store1') }}" method="POST">
              @else
                <form class="contact100-form validate-form" action="{{ route('contact_sms_store2') }}" method="POST">
              @endif
              @csrf
    							<span class="contact100-form-title">
    								Билдирүү калтыруу (sms)
    							</span>

    							<div class="wrap-input100 validate-input" data-validate = "Аты-жөнүңүздү жазыңыз!">
                    @if (\Auth::user())
                     <input class="input100" type="text" name="name" placeholder="Аты-жөнүңүз" autocomplete="off" readonly="" value="{{\Auth::user()->name}}">
                    @else
                      <input class="input100" type="text" name="name" placeholder="Аты-жөнүңүз" autocomplete="off">
                    @endif
    								<span class="focus-input100"></span>
    								<span class="symbol-input100">
    									<i class="fa fa-user" aria-hidden="true"></i>
    								</span>
    							</div>

    							<div class="wrap-input100 validate-input" data-validate = "Телефонуңузду жазыңыз!">
                    @if (\Auth::user())
                    <input type="text" class="input100" data-inputmask='"mask": "0(999) 999-999"' data-mask name="phone" placeholder="0(709) 999-999" autocomplete="off" value="{{\Auth::user()->phone}}">
                    @else
                      <input type="text" class="input100" data-inputmask='"mask": "0(999) 999-999"' data-mask name="phone" placeholder="0(709) 999-999" autocomplete="off">
                    @endif
    								<span class="focus-input100"></span>
    								<span class="symbol-input100">
    									<i class="fas fa-phone" aria-hidden="true"></i>
    								</span>
    							</div>

    							<div class="wrap-input100 validate-input" data-validate = "Билдирүү калтырыңыз!">
    								<textarea class="input100" name="sms" placeholder="Билдирүү (sms)"></textarea>
    								<span class="focus-input100"></span>
    							</div>

    							<div class="container-contact100-form-btn">
    								<button class="contact100-form-btn">
    									Жөнөтүү
    								</button>
    							</div>
  						  </form>
        		</div>
        	</div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
<!--===============================================================================================-->
	<script src="{{asset('')}}/contact/vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('')}}/contact/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('')}}/contact/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('')}}/contact/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script type="text/javascript">
var target='.block23';
jQuery(target).each(function(){
    jQuery(this).click(function(){
        location = jQuery(this).find('a').attr('href');});
    jQuery(this).css('cursor','pointer');
});
</script>
@endsection