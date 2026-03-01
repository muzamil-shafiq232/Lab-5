-- Create database
CREATE DATABASE IF NOT EXISTS lab4_db;

-- Use database
USE lab4_db;

-- Create employs table
CREATE TABLE IF NOT EXISTS employs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    salary DECIMAL(10,2) NOT NULL
);