# Cost Quest: A Travel Budget Planner

Cost Quest is a travel budget planning web application focused on the Batangas Province, Philippines. It provides users with estimated costs for visiting popular tourist destinations in Batangas, initially covering the towns of San Juan, Lipa City, Nasugbu, Taal, Bauan, and Calatagan. This tool helps travelers plan and manage their travel budgets, offering detailed cost breakdowns per person for easy budgeting.

## Features

- **Town Selection**: Users can choose from six popular towns in Batangas Province to explore various tourist spots.
- **Destination Cost Estimation**: For each tourist destination, users can view an estimated cost including entrance fees, travel expenses, and other amenities.
- **Personalized Budget Tracking**: Users enter their budget per person, and the application calculates whether they are within or over budget based on selected destinations.
- **Interactive Itinerary Builder**: Users can add destinations to a cart and get a running total cost to keep track of their planned expenses.

## Installation

To set up Cost Quest on your local environment, please follow these steps:

### Install XAMPP

Download and install XAMPP for local server setup. This includes Apache, MySQL, and PHP.

### Copy Project Directory

Copy the Cost Quest project folder into the `htdocs` directory in your XAMPP installation. The folder should be named `costquest`:

```bash
xampp/htdocs/costquest
```

## Database Setup

- Open Xampp Control Panel, Start Apache and MySql
- Open MariaDB by navigating to Shell and type: ```mysql - hlocalhost -u root -p``` and press Enter.
- Create a new database named costquest the commands are on the database.sql file.

## Run the Application

- Make sure that the directory of the files were inside the htdocs folder of XAMPP.
- Open a web browser and navigate to:  ```http://localhost/costquest/index.html ```

- Example if your directory is C:\xampp\htdocs\costquest\index.html, then your localhost will be http://localhost/costquest/index.html
