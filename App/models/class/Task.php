<?php
include_once (LIB_PATH . 'Paginator.php');

class Task
{
    //Propiedades de la Tarea
    public $id_task = "";
    public $persona = "";
    public $telefono = "";
    public $descripcion = "";
    public $correo = "";
    public $direccion = "";
    public $poblacion = "";
    public $cp = "";
    public $provincia = "";
    public $estado = "";
    public $fecha_creacion = "";
    public $operario = "";
    public $fecha_realizacion = "";
    public $anot_anterior = "";
    public $anot_posterior = "";
    public $fichero = "";

    //Paginacion
    public $pag;


    function __construct($nPorPagina)
    {
        $this->pag = new Paginator($nPorPagina,"task");
    }

    /**
     * Muestra una lista de todas las tareas existentes en la DataBase
     *
     * @return objet
     */
    function listaTareas()
    {
        try {
            $query = Connection::Conex()->prepare('SELECT * FROM task LIMIT :pos, :n');
            $query->execute(['pos' => $this->pag->getIndice(), 'n' => $this->pag->getResultadosPorPagina()]);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Muestra una lista de todas las provincias existentes en la DataBase
     *
     * @return objet
     */
    function listaProvincias()
    {
        try {
            $query = Connection::Conex()->prepare('SELECT nombre FROM provincias');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Modifica los datos de una tarea elegida 
     * 
     * @return boolean
     */
    function modificarTarea(Task $data)
    {
        try {
            $persona = "'" . "$data->persona" . "'";
            $telefono = "'" . $data->telefono . "'";
            $desc = "'" . $data->descripcion . "'";
            $correo = "'" . $data->correo . "'";
            $direc = "'" . $data->direccion . "'";
            $poblacion = "'" . $data->poblacion . "'";
            $cp = "'" . $data->cp . "'";
            $provincia = "'" . $data->provincia . "'";
            $estado = "'" . $data->estado . "'";
            $operario = "'" . $data->operario . "'";
            $fr = "'" . $data->fecha_realizacion . "'";
            $aa = "'" . $data->anot_anterior . "'";
            $ap = "'" . $data->anot_posterior . "'";
            $fichero = "'" . $data->fichero . "'";
            $id = "'" . $data->id_task . "'";

            $sql = "UPDATE task SET persona= " . $persona . ", telefono= " . $telefono . ",
            descripcion= " . $desc . ", correo= " . $correo . ", direccion= " . $direc . ", poblacion= " . $poblacion . ",
            cp= " . $cp . ", provincia=" . $provincia . ", estado= " . $estado . ", operario= " . $operario . ",
            fecha_realizacion= " . $fr . ", anot_anterior= " . $aa . ", anot_posterior= " . $ap . ", fichero= " . $fichero . " WHERE id_task =  " . $id . "";

            $sentencia = Connection::Conex()->prepare($sql);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Elimina una tarea elegida
     * 
     * @return boolean
     */
    function borrarTarea($id_task)
    {
        try {
            $query = Connection::Conex()->prepare('DELETE FROM task WHERE id_task = :id');

            $query->bindParam(':id', $id_task);
            $query->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Añade una nueva tarea a la DataBase
     * 
     * @return boolean
     */
    function añadirTarea(Task $data)
    {
        try {
            $sql = "INSERT INTO task(id_task, persona, telefono, descripcion,
            correo, direccion, poblacion, cp, provincia, estado, fecha_creacion, operario,
            fecha_realizacion)VALUES ('',:persona,:phone,:descripcion,:correo,
            :direccion,:poblacion,:cp,:provincia,:estado,CURDATE(),:operario,:fechaR);";

            $sentencia = Connection::Conex()->prepare($sql);

            $sentencia->bindParam(':persona', $data->persona);
            $sentencia->bindParam(':phone', $data->telefono);
            $sentencia->bindParam(':descripcion', $data->descripcion);
            $sentencia->bindParam(':correo', $data->correo);
            $sentencia->bindParam(':direccion', $data->direccion);
            $sentencia->bindParam(':poblacion', $data->poblacion);
            $sentencia->bindParam(':cp', $data->cp);
            $sentencia->bindParam(':provincia', $data->provincia);
            $sentencia->bindParam(':estado', $data->estado);
            $sentencia->bindParam(':operario', $data->operario);
            $sentencia->bindParam(':fechaR', $data->fecha_realizacion);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Muestra los datos tan solo de una tarea
     * 
     * @return objet
     */
    public function verTarea($id_task)
    {
        try {
            $sentencia = Connection::Conex()->prepare("SELECT * FROM task WHERE id_task = :id_task");
            $sentencia->bindParam(':id_task', $id_task);

            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
