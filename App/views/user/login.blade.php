@extends ('plantilla')

@section('cuerpo')

<div class="centrar">	
    <div class="container cuerpo text-center">	
      <p><h2> Login de usuario:</h2></p>
    </div>
    <div class="container">
      <form  action="index.php/check" method="POST">
        <label for="name">Usuario:
          <input type="text" name="user" class="form-control" value="" /> 
        </label>
        <br/>
        <label for="password">Contraseña:
          <input type="password" name="password" class="form-control" value=""/>            
        </label>
        <br/>
        <label><input type="checkbox" name="recuerdo" <?php if(isset($_COOKIE['recuerdo'])){echo " checked";} ?> > Recuérdeme</label>
        <br/>     
        <label><input type="checkbox" name="abierta" <?php if(isset($_COOKIE['abierta'])){echo " checked"; }?> > Mantener la sesión abierta</label>
        <br/>       
        <br/>     
        <input type="submit" value="Enviar" name="submit" class="btn btn-success" />
      </form>
    </div>
  </div>  


@endsection
