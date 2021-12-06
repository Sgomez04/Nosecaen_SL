<?php


/**Clase tarea que extiende de la clase conexion
 * 
 * 
 */
class Task extends Connection
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
    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $pag;

    /**
     * Constructor de la clase Task
     *
     * @param  mixed $nPorPagina
     * @return void
     */
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
     * @return void
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
     * Muestra una lista de todas las provincias existentes en la DataBase
     *
     * @return void
     */
    function listaProvincias()
    {
        try {
            $query = $this->connect()->prepare('SELECT nombre FROM provincias');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Modifica los datos de una tarea elegida 
     * 
     * @return void
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
            cp= " . $cp . ", provincia=" . $provincia. ", estado= " . $estado . ", operario= " . $operario . ",
            fecha_realizacion= " . $fr . ", anot_anterior= " . $aa . ", anot_posterior= " . $ap . ", fichero= " . $fichero . " WHERE id_task =  " . $id . "";

            $sentencia = $this->connect()->prepare($sql);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Elimina una tarea elegida
     * 
     * @return void
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
     * @return void
     */
    function añadirTarea(Task $data)
    {
        try {
            $sql = "INSERT INTO task(id_task, persona, telefono, descripcion,
            correo, direccion, poblacion, cp, provincia, estado, fecha_creacion, operario,
            fecha_realizacion, anot_anterior, anot_posterior)VALUES ('',:persona,:phone,:descripcion,:correo,
            :direccion,:poblacion,:cp,:provincia,:estado,CURDATE(),:operario,:fechaR,:aa,:ap,:fichero);";

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
            $sentencia->bindParam(':fichero', $data->fichero);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Muestra los datos tan solo de una tarea
     * 
     * @return void
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

    //PAGINACION    
    /**
     * Calcula el numero de paginas que tiene que montar
     *
     * @return void
     */
    function calcularPaginas()
    {
        $queryTotalResultados = $this->connect()->query('SELECT COUNT(*) AS total FROM task');
        $this->nResultados = $queryTotalResultados->fetch(PDO::FETCH_OBJ)->total;
        $this->totalPaginas = $this->nResultados / $this->resultadosPorPagina;

        if (isset($_GET['pag'])) {
            $this->paginaActual = $_GET['pag'];
            $this->indice = ($this->paginaActual - 1) * $this->resultadosPorPagina;
        }
    }

    /**
     * Muestra las paginas
     *
     * @return void
     */
    function mostrarPaginas()
    {
        $actual = '';
        echo "<ul class='pagination'>";

        for ($i = 0; $i < $this->totalPaginas; $i++) {
            if (($i + 1) == $this->paginaActual) {
                $actual = 'class="actual"';
                $this->pag == $this->paginaActual;
            } else {
                $actual = '';
            }
            echo '<li><a ' . $actual . ' href="?pag='  . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li>';
        }
        echo "</ul>";
    }

    /**
     * Muestra el numero total de resultados encontrados
     *
     * @return void
     */
    function mostrarTotalResultados()
    {
        return $this->nResultados;
    }

    function mostrarPag(){
        return $this->pag;
    }

}
