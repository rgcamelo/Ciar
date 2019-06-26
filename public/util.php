<?php
use App\Docente;

$procedimiento=$_POST["procedimientos"];

if($procedimiento=="boton"){
    $c="<button>Hola</button>";

    echo $c;
}
?>