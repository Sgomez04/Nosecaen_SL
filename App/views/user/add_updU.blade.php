@extends ('plantilla')

@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ ASSETS_URL }}css/theme1/form.css" />

@endsection

@section('nav')
<a href="{{BASE_URL}}list?pag=1" class="nav-item nav-link"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
@if($type =='admin')
        <a href="{{BASE_URL}}listU?pagU=1" class="nav-item nav-link active"><i
        class="fa fa-users"></i><span>Empleados</span></a>
@else
        <a href="#" class="nav-item nav-link active"><i
        class="fa fa-users"></i><span>Empleados</span></a>
@endif
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<a href="{{BASE_URL}}profile?idU={{$_SESSION['id']}}" class="nav-item nav-link"><i class="fa fa-user"></i><span> Perfil</span></a>

@endsection

@section('cuerpo')
    <center><b>
            <h1 class="page-header">
                @if ($id != null)
                    Modificacion del Empleado "{{ $user }}"
                @else
                    Nuevo Registro
                @endif
        </b></h1>
    </center>
    @if ($eprofile == '')
        <ol class="breadcrumb">
            <li><a href="listU?pagU=1">Usuarios</a></li>
            <li class="active">
                @if ($id != null)
                    Empleado {{ $user }}
                @else
                    Nuevo Registro
                @endif
            </li>
        </ol>
    @else
        <ol class="breadcrumb">
            <li><a href="profile?idU={{ $id }}">Perfil</a></li>
            <li class="active">Empleado {{ $user }}</li>
        </ol>
    @endif

    <form id="frm-users" action="addU?id={{ $id }}" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        <fieldset>
            <div class="form-group" {{ $eprofile }}>
                <label class="col-md-4 control-label" for="user">ID empleado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        @if (!$_POST)
                            <input type=" text" name="id_employer" class="form-control" value="{{ $id }}"
                                placeholder="Campo cargado por el sistema" readonly />
                        @else
                            <input type=" text" name="id_employer" class="form-control is-valid" value="{{ $id }}"
                                placeholder="Campo cargado por el sistema" readonly />
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="user">Usuario del empeado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        @if (!$_POST)
                            <input type="text" name="user" class="form-control" value="{{ $user }}"
                                placeholder="Nombre del contratante" />
                        @elseif(ErrorShow('user', $error) == '')
                            <input type="text" name="user" class="form-control is-valid" value="{{ $user }}"
                                placeholder="Nombre de usuario del empleado" />
                        @else
                            <input type="text" name="user" class="form-control is-invalid" value="{{ $user }}"
                                placeholder="Nombre de usuario del empleado" />
                        @endif
                    </div>
                    {!! ErrorShow('user', $error) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Contraseña del empleado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                        @if (!$_POST)
                            <input type="text" name="password" class="form-control" value="{{ $password }}"
                                placeholder="Nombre del contratante" />
                        @elseif(ErrorShow('password', $error) == '')
                            <input type="text" name="password" class="form-control is-valid" value="{{ $password }}"
                                placeholder="Contraseña del empleado" />
                        @else
                            <input type="text" name="password" class="form-control is-invalid" value="{{ $password }}"
                                placeholder="Contraseña del empleado" />
                        @endif
                    </div>
                    {!! ErrorShow('password', $error) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nombre del empleado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                        @if (!$_POST)
                            <input type="text" name="name" class="form-control" value="{{ $name }}"
                                placeholder="Nombre del contratante" />
                        @elseif(ErrorShow('name', $error) == '')
                            <input type="text" name="name" class="form-control is-valid" value="{{ $name }}"
                                placeholder="Nombre personal del empleado" />
                        @else
                            <input type="text" name="name" class="form-control is-invalid" value="{{ $name }}"
                                placeholder="Nombre personal del empleado" />
                        @endif
                    </div>
                    {!! ErrorShow('name', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $eprofile }}>
                <label class="col-md-4 control-label" for="type"> Rol del empleado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        @if ($type == 'admin')
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="estado" VALUE="Admin" checked> Administrador</label>
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="estado" VALUE="Operario"> Operario</label>
                        @else
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="estado" VALUE="Admin"> Administrador</label>
                            <label>&nbsp &nbsp<INPUT TYPE="radio" NAME="estado" VALUE="Operario" checked> Operario</label>
                        @endif
                    </div>
                </div>
            </div>

            <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </fieldset>
    </form>
@endsection
