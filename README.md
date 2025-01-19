# Laravel API - Getting Started

This guide will help you set up and start using the Laravel API. Ensure you have the required environment and tools installed before proceeding.

## Prerequisites

Before you begin, ensure you have the following installed:

- **PHP**: Version 8.0.10 or higher
- **Apache2**: For running the server
- **MySQL**: For database management
- **Composer**: For dependency management

## Installation Steps

1. **Clone the Repository**
   
   Run the following command to clone the project:
   ```bash
   git clone https://github.com/CliffMathebula/D6_API.git
   cd D6_API
   ```

2. **Configure the Environment**
   
   - Locate the `.env.example` file in the project root.
   - Rename it to `.env`:
     ```bash
     mv .env.example .env
     ```
   - Update the database configuration in the `.env` file with your credentials:
     ```env
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

3. **Install Dependencies**
   
   Install the required PHP dependencies using Composer:
   ```bash
   composer install
   ```

4. **Generate Application Keys**
   
   Run the following commands to set up application keys and clear cache:
   ```bash
   php artisan key:generate
   php artisan jwt:secret
   php artisan cache:clear
   php artisan config:clear
   ```

5. **Run Migrations (Optional)**
   
   If the project includes database migrations, run:
   ```bash
   php artisan migrate
   ```

## Testing the API

1. **Start the Development Server**
   
   Use the built-in Laravel server to start the application:
   ```bash
   php artisan serve
   ```

   By default, the API will be available at:
   ```
   http://127.0.0.1:8000
   ```

2. **Use Postman for API Testing**
   
   Open Postman and refer to the `post-man-usage.pdf` document attached to the repository. This document contains:
   - API endpoints (URIs)
   - HTTP methods for each route
   - Example requests and responses

3. **Optional Configuration**
   
   If you encounter any issues, ensure your `.env` file and server configurations are correct. Clear the cache again if necessary:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   ```

## Additional Notes

- Ensure your database is running and accessible before testing.
- If you're using a different port for the Laravel server, update your Postman requests accordingly.

Happy coding!
