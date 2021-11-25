<?php


/**Clase tarea que extiende de la clase conexion
 * 
 * 
 */
class Task extends Connection
{
    // public $id;
    // public $persona;
    // public $telefono;
    // public $descripcion;
    // public $correo;
    // public $direccion;
    // public $poblacion;
    // public $cp;
    // public $provincia;
    // public $estado;
    // public $fcreacion;
    // public $operario;
    // public $frealizacion;
    // public $aAnterior;
    // public $aPosterior;

    function __construct()
    {
        try {
            parent::__construct();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Muestra una lista de todas las tareas existentes en la DataBase
     *
     * 
     */
    function listaTareas()
    {
        try {
            $query = $this->connect()->prepare('SELECT * FROM task');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Modifica los datos de una tarea elegida 
     * 
     */
    function modificarTarea($task)
    {
        try {
            $sql = "UPDATE task SET persona=:persona,telefono=:telefono,
            descripcion=:descripcion,correo=:correo,direccion=:direccion,poblacion=:poblacion,cp=:cp,
            provincia=:provincia,estado=:estado,operario=:operario,fecha_realizacion=:fechaR,
            anot_anterior=:aa,anot_posterior=:ap WHERE id_task = :id_task";

            $sentencia = $this->connect()->prepare($sql);

            $sentencia->bindParam(':id_task', $task["id_task"]);
            $sentencia->bindParam(':persona', $task["persona"]);
            $sentencia->bindParam(':telefono', $task["telefono"]);
            $sentencia->bindParam(':descripcion', $task["descripcion"]);
            $sentencia->bindParam(':correo', $task["correo"]);
            $sentencia->bindParam(':direccion', $task["direccion"]);
            $sentencia->bindParam(':poblacion', $task["poblacion"]);
            $sentencia->bindParam(':cp', $task["cp"]);
            $sentencia->bindParam(':provincia', $task["provincia"]);
            $sentencia->bindParam(':estado', $task["estado"]);
            $sentencia->bindParam(':operario', $task["operario"]);
            $sentencia->bindParam(':fechaR', $task["fechaR"]);
            $sentencia->bindParam(':aa', $task["aa"]);
            $sentencia->bindParam(':ap', $task["ap"]);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Elimina una tarea elegida
     * 
     * 
     */
    function borrarTarea($id_task)
    {
        try {
            $query = $this->connect()->prepare('DELETE FROM task WHERE id_task = :id');

            $query->bindParam(':id', $id_task);
            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Añade una nueva tarea a la DataBase
     * 
     */
    function añadirTarea($task)
    {
        try {
            $sql = "INSERT INTO task(id_task, persona, telefono, descripcion,
            correo, direccion, poblacion, cp, provincia, estado, fecha_creacion, operario,
            fecha_realizacion, anot_anterior, anot_posterior)VALUES ('',:persona,:telefono,:descripcion,:correo,
            :direccion,:poblacion,:cp,:provincia,:estado,CURDATE(),:operario,:fechaR,:aa,:ap);";

            $sentencia = $this->connect()->prepare($sql);

            $sentencia->bindParam(':persona', $task["persona"]);
            $sentencia->bindParam(':telefono', $task["telefono"]);
            $sentencia->bindParam(':descripcion', $task["descripcion"]);
            $sentencia->bindParam(':correo', $task["correo"]);
            $sentencia->bindParam(':direccion', $task["direccion"]);
            $sentencia->bindParam(':poblacion', $task["poblacion"]);
            $sentencia->bindParam(':cp', $task["cp"]);
            $sentencia->bindParam(':provincia', $task["provincia"]);
            $sentencia->bindParam(':estado', $task["estado"]);
            $sentencia->bindParam(':operario', $task["operario"]);
            $sentencia->bindParam(':fechaR', $task["fechaR"]);
            $sentencia->bindParam(':aa', $task["aa"]);
            $sentencia->bindParam(':ap', $task["ap"]);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Muestra los datos tan solo de una tarea
     * 
     */
    public function verTarea($id)
    {
        try {
            $sentencia = $this->connect()->prepare("SELECT * FROM task WHERE id_task = ?");
            $sentencia->execute(array($id));
            return $sentencia->fetch(PDO::FETCH_OBJ);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Modifica una tarea añadiendole tan solo datos a los campos de comentarios
     * 
     */
    function añadirAnotacion($task)
    {
        try {
            $sentencia = $this->connect()->prepare("UPDATE `task` SET `anot_anterior`=:aa,`anot_posterior`=:ap WHERE `id_task` = :id_task");

            $sentencia->bindParam(':aa', $task["aa"]);
            $sentencia->bindParam(':ap', $task["ap"]);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
