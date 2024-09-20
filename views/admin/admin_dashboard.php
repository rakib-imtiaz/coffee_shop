<?php
session_start();
require_once '../../includes/db_connect.php';
include '../../includes/header.php';

// Ensure the user is logged in and is an admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../assets/js/load_charts.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Main Wrapper -->
    <div class="flex h-screen">

        <!-- Hamburger Menu -->
        <div class="fixed top-4 left-4 z-50">
            <button id="hamburger" class="text-gray-800 text-3xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Side Panel -->
        <div style="margin-top: 70px;" id="sidePanel" class="fixed top-0 left-0 h-full w-64 bg-gray-900 text-white transform -translate-x-full transition-transform duration-300">
            <ul class="p-4 space-y-6">
                <li><a href="#" class="flex items-center"><i class="fas fa-chart-line mr-2"></i> Dashboard</a></li>
                <li><a href="#" class="flex items-center" id="addInventoryBtn"><i class="fas fa-box mr-2"></i> Add Inventory</a></li>
                <li><a href="#" class="flex items-center" id="addBeanTypeBtn"><i class="fas fa-seedling mr-2"></i> Add Bean Type</a></li>
                <li><a href="#" class="flex items-center"><i class="fas fa-shopping-cart mr-2"></i> Orders</a></li>
                <li><a href="#" class="flex items-center"><i class="fas fa-users mr-2"></i> Customers</a></li>
                <li><a href="logout.php" class="flex items-center"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div id="mainContent" class="flex-grow p-8 transition-transform duration-300">
            <header>
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Admin Dashboard</h1>
                <p class="text-gray-600">Welcome back, Admin!</p>
            </header>

            <!-- Dashboard Panels -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                <!-- Sales Info Chart -->
                <div class="p-4 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Sales Info</h3>
                    <canvas id="salesChart" class="w-full h-48"></canvas>
                </div>
                <!-- Inventory/Stock Chart -->
                <div class="p-4 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Inventory / Stock</h3>
                    <canvas id="inventoryChart" class="w-full h-48"></canvas>
                </div>
                <!-- Orders Status Chart -->
                <div class="p-4 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Orders Status</h3>
                    <canvas id="ordersStatusChart" class="w-full h-48"></canvas>
                </div>
                <!-- Customers Statistics Chart -->
                <div class="p-4 bg-white rounded shadow">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Customers Statistics</h3>
                    <canvas id="customersStatsChart" class="w-full h-48"></canvas>
                </div>
            </section>

            <!-- Inventory Management Section -->
            <section id="inventory-section" class="mt-12">
                <h2 class="text-3xl font-bold mb-4">Manage Inventory</h2>
                <!-- Inventory Table -->
                <table class="min-w-full bg-white shadow-md rounded my-6">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border">ID</th>
                            <th class="py-2 px-4 border">Bean Type</th>
                            <th class="py-2 px-4 border">Quantity</th>
                            <th class="py-2 px-4 border">Restock Date</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        // Fetch inventory items
                        $inventory_items = $db->query("SELECT inventory.id, bean_types.name, inventory.quantity, inventory.restock_date FROM inventory JOIN bean_types ON inventory.bean_type_id = bean_types.id")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($inventory_items as $item):
                        ?>
                            <tr>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($item['id']) ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($item['name']) ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($item['quantity']) ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($item['restock_date']) ?></td>
                                <td class="py-2 px-4 border">
                                    <button class="bg-green-500 text-white px-2 py-1 rounded mr-2" onclick="editInventory(<?= htmlspecialchars($item['id']) ?>, '<?= htmlspecialchars(addslashes($item['name'])) ?>', <?= htmlspecialchars($item['quantity']) ?>, '<?= htmlspecialchars($item['restock_date']) ?>')">Update</button>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="deleteInventory(<?= htmlspecialchars($item['id']) ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <!-- Bean Types Management Section -->
            <section class="mt-12">
                <h2 class="text-3xl font-bold mb-4">Manage Bean Types</h2>
                <!-- Bean Types Table -->
                <table class="min-w-full bg-white shadow-md rounded my-6">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border">ID</th>
                            <th class="py-2 px-4 border">Name</th>
                            <th class="py-2 px-4 border">Origin</th>
                            <th class="py-2 px-4 border">Tasting Notes</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch bean types
                        $bean_types = $db->query("SELECT id, name, origin, tasting_notes FROM bean_types")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($bean_types as $bean):
                        ?>
                            <tr>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($bean['id']) ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($bean['name']) ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($bean['origin']) ?></td>
                                <td class="py-2 px-4 border"><?= htmlspecialchars($bean['tasting_notes']) ?></td>
                                <td class="py-2 px-4 border">
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded mr-2" onclick="editBeanType(<?= htmlspecialchars($bean['id']) ?>, '<?= htmlspecialchars(addslashes($bean['name'])) ?>', '<?= htmlspecialchars(addslashes($bean['origin'])) ?>', '<?= htmlspecialchars(addslashes($bean['tasting_notes'])) ?>')">Edit</button>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="deleteBeanType(<?= htmlspecialchars($bean['id']) ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
            <br><br>
        </div>

        <!-- Modals -->
        <!-- Add/Update Bean Type Modal -->
        <div id="beanTypeModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                <h2 id="beanTypeModalTitle" class="text-2xl font-bold mb-4">Add Bean Type</h2>
                <form id="beanTypeForm" action="bean_type_action.php" method="POST">
                    <input type="hidden" name="bean_type_id" id="bean_type_id">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Bean Name</label>
                        <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="origin" class="block text-gray-700">Origin</label>
                        <input type="text" id="origin" name="origin" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="tasting_notes" class="block text-gray-700">Tasting Notes</label>
                        <textarea id="tasting_notes" name="tasting_notes" class="w-full p-2 border border-gray-300 rounded"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" name="action" value="add" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                        <button type="button" id="closeBeanTypeModal" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add/Update Inventory Modal -->
        <div id="inventoryModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                <h2 id="inventoryModalTitle" class="text-2xl font-bold mb-4">Add Inventory</h2>
                <form id="inventoryForm" action="inventory_action.php" method="POST">
                    <input type="hidden" name="inventory_id" id="inventory_id">
                    <div class="mb-4">
                        <label for="bean_type" class="block text-gray-700">Bean Type</label>
                        <select id="bean_type" name="bean_type_id" class="w-full p-2 border border-gray-300 rounded" required>
                            <?php
                            // Fetch bean types for the select dropdown
                            $stmt = $db->query("SELECT id, name FROM bean_types");
                            while ($row = $stmt->fetch()) {
                                echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="restock_date" class="block text-gray-700">Restock Date</label>
                        <input type="date" id="restock_date" name="restock_date" class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" name="action" value="add" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                        <button type="button" id="closeInventoryModal" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
                    </div>
                </form>
            </div>
            
        </div>

        <!-- JavaScript for Side Panel and Modals -->
        <script>
            // Side Panel Toggle
            const sidePanel = document.getElementById('sidePanel');
            const mainContent = document.getElementById('mainContent');
            const hamburger = document.getElementById('hamburger');

            const addInventoryBtn = document.getElementById('addInventoryBtn');
            const inventoryModal = document.getElementById('inventoryModal');
            const closeInventoryModal = document.getElementById('closeInventoryModal');

            const addBeanTypeBtn = document.getElementById('addBeanTypeBtn');
            const beanTypeModal = document.getElementById('beanTypeModal');
            const closeBeanTypeModal = document.getElementById('closeBeanTypeModal');

            // Toggle Side Panel
            hamburger.addEventListener('click', function() {
                sidePanel.classList.toggle('-translate-x-full');
                mainContent.classList.toggle('ml-64'); // Shift main content when side panel is visible
            });

            // Inventory Modal Toggle
            addInventoryBtn.addEventListener('click', function(e) {
                e.preventDefault();
                inventoryModal.classList.remove('hidden');
                // Reset form
                document.getElementById('inventoryForm').reset();
                document.getElementById('inventoryForm').action = 'inventory_action.php?action=add';
                document.getElementById('inventoryModalTitle').textContent = 'Add Inventory';
            });

            closeInventoryModal.addEventListener('click', function() {
                inventoryModal.classList.add('hidden');
            });

            // Bean Type Modal Toggle
            addBeanTypeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                beanTypeModal.classList.remove('hidden');
                // Reset form
                document.getElementById('beanTypeForm').reset();
                document.getElementById('beanTypeForm').action = 'bean_type_action.php?action=add';
                document.getElementById('beanTypeModalTitle').textContent = 'Add Bean Type';
            });

            closeBeanTypeModal.addEventListener('click', function() {
                beanTypeModal.classList.add('hidden');
            });

            // Function to Populate and Show Update Inventory Modal
            function editInventory(id, name, quantity, restockDate) {
                inventoryModal.classList.remove('hidden');
                document.getElementById('inventoryModalTitle').textContent = 'Update Inventory';
                document.getElementById('inventoryForm').action = 'inventory_action.php?action=update';
                document.getElementById('inventory_id').value = id;
                document.getElementById('bean_type').value = getBeanTypeIdByName(name);
                document.getElementById('quantity').value = quantity;
                document.getElementById('restock_date').value = restockDate;
            }

            // Function to Populate and Show Update Bean Type Modal
            function editBeanType(id, name, origin, tastingNotes) {
                beanTypeModal.classList.remove('hidden');
                document.getElementById('beanTypeModalTitle').textContent = 'Edit Bean Type';
                document.getElementById('beanTypeForm').action = 'bean_type_action.php?action=update';
                document.getElementById('bean_type_id').value = id;
                document.getElementById('name').value = name;
                document.getElementById('origin').value = origin;
                document.getElementById('tasting_notes').value = tastingNotes;
            }

            // Function to Delete Inventory
            function deleteInventory(id) {
                if (confirm('Are you sure you want to delete this inventory item?')) {
                    window.location.href = `inventory_action.php?action=delete&inventory_id=${id}`;
                }
            }

            // Function to Delete Bean Type
            function deleteBeanType(id) {
                if (confirm('Are you sure you want to delete this bean type?')) {
                    window.location.href = `bean_type_action.php?action=delete&bean_type_id=${id}`;
                }
            }

            // Helper Function to Get Bean Type ID by Name
            function getBeanTypeIdByName(name) {
                const beanTypes = <?php
                                    // Fetch bean types as JSON
                                    $stmt = $db->query("SELECT id, name FROM bean_types");
                                    $beanTypesArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    echo json_encode($beanTypesArray);
                                    ?>;
                const bean = beanTypes.find(bean => bean.name === name);
                return bean ? bean.id : '';
            }
        </script>



</body>

</html>