## Requirements

To run this project locally, make sure you have the following requirements installed on your system:

- PHP (>= 8.1.2)
- Composer
- XAMPP (or any other compatible local server environment)

## Installation

Follow these steps to set up and run the project locally:

1. Clone the repository:

   ```shell
   git clone https://github.com/your-username/online-course-website.git

   Example
   git clone https://github.com/Alghi-Fari/Kursusku.git
    ```

2. composer install

    ```shell
    composer install
    ```

3. Rename the .env.example file to .env and update the database configuration:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password

4. Generate the application key:

   ```shell
   php artisan key:generate
   ```

5. Run the database migrations:

   ```shell
   php artisan migrate
   ```

6. Start the local development server:

   ```shell
   php artisan serve
   ```

7. Access the application in your web browser at
   'http://localhost:8000'.
