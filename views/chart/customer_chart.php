<?php
require_once '../../includes/db_connect.php';

$sql = "SELECT role, COUNT(*) AS count 
        FROM users 
        WHERE role = 'customer'
        GROUP BY role";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$customers_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$labels = ['Customers'];
$data = [$customers_data[0]['count']];
$backgroundColors = ['#6a3b16'];

echo json_encode([
    'labels' => $labels,
    'data' => $data,
    'backgroundColors' => $backgroundColors
]);
?>
