<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="author" content="viggo"/>
  <title>@option('site_name'){{ isset($title) ? '-' . $title : '' }}</title>
  <meta name="keywords"
        content="@option('site_keywords')">
  <meta name="description" content="@option('site_description')">
  <link rel="shortcut icon" href="@option('favicon')">
  @section('header_src_style')
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{asset('/assets/css/fonts/linecons/css/linecons.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/xenon-core.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/xenon-components.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/xenon-skins.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/nav.css')}}">
  @show
  @section('header_src_javascript')
    <script src="{{asset('/assets/js/jquery-1.11.1.min.js')}}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  @show
  <![endif]-->
  <!-- / FB Open Graph -->
  <meta property="og:type" content="article">
  <meta property="og:url" content="{!! !url('/') !!}">
  <meta property="og:title" content="@option('site_name')">
  <meta property="og:description"
        content="@option('site_description')">
  <meta property="og:image" content="@option('site_logo')">
  <meta property="og:site_name" content="@option('site_name')">
  <!-- / Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@option('site_name')">
  <meta name="twitter:description"
        content="@option('site_description')">
  <meta name="twitter:image" content="@option('site_logo')">
</head>

<body class="@yield('body_class')">
@yield('body_top_script')
@yield('content')
@section('body_bottom_src_script')
  <!-- Bottom Scripts -->
  <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/assets/js/TweenMax.min.js')}}"></script>
  <script src="{{asset('/assets/js/resizeable.js')}}"></script>
  <script src="{{asset('/assets/js/joinable.js')}}"></script>
  <script src="{{asset('/assets/js/xenon-api.js')}}"></script>
  <script src="{{asset('/assets/js/xenon-toggles.js')}}"></script>
  <!-- JavaScripts initializations and stuff -->
  <script src="{{asset('/assets/js/xenon-custom.js')}}"></script>
@show

</body>

</html>
