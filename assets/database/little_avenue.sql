-- ====================================
-- SQL Script for Little Avenue Coffee
-- ====================================

-- 1. Drop and Create Database
DROP DATABASE IF EXISTS little_avenue;
CREATE DATABASE little_avenue;
USE little_avenue;

-- 2. Create Tables

-- 2.1. Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2.2. Bean Types Table
CREATE TABLE bean_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    origin VARCHAR(100),
    tasting_notes TEXT,
    brewing_tips TEXT,
    description TEXT,
    video_url VARCHAR(255),
    expert_review TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2.3. Inventory Table
CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bean_type_id INT NOT NULL,
    quantity INT NOT NULL,
    restock_date DATE DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (bean_type_id) REFERENCES bean_types(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 2.4. Orders Table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_type ENUM('one-time', 'subscription') DEFAULT 'one-time',
    total_amount DECIMAL(10,2) NOT NULL,
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    order_status ENUM('processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'processing',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 2.5. Order Items Table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    bean_type_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (bean_type_id) REFERENCES bean_types(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 2.6. Catering Bookings Table
CREATE TABLE catering_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME NOT NULL,
    custom_order_details TEXT,
    instant_quote DECIMAL(10,2) DEFAULT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 2.7. Calendar Events Table
CREATE TABLE calendar_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_date DATE NOT NULL,
    event_time TIME NOT NULL,
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY unique_event (event_date, event_time)
) ENGINE=InnoDB;

-- 2.8. POS Transactions Table
CREATE TABLE pos_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id VARCHAR(100) NOT NULL UNIQUE,
    user_id INT DEFAULT NULL,
    amount DECIMAL(10,2) NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('completed', 'failed', 'pending') DEFAULT 'pending',
    payment_method ENUM('credit_card', 'paypal', 'cash', 'other') DEFAULT 'other',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 3. Insert Sample Data

-- 3.1. Insert Users
INSERT INTO users (username, email, password, role)
VALUES
('admin_user', 'admin@littleavenue.com', 'adminpassword', 'admin'),
('john_doe', 'john@example.com', 'password123', 'customer'),
('jane_smith', 'jane@example.com', 'securepass', 'customer');

-- 3.2. Insert Bean Types
INSERT INTO bean_types (name, origin, tasting_notes, brewing_tips, description, video_url, expert_review, image_url)
VALUES
('Ethiopian Yirgacheffe', 'Ethiopia', 'Floral and citrusy', 'Use a medium grind for optimal flavor extraction.', 'A premium coffee bean known for its vibrant flavors.', 'https://example.com/videos/yirgacheffe.mp4', 'Exceptional aroma and taste, highly recommended.', 'https://example.com/images/yirgacheffe.jpg'),
('Colombian Supremo', 'Colombia', 'Rich and nutty', 'Best brewed using a French press.', 'Smooth and well-balanced coffee with a hint of sweetness.', 'https://example.com/videos/colombian_supremo.mp4', 'A staple for coffee enthusiasts seeking consistency.', 'https://example.com/images/colombian_supremo.jpg'),
('Sumatra Mandheling', 'Indonesia', 'Earthy and chocolaty', 'Use a coarse grind for a bold cup.', 'Full-bodied coffee with deep, complex flavors.', 'https://example.com/videos/sumatra_mandheling.mp4', 'Robust and intense, perfect for espresso lovers.', 'https://example.com/images/sumatra_mandheling.jpg');

-- 3.3. Insert Inventory
INSERT INTO inventory (bean_type_id, quantity, restock_date)
VALUES
(1, 100, '2024-10-15'),
(2, 150, '2024-10-20'),
(3, 80, '2024-10-25');

-- 3.4. Insert Orders
INSERT INTO orders (user_id, order_type, total_amount, payment_status, order_status)
VALUES
(2, 'one-time', 25.98, 'completed', 'shipped'),
(3, 'one-time', 14.99, 'completed', 'delivered');

-- 3.5. Insert Order Items
INSERT INTO order_items (order_id, bean_type_id, quantity, price)
VALUES
(1, 1, 2, 12.99),
(1, 2, 1, 12.99),
(2, 2, 1, 14.99);

-- 3.6. Insert Catering Bookings
INSERT INTO catering_bookings (user_id, event_date, event_time, custom_order_details, instant_quote, status)
VALUES
(2, '2024-11-20', '18:00:00', '50 packs of Ethiopian Yirgacheffe, pastries, and beverages.', 500.00, 'pending'),
(3, '2024-12-05', '12:00:00', '30 packs of Colombian Supremo with organic milk options.', 300.00, 'confirmed');

-- 3.7. Insert Calendar Events
INSERT INTO calendar_events (event_date, event_time, is_available)
VALUES
('2024-11-20', '18:00:00', FALSE),
('2024-12-05', '12:00:00', FALSE),
('2024-11-25', '10:00:00', TRUE),
('2024-12-10', '15:00:00', TRUE);

-- 3.8. Insert POS Transactions
INSERT INTO pos_transactions (transaction_id, user_id, amount, status, payment_method)
VALUES
('TXN123456', 2, 25.98, 'completed', 'paypal'),
('TXN123457', 3, 14.99, 'completed', 'credit_card'),
('TXN123458', NULL, 50.00, 'pending', 'cash');
