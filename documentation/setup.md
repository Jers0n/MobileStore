# Intallation setup, database connection and running the application
The steps involved in installing and running the web application, connecting to the database, accessing or viewing the data, testing the website and checking database functionality are:

1. Download and install the XAMPP application.  
2. Open XAMPP and then start the Apache and MySQL server from the XAMPP Control Panel.
3. Clone the repository from GitHub and unzip it.
4. Open the folder in the Visual Studio Code.
5. Go to the browser and type localhost/phpMyAdmin in the URL.
6. Now in the phpMyAdmin, create a new database by clicking the “New” button on the left side of the page where the database is located and then name it mobilestore.
7. Import the data with mobilestore.sql. Can be found in the documentation folder. 
NOTE: Ensure that the database configuration that is located in the .env file for the right DB_CONNECTION, DB_HOST, DB_PORT, database name, username and password.
8. Run the website by typing the “php artisan serv”  command in the Visual Studio terminal.
9. View and test the website functionality.
10. Login username and password for different user roles (Admin, Manager, Customer) for testing purposes only. 
### Admin users
  can create, view, update, and delete products, brands, categories, features and changelogs can only view and delete.
### Manager users 
  can create, view, edit and delete the admin account. 
## Customer users 
  can view products, add products to a cart or wishlist, and proceed to checkout.


#### ACCOUNT
##### Manager:
manager@mobilestore.com
password: manager123

##### Admin:
username: admin@mobilestore.com
password: admin123

username: Leo2@mobilestore.com
password: Leo@MobileStore

username: admin5@mobilestore.com
password: admin5123

username: admin3@mobilestore.com
password: admin3123

##### Customer: 
customer@mobilestore.com
password: customer123

