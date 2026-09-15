# CoverSure — Insurance Management System Demo

A Laravel insurance platform demo with **12+ premium calculators**, admin tariff management, customer dashboards, and Flutter-ready REST APIs.

> **Disclaimer:** This is a portfolio recreation for code review. It is not affiliated with [Eastland Insurance PLC](https://www.eastlandinsurance.com/) or any production deployment.

## Features

- Online premium calculators: Fire, Motor, Marine Cargo, Overseas Mediclaim, Personal Accident, and more
- Configurable tariff engine with age-based pricing, riders, and coverage rules
- Admin CMS for corporate pages and premium calculator management
- Customer registration, OTP verification, dashboard, and invoice drafts
- REST API (`/api/*`) for mobile app integration
- SSLCommerz checkout with `DEMO_MODE` payment bypass

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 9, PHP 8.1+ |
| UI | Blade, Bootstrap, jQuery |
| Auth | Session (web) + Sanctum (API) |
| Database | MySQL 8 |
| Payments | SSLCommerz (bypassed in DEMO_MODE) |

## Quick Start (Docker)

```bash
git clone https://github.com/sazharul/insurance-platform-demo.git
cd insurance-platform-demo
docker compose up --build
```

| Service | URL |
|---------|-----|
| Website | http://localhost:8001 |
| Admin | http://localhost:8001/admin/login |
| API | http://localhost:8001/api |

### Demo Accounts

See [docs/DEMO_ACCOUNTS.md](docs/DEMO_ACCOUNTS.md).

| Role | Email | Password |
|------|-------|----------|
| Admin | `admin@coversure.demo` | `DemoAdmin123!` |
| Customer | `customer@coversure.demo` | `DemoUser123!` |
| API OTP | — | `123456` (DEMO_MODE) |

## API Overview

```
GET  /api/get-insurance
POST /api/calculation/fire
POST /api/calculation/marin
POST /api/calculation/personal-accident
POST /api/calculation/overseas-mediclaim
POST /api/auth/login
POST /api/auth/register
```

See [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md) for details.

## DEMO_MODE

When `DEMO_MODE=true` (default in `.env.example`):

- SSLCommerz redirects are skipped — orders complete instantly
- OTP is fixed to `123456` for API registration
- Mail uses the log driver — no SMTP required

## License

MIT — see [LICENSE](LICENSE).
