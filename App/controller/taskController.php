<?php
require_once 'models/class/ClassTask.php';

class TaskController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Task();
    }
    
    public function Index(){
        require_once 'views/header.php';
        require_once 'views/task/list.php';
        require_once 'views/footer.php';
    }
    
    
    public function Crud(){
        $task = new Task();
        
        if(isset($_REQUEST['id'])){
            $task = $this->model->verTarea($_REQUEST['id']);
        }
        
        require_once 'views/header.php';
        require_once 'views/task/add_upd.php';
        require_once 'views/footer.php';
    }

    public function Guardar(){
        $task = new Task();

        
        $task->id = $_REQUEST['id'];
        $task->Nombre = $_REQUEST['Nombre'];
        $task->Apellido = $_REQUEST['Apellido'];
        $task->Correo = $_REQUEST['Correo'];
        $task->Sexo = $_REQUEST['Sexo'];
        $task->FechaNacimiento = $_REQUEST['FechaNacimiento'];

        $task->id > 0 
            ? $this->model->modificarTarea($task)
            : $this->model->añadirTarea($task);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->borrarTarea($_REQUEST['id']);
        header('Location: index.php');
    }
}