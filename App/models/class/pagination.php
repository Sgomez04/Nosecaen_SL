<?php
class Pagination{

    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $array;

    function __construct($nPorPagina,$task){
        $this->resultadosPorPagina = $nPorPagina;
        $this->indice = 0;
        $this->paginaActual = 1;
        $this->array = $task;
        $this->calcularPaginas();
    }


    function calcularPaginas(){
        $this->nResultados = count($this->array); 
        $this->totalPaginas = $this->nResultados / $this->resultadosPorPagina;

        if(isset($_GET['pagina'])){
            $this->paginaActual = $_GET['pagina'];
            $this->indice = ($this->paginaActual - 1) * $this->resultadosPorPagina;
        }
    }

    function mostrarPaginas(){
    }

    function mostrarTotalResultados(){
        return $this->nResultados;
    }
}

?>

?>