<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ !empty($header_title) ? $header_title : '' }} - Property management system </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('public/assets') }}/img/favicon.png" rel="icon">
  <link href="{{ asset('public/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('public/assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('public/assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('public/assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('public/assets') }}/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('public/assets') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('public/assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('public/assets') }}/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('public/assets') }}/css/style.css" rel="stylesheet">


</head>

<body>
    @include('user.layouts._header')
    @include('user.layouts._sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>
    @include('user.layouts._footer')

      <!-- Vendor JS Files -->
  <script src="{{ asset('public/assets') }}/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('public/assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('public/assets') }}/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('public/assets') }}/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('public/assets') }}/vendor/quill/quill.min.js"></script>
  <script src="{{ asset('public/assets') }}/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('public/assets') }}/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('public/assets') }}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('public/assets') }}/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Template Main JS File -->
@yield('script')

</body>

</html>
