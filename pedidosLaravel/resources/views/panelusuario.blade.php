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
                        <form action="{{route('panelusuario')}}" method="get">
                            <input type="submit" value="Perfil" class="dropdown-item">
                          </form>
                      <form action="{{route('logout')}}" method="get">
                      <input type="submit" value="Logout" class="dropdown-item">
                    </form>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
           <h1 class="text-center py-5">Tu perfil</h1>
           <div class=" border border-dark rounded container">
            <table class="table container">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center py-3">Nombre</th>
                        <th class="text-center py-3">Email</th>
                        <th class="text-center py-3">Fecha de registro</th>
                    </tr>
                </thead>
                        <tbody>
                                <tr class="text-center">
                                    @foreach($administradores as $admin)
                                    <td>{{$admin->nombre}}</td>
                                    <td>{{$admin->usuario}}</td>
                                    @endforeach
                                    <td>
                                        <div class="container">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Cambiar contraseña
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5>Cambiar la contraseña:</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                            <div class="modal-body">
                                                                <div class="container w-50 pt-5 mt-2 rounded bg-danger formulario pb-3 mt-5">
                                                                    <form method="post" action="{{route('contra')}}" class="text-white">
                                                                        @csrf
                                                                        <div class="form-outline mb-4">
                                                                            <label class="form-label" for="oldpassword">Antigua contraseña</label>
                                                                              <input name="oldpassword" type="password"  class="form-control border border-3 border-dark"/>
                                                                            </div>
                                                                        <div class="form-outline mb-4">
                                                                        <label class="form-label" for="password">Contraseña</label>
                                                                          <input name="password" type="password"  class="form-control border border-3 border-dark"/>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                          <div class="col d-flex justify-content-center">
                                                                            <!-- Checkbox -->
                                                                            {{-- <div class="form-check">
                                                                              <input class="form-check-input border border-3 border-dark" type="checkbox" value=""  />
                                                                              <label class="form-check-label" for="form2Example31">Recordar datos</label>
                                                                            </div> --}}
                                                                          </div>
                                                                          {{-- <div class="col">
                                                                            <a href="#!">Olvidaste la contraseña</a>
                                                                          </div> --}}
                                                                        </div>


                                                                        <button type="submit" class="btn btn-light btn-block mb-4 border border-3 border-dark">Cambiar contraseña</button>

                                                                      </form>
                                                                      @if($errors->any())
                                                                      <h4>{{$errors->first()}}</h4>
                                                                      @endif
                                                                  </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
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
