# JAHONGIRNEURO.UZ — MASTER AI AGENT INSTRUCTION

> READ THIS README COMPLETELY BEFORE CODING. This file is the project's single source of truth, development memory and execution contract.

## 1. PROJECT PURPOSE

`jahongirneuro.uz` is a **personal professional portfolio website for a doctor**, not a generic clinic or hospital portal.

Visitor journey:

**Who is the doctor? → What is the expertise? → What proves the expertise? → How can I contact/request an appointment?**

The site must communicate professional identity, medical expertise, education, experience, research, publications, certificates, achievements, trust and a clear contact action.

Never invent medical credentials, publications, awards, patient numbers, outcomes or other professional claims.

## 2. TECHNOLOGY — NON-NEGOTIABLE

Use only:
- PHP 8.x
- HTML5
- CSS3
- Vanilla JavaScript
- JSON
- Apache

Prohibited:
- React / Next.js / Vue / Angular
- Node.js / npm build systems
- Tailwind / Bootstrap
- Laravel / WordPress / PHP frameworks
- MySQL/database for content
- unnecessary third-party UI libraries

Keep the project deployable on ordinary PHP + Apache hosting.

## 3. FINAL STRUCTURE

```text
jahongirneuro.uz/
│
├── index.php
├── about.php
├── services.php
├── portfolio.php
├── contact.php
│
├── admin/
│   └── index.php                 # SINGLE ADMIN PANEL
│
├── data/
│   ├── site.json
│   ├── about.json
│   ├── services.json
│   ├── portfolio.json
│   └── requests.json
│
├── media/
│   ├── images/
│   └── videos/
│
└── README.md
```

### CRITICAL ARCHITECTURE RULE

There is **ONE and ONLY ONE admin panel**: `/admin/index.php`.

Do NOT create `admin/about.php`, `admin/media.php`, `admin/requests.php` or separate admin directories. All management functions are internal sections/tabs/views of the single admin page.

Do not introduce new public pages unless this README is deliberately changed.

## 4. PUBLIC PAGES

### `/index.php` — HOME
First impression, identity, trust and conversion.

Recommended flow:
1. minimal navigation
2. doctor hero/identity
3. positioning statement
4. verified statistics
5. expertise preview
6. biography preview
7. selected research/achievements/media
8. credibility/trust
9. appointment CTA
10. footer

The doctor's portrait is a major visual element. Never put important text over the doctor's face.

### `/about.php` — ABOUT
Biography, education, career timeline, current/previous positions, professional philosophy, languages, memberships and verified achievements.

### `/services.php` — EXPERTISE / SERVICES
Specialties, areas of expertise, professional activities, verified procedures/services, relevant certifications and concise explanations. Never invent services.

### `/portfolio.php` — PORTFOLIO / RESEARCH / ACHIEVEMENTS
Research, publications, scientific projects, conferences, presentations, certificates, awards, achievements and verified professional media. Preserve real publication title, authors, source, year and identifiers/links when available.

### `/contact.php` — CONTACT / APPOINTMENT
Phone, email, address, working hours, verified social/contact channels, appointment/contact form, map/location and CTA. Do not request unnecessary sensitive medical information.

## 5. SINGLE ADMIN PANEL — `/admin/index.php`

The admin is the central control room of the website.

Internal sections:

```text
Dashboard
Site / Doctor
About
Services
Portfolio
Requests
Media
Settings
```

These are **sections inside one `admin/index.php`**, never separate admin files.

### Dashboard
Show:
- total requests
- unread/new requests
- total media
- published services
- portfolio item count
- latest requests
- latest media
- basic site status

Keep it functional, fast and simple.

### Site / Doctor
Manage `data/site.json`:
- doctor name
- professional title
- specialty
- positioning statement
- hero/profile image
- logo/favicon when used
- phone/email/address
- working hours
- Telegram/Instagram/other verified links
- SEO title/description
- global accent/settings

### About
Manage `data/about.json`:
- biography
- education
- experience
- career timeline
- positions
- philosophy
- languages
- memberships
- achievements

### Services
Manage `data/services.json`:
- create/edit/delete
- publish/unpublish
- order
- title
- description
- category
- image

### Portfolio
Manage `data/portfolio.json`:
- create/edit/delete
- publish/unpublish
- order
- title
- description
- category
- date/year
- source/link
- cover image
- gallery media
- video

### Requests — CORE REQUIREMENT
All public contact/appointment submissions must be stored in `data/requests.json`.

Each request should contain:
- unique ID
- name
- phone
- email if collected
- message/reason
- created date/time
- status

Statuses:
`new`, `read`, `contacted`, `completed`, `archived`

Admin actions:
- open
- mark read
- mark contacted
- mark completed
- archive
- delete

Unread requests must be clearly visible on the dashboard.

### Media — CORE REQUIREMENT
One central media manager inside `/admin/index.php`.

Admin must be able to:
- upload image
- upload video
- preview
- replace
- delete
- see filename/type
- set image alt text
- choose media for hero/background/portfolio/etc.

Storage:

```text
media/images/
media/videos/
```

The admin should make it obvious **what a file is and where it is used**.

### Settings
Settings remain inside the same admin panel and update global/site data. Do not create `admin/settings.php`.

## 6. JSON ARCHITECTURE

```text
data/site.json
 data/about.json
 data/services.json
 data/portfolio.json
 data/requests.json
```

Rules:
- valid UTF-8
- predictable fields
- preserve unrelated records on edit
- validate before write
- use file locking for writes where appropriate
- handle missing/empty/invalid data gracefully
- never expose raw PHP warnings to visitors
- escape rendered values with `htmlspecialchars()` or a safe helper
- do not hard-code editable content into templates

## 7. MEDIA SECURITY

Uploads require server-side validation of extension, actual MIME type, size, filename and destination.

Use generated safe filenames. Never trust client MIME, original filename or user-supplied paths. Prevent path traversal and PHP/script execution in media directories.

## 8. ADMIN SECURITY

Protect `/admin/index.php` with PHP session authentication.

Production credentials must not be stored in JSON or committed to GitHub.

Preferred server configuration:

```text
ADMIN_PASSWORD
```

Use secure session handling. Unauthenticated visitors must never access admin data/actions.

## 9. CONTACT FORM SECURITY

Use server-side validation, CSRF protection, output escaping, safe JSON writing, graceful errors and basic abuse/rate protection where practical. Browser validation alone is never sufficient.

## 10. DESIGN DIRECTION

**Apple-inspired premium minimalism + modern medical personal brand.**

The website must feel bright, expensive, calm, precise, human and trustworthy.

### Visual rules
- open white / very light gray canvas
- **premium green is the primary accent**
- strong editorial typography
- generous whitespace
- precise alignment
- layered depth
- subtle glass only where useful
- refined borders and soft shadows
- restrained micro-interactions
- smooth lightweight motion

Current primary green direction:

```css
--medical-accent: #0F5C4D;
--medical-accent-deep: #174F45;
--accent-soft: #E3EEEA;
--accent-pale: #EEF5F1;
```

Green must feel **medical, premium and natural**, not neon or cyberpunk.

The page is an open canvas. Use typography, photography, editorial blocks, large image compositions, restrained glass, statistics, timelines, profile blocks, media compositions and CTA. Do not turn every section into a rounded card.

Motion: fade, reveal, translate, scale, blur, parallax and subtle hover/focus transitions. Support `prefers-reduced-motion`. No distracting infinite effects.

## 11. RESPONSIVE

Desktop, tablet and mobile must be intentionally composed, not simply scaled down.

Mobile priorities:
1. identity
2. portrait
3. typography
4. primary CTA
5. navigation
6. readability

## 12. MEDICAL CONTENT SAFETY

Never fabricate degrees, titles, years of experience, publications, awards, certificates, patient statistics, treatment outcomes, testimonials or medical claims. Use verified supplied information or explicit development placeholders.

Do not expose identifiable patient information without authorization. This is a professional portfolio, not a substitute for medical evaluation or emergency service.

## 13. SEO / ACCESSIBILITY / PERFORMANCE

Public pages require unique title, meta description, semantic headings, meaningful alt text, clean navigation and appropriate Open Graph metadata.

Accessibility: semantic HTML, keyboard navigation, visible focus, form labels, sufficient contrast, reduced-motion support and usable touch targets.

Performance: optimized images, lazy loading for non-critical media, minimal JS, no unnecessary libraries and efficient CSS.

## 14. AI AGENT EXECUTION PROTOCOL — MANDATORY

Before writing code:

1. Read this README completely.
2. Read `CURRENT DEVELOPMENT STATUS`.
3. Read `NEXT EXECUTION ORDER`.
4. Inspect the actual repository tree.
5. Inspect every relevant existing file, JSON and media asset.
6. Determine what is already complete.
7. Continue from the exact documented next step.

Workflow:

**Inspect → Plan → Implement → Verify → Update README → Commit.**

Never:
- blindly rewrite the repository
- delete working functionality without reason
- create duplicate admin pages
- introduce frameworks or a database
- hard-code editable content
- invent medical information
- claim completion without verification

Make one coherent milestone at a time.

## 15. README CONTINUATION PROTOCOL — MANDATORY

This README is persistent development memory.

After every meaningful milestone, replace the old `CURRENT DEVELOPMENT STATUS` with the current truth. Do not append contradictory history.

Record:
- completed work
- files changed
- current phase
- remaining work
- exact next action
- known issues
- last commit

A new AI agent must understand where to continue without asking the previous agent what happened.

# 16. CURRENT DEVELOPMENT STATUS

**Phase:** 02 — Premium Homepage Implementation

### Completed
- [x] 5 public-page architecture defined
- [x] single `/admin/index.php` architecture defined
- [x] request management defined
- [x] central media management defined
- [x] JSON content architecture defined
- [x] PHP + HTML + CSS + Vanilla JS + JSON + Apache confirmed
- [x] premium light medical design direction defined
- [x] **premium green accent direction implemented**
- [x] homepage visual system implemented in `index.php`
- [x] responsive homepage layout implemented
- [x] reduced-motion support implemented
- [x] public navigation paths corrected to the actual PHP pages
- [x] homepage data loading and output escaping retained

### Current state
`index.php` now contains the first premium homepage implementation: floating glass navigation, large editorial doctor hero, green medical accent system, portrait area, verified-data stats, biography preview, expertise preview, research preview, contact CTA and responsive layouts.

The current homepage uses the existing JSON sources `doctor.json`, `about.json`, `expertise.json`, `research.json` and `contact.json`. The portrait path is prepared for `media/images/doctor.jpg`; if it is not present, the page shows a controlled placeholder instead of a broken image.

### Important implementation note
The repository's current data files still contain development placeholder content in some fields. Do not present those placeholders as verified real-world claims when polishing production content.

### Next exact execution step
1. Inspect the rendered homepage and existing media assets.
2. Refine `index.php` only where the visual result needs improvement.
3. Do not create the full admin yet.
4. After homepage visual approval, implement `about.php` as the next public page.
5. Update this README again after that milestone.

### After homepage approval
1. `about.php`
2. `services.php`
3. `portfolio.php`
4. `contact.php`
5. single `/admin/index.php`
6. JSON editing
7. requests management
8. media upload/manager
9. security hardening
10. SEO/accessibility/performance QA

## 17. DEFINITION OF DONE

A milestone is complete only when:
- intended code exists
- PHP syntax is valid
- page renders
- responsive behavior is considered
- JSON reads/writes correctly where applicable
- existing functionality is preserved
- no obvious PHP/JS errors remain
- media paths work
- security requirements are respected
- design matches this README
- README status is updated
- next exact step is documented

The whole project is complete only when all 5 public pages, the **single admin panel**, JSON editing, requests, media management and final QA are complete.

## 18. END-OF-SESSION REPORT

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
