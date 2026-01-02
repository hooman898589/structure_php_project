<?php
// برای مثال

use Conn\pdo;

$inputs = file_get_contents('php://input');
$data = json_decode($inputs,true);

$conn = new pdo();
$conn=$conn->getConnection();


$query='INSERT INTO customers (firstname,lastname,phone,created_at,updated_at) VALUE (?,?,?,now(),now())';
$stm=$conn->prepare($query);
$stm->execute([$data['firstname'], $data['lastname'] , $data['phone']]);


echo json_encode([
    'masssage'=>'با موفقیت ایجاد شد'
]);
