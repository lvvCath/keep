<?php
header('Content-Type: application/json');
include("../../../Database/db.php");

$id = (int) $_POST['id'];

$stmt = $db->prepare("DELETE FROM users_service WHERE id = ?");
$result = $stmt->execute([$id]);

if($result){
    echo json_encode([
        'code' => '201'
    ]);
}else{
    echo json_encode([
        'code' => '400'
    ]);
}
?>