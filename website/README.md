# How to run the project:

create `.env` file

create mysql database called `othman_dern_support`

run the migrations

```bash
php artisan migrate
```

seed the database with data

```bash
php artisan db:seed --class=DatabaseSeeder
```

install backend dependencies

```bash
composer install
```

serve frontend dependencies

```bash
npm run serve
```

serve the application:

```bash
php artisan serve
```

# Admin routes:

`http://localhost:8000/admin/login`

# Admin account:

**email**: `root@mail.com`
**password**: `root1234`

# User routes:

`http://localhost:8000/register`