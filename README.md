# jahongirneuro.uz

> **Personal professional portfolio website for a doctor.**

A lightweight, premium, bright medical portfolio focused on **professional identity, expertise, academic credibility, verified achievements and appointment/contact conversion**.

The project is intentionally small: **5 public pages + 5 admin pages**, JSON-driven content, PHP 8.x and no framework overhead.

---

## 1. PROJECT GOAL

The website is a **doctor's personal professional identity**, not a generic clinic template.

The visitor journey must be:

**Who is the doctor? → What does the doctor specialize in? → What proves the expertise? → How can I contact/book?**

The site must communicate:

- professional authority
- medical expertise
- education and experience
- research and publications
- certificates and achievements
- trust
- clear appointment/contact action

Do not turn the project into a large hospital/clinic portal.

---

## 2. NON-NEGOTIABLE TECH STACK

Use only:

- **PHP 8.x**
- **HTML5**
- **CSS3**
- **Vanilla JavaScript** only when needed
- **JSON** for editable content
- **Apache**

### Explicitly prohibited

- React
- Next.js
- Vue
- Angular
- Node.js / npm build systems
- Tailwind CSS
- Bootstrap
- Laravel
- WordPress
- PHP frameworks
- MySQL/database for the portfolio content
- unnecessary third-party UI libraries

The website must remain deployable on ordinary PHP + Apache hosting.

---

## 3. DESIGN DIRECTION

### Visual language

**Apple-inspired premium minimalism + modern medical professionalism.**

Required characteristics:

- bright/light interface
- white and very light neutral surfaces
- premium medical accent color
- strong typography
- generous whitespace
- precise grid and alignment
- subtle glass effects where useful
- layered depth without visual noise
- refined borders and soft shadows
- restrained micro-interactions
- smooth but lightweight motion
- excellent mobile presentation

### Avoid completely

- dark-first design
- black cyberpunk aesthetic
- neon overload
- excessive gradients
- generic Bootstrap-like cards
- template-looking layouts
- excessive animation
- unnecessary decorative elements
- visual clutter

The design should feel **expensive, calm, precise and trustworthy**.

---

## 4. LANGUAGE & CONTENT

Primary UI/content language:

**Uzbek — Latin alphabet.**

Tone:

- professional
- concise
- medically credible
- respectful
- understandable to patients

Do not invent medical credentials, publications, patient numbers, awards, certificates or clinical outcomes.

Until real information is supplied, use clearly identifiable placeholders rather than fake claims.

All professional claims must be based on verified information supplied by the doctor.

---

## 5. FINAL SITE MAP

```text
/
├── index.php                         # Public: Home
│
├── about/
│   └── index.php                     # Public: About doctor
│
├── expertise/
│   └── index.php                     # Public: Expertise & activity
│
├── research/
│   └── index.php                     # Public: Research & achievements
│
├── contact/
│   └── index.php                     # Public: Contact & appointment
│
├── admin/
│   ├── index.php                     # Admin dashboard
│   ├── about/
│   │   └── index.php                 # Admin: About
│   ├── expertise/
│   │   └── index.php                 # Admin: Expertise
│   ├── research/
│   │   └── index.php                 # Admin: Research
│   └── contact/
│       └── index.php                  # Admin: Contact
│
├── data/
│   ├── doctor.json
│   ├── about.json
│   ├── expertise.json
│   ├── research.json
│   └── contact.json
│
└── uploads/
    └── profile/
```

### Page count

- **5 public pages**
- **5 admin pages**
- **5 JSON content files**
- **1 upload area**
- **No database**

Do not add new public pages unless the project specification is deliberately changed.

---

## 6. PUBLIC PAGES

### `/` — Home

Purpose: first impression, identity, trust and conversion.

Content:

- doctor name
- professional title/specialty
- professional portrait
- short positioning statement
- key statistics when verified
- primary expertise
- short biography
- selected research/achievements
- clinic/location summary
- appointment CTA

Primary action:

**Qabulga yozilish**

---

### `/about/` — Doctor haqida

Purpose: professional biography and career credibility.

Content:

- full professional biography
- education
- career timeline
- current position
- previous positions
- professional philosophy
- languages
- professional memberships when available

---

### `/expertise/` — Mutaxassislik va faoliyat

Purpose: explain exactly what the doctor specializes in.

Content:

- main specialties
- clinical areas
- conditions/areas of expertise
- procedures or professional activities where appropriate
- professional skills
- relevant certifications
- professional organizations

Do not present unverified services as available services.

---

### `/research/` — Ilmiy ishlar va yutuqlar

Purpose: demonstrate academic and professional authority.

Content:

- research areas
- publications
- scientific projects
- conferences/presentations
- awards
- professional achievements
- selected media appearances when verified

Publication data should preserve real title, authors, journal/source, year and identifiers/links when available.

---

### `/contact/` — Aloqa va qabul

Purpose: convert interest into a real contact/appointment.

Content:

- clinic/location information
- phone
- email
- social/contact channels when verified
- working hours
- appointment form
- map/location link when available
- clear non-emergency notice

Do not collect unnecessary sensitive medical information through a basic public form.

---

## 7. ADMIN PANEL

### `/admin/`

Dashboard should provide a compact overview of:

- profile/content status
- available content sections
- latest changes where implemented
- contact/appointment information
- upload status

### `/admin/about/`

Manage:

- biography
- education
- experience
- positions
- philosophy
- languages
- memberships

### `/admin/expertise/`

Manage:

- specialties
- expertise items
- clinical/professional activities
- certifications related to expertise

### `/admin/research/`

Manage:

- research
- publications
- conferences
- achievements
- awards
- media

### `/admin/contact/`

Manage:

- phone
- email
- addresses
- working hours
- social links
- appointment/contact settings

---

## 8. JSON DATA ARCHITECTURE

Each public section reads its data from JSON.

```text
data/
├── doctor.json       # identity, title, portrait, stats, short bio
├── about.json        # biography, education, experience, philosophy
├── expertise.json    # specialties and professional activity
├── research.json     # research, publications, achievements, media
└── contact.json      # locations, contact details, appointment data
```

### Rules

- JSON must remain valid UTF-8.
- Use consistent field names.
- Do not duplicate the same fact unnecessarily across files.
- Public pages must safely handle missing optional fields.
- Invalid JSON must not produce raw PHP warnings to visitors.
- Escape output with `htmlspecialchars()` or an equivalent safe helper.

---

## 9. UPLOADS

Current upload root:

```text
uploads/
└── profile/
```

The upload architecture may be expanded only when the related real content-management feature is implemented.

Recommended future categories, only when actually needed:

```text
uploads/
├── profile/
├── certificates/
├── publications/
├── awards/
└── gallery/
```

### Upload security

Uploads must eventually enforce:

- allowed MIME types/extensions
- maximum file size
- generated/controlled filenames
- path traversal protection
- executable-file prevention
- server-side validation
- safe storage permissions

Never trust the original filename or client-provided MIME type.

---

## 10. SECURITY REQUIREMENTS

Security is part of the core implementation, not an optional polish step.

### Admin

- PHP session authentication
- strong production password
- secure session configuration
- login protection
- no hard-coded production secrets
- no password stored in public JSON

### Forms

- server-side validation
- CSRF protection where state-changing forms are implemented
- output escaping
- safe error handling
- rate limiting/abuse protection where appropriate

### Files

- validate uploads server-side
- prevent PHP/script execution in upload directories
- prevent directory traversal
- never expose secrets through JSON or source files

---

## 11. ADMIN PASSWORD

The admin currently supports the server environment variable:

```text
ADMIN_PASSWORD
```

### Production requirement

Set a strong unique password through the hosting/server environment.

The development fallback:

```text
CHANGE-ME-NOW
```

**MUST NOT be used in production.**

Do not commit real passwords, API keys or other secrets to GitHub.

---

## 12. PERFORMANCE

The site should remain lightweight.

Priorities:

1. minimal HTTP requests
2. optimized images
3. no unnecessary libraries
4. no framework bundle
5. lightweight JavaScript
6. lazy loading for non-critical images
7. correct image dimensions
8. efficient CSS
9. cache-friendly static assets
10. fast first contentful rendering

Do not sacrifice performance for decorative animation.

---

## 13. ACCESSIBILITY

Required baseline:

- semantic HTML5
- logical heading hierarchy
- keyboard-accessible navigation
- visible focus states
- meaningful image `alt` text
- sufficient text/background contrast
- accessible forms and labels
- reduced-motion consideration
- mobile-friendly touch targets

Accessibility is part of the final quality bar.

---

## 14. SEO

Each public page should have:

- unique `<title>`
- unique meta description
- canonical URL when appropriate
- semantic headings
- descriptive image alt text
- Open Graph metadata where useful
- clean URLs
- structured internal links

Doctor identity, specialty and location should be represented accurately in metadata when real information is available.

Do not use fabricated reviews, credentials or structured data.

---

## 15. MEDICAL CONTENT RULES

This is a professional medical portfolio.

Therefore:

- no fabricated medical claims
- no guaranteed treatment outcomes
- no fake patient statistics
- no invented awards
- no invented publications
- no misleading before/after claims
- no identifiable patient material without appropriate authorization
- educational information must not be presented as individualized diagnosis
- appointment/contact pages must not imply emergency response

The portfolio communicates the doctor's verified professional profile; it is not a substitute for medical evaluation.

---

## 16. DESIGN QUALITY BAR

Every page must be evaluated against these principles:

### Typography

- strong hierarchy
- restrained font sizes
- readable body text
- professional medical tone

### Layout

- consistent container width
- intentional whitespace
- clear visual rhythm
- no overcrowded sections

### Components

- consistent radius
- consistent borders
- consistent shadows
- consistent buttons
- consistent interaction states

### Motion

- subtle
- purposeful
- fast
- never distracting

### Responsive

Desktop, tablet and mobile must be designed deliberately rather than simply squeezed into a smaller viewport.

---

## 17. DEVELOPMENT RULES

Before changing code:

1. Read this README completely.
2. Read **CURRENT DEVELOPMENT STATUS**.
3. Read **NEXT EXECUTION ORDER**.
4. Audit the existing implementation.
5. Reuse working code.
6. Do not rewrite completed features without a reason.
7. Make the smallest coherent change required for the current milestone.
8. Test affected pages.
9. Update this README before finishing the milestone.
10. Record exactly where development stopped.

### Important

Do not continue from assumptions.

The README is the project's continuation contract between development sessions.

---

# 18. CURRENT DEVELOPMENT STATUS

**Last updated:** 2026-08-14

### Completed

- [x] Repository audited at the top-level structure
- [x] 5-page public architecture established
- [x] 5-page admin architecture established
- [x] JSON-driven content architecture established
- [x] `data/` structure established
- [x] `uploads/` structure established
- [x] Public homepage rebuilt around the portfolio architecture
- [x] README converted into the project's master specification

### In progress

- [ ] Complete/verify all public page implementations
- [ ] Complete/verify all admin editors
- [ ] Finalize JSON schemas and real content
- [ ] Finalize upload handling and security
- [ ] Final visual refinement

### Not yet complete

- [ ] Real doctor information
- [ ] Real portrait/assets
- [ ] Real certificates/publications
- [ ] Production admin password configuration
- [ ] Full SEO metadata
- [ ] Final accessibility audit
- [ ] Final performance audit
- [ ] Production security audit

---

# 19. NEXT EXECUTION ORDER

Execute strictly in this order unless a blocker requires otherwise.

### PHASE 01 — Architecture audit

- inspect every current file
- verify routes
- verify JSON loading
- verify admin authentication
- identify duplicate/unused files
- remove only genuinely unnecessary files

### PHASE 02 — Public pages

Complete and polish:

1. `/`
2. `/about/`
3. `/expertise/`
4. `/research/`
5. `/contact/`

All pages must share one coherent visual system.

### PHASE 03 — Admin

Complete and polish:

1. `/admin/`
2. `/admin/about/`
3. `/admin/expertise/`
4. `/admin/research/`
5. `/admin/contact/`

Admin should edit the existing JSON data rather than introducing a database.

### PHASE 04 — Data & uploads

- finalize JSON schemas
- validate JSON on read/write
- implement secure upload handling where required
- connect real assets

### PHASE 05 — Quality

- responsive audit
- accessibility audit
- security audit
- SEO audit
- performance audit
- broken-link check
- empty-data/error-state check

### PHASE 06 — Finalization

- replace every placeholder
- verify every professional claim
- verify contact details
- verify all images
- remove development fallback configuration
- update README
- record final completion state

---

# 20. DEFINITION OF DONE

The project is not considered complete until:

- all 5 public pages work
- all 5 admin pages work
- JSON content can be safely edited
- admin authentication works securely
- uploads are validated
- no fake professional information remains
- all navigation links work
- mobile layout is polished
- desktop layout is polished
- accessibility baseline passes
- SEO metadata is complete
- performance is acceptable
- no unnecessary files remain
- production secrets are not committed
- README accurately describes the final state

---

# 21. CONTINUATION POINT

At the end of every development session, update this section.

```text
CURRENT STEP:
[write exact task]

FILES CHANGED:
[list exact files]

COMPLETED:
[list completed items]

REMAINING:
[list remaining items]

NEXT ACTION:
[one exact next implementation step]

LAST COMMIT:
[commit hash]
```

The next development session must start from this section and then verify the actual repository state before editing.

---

# 22. PROJECT PRINCIPLE

> **Less code. Better architecture. Better design. Real information. Zero unnecessary complexity.**

The final result should feel like a **premium personal medical portfolio**, not a template and not a full clinic-management system.

**Identity → Expertise → Evidence → Trust → Contact.**
