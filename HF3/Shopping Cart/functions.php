<?php

function loadModel(string $className){
    $path_to_file=$className.".php";
    echo $path_to_file. "<br>";
    if(file_exists($path_to_file)){
        include $path_to_file;
    }else{
        throw new Exception("Model file not found");
    }
}


spl_autoload_register("loadModel");