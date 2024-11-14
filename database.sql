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
    id INT AUTO_INCREMENT PRIMARY KEY,
    town VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    daytour_price DECIMAL(8, 2),
    overnight_price DECIMAL(8, 2),
    environmental_fee DECIMAL(8, 2) DEFAULT 20.00,
    other_fees DECIMAL(8, 2),
    total_estimated_cost DECIMAL(8, 2),
    image_filename VARCHAR(255)
);

INSERT INTO destinations (town, name, daytour_price, overnight_price, environmental_fee, other_fees, total_estimated_cost, image_filename)
VALUES
    ('San Juan', 'Camp Laiya Beach Farm Resort', 2300.00, 2800.00, 20.00, NULL, 2320.00, 'sanjuan-d1.png'),
    ('San Juan', 'Sigayan Bay Beach Resort', 100.00, 4000.00, 20.00, NULL, 120.00, 'sanjuan-d2.png'),
    ('San Juan', 'Acuaverde Beach Resort and Hotel', 3000.00, 7800.00, 20.00, 1600.00, 4620.00, 'sanjuan-d3.png'),
    ('San Juan', 'Acuatico Beach Resort and Hotel', 3800.00, 7900.00, 20.00, 2000.00, 5820.00, 'sanjuan-d4.png'),
    ('San Juan', 'Laiya Adventure Park', 720.00, NULL, 20.00, NULL, 740.00, 'sanjuan-d5.png'),
    ('San Juan', 'San Juan Nepomuceno Parish Church', NULL, NULL, 20.00, NULL, 20.00, 'sanjuan-d6.png');