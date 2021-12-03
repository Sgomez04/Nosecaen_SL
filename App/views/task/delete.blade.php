@extends ('plantilla')

@section("cuerpo")
    <h1>Eliminacion de la tarea</h1>
    <p>¿Esta segur@ de que desea eliminar la tarea?</p>
    <a href="<?=BASE_URL?>del?id={{$id}}">Eliminar</a>
    <a href="<?=BASE_URL?>list">Volver Atras</a></button>

@endsection