@extends ('plantilla')

@section('link')

    <!-- Latest minified bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest minified bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ ASSETS_URL }}css/{{ $_SESSION['theme'] }}/changes.css" />

@endsection

@section('nav')
    <a href="{{ BASE_URL }}list?pag=1" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>
    @if ($type == 'admin')
        <a href="{{ BASE_URL }}listU?pag=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    @else
        <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
    @endif
    <a href="{{ BASE_URL }}profile?idU={{ $_SESSION['id'] }}" class="nav-item nav-link"><i
            class="fa fa-user"></i><span> Perfil</span></a>

@endsection

@section('cuerpo')

    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h4 class="modal-title w-100">AJUSTES DE LA APLICACION</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="frm-tarea" action="setting" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tema (colores): Actual -><div class="{{ $_SESSION['theme'] }}"></div>
                                </label>
                                <select name="theme" class="form-control selectpicker">
                                    @if ($_SESSION['theme'] == 'theme1')
                                        <option value="theme1" selected>Tema 1 (naranjado)</option>
                                        <option value="theme2">Tema 2 (azulado)</option>
                                        <option value="theme3">Tema 3 (morado)</option>
                                    @elseif($_SESSION['theme'] == 'theme2')
                                        <option value="theme1">Tema 1 (naranjado)</option>
                                        <option value="theme2" selected>Tema 2 (azulado)</option>
                                        <option value="theme3">Tema 3 (morado)</option>
                                    @else
                                        <option value="theme1">Tema 1 (naranjado)</option>
                                        <option value="theme2">Tema 2 (azulado)</option>
                                        <option value="theme3" selected>Tema 3 (morado)</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Numero de registros de tareas a mostrar en la lista (Max 5)</label>
                                @if (!$_POST)
                                    <input type="text" class="form-control" name="listT" placeholder="Escribe un numero"
                                        value="{{ $listT }}">
                                @elseif(ErrorShow('listT', $error) == '')
                                    <input type="text" class="form-control is-valid" name="listT"
                                        placeholder="Escribe un numero" value="{{ $listT }}">
                                @else
                                    <input type="text" class="form-control is-invalid" name="listT"
                                        placeholder="Escribe un numero" value="{{ $listT }}">
                                @endif
                            </div>
                            {!! ErrorShow('listT', $error) !!}

                            <div class="form-group">
                                <label for="">Numero de registros de empleados mostrados en la lista (Max 5)</label>
                                @if (!$_POST)
                                    <input type="text" class="form-control" name="listU" placeholder="Escribe un numero"
                                        value="{{ $listU }}">
                                @elseif(ErrorShow('listU', $error) == '')
                                    <input type="text" class="form-control is-valid" name="listU"
                                        placeholder="Escribe un numero" value="{{ $listU }}">
                                @else
                                    <input type="text" class="form-control is-invalid" name="listU"
                                        placeholder="Escribe un numero" value="{{ $listU }}">
                                @endif
                            </div>
                            {!! ErrorShow('listU', $error) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ BASE_URL }}list?pag=1">Cancelar</a>
                <input type="submit" class="btn btn-info" value="Guardar">
            </div>
            </form>
        </div>
    </div>
@endsection
