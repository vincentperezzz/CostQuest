CREATE DATABASE costquest;

USE costquest;

CREATE TABLE users (
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255),
    num_people INT,
    budget DECIMAL(10, 2)
);

CREATE TABLE destinations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    town_name VARCHAR(50) NOT NULL,
    destination_name VARCHAR(100) NOT NULL,
    daytour_price DECIMAL(10, 2) NULL,
    overnight_price DECIMAL(10, 2) NULL,
    environmental_fee DECIMAL(10, 2) NULL,
    other_fees DECIMAL(10, 2) DEFAULT 0.00
);

INSERT INTO destinations (town_name, destination_name, daytour_price, overnight_price, environmental_fee, other_fees)
VALUES 
    ('San Juan', 'Camp Laiya Beach Farm Resort', 1000.00, 1250.00, 20.00, 150.00),
    ('San Juan', 'Sigayan Bay Beach Resort', 1000.00, 2000.00, 150.00, 200.00),
    ('San Juan', 'Acuaverde Beach Resort and Hotel', 1850.00, 3000.00, NULL, NULL),
    ('San Juan', 'Acuatico Beach Resort and Hotel', 1500.00, 3850.00, NULL, NULL),
    ('San Juan', 'Laiya Adventure Park', 50.00, NULL, 50.00, 50.00),
    ('San Juan', 'San Juan Nepomuceno Parish Church', 0.00, NULL, 0.00, 0.00);