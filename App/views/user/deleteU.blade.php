@extends ('plantilla')

@section("cuerpo")
    <h1>Eliminacion del usuario</h1>
    <p>¿Esta segur@ de que desea eliminar este usuario?</p>
    <a href="<?=BASE_URL?>delU?idU={{$id}}">Eliminar</a>
    <a href="<?=BASE_URL?>listU">Volver Atras</a></button>

@endsection