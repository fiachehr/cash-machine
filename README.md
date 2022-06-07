<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Cash Machine

- Cash Machine handles incomes of money.
- It can work with different sources of money: Cash, Credit Card, Bank Transfer
- It has a limit of 20.000 amount (except Cash) for total processing, everything more is declined.

### Cash Source

- It can accept only banknotes of 1, 5, 10, 50, 100 for Cash source
- It has 5 inputs for quantity of each type of banknotes
- It has a limit of 10.000 of amount in Cash, everything more is declined

### Credit Card Source

- t takes as inputs: Card Number, Expiration Date (MM/YYYY), Cardholder, CVV (3 digits), Amount
- It should accept Card Number with 16 digits and only ones which starts with digit ‘4’ (like 4123 4567 8912 3456)
- Expiration Date must be at least 2 months bigger than current month

### Bank Transfer

- It takes as inputs: Transfer Date, Customer name, Account number (6 alphanumerics), Amount
- Transfer Date can’t be older than current date

## Implementation

- Must be implemented 3 separate forms with inputs for each Source of Money All inputs are required
- On form submit the transactions must be stored in Database (total amount and inputs as JSON)All validations must be written using Laravel Validation, maybe some custom rules need to be written
- Cash Machine must check on transaction submit if amount limit isn’t exceeded by calculating total amount stored in Database. Cash Machine should not exceed the limit amount (20k) it can handle, when saving a new transaction.
- On successful submission User must be redirected on a New Page with transaction details stored in Database (ID, Total, Inputs)

## Run

- composer install
- composer dump-autoload
- rename .env.example to .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan serve
