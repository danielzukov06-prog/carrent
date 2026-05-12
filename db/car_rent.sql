CREATE DATABASE autorent;
USE autorent;

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mark VARCHAR(100),
    model VARCHAR(100),
    engine VARCHAR(50),
    fuel VARCHAR(50),
    price DECIMAL(10,2),
    image VARCHAR(255)
);

INSERT INTO cars (mark, model, engine, fuel, price, image)
VALUES 
('BMW', '320d', '2.0', 'Diesel', 55, 'https://loremflickr.com/400/250/bmw'),
('Audi', 'A4', '2.0', 'Petrol', 60, 'https://loremflickr.com/400/250/audi'),
('VW', 'Golf', '1.6', 'Diesel', 45, 'https://loremflickr.com/400/250/vw');