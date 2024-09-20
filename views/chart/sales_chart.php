<?php
require_once '../../includes/db_connect.php';

$sql = "SELECT DATE_FORMAT(order_date, '%M') AS month, SUM(total_amount) AS total_sales 
        FROM orders 
        WHERE payment_status = 'completed' 
        GROUP BY month 
        ORDER BY order_date ASC 
        LIMIT 6";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$sales_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$labels = [];
$data = [];
foreach ($sales_data as $row) {
    $labels[] = $row['month'];
    $data[] = $row['total_sales'];
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);
?>
