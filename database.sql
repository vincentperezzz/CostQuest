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
    address VARCHAR(255) NOT NULL,  
    daytour_price DECIMAL(8, 2),
    overnight_price DECIMAL(8, 2),
    environmental_fee DECIMAL(8, 2) DEFAULT 20.00,
    other_fees DECIMAL(8, 2),
    total_estimated_cost DECIMAL(8, 2),
    image_filename VARCHAR(255),
    url VARCHAR(255) DEFAULT 'N/A',
    location_type VARCHAR(20) NOT NULL
);

INSERT INTO destinations (town, name, address, daytour_price, overnight_price, environmental_fee, other_fees, total_estimated_cost, image_filename, url, location_type)
VALUES
    ('San Juan', 'Camp Laiya Beach Farm Resort', 'Brgy. Buhaynasapa, San Juan, Batangas', 2300.00, 2800.00, 20.00, NULL, 2320.00, 'sanjuan-d1.png', 'https://camplaiyabeach.com/', 'resort'),
    ('San Juan', 'Sigayan Bay Beach Resort', 'Brgy. Laiya-Aplaya, San Juan, Batangas', 100.00, 4000.00, 20.00, NULL, 120.00, 'sanjuan-d2.png', 'https://www.facebook.com/@sigayanbay/', 'resort'),
    ('San Juan', 'Acuaverde Beach Resort and Hotel', 'Laiya, San Juan, Batangas', 3000.00, 7800.00, 20.00, 1600.00, 4620.00, 'sanjuan-d3.png', 'https://acuaverderesort.com.ph/', 'hotel'),
    ('San Juan', 'Acuatico Beach Resort and Hotel', 'Laiya, San Juan, Batangas', 3800.00, 7900.00, 20.00, 2000.00, 5820.00, 'sanjuan-d4.png', 'https://acuaticoresort.com.ph/', 'hotel'),
    ('San Juan', 'Laiya Adventure Park', 'Brgy. Laiya Aplaya, San Juan, Batangas', 720.00, NULL, 20.00, NULL, 740.00, 'sanjuan-d5.png', 'https://www.facebook.com/LaiyaAdventurePark/', 'adventure'),
    ('San Juan', 'San Juan Nepomuceno Parish Church', 'P. Burgos St. Brgy. Poblacion, San Juan, Batangas', NULL, NULL, 20.00, NULL, 20.00, 'sanjuan-d6.png', 'N/A', 'spot');