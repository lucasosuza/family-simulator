#Family-simulator

This is a simple refactoring from the orignal files on family-simulator.zip solving the issues defined on Refactoring test.pdf

## Running and testing

Before any further step this project is built uppon composer and to properly run it the first command to be executed is:

```php
php composer.phar install
```

It shoud correctly configure and generate the autoloader.

### How to run

This project is configured to run using PHP Built in Server and it can be done executing the following command:

```php
php -S localhost:8080 -t public_html/
```

### How to test

To run all tests simply execute the command:

```php
./vendor/bin/phpunit --testdox tests
```

Running on this way will be easier to read what should be tested or not.

#### How to verify the coverage




## Solutions

This project solves the following instrucions 
1. Refactor the code 
2. Get rid of using $_SESSION for storing 
3. Add “Adapt Child”, which should also work without a dad. 
4. Cover your refactored code with unit tests. -> using php-code-coverage library 