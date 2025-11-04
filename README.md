# Travel Blog Project

A modern PHP-based travel blog application with user profiles, posts, articles, and comments.

## Features

- 🏝️ Travel blog posts with rich content
- 👤 User profiles and authentication
- 📝 Article management with image uploads
- 💬 Comment system
- 🔍 Search functionality
- 📱 Responsive design with Bootstrap

## Requirements

- PHP 8.0 or higher
- MySQL 5.7+ or MariaDB 10.2+
- Composer 2.x

## Quick Start

### 1. Install Dependencies

```bash
composer install
```

This will:
- Install all PHP dependencies
- Automatically create a `.env` file from `.env.example` if it doesn't exist

### 2. Configure Environment

Edit the `.env` file and update your database credentials:

```env
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=travel_blog
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

### 3. Install Database

Run the database installation script to automatically create the database and import the schema:

```bash
composer install-db
```

This will:
- Create the `travel_blog` database
- Import all tables and sample data
- Verify the installation

### 4. Start Development Server

Start the built-in PHP development server:

```bash
composer dev
```

The application will be available at [http://localhost:8000](http://localhost:8000)

## Project Structure

```
TravelBlogProject/
├── config/              # Configuration files
│   ├── bootstrap.php    # Application initialization
│   └── database.php     # Database connection
├── database/            # Database files
│   └── travel_blog.sql  # Database schema and sample data
├── public/              # Public web root (document root)
│   └── index.php        # Application entry point
├── scripts/             # JavaScript and utility scripts
│   ├── install-database.php  # Database installer
│   └── ...
├── src/                 # PHP source code (PSR-4 autoloaded)
├── static/              # Static assets (CSS, images)
│   ├── css/
│   ├── images/
│   └── scss/
├── templates/           # PHP templates/views
│   ├── core/            # Core templates (navbar, footer)
│   ├── index/           # Home page templates
│   ├── post/            # Post templates
│   ├── profile/         # Profile templates
│   └── ...
├── vendor/              # Composer dependencies (gitignored)
├── .env                 # Environment configuration (gitignored)
├── .env.example         # Example environment configuration
├── composer.json        # Composer configuration
└── README.md            # This file
```

## Available Composer Scripts

- `composer dev` - Start development server on localhost:8000
- `composer install-db` - Install/reinstall database with sample data

## Development

### Adding New Dependencies

```bash
composer require vendor/package-name
```

### Development Mode

The application runs in development mode by default with error reporting enabled. To switch to production mode, update `.env`:

```env
APP_ENV=production
APP_DEBUG=false
```

### Database Access

The application uses PDO for database access. Connection is handled automatically through environment variables:

```php
// Get database connection
$conn = getDbConnection();

// Or use legacy function (backward compatible)
$conn = connect();
```

## Database Schema

The database includes the following main tables:

- `user` - User accounts and profiles
- `post` - Blog posts
- `article` - Articles within posts
- `comment` - User comments
- `user_intro` - User introductions

## Security Notes

- Always keep `.env` file out of version control
- Update database credentials before deploying
- Set `APP_DEBUG=false` in production
- Review and update security settings in `.env`

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request
