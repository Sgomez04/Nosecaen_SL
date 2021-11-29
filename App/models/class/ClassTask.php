<?php


/**Clase tarea que extiende de la clase conexion
 * 
 * 
 */
class Task extends Connection
{
    public $id_task ="";
    public $persona ="";
    public $telefono ="";
    public $descripcion ="";
    public $correo ="";
    public $direccion ="";
    public $poblacion ="";
    public $cp ="";
    public $provincia = "Andalucia";
    public $estado ="";
    public $fecha_creacion ="";
    public $operario ="";
    public $fecha_realizacion ="";
    public $anot_anterior ="";
    public $anot_posterior ="";

    //PAGINACION
    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $pag;

    function __construct($nPorPagina)
    {
        try {
            parent::__construct();

            $this->resultadosPorPagina = $nPorPagina;
            $this->indice = 0;
            $this->paginaActual = 1;
    
            $this->calcularPaginas();

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
            $query = $this->connect()->prepare('SELECT * FROM task LIMIT :pos, :n');    
            $query->execute(['pos' => $this->indice, 'n' => $this->resultadosPorPagina]);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Modifica los datos de una tarea elegida 
     * 
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
            // $provincia = $data->provincia;
            $estado = "'" . $data->estado . "'";
            // $fc = "'" . $data->fecha_creacion . "'";
            $operario = "'" . $data->operario . "'";
            $fr = "'" . $data->fecha_realizacion . "'";
            $aa = "'" . $data->anot_anterior . "'";
            $ap = "'" . $data->anot_posterior . "'";
            $id = "'" . $data->id_task . "'";

            $sql = "UPDATE task SET persona= " . $persona . ", telefono= " . $telefono . ",
            descripcion= " . $desc . ", correo= " . $correo . ", direccion= " . $direc . ", poblacion= " . $poblacion . ", cp= " . $cp . ", provincia='Huelva',
            estado= " . $estado . ", operario= " . $operario . ", fecha_realizacion= " . $fr . ",
            anot_anterior= " . $aa . ", anot_posterior= " . $ap . " WHERE id_task =  " . $id . "";

            $sentencia = $this->connect()->prepare($sql);
            
            //No funciona al bindear los parametros
            
            // $sentencia->bindParam(':idtask', $id);
            // $sentencia->bindParam(':persona', $persona);
            // $sentencia->bindParam(':phone', $telefono);
            // $sentencia->bindParam(':descripcion', $desc);
            // $sentencia->bindParam(':correo', $correo);
            // $sentencia->bindParam(':direccion', $direc);
            // $sentencia->bindParam(':poblacion', $poblacion);
            // $sentencia->bindParam(':cp', $cp);
            // // $sentencia->bindParam(':provincia', $provincia);
            // $sentencia->bindParam(':estado', $estado);
            // $sentencia->bindParam(':fcreacion', $fc);
            // $sentencia->bindParam(':operario', $operario);
            // $sentencia->bindParam(':fechaR', $fr);
            // $sentencia->bindParam(':aa', $aa);
            // $sentencia->bindParam(':ap', $ap);



            // $data_task = [
            //     'persona' => $data->persona,
            //     'phone' => $data->telefono,
            //     'descripcion' => $data->descripcion,
            //     'correo' => $data->correo,
            //     'direccion' => $data->direccion,
            //     'poblacion' => $data->poblacion,
            //     'cp' => $data->cp,
            //     'provincia' => $data->provincia,
            //     'estado' => $data->estado,
            //     'fcreacion' => $data->fecha_creacion,
            //     'operario' => $data->operario,
            //     'fechaR' => $data->fecha_realizacion,
            //     'aa' => $data->anot_anterior,
            //     'ap' => $data->anot_posterior,
            //     'idtask' => $data->id_task
            // ];

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
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Añade una nueva tarea a la DataBase
     * 
     */
    function añadirTarea(Task $data)
    {
        try {
            $sql = "INSERT INTO task(id_task, persona, telefono, descripcion,
            correo, direccion, poblacion, cp, provincia, estado, fecha_creacion, operario,
            fecha_realizacion, anot_anterior, anot_posterior)VALUES ('',:persona,:phone,:descripcion,:correo,
            :direccion,:poblacion,:cp,:provincia,:estado,CURDATE(),:operario,:fechaR,:aa,:ap);";

            $sentencia = $this->connect()->prepare($sql);

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
            $sentencia->bindParam(':aa', $data->anot_anterior);
            $sentencia->bindParam(':ap', $data->anot_posterior);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Muestra los datos tan solo de una tarea
     * 
     */
    public function verTarea($id_task)
    {
        try {
            $sentencia = $this->connect()->prepare("SELECT * FROM task WHERE id_task = :id_task");
            $sentencia->bindParam(':id_task', $id_task);

            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Modifica una tarea añadiendole tan solo datos a los campos de comentarios
     * 
     */
    function añadirAnotacion(Task $task)
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

    //PAGINACION
    function calcularPaginas(){
        $queryTotalResultados = $this->connect()->query('SELECT COUNT(*) AS total FROM task');
        $this->nResultados = $queryTotalResultados->fetch(PDO::FETCH_OBJ)->total; 
        $this->totalPaginas = $this->nResultados / $this->resultadosPorPagina;

        if(isset($_GET['pagina'])){
            $this->paginaActual = $_GET['pagina'];
            $this->indice = ($this->paginaActual - 1) * $this->resultadosPorPagina;
        }
    }

    function mostrarPaginas(){
        $actual = '';
        echo "<ul>";

        for($i=0; $i < $this->totalPaginas; $i++){
            if(($i + 1) == $this->paginaActual){
                $actual = ' class="actual" ';
                $this->pag == $this->paginaActual;
            }else{
                $actual = '';
            }
            echo '<li><a ' .$actual . 'href="?pagina='. ($i + 1). '">'. ($i + 1) . '</a></li>';
        }
        echo "</ul>";
    }

    function mostrarTotalResultados(){
        return $this->nResultados;
    }

    function mostrarPag(){
        return $this->pag;
    }

    


}
