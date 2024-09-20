<?php
require_once '../../includes/db_connect.php';

$sql = "SELECT bean_types.name, inventory.quantity 
        FROM inventory 
        JOIN bean_types ON inventory.bean_type_id = bean_types.id";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$inventory_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$labels = [];
$data = [];
foreach ($inventory_data as $row) {
    $labels[] = $row['name'];
    $data[] = $row['quantity'];
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);
?>
