<p align="center">
    <img title="Laravel" height="150"  src="https://raw.githubusercontent.com/Ajvaro/fileforrest/master/public/images/laravel_logo.png" />
</p>

-----
## Laravel SaaS 

Subscription management application, features:

- Customized registration with account activation email
- Two factor authentication with Authy
- Cashier/Stripe subscription plans and subscription management
- Team subscriptions
- Admin User Impersonation
- Passport API routes protection

-----

## Instructions

After cloning repository run:

``` composer install ```

and

``` npm install ```

Generate your .env file

``` cp .env.example .env ```

and application key

``` php artisan key:generate ```

Set your database login details and run

``` php artisan migrate:fresh --seed ```
