CREATE DATABASE IF NOT EXISTS inventory_db;
USE inventory_db;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL 
);
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
); 


ALTER TABLE products ADD COLUMN quantity INT NOT NULL AFTER price;

ALTER TABLE products CHANGE create_at created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;


INSERT INTO categories (name) VALUES ('Electronics'), ('Books'), ('Clothing'),('Home & Kitchen'), ('Sports & Outdoors');