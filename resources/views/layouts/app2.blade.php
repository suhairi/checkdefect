
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Check House Defect</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="{{{ URL::asset('https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css') }}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Favicons -->
<link rel="apple-touch-icon" href="{{{ URL::asset('img/apple-touch-icon.png') }}}" sizes="180x180">
<link rel="icon" href="{{{ URL::asset('img/favicon-32x32.png') }}}" sizes="32x32" type="image/png">
<link rel="icon" href="{{{ URL::asset('img/favicon-16x16.png') }}}" sizes="16x16" type="image/png">
<link rel="manifest" href="{{{ URL::asset('img/manifest.json') }}}">
<link rel="mask-icon" href="{{{ URL::asset('img/safari-pinned-tab.svg') }}}" color="#563d7c">
<link rel="icon" href="{{{ URL::asset('img/favicon.ico') }}}">
<meta name="msapplication-config" content="{{{ URL::asset('img/browserconfig.xml') }}}">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{{ URL::asset('css/starter-template.css') }}}" rel="stylesheet">
    <script src="{{{ URL::asset('js/vendor/jquery/jquery.min.js') }}}"></script>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Check Defect</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
<!--       <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
<!--       <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
      @if(Auth::user()->email == 'kowndkrul@gmail.com' || Auth::user()->email == 'suhairi81@gmail.com')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{ route('profile') }}">Semak Permohonan</a>
            <a class="dropdown-item" href="{{ route('house') }}">Senarai Mohon</a>
          </div>
        </li>
      @endif


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="{{ route('profile') }}">Maklumat Diri</a>
          <a class="dropdown-item" href="{{ route('house') }}">Maklumat Rumah</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aduan</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="{{ route('complaint') }}">Rekod Aduan</a>
          <a class="dropdown-item" href="#">Senarai Aduan</a>
          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pdf') }}">PDF</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('mail') }}">Mail</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('whatsapp') }}">Whatsapp</a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <font color="grey"><b>{{ __('Logout') }}</b></font>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </li>

    </ul>
  </div>
</nav>

<main role="main" class="container">

@yield('content')

</main><!-- /.container -->
      
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    </body>
</html>
