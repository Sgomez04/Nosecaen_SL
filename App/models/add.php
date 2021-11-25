<?php
$tareas = [];

if(!$_POST){
    $tareas = [
        "persona"=>"",
        "telefono"=>"",
        "descripcion"=>"",
        "correo"=>"",
        "direccion"=>"",
        "poblacion"=>"",
        "cp"=>"",
        "provincia"=>"",
        "estado"=>"",
        "operario"=>"",
        "fechaR"=>"",
        "aa"=>"",
        "ap"=>""];    
} else{
    $tareas = [
        "persona"=>ValorPost("persona"),
        "telefono"=>ValorPost("telefono"),
        "descripcion"=>ValorPost("descripcion"),
        "correo"=>ValorPost("correo"),
        "direccion"=>ValorPost("direccion"),
        "poblacion"=>ValorPost("poblacion"),
        "cp"=>ValorPost("cp"),
        "provincia"=>ValorPost("provincia"),
        "estado"=>ValorPost("estado"),
        "operario"=>ValorPost("operario"),
        "fechaR"=>ValorPost("fechaR"),
        "aa"=>ValorPost("aa"),
        "ap"=>ValorPost("ap")];
}

