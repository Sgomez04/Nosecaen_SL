@extends ('plantilla')

@section('link')
<link rel="stylesheet" href="<?= ASSETS_URL ?>css/confirm-delete.css"/>
@endsection

@section('nav')
<a href="#" class="nav-item nav-link"><i
    class="fa fa-users"></i><span>Inicio</span></a>
<a href="<?= BASE_URL ?>list?pag=1" class="nav-item nav-link active"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
@if($type=='admin')
        <a href="<?= BASE_URL ?>listU?pagU=1" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
@else
        <a href="#" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
@endif
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
@endsection

@section('cuerpo')

    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Eliminacion de la tarea</h4>
                <a href="list" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            </div>
            <div class="modal-body">
                <p>¿Esta segur@ de que desea eliminar la tarea? Esta accion no puede deshacerse</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="<?= BASE_URL ?>list" class="bton btn-secondary" data-dismiss="modal">Cancelar</a>
                <a href="<?= BASE_URL ?>del?id={{ $id }}" class="bton btn-danger">Eliminar</a>
            </div>
        </div>
    </div>   

@endsection
