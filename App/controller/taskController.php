<?php
include(MODEL_PATH . '/class/ClassTask.php');
include(LIB_PATH . 'GestorErrores.php');
include(LIB_PATH . 'Blade.php');
include(HELPERS_PATH . 'form.php');

class TaskController
{
    private $pag = 5;
    private $model;
    private $blade;

    public function __CONSTRUCT()
    {
        $this->model = new Task($this->pag);
        $this->blade = TemplateBlade::GetInstance();
    }

    public static function getInstance()
    {
        return new self();
    }

    public function Index()
    {
        // return $this->Inicio();
    }

    public function Inicio()
    {
        setcookie("pag", $_REQUEST['pagina'], time()+3600);  
        echo $this->blade->render('task/list');
    }


    public function Formulario()
    {
        $t = new Task($this->pag);

        if (isset($_REQUEST['id'])) {
            $t = $this->model->verTarea($_REQUEST['id']);
            $bton ="update";
        } else{
            $bton ="add";
        }

        echo $this->blade->render('task/add_upd', [
            'id' => $t->id_task,
            'persona' => $t->persona,
            'telefono' => $t->telefono,
            'desc' => $t->descripcion,
            'correo' => $t->correo,
            'direccion' => $t->direccion,
            'poblacion' => $t->poblacion,
            'cp' => $t->cp,
            'fcreacion' => $t->fecha_creacion,
            'operario' => $t->operario,
            'frealizacion' => $t->fecha_realizacion,
            'aa' => $t->anot_anterior,
            'ap' => $t->anot_posterior,
            'bton'=>$bton
        ]);
    }

    // public function Insertar()
    // {
    //     $task = $this->Guardar();
    //     if ($task) {
    //         $this->model->añadirTarea($task);
    //         header("Location: http://localhost/PHP/NoSeCaenSL/App/index.php");
    //     }
    // }

    // public function Modificar()
    // {
    //     $task = $this->Guardar();
    //     if ($task) {
    //         $this->model->modificarTarea($task);
    //         header("Location: http://localhost/PHP/NoSeCaenSL/App/index.php");
    //     }
    // }

    public function Guardar()
    {
        $error = new GestorErrores('<span class="alert alert-danger" role="alert">', '</span>');
        require_once 'models/task_errors.php';

        if ($error->HayErrores()) {

            echo $this->blade->render('task/add_upd_error',[         
            'id' => ValorPost("id_task"),
            'persona' => ValorPost("persona"),
            'telefono' => ValorPost("telefono"),
            'desc' => ValorPost("descripcion"),
            'correo' => ValorPost("correo"),
            'direccion' => ValorPost("direccion"),
            'poblacion' => ValorPost("poblacion"),
            'cp' => ValorPost("cp"),
            'fcreacion' => ValorPost("fcreacion"),
            'operario' => ValorPost("operario"),
            'frealizacion' => ValorPost("fechaR"),
            'aa' => ValorPost("aa"),
            'ap' => ValorPost("ap")
            ],
            [            
            'e_persona' => $error->ErrorFormateado("persona"),
            'e_telefono' => $error->ErrorFormateado("telefono"),
            'e_desc' => $error->ErrorFormateado("descripcion"),
            'e_correo' => $error->ErrorFormateado("correo"),
            'e_direccion' => $error->ErrorFormateado("direccion"),
            'e_poblacion' => $error->ErrorFormateado("poblacion"),
            'e_cp' => $error->ErrorFormateado("cp"),
            'e_fcreacion' => $error->ErrorFormateado("fcreacion"),
            'e_operario' => $error->ErrorFormateado("operario"),
            'e_frealizacion' => $error->ErrorFormateado("fechaR"),
            'e_aa' => $error->ErrorFormateado("aa"),
            'e_ap' => $error->ErrorFormateado("ap")
            ]);

        } else {
            $task = new Task($this->pag);

            $task->id_task =  $_REQUEST['id'];
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

            header("Location: " .BASE_URL . "list");
            exit;
        }
    }

    public function cEliminar()
    {
        $this->pag = $this->model->mostrarPag();
        echo $this->blade->render('task/delete',['id'=>$_REQUEST['id']]);
    }

    public function Eliminar()
    {
       
        $this->model->borrarTarea($_REQUEST['id']);
        header("Location: " .BASE_URL . "list?pagina=" . $_COOKIE["pag"]);
        exit;
    }


    //VISTAS

    public function listar()
    {

        return $this->model->listaTareas();
    }

    public function tResultados()
    {

        return $this->model->mostrarTotalResultados();
    }

    public function paginacion()
    {
        return $this->model->mostrarPaginas();
    }
}
