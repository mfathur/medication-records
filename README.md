# Medication Records

Web application for recording medications in a health agency.

### Tech Stacks

-   Laravel 10
-   MySQL
-   (optional) Docker to create MySQL database in container
-   TailwindCSS + DaisyUI for styling

Download the SQL dump file [here](https://drive.google.com/file/d/1tEr_Z0_YrDaBG7EABV_9wZb0stcZlPOW/view?usp=sharing).

### How to run

1. Download the repo.
2. Import the sql dump file to the mysql database in your local computer.

3. Create `.env` file with `.env.example` file. Copy the db env variable below.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medicsdb
DB_USERNAME=laravel
DB_PASSWORD=password
```

4. Run the app by typing command `php artisan serve` in the terminal.
5. That's it! The app is already running. You can access it with your local browser by visiting http://localhost:8000.
