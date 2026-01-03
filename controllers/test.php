
<?php
require_once '../vendor/autoload.php';
use Model\customer;

$customer=new customer();
echo '<pre>';
$customer->update(18,["firstname"=>"'fr'","lastname"=>"'df'","phone"=>"'rsdf'"]);

