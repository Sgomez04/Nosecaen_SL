<?php
require_once 'models/class/ClassTask.php';
require_once 'models/class/Errores.php';
require_once 'models/helper.php';


class TaskController
{
    private $pag = 5;
    private $model;
    private $pagActual;

    public function __CONSTRUCT()
    {
        $this->model = new Task($this->pag);
    }

    public function Index()
    {
        require_once 'views/header.php';
        require_once 'views/task/list.php';
        require_once 'views/footer.php';
    }


    public function Crud()
    {
        $t = new Task($this->pag);

        if (isset($_REQUEST['id'])) {
            $t = $this->model->verTarea($_REQUEST['id']);
        }

        require_once 'views/header.php';
        require_once 'views/task/add_upd.php';
        require_once 'views/footer.php';
    }

    public function Guardar()
    {
        $error = new GestorErrores('<span class="alert alert-danger" role="alert">','</span>');
        require_once 'models/task_errors.php';

        if ($error->HayErrores()) {

            require_once 'views/header.php';
            require_once 'views/task/add_upd_error.php';
            require_once 'views/footer.php';

        } else {
            $task = new Task($this->pag);

            $task->id_task =  $_REQUEST['id_task'];
            $task->persona =  ValorPost('persona');
            $task->telefono =  ValorPost('telefono');
            $task->descripcion =  ValorPost('descripcion');
            $task->correo =  ValorPost('correo');
            $task->direccion =  ValorPost('direccion');
            $task->poblacion =  ValorPost('poblacion');
            $task->cp =  ValorPost('cp');
            // $task->provincia =  ValorPost('provincia');
            $task->estado =  ValorPost('estado');
            $task->fecha_creacion =  ValorPost('fcreacion');
            $task->operario =  ValorPost('operario');
            $task->fecha_realizacion = ValorPost('fechaR');
            $task->anot_anterior =  ValorPost('aa');
            $task->anot_posterior =  ValorPost('ap');
    
    
            if ($task->id_task > 0) {
                $this->model->modificarTarea($task);
            } else {
                $this->model->añadirTarea($task);
            }
            header('Location: index.php');
        }
       
    }

    public function Filtrado()
    {
 
    }

    public function cEliminar()
    {
        $this->pag=$this->model->mostrarPag();
        require_once 'views/header.php';
        require_once 'views/task/delete.php';
        require_once 'views/footer.php';
    }

    public function Eliminar()
    {
        $this->model->borrarTarea($_REQUEST['id']);
        header("Location: index.php?pagina= " .  $_REQUEST['pag'] ."");
    }        

}
