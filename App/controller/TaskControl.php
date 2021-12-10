<?php
include(MODEL_PATH . '/class/Task.php');
include(LIB_PATH . 'GestorErrores.php');
include(LIB_PATH . 'Blade.php');
include(HELPERS_PATH . 'form.php');


class TaskController
{
    private $pag = PAGINATOR;
    private $model;
    private $blade;
    private $user;
    private $fileDir;

    public function __construct()
    {
        $this->pag = $_SESSION['listT'];
        $this->model = new Task($this->pag);
        $this->blade = TemplateBlade::GetInstance();
        $this->user = new Employer($this->pag);
        $this->fileDir = __DIR__ . "/../Assets/files/";
    }
    
    /**
     * Metedo que devuelve un objeto de la misma clase TaskController
     *
     * @return void
     */
    public static function getInstance()
    {
        return new self;
    }


    //FUNCIONALIDAD 
    /**
     * Metodo que renderiza la vista lista de tareas
     *
     * @return void
     */
    public function ListaTarea()
    {
        setcookie('pag', $_REQUEST['pag']);
        return $this->blade->render('task/list', ['type' => $_SESSION['type'], 'fileDir' => $this->fileDir]);
    }

    /**
     * Metodo que comprueba que rol tiene el usuario logeado y carga la vista del formulario de tareas
     *
     * @return void
     */
    public function Formulario()
    {
        $t = new Task($this->pag);
        $u = new Employer($this->pag);

        if ($_SESSION['type'] == "admin") {
            $hide1 = "";
            $hide2 = "hidden";
        } elseif ($_SESSION['type'] == "operario") {
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
            'fichero' => $t->fichero,
            'type' => $_SESSION['type'],
            'hide1' => $hide1,
            'hide2' => $hide2,
            'error' => ''
        ]);
    }

    /**
     * Metodo que recoge los datos del formulario de tareas y comprueba si tiene errores. Si no los tiene 
     * añade o modifica la tarea incluida en el formulario en la base de datos.
     *
     * @return void
     */
    public function Guardar()
    {
        $error = new GestorErrores('<span style="color:red">', '</span>');
        require_once 'models/task_errors.php';

        $fichero_subido = basename($_FILES['fichero']['name']);

        if ($error->HayErrores()) {

            if ($_SESSION['type'] == "admin") {
                $hide1 = "";
                $hide2 = "hidden";
            } elseif ($_SESSION['type'] == "operario") {
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
     * Metodo que elimina una tarea segun su ID
     *
     * @return void
     */
    public function Eliminar()
    {
        $this->model->borrarTarea($_REQUEST['id']);
        header("Location: " . BASE_URL . "list?pag=1");
        exit;
    }

    // VISTAS
    /**
     * Metodo que carga la vista de confirmacion para eliminacion de una tarea
     *
     * @return void
     */
    public function cEliminar()
    {
        return $this->blade->render('task/delete', ['id' => $_REQUEST['id'], 'type' => $_SESSION['type']]);
    }
  
    /**
     * Metodo que recoge los datos de la lista de tareas desde la base de datos
     *
     * @return void
     */
    public function listar()
    {
        return $this->model->listaTareas();
    }

    
    /**
     * Metodo que recoge los datos de la lista de provincias desde la base de datos
     *
     * @return void
     */
    public function listarProv()
    {
        return $this->model->listaProvincias();
    }

    
    /**
     * Metodo que recoge el total de registros que contiene la tabla de tareas desde la base de datos
     *
     * @return void
     */
    public function tResultados()
    {
        return $this->model->mostrarTotalResultados();
    }

        
    /**
     * Metodo que muestra la paginacion de la lista de tareas
     *
     * @return void
     */
    public function paginacion()
    {
        return $this->model->mostrarPaginas();
    }
}
