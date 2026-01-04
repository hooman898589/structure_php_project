

<?php
// برای مثال
require_once '../vendor/autoload.php';
use Conn\pdo;

$conn = new pdo();
$conn=$conn->getConnection();

$query='SELECT * FROM customers';
$data=$conn->query($query)->fetchAll();

echo json_encode([
    'data'=>$data
]);