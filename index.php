#!/usr/bin/env php
<?php 

require __DIR__ . '/vendor/autoload.php';
require 'app/Main.php';

use Test\app\Main;
use Test\app\CsvReader;

$main = new Main();
$data =  $main->handleCLIRequest();
print_r($data);

?>
