## 🛠 Requirements

Make sure the following are installed:

1. PHP >= 8.1
2.Composer
3.Laravel >= 10
4.MySQL (via XAMPP or similar)
5.Git (version control)


# Clone repo
git clone https://github.com/your-username/laravel-invoice-app.git

# Go into directory
cd laravel-invoice-app

# Run migrations and seeders
php artisan migrate
php artisan db:seed 

# Start Laravel dev server
php artisan serve

# In another terminal, start queue worker
php artisan queue:work

# Use the seeded credentials to log in:
Email:    test@example.com
Password: Qwer@123

