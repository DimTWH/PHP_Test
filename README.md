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

## Additions & refactorings
  - Use SQL prepared statements for protection against possible SQL injections
  - Use Environment variables and store sentitive data securely in a .env file
  - Use exceptions for better error handling
  - Add documentation / comments in code