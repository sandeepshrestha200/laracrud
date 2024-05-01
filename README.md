# Laravel CRUD Project

This is a simple CRUD (Create, Read, Update, Delete) project built with Laravel 11 and MySQL. It provides basic functionality to manage resources stored in a MySQL database.

## Requirements

- PHP >= 7.4
- Composer
- MySQL
- Node.js & NPM (Optional, required for frontend assets compilation)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/sandeepshrestha200/laracrud.git
   ```

2. Navigate into the project directory:

   ```bash
   cd laracrud
   ```

3. Install PHP dependencies using Composer:

   ```bash
   composer install
   ```

4. Copy the `.env.example` file to `.env` and configure your environment variables, especially the database connection settings:

   ```bash
   cp .env.example .env
   ```

5. Generate an application key:

   ```bash
   php artisan key:generate
   ```

6. Run the database migrations and seed the database (if any):

   ```bash
   php artisan migrate --seed
   ```

7. (Optional) Compile frontend assets if you have any:

   ```bash
   npm install && npm run dev
   ```

8. Serve the application:

   ```bash
   php artisan serve
   ```

9. Access the application in your web browser at `http://localhost:8000`.

## Usage

- Navigate to the homepage to view the list of resources.
- Use the navigation links to create, read, update, or delete resources.

## Contributing

Contributions are welcome! Fork the repository, make your changes, and submit a pull request.

