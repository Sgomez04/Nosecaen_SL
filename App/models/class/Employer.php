<?php
/**Clase tarea que extiende de la clase conexion
 * 
 * 
 */
class Employer
{
    //conexion
    public $user;
    public $passwords;
    public $names;
    public $types;
    public $id_employer;


    //Paginacion
    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $pag;

    function __construct($nPorPagina)
    {
        try {
           
            $this->resultadosPorPagina = $nPorPagina;
            $this->indice = 0;
            $this->paginaActual = 1;

            $this->calcularPaginas();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function listaUsuarios()
    {
        try {
            $query =  Connection::Conex()->prepare('SELECT * FROM employer LIMIT :pos, :n');
            $query->execute(['pos' => $this->indice, 'n' => $this->resultadosPorPagina]);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function modificarUser(Employer $data)
    {
        try {
            $id = "'" . "$data->id_employer" . "'";
            $user = "'" . $data->user . "'";
            $password = "'" . $data->passwords . "'";
            $tipo = "'" . $data->types . "'";
            $nombre = "'" . $data->name . "'";

            $sql = "UPDATE task SET user= " . $user . ", passwords= " . $password . ",
            types= " . $tipo . ", names= " . $nombre . " WHERE id_employer =  " . $id . "";

            $sentencia =  Connection::Conex()->prepare($sql);

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
    function borrarUser($id_employer)
    {
        try {
            $query = Connection::Conex()->prepare('DELETE FROM employer WHERE id_employer = :id');

            $query->bindParam(':id', $id_employer);
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
    function añadirUser(Employer $data)
    {
        try {
            $sql = "INSERT INTO employer(id_employer, user, passwords, types,
            names) VALUES ('',:user,:passwords,:types,:names);";

            $sentencia = Connection::Conex()->prepare($sql);

            $sentencia->bindParam(':user', $data->user);
            $sentencia->bindParam(':passwords', $data->passwords);
            $sentencia->bindParam(':types', $data->types);
            $sentencia->bindParam(':names', $data->name);
            
            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function comprobarUser($user,$password)
    {
        try {
            $sentencia = Connection::Conex()->prepare("SELECT * FROM employer WHERE user = :user AND passwords = :passwords");
            $sentencia->bindParam(':user', $user);
            $sentencia->bindParam(':passwords', $password);

            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verUser($id_employer)
    {
        try {
            $sentencia =  Connection::Conex()->prepare("SELECT * FROM employer WHERE id_employer = :id_employer");
            $sentencia->bindParam(':id_employer', $id_employer);

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
        $queryTotalResultados = Connection::Conex()->query('SELECT COUNT(*) AS total FROM employer');
        $this->nResultados = $queryTotalResultados->fetch(PDO::FETCH_OBJ)->total;
        $this->totalPaginas = ceil($this->nResultados / $this->resultadosPorPagina);

        if (isset($_GET['pagU'])) {
            $this->paginaActual = $_GET['pagU'];
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
            if($this->paginaActual == 1){
                echo '<li><a href="?pagU='  . ($this->paginaActual) . '" class="page-link" hidden> << Anterior </a></li>';
            }else{
                echo '<li><a href="?pagU='  . ($this->paginaActual - 1) . '" class="page-link">' . "<< Anterior" . '</a></li>';
            }

        for ($i = 0; $i < $this->totalPaginas; $i++) {
            if (($i + 1) == $this->paginaActual) {
                $actual = 'class="actual"';
                $this->pag == $this->paginaActual;
            } else {
                $actual = '';
            }
            echo '<li><a ' . $actual . ' href="?pagU='  . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li>';
        }
        
        if($this->paginaActual == $this->totalPaginas){
            echo '<li><a href="?pagU='  . ($this->paginaActual) . '" class="page-link" hidden> Siguiente >> </a></li>';
        }else{
            echo '<li><a href="?pagU=' . ($this->paginaActual + 1) .' " class="page-link"> Siguiente >> </a></li>';
        }
        echo "</ul>";
    }


    function mostrarTotalResultados()
    {
        return $this->nResultados;
    }

}