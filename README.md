# JAHONGIRNEURO.UZ — MASTER AI AGENT INSTRUCTION

> **READ THIS FILE COMPLETELY BEFORE CODING.** This README is the project's single source of truth, development memory and execution contract.

## PROJECT PURPOSE

`jahongirneuro.uz` is a **personal professional portfolio website for a doctor**, not a generic clinic or hospital portal.

Visitor journey: **Who is the doctor? → What is the expertise? → What proves the expertise? → How can I contact/request an appointment?**

Never invent medical credentials, publications, awards, patient numbers, outcomes or other professional claims.

## TECHNOLOGY — NON-NEGOTIABLE

Use only PHP 8.x, HTML5, CSS3, Vanilla JavaScript, JSON and Apache. No React, Vue, Angular, Node/npm build systems, Tailwind, Bootstrap, Laravel, WordPress, PHP frameworks or MySQL for content.

## FINAL STRUCTURE

```text
jahongirneuro.uz/
├── index.php
├── about.php
├── services.php
├── portfolio.php
├── contact.php
├── admin/
│   └── index.php                 # SINGLE ADMIN PANEL
├── data/
│   ├── site.json
│   ├── about.json
│   ├── services.json
│   ├── portfolio.json
│   └── requests.json
├── media/
│   ├── images/
│   └── videos/
└── README.md
```

**ONE and ONLY ONE admin panel:** `/admin/index.php`. Never create additional admin PHP pages.

## PUBLIC PAGES

- `/index.php` — identity, hero, trust, expertise preview, biography preview, selected evidence, media, CTA.
- `/about.php` — biography, education, career, philosophy, memberships and verified achievements.
- `/services.php` — verified expertise, professional activities and services.
- `/portfolio.php` — research, publications, conferences, certificates, awards and professional media.
- `/contact.php` — contact details, appointment/contact form and safe request submission.

Never invent medical or professional facts.

## SINGLE ADMIN PANEL — `/admin/index.php`

Sections inside the same file: Dashboard, Site / Doctor, About, Services, Portfolio, Requests, Media, Settings.

### Implemented in current admin milestone
- PHP session login using `ADMIN_PASSWORD` environment configuration.
- Dashboard metrics for requests, new requests, services and portfolio.
- Site/Doctor basic JSON editor.
- About basic JSON editor.
- Services intro editor.
- Portfolio intro editor.
- Requests list, status update and delete.
- Media image/video upload with server-side MIME and size validation.
- Image/video preview and filename listing.
- Settings explanation for environment-based admin password.

### Still required before admin milestone is complete
- CSRF protection on all state-changing admin forms.
- Full CRUD for Services items: create/edit/delete, publish/unpublish, order, category, title, description and image.
- Full CRUD for Portfolio items: create/edit/delete, publish/unpublish, order, category, title, description, year/date, source/link, cover image, gallery and video.
- Full About editor for education, experience, timeline, positions, philosophy, languages, memberships and achievements.
- Site editor for hero/profile media, social links and SEO settings.
- Media replace/delete and alt-text management.
- Media assignment to hero/background/portfolio content.
- Stronger authentication configuration and production hardening.

## JSON / SECURITY RULES

All editable content is JSON-driven. Use valid UTF-8, preserve unrelated records, validate before writes, use `LOCK_EX`, handle missing/invalid data and escape output.

Uploads must validate actual MIME, extension, size and generated filename; prevent path traversal and script execution in media directories. Never commit production credentials. Public forms need validation, CSRF protection, output escaping, safe JSON writes and basic abuse protection where practical.

## DESIGN DIRECTION

**Apple-inspired premium minimalism + modern medical personal brand.** Bright white/light-gray canvas, **premium green accent**, strong editorial typography, generous whitespace, layered depth, restrained glass, precise borders, soft shadows and subtle micro-interactions.

```css
--medical-accent:#0F5C4D;
--medical-accent-deep:#174F45;
--accent-soft:#E3EEEA;
--accent-pale:#EEF5F1;
```

Green must feel medical, premium and natural — never neon/cyberpunk. Avoid card overload, excessive gradients, clutter and noisy animation. Support `prefers-reduced-motion`.

## AI AGENT EXECUTION PROTOCOL

Before coding: **read README completely → inspect repository → inspect relevant files/JSON/media → identify exact status → plan → implement → verify → update README → commit.**

Never blindly rewrite working code, create duplicate admin pages, introduce forbidden technologies, hard-code editable content, invent facts or claim verification without actually checking.

README is persistent development memory. After every milestone replace `CURRENT DEVELOPMENT STATUS` with the current truth, including completed files, current phase, remaining work, exact next action, known issues and commit.

# CURRENT DEVELOPMENT STATUS

**Phase:** 04 — Admin Panel Implementation / Refinement

### Completed
- [x] Public architecture and 5 public PHP pages
- [x] Premium green medical design direction
- [x] `index.php`
- [x] `about.php`
- [x] `services.php`
- [x] `portfolio.php`
- [x] `contact.php`
- [x] `data/requests.json`
- [x] Single `/admin/index.php` created
- [x] Session authentication foundation
- [x] Dashboard metrics
- [x] Basic Site/About/Services/Portfolio editors
- [x] Requests status/delete management
- [x] Image/video upload with MIME and size validation
- [x] Media previews

### Current state
The single admin panel exists and is functional at a foundation level. It must now be hardened and expanded into the full JSON/media CMS described above. Do not create additional admin pages.

### Next exact execution step
1. Add CSRF tokens and validation to every state-changing admin action.
2. Complete **full Services item CRUD** inside `/admin/index.php`.
3. Complete **full Portfolio item CRUD** inside `/admin/index.php`.
4. Expand About and Site editors to all JSON-controlled fields.
5. Add media delete/replace, alt text and media assignment.
6. Verify PHP syntax and JSON integrity after each change.
7. Update README with the exact resulting state and next action.

### After Admin Refinement
1. authentication/security hardening
2. media-directory execution protection
3. SEO/accessibility/performance QA
4. complete repository audit

## DEFINITION OF DONE

Complete means: all 5 public pages, one admin panel, secure JSON editing, complete request management, secure media management, responsive design, accessibility, SEO, security and final repository QA are verified.

## FINAL PRINCIPLE

> **Identity → Expertise → Evidence → Trust → Contact.**
>
> **One website. One admin panel. JSON-driven content. Secure media. Real information. Premium green medical identity. Zero unnecessary complexity.**
