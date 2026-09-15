# Demo Accounts

## Web Admin

| Field | Value |
|-------|-------|
| URL | http://localhost:8001/admin/login |
| Email | `admin@coversure.demo` |
| Password | `DemoAdmin123!` |

Use the admin panel to manage premium calculator tariffs, CMS content, and orders.

## Customer Portal

| Field | Value |
|-------|-------|
| URL | http://localhost:8001/user/login |
| Email | `customer@coversure.demo` |
| Password | `DemoUser123!` |

Register a new account to test the full purchase flow. In DEMO_MODE, OTP is always `123456`.

## API (Sanctum)

```bash
curl -X POST http://localhost:8001/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email_or_phone":"customer@coversure.demo","password":"DemoUser123!"}'
```

Use the returned token as `Authorization: Bearer {token}` for protected endpoints.

## DEMO_MODE Payments

When `DEMO_MODE=true`:

1. Complete a premium calculation on the website
2. Proceed to checkout and submit payment
3. Order is marked **Success** without SSLCommerz redirect
4. View the order on the customer dashboard
