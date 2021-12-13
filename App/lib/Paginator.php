<?php
class Paginator
{
    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $pag;

    function __construct($nPorPagina,$tabla)
    {
        try {
            $this->resultadosPorPagina = $nPorPagina;
            $this->indice = 0;
            $this->paginaActual = 1;

            $this->calcularPaginas($tabla);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function calcularPaginas($tabla)
    {
        $queryTotalResultados = Connection::Conex()->query("SELECT COUNT(*) AS total FROM $tabla");
        $this->nResultados = $queryTotalResultados->fetch(PDO::FETCH_OBJ)->total;
        $this->totalPaginas = ceil($this->nResultados / $this->resultadosPorPagina);

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
            if($this->paginaActual == 1){
                echo '<li><a href="?pag='  . ($this->paginaActual) . '" class="page-link" hidden> << Anterior </a></li>';
            }else{
                echo '<li><a href="?pag='  . ($this->paginaActual - 1) . '" class="page-link">' . "<< Anterior" . '</a></li>';
            }

        for ($i = 0; $i < $this->totalPaginas; $i++) {
            if (($i + 1) == $this->paginaActual) {
                $actual = 'class="actual"';
                $this->pag == $this->paginaActual;
            } else {
                $actual = '';
            }
            echo '<li><a ' . $actual . ' href="?pag='  . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li>';
        }
        
        if($this->paginaActual == $this->totalPaginas){
            echo '<li><a href="?pag='  . ($this->paginaActual) . '" class="page-link" hidden> Siguiente >> </a></li>';
        }else{
            echo '<li><a href="?pag=' . ($this->paginaActual + 1) .' " class="page-link"> Siguiente >> </a></li>';
        }
        echo "</ul>";
    }


    function mostrarTotalResultados()
    {
        return $this->nResultados;
    }

    function getIndice()
    {
        return $this->indice;
    }

    function getResultadosPorPagina()
    {
        return $this->resultadosPorPagina;
    }

}
