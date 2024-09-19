<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Link to external CSS -->
    <link rel="stylesheet" href="../Assets/CSS/admin_dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <!-- Include a chart library (e.g., Chart.js) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="wrapper">

        <!-- Side Panel -->
        <div id="sidePanel" class="side-panel">
            <ul>
                <li><a href="#"><i class="fas fa-chart-line"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-box"></i> Inventory/Stock</a></li>
                <li><a href="#"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Customers</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main content area -->
        <div class="main-content">
            <header>
                <h1>Admin Dashboard</h1>
                <p>Welcome back, Admin!</p>
            </header>

            <!-- Dashboard Panels -->
            <section class="dashboard-panels">
                <div class="panel">
                    <h3>Sales Info</h3>
                    <canvas id="salesChart"></canvas>
                </div>
                <div class="panel">
                    <h3>Inventory / Stock</h3>
                    <canvas id="inventoryChart"></canvas>
                </div>
                <div class="panel">
                    <h3>Orders</h3>
                    <canvas id="ordersChart"></canvas>
                </div>
                <div class="panel">
                    <h3>Customers</h3>
                    <canvas id="customersChart"></canvas>
                </div>
            </section>
        </div>

    </div>

    <!-- JavaScript to toggle the side panel -->
    <script>
        const sidePanel = document.getElementById('sidePanel');
        document.body.addEventListener('mousemove', function(e) {
            if (e.clientX < 50) {
                sidePanel.style.transform = 'translateX(0)';
            } else if (e.clientX > 250) {
                sidePanel.style.transform = 'translateX(-250px)';
            }
        });
    </script>

    <!-- Chart.js code for generating graphs -->
    <script>
        // Sales Info Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales ($)',
                    data: [12000, 15000, 13000, 16000, 19000, 17000],
                    borderColor: 'rgba(106, 59, 22, 1)',
                    backgroundColor: 'rgba(106, 59, 22, 0.2)',
                }]
            }
        });

        // Inventory Chart
        const inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
        new Chart(inventoryCtx, {
            type: 'bar',
            data: {
                labels: ['Item 1', 'Item 2', 'Item 3', 'Item 4'],
                datasets: [{
                    label: 'Stock Level',
                    data: [500, 700, 300, 400],
                    backgroundColor: ['#6a3b16', '#5e3010', '#b85b3b', '#d4825f'],
                }]
            }
        });

        // Orders Chart
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        new Chart(ordersCtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Pending', 'Cancelled'],
                datasets: [{
                    label: 'Orders',
                    data: [120, 30, 15],
                    backgroundColor: ['#6a3b16', '#b85b3b', '#d4825f'],
                }]
            }
        });

        // Customers Chart
        const customersCtx = document.getElementById('customersChart').getContext('2d');
        new Chart(customersCtx, {
            type: 'pie',
            data: {
                labels: ['Returning', 'New'],
                datasets: [{
                    label: 'Customers',
                    data: [60, 40],
                    backgroundColor: ['#6a3b16', '#d4825f'],
                }]
            }
        });
    </script>

</body>
</html>
