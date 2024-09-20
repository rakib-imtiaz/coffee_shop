<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>

    <!-- Link to external CSS -->
    <link rel="stylesheet" href="../../assets/css/customer_dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <!-- Include Chart.js for graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="wrapper">

        <!-- Side Panel -->
        <div id="sidePanel" class="side-panel">
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-shopping-cart"></i> Your Orders</a></li>
                <li><a href="#"><i class="fas fa-heart"></i> Wishlist</a></li>
                <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Welcome, [Customer Name]!</h1>
                <p>Manage your orders, wishlist, and account settings all in one place.</p>
            </header>

            <!-- Section: Orders Overview -->
            <section class="dashboard-panels">
                <div class="panel">
                    <h3>Recent Orders</h3>
                    <ul class="orders-list">
                        <li>Order #12345 - Shipped - <a href="#">Track</a></li>
                        <li>Order #12346 - Delivered - <a href="#">Details</a></li>
                        <li>Order #12347 - Processing - <a href="#">Track</a></li>
                    </ul>
                    <a href="#" class="view-all-btn">View All Orders</a>
                </div>

                <!-- Section: Wishlist -->
                <div class="panel">
                    <h3>Your Wishlist</h3>
                    <ul class="wishlist-list">
                        <li>Product 1 - <a href="#">View</a></li>
                        <li>Product 2 - <a href="#">View</a></li>
                        <li>Product 3 - <a href="#">View</a></li>
                    </ul>
                    <a href="#" class="view-all-btn">View Full Wishlist</a>
                </div>
            </section>

            <!-- Section: Graphs -->
            <section class="dashboard-graphs">
                <div class="graph-panel">
                    <h3>Order History</h3>
                    <canvas id="orderHistoryChart"></canvas>
                </div>

                <div class="graph-panel">
                    <h3>Spending History</h3>
                    <canvas id="spendingHistoryChart"></canvas>
                </div>
            </section>

            <!-- Section: Recommendations -->
            <section class="dashboard-panels">
                <div class="panel">
                    <h3>Recommended Products</h3>
                    <ul class="recommended-products">
                        <li>Product 1 - $29.99 - <a href="#">Buy Now</a></li>
                        <li>Product 2 - $49.99 - <a href="#">Buy Now</a></li>
                        <li>Product 3 - $19.99 - <a href="#">Buy Now</a></li>
                    </ul>
                </div>

                <div class="panel">
                    <h3>Special Offers</h3>
                    <p>Use code **WELCOME10** to get 10% off your next order!</p>
                </div>
            </section>
        </div>

    </div>

    <!-- Chart.js code for generating graphs -->
    <script>
        // Order History Chart
        const orderHistoryCtx = document.getElementById('orderHistoryChart').getContext('2d');
        new Chart(orderHistoryCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Orders',
                    data: [5, 10, 8, 12, 15, 9],
                    borderColor: 'rgba(106, 59, 22, 1)',
                    backgroundColor: 'rgba(106, 59, 22, 0.2)',
                }]
            }
        });

        // Spending History Chart
        const spendingHistoryCtx = document.getElementById('spendingHistoryChart').getContext('2d');
        new Chart(spendingHistoryCtx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Spending ($)',
                    data: [200, 400, 300, 600, 500, 450],
                    backgroundColor: 'rgba(106, 59, 22, 0.8)',
                }]
            }
        });
    </script>

</body>
</html>
