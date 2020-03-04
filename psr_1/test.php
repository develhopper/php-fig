<?php
// This file contains side effects

// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: loads a file
include "MyClass.php";

// side effect: generates output
echo "<html>\n";