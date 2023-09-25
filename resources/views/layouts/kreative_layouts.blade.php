

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Креатив-Таалим - @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="https://nonsi.kg/public/packages/barryvdh/elfinder/css/elfinder.min.css">
  <link href="https://nonsi.kg/public/admin/dist/css/colorbox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/toastr/toastr.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

  <link rel="stylesheet" href="https://nonsi.kg/public/admin/plugins/summernote/summernote-bs4.css">
  <!-- Редактор TinyMCE!-->
<link rel="stylesheet" href="https://nonsi.kg/public/admin/dist/css/intlTelInput.css">
<link rel="stylesheet" href="https://nonsi.kg/public/admin/dist/css/bs-stepper.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">-->


<script src="https://cdn.tiny.cloud/1/lhjb382nf0h8g4j2g44se02ph3w9mqmeyi3yfs7t9cjkgaxb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-GLF9K2HTTR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GLF9K2HTTR');
  </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
    <style>
html {
  scroll-behavior: smooth; /* свойство scroll-behavior не наследуется, применяется к прокручиваемым блокам */ 
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center d-flex">
      <div class="spinner-border text-info" role="status" style="width: 3rem; height: 3rem;">
        <span class="sr-only">Loading...</span>
      </div>
  </div> -->

 


  <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper m-0">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
  
       



</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://nonsi.kg/public/packages/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://nonsi.kg/public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- Bootstrap 4<script src="https://nonsi.kg/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="https://nonsi.kg/public/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="https://nonsi.kg/public/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="https://nonsi.kg/public/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="https://nonsi.kg/public../public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="https://nonsi.kg/public/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="https://nonsi.kg/public/admin/plugins/moment/moment.min.js"></script>
<script src="https://nonsi.kg/public/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="https://nonsi.kg/public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="https://nonsi.kg/public/admin/plugins/summernote/summernote-bs4.js"></script>

<script src="https://nonsi.kg/public/admin/plugins/summernote/lang/summernote-ru-RU.js"></script>
<!-- overlayScrollbars -->
<script src="https://nonsi.kg/public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="https://nonsi.kg/public/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://nonsi.kg/public/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://nonsi.kg/public/admin/dist/js/pages/dashboard.js"></script>
<!-- те которые я добавил -->
<script src="https://nonsi.kg/public/admin/admin.js"></script>
<script type="text/javascript" src="https://nonsi.kg/public/admin/dist/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="https://nonsi.kg/public/packages/barryvdh/elfinder/js/standalonepopup2.js"></script>
<script type="text/javascript" src="https://nonsi.kg/public/admin/dist/js/bootstrap-filestyle.js"></script>

<script src="https://nonsi.kg/public/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="https://nonsi.kg/public/admin/plugins/toastr/toastr.min.js"></script>
<script src="https://nonsi.kg/public/admin/plugins/moment/moment.min.js"></script>
<script src="https://nonsi.kg/public/admin/plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

<!-- Для добавления материалов -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>


<script>

$(function () {
  $('[data-mask]').inputmask();
 });




</script>

</body>
</html>