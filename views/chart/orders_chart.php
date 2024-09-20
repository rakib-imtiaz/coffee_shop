<?php
require_once '../../includes/db_connect.php';

$sql = "SELECT order_status, COUNT(*) AS count 
        FROM orders 
        GROUP BY order_status";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$labels = [];
$data = [];
$backgroundColors = ['#6a3b16', '#b85b3b', '#d4825f'];

foreach ($orders_data as $row) {
    $labels[] = ucfirst($row['order_status']);
    $data[] = $row['count'];
}

echo json_encode([
    'labels' => $labels,
    'data' => $data,
    'backgroundColors' => $backgroundColors
]);
?>
