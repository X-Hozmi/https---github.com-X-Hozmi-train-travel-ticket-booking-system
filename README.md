# Train Travel Ticket Booking System

This is a PHP Native project designed to provide a comprehensive solution for managing train travel ticket bookings. The system supports user authentication, train and seat management, route creation, order processing, and payment functionalities.

---

## Features

- **User Roles**: Admin, Staff, and Client roles with specific permissions:
  - Admin: Full access to the system.
  - Staff: Manage trains, routes, prices, and other configurations.
  - Clients: Book train tickets and view invoices.
- **Train Management**: Add, update, and manage trains, routes, and schedules.
- **Ticket Booking**: Secure and user-friendly ticket booking process.
- **Payment Integration**: Supports payment processing for booked tickets.
- **Invoice Generation**: Automatic PDF generation for client invoices.
- **Middleware Security**: Ensures routes are protected using JWT-based authentication.
- **Clean Architecture**: Organizes codebase into Domain, Application, Infrastructure, and Presentation layers for better maintainability and scalability.

---

## Technologies Used

- **PHP Native**: Core backend development.
- **JWT (JSON Web Tokens)**: Authentication and session management.
- **MySQL**: Database management (`train_travel_db.sql` included).
- **Composer**: Dependency management.
- **PHPUnit**: Unit and integration testing.

---

## Installation Guide

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL >= 5.7
- Web server (Apache or Nginx)

### Steps
1. Clone this repository:
   ```bash
   git clone https://github.com/X-Hozmi/train-travel-ticket-booking-system.git
   ```

2. Navigate to the project directory:
   ```bash
   cd train-travel-ticket-booking-system
   ```

3. Navigate to the project directory:
   ```bash
   composer install
   ```

4. Set up the database:
   - Import the `train_travel_db.sql` file located in `src/Infrastructure/Databases` into your MySQL server
   - Update the database configuration in `src/Infrastructure/Configs/database.php` with your credentials

5. Start the server:
   ```bash
   php -S localhost:8000
   ```

6. Access the application via http://localhost:8000 in your web browser

---

## File Structure

- `src/Application`: Contains controllers, repositories, services, and middleware logic.
- `src/Domain`: Houses entities, repository interfaces, and use cases.
- `src/Infrastructure`: Manages database configurations, connections, and routing.
- `src/Presentation`: Includes assets and static presentation pages.
- `tests`: PHPUnit test cases for unit and integration testing.

---

### Project Tree
```
uas
├─ .github
│  └─ workflows
│     └─ CI.yml
├─ .gitignore
├─ .htaccess
├─ composer.json
├─ composer.lock
├─ index.php
├─ phpunit.xml
├─ pint.json
├─ postman
│  ├─ Pemrograman Web 1 - UAS.postman_collection.json
│  └─ Pemrograman Web 1 - UAS.postman_environment.json
├─ README.md
├─ src
│  ├─ Application
│  │  ├─ Adapters
│  │  │  ├─ Controllers
│  │  │  │  ├─ AuthController.php
│  │  │  │  ├─ OrderController.php
│  │  │  │  ├─ PaymentController.php
│  │  │  │  ├─ RouteController.php
│  │  │  │  ├─ SeatController.php
│  │  │  │  ├─ StationController.php
│  │  │  │  ├─ TimeController.php
│  │  │  │  ├─ TrainController.php
│  │  │  │  └─ UserController.php
│  │  │  └─ Repositories
│  │  │     ├─ OrderRepositoryImpl.php
│  │  │     ├─ PaymentRepositoryImpl.php
│  │  │     ├─ RouteRepositoryImpl.php
│  │  │     ├─ SeatRepositoryImpl.php
│  │  │     ├─ StationRepositoryImpl.php
│  │  │     ├─ TimeRepositoryImpl.php
│  │  │     ├─ TrainRepositoryImpl.php
│  │  │     └─ UserRepositoryImpl.php
│  │  ├─ Helpers
│  │  │  └─ Helpers.php
│  │  ├─ Middlewares
│  │  │  └─ AuthMiddleware.php
│  │  └─ Services
│  │     ├─ JWTService.php
│  │     └─ ResponseService.php
│  ├─ Domain
│  │  ├─ Entities
│  │  │  ├─ Order.php
│  │  │  ├─ Payment.php
│  │  │  ├─ Route.php
│  │  │  ├─ Seat.php
│  │  │  ├─ Station.php
│  │  │  ├─ Time.php
│  │  │  ├─ Train.php
│  │  │  └─ User.php
│  │  ├─ Repositories
│  │  │  ├─ OrderRepositoryInterface.php
│  │  │  ├─ PaymentRepositoryInterface.php
│  │  │  ├─ RouteRepositoryInterface.php
│  │  │  ├─ SeatRepositoryInterface.php
│  │  │  ├─ StationRepositoryInterface.php
│  │  │  ├─ TimeRepositoryInterface.php
│  │  │  ├─ TrainRepositoryInterface.php
│  │  │  └─ UserRepositoryInterface.php
│  │  └─ UseCases
│  │     ├─ AuthUseCase.php
│  │     ├─ OrderUseCase.php
│  │     ├─ PaymentUseCase.php
│  │     ├─ RouteUseCase.php
│  │     ├─ SeatUseCase.php
│  │     ├─ StationUseCase.php
│  │     ├─ TimeUseCase.php
│  │     ├─ TrainUseCase.php
│  │     └─ UserUseCase.php
│  ├─ Infrastructure
│  │  ├─ Configs
│  │  │  └─ database.php
│  │  ├─ Databases
│  │  │  ├─ DatabaseConnection.php
│  │  │  └─ train_travel_db.sql
│  │  └─ Router
│  │     └─ Router.php
│  └─ Presentation
│     ├─ Assets
│     └─ Pages
└─ tests
   ├─ Helper
   ├─ Integration
   │  └─ Controllers
   ├─ TestCase.php
   └─ Unit
      ├─ Application
      └─ Domain
         ├─ Entities
         │  ├─ OrderTest.php
         │  ├─ PaymentTest.php
         │  ├─ RouteTest.php
         │  ├─ SeatTest.php
         │  ├─ StationTest.php
         │  ├─ TimeTest.php
         │  ├─ TrainTest.php
         │  └─ UserTest.php
         └─ UseCases
```

---

## Version History

### 🚀 Initial Development Phase
- **Date**: November 2024 (Ongoing)
- **Current Status**: *In Development*
  - The core backend logic is implemented using PHP Native, following a clean architecture pattern.
  - JWT-based authentication system is functional.
  - Database schema (`train_travel_db.sql`) and configurations are complete.
  - CRUD operations for users are operational.
  - PHPUnit tests are written for entities and use cases.
  - File structure is organized across Domain, Application, Infrastructure, and Presentation layers.

### 🛠️ Ongoing Updates
- **CRUD Operations**
  - Implementing trains, routes, and tickets
- **Presentation Layer**:
  - Currently being updated locally to improve user interface and experience.
  - Pages for ticket booking, user profile, and admin dashboard are under construction.
- **Invoice Generation**:
  - PDF generation for invoices is in progress.
  - Functionality for customizing invoice templates is under consideration.

### 🔮 Future Plans
- **Integration with Payment Gateway**:
  - Adding support for external payment providers (e.g., PayPal, Stripe).
- **Mobile Responsiveness**:
  - Enhancing the frontend to ensure compatibility with mobile devices.
- **Deployment**:
  - Preparing the application for deployment on a live server.
- **Additional Features**:
  - Notifications for booking confirmations and updates.
  - Reports for admins and staff to track bookings and revenue.

---
