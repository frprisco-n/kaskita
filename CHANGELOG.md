# Changelog

All notable changes to KasKita are documented in this file.

The project follows a simple versioning approach during development.

## [Unreleased]

### Added
- Initial Laravel 13 project setup.
- MariaDB database connection.
- Default Laravel database migrations.
- Git repository initialization.
- Initial project documentation.
- Database schema for users, members, bills, bill recipients, and payments.
- Foreign key relationships and database indexes.
- Database check constraints for roles, statuses, and payment amounts.
- Unique constraints to prevent multiple pending or verified payments per bill recipient.
- User and Member Eloquent models with relationships.
- Laravel Fortify authentication.
- Login and logout functionality.
- Remember Me functionality.
- Administrator and member roles.
- Role-based access control and protected routes.
- Middleware for inactive account verification and session invalidation.
- Administrator and member dashboard placeholders.
- Administrator and test member seeders with environment-based passwords.

### Changed
- Extended the users table with role and active status.
- Configured authentication redirects based on user roles.
- Updated User model with password hashing and active status casting.

### Fixed
- Prevented inactive accounts from logging in.
- Prevented inactive accounts from accessing protected routes through existing sessions.

---

## Versioning

- **Added:** New features or functionality.
- **Changed:** Changes to existing functionality.
- **Fixed:** Bug fixes and corrections.