<?php
require_once '../../includes/db_connect.php'; // Make sure $db is a PDO object

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Handle POST and GET actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['action'])) {

    // Get the action from the request (POST or GET)
    $action = $_POST['action'] ?? $_GET['action'];

    // Add a new bean type
    if ($action === 'add') {
        // Get form inputs
        $name = $_POST['bean_name'];
        $origin = $_POST['bean_origin'];
        $tasting_notes = $_POST['tasting_notes'];
        $brewing_tips = $_POST['brewing_tips'];
        $description = $_POST['description'];
        $video_url = $_POST['video_url'];
        $expert_review = $_POST['expert_review'];
        $image_url = $_POST['image_url'];

        // Prepare SQL for adding a new bean type
        $sql = "INSERT INTO bean_types (name, origin, tasting_notes, brewing_tips, description, video_url, expert_review, image_url) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $db->prepare($sql);

        // Execute the statement with input values
        if ($stmt->execute([$name, $origin, $tasting_notes, $brewing_tips, $description, $video_url, $expert_review, $image_url])) {
            echo "Bean type added successfully!";
            header('Location: admin_dashboard.php'); // Redirect after successful operation
            exit;
        } else {
            echo "Error adding bean type: " . implode(", ", $stmt->errorInfo());
        }

    // Update an existing bean type
    } elseif ($action === 'update' && isset($_POST['bean_id'])) {
        $bean_id = $_POST['bean_id'];

        // Get form inputs
        $name = $_POST['bean_name'];
        $origin = $_POST['bean_origin'];
        $tasting_notes = $_POST['tasting_notes'];
        $brewing_tips = $_POST['brewing_tips'];
        $description = $_POST['description'];
        $video_url = $_POST['video_url'];
        $expert_review = $_POST['expert_review'];
        $image_url = $_POST['image_url'];

        // Prepare SQL for updating an existing bean type
        $sql = "UPDATE bean_types 
                SET name = ?, origin = ?, tasting_notes = ?, brewing_tips = ?, description = ?, video_url = ?, expert_review = ?, image_url = ?
                WHERE id = ?";

        // Prepare the statement
        $stmt = $db->prepare($sql);

        // Execute the statement with input values and the bean ID
        if ($stmt->execute([$name, $origin, $tasting_notes, $brewing_tips, $description, $video_url, $expert_review, $image_url, $bean_id])) {
            echo "Bean type updated successfully!";
            header('Location: admin_dashboard.php'); // Redirect after successful operation
            exit;
        } else {
            echo "Error updating bean type: " . implode(", ", $stmt->errorInfo());
        }

    // Delete a bean type
    } elseif ($action === 'delete' && isset($_GET['bean_id'])) {
        $bean_id = $_GET['bean_id'];

        // Prepare SQL for deleting a bean type
        $sql = "DELETE FROM bean_types WHERE id = ?";
        $stmt = $db->prepare($sql);

        // Execute the statement with the bean ID
        if ($stmt->execute([$bean_id])) {
            echo "Bean type deleted successfully!";
            header('Location: admin_dashboard.php'); // Redirect after successful deletion
            exit;
        } else {
            echo "Error deleting bean type: " . implode(", ", $stmt->errorInfo());
        }
    }
}
?>
