<?php
// برای مثال

use Conn\pdo;

$inputs = file_get_contents('php://input');
$data = json_decode($inputs,true);

$conn = new pdo();
$conn=$conn->getConnection();


$query='UPDATE   customers SET firstname=? , lastname=? , phone=? WHERE id=?';
$stm=$conn->prepare($query);
$stm->execute([$data['firstname'], $data['lastname'] , $data['phone'],$id]);


echo json_encode([
    'masssage'=>'با موفقیت تغیر یافت شد'
]);
