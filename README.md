# 🏨 Luxury Hotel Booking System

A modern, responsive hotel booking system built with Laravel 11, featuring room management, booking functionality, and an admin panel. This system provides a complete solution for hotel reservations with dynamic pricing, availability management, and a beautiful user interface.

# Screenshots

User Part:

<img width="1908" height="880" alt="Screenshot 2025-10-19 181120" src="https://github.com/user-attachments/assets/7dd7c5d0-da7e-4f4d-8012-75b0653b30df" />
<img width="1920" height="880" alt="Screenshot 2025-10-19 181130" src="https://github.com/user-attachments/assets/8ac6a371-7454-4ef0-b849-896f7e9ccf40" />
<img width="1920" height="3143" alt="Screenshot 2025-10-19 170241" src="https://github.com/user-attachments/assets/b7f9de50-7da7-4a6e-8b19-2a09cff8ed92" />
<img width="1920" height="1545" alt="FireShot Capture 031 - Find My Booking - Luxury Hotel -  127 0 0 1" src="https://github.com/user-attachments/assets/d0cb2aaf-18a8-45b2-8bd8-2079ad69e42f" />

Admin Part:

<img width="1920" height="885" alt="Screenshot 2025-10-19 181643" src="https://github.com/user-attachments/assets/09f49024-655c-445f-9521-6223af1c4820" />
<img width="1920" height="881" alt="Screenshot 2025-10-19 181136" src="https://github.com/user-attachments/assets/a4828bf4-efb7-486b-8ffa-42d49b43753f" />
<img width="1920" height="876" alt="Screenshot 2025-10-19 181142" src="https://github.com/user-attachments/assets/f43c4c2b-ce0e-4989-b6f0-0fac92ce5ee6" />
<img width="1920" height="886" alt="Screenshot 2025-10-19 181146" src="https://github.com/user-attachments/assets/7d7599c7-2e4c-4cf3-bd31-9761dfc677e8" />


## ✨ Features

### 🎯 Core Features
- **Room Categories Management**: Premium Deluxe, Super Deluxe, Standard Deluxe
- **Dynamic Pricing**: Base pricing with weekend surcharges (+20% on Friday/Saturday)
- **Consecutive Night Discounts**: 10% discount for 3+ consecutive nights
- **Real-time Availability**: Live room availability checking
- **Booking Management**: Complete booking lifecycle management
- **Admin Panel**: Full administrative control over bookings and rooms

### 🎨 User Interface
- **Responsive Design**: Works perfectly on all screen sizes
- **Modern UI**: Clean, professional design with Tailwind CSS
- **Interactive Elements**: Smooth animations and transitions
- **Mobile-First**: Optimized for mobile devices

### 🔧 Technical Features
- **Laravel 11**: Latest Laravel framework
- **MySQL Database**: Reliable data storage
- **Eloquent ORM**: Clean database interactions
- **CSRF Protection**: Secure form handling
- **Validation**: Comprehensive input validation
- **Error Handling**: Graceful error management

## 🚀 Installation Guide

### Prerequisites

Before installing this project, make sure you have the following installed on your system:

- **PHP 8.2 or higher**
- **Composer** (PHP dependency manager)
- **MySQL 5.7 or higher**
- **Node.js 16+ and NPM** (for frontend assets)
- **Git** (for version control)

### Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/hotel-booking-system.git
cd hotel-booking-system
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

### Step 3: Environment Configuration

1. **Copy the environment file:**
```bash
cp .env.example .env
```

2. **Generate application key:**
```bash
php artisan key:generate
```

3. **Configure your database in `.env` file:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_booking
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 4: Database Setup

1. **Create the database:**
```sql
CREATE DATABASE hotel_booking;
```

2. **Run migrations:**
```bash
php artisan migrate
```

3. **Seed the database with sample data:**
```bash
php artisan db:seed
```

### Step 5: Install Frontend Dependencies

```bash
npm install
```

### Step 6: Build Frontend Assets

```bash
npm run build
```

### Step 7: Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`

## 📊 Database Structure

### Tables Created

- **users**: User accounts (including admin users)
- **room_categories**: Room types with pricing and details
- **rooms**: Individual room records
- **bookings**: Booking records with pricing calculations
- **room_availability**: Daily availability tracking

### Sample Data

The seeder creates:
- **3 Room Categories**: Premium Deluxe (৳12,000), Super Deluxe (৳10,000), Standard Deluxe (৳8,000)
- **1 Admin User**: admin@example.com / password
- **Room Availability**: 3 rooms per category per day

## 🎯 Usage Guide

### For Users

1. **Browse Rooms**: Visit the homepage to see available room categories
2. **Check Availability**: Select dates to see available rooms and pricing
3. **Make Booking**: Fill in guest details and confirm booking
4. **Find Booking**: Use email to lookup existing bookings

### For Administrators

1. **Login**: Use admin@example.com / password
2. **Dashboard**: View booking statistics and recent activity
3. **Manage Bookings**: View, confirm, or cancel bookings
4. **Room Management**: Add, edit, or delete room categories
5. **Availability Calendar**: View room availability by date

## 🔧 Configuration

### Room Categories

The system comes with three predefined room categories:

- **Premium Deluxe**: ৳12,000 per night
- **Super Deluxe**: ৳10,000 per night  
- **Standard Deluxe**: ৳8,000 per night

### Pricing Rules

- **Weekend Surcharge**: +20% on Friday and Saturday
- **Consecutive Discount**: 10% off for 3+ consecutive nights
- **Base Pricing**: Set per room category

### Availability Settings

- **Rooms per Category**: 3 rooms available per day
- **Booking Limits**: Automatic availability checking
- **Date Restrictions**: No past date bookings

## 🛠️ Development

### Project Structure

```
app/
├── Http/Controllers/
│   ├── BookingController.php      # User booking logic
│   ├── AdminController.php       # Admin panel logic
│   └── Auth/AdminAuthController.php
├── Models/
│   ├── RoomCategory.php          # Room category model
│   ├── Room.php                  # Room model
│   ├── Booking.php               # Booking model
│   └── RoomAvailability.php      # Availability model
└── Http/Middleware/
    └── AdminMiddleware.php        # Admin access control

resources/views/
├── booking/                      # Booking pages
├── admin/                        # Admin panel views
└── welcome.blade.php            # Homepage

database/
├── migrations/                   # Database structure
└── seeders/                     # Sample data
```

### Key Routes

```php
// Public routes
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/booking', [BookingController::class, 'index']);
Route::post('/booking/check-availability', [BookingController::class, 'checkAvailability']);

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/bookings', [AdminController::class, 'bookings']);
    Route::get('/rooms', [AdminController::class, 'rooms']);
});
```

## 🎨 Customization

### Styling

The project uses Tailwind CSS for styling. To customize:

1. **Edit CSS**: Modify `resources/css/app.css`
2. **Update Colors**: Change primary colors in Tailwind config
3. **Responsive Design**: Adjust breakpoints as needed

### Adding New Room Categories

1. **Database**: Add new category via admin panel
2. **Images**: Update room images in the seeder
3. **Pricing**: Set base price for new category

### Modifying Pricing Rules

Edit the pricing logic in `BookingController.php`:

```php
// Weekend surcharge (Friday = 5, Saturday = 6)
if (in_array($dayOfWeek, [5, 6])) {
    $weekendSurcharge = $basePrice * 0.20;
}

// Consecutive night discount
if ($totalNights >= 3) {
    $consecutiveDiscount = $totalPrice * 0.10;
}
```

## 🚀 Deployment

### Production Setup

1. **Environment**: Set `APP_ENV=production` in `.env`
2. **Debug**: Set `APP_DEBUG=false`
3. **Cache**: Run `php artisan config:cache`
4. **Optimize**: Run `php artisan optimize`
5. **Assets**: Run `npm run production`

### Server Requirements

- **PHP 8.2+**
- **MySQL 5.7+**
- **Web Server** (Apache/Nginx)
- **SSL Certificate** (recommended)

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**:
   - Check database credentials in `.env`
   - Ensure MySQL is running
   - Verify database exists

2. **Permission Errors**:
   ```bash
   chmod -R 755 storage/
   chmod -R 755 bootstrap/cache/
   ```

3. **Composer Issues**:
   ```bash
   composer dump-autoload
   php artisan config:clear
   ```

4. **Asset Compilation**:
   ```bash
   npm run dev
   # or
   npm run build
   ```

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📞 Support

For support and questions:

- **Email**: support@hotelbooking.com
- **Documentation**: [Project Wiki](https://github.com/your-username/hotel-booking-system/wiki)
- **Issues**: [GitHub Issues](https://github.com/your-username/hotel-booking-system/issues)

## 🙏 Acknowledgments

- **Laravel Framework**: [laravel.com](https://laravel.com)
- **Tailwind CSS**: [tailwindcss.com](https://tailwindcss.com)
- **Unsplash Images**: [unsplash.com](https://unsplash.com)

---

**Made with ❤️ for the hospitality industry**
