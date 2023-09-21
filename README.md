Laravel project to implement CRUD using API

Routing is implemented in the file: routes\api.php

The developed controllers are located in the folder: app\Http\Controllers (UserController, CompanyController,
CommentController)

Request validation rules are specified in the class:
App\Http\Requests\Comment\StoreRequest.php
App\Http\Requests\Comment\UpdateRequest.php
App\Http\Requests\Company\StoreRequest.php
App\Http\Requests\Company\UpdateRequest.php
App\Http\Requests\User\StoreRequest.php
App\Http\Requests\User\UpdateRequest.php

The migration files are located in the directory: database\migrations

Resources class:
App\Http\Resources\Comment\CommentResource.php
App\Http\Resources\User\UserResource.php
App\Http\Resources\Company\CompanyResource.php

Model class:
app\Models\Company.php
app\Models\User.php
app\Models\Comment.php

Service class:
app\Service\MyFormRequest.php

Resource files are located in the directory: public\

Clone the project into the directory with the server:

git clone https://github.com/pkrotkikh/laravel-project-example.git

Then, opening the console from the project folder, enter the command to install the Laravel packages:

composer install

Create a database on the server and fill in the fields of the .env file located in the project folder according to the
example:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=sqlite

In the open console of the project directory, enter the command to generate database tables:

php artisan migrate

In the same console, to launch the site at http://localhost:8000, enter the command:

php artisan serve

Open the site in a browser at http://localhost:8000

Examples of API requests:

GET|HEAD        api/comments .............................................................................................................. comments.index › CommentController@index  
POST            api/comments .............................................................................................................. comments.store › CommentController@store  
GET|HEAD        api/comments/{comment} ...................................................................................................... comments.show › CommentController@show  
PUT|PATCH       api/comments/{comment} .................................................................................................. comments.update › CommentController@update  
DELETE          api/comments/{comment} ................................................................................................ comments.destroy › CommentController@destroy  
GET|HEAD        api/companies ............................................................................................................ companies.index › CompanyController@index  
POST            api/companies ............................................................................................................ companies.store › CompanyController@store  
GET|HEAD        api/companies/popular/{company} .......................................................................................................... CompanyController@popular  
GET|HEAD        api/companies/top ............................................................................................................................ CompanyController@top  
GET|HEAD        api/companies/{company} .................................................................................................... companies.show › CompanyController@show  
PUT|PATCH       api/companies/{company} ................................................................................................ companies.update › CompanyController@update  
DELETE          api/companies/{company} .............................................................................................. companies.destroy › CompanyController@destroy  
GET|HEAD        api/users ....................................................................................................................... users.index › UserController@index  
POST            api/users ....................................................................................................................... users.store › UserController@store  
GET|HEAD        api/users/{user} .................................................................................................................. users.show › UserController@show  
PUT|PATCH       api/users/{user} .............................................................................................................. users.update › UserController@update  
DELETE          api/users/{user} ............................................................................................................ users.destroy › UserController@destroy  

