# KasKita

**Organizational Cash Management System**

KasKita is a web-based application designed to simplify organizational cash management, particularly member dues collection and payment monitoring.

The application provides a centralized platform for administrators to manage members, create bills, verify payment submissions, and monitor the organization's financial records.

## Background

Collecting organizational dues can become difficult when the process relies on separate tools such as Google Forms and spreadsheets. Payment records may be scattered, verification can take time, and members may have difficulty tracking their outstanding obligations.

KasKita aims to make this process more organized and transparent through a centralized web application.

## Features

### Administrator
- Manage organization members.
- Create and manage payment bills.
- Monitor members' payment obligations.
- Review and manually verify submitted payment proofs.
- Reject invalid payment submissions with a reason.
- View payment history and financial summaries.

### Member
- View personal payment obligations.
- Check payment status.
- Submit payment proofs.
- View payment submission history.
- Resubmit rejected payment proofs.

## Tech Stack

| Technology | Purpose |
|---|---|
| Laravel 13 | Backend framework |
| PHP 8.4 | Programming language |
| MariaDB | Database |
| MySQL Workbench | Database management |
| Blade | Frontend templating |
| Vite | Frontend asset bundling |
| Git | Version control |

## Development Status

KasKita is currently under development.

Core features and database structures are being implemented incrementally.

See [PROGRESS.md](PROGRESS.md) for development updates and [CHANGELOG.md](CHANGELOG.md) for version history.

## Getting Started

### Prerequisites
- PHP 8.4+
- Composer
- Node.js and npm
- MariaDB or MySQL

### Installation

1. Clone the repository:

   ```bash
   git clone <repository-url>
   cd kaskita
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install frontend dependencies:

   ```bash
   npm install
   ```

4. Create the environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows PowerShell, use:

   ```powershell
   Copy-Item .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database credentials in `.env`.

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   composer run dev
   ```

The application will be available at `http://localhost:8000`.

## Project Scope

KasKita focuses on member dues management and payment verification.

The application does not process payments directly. Members submit payment proofs, and administrators manually verify each submission before it is recorded as a verified payment.

## License

This project is developed for educational and portfolio purposes.