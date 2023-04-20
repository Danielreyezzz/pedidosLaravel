<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        @vite(['resources/js/app.js', 'resources/css/app.scss', 'resources/css/custom.css' ])
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbarColor ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
              <ul class="row flex-row justify-content-center align-items-center">
                <li class="nav-item logui mb-2 text-center col-lg-3">
                    <img class="logo" src="{{URL::asset('Logo_QMado_Ver2_transp.png')}}" alt="logo">
                </li>
                <li class="nav-item col-lg-3">
                  <a class="nav-link text-center" href="../welcome">Pedidos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item col-lg-3">
                  <a class="nav-link text-center" href="../finalizado">Pedidos finalizados</a>
                </li>
                <li class="nav-item col-lg-3 justify-content-center d-flex">
                  <div class="dropdown">
                    <button class="border-0 navbarColor" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#FF003F" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form action="{{route('panelusuario')}}" method="get">
                            <input type="submit" value="Perfil" class="dropdown-item">
                          </form>                      <form action="{{route('logout')}}" method="get">
                            <form action="{{route('logout')}}" method="get">
                                <input type="submit" value="Logout" class="dropdown-item">
                              </form>                      </form>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
          <main>
            <h1 class="text-center pt-5">Número de pedido</h1>

            <div class="grandiv">
            <div class="card border-3 div" >

              <div class="accordion p-0 " id="accordionExample">
                <div class="card">
                  <div class="card-header py-3" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Informacion pedido:
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        @foreach ($pedidos as $order)
                      
                        <h4>Fecha inicio: <span class=" text-black">{{$order->fecha_inicio}}</span></h4>
                        
                        <h4>Fecha fin: <span class=" text-black"></span>{{$order->fecha_entrega}}</h4>
                        
                        <h4>Observacion: <span class=" text-black">{{$order->observacion}}</span></h4>
                        
                        @endforeach
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header py-3" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Informacion de la direccion:
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        
                        @foreach ($pedidos as $order)
                        <h4 >Provincia: <span class=" text-black">{{$order->provincia}}</span></h4>
                        
                        <h4 >Poblacion: <span class=" text-black">{{$order->poblacion}}</span></h4>
                        
                        <h4 >Telefono: <span class=" text-black">{{$order->telefono}}</span></h4>
                        
                        <h4 >Direccion: <span class=" text-black">{{$order->direccion}}</span></h4>
                        
                        <h4 >Nombre: <span class=" text-black">{{$order->nombre_usuario}}</span></h4>
                        
                        <h4 >Apellidos: <span class=" text-black">{{$order->apellidos}}</span></h4>
                        
                        <h4>Email: <span class=" text-black">{{$order->email}}</span></h4>
                        
                       
                        @endforeach
                    </div>
                  </div>
                </div>
            </div>

          </div>

          <div class="div">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.518826048664!2d-5.9275161847349995!3d37.40121007982922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126f0d94333a4b%3A0xc801daeab863a6fe!2sVirtualSoft%20Studios!5e0!3m2!1ses!2ses!4v1679307951312!5m2!1ses!2ses"  style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>
          </main>
          <div class="container d-flex justify-content-end py-5">
          <a type="button" class="btn btn-danger" href="../finalizado">Volver</a>
        </div>

        <div class="container">
          <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Direccion</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Dudas</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contacto</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 QMADO</p>
          </footer>
        </div>
    </body>
</html>
