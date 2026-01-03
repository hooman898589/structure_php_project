
<?php
require_once 'vendor/autoload.php';
use Model\customer;
$inputs = file_get_contents('php://input');
$data = json_decode($inputs,true);

$firstname=$data['firstname'];
$lastname=$data['lastname'];
$phone=$data['phone'];
$customer=new customer();

$customer->update($id,["firstname"=>"$firstname","lastname"=>"$lastname","phone"=>"$phone"]);

