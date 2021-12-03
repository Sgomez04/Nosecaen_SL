<?php
/**Clase tarea que extiende de la clase conexion
 * 
 * 
 */
class Employer extends Connection
{
    public $user;
    public $password;
    public $name;
    public $type;


    //Paginacion
    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $pag;

    function __construct()
    {
        try {
           
            parent::__construct();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function todosTrabajadores(){
        try {
            $query = $this->connect()->prepare('SELECT * FROM employer');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verTrabajador($user,$password)
    {
        try {
            $sentencia = $this->connect()->prepare("SELECT * FROM employer WHERE user = :user AND passwords = :passwords");
            $sentencia->bindParam(':user', $user);
            $sentencia->bindParam(':passwords', $password);

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

        if (isset($_GET['pagina'])) {
            $this->paginaActual = $_GET['pagina'];
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
        echo "<ul>";

        for ($i = 0; $i < $this->totalPaginas; $i++) {
            if (($i + 1) == $this->paginaActual) {
                $actual = ' class="actual" ';
                $this->pag == $this->paginaActual;
            } else {
                $actual = '';
            }
            echo '<li><a ' . $actual . 'href="?pagina=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
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