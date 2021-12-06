<?php
include(MODEL_PATH . '/class/Task.php');
include(LIB_PATH . 'GestorErrores.php');
include(LIB_PATH . 'Blade.php');
include(HELPERS_PATH . 'form.php');


class TaskController
{
    private $pag = 5;
    private $model;
    private $blade;
    private $user;
    private $fileDir;


    public function __construct()
    {
        $this->model = new Task($this->pag);
        $this->blade = TemplateBlade::GetInstance();
        $this->user = new Employer($this->pag);
        $this->fileDir = $_SERVER['DOCUMENT_ROOT'] . "/PHP/NoSeCaenSL/Assets/files/";
    }

    public static function getInstance()
    {
        return new self;
    }

    /**
     * Indice de la aplicacion
     *
     * @return void
     */
    public function Index()
    {
        return $this->blade->render('index');    }


    public function ListaTarea()
    {
        setcookie('pag', $_REQUEST['pag']);
        return $this->blade->render('task/list', ['type' => $_SESSION['type'],'fileDir'=>$this->fileDir]);
    }


    /**
     * Muestra el formulario de relleno/modificacion de una tarea
     *
     * @return void
     */
    public function Formulario()
    {
        $t = new Task($this->pag);
        $u = new Employer($this->pag);

        if($_SESSION['type'] == "admin"){
        $hide1 = "";
        $hide2 = "hidden";
        }
        elseif($_SESSION['type'] == "operario"){
            $hide1 = "hidden";
            $hide2 = "";
        }

        if (isset($_REQUEST['id'])) {
            $t = $this->model->verTarea($_REQUEST['id']);
        }

        return  $this->blade->render('task/add_upd', [
            'id' => $t->id_task,
            'persona' => $t->persona,
            'telefono' => $t->telefono,
            'desc' => $t->descripcion,
            'correo' => $t->correo,
            'direccion' => $t->direccion,
            'poblacion' => $t->poblacion,
            'cp' => $t->cp,
            'provincia' => $t->provincia,
            'estado' => $t->estado,
            'fcreacion' => $t->fecha_creacion,
            'operario' => $t->operario,
            'frealizacion' => $t->fecha_realizacion,
            'aa' => $t->anot_anterior,
            'ap' => $t->anot_posterior,
            'fichero' =>"http://localhost/PHP/NoSeCaenSL/Assets/files/Sumario.odt",
            'type' => $_SESSION['type'],
            'hide1' => $hide1,
            'hide2' => $hide2,
            'error' => ''
        ]);
    }

    /**
     * Realiza el guardado de una tarea ya sea nueva o modificada
     *
     * @return void
     */
    public function Guardar()
    {
        $error = new GestorErrores('<span style="color:red">', '</span>');
        require_once 'models/task_errors.php';

        $fichero_subido = basename($_FILES['fichero']['name']);

        if ($error->HayErrores()) {

            if($_SESSION['type'] == "admin"){
                $hide1 = "";
                $hide2 = "hidden";
                }
                elseif($_SESSION['type'] == "operario"){
                    $hide1 = "hidden";
                    $hide2 = "";
                }

            return $this->blade->render(
                'task/add_upd',
                [
                    'id' => ValorPost("id_task"),
                    'persona' => ValorPost("persona"),
                    'telefono' => ValorPost("telefono"),
                    'desc' => ValorPost("descripcion"),
                    'correo' => ValorPost("correo"),
                    'direccion' => ValorPost("direccion"),
                    'poblacion' => ValorPost("poblacion"),
                    'cp' => ValorPost("cp"),
                    'provincia' => "Alicante",
                    'estado' => ValorPost("estado"),
                    'fcreacion' => ValorPost("fcreacion"),
                    'operario' => ValorPost("operario"),
                    'frealizacion' => ValorPost("fechaR"),
                    'aa' => ValorPost("aa"),
                    'ap' => ValorPost("ap"),
                    'fichero' => ValorPost("fichero"),
                    'type' => $_SESSION['type'],
                    'hide1' => $hide1,
                    'hide2' => $hide2,
                    'error' => $error
                ]
            );
        } else {
            $task = new Task($this->pag);

            $fichero_subido = basename($_FILES['fichero']['name']);
            $nameFile = $_FILES['fichero']['name'];
            move_uploaded_file($_FILES['fichero']['tmp_name'], $this->fileDir . $fichero_subido);

            $task->id_task =  $_REQUEST['id'];
            $task->persona =  ValorPost('persona');
            $task->telefono =  ValorPost('telefono');
            $task->descripcion =  ValorPost('descripcion');
            $task->correo =  ValorPost('correo');
            $task->direccion =  ValorPost('direccion');
            $task->poblacion =  ValorPost('poblacion');
            $task->cp =  ValorPost('cp');
            $task->provincia =  ValorPost('provincia');
            $task->estado =  ValorPost('estado');
            $task->fecha_creacion =  ValorPost('fcreacion');
            $task->operario =  ValorPost('operario');
            $task->fecha_realizacion = ValorPost('fechaR');
            $task->anot_anterior =  ValorPost('aa');
            $task->anot_posterior =  ValorPost('ap');
            $task->fichero = $nameFile;

            if ($task->id_task > 0) {
                $this->model->modificarTarea($task);
            } else {
                $this->model->añadirTarea($task);
            }

            header("Location: " . BASE_URL . "list?pag=1");
            exit;
        }
    }

    /**
     * Peticion de confirmacion de eliminado de una tarea al usuario
     *
     * @return void
     */
    public function cEliminar()
    {
        $this->pag = $this->model->mostrarPag();
        return $this->blade->render('task/delete', ['id' => $_REQUEST['id']]);
    }

    /**
     * Elimina una tarea tras confirmar su eliminacion
     *
     * @return void
     */
    public function Eliminar()
    {   
        $this->model->borrarTarea($_REQUEST['id']);
        header("Location: " . BASE_URL . "list?pag=" . $_COOKIE["pag"]);
        exit;
    }


    //VISTAS

    /**
     * Realiza una lista de las tareas
     *
     * @return void
     */
    public function listar()
    {
        return $this->model->listaTareas();
    }

    /**
     * Realiza una lista de las provincias que pueden introducirse en una terea
     *
     * @return void
     */
    public function listarProv()
    {
        return $this->model->listaProvincias();
    }


    /**
     * Muestra el total de tareas encontradas
     *
     * @return void
     */
    public function tResultados()
    {
        return $this->model->mostrarTotalResultados();
    }

    /**
     * Muestra la paginacion de las tareas
     *
     * @return void
     */
    public function paginacion()
    {
        return $this->model->mostrarPaginas();
    }
}
