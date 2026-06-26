# Architecture

Kalakaar is a small hand-rolled MVC framework on top of plain PHP. The goal is a
clear request lifecycle with one responsibility per layer.

## Request lifecycle

```
public/index.php
   │  loads autoloader, .env, starts session
   ▼
Router (app/Core/Router.php)
   │  matches METHOD + path, runs middleware
   ▼
Middleware (Auth / Guest / Csrf / Role)
   ▼
Controller (app/Controllers/*)
   │  reads Request, calls a Service
   ▼
Service (app/Services/*)
   │  business rules
   ▼
Repository (app/Repositories/*)
   │  SQL via PDO (app/Core/Database.php)
   ▼
Model (app/Models/*)  ── hydrated rows
   │
   ▼
View (resources/views/*) ── rendered into layouts/app.php
   ▼
HTTP response
```

## Layers

| Layer | Responsibility |
|-------|----------------|
| **Router** | Map URLs to controller actions; attach middleware. |
| **Middleware** | Cross-cutting checks (auth, csrf, role) before the action. |
| **Controller** | Translate HTTP ⇄ services; pick a view. No SQL here. |
| **Request** | Named validation rule sets, run through `Validator`. |
| **Service** | Business logic; orchestrates repositories. |
| **Repository** | All SQL. Returns hydrated `Model` objects. |
| **Model** | Typed-ish data holder with `$fillable` and helpers. |
| **View** | Plain-PHP templates; `partial()` for fragments, layout wraps pages. |

## Conventions

- One class per file, PSR-4 (`App\` → `app/`).
- Repositories never leak PDO outside themselves.
- Every entity ships a migration, a seeder and a unit test.
- New entities are generated with `php scripts/scaffold.php` from the specs at the
  top of that file — edit the `$entities` array and re-run.

## Security notes

- Passwords are hashed with `password_hash()` (bcrypt).
- All output is escaped with `e()` (htmlspecialchars).
- `csrf_token()` / `csrf_field()` issue per-session tokens; `CsrfMiddleware`
  verifies them on state-changing routes.
- PDO uses prepared statements everywhere (no string-interpolated values).
