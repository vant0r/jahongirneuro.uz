# JAHONGIRNEURO.UZ — MASTER AI AGENT INSTRUCTION

> **READ THIS FILE COMPLETELY BEFORE CODING.** This README is the project's single source of truth, development memory and execution contract.

## PROJECT PURPOSE

`jahongirneuro.uz` is a **personal professional portfolio website for a doctor**, not a generic clinic or hospital portal.

Visitor journey: **Who is the doctor? → What is the expertise? → What proves the expertise? → How can I contact/request an appointment?**

The site communicates professional identity, medical expertise, education, experience, research, publications, certificates, achievements, trust and a clear contact action.

Never invent medical credentials, publications, awards, patient numbers, outcomes or other professional claims.

## TECHNOLOGY — NON-NEGOTIABLE

Use only PHP 8.x, HTML5, CSS3, Vanilla JavaScript, JSON and Apache.

Do NOT use React, Next.js, Vue, Angular, Node.js/npm build systems, Tailwind, Bootstrap, Laravel, WordPress, PHP frameworks, MySQL/database for content or unnecessary third-party UI libraries.

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
│   └── portfolio.json
│   ├── requests.json
├── media/
│   ├── images/
│   └── videos/
└── README.md
```

### CRITICAL ARCHITECTURE RULE

There is **ONE and ONLY ONE admin panel**: `/admin/index.php`.

Do NOT create separate admin pages. All management functions are internal sections/tabs/views of the single admin page.

## PUBLIC PAGES

### `/index.php` — HOME
First impression, identity, trust and conversion. Recommended flow: minimal navigation, doctor hero/identity, positioning statement, verified statistics, expertise preview, biography preview, selected research/achievements/media, credibility/trust, appointment CTA and footer. Never put important text over the doctor's face.

### `/about.php` — ABOUT
Biography, education, career timeline, current/previous positions, professional philosophy, languages, memberships and verified achievements.

### `/services.php` — EXPERTISE / SERVICES
Specialties, areas of expertise, professional activities, verified procedures/services, relevant certifications and concise explanations. Never invent services.

### `/portfolio.php` — PORTFOLIO / RESEARCH / ACHIEVEMENTS
Research, publications, scientific projects, conferences, presentations, certificates, awards, achievements and verified professional media.

### `/contact.php` — CONTACT / APPOINTMENT
Phone, email, address, working hours, verified social/contact channels, appointment/contact form, map/location and CTA. Do not request unnecessary sensitive medical information.

## SINGLE ADMIN PANEL — `/admin/index.php`

Internal sections: Dashboard, Site / Doctor, About, Services, Portfolio, Requests, Media, Settings. These are sections inside one file, never separate admin pages.

### Dashboard
Show total requests, unread/new requests, total media, published services, portfolio count, latest requests, latest media and basic site status.

### Site / Doctor
Manage global doctor identity, hero/profile media, contacts, verified social links and SEO settings.

### About
Manage biography, education, experience, career timeline, positions, philosophy, languages, memberships and achievements.

### Services
Manage `data/services.json`: create/edit/delete, publish/unpublish, order, title, description, category and image.

### Portfolio
Manage `data/portfolio.json`: create/edit/delete, publish/unpublish, order, title, description, category, date/year, source/link, cover image, gallery media and video.

### Requests — CORE REQUIREMENT
All public contact/appointment submissions are stored in `data/requests.json`.

Fields: unique ID, name, phone, email if collected, message/reason, created date/time and status.

Statuses: `new`, `read`, `contacted`, `completed`, `archived`.

Admin actions: open, mark read, mark contacted, mark completed, archive and delete. Unread requests must be clearly visible on the dashboard. Never collect/store unnecessary sensitive medical information.

### Media — CORE REQUIREMENT
One central media manager inside `/admin/index.php`. It must support image/video upload, preview, replace, delete, filename/type display, image alt text and selecting media for hero/background/portfolio/etc.

Storage: `media/images/` and `media/videos/`.

### Settings
Settings remain inside the same admin panel.

## JSON ARCHITECTURE

All editable public content is JSON-driven. Use valid UTF-8, predictable fields, preserve unrelated records, validate before writes, use file locking where appropriate, handle missing/invalid data gracefully and escape rendered output.

## MEDIA / ADMIN / FORM SECURITY

Uploads require server-side validation of extension, actual MIME type, size, filename and destination. Use generated safe filenames. Prevent path traversal and PHP/script execution in media directories.

Protect `/admin/index.php` with PHP session authentication. Production credentials must not be stored in JSON or committed to GitHub; use server configuration such as `ADMIN_PASSWORD`.

Public forms require server-side validation, CSRF protection, output escaping, safe JSON writing, graceful errors and basic abuse/rate protection where practical.

## DESIGN DIRECTION

**Apple-inspired premium minimalism + modern medical personal brand.**

The site must feel bright, expensive, calm, precise, human and trustworthy.

Visual rules: open white/light-gray canvas, **premium green as primary accent**, strong editorial typography, generous whitespace, precise alignment, layered depth, restrained glass, refined borders, soft shadows, subtle micro-interactions and smooth lightweight motion.

Green direction:

```css
--medical-accent: #0F5C4D;
--medical-accent-deep: #174F45;
--accent-soft: #E3EEEA;
--accent-pale: #EEF5F1;
```

Green must feel medical, premium and natural — never neon/cyberpunk.

Do not turn every section into a rounded card. Avoid excessive gradients, visual clutter, template layouts and noisy animation. Support `prefers-reduced-motion`.

## RESPONSIVE / MEDICAL SAFETY / QUALITY

Desktop, tablet and mobile must be intentionally composed. Use semantic HTML, keyboard navigation, visible focus, labels, sufficient contrast, meaningful alt text, unique metadata and optimized/lazy-loaded media.

Never fabricate degrees, titles, experience, publications, awards, certificates, patient statistics, outcomes, testimonials or medical claims. Use verified information or explicit development placeholders.

## AI AGENT EXECUTION PROTOCOL — MANDATORY

Before writing code:
1. Read this README completely.
2. Read `CURRENT DEVELOPMENT STATUS`.
3. Inspect the actual repository tree.
4. Inspect every relevant existing file, JSON and media asset.
5. Determine what is already complete.
6. Continue from the exact documented next step.

Workflow: **Inspect → Plan → Implement → Verify → Update README → Commit.**

Never blindly rewrite the repository, delete working functionality without reason, create duplicate admin pages, introduce frameworks/database, hard-code editable content, invent medical information or claim completion without verification.

## README CONTINUATION PROTOCOL — MANDATORY

This README is persistent development memory. After every meaningful milestone, replace the old `CURRENT DEVELOPMENT STATUS` with the current truth. Do not append contradictory old status.

Record completed work, files changed, current phase, remaining work, exact next action, known issues and last commit.

# CURRENT DEVELOPMENT STATUS

**Phase:** 03 — Public Pages Implementation

### Completed
- [x] 5 public-page architecture defined
- [x] single `/admin/index.php` architecture defined
- [x] request management defined
- [x] central media management defined
- [x] JSON content architecture defined
- [x] PHP + HTML + CSS + Vanilla JS + JSON + Apache confirmed
- [x] premium light medical design direction defined
- [x] premium green accent direction defined and applied
- [x] homepage visual system implemented in `index.php`
- [x] responsive homepage implemented
- [x] reduced-motion support implemented
- [x] public navigation paths corrected
- [x] `about.php` implemented as a premium editorial About page
- [x] About page reads existing doctor/about JSON data
- [x] `services.php` implemented as a premium editorial expertise/services page
- [x] Services page reads `data/expertise.json`
- [x] Services page uses a distinct composition instead of copying About
- [x] Services page uses the premium green medical visual system
- [x] Services page is responsive and supports reduced motion

### Current state
`index.php`, `about.php` and `services.php` are implemented as the first three designed public pages. The Services page uses the existing verified-looking project content source `data/expertise.json` and does not invent additional medical services.

### Next exact execution step
1. Inspect the existing `portfolio.php` and all relevant research/portfolio JSON files.
2. Build `portfolio.php` as a premium evidence/research/achievements page.
3. Keep the green medical design language but create a distinct editorial media/research composition.
4. Read existing JSON and media before coding.
5. Do not build the admin yet.
6. Update this README after the Portfolio milestone.

### After Portfolio
1. `contact.php`
2. single `/admin/index.php`
3. JSON editing
4. requests management
5. media upload/manager
6. security hardening
7. SEO/accessibility/performance QA

## DEFINITION OF DONE

A milestone is complete only when intended code exists, PHP syntax is valid, the page renders, responsive behavior is considered, JSON reads correctly, existing functionality is preserved, no obvious PHP/JS errors remain, media paths work, security requirements are respected, design matches this README, README status is updated and the next exact step is documented.

The whole project is complete only when all 5 public pages, the **single admin panel**, JSON editing, requests, media management and final QA are complete.

## END-OF-SESSION REPORT

```text
DONE

Completed:
- ...

Files changed:
- ...

Current phase:
- ...

Next exact step:
- ...

Known issues:
- None / ...
```

## FINAL PRINCIPLE

> **Identity → Expertise → Evidence → Trust → Contact.**
>
> **One website. One admin panel. JSON-driven content. Secure media. Real information. Premium green medical identity. Zero unnecessary complexity.**
