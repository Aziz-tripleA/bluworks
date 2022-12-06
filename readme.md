## laravel auth
> i used repository pattern  as a middle layer between the rest of the application and the data access logic
> PHPStan analyse codebase,
> i used laravel Sanctum package for authentication and generate api token

## endpoints
- login
  - POST /api/login
  - body: email, password
  - response: token
  - token is used in header Authorization: Bearer {token}

- register
    - POST /api/register
    - body: username, email, password, password_confirmation, phone , birthday
- update user
    - PUT /api/user/{id}
    - body: username, email, password, password_confirmation, phone , birthday
- delete user
  - DELETE /api/user/{id}
- get all users
    - GET /api/user/all
- get user by id
  - GET /api/user/{id}

## run project
- composer install
- php artisan migrate
- php artisan db:seed
- php artisan serve

## run tests
- ./vendor/bin/phpunit

## analyse the code
- ./vendor/bin/phpstan analyse

  



