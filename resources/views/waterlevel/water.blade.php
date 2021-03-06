<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="csrf-token" content="{{ Session::token() }}">

  <title>Water Level Monitoring</title>
  @include("dashboard.Header")
  <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
        }
        body { background-color: #000 }
</style>

</head>
<body>
    @include("dashboard.navbar")
<!-- partial:index.partial.html -->
<div class="battery onscreen">
    <div class="bubbles battery-bubbles">
        <span>&nbsp;</span>
    </div>
    <div  class="liquid liquid-bg-color">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="5px" viewBox="0 0 300 5" enable-background="new 0 0 300 5" xml:space="preserve">
            <path fill="#00fa57" class="wave" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
            c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
            c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z" />
        </svg>
    </div><!-- .liquid -->
</div>
<div class="battery-text onscreen">
    <span class="percentage"></span><small class="units"></small>
</div>
<div class="slider onscreen">
    <input value="0" class="vertical pointer" type="range" name="percentage" min="0" max="100" step="1" orient="vertical">
</div>
<div class="page-spacer"></div>
<div class="bubbles bottom-bubbles">
    <span>&nbsp;</span>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('/js/sc.js')}}"></script>


</body>
</html>
