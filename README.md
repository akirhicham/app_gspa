# Stock Management Application

This project is a Stock Management Application developed using Laravel. It allows users to manage food product stocks and provides features such as adding products, retrieving products in stock, suggesting recipes, and validating recipes.

## Table of Contents

- [Installation](#installation)
- [Database Setup](#database-setup)
- [Interfaces](#Interfaces)
- [Webservices](#webservices)
  - [1. Get Products in Stock](#1-get-products-in-stock)
  - [2. Get Possible Recipes](#2-get-possible-recipes)
  - [3. Validate Recipe](#3-validate-recipe)

## Installation

1. Clone the repository:

git clone https://github.com/akirhichm/app_gspa.git

## The application will be available at http://localhost:8000.

## Database Setup
To seed the database with sample data, run the following command:

php artisan db:seed

## Interfaces
![Screenshot](/screenshots/add_product.png)

1. Adding Food Products (Interface)

To enhance user interaction and streamline the process of adding food products. 
The interface features a form with three essential fields, making the addition of food products straightforward and efficient.

### Form Fields:

1. **Product Selection:**

2. **Weight/Quantity Entry:**

3. **Expiration Date Selection:**
 
### How to Use:

1. Open the "Add Product" page in the application.
2. Choose a product from the dropdown list.
3. Enter the weight or quantity of the selected product.
4. Select the expiration date using the date picker.
5. Click the "Add Product" button to submit the form.



## Webservices
- 1. Get Products in Stock
![Screenshot](/screenshots/get_products.png)

Endpoint URL: /api/products_in_stock

Request Method: GET

Response Format: JSON

Status Codes:

200 OK: Successful request

404 Not Found: Products not found

Authentication: None required

- 2. Get Recipes

Endpoint URL: /api/get_recipes

Request Method: GET

Response Format: JSON

Status Codes:

200 OK: Successful request

404 Not Found: Recipes not found

Authentication: None required

- 3. Validate Recipe

Endpoint URL: /api/validate_recipe

Request Method: POST

Request Parameters:

recipe_id (required): ID of the recipe to validate

Data Format: JSON

Response Format: JSON

Status Codes:

200 OK: Recipe validated successfully

422 Unprocessable Entity: Validation failed

Authentication: None required

