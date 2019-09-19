# Custom Login Using Laravel

**Pre-requisite:**

- Install your preferred version of Laravel using the <a href="https://laravel.com/docs/6.x" target="__blank">Laravel Documentation</a>.


## Steps to Follow:

- Insert first User in database using Database Seeder
- Create a view file for Login
- Create another file where the login will be landing
- Create a file to retrieve the error
- Modify Login Controller
- Controller for login landing page
- Add routes to web.php


## Insert first User in database using Database Seeder

We will use database seeder to create out first user. If you don't have idea about database seeder, please consider to visit <a href="https://laravel.com/docs/master/seeding" target="_blank">Database Seeder</a>

- Creating seeder with artisan: **php artisan make:seeder UsersTableSeeder**
- Open **UsersTableSeeder** and add the following inside run method :
    - DB::table('users')->insert([
    - 'name' => 'admin',
    - 'email' => 'admin@email.com',
    - 'password' => bcrypt('admin'),
    - ]);
- Add the following inside run method of **app/database/seeds/DatabaseSeeder.php**
    - $this->call(UsersTableSeeder::class);
- Run the artisan command: **php artisan db:seed**


## Create a view file for Login

- Create **resources/views/auth/login.blade.php**
- Create a layout file **resources/views/layout/layout.blade.php**


## Create another file where the login will be landing

- Create **resources/views/admin/index.blade.php**

## Modify Login Controller

- Paste the code of LoginController to your **app/HTTP/Controllers/Auth/LoginController.php**

## Controller for login landing page

- There is already a default controller named "HomeController". We will use that.

## Add routes to web.php

- Paste the code of **web.php**


## Modify Handler.php if redirect don't work

- Need to go to **Illuminate\Foundation\Exceptions\Handler.php** file and modify the **unauthenticated** method
    - protected function unauthenticated($request, AuthenticationException $exception)
    - {
    - return $request->expectsJson() ? response()->json(['message' => $exception->getMessage()], 401) : redirect('/');
    - }
