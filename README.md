

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/label-Laravel-blue" alt="Laravel"></a>
</p>


#  `Awesome` APP


# Setup
## First clone the project to your local environmennt
- database

  ```sh
  $ type of database: mysql;
  $ create a database
  
- Copy configuration

  ```sh
  composer install
  $ cp .env.example .env
  $ php artisan key:generate
  ```
- setup the database credentials to the .env file

  ```sh
  $ username: your_username
  $ database: your_created_db_name
  $ password: your_password
  
- Run Migration

  `php artisan migrate `
  
- Start application
     - clear cache
  ```
     php artisan optimize:clear
  
      php artisan serve
  ```
  
    - Install Node & Npm
 
        `npm install && npm run dev`
        
        - For production
             
             Run `npm run build`

## Take A Cup Of Coffee & Good Luck!!
    
