# Architecture

## Overview

CoverSure is a monolithic Laravel 9 application serving three surfaces:

1. **Public website** — Blade CMS pages and online premium calculators
2. **Customer portal** — Registration, OTP, dashboard, policy purchase
3. **Admin panel** — Tariff management, CMS CRUD, order management
4. **REST API** — Sanctum-authenticated endpoints for Flutter mobile apps

## Premium Calculator Engine

Each insurance product is a `Calculator` record (IDs 1–12) with related lookup tables:

| ID | Product |
|----|---------|
| 1 | Fire Insurance |
| 2 | Marine Cargo |
| 3 | Motor |
| 4 | Overseas Mediclaim |
| 5 | Personal Accident |
| 6 | Peoples Personal Accident |
| 7 | Bangobandhu Suroksha Bima |
| 8 | Flat/Apartment Owner |

Calculation logic lives in:

- `App\Http\Controllers\CalculationController` (web)
- `App\Http\Controllers\Api\CalculationController` (API)
- `App\Http\Controllers\FrontendMotorController` (motor-specific)

Tariff data is stored across 40+ `calculator_*` and `calculation_*` tables, managed via `PremiumCalculatorManagementController`.

## API Routes

Defined in `routes/api.php`:

- `PremiumCalculatorController` — lookup endpoints (districts, vehicle types, coverages)
- `CalculationController` — `POST /api/calculation/*` premium computation
- `AuthenticationController` — register, OTP, login, dashboard, invoice drafts

## Payments

`SslCommerzPaymentController` handles policy purchase checkout. When `config('app.demo_mode')` is true, payment gateway calls are bypassed and orders are marked successful locally.

## Demo Seeders

- `DemoSeeder` — admin user, demo customer, homepage CMS content
- `CalculatorDemoSeeder` — synthetic tariff data for Fire, Motor, Marine, Mediclaim, and Personal Accident

Run with `php artisan migrate --seed` or via Docker entrypoint.
