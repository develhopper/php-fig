<?php

spl_autoload_register(function($classname){
    $path=__DIR__.DIRECTORY_SEPARATOR.str_replace('\\','/',$classname).'.php';
    if(file_exists($path)){
        include_once $path;
    }else{
        die("File Not Found $path");
    }
});