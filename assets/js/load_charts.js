// Function to Fetch and Render Sales Chart
// Function to Fetch and Render Sales Chart
// Function to Fetch and Render Sales Chart
// Function to Fetch and Render Sales Chart
async function renderSalesChart() {
    const url = '/views/chart/sales_chart.php'; // Corrected URL path based on the structure

    try {
        console.log(`Fetching data from: ${url}`); // Debug: Check URL
        const response = await fetch(url);

        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.statusText}`);
        }

        const data = await response.json();
        console.log('Data received:', data); // Debug: Check if data is received

        if (data.error) {
            console.error('Error in data:', data.error); // Debug: Error from backend
            return;
        }

        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Sales ($)',
                    data: data.data,
                    borderColor: 'rgba(106, 59, 22, 1)',
                    backgroundColor: 'rgba(106, 59, 22, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
        console.log('Chart rendered successfully.'); // Debug: Check if chart is rendered
    } catch (error) {
        console.error('Error fetching sales data:', error); // Debug: Catch and log any errors
    }
}

// Call the function to render the chart
renderSalesChart();


// Function to Fetch and Render Inventory Chart
async function renderInventoryChart() {
    try {
        const response = await fetch('get_inventory_data.php');
        const data = await response.json();

        if (data.error) {
            console.error(data.error);
            return;
        }

        const inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
        new Chart(inventoryCtx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Stock Level',
                    data: data.data,
                    backgroundColor: '#6a3b16',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } catch (error) {
        console.error('Error fetching inventory data:', error);
    }
}

// Function to Fetch and Render Orders Status Chart
async function renderOrdersStatusChart() {
    try {
        const response = await fetch('get_orders_status.php');
        const data = await response.json();

        if (data.error) {
            console.error(data.error);
            return;
        }

        const ordersCtx = document.getElementById('ordersStatusChart').getContext('2d');
        new Chart(ordersCtx, {
            type: 'doughnut',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Orders',
                    data: data.data,
                    backgroundColor: data.backgroundColors,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    } catch (error) {
        console.error('Error fetching orders status data:', error);
    }
}

// Function to Fetch and Render Customers Statistics Chart
async function renderCustomersStatsChart() {
    try {
        const response = await fetch('get_customers_stats.php');
        const data = await response.json();

        if (data.error) {
            console.error(data.error);
            return;
        }

        const customersCtx = document.getElementById('customersStatsChart').getContext('2d');
        new Chart(customersCtx, {
            type: 'pie',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Customers',
                    data: data.data,
                    backgroundColor: data.backgroundColors,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    } catch (error) {
        console.error('Error fetching customers stats data:', error);
    }
}

// Initialize all charts
renderSalesChart();
renderInventoryChart();
renderOrdersStatusChart();
renderCustomersStatsChart();

