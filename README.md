# Pemesanan Tenda

A web app for renting tents and event equipment. Customers browse a catalog, add items to a cart, place an order and upload proof of payment. Admins manage the inventory and confirm orders.

Built with Laravel 12, Blade, Tailwind CSS and Alpine.js.

## Features

**Customers**
- Browse and search the equipment catalog, and view item details
- Cart: add items, change quantities, remove items
- Place orders and track their status (`unpaid`, `need_confirmation`, `paid`, `returned`)
- Upload proof of payment
- Registration, login, email verification and profile management

**Admins**
- Manage tools: create, update and delete items, with image upload and availability status
- Manage orders: confirm payments, record pickup and return dates, delete orders
- Role-based access through an `admin` middleware

**General**
- Dark/light theme toggle
- Responsive layout with a dashboard sidebar

## Tech Stack

| Layer    | Technology                                   |
|----------|----------------------------------------------|
| Backend  | PHP 8.2+, Laravel 12, Laravel Breeze (auth)  |
| Frontend | Blade, Tailwind CSS 3, Alpine.js, Vite       |
| Database | MySQL (default; configurable)                |
| Testing  | Pest                                         |

## Getting Started

### Requirements
- PHP 8.2 or newer, with Composer
- Node.js 18+ and npm
- MySQL (or another database supported by Laravel)

### Installation

```bash
git clone https://github.com/<your-username>/pemesanan-tenda.git
cd pemesanan-tenda

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Create a database (the default name is `penyewaan_tenda`), then set the `DB_*` values in `.env`.

```bash
php artisan migrate --seed
php artisan storage:link
```

### Run

```bash
php artisan serve   # http://localhost:8000
npm run dev         # in a second terminal
```

For a production build, run `npm run build`.

### Demo accounts

`php artisan migrate --seed` creates these accounts:

| Role  | Email               | Password   |
|-------|---------------------|------------|
| Admin | admin@example.com   | 12345678   |
| User  | user@example.com    | 12345678   |

> These are for local development only. Change or remove them before deploying.

### Tests

```bash
php artisan test
```

## Project Structure

```
app/Http/Controllers/   Order, OrderDetail, Tool, Profile and auth controllers
app/Http/Middleware/    AdminMiddleware (role check)
app/Models/             User, Tool, Order, OrderDetail, Payment
database/migrations/    Schema for users, tools, orders, order details, payments
resources/views/        Blade views and reusable components
routes/web.php          Public, customer and admin routes
```

## Data Model

- **User**: has a role (`admin` or `user`), phone number and address
- **Tool**: rentable item with product number, price, stock and status
- **Order**: belongs to a user and tracks order, pickup and return dates, status and payment proof
- **OrderDetail**: line item linking an order to a tool, with a quantity
- **Payment**: final price record for an order

## License

Released under the [MIT License](https://opensource.org/licenses/MIT).
