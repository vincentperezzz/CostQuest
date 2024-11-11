Cost Quest: A Travel Budget Planner
Cost Quest is a travel budget planning web application focused on the Batangas Province, Philippines. It provides users with estimated costs for visiting popular tourist destinations in Batangas, initially covering the towns of San Juan, Lipa City, Nasugbu, Taal, Bauan, and Calatagan. This tool helps travelers plan and manage their travel budgets, offering detailed cost breakdowns per person for easy budgeting.

Features
Town Selection: Users can choose from six popular towns in Batangas Province to explore various tourist spots.
Destination Cost Estimation: For each tourist destination, users can view an estimated cost including entrance fees, travel expenses, and other amenities.
Personalized Budget Tracking: Users enter their budget per person, and the application calculates whether they are within or over budget based on selected destinations.
Interactive Itinerary Builder: Users can add destinations to a cart and get a running total cost to keep track of their planned expenses.
Installation
To set up Cost Quest on your local environment, please follow these steps:

Install XAMPP

Download and install XAMPP for local server setup. This includes Apache, MySQL, and PHP.
Copy Project Directory

Copy the Cost Quest project folder into the htdocs directory in your XAMPP installation. The folder should be named costquest:
bash
Copy code
xampp/htdocs/costquest
Database Setup

Open phpMyAdmin by navigating to http://localhost/phpmyadmin/.
Create a new database named costquest_db.
Import the database structure and data by running the SQL commands provided in the costquest_db.sql file included in the project folder.
Run the Application

Start the Apache and MySQL services from the XAMPP control panel.
Open a web browser and navigate to:
arduino
Copy code
http://localhost/costquest/index.html
