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
Apple-inspired premium minimalism + modern medical personal brand. Yorqin oq/kulrang canvas, premium yashil accent `#0F5C4D`, `#174F45`, `#E3EEEA`; kuchli typography, whitespace, layered depth, restrained glass, no neon/cyberpunk, no visual clutter.

## RESPONSIVE — QAT’IY STANDART
Barcha public sahifalar va `/admin/index.php` desktop, laptop, tablet va mobile uchun alohida kompozitsiya sifatida ishlashi shart.

- Mobile-first breakpoints: <=980px, <=700px, <=560px va <=380px zarur joylarda.
- Horizontal overflow, kesilgan matn, ekran tashqarisiga chiqadigan tugma/form/card bo‘lmasin.
- `100vw` sababli gorizontal scrollbar paydo qilinmasin.
- Nav mobileda ixcham bo‘lsin; desktop linklar kerak bo‘lsa yashirilib CTA saqlansin.
- Gridlar 3/2 ustundan 1 ustunga to‘g‘ri collapse bo‘lsin.
- Formlar mobileda bir ustun bo‘lsin; input/button kamida qulay touch targetga ega bo‘lsin.
- Typography `clamp()`/fluid sizing bilan kichik ekranlarda ekran kengligidan oshmasin.
- Media va rasmlar `max-width:100%`, video overflow qilmasin; portrait/hero crop buzilmasin.
- Admin jadvallari kichik ekranda horizontal scroll qilinadigan konteynerda bo‘lsin.
- Sticky/fixed elementlar safe-area va mobile viewportni hisobga olsin.
- Hover mobilga bog‘liq interaction bo‘lmasin; `@media(hover:none)` bilan moslashsin.
- `prefers-reduced-motion:reduce` qo‘llansin.
- 320–380px kengliklarda ham layout buzilmasligi tekshirilsin.

## ADMIN — `/admin/index.php`
Bitta PHP fayl ichida Dashboard, Site/Doktor, About, Services, Portfolio, So‘rovlar, Media va Settings mavjud.

### HOZIR TAYYOR
- [x] Session authentication: server `ADMIN_PASSWORD` environment variable.
- [x] Session regeneration.
- [x] CSRF token — barcha state-changing POST actionlarda.
- [x] JSON read/write + `LOCK_EX`.
- [x] Dashboard metrics.
- [x] Site/Doktor editor.
- [x] About editor.
- [x] Services full item CRUD.
- [x] Portfolio full item CRUD.
- [x] Requests workflow.
- [x] Media upload/delete/metadata.
- [x] Output escaping.
- [x] Path traversal uchun `basename()` media delete.

## MEDIA QOIDALARI
Images max 10MB; videos max 50MB. Actual MIME server-side `finfo` bilan tekshiriladi. Fayl nomi random generated. Media `media/images/` yoki `media/videos/` ichida saqlanadi. `data/media.json` metadata uchun.

## SECURITY
Productionda `ADMIN_PASSWORD` environment variable majburiy. Default/demo password ishlatilmasin. JSON write `LOCK_EX`, output `htmlspecialchars`, CSRF token, MIME/size validation va generated filenames ishlatiladi. Media papkalarida PHP script execution hosting konfiguratsiyasi orqali bloklanishi kerak.

## AI AGENT PROTOKOLI
README'ni to‘liq o‘qi → repositoryni tekshir → mavjud kod/JSON/media ni o‘qi → statusni tekshir → faqat qolgan ishni bajar → syntax/logicni tekshir → README statusini **eski statusni o‘chirib yangilab** yoz → commit qil. Tayyor bo‘lmagan narsani `[x]` qilma. Ishlayotgan kodni sababsiz qayta yozma. Yangi admin PHP sahifa yaratma.

# CURRENT DEVELOPMENT STATUS

**Phase:** 05 — Final Security / QA

### Public
- [x] `index.php`
- [x] `about.php`
- [x] `services.php` — full responsive breakpoints strengthened
- [x] `portfolio.php` — existing mobile composition present
- [x] `contact.php` — existing mobile composition present

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

### RESPONSIVE STATUS
Services responsive system has been strengthened for tablet, mobile, 380px devices and touch screens. Existing responsive rules remain on index, about, portfolio, contact and admin.

### NEXT EXACT EXECUTION ORDER
1. Run PHP syntax audit on all entry points.
2. Run JSON integrity audit on every `data/*.json`.
3. Verify real media upload behavior and `enctype`.
4. Add/verify Apache media-directory PHP execution protection.
5. Verify all public pages consume admin-edited JSON fields correctly.
6. Perform responsive QA at 320/360/390/430/768/1024/1440px and fix any remaining overflow/layout issues.
7. Accessibility + performance audit.
8. Security audit: session cookie flags, login rate limiting, CSRF, upload handling, path traversal, headers.
9. Final repository audit and update this README with the actual final state.

## DEFINITION OF DONE
5 public pages + one admin panel + complete JSON CRUD + requests + secure media + responsive/accessibility/SEO/security QA are actually verified. No fake data, no duplicate admin pages, no forbidden frameworks.
