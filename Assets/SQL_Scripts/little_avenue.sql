Drop Database if exists little_avenue; 
create Database little_avenue;
use little_avenue;
-- Customers & Admins Table (Combining both users into one table with roles)
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    address VARCHAR(255),
    role ENUM('admin', 'customer') NOT NULL,  -- Role defines if it's an admin or customer
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Products Table
CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),  -- Categories as plain text instead of a separate table
    image VARCHAR(255),
    availability BOOLEAN DEFAULT TRUE,
    rating DECIMAL(2, 1)
);

-- Orders Table (Order and order details combined, each row represents an order item)
CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  -- Links to Users table (customers)
    product_id INT,  -- Links to Products table
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,  -- Price of the product at the time of order
    total_price DECIMAL(10, 2) NOT NULL,  -- Total price for this order item (quantity * price)
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

-- Cart Table (Cart is simplified, one cart per customer)
CREATE TABLE Carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  -- Links to Users table (customers)
    product_id INT,  -- Links to Products table
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

-- Reviews Table
CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  -- Links to Users table (customers)
    product_id INT,  -- Links to Products table
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

-- Special Offers Table
CREATE TABLE SpecialOffers (
    offer_id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    discount_percentage DECIMAL(5, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL
);

-- Payments Table (Simple payments table, linked to orders)
CREATE TABLE Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,  -- Links to Orders table
    payment_method ENUM('PayPal', 'Credit Card', 'Bank Transfer') NOT NULL,
    payment_status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(order_id)
);

-- Catering Bookings Table (Simplified)
CREATE TABLE CateringBookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  -- Links to Users table
    event_date DATE NOT NULL,
    customization_details TEXT,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('Pending', 'Confirmed', 'Completed', 'Cancelled') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Support Tickets Table
CREATE TABLE SupportTickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  -- Links to Users table
    subject VARCHAR(255),
    message TEXT,
    status ENUM('Open', 'In Progress', 'Closed') DEFAULT 'Open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Insert data into Users table (admin and customers)
INSERT INTO Users (name, email, password_hash, phone_number, address, role)
VALUES
('Admin User', 'admin@example.com', 'hashedpasswordadmin', '555-1111', '123 Admin St', 'admin'),
('John Doe', 'john@example.com', 'hashedpassword123', '555-1234', '123 Coffee St', 'customer'),
('Jane Smith', 'jane@example.com', 'hashedpassword456', '555-5678', '456 Espresso Ln', 'customer');

-- Insert data into Products table
INSERT INTO Products (name, description, price, category, image, availability, rating)
VALUES
('Dark Roast Beans', 'Deep, smoky flavor with a hint of spice.', 12.99, 'Coffee Beans', 'Assets/Images/DARK_ROAST_BEANS.jpeg', TRUE, 4.5),
('Decaffeinated Beans', 'Mild, smooth, and full of flavor without caffeine.', 14.99, 'Coffee Beans', 'Assets/Images/DECAFFEINATED_BEANS.jpeg', TRUE, 4.0),
('Light Roast Beans', 'Bright, citrusy flavor with a hint of fruit.', 11.99, 'Coffee Beans', 'Assets/Images/LIGHT_ROAST_BEANS.jpeg', TRUE, 4.8),
('Latte', 'Smooth latte with creamy foam.', 4.99, 'Beverages', 'Assets/Images/latte.jpeg', TRUE, 4.7),
('Espresso', 'Rich and bold espresso.', 2.99, 'Beverages', 'Assets/Images/espresso.jpeg', TRUE, 4.9);

-- Insert data into Orders table
INSERT INTO Orders (user_id, product_id, quantity, price, total_price, status)
VALUES
(2, 1, 2, 12.99, 25.98, 'Pending'),  -- John Doe orders 2 bags of Dark Roast Beans
(2, 3, 1, 11.99, 11.99, 'Shipped'),  -- John Doe orders 1 bag of Light Roast Beans
(3, 4, 2, 4.99, 9.98, 'Delivered');  -- Jane Smith orders 2 lattes

-- Insert data into Carts table
INSERT INTO Carts (user_id, product_id, quantity)
VALUES
(2, 1, 1),  -- John Doe has 1 Dark Roast Beans in cart
(3, 2, 2);  -- Jane Smith has 2 Decaffeinated Beans in cart

-- Insert data into Reviews table
INSERT INTO Reviews (user_id, product_id, rating, comment)
VALUES
(2, 1, 5, 'Absolutely love these beans!'),
(3, 2, 4, 'Great flavor but a bit pricey.'),
(2, 4, 5, 'Best latte I’ve ever had!');

-- Insert data into Special Offers table
INSERT INTO SpecialOffers (description, discount_percentage, start_date, end_date)
VALUES
('25% off on all coffee beans', 25.00, '2024-09-01', '2024-09-30'),
('Buy one latte, get one free', 50.00, '2024-09-01', '2024-09-15');

-- Insert data into Payments table
INSERT INTO Payments (order_id, payment_method, payment_status, amount)
VALUES
(1, 'PayPal', 'Completed', 25.98),  -- Payment for John Doe’s first order
(2, 'Credit Card', 'Completed', 11.99),  -- Payment for John Doe’s second order
(3, 'Credit Card', 'Completed', 9.98);  -- Payment for Jane Smith’s order

-- Insert data into Catering Bookings table
INSERT INTO CateringBookings (user_id, event_date, customization_details, total_price, status)
VALUES
(2, '2024-12-15', 'Coffee service for 50 people', 299.99, 'Confirmed');  -- John Doe books a catering event

-- Insert data into Support Tickets table
INSERT INTO SupportTickets (user_id, subject, message)
VALUES
(2, 'Order Issue', 'My order arrived late. Can you check?'),
(3, 'Subscription Help', 'How can I modify my subscription?');
