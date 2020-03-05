<?php
require 'autoload.php';

use Log\Logger;

$options=["LogFormat"=>"{level}:::{message} -- {date}","dateFormat"=>"Y-M-d H:i"];
$logger=new Logger($options);

$logger->debug("This is debug Log {from}",['from'=>'debuger']);