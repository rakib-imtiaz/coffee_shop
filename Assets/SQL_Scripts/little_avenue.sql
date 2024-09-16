Drop Database if exists little_avenue; 
create Database little_avenue;
use little_avenue;
-- Customers Table
CREATE TABLE Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    shipping_address VARCHAR(255),
    billing_address VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Categories Table
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

-- Products Table
CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    image VARCHAR(255),
    availability BOOLEAN DEFAULT TRUE,
    rating DECIMAL(2, 1),
    special_offer_id INT
);

-- Orders Table
CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_price DECIMAL(10, 2),
    status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending'
);

-- Order Details Table
CREATE TABLE OrderDetails (
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Carts Table
CREATE TABLE Carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cart Items Table
CREATE TABLE CartItems (
    cart_item_id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Reviews Table
CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    product_id INT,
    rating INT CHECK(rating >= 1 AND rating <= 5),
    comment TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Special Offers Table
CREATE TABLE SpecialOffers (
    special_offer_id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    discount_percentage DECIMAL(5, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL
);

-- Contact Form Submissions Table
CREATE TABLE ContactFormSubmissions (
    contact_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Payments Table
CREATE TABLE Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    payment_method ENUM('PayPal', 'Credit Card', 'Bank Transfer') NOT NULL,
    payment_status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    amount DECIMAL(10, 2)
);

-- Subscriptions Table
CREATE TABLE Subscriptions (
    subscription_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    product_id INT,
    subscription_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    delivery_frequency ENUM('Weekly', 'Bi-weekly', 'Monthly'),
    next_delivery_date DATE,
    active BOOLEAN DEFAULT TRUE
);

-- Catering Bookings Table
CREATE TABLE CateringBookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    event_date DATE NOT NULL,
    customization_details TEXT,
    total_price DECIMAL(10, 2),
    status ENUM('Pending', 'Confirmed', 'Completed', 'Cancelled') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Support Tickets Table
CREATE TABLE SupportTickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    subject VARCHAR(255),
    message TEXT,
    status ENUM('Open', 'In Progress', 'Closed') DEFAULT 'Open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Dashboard Stats Table
CREATE TABLE AdminStats (
    stat_id INT AUTO_INCREMENT PRIMARY KEY,
    total_sales DECIMAL(15, 2),
    total_orders INT,
    total_customers INT,
    total_stock INT,
    generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);





-- Insert data into Categories table
INSERT INTO Categories (category_name)
VALUES
('Coffee Beans'),
('Beverages'),
('Snacks');

-- Insert data into Products table
INSERT INTO Products (name, description, price, category_id, image, availability, rating)
VALUES
('Dark Roast Beans', 'Deep, smoky flavor with a hint of spice.', 12.99, 1, 'Assets/Images/DARK_ROAST_BEANS.jpeg', TRUE, 4.5),
('Decaffeinated Beans', 'Mild, smooth, and full of flavor without caffeine.', 14.99, 1, 'Assets/Images/DECAFFEINATED_BEANS.jpeg', TRUE, 4.0),
('Light Roast Beans', 'Bright, citrusy flavor with a hint of fruit.', 11.99, 1, 'Assets/Images/LIGHT_ROAST_BEANS.jpeg', TRUE, 4.8),
('Latte', 'Smooth latte with creamy foam.', 4.99, 2, 'Assets/Images/latte.jpeg', TRUE, 4.7),
('Espresso', 'Rich and bold espresso.', 2.99, 2, 'Assets/Images/espresso.jpeg', TRUE, 4.9);

-- Insert data into Customers table
INSERT INTO Customers (name, email, password_hash, phone_number, shipping_address, billing_address)
VALUES
('John Doe', 'john@example.com', 'hashedpassword123', '555-1234', '123 Coffee St', '123 Coffee St'),
('Jane Smith', 'jane@example.com', 'hashedpassword456', '555-5678', '456 Espresso Ln', '456 Espresso Ln');

-- Insert data into Orders table
INSERT INTO Orders (customer_id, total_price, status)
VALUES
(1, 29.97, 'Pending'),
(2, 19.98, 'Shipped');

-- Insert data into Order Details table
INSERT INTO OrderDetails (order_id, product_id, quantity, price)
VALUES
(1, 1, 2, 12.99),  -- Dark Roast Beans (2 bags)
(1, 2, 1, 14.99),  -- Decaffeinated Beans
(2, 3, 1, 11.99),  -- Light Roast Beans
(2, 4, 2, 4.99);   -- Latte (2 lattes)

-- Insert data into Carts table
INSERT INTO Carts (customer_id)
VALUES
(1),
(2);

-- Insert data into Cart Items table
INSERT INTO CartItems (cart_id, product_id, quantity, price)
VALUES
(1, 1, 1, 12.99),  -- Dark Roast Beans
(1, 4, 1, 4.99),   -- Latte
(2, 2, 2, 14.99);  -- Decaffeinated Beans (2 bags)

-- Insert data into Reviews table
INSERT INTO Reviews (customer_id, product_id, rating, comment)
VALUES
(1, 1, 5, 'Absolutely love these beans!'),
(2, 2, 4, 'Great flavor but a bit pricey.'),
(1, 4, 5, 'Best latte I’ve ever had!');

-- Insert data into Special Offers table
INSERT INTO SpecialOffers (description, discount_percentage, start_date, end_date)
VALUES
('25% off on all coffee beans', 25.00, '2024-09-01', '2024-09-30'),
('Buy one latte, get one free', 50.00, '2024-09-01', '2024-09-15');

-- Insert data into Payments table
INSERT INTO Payments (order_id, payment_method, payment_status, amount)
VALUES
(1, 'PayPal', 'Completed', 29.97),
(2, 'Credit Card', 'Completed', 19.98);

-- Insert data into Subscriptions table
INSERT INTO Subscriptions (customer_id, product_id, delivery_frequency, next_delivery_date, active)
VALUES
(1, 1, 'Monthly', '2024-10-01', TRUE),
(2, 2, 'Bi-weekly', '2024-09-14', TRUE);

-- Insert data into CateringBookings table
INSERT INTO CateringBookings (customer_id, event_date, customization_details, total_price, status)
VALUES
(1, '2024-12-15', 'Coffee service for 50 people', 299.99, 'Confirmed');

-- Insert data into SupportTickets table
INSERT INTO SupportTickets (customer_id, subject, message)
VALUES
(1, 'Order Issue', 'My order arrived late. Can you check?'),
(2, 'Subscription Help', 'How can I modify my subscription?');

-- Insert data into ContactFormSubmissions table
INSERT INTO ContactFormSubmissions (name, email, message)
VALUES
('Michael Johnson', 'mjohnson@example.com', 'I’d like to inquire about your catering services.'),
('Emily Davis', 'edavis@example.com', 'Do you ship internationally?');

-- Insert data into AdminStats table
INSERT INTO AdminStats (total_sales, total_orders, total_customers, total_stock)
VALUES
(10000.00, 150, 75, 500);

 