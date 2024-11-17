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
('San Juan', 'Sigayan Bay Beach Resort', 'Brgy. Laiya-Aplaya, San Juan, Batangas', 100.00, 4000.00, 20.00, NULL, 120.00, 'sanjuan-d2.png', 'https://www.facebook.com/@sigayanbay', 'resort'),
('San Juan', 'Acuaverde Beach Resort and Hotel', 'Laiya, San Juan, Batangas', 3000.00, 7800.00, 20.00, 1600.00, 4620.00, 'sanjuan-d3.png', 'https://acuaverderesort.com.ph', 'hotel'),
('San Juan', 'Acuatico Beach Resort and Hotel', 'Laiya, San Juan, Batangas', 3800.00, 7900.00, 20.00, 2000.00, 5820.00, 'sanjuan-d4.png', 'https://acuaticoresort.com.ph/', 'hotel'),
('San Juan', 'Laiya Adventure Park', 'Brgy. Laiya Aplaya, San Juan, Batangas', 720.00, NULL, 20.00, NULL, 740.00, 'sanjuan-d5.png', 'https://www.facebook.com/LaiyaAdventurePark', 'adventure'),
('San Juan', 'San Juan Nepomuceno Parish Church', 'P. Burgos St. Brgy. Poblacion, San Juan, Batangas', NULL, NULL, 20.00, NULL, 20.00, 'sanjuan-d6.png', 'https://www.facebook.com/sjnp1843/', 'spot'),
('Nasugbu', 'Fortune Island', 'Apacible Blvd, Nasugbu, Batangas', 350.00, 500.00, 25.00, 2000.00, 2375.00, 'nasugbu-d7.png', NULL, 'spot'),
('Nasugbu', 'Canyon Cove Hotel and Spa', 'Far East Road, Piloto Wawa, Nasugbu, Batangas', 1000.00, 3520.00, 25.00, NULL, 1025.00, 'nasugbu-d8.png', 'https://www.canyon.ph/canyon-cove-hotel-spa/', 'hotel'),
('Nasugbu', 'Club Punta Fuego', 'Brgy. Balaytigue, Punta Fuego Dr, Nasugbu, Batangas', 7000.00, 10000.00, 25.00, NULL, 7025.00, 'nasugbu-d9.png', 'https://www.clubpuntafuego.com.ph/', 'resort'),
('Nasugbu', 'Bituin Cove', 'Brgy. Papaya, Nasugbu, Batangas', NULL, 1020.00, 25.00, NULL, 1045.00, 'nasugbu-d10.png', 'https://www.facebook.com/p/Bituin-Cove-100054428922277/', 'spot'),
('Nasugbu', 'Mt. Talamitam', 'Sitio Bayabasan, Brgy. Aga, Nasugbu Batangas', 800.00, NULL, 25.00, NULL, 825.00, 'nasugbu-d11.png', NULL, 'adventure'),
('Nasugbu', 'Caleruega Church', 'Caleruega Road, Nasugbu, Batangas', NULL, NULL, 25.00, NULL, 25.00, 'nasugbu-d12.png', 'https://www.facebook.com/CaleruegaPhilippines/', 'spot'),
('Taal', 'Taal Volcano', 'Barangay Calauit, San Nicolas, Batangas', 1000.00, NULL, 50.00, 1000.00, 2050.00, 'taal-d13.png', NULL, 'adventure'),
('Taal', 'Taal Basilica', 'St. Martin St., Taal, Batangas', NULL, NULL, 50.00, NULL, 50.00, 'taal-d14.png', 'https://www.facebook.com/parokyanisanmartin/', 'spot'),
('Taal', 'Paradores Del Castillo', 'C. H. del Castillo, Taal, Batangas', NULL, 6000.00, 50.00, NULL, 6050.00, 'taal-d15.png', 'https://paradoresdetaal.com/', 'resort'),
('Taal', 'Plantacion Isabelle', 'San Luis Road, Taal, Batangas', NULL, 7000.00, 50.00, NULL, 7050.00, 'taal-d16.png', 'https://www.facebook.com/p/Plantacion-Isabelle-100063626573693/', 'hotel'),
('Taal', 'Sta. Lucia Well', 'Brgy. Buli, Taal, Batangas', NULL, NULL, 50.00, NULL, 50.00, 'taal-d17.png', NULL, 'spot'),
('Taal', 'Casa Villavicencio', 'Calle Gliceria Marella, Taal, Batangas', 100.00, NULL, 50.00, 80.00, 230.00, 'taal-d18.png', NULL, 'spot'),
('Calatagan', 'Cape Santiago Lighthouse', 'Barangay Bagong Silang, Calatagan, Batangas', NULL, NULL, 30.00, NULL, 30.00, 'calatagan-d19.png', NULL, 'spot'),
('Calatagan', 'Burot Beach', 'Barangay Sta. Ana, Calatagan, Batangas', 65.00, 130.00, 30.00, NULL, 95.00, 'calatagan-d20.png', 'https://burotbeachtravel.blogspot.com/', 'resort'),
('Calatagan', 'Stilts Calatagan Beach Resort', 'Barangay Sta. Ana, Calatagan, Batangas', 1000.00, 6050.00, 30.00, NULL, 1030.00, 'calatagan-d21.png', 'https://www.stiltscalataganbeachresort.net/', 'resort'),
('Calatagan', 'Lago de Oro Beach Club', 'Barangay Balibago, Calatagan, Batangas', 1500.00, 3500.00, 30.00, NULL, 1530.00, 'calatagan-d22.png', 'https://lago-de-oro.com/', 'hotel'),
('Calatagan', 'Aquaria Water Park', 'Barangay Sta. Ana, Calatagan, Batangas', 1400.00, 3850.00, 30.00, NULL, 1430.00, 'calatagan-d23.png', 'https://aquaria.millennial-resorts.com/', 'adventure'),
('Calatagan', 'Camp Wagi Beach Resort', 'Barangay Bagong Silang, Calatagan, Batangas', 2300.00, 6000.00, 30.00, 200.00, 2530.00, 'Overall', 'https://www.facebook.com/campwagibeach/', 'resort'),
('Lipa City', 'The Old Grove Farmstead', 'Purok 5, U. Mojares Street. Barangay Lodlod, Lipa City', 350.00, NULL, NULL, 800.00, 1150.00, 'lipacity-d25.png', 'https://www.theoldgrovefarmstead.ph/', 'spot'),
('Lipa City', 'Batangas Lakelands', 'Barangay Malabanan, Balete, Batangas', 1500.00, 4000.00, NULL, NULL, 1500.00, 'lipacity-d26.png', 'https://www.batangaslakelands.ph/', 'adventure'),
('Lipa City', 'Mount Malarayat Golf & Country Club', 'Barangay Dagatan, Lipa City', NULL, 7930.00, NULL, NULL, 7930.00, 'lipacity-d27.png', 'https://malarayat.com/', 'hotel'),
('Lipa City', 'The Farm at San Benito', 'Barangay Tipakan, Lipa City', 10000.00, 13000.00, NULL, NULL, 10000.00, 'lipacity-d28.png', 'https://www.thefarmatsanbenito.com/', 'resort'),
('Lipa City', 'Casa De Segunda', 'T.M. Kalaw St., Poblacion Barangay 5, Lipa City', 100.00, NULL, NULL, NULL, 100.00, 'lipacity-d29.png', 'https://www.facebook.com/casadesegundalipa/', 'spot'),
('Lipa City', 'Museo ng Katipunan', 'Barangay Bulaklakan, Lipa City', 0.00, NULL, NULL, NULL, 0.00, 'lipacity-d30.png', NULL, 'spot'),
('Bauan', 'Il Sogno Resort', 'Barangay Locloc, Bauan, Batangas', 1800.00, 3500.00, NULL, NULL, 1800.00, 'bauan-d31.png', 'https://www.facebook.com/ilsognobeachresort/', 'resort'),
('Bauan', 'Kalumala Heights', 'Barangay Alagao, Bauan, Batangas', NULL, NULL, NULL, NULL, 0.00, 'bauan-d32.png', NULL, 'spot'),
('Bauan', 'Ilog Abaska', 'Barangay Inicbulan, Bauan, Batangas', NULL, NULL, NULL, NULL, 0.00, 'bauan-d33.png', NULL, 'spot'),
('Bauan', 'Bauan Church - Immaculate Conception Parish', 'Kapitan Ponso St. Poblacion, Bauan, Batangas', NULL, NULL, NULL, NULL, 0.00, 'bauan-d34.png', 'https://www.facebook.com/icpbauan325/', 'spot'),
('Bauan', 'Kantil Dive Resort', 'Barangay San Pablo, Bauan, Batangas', 2700.00, 2700.00, NULL, 1000.00, 3700.00, 'bauan-d35.png', 'https://www.facebook.com/p/Kantil-Dive-Resort-100063649577005/', 'resort'),
('Bauan', 'New Yorkers Beach Resort', 'Sitio Bubuyan Barangay Locloc, Bauan, Batangas', 100.00, 5000.00, NULL, 1000.00, 1100.00, 'bauan-d36.png', 'https://newyorkersresort.com/', 'resort');


CREATE TABLE itinerary_cart (
    email_of_the_user VARCHAR(255),
    id INT,
    num_of_people INT,
    days_to_stay INT,
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (email_of_the_user) REFERENCES users(email),
    FOREIGN KEY (id) REFERENCES destinations(id),
    PRIMARY KEY (email_of_the_user, id)
);
