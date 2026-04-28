# Product Management PHP Project

This is a small PHP and MySQL web application for user registration, login, and basic product management. It uses plain PHP, MySQLi prepared statements, PHP sessions, and Bootstrap 5 from a CDN for the UI.

## Features

- User registration with password hashing
- User login with session-based authentication
- Logout flow that destroys the active session
- Add products from the dashboard
- View all products in a table
- Edit existing products
- Delete products by ID

## Project Structure

- `db.php` - opens the MySQL connection
- `register.php` - creates a new user record
- `login.php` - authenticates an existing user
- `home.php` - dashboard and product listing/creation page
- `edit.php` - updates an existing product
- `delete.php` - deletes a product
- `logout.php` - ends the current session

## Tech Stack

- PHP
- MySQL
- MySQLi prepared statements
- PHP sessions
- Bootstrap 5.3.x via CDN

## Database Configuration

The connection is defined in `db.php`:

- Host: `localhost`
- Username: `root`
- Password: empty
- Database: `user`

If your local MySQL setup uses different credentials, update `db.php` before running the app.

## Expected Database Tables

The code expects at least two tables: `users` and `products`.

### `users`

Used by `register.php` and `login.php`.

Expected fields based on the code:

- `id`
- `name`
- `age`
- `address`
- `email`
- `password`

The password is stored using `password_hash()` and checked with `password_verify()` during login.

### `products`

Used by `home.php`, `edit.php`, and `delete.php`.

Expected fields based on the code:

- `id`
- `pname`
- `pprice`
- `pcategory`
- `pquantity`

## How The App Works

### Registration

`register.php` inserts a new row into `users` after hashing the submitted password.

### Login

`login.php` looks up the password for the submitted user name, verifies it, and stores the user name in `$_SESSION["Name"]`.

### Dashboard

`home.php` reads the current session user name, lists all products, and lets the logged-in user add a new product. Each product row includes links to edit or delete that record.

### Edit Product

`edit.php` loads the selected product by `id`, fills the form with the existing values, and updates the row on submit.

### Delete Product

`delete.php` removes the selected product by `id` and redirects back to the dashboard.

### Logout

`logout.php` destroys the session and sends the user back to `login.php`.

## Running Locally

You can run this project with XAMPP, WAMP, Laragon, MAMP, or any PHP and MySQL stack.

### 1. Place the project in your web root

For example:

- XAMPP: `htdocs/product management`
- WAMP: `www/product management`

### 2. Create the database

Create a MySQL database named `user`, or update `db.php` to match your own database name.

### 3. Create the tables

Use a schema similar to this:

```sql
CREATE TABLE users (
    id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pname VARCHAR(150) NOT NULL,
    pprice DECIMAL(10,2) NOT NULL,
    pcategory VARCHAR(100) NOT NULL,
    pquantity INT NOT NULL
);
```

### 4. Start Apache and MySQL

Make sure both services are running in your local stack.

### 5. Open the app in the browser

If the project folder is inside your local web server root, open the relevant file directly, for example:

- `http://localhost/product management/register.php`
- `http://localhost/product management/login.php`

## Notes

- `db.php` currently prints a connection status message, so you may see output like `connneciton successfully` when the file is loaded.
- The login form currently checks the user by `name` and verifies the submitted password against the stored hash.
- The app uses Bootstrap from a CDN, so an internet connection is needed for the styles and scripts unless you vendor those assets locally.
- The code uses prepared statements for database operations, which is a good baseline for safer SQL handling.

## Common Flow

1. Register a user in `register.php`
2. Log in through `login.php`
3. Add and manage products from `home.php`
4. Edit or delete products as needed
5. Log out through `logout.php`

## Possible Improvements

- Add server-side validation for all form fields
- Hide the connection message from `db.php` in production
- Add redirects when a session is missing on protected pages
- Improve field naming consistency and form labels
- Add success and error alerts for each action
