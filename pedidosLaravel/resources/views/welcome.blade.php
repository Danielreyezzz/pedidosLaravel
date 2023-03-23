<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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
                  <a class="nav-link text-center" href="welcome">Pedidos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item col-lg-3">
                  <a class="nav-link text-center" href="finalizado">Pedidos finalizados</a>
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
                      <a class="dropdown-item" href="#">Perfil</a>
                      <a class="dropdown-item" href="#">Log out</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
           <h1 class="text-center py-5">Pedidos</h1>
           <div class=" border border-dark rounded container">
            <table class="table container">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center py-3">ID</th>
                        <th class="text-center py-3">Dirección</th>
                        <th class="text-center py-3">Entregado</th>
                        <th class="text-center py-3">Comentario</th>
                        <th class="text-center py-3">Hora de entrega</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                                <tr class="text-center">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->direccion }}</td>
                                    <td>No</td>
                                    <td>{{ $order->comentario }}</td>
                                    <td>{{ $order->hora_entrega }}</td>
                                    <td><form action="{{ route('detalle', $order) }}" method="get"
                                        class="d-inline">
                                        <button class="btn btn-danger btn-sm" type="submit">Detalles</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @if ($errors->any())
                    <div>
                        {!! implode('', $errors->all(':message'))!!}
                    </div>
                @endif
                @if (session('mensaje'))
                <div class="alert alert-success mt-3">
                    {{session('mensaje')}}
                </div>
            @endif
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
