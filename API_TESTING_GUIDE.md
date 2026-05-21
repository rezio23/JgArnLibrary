# JgArn API Testing Guide

## Base URL

| Environment | URL |
|-------------|-----|
| Local (WAMP) | `http://localhost/JgArn/public/api` |
| Virtual Host | `http://jgarn.test/api` |

## Authentication

All endpoints except `POST /login` require a Bearer token in the `Authorization` header:

```
Authorization: Bearer <token>
```

---

## 1. Authentication

### Login

**POST** `/login`

**Headers:**
```
Accept: application/json
Content-Type: application/json
```

**Body:**
```json
{
  "email": "admin@gmail.com",
  "password": "Admin123"
}
```

**Expected Response (200):**
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

**Expected Error (401):**
```json
{
  "message": "Invalid email or password."
}
```

---

### Logout

**POST** `/logout`

**Headers:**
```
Accept: application/json
Authorization: Bearer <token>
```

**Expected Response (200):**
```json
{
  "message": "Logged out successfully."
}
```

---

## 2. Categories

### List All Categories

**GET** `/categories`

**Headers:**
```
Accept: application/json
Authorization: Bearer <token>
```

**Expected Response (200):**
```json
{
  "data": [
    {
      "CategoryID": 1,
      "CategoryName": "Fiction",
      "Description": "Fictional books and novels",
      "CreatedDate": "2026-05-20T08:17:23.000000Z",
      "UpdatedDate": "2026-05-20T08:17:23.000000Z"
    }
  ]
}
```

---

### Create Category

**POST** `/categories`

**Headers:**
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer <token>
```

**Body:**
```json
{
  "CategoryName": "Science Fiction",
  "Description": "Sci-fi and futuristic novels"
}
```

**Expected Response (201):**
```json
{
  "message": "Category created successfully.",
  "data": {
    "CategoryID": 2,
    "CategoryName": "Science Fiction",
    "Description": "Sci-fi and futuristic novels",
    "CreatedDate": "2026-05-21T10:00:00.000000Z",
    "UpdatedDate": "2026-05-21T10:00:00.000000Z"
  }
}
```

**Validation Error (422):**
```json
{
  "message": "The CategoryName field is required.",
  "errors": {
    "CategoryName": ["The CategoryName field is required."]
  }
}
```

---

### Show Category

**GET** `/categories/{id}`

Example: `/categories/1`

**Headers:**
```
Accept: application/json
Authorization: Bearer <token>
```

**Expected Response (200):**
```json
{
  "data": {
    "CategoryID": 1,
    "CategoryName": "Fiction",
    "Description": "Fictional books and novels",
    "CreatedDate": "2026-05-20T08:17:23.000000Z",
    "UpdatedDate": "2026-05-20T08:17:23.000000Z"
  }
}
```

**Not Found (404):**
```json
{
  "message": "No query results for model [App\\Models\\Category]."
}
```

---

### Update Category

**PUT** `/categories/{id}`

Example: `/categories/1`

**Headers:**
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer <token>
```

**Body:**
```json
{
  "CategoryName": "Non-Fiction",
  "Description": "Updated description here"
}
```

**Expected Response (200):**
```json
{
  "message": "Category updated successfully.",
  "data": {
    "CategoryID": 1,
    "CategoryName": "Non-Fiction",
    "Description": "Updated description here",
    "CreatedDate": "2026-05-20T08:17:23.000000Z",
    "UpdatedDate": "2026-05-21T10:05:00.000000Z"
  }
}
```

---

### Delete Category

**DELETE** `/categories/{id}`

Example: `/categories/1`

**Headers:**
```
Accept: application/json
Authorization: Bearer <token>
```

**Expected Response (200):**
```json
{
  "message": "Category deleted successfully."
}
```

**Error if category has books (Integrity Constraint):**
```json
{
  "message": "SQLSTATE[23000]: Integrity constraint violation: ..."
}
```

---

## 3. Books

### List All Books

**GET** `/books`

**Headers:**
```
Accept: application/json
Authorization: Bearer <token>
```

**Expected Response (200):**
```json
{
  "data": [
    {
      "BookID": 1,
      "BookName": "The Great Gatsby",
      "CategoryID": 1,
      "CategoryName": "Fiction",
      "Qty": 12,
      "Description": "A classic American novel",
      "CreatedDate": "2026-05-20T08:17:27.000000Z",
      "UpdatedDate": "2026-05-20T08:17:27.000000Z"
    }
  ]
}
```

---

### Create Book

**POST** `/books`

**Headers:**
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer <token>
```

**Body:**
```json
{
  "BookName": "Dune",
  "CategoryID": 1,
  "Qty": 25,
  "Description": "Science fiction masterpiece"
}
```

**Expected Response (201):**
```json
{
  "message": "Book created successfully.",
  "data": {
    "BookID": 2,
    "BookName": "Dune",
    "CategoryID": 1,
    "CategoryName": "Fiction",
    "Qty": 25,
    "Description": "Science fiction masterpiece",
    "CreatedDate": "2026-05-21T10:10:00.000000Z",
    "UpdatedDate": "2026-05-21T10:10:00.000000Z"
  }
}
```

**Validation Error (422):**
```json
{
  "message": "The BookName field is required. (and 2 more errors)",
  "errors": {
    "BookName": ["The BookName field is required."],
    "CategoryID": ["The CategoryID field is required."],
    "Qty": ["The Qty field is required."]
  }
}
```

---

### Show Book

**GET** `/books/{id}`

Example: `/books/1`

**Headers:**
```
Accept: application/json
Authorization: Bearer <token>
```

**Expected Response (200):**
```json
{
  "data": {
    "BookID": 1,
    "BookName": "The Great Gatsby",
    "CategoryID": 1,
    "CategoryName": "Fiction",
    "Qty": 12,
    "Description": "A classic American novel",
    "CreatedDate": "2026-05-20T08:17:27.000000Z",
    "UpdatedDate": "2026-05-20T08:17:27.000000Z"
  }
}
```

**Not Found (404):**
```json
{
  "message": "No query results for model [App\\Models\\Book]."
}
```

---

### Update Book

**PUT** `/books/{id}`

Example: `/books/1`

**Headers:**
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer <token>
```

**Body:**
```json
{
  "BookName": "The Great Gatsby - Revised",
  "CategoryID": 1,
  "Qty": 30,
  "Description": "Updated edition with new foreword"
}
```

**Expected Response (200):**
```json
{
  "message": "Book updated successfully.",
  "data": {
    "BookID": 1,
    "BookName": "The Great Gatsby - Revised",
    "CategoryID": 1,
    "CategoryName": "Fiction",
    "Qty": 30,
    "Description": "Updated edition with new foreword",
    "CreatedDate": "2026-05-20T08:17:27.000000Z",
    "UpdatedDate": "2026-05-21T10:15:00.000000Z"
  }
}
```

---

### Delete Book

**DELETE** `/books/{id}`

Example: `/books/1`

**Headers:**
```
Accept: application/json
Authorization: Bearer <token>
```

**Expected Response (200):**
```json
{
  "message": "Book deleted successfully."
}
```

---

## Quick Test Flow (Step by Step)

1. **POST** `/login`  → Copy the `token` from response
2. **POST** `/categories`  → Note the `CategoryID`
3. **POST** `/books` (use the `CategoryID`) → Note the `BookID`
4. **GET** `/categories` and `/books` to list all
5. **GET** `/categories/{id}` and `/books/{id}` to view single
6. **PUT** `/categories/{id}` and `/books/{id}` to update
7. **DELETE** `/books/{id}` and `/categories/{id}` to remove
8. **POST** `/logout` to revoke token

---

## Common Errors

| Status | Meaning | Cause |
|--------|---------|-------|
| 401 | Unauthorized | Missing/invalid token, or not logged in |
| 404 | Not Found | ID does not exist in database |
| 422 | Validation Error | Missing or invalid field data |
| 500 | Server Error | Database issue, constraint violation |

---

## Prerequisites

Ensure the database is migrated and seeded before testing:

```bash
php artisan migrate:fresh --seed
```

**Default login credentials:**
- Email: `admin@gmail.com`
- Password: `Admin123`

---

## Tools to Test

- **Postman** - Import endpoints manually
- **cURL** - Command line requests
- **Thunder Client** (VS Code Extension)
- **HTTP Client** in PhpStorm/IntelliJ
- **Browser** - Only for GET requests (won't work for POST/PUT/DELETE without auth)
