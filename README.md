# EEC-Task

## How to Setup a Laravel Project You Cloned from Github.com

### 1. Clone GitHub repo for this project locally

##### git clone https://github.com/MahmoudShalma/EEC-Task.git


### 2. cd into your project

##### cd EEC-Task


### 3. Install Composer Dependencies

##### composer install


### 4. Install NPM Dependencies

##### npm install


### 5. Create a copy of your .env file

##### cp .env.example .env


### 6. Generate an app encryption key

##### php artisan key:generate


### 7. Create an empty database for our application


### 8. In the .env file, add database information to allow Laravel to connect to the database


### 9. Migrate the database

##### php artisan migrate


### 10. Seed the database

##### php artisan db:seed


### 11. Run the server

##### php artisan serve


### 12. Run the server


##### go to http://127.0.0.1:8000/home if you are not an admin or go to http://127.0.0.1:8000/dashboard if you are an admin 

### 13. For login

##### Email : admin@admin.com
##### password : 123456789



