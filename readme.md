# Project Setup Guide

## Getting Started

Follow these steps to set up and run the project locally.

### 1. Navigate to the Project Directory
```sh
cd /project
```

### 2. Configure Environment Variables
- Create a `.env` file by copying the example configuration:
```sh
cp .env.example .env
```

### 3. Install Dependencies
```sh
composer install
```

### 4. Run Database Migrations
```sh
php artisan migrate
```

### 5. Seed the Database
- Seed the admin user:
```sh
php artisan db:seed --class=AdminSeeder
```
- Seed learner data:
```sh
php artisan db:seed --class=LearnerSeeder
```

### 6. Admin Credentials
You can find the admin email and password in the `AdminSeeder` file.

Now, your project should be ready to use!

