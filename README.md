# backend-laravel-api
Configuration 

# .env
put .env and connfigure db credentials

# php artisan migrate
To run all of your outstanding migrations, execute the migrate Artisan command:
php artisan migrate

# Running Seeders
php artisan db:seed --class=UserSeeder

# Run Singup API
Method: POST
{base_url}/api/registration
Params: Form-data
first_name:Amit
last_name:Rathore
email:amitrathore49@gmail.com
password:Admin@123
gender:1
mobile:9716923996
city: Ajmer
address:Ajmer Rajsthan, India

# Run Login API
Method: POST
{base_url}/api/login
Params:  Form-data
email:amitrathore49@gmail.com
password:Admin@123


