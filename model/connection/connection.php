<?php 

$root = dirname(__DIR__);

$env = parse_ini_file($root . '/../.env');

$conn = mysqli_connect($env["DB_SERVER"], $env["DB_USER"], $env["DB_PASSWORD"], $env["DB_NAME"]);
