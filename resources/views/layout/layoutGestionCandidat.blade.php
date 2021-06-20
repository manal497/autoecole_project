<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/chemin-vers-fontawesome/css/all.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    

    <--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-
   --
    
    
    <script src="https://cdn.jsdelivr.net/npm/tensorflow/tfjs/dist/tf.min.js"> </script>
     -->
    <title>DabaPermis</title>
</head>
<body>

  <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
    <a href="#" class="navbar-brand text-light mt-5">
        <img src="{{URL::asset('/images/image.jpeg')}}" alt="profile Pic" height="150" width="250">
    </a>
    <ul class="navbar-nav d-flex flex-column mt-5 w-100">
        <li class="nav-item w-100">
            <a href="{{route('home')}}" class="nav-link text-light pl-4"><i class="fas fa-home" style="margin-right:10px;"></i>Accueil</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('candidatlist')}}" class="nav-link text-light pl-4"><i class="fas fa-user" style="margin-right:10px;"></i>Candidats</a>
         </li>
        <li class="nav-item w-100">
              <a href="{{route('listRes')}}" class="nav-link text-light pl-4"><i class="fas fa-file-invoice-dollar" style="margin-right:10px;"></i>Facturations</a>
        </li>
        <li class="nav-item w-100">
            
            <a href="{{route('listeMoniteurs')}}" class="nav-link text-light pl-4"><i class="fas fa-user-tie" style="margin-right:10px;"></i>Moniteurs</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('seances.index')}}" class="nav-link text-light pl-4"><i class="fas fa-book-reader" style="margin-right:10px;"></i>Séances</a>
        </li>
        <li class="nav-item w-100">
          <a href="{{route('vehicules.index')}}" class="nav-link text-light pl-4"><i class="fas fa-parking" style="margin-right:10px;" ></i>Parking</a>
      </li>
      <li class="nav-item w-100">
        <a href="{{route('ecole')}}" class="nav-link text-light pl-4"><i class="fas fa-school" style="margin-right:10px;"></i>Ecole</a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link text-light pl-4" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true" style="margin-right:10px;"></i>Déconnexion
         </a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
</nav>


<section class="p-4 my-container">
  <button class="btn my-4" id="menu-btn"><i class="fas fa-bars"></i></button>
  <div class="content">
  <div class="container-fluid">

  @yield('contentCandidat')
  
  </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script><!-- custom js -->

<script>
    var menu_btn = document.querySelector("#menu-btn")
    var sidebar = document.querySelector("#sidebar")
    var container = document.querySelector(".my-container")
    menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav")
        container.classList.toggle("active-cont")
     })
</script>
      </body>
      </html>











































