<?php
// برای مثال
use Conn\pdo;

$conn = new pdo();
$conn=$conn->getConnection();


$query='DELETE FROM customers WHERE id=?';
$stm=$conn->prepare($query);
$stm->execute([$id]);


echo json_encode([
    'masssage'=>'با موفقیت حذف شد'
]);
