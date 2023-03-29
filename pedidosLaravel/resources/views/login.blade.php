<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container d-flex justify-content-center mt-3">
        <img src="{{URL::asset('Logo_QMado_Ver2_transp.png')}}" alt="Logo" id="logologin">
    </div>
<div class="container w-50 pt-5 mt-5 rounded bg-danger formulario pb-4">
    <form method="post" action="{{route('inicia-sesion')}}" class="container text-white">
        @csrf
        <div class="form-outline mb-4">
          <input name="usuario" type="email" class="form-control border border-3 border-dark"/>
          <label class="form-label" for="usuario">Email</label>
        </div>
        <div class="form-outline mb-4">
          <input name="contrasea" type="password" class="form-control border border-3 border-dark"/>
          <label class="form-label" for="contrasea">Contraseña</label>
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


        <button type="submit" class="btn btn-light btn-block mb-4 border border-3 border-dark">Submit</button>

      </form>
      @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
  </div>
    </div>
</body>
</html>
