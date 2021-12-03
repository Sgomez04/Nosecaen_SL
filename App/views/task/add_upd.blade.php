@extends ('plantilla')
@section('cuerpo')
    <h1 class="page-header">
        @if ($id != null)
            Modificacion de la Tarea {{ $id }}
        @else
            Nuevo Registro
        @endif
    </h1>

    <ol class="breadcrumb">
        <li><a href="list">Tareas</a></li>
        <li class="active">
            @if ($id != null)
                Tarea {{ $id }}
            @else
                Nuevo Registro
            @endif
    </ol>

    <form id="frm-tarea" action="add?id={{ $id }}" method="post" enctype="multipart/form-data">

        @if ($type == 'admin')
            <div class="form-group">
                <p> ID Tarea: <input type="text" name="id_task" class="form-control" value="{{ $id }}"
                        placeholder="Campo cargado por el sistema" readonly /> </p>
            </div>

            <div class="form-group">
                <label class="control-label" for="persona">Persona de contacto: {!! ErrorShow('persona', $error) !!}</label>
                <input type="text" name="persona" class="form-control" value="{{ $persona }}"
                    placeholder="Nombre del contratante" />

            </div>

            <div class="form-group">
                <label class="control-label" for="telefono"> Teléfono/s contacto: {!! ErrorShow('telefono', $error) !!}</label>
                <input type="text" name="telefono" class="form-control" value="{{ $telefono }}"
                    placeholder="Telefono del contratante" />
            </div>

            <div class="form-group">
                <label class="control-label" for="descripcion"> Descripción: {!! ErrorShow('descripcion', $error) !!}</label>
                <input type="text" name="descripcion" class="form-control" value="{{ $desc }}"
                    placeholder="Descripcion de la tarea" />

            </div>

            <div class="form-group">
                <label class="control-label" for="correo"> Correo electrónico: {!! ErrorShow('correo', $error) !!}</label>
                <input type="text" name="correo" class="form-control" value="{{ $correo }}"
                    placeholder="Correo del contratante" />

            </div>

            <div class="form-group">
                <label class="control-label" for="direccion"> Direccion: {!! ErrorShow('direccion', $error) !!}</label>
                <input type="text" name="direccion" class="form-control" value="{{ $direccion }}"
                    placeholder="Direccion de la tarea a realizar" />

            </div>

            <div class="form-group">
                <label class="control-label" for="poblacion"> Poblacion: {!! ErrorShow('poblacion', $error) !!}</label>
                <input type="text" name="poblacion" class="form-control" value="{{ $poblacion }}"
                    placeholder="Poblacion de la tarea a realizar" />

            </div>

            <div class="form-group">
                <label class="control-label" for="cp"> Codigo Postal: {!! ErrorShow('cp', $error) !!}</label>
                <input type="text" name="cp" class="form-control" value="{{ $cp }}"
                    placeholder="Codigo Postal de la tarea a realizar" />

            </div>

            <div class="form-group">
                <label class="control-label" for="provincia"> Provincia: {!! ErrorShow('provincia', $error) !!}</label>
                <br>
                <select name="provincia">
                    <option value="" selected></option>
                    @foreach (TaskController::getInstance()->listarProv() as $p)
                        @if ($p['nombre'] == " {{ $provincia }}")
                            <option value="{{ $p['nombre'] }}" selected>{{ $p['nombre'] }}</option>
                        @else
                            <option value="{{ $p['nombre'] }}">{{ $p['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="persona"> Estado: </label>
                <br>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="P" checked> Pendiente</label>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="R"> Realizada</label>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="C"> Cancelada</label>
                </p>
            </div>

            <div class="form-group">
                <label class="control-label" for="fcreacion"> Fecha de creacion de la tarea:
                    {!! ErrorShow('fcreacion', $error) !!}</label>
                <input type="text" name="fcreacion" class="form-control" value="{{ $fcreacion }}"
                    placeholder="Fecha obtenida del sistema" readonly />
            </div>

            <div class="form-group">
                <label class="control-label" for="operario"> Operario encargado: {!! ErrorShow('operario', $error) !!}</label>
                <br>
                <select name="operario">
                    <option value="" selected></option>
                    @foreach (UserController::getInstance()->listarUsuarios() as $u)
                        @if ($u['user'] == $operario)
                            <option value="{{ $u['user'] }}" selected>{{ $u['user'] }}</option>
                        @else
                            <option value="{{ $u['user'] }}">{{ $u['user'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="fechaR"> Fecha de realización: {!! ErrorShow('fechaR', $error) !!}</label>
                <input type="text" name="fechaR" value="{{ $frealizacion }}" class="form-control datepicker"
                    placeholder="Fecha de realizacion de la tarea" />
            </div>

        @elseif($type == "operator")
            <div class="form-group">
                <label class="control-label" for="aa"> Anotaciones anteriores: {!! ErrorShow('aa', $error) !!}</label>
                <input type="text" name="aa" class="form-control" value="{{ $aa }}"
                    placeholder="Anotacion anterior a la realizacion de la tarea" />
            </div>

            <div class="form-group">
                <label class="control-label" for="ap"> Anotaciones posteriores: {!! ErrorShow('ap', $error) !!}</label>
                <input type="text" name="ap" class="form-control" value="{{ $ap }}"
                    placeholder="Anotacion anterior a la realizacion de la tarea" />
            </div>
        @endif
        <div class="text-right">
            <input type="submit" class="btn btn-success" value="Guardar">
        </div>

    </form>
@endsection
