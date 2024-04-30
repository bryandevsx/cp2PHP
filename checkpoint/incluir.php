<?php

include ("conexao.php");

if (isset($_POST["modelo"], $_POST["cc"], $_POST["cv"]) ){

    $modelo = $_POST["modelo"];
    $cc = $_POST["cc"];
    $cv = $_POST["cv"];

    try{
        $sql = "INSERT INTO moto (modelo, cc, cv) VALUES ('$modelo', '$cc', '$cv')";
        $resultado = $conexao->query($sql);
        if ( $resultado){
            header("location: index.php?mensagem=1");
        }  
    } catch (Exception $e) {
        header("location: index.php?mensagem=2");
    }

}