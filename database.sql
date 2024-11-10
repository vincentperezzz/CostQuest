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