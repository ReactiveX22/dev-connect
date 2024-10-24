## devConnect 🎯

DevConnect is a job portal designed to connect developers with employers, featuring functionalities for job postings and application tracking.

## Presentation & Demo

- [Download Project Presentation](https://github.com/ReactiveX22/dev-connect/raw/main/Project_Presentation/DevConnect_Project_Presentation.pptx)
- [Download Demo Video](https://github.com/ReactiveX22/dev-connect/raw/main/Project_Presentation/DevConnect_demo.mp4)

### Demo

https://github.com/user-attachments/assets/ab0605ec-ff41-4125-9ca5-9f7444d36117

## Getting Started

### Prerequisites

Ensure you have the following installed:

- PHP >= 8.x
- Composer
- MySQL (default XAMPP setup)

### Installation

1. Clone the repository

```bash
git clone https://github.com/ReactiveX22/dev-connect.git
cd dev-connect
```

2. Install dependencies

```bash
composer install
```

3. Copy the environment file

```bash
cp .env.example .env
```

4. Generate the application key

```bash
php artisan key:generate
```

5. Start XAMPP
    - Open XAMPP Control Panel.
    - Start the **Apache** and **MySQL** services.
6. Create a database called `dev_hunt` using XAMPP phpMyAdmin:
    - Open your web browser and go to `http://localhost/phpmyadmin`.
    - Click on the "Databases" tab.
    - Enter `dev_hunt` in the "Create database" field and click "Create".
7. Run database migrations

```bash
php artisan migrate
```

8. Seed the database

```bash
php artisan db:seed
```

9. Start the local development server

```bash
php artisan serve
```

Once the server is running, you can access the project at: `http://localhost:8000`

The `public/build` folder is included in the repository, so you do not need to run npm or Vite to build your assets.

If you want to use the password reset feature, update the `.env` file with your Mailtrap credentials. You can find these in your Mailtrap account:

```env
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
```
