# Kalakaar

A marketplace where artists of any field (music, dance, acting, photography, writing
and so on) build a profile, and producers search for and hire them.

It runs on PHP and MySQL with a few Bash scripts for setup. No framework and no
front-end build step, so it is quick to get running locally.

---

## Table of contents

1. [Features](#features)
2. [Tech stack](#tech-stack)
3. [Prerequisites](#prerequisites)
4. [Quick start](#quick-start)
5. [Configuration (.env)](#configuration-env)
6. [Demo accounts](#demo-accounts)
7. [Shell scripts](#shell-scripts)
8. [Running the tests](#running-the-tests)
9. [Project structure](#project-structure)
10. [Adding new entities](#adding-new-entities)
11. [Troubleshooting](#troubleshooting)

---

## Features

- **Accounts & auth** — register/login as an *artist* or a *producer*. Passwords are
  hashed with bcrypt; sessions are role-aware.
- **Artist profiles** — headline, field/category, bio, city, hourly rate, experience,
  availability, portfolio and reviews.
- **Browse & search** — producers filter artists by field, keyword and city.
- **Hire flow** — a producer sends a hire request to an artist (who gets a notification).
- **My Profile** — artists and producers edit their own profile from the dashboard.
- **Full CRUD** for 16 domain entities (categories, skills, portfolios, reviews,
  messages, bookings, tags, etc.).

---

## Tech stack

| Layer     | Choice                                            |
|-----------|---------------------------------------------------|
| Language  | PHP 8.2+ (developed on 8.5)                        |
| Database  | MySQL 8.0                                          |
| Scripts   | Bash (Git Bash on Windows)                         |
| Autoload  | Composer (PSR-4) — no runtime dependencies         |
| Templates | Plain PHP views                                    |

---

## Prerequisites

Install these first. Versions in brackets are the minimum.

| Tool         | Version | Download | Verify |
|--------------|---------|----------|--------|
| **PHP**      | 8.2+    | <https://www.php.net/downloads> (Windows: <https://windows.php.net/download/>) | `php -v` |
| **MySQL**    | 8.0     | <https://dev.mysql.com/downloads/mysql/> | `mysql --version` |
| **Composer** | 2.x     | <https://getcomposer.org/download/> | `composer --version` |
| **Git Bash** | any     | <https://git-scm.com/downloads> (Windows only — for the `.sh` scripts) | `bash --version` |

**Required PHP extensions** (enable in `php.ini`): `pdo_mysql`, `mbstring`, `openssl`.
Check with:

```bash
php -m | grep -E "pdo_mysql|mbstring|openssl"
```

> **Windows note:** make sure `php`, `composer` and `mysql` are on your `PATH`.
> The shell scripts also auto-detect MySQL at
> `C:\Program Files\MySQL\MySQL Server 8.0\bin` if it is not on the `PATH`.

---

## Quick start

```bash
# 1. Get the code and install the autoloader
cd Kalakaar
composer install            # or: composer dump-autoload

# 2. Create your environment file and set the DB password
cp .env.example .env
#    open .env and set DB_PASSWORD to your MySQL password

# 3. Build the database (create + tables + sample data) in one go
bash scripts/fresh.sh

# 4. Start the server
bash scripts/serve.sh
```

Now open <http://localhost:8000> in your browser.

> Prefer to do the database steps individually? Run, in order:
> `bash scripts/setup-db.sh` → `bash scripts/migrate.sh` → `bash scripts/seed.sh`.

> No Bash? You can run the equivalents by hand:
> ```bash
> php -S localhost:8000 -t public          # serve
> mysql -u root -p kalakaar < database/migrations/001_create_users_table.sql   # per migration
> php database/seed.php                     # seed
> ```

---

## Configuration (.env)

Copy `.env.example` to `.env` and adjust:

```ini
APP_NAME=Kalakaar
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kalakaar
DB_USERNAME=root
DB_PASSWORD=            # <-- set your MySQL password here
```

`.env` is git-ignored, so your password never gets committed.

---

## Demo accounts

After seeding, log in with any of these (password is **`password`** for all):

| Role     | Email                       | Password   |
|----------|-----------------------------|------------|
| Artist   | `artist@kalakaar.test`      | `password` |
| Artist   | `riya@kalakaar.test`        | `password` |
| Producer | `producer@kalakaar.test`    | `password` |

Or just hit **Join** on the homepage and create your own account.

---

## Shell scripts

All live in `scripts/` and read `.env` automatically.

| Script              | What it does                                             |
|---------------------|---------------------------------------------------------|
| `setup-db.sh`       | Creates the `kalakaar` database (if missing)            |
| `migrate.sh`        | Applies every `database/migrations/*.sql` in order      |
| `seed.sh`           | Runs the PHP seeders (demo users + sample data)         |
| `fresh.sh`          | **Drops** the DB, recreates, migrates and seeds         |
| `serve.sh [host] [port]` | Starts the PHP dev server (default `localhost:8000`) |
| `scaffold.php`      | Code generator — see [Adding new entities](#adding-new-entities) |

---

## Running the tests

A tiny zero-dependency test runner (no PHPUnit needed):

```bash
php tests/run.php
```

Expected output ends with `Total: N passed, 0 failed`.

---

## Project structure

```
Kalakaar/
├── app/
│   ├── Core/            framework: Router, Database (PDO), View, Validator,
│   │                    Repository, Model, Session, Controller, Env, Config…
│   ├── Controllers/     HTTP controllers (auth, dashboard, profile, artists,
│   │                    search, hire + one per entity)
│   ├── Models/          entity classes
│   ├── Repositories/    table gateways (all SQL lives here)
│   ├── Services/        business logic
│   ├── Requests/        validation rule sets
│   └── Middleware/       Auth, Guest, Csrf, Role (+ Artist/Producer only)
├── config/             app, database, session config
├── database/
│   ├── migrations/     one .sql per table
│   ├── seeders/        one seeder per entity (+ UserSeeder)
│   └── seed.php        seeder runner
├── resources/views/    plain-PHP templates (+ layouts, partials)
├── routes/             web.php (+ generated resources.php)
├── scripts/            shell scripts + the code generator
├── tests/              unit tests + run.php
├── public/             web root: index.php front controller + assets
├── .env.example        copy to .env
├── composer.json
├── README.md           (this file)
└── ARCHITECTURE.md     how a request flows through the app
```

See **[ARCHITECTURE.md](ARCHITECTURE.md)** for the request lifecycle and layer
responsibilities.

---

## Adding new entities

The repetitive CRUD layers are generated. To add an entity:

1. Open `scripts/scaffold.php` and add an entry to the `$entities` array
   (name, table, fields with their SQL type, validation rules and sample data).
2. Generate the slice (Model, Repository, Service, Controller, Request, migration,
   seeder, views, test and routes):
   ```bash
   php scripts/scaffold.php
   composer dump-autoload
   ```
3. Apply the new migration:
   ```bash
   bash scripts/migrate.sh
   ```

The generator only writes files that don't exist yet, so it is safe to re-run.

---

## Troubleshooting

| Symptom | Fix |
|---------|-----|
| `php: command not found` | Add your PHP folder to `PATH`, then reopen the terminal. |
| `could not find driver` / PDO error | Enable `extension=pdo_mysql` in `php.ini`. |
| `Access denied for user 'root'@'localhost'` | Wrong `DB_PASSWORD` in `.env`. |
| `Unknown database 'kalakaar'` | Run `bash scripts/setup-db.sh` (or `fresh.sh`). |
| `mysql: command not found` (in scripts) | Add the MySQL `bin` folder to `PATH`. |
| Browse/Search page is empty | Run `bash scripts/seed.sh` to load demo data. |
| `Address already in use` on :8000 | Use another port: `bash scripts/serve.sh localhost 8080`. |
| Class "…" not found after adding files | Run `composer dump-autoload`. |
