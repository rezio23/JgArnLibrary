# JgArn - Web API Final Exam Project

A RESTful API built with **Laravel** and **Laravel Sanctum** for managing a simple **Book & Category** inventory system. This project was developed as the final exam for a Web API course.

---

## Features

- **Token-based Authentication** using Laravel Sanctum
- **Full CRUD operations** for Categories
- **Full CRUD operations** for Books (with Category relationship)
- **Eloquent API Resources** for consistent JSON responses
- **Form Request Validation** for clean input validation
- **SQL Server** database support

---

## Tech Stack

| Technology | Version |
|------------|---------|
| PHP | ^8.3 |
| Laravel | ^13.8 |
| Laravel Sanctum | ^4.3 |
| Database | SQL Server |

---

## Project Structure

```
app/
  Http/
    Controllers/
      AuthController.php        # API Login / Logout
      BookController.php        # Book CRUD
      CategoryController.php    # Category CRUD
    Requests/
      BookRequest.php           # Book validation rules
      CategoryRequest.php       # Category validation rules
    Resources/
      BookResource.php          # Book JSON transformer
      CategoryResource.php      # Category JSON transformer
  Models/
    Book.php                    # Book model (BookID primary key)
    Category.php                # Category model (CategoryID primary key)
    User.php                    # User model (for Sanctum auth)

routes/
  api.php                       # API routes
  web.php                       # Web routes (for web UI)
```

---

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd JgArn
```

### 2. Install dependencies

```bash
composer install
```

### 3. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and configure your database connection:

```env
DB_CONNECTION=sqlsrv
DB_HOST=YOUR_SQL_SERVER_HOST
DB_PORT=1433
DB_DATABASE=jgarn_api_final
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run migrations and seeders

```bash
php artisan migrate --seed
```

This will create the database tables and seed an admin user.

---

## API Endpoints

### Authentication

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `POST` | `/api/login` | Login and get token | No |
| `POST` | `/api/logout` | Revoke current token | Yes |

### Categories

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/api/categories` | List all categories | Yes |
| `POST` | `/api/categories` | Create a new category | Yes |
| `GET` | `/api/categories/{id}` | Show a single category | Yes |
| `PUT` | `/api/categories/{id}` | Update a category | Yes |
| `DELETE` | `/api/categories/{id}` | Delete a category | Yes |

### Books

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/api/books` | List all books | Yes |
| `POST` | `/api/books` | Create a new book | Yes |
| `GET` | `/api/books/{id}` | Show a single book | Yes |
| `PUT` | `/api/books/{id}` | Update a book | Yes |
| `DELETE` | `/api/books/{id}` | Delete a book | Yes |

---

## Default Credentials

After running seeders, you can log in with:

| Field | Value |
|-------|-------|
| Email | `admin@gmail.com` |
| Password | `Admin123` |

---

## Testing the API

### Base URL

```
http://localhost/JgArn/public/api
```

Or if using a virtual host:

```
http://jgarn.test/api
```

### Example: Login

**Request:**

```http
POST /api/login
Accept: application/json
Content-Type: application/json

{
  "email": "admin@gmail.com",
  "password": "Admin123"
}
```

**Response:**

```json
{
  "message": "Login successful.",
  "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
  "user": {
    "id": 1,
    "name": "Administrator",
    "email": "admin@gmail.com"
  }
}
```

### Using the Token

Include the token in the `Authorization` header for all protected routes:

```http
Authorization: Bearer <your-token-here>
```

### Example: Create a Book

```http
POST /api/books
Accept: application/json
Content-Type: application/json
Authorization: Bearer <token>

{
  "BookName": "The Great Gatsby",
  "CategoryID": 1,
  "Qty": 12,
  "Description": "A classic American novel"
}
```

For a complete step-by-step testing guide, see `API_TESTING_GUIDE.md`.

---

## Validation Rules

### Book

| Field | Rules |
|-------|-------|
| `BookName` | required, string, max:255 |
| `CategoryID` | required, integer, exists in categories |
| `Qty` | required, integer, min:0 |
| `Description` | nullable, string, max:1000 |

### Category

| Field | Rules |
|-------|-------|
| `CategoryName` | required, string, max:255 |
| `Description` | nullable, string, max:1000 |

---

## Database Schema

### Categories Table

| Column | Type |
|--------|------|
| CategoryID | int (PK, auto-increment) |
| CategoryName | nvarchar(255) |
| Description | nvarchar(1000) |
| CreatedDate | datetime |
| UpdatedDate | datetime |

### Books Table

| Column | Type |
|--------|------|
| BookID | int (PK, auto-increment) |
| BookName | nvarchar(255) |
| CategoryID | int (FK -> categories) |
| Qty | int |
| Description | nvarchar(1000) |
| CreatedDate | datetime |
| UpdatedDate | datetime |

---

## Useful Commands

```bash
# List all registered routes
php artisan route:list

# Run migrations with seeders
php artisan migrate:fresh --seed

# Start development server
php artisan serve

# Clear cache (if needed)
php artisan cache:clear
php artisan config:clear
```

---

## Author

Developed as the final examination project for the **Web API Course**.
