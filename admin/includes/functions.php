<?php 

function classAutoLoader($class) {
    //  
    $the_path = "includes/{$class}.php";

    if(file_exists($the_path)){
        require_once($the_path);
    } else {
        die("the file name {$class}.php was not found");
    }
}

function redirect($location){
    header("location: {$location}");
}

spl_autoload_register("classAutoLoader");

?>