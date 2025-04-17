# Product Catalog API

## Introduction
This is a Laravel-based API for managing a product catalog. It allows users to create, retrieve, update, and delete products and categories.

## Prerequisites
Ensure you have the following installed:
- PHP 8.2+
- Composer
- MySQL (or any other supported database)
- Laravel 11
- XAMPP (if using local development)
- Postman (for testing API endpoints)

## Installation

1. **Clone the repository**
```sh
  git clone https://github.com/shaikh-nadeem/ProductCatalogAPI.git
  cd ProductCatalogAPI
```

2. **Install dependencies**
```sh
  composer install
```

3. **Set up the environment**
```sh
  cp .env.example .env
```

4. **Configure database in `.env` file**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=product_catalog
DB_USERNAME=root
DB_PASSWORD=
```

5. **Generate application key**
```sh
  php artisan key:generate
```

6. **Run migrations**
```sh
  php artisan migrate --seed
```

7. **Start the server**
```sh
  php artisan serve
```
The API will be accessible at `http://127.0.0.1:8000`

## API Documentation

### 1️⃣ Create Category
- **Endpoint:** `POST /api/categories`
- **Request Body:**
```json
{
  "name": "Electronics"
}
```
- **Response:**
```json
{
  "id": 1,
  "name": "Electronics",
  "created_at": "2024-02-12T10:00:00Z",
  "updated_at": "2024-02-12T10:00:00Z"
}
```

### 2️⃣ Get All Categories
- **Endpoint:** `GET /api/categories`
- **Response:**
```json
[
  {
    "id": 1,
    "name": "Electronics"
  }
]
```

### 3️⃣ Create Product
- **Endpoint:** `POST /api/products`
- **Request Body:**
```json
{
  "name": "Laptop",
  "description": "A high-end gaming laptop",
  "sku": "LAP123",
  "price": 1200.99,
  "category_id": 1
}
```
- **Response:**
```json
{
  "id": 1,
  "name": "Laptop",
  "description": "A high-end gaming laptop",
  "sku": "LAP123",
  "price": "1200.99",
  "category_id": 1,
  "created_at": "2024-02-12T10:05:00Z",
  "updated_at": "2024-02-12T10:05:00Z"
}
```

### 4️⃣ Get All Products
- **Endpoint:** `GET /api/products`
- **Response:**
```json
[
  {
    "id": 1,
    "name": "Laptop",
    "price": "1200.99",
    "category": "Electronics"
  }
]
```

### 5️⃣ Get Single Product
- **Endpoint:** `GET /api/products/{id}`
- **Response:**
```json
{
  "id": 1,
  "name": "Laptop",
  "price": "1200.99",
  "category": "Electronics"
}
```

### 6️⃣ Update Product
- **Endpoint:** `PUT /api/products/{id}`
- **Request Body:**
```json
{
  "name": "Gaming Laptop"
}
```
- **Response:**
```json
{
  "message": "Updated successfully"
}
```

### 7️⃣ Delete Product
- **Endpoint:** `DELETE /api/products/{id}`
- **Response:**
```json
{
  "message": "Deleted successfully"
}
```

## Running Tests
To run the test suite, execute:
```sh
php artisan test
```

## License
This project is licensed under the MIT License.

