CREATE DATABASE costquest;

USE costquest;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    num_people INT,
    budget DECIMAL(10, 2)
);