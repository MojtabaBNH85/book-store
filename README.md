# Laravel Book-Store

Mid-level e-commerce book store built with Laravel 13, Blade + Tailwind CSS, SQLite, and Rial (Iranian currency) pricing.

## Features

- **Catalog**: Browse books with categories, search, author filtering
- **Shopping Cart**: Session-based cart (no carts table needed)
- **Checkout**: Orders with address, status tracking
- **Admin CRUD**: Manage books, categories, authors, orders via database
- **Reviews & Ratings**: Users can review books (1-5 rating)
- **Wishlist**: Save books for later
- **Many-to-Many Authors**: One book can have multiple authors
- **Image Galleries**: Cover + multiple detail images per book
- **Full-text Migration**: Fresh database setup with SQLite

## Prerequisites

- PHP >= 8.3
- Composer >= 2.9
- Node >= 20 (for Tailwind)
- SQLite (included with PHP, no server needed)

## Quick Start

1. **Install dependencies**
   ```bash
   composer install
   npm install
   npm run build
   ```

2. **Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database** (SQLite — no server needed)
   ```bash
   php artisan migrate:fresh --seed
   # or just migrate:
   php artisan migrate:fresh --force
   ```

4. **Serve**
   ```bash
   php artisan serve
   # Visit http://localhost:8000
   ```

## Database Schema

All migrations live in `database/migrations/`. Key tables:

| Table | Purpose |
|-------|---------|
| `users` | Auth system + `is_admin` flag |
| `categories` | Book categories + slug |
| `authors` | Authors + slug + bio |
| `books` | Core inventory — `price` stored as **integer Rial** (no cents) |
| `book_images` | Cover + gallery images per book, ordered by `sort` |
| `addresses` | User addresses with `AddressTypeEnum` (home/work/other) |
| `reviews` | Ratings 1-5 + comments, unique per user+book |
| `wishlists` | Pivot: user ↔ book, composite PK `(user_id, book_id)` |
| `author_book` | Pivot: author ↔ book, composite PK `(book_id, author_id)` |
| `orders` | Checkout orders + status enum (pending/paid/shipped/completed/cancelled) |
| `order_items` | Line items linking order + book + qty + price |

## Models & Relations

- `User` → `hasMany Address`, `hasMany Review`, `belongsToMany Book` (wishlists)
- `Category` → `hasMany Book`
- `Author` → `belongsToMany Book` via `author_book`
- `Book` → `belongsTo Category`, `hasMany Review`, `hasMany BookImage`, `belongsToMany Author`, `belongsToMany User` (wishlists), `hasMany OrderItem`
- `Order` → `belongsTo User`, `belongsTo Address`, `hasMany OrderItem`
- `OrderItem` → `belongsTo Order`, `belongsTo Book`, casts `price` as integer

## Price Handling (Rial)

All money stored as `unsignedBigInteger` in Rial (no decimal/floating point).

- `books.price`: base price in Rial
- `orders.total`: order subtotal in Rial  
- `order_items.price`: line item price in Rial

Display in Toman by dividing by 10 in your Blade views if desired.

## Admin Panel (Basic)

No full admin UI yet. Use tinker/seeds or direct DB queries to manage data. You can add a simple Livewire or Filament admin later.

## Development

- Run tests: `php artisan test`
- Clear cache: `php artisan cache:clear`
- Reset DB: `php artisan migrate:fresh --seed`

## License

MIT — feel free to modify for your own book store project.