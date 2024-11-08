CREATE DATABASE costquest;

USE costquest;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    number_of_people_traveling INT NOT NULL,
    budget_amount DECIMAL(10, 2) NOT NULL
);