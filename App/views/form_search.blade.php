@extends ('plantilla')

@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ ASSETS_URL }}css/theme1/form.css" />

@endsection

@section('nav')
    <a href="{{ BASE_URL }}list?pag=1" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>
    @if ($type == 'admin')
        <a href="{{ BASE_URL }}listU?pagU=1" class="nav-item nav-link active"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    @else
        <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
    @endif
    <a href="#" class="nav-item nav-link active"><i class="fa fa-search"></i><span>Busqueda</span></a>
    <a href="{{ BASE_URL }}profile?idU={{ $_SESSION['id'] }}" class="nav-item nav-link"><i
            class="fa fa-user"></i><span> Perfil</span></a>

@endsection

@section('cuerpo')
    <center><b>
            <h1 class="page-header">
                Buesqueda Avanzada
        </b></h1>
    </center>

    <form id="frm-users" action="addU?id={{ $id }}" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user">ID empleado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        @if (!$_POST)
                            <input type=" text" name="id_employer" class="form-control" value="{{ $id }}"
                                placeholder="Campo cargado por el sistema" readonly />
                        @else
                            <input type=" text" name="id_employer" class="form-control is-valid"
                                value="{{ $id }}" placeholder="Campo cargado por el sistema" readonly />
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
