<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
rel="stylesheet"
/>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                         <!-- Carousel wrapper -->
<div
id="carouselBasicExample"
class="carousel slide carousel-fade"
data-mdb-ride="carousel"
>
<!-- Indicators -->
<div class="carousel-indicators">
  <button
    type="button"
    data-mdb-target="#carouselBasicExample"
    data-mdb-slide-to="0"
    class="active"
    aria-current="true"
    aria-label="Slide 1"
  ></button>
  <button
    type="button"
    data-mdb-target="#carouselBasicExample"
    data-mdb-slide-to="1"
    aria-label="Slide 2"
  ></button>
  <button
    type="button"
    data-mdb-target="#carouselBasicExample"
    data-mdb-slide-to="2"
    aria-label="Slide 3"
  ></button>
</div>

<!-- Inner -->
<div class="carousel-inner">
  <!-- Single item -->
  <div class="carousel-item active">
    <img
      src="{{URL::asset('/images/m1.jpeg')}}"
      class="d-block w-100"
      alt="..." height="425" width=100%
    />
    <div class="carousel-caption d-none d-md-block">
      
    </div>
  </div>

  <!-- Single item -->
  <div class="carousel-item">
    <img
      src="{{URL::asset('/images/m2.jpeg')}}"
      class="d-block w-100"
      alt="..." height="425" width=100%
    />
    <div class="carousel-caption d-none d-md-block">
     
    </div>
  </div>


  <!-- Single item -->
  <div class="carousel-item">
    <img
      src="{{URL::asset('/images/m4.jpg')}}"
      class="d-block w-100"
      alt="..." height="425" width=100%
    />
    <div class="carousel-caption d-none d-md-block">
      
    </div>
  </div>
</div>
<!-- Inner -->

<!-- Controls -->
<button
  class="carousel-control-prev"
  type="button"
  data-mdb-target="#carouselBasicExample"
  data-mdb-slide="prev"
>
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button
  class="carousel-control-next"
  type="button"
  data-mdb-target="#carouselBasicExample"
  data-mdb-slide="next"
>
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
</div>
<!-- Carousel wrapper -->


        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
</body>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
</html>