# jahongirneuro.uz

Doctor personal professional portfolio.

## Stack
- PHP 8.x
- HTML5
- CSS3
- Vanilla JavaScript where needed
- JSON
- Apache

## Final structure
```text
/
├── index.php
├── about/index.php
├── expertise/index.php
├── research/index.php
├── contact/index.php
├── admin/index.php
├── admin/about/index.php
├── admin/expertise/index.php
├── admin/research/index.php
├── admin/contact/index.php
├── data/
│   ├── doctor.json
│   ├── about.json
│   ├── expertise.json
│   ├── research.json
│   └── contact.json
└── uploads/
    └── profile/
```

## Architecture
5 public pages + 5 admin pages. All editable content is stored in JSON. No database, framework, Node.js, React, Tailwind or Bootstrap.

## Admin
`/admin/` uses PHP sessions. Set the server environment variable `ADMIN_PASSWORD` to a strong password. If it is not set, the development fallback is `CHANGE-ME-NOW` and must be changed before production.

## Content
Replace all placeholder values with verified doctor information. Upload the professional portrait to `uploads/profile/doctor.jpg` and add certificates/publications only when the real material is available.

## Current status
**Core 10-page architecture created. Content population, real assets, SEO metadata and final visual refinement remain.**
