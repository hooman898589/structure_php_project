<?php



require_once 'vendor/autoload.php';
include_once 'routes/PostRoute.php';

use routes\web;

$statement=$_SERVER['REQUEST_URI'];

$post=new web();

