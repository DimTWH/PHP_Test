# PHP test (updated)

## 1. Installation

  - create an empty database named "phptest" on your MySQL server
  - import the dbdump.sql in the "phptest" database
  - put your MySQL server credentials in the constructor of DB class
  - you can test the demo script in your shell: "php index.php"

## 2. Expectations

This simple application works, but with very old-style monolithic codebase, so do anything you want with it, to make it:

  - easier to work with
  - more maintainable


## Documentation

### What does this project do?
  - This project is a PHP application that allows users to manage news articles and comments related to those articles.
  - It includes classes for handling comments (`Comment.php`) and news articles (`News.php`).
  - The `index.php` file likely serves as the entry point for the application.

### Main technologies, frameworks, languages used:
  - **PHP**: The primary language used for developing the application.
  - **MySQL**: The database management system used for storing data.
  - **Composer**: Used for dependency management. The project requires the `symfony/dotenv` package for handling environment variables.

### Codebase organization:
  - **Classes**: The `class` directory contains PHP classes for `Comment` and `News`.
  - **Utils**: The `utils` directory contains utility classes like `CommentManager.php`, `DB.php`, and `NewsManager.php`.
  - **Configuration**: The `.env.example` file suggests the use of environment variables for configuration.
  - **Database**: The `dbdump.sql` file contains the SQL dump to create the initial database structure.
  - **Dependencies**: The `composer.json` file specifies the dependency on `symfony/dotenv`.

### My Additions & refactorings
  - Use SQL prepared statements for protection against possible SQL injections
  - Use Environment variables and store sentitive data securely in a .env file
  - Use exceptions where applicable for better error handling
  - Add documentation / comments in code
  - Make app modular: wrap logic blocks with functions to make those same logic blocks reusable elsewhere in the app