<?php
require_once '../../includes/db_connect.php'; // Database connection

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['action'])) {

    // Get the action from the request (POST or GET)
    $action = $_POST['action'] ?? $_GET['action'];

    // Deleting an inventory item
    if ($action === 'delete' && isset($_GET['inventory_id'])) {
        $inventory_id = $_GET['inventory_id'];

        // Debugging: Check the Inventory ID
        echo "Inventory ID to delete: " . htmlspecialchars($inventory_id) . "<br>";

        // Prepare SQL for deleting an inventory item
        $sql = "DELETE FROM inventory WHERE id = ?";
        $stmt = $db->prepare($sql);

        // Debugging: Output the SQL query for verification
        echo "SQL Query: " . $sql . "<br>";

        if ($stmt->execute([$inventory_id])) {
            echo "Inventory deleted successfully!";
            // Redirect to the admin dashboard after successful deletion
            header('Location: admin_dashboard.php');
            exit;
        } else {
            echo "Error deleting inventory: " . implode(", ", $stmt->errorInfo());
        }

    // Adding a new inventory item
    } elseif (isset($_POST['action']) && $_POST['action'] === 'add') {
        $bean_type_id = $_POST['bean_type_id'];
        $quantity = $_POST['quantity'];
        $restock_date = $_POST['restock_date'] ?? null;

        // Debugging: Output the input values for adding
        echo "Bean Type ID: " . htmlspecialchars($bean_type_id) . "<br>";
        echo "Quantity: " . htmlspecialchars($quantity) . "<br>";
        echo "Restock Date: " . htmlspecialchars($restock_date) . "<br>";

        // Prepare SQL for adding new inventory
        $sql = "INSERT INTO inventory (bean_type_id, quantity, restock_date) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);

        // Debugging: Output the SQL query for verification
        echo "SQL Query: " . $sql . "<br>";

        if ($stmt->execute([$bean_type_id, $quantity, $restock_date])) {
            echo "Inventory added successfully!";
            header('Location: admin_dashboard.php');
            exit;
        } else {
            echo "Error adding inventory: " . implode(", ", $stmt->errorInfo());
        }

    // Updating an existing inventory item
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $inventory_id = $_POST['inventory_id'];
        $bean_type_id = $_POST['bean_type_id'];
        $quantity = $_POST['quantity'];
        $restock_date = $_POST['restock_date'] ?? null;

        // Debugging: Output the input values for updating
        echo "Inventory ID: " . htmlspecialchars($inventory_id) . "<br>";
        echo "Bean Type ID: " . htmlspecialchars($bean_type_id) . "<br>";
        echo "Quantity: " . htmlspecialchars($quantity) . "<br>";
        echo "Restock Date: " . htmlspecialchars($restock_date) . "<br>";

        // Prepare SQL for updating inventory
        $sql = "UPDATE inventory SET bean_type_id = ?, quantity = ?, restock_date = ? WHERE id = ?";
        $stmt = $db->prepare($sql);

        // Debugging: Output the SQL query for verification
        echo "SQL Query: " . $sql . "<br>";

        if ($stmt->execute([$bean_type_id, $quantity, $restock_date, $inventory_id])) {
            echo "Inventory updated successfully!";
            header('Location: admin_dashboard.php');
            exit;
        } else {
            echo "Error updating inventory: " . implode(", ", $stmt->errorInfo());
        }
    }
}
?>
