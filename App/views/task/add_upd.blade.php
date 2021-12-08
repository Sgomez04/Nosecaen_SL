@extends ('plantilla')

@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ ASSETS_URL }}css/theme1/form.css" />

@endsection

@section('nav')
<a href="{{BASE_URL}}list?pag=1" class="nav-item nav-link active"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
@if($type =='admin')
        <a href="{{BASE_URL}}listU?pagU=1" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
@else
        <a href="#" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
@endif
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<a href="{{BASE_URL}}profile?idU={{$_SESSION['id']}}" class="nav-item nav-link"><i class="fa fa-user"></i><span> Perfil</span></a>

@endsection

@section('cuerpo')
    <center>
        <h1 class="page-header">
            @if ($id != null)
                Modificacion de la Tarea {{ $id }}
            @else
                Nuevo Registro
            @endif
        </h1>
    </center>
    <ol class="breadcrumb">
        <li><a href="list?pag=1">Tareas</a></li>
        <li class="active">
            @if ($id != null)
                Tarea {{ $id }}
            @else
                Nuevo Registro
            @endif
    </ol>

    <form id="frm-tarea" action="add?id={{ $id }}" method="POST" enctype="multipart/form-data"
        class="form-horizontal">
        <fieldset>
            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="persona">ID Tarea:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon "><i class="glyphicon glyphicon-info-sign"></i></span>
                        @if (!$_POST)
                            <input type="text" name="id_task" class="form-control" value="{{ $id }}"
                                placeholder="Campo cargado por el sistema" readonly /> </p>
                        @else
                            <input type="text" name="id_task" class="form-control is-valid" value="{{ $id }}"
                                placeholder="Campo cargado por el sistema" readonly /> </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="persona">Persona de contacto:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        @if (!$_POST)
                            <input type="text" name="persona" class="form-control" value="{{ $persona }}"
                                placeholder="Nombre del contratante" />
                        @elseif(ErrorShow('persona', $error) == '')
                            <input type="text" name="persona" class="form-control is-valid" value="{{ $persona }}"
                                placeholder="Nombre del contratante" />
                        @else
                            <input type="text" name="persona" class="form-control is-invalid" value="{{ $persona }}"
                                placeholder="Nombre del contratante" />
                        @endif
                    </div>
                    {!! ErrorShow('persona', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="telefono"> Teléfono/s contacto: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        @if (!$_POST)
                            <input type="text" name="telefono" class="form-control" value="{{ $telefono }}"
                                placeholder="Telefono del contratante" />
                        @elseif(ErrorShow('telefono', $error) == '')
                            <input type="text" name="telefono" class="form-control is-valid" value="{{ $telefono }}"
                                placeholder="Telefono del contratante" />
                        @else
                            <input type="text" name="telefono" class="form-control is-invalid" value="{{ $telefono }}"
                                placeholder="Telefono del contratante" />
                        @endif
                    </div>
                    {!! ErrorShow('telefono', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="descripcion"> Descripción: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        @if (!$_POST)
                            <textarea type="text" cols="20" rows="4" name="descripcion" class="form-control"
                                placeholder="Descripcion de la tarea">{{ $desc }}</textarea>
                        @elseif(ErrorShow('descripcion', $error) == '')
                            <textarea type="text" cols="20" rows="4" name="descripcion" class="form-control is-valid"
                                placeholder="Descripcion de la tarea">{{ $desc }}</textarea>
                        @else
                            <textarea type="text" cols="20" rows="4" name="descripcion" class="form-control is-invalid"
                                placeholder="Descripcion de la tarea">{{ $desc }}</textarea>
                        @endif
                    </div>
                    {!! ErrorShow('descripcion', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="correo"> Correo electrónico: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        @if (!$_POST)
                            <input type="text" name="correo" class="form-control" value="{{ $correo }}"
                                placeholder="Correo del contratante" />
                        @elseif(ErrorShow('correo', $error) == '')
                            <input type="text" name="correo" class="form-control is-valid" value="{{ $correo }}"
                                placeholder="Correo del contratante" />
                        @else
                            <input type="text" name="correo" class="form-control is-invalid" value="{{ $correo }}"
                                placeholder="Correo del contratante" />
                        @endif
                    </div>
                    {!! ErrorShow('correo', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="direccion"> Direccion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        @if (!$_POST)
                            <input type="text" name="direccion" class="form-control" value="{{ $direccion }}"
                                placeholder="Direccion de la tarea a realizar" />
                        @elseif(ErrorShow('direccion', $error) == '')
                            <input type="text" name="direccion" class="form-control is-valid" value="{{ $direccion }}"
                                placeholder="Direccion de la tarea a realizar" />
                        @else
                            <input type="text" name="direccion" class="form-control is-invalid" value="{{ $direccion }}"
                                placeholder="Direccion de la tarea a realizar" />
                        @endif
                    </div>
                    {!! ErrorShow('direccion', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="poblacion"> Poblacion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        @if (!$_POST)
                            <input type="text" name="poblacion" class="form-control" value="{{ $poblacion }}"
                                placeholder="Poblacion de la tarea a realizar" />
                        @elseif(ErrorShow('poblacion', $error) == '')
                            <input type="text" name="poblacion" class="form-control is-valid" value="{{ $poblacion }}"
                                placeholder="Poblacion de la tarea a realizar" />
                        @else
                            <input type="text" name="poblacion" class="form-control is-invalid" value="{{ $poblacion }}"
                                placeholder="Poblacion de la tarea a realizar" />
                        @endif
                    </div>
                    {!! ErrorShow('poblacion', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="cp"> Codigo Postal: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                        @if (!$_POST)
                            <input type="text" name="cp" class="form-control" value="{{ $cp }}"
                                placeholder="Codigo Postal de la tarea a realizar" />
                        @elseif(ErrorShow('cp', $error) == '')
                            <input type="text" name="cp" class="form-control is-valid" value="{{ $cp }}"
                                placeholder="Codigo Postal de la tarea a realizar" />
                        @else
                            <input type="text" name="cp" class="form-control is-invalid" value="{{ $cp }}"
                                placeholder="Codigo Postal de la tarea a realizar" />
                        @endif
                    </div>
                    {!! ErrorShow('cp', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="provincia"> Provincia: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                        @if (!$_POST)
                            <select name="provincia" class="form-control selectpicker">
                            @elseif(ErrorShow('provincia', $error) == '')
                                <select name="provincia" class="form-control selectpicker is-valid">
                                @else
                                    <select name="provincia" class="form-control selectpicker is-invalid">
                        @endif
                        <option value="" selected></option>
                        @foreach (TaskController::getInstance()->listarProv() as $p)
                            @if ($p['nombre'] == $provincia)
                                <option value="{{ $p['nombre'] }}" selected>{{ $p['nombre'] }}</option>
                            @else
                                <option value="{{ $p['nombre'] }}">{{ $p['nombre'] }}</option>
                            @endif
                        @endforeach
                        </select>

                    </div>
                    {!! ErrorShow('provincia', $error) !!}
                </div>
            </div>


            <div class="form-group" {{ $hide2 }}>
                <label class="col-md-4 control-label" for="estado"> Estado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        @if ($estado == 'P')
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P" checked> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R"> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C"> Cancelada</label>
                        @elseif($estado == "R")
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P"> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R" checked> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C"> Cancelada</label>
                        @else
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P"> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R"> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C" checked> Cancelada</label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="fcreacion"> Fecha de creacion de la tarea:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        @if (!$_POST)
                            <input type="text" name="fcreacion" class="form-control" value="{{ $fcreacion }}"
                                placeholder="Fecha obtenida del sistema" readonly />
                        @elseif(ErrorShow('fcreacion', $error) == '')
                            <input type="text" name="fcreacion" class="form-control is-valid" value="{{ $fcreacion }}"
                                placeholder="Fecha obtenida del sistema" readonly />
                        @else
                            <input type="text" name="fcreacion" class="form-control is-invalid"
                                value="{{ $fcreacion }}" placeholder="Fecha obtenida del sistema" readonly />
                        @endif
                    </div>
                    {!! ErrorShow('fcreacion', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="operario"> Operario encargado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        @if (!$_POST)
                            <select name="operario" class="form-control selectpicker">
                            @elseif(ErrorShow('operario', $error) == '')
                                <select name="operario" class="form-control selectpicker is-valid">
                                @else
                                    <select name="operario" class="form-control selectpicker is-invalid">
                        @endif
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
                    {!! ErrorShow('operario', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide1 }}>
                <label class="col-md-4 control-label" for="fechaR"> Fecha de realización:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        @if (!$_POST)
                            <input type="date" name="fechaR" value="{{ $frealizacion }}" class="form-control datepicker"
                                placeholder="Fecha de realizacion de la tarea" />
                        @elseif(ErrorShow('fechaR', $error) == '')
                            <input type="date" name="fechaR" value="{{ $frealizacion }}"
                                class="form-control datepicker is-valid" placeholder="Fecha de realizacion de la tarea" />
                        @else
                            <input type="date" name="fechaR" value="{{ $frealizacion }}"
                                class="form-control datepicker is-invalid"
                                placeholder="Fecha de realizacion de la tarea" />
                        @endif
                    </div>
                    {!! ErrorShow('fechaR', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide2 }}>
                <label class="col-md-4 control-label" for="aa"> Anotaciones anteriores: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        @if (!$_POST)
                            <textarea type="text" cols="20" rows="4" name="aa" class="form-control"
                                placeholder="Anotacion anterior a la realizacion de la tarea">{{ $aa }}</textarea>
                        @elseif(ErrorShow('aa', $error) == '')
                            <textarea type="text" cols="20" rows="4" name="aa" class="form-control is-valid"
                                placeholder="Anotacion anterior a la realizacion de la tarea">{{ $aa }}</textarea>
                        @else
                            <textarea type="text" cols="20" rows="4" name="aa" class="form-control is-invalid"
                                placeholder="Anotacion anterior a la realizacion de la tarea">{{ $aa }}</textarea>
                        @endif
                    </div>
                    {!! ErrorShow('aa', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide2 }}>
                <label class="col-md-4 control-label" for="ap"> Anotaciones posteriores: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        @if (!$_POST)
                            <textarea type="text" cols="20" rows="4" name="ap" class="form-control"
                                placeholder="Anotacion posterior a la realizacion de la tarea">{{ $ap }}</textarea>
                        @elseif(ErrorShow('ap', $error) == '')
                            <textarea type="text" cols="20" rows="4" name="ap" class="form-control is-valid"
                                placeholder="Anotacion posterior a la realizacion de la tarea">{{ $ap }}</textarea>
                        @else
                            <textarea type="text" cols="20" rows="4" name="ap" class="form-control is-invalid"
                                placeholder="Anotacion posterior a la realizacion de la tarea">{{ $ap }}</textarea>
                        @endif
                    </div>
                    {!! ErrorShow('ap', $error) !!}
                </div>
            </div>

            <div class="form-group" {{ $hide2 }}>
                <label class="col-md-4 control-label" for="fichero"> Fichero:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group file">
                        <div>
                            <label for="image_uploads" id="labelFile">Selecciona un archivo (DOC, DOCX, PDF..)</label>
                            <input type="file" id="image_uploads" name="fichero" accept=".doc, .docx, .pdf"
                                class="form-control">
                        </div>
                        <div class="preview">
                            @if (isset($fichero))
                                <p id="pfile">ARCHIVO: {{ $fichero }}</p>
                            @else
                                <p id="pfile">No hay ningun archivo seleccionado</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </fieldset>
    </form>
@endsection

@section('script')
    <script src="<?= ASSETS_URL ?>js/file_doc.js"></script>
@endsection
