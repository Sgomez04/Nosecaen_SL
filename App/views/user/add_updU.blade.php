@extends ('plantilla')
@section('cuerpo')
    <h1 class="page-header">
        @if ($id != null)
            Modificacion del Empleado {{ $id }}
        @else
            Nuevo Registro
        @endif
    </h1>

    <ol class="breadcrumb">
        <li><a href="listU">Usuarios</a></li>
        <li class="active">
            @if ($id != null)
                Empleado {{ $id }}
            @else
                Nuevo Registro
            @endif
    </ol>

    <form id="frm-users" action="addU?id={{ $id }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <p> ID Empleado: <input type="text" name="id_employer" class="form-control" value="{{ $id }}"
                        placeholder="Campo cargado por el sistema" readonly /> </p>
            </div>

            <div class="form-group">
                <label class="control-label" for="user">Usuario del Empeado: {!! ErrorShow('user', $error) !!}</label>
                <input type="text" name="user" class="form-control" value="{{ $user }}"
                    placeholder="Nombre de usuario del empleado" />

            </div>

            <div class="form-group">
                <label class="control-label" for="password"> Contraseña del empleado: {!! ErrorShow('password', $error) !!}</label>
                <input type="text" name="password" class="form-control" value="{{ $password }}"
                    placeholder="Contraseña del empleado" />
            </div>

            <div class="form-group">
                <label class="control-label" for="name"> Nombre del empleado: {!! ErrorShow('name', $error) !!}</label>
                <input type="text" name="name" class="form-control" value="{{ $name }}"
                    placeholder="Nombre del empleado" />

            </div>

            <div class="form-group">
                <label class="control-label" for="type"> Rol del empleado: </label>
                <br>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="Admin" checked> Admin</label>
                <label><INPUT TYPE="radio" NAME="estado" VALUE="Operario"> Operario</label>
                </p>
            </div>

            <div class="text-right">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
    </form>
@endsection
