# Stock Management Application

This project is a Stock Management Application developed using Laravel. It allows users to manage food product stocks and provides features such as adding products, retrieving products in stock, suggesting recipes, and validating recipes.

## Table of Contents

- [Installation](#installation)
- [Database Setup](#database-setup)
- [Webservices](#webservices)
  - [1. Get Products in Stock](#1-get-products-in-stock)
  - [2. Get Possible Recipes](#2-get-possible-recipes)
  - [3. Validate Recipe](#3-validate-recipe)
- [Usage Examples](#usage-examples)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. Clone the repository:

git clone https://github.com/akirhichm/app_gspa.git

cd app_gspa

composer install


php artisan key:generate

php artisan migrate


php artisan serve


## The application will be available at http://localhost:8000.

## Database Setup
To seed the database with sample data, run the following command:

php artisan db:seed

## Webservices
1. Get Products in Stock
Endpoint URL: /api/products_in_stock
Request Method: GET
Response Format: JSON
Status Codes:
200 OK: Successful request
404 Not Found: Products not found
Authentication: None required
2. Get Possible Recipes
Endpoint URL: /api/possible_recipes
Request Method: GET
Response Format: JSON
Status Codes:
200 OK: Successful request
404 Not Found: Recipes not found
Authentication: None required
3. Validate Recipe
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

