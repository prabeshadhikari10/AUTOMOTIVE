AutoMotive Setup Instructions
Thank you for choosing AutoMotive, a vehicle rental application built with 
Laravel. Please follow the steps below to set up and run the application on your 
computer.

1.1. Prerequisites
Before starting, please ensure that you have the following installed on your computer:
• PHP and Composer (for running the Laravel back-end)
• MySQL (for the database)
• Visual Studio Code (IDE)
• Xampp (for localhost)

• Update the .env file in the ride_hero_app_db directory with your database 
credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=automotive_new
DB_USERNAME=root
DB_PASSWORD=

Start Xampp and Start Apache and MySQL
Run the Laravel migrations and seed the database
• Run the following command to run the Laravel migrations and seed the 
database:
Command: php artisan migrate –seed
Start the Laravel back-end
• Start the Laravel development server by running the following command:
Command: php artisan serve
Note: This will start Laravel development server on http://localhost:8000

2. Conclusion
That's it! You should now be able to use the Automotive application by visiting 
http://localhost:8000 in your web browser. 