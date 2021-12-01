@extends ('layouts/plantilla');

@section("cuerpo")
<h1 class="page-header">
    @if($id != null)
    Modificacion de la Tarea {{$id}}
    @else
    Nuevo Registro
    @endif
</h1>

<ol class="breadcrumb">
    <li><a href="list">Tareas</a></li>
    <li class="active">
        @if($id != null)
        Tarea {{$id}}
        @else
        Nuevo Registro
        @endif
        
</ol>

<form id="frm-tarea" action="add?id={{$id}}" method="post">
    <div class="form-group">
        <p> ID Tarea:  <input type="text" name="id_task" class="form-control" value="{{$id}}" placeholder="Campo cargado por el sistema"  readonly/> </p>
    </div>

    <div class="form-group">
        <p> Persona de contacto: <input type="text" name="persona" class="form-control" value="{{$persona}}" placeholder="Nombre del contratante" /> </p>
    </div>

    <div class="form-group">
        <p> Teléfono/s contacto: <input type="text" name="telefono" class="form-control" value="{{$telefono}}" placeholder="Telefono del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Descripción: <input type="text" name="descripcion" class="form-control" value="{{$desc}}" placeholder="Descripcion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Correo electrónico: <input type="text" name="correo" class="form-control" value="{{$correo}}" placeholder="Correo del contratante"/> </p>
    </div>

    <div class="form-group">
        <p> Direccion: <input type="text" name="direccion" class="form-control" value="{{$direccion}}" placeholder="Direccion de la tarea a realizar"/>  </p>
    </div>

    <div class="form-group">
        <p> Poblacion: <input type="text" name="poblacion" class="form-control" value="{{$poblacion}}" placeholder="Poblacion de la tarea a realizar"/> </p>
    </div>

    <div class="form-group">
        <p> Codigo Postal: <input type="text" name="cp" class="form-control" value="{{$cp}}" placeholder="Codigo Postal de la tarea a realizar"/> </p>
    </div>

    <div class="form-group">
        <p>
            Provincia:
            <select name="provincia">
                <!-- <option value="value1">Value 1</option> -->
            </select>
        </p>
    </div>

    <div class="form-group">
        <p>
            Estado: <br>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="P" checked>Pendiente</label>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="R">Realizada</label>
            <label><INPUT TYPE="radio" NAME="estado" VALUE="C">Cancelada</label>
        </p>
    </div>

    <div class="form-group">
        <p> Fecha de creacion de la tarea: <input type="text" name="fcreacion" class="form-control" value="{{$fcreacion}}" placeholder="Fecha obtenida del sistema" readonly />  </p>
    </div>

    <div class="form-group">
        <p> Operario encargado: <input type="text" name="operario" class="form-control" value="{{$operario}}" placeholder="Operario encargado de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Fecha de realización: <input type="text" name="fechaR" value="{{$frealizacion}}" class="form-control datepicker" placeholder="Fecha de realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones anteriores: <input type="text" name="aa" class="form-control" value="{{$aa}}" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="form-group">
        <p> Anotaciones posteriores: <input type="text" name="ap" class="form-control" value="{{$ap}}" placeholder="Anotacion anterior a la realizacion de la tarea"/> </p>
    </div>

    <div class="text-right">
        
        <input type="submit" class="btn btn-success" value="Guardar"></input>
    </div>

</form>
@endsection