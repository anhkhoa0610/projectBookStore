-- Insert sample data into Users table
INSERT INTO Users (user_name, user_email, user_pass, updated_at, created_at) VALUES
('Alice Johnson', 'alice@gmail.com', 'pass123', NOW(), NOW()),
('Bob Smith', 'bob@yahoo.com', 'pass456', NOW(), NOW()),
('Charlie Brown', 'charlie@gmail.com', 'pass789', NOW(), NOW()),
('David Lee', 'david@gmail.com', 'passabc', NOW(), NOW()),
('Emma Watson', 'emma@hotmail.com', 'passdef', NOW(), NOW()),
('Franklin Harris', 'frank@gmail.com', 'passghi', NOW(), NOW()),
('George Miller', 'george@gmail.com', 'passjkl', NOW(), NOW());

-- Insert sample data into Products table
INSERT INTO Products (product_name, product_price, product_description, updated_at, created_at) VALUES
('Samsung Galaxy S21', 799.99, 'Latest Samsung flagship phone', NOW(), NOW()),
('Apple iPhone 13', 899.99, 'Latest iPhone model', NOW(), NOW()),
('Dell XPS 15', 1299.99, 'High-performance laptop', NOW(), NOW()),
('Sony WH-1000XM4', 349.99, 'Noise-canceling headphones', NOW(), NOW()),
('Apple MacBook Air', 999.99, 'Ultra-thin laptop', NOW(), NOW());

-- Insert sample data into Orders table
INSERT INTO Orders (user_id, updated_at, created_at) VALUES
(1, NOW(), NOW()),
(2, NOW(), NOW()),
(3, NOW(), NOW()),
(4, NOW(), NOW()),
(5, NOW(), NOW()),
(6, NOW(), NOW()),
(7, NOW(), NOW());

-- Insert sample data into Order_Details table
INSERT INTO Order_Details (order_id, product_id, updated_at, created_at) VALUES
(1, 1, NOW(), NOW()),
(1, 2, NOW(), NOW()),
(2, 3, NOW(), NOW()),
(3, 4, NOW(), NOW()),
(3, 5, NOW(), NOW()),
(4, 1, NOW(), NOW()),
(5, 2, NOW(), NOW()),
(6, 3, NOW(), NOW()),
(7, 4, NOW(), NOW());
