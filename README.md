# JAHONGIRNEURO.UZ — MASTER AI AGENT INSTRUCTION

## MAQSAD
`jahongirneuro.uz` — shifokorning premium professional portfolio sayti. Yo‘nalish: **Identity → Expertise → Evidence → Trust → Contact**. Tibbiy yoki professional faktlar hech qachon o‘ylab topilmaydi.

## TEXNOLOGIYA — QAT’IY
Faqat PHP 8.x + HTML5 + CSS3 + Vanilla JS + JSON + Apache. React/Vue/Angular/Node/npm/Tailwind/Bootstrap/Laravel/WordPress/MySQL yo‘q.

## STRUKTURA
```text
jahongirneuro.uz/
├── index.php
├── about.php
├── services.php
├── portfolio.php
├── contact.php
├── admin/index.php              # YAGONA ADMIN PANEL
├── data/
│   ├── site.json
│   ├── about.json
│   ├── services.json
│   ├── portfolio.json
│   ├── requests.json
│   └── media.json
├── media/images/
├── media/videos/
└── README.md
```

## DIZAYN
Apple-inspired premium minimalism + modern medical personal brand. Yorqin oq/kulrang canvas, premium yashil accent `#0F5C4D`, `#174F45`, `#E3EEEA`; kuchli typography, whitespace, layered depth, restrained glass, no neon/cyberpunk, no visual clutter. Responsive va reduced-motion.

## ADMIN — `/admin/index.php`
Bitta PHP fayl ichida Dashboard, Site/Doktor, About, Services, Portfolio, So‘rovlar, Media va Settings mavjud.

### HOZIR TAYYOR
- [x] Session authentication: server `ADMIN_PASSWORD` environment variable.
- [x] Session regeneration.
- [x] CSRF token — barcha state-changing POST actionlarda.
- [x] JSON read/write + `LOCK_EX`.
- [x] Dashboard metrics.
- [x] Site/Doktor editor: identity, contacts, hero, social va SEO fields.
- [x] About editor: biography + education/experience/achievements JSON arrays.
- [x] Services full item CRUD: create/edit/delete, title, category, description, image, order, publish/draft.
- [x] Portfolio full item CRUD: create/edit/delete, title, category, description, date, link, image, video, order, publish/draft.
- [x] Requests list/detail data, status workflow: `new/read/contacted/completed/archived`, delete.
- [x] Media upload: image/video, generated filename, MIME validation, size limits.
- [x] Media metadata JSON store with alt text.
- [x] Media preview va delete.
- [x] Output escaping.
- [x] Path traversal uchun `basename()` media delete.
- [x] Production passwordni GitHub'ga yozmaslik qoidasi.

## MEDIA QOIDALARI
Images max 10MB; videos max 50MB. Actual MIME server-side `finfo` bilan tekshiriladi. Fayl nomi random generated. Media `media/images/` yoki `media/videos/` ichida saqlanadi. `data/media.json` metadata uchun.

## SECURITY
Productionda `ADMIN_PASSWORD` environment variable majburiy. Default/demo password ishlatilmasin. JSON write `LOCK_EX`, output `htmlspecialchars`, CSRF token, MIME/size validation va generated filenames ishlatiladi. Media papkalarida PHP script execution hosting konfiguratsiyasi orqali bloklanishi kerak.

## AI AGENT PROTOKOLI
README'ni to‘liq o‘qi → repositoryni tekshir → mavjud kod/JSON/media ni o‘qi → README'dagi statusni tekshir → faqat qolgan ishni bajar → syntax/logicni tekshir → README statusini **eski statusni o‘chirib yangilab** yoz → commit qil. Tayyor bo‘lmagan narsani `[x]` qilma. Ishlayotgan kodni sababsiz qayta yozma. Yangi admin PHP sahifa yaratma.

# CURRENT DEVELOPMENT STATUS

**Phase:** 05 — Final Security / QA

### Public
- [x] `index.php`
- [x] `about.php`
- [x] `services.php`
- [x] `portfolio.php`
- [x] `contact.php`

### CMS
- [x] Single admin panel
- [x] Authentication foundation
- [x] CSRF
- [x] Site editor
- [x] About editor
- [x] Services CRUD
- [x] Portfolio CRUD
- [x] Requests management
- [x] Media upload/delete/metadata

### NEXT EXACT EXECUTION ORDER
1. PHP syntax audit: all 6 PHP entry points.
2. JSON integrity audit: every `data/*.json`.
3. Fix media upload form/enctype and verify real server upload behavior.
4. Add/verify media-directory PHP execution protection (`.htaccess` or equivalent Apache configuration).
5. Verify all public pages consume admin-edited JSON fields correctly.
6. Accessibility + responsive + performance audit.
7. Security audit: session cookie flags, login rate limiting, CSRF, upload handling, path traversal, headers.
8. Final repository audit and update this README with the actual final state.

## DEFINITION OF DONE
5 public pages + one admin panel + complete JSON CRUD + requests + secure media + responsive/accessibility/SEO/security QA are actually verified. No fake data, no duplicate admin pages, no forbidden frameworks.
