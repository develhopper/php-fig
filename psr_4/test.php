<?php

use Foo\Bar\FooClass;
use psr_4\Autoloader;

include_once "Autoloader.php";

$loader=new Autoloader();
$loader->register();
$loader->addNamespace('Foo\Bar',"/vendor/foo/bar");

// $loader->LoadClass("Foo\Bar\FooClass");

$fooClass=new FooClass();
$fooClass->test();