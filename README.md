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
├── includes/
│   ├── app.php
│   └── components.php
├── assets/
│   ├── css/app.css
│   └── js/app.js
├── admin/index.php
├── data/
│   ├── site.json
│   ├── doctor.json
│   ├── about.json
│   ├── services.json
│   ├── expertise.json
│   ├── research.json
│   ├── portfolio.json
│   ├── requests.json
│   └── media.json
├── media/images/
├── media/videos/
├── uploads/
└── README.md
```

## DIZAYN
Apple-inspired premium medical personal brand. Yorqin white/soft-gray canvas, `#0F5C4D`, `#174F45`, `#E3EEEA`; kuchli typography, whitespace, layered depth, restrained glass, cinematic portrait, subtle motion va premium interaction. Neon/cyberpunk, ortiqcha gradient, visual clutter va template ko‘rinishi taqiqlanadi.

## ARXITEKTURA
Public sahifalar umumiy `includes/app.php` va `includes/components.php` orqali JSON ma’lumotlarini oladi. Barcha public sahifalar bitta `assets/css/app.css` design system va bitta `assets/js/app.js` interaction qatlamidan foydalanadi. Takroriy page-specific CSS/JS yozilmaydi.

## RESPONSIVE — QAT’IY
Desktop, laptop, tablet va mobile alohida kompozitsiya sifatida ishlashi shart. 320–380px ham tekshiriladi. Horizontal overflow bo‘lmasin. Gridlar to‘g‘ri collapse bo‘lsin. Formlar mobileda bir ustun. Sticky/fixed elementlar safe-area bilan mos. Hover mobilga bog‘liq bo‘lmasin. `prefers-reduced-motion:reduce` qo‘llansin.

## ADMIN — `/admin/index.php`
Bitta PHP fayl ichida Dashboard, Site/Doktor, About, Services, Portfolio, So‘rovlar, Media va Settings mavjud. Authentication `ADMIN_PASSWORD` environment variable orqali ishlaydi. CSRF, session regeneration, JSON `LOCK_EX`, output escaping, MIME/size validation va path traversal himoyasi saqlanadi.

## REAL MEDIA
Original `uploads/` fayllari o‘zgartirilmaydi. `data/media.json` markaziy media manifest hisoblanadi. Portfolio manifestdagi media elementlarini category filter bilan ko‘rsatadi. JPG/PNG/WebP native render qilinadi; MOV native HTML5 video sifatida ko‘rsatiladi; HEIC/HEIF uchun browser preview konvertatsiyasi va original fayl fallback mavjud. Repositorydagi real media soni **manifest asosida** hisoblanadi — hozirgi branchda `data/media.json` 4 ta yozuvni o‘z ichiga oladi. fileciteturn29file0L1-L5

## AI AGENT PROTOKOLI
README'ni to‘liq o‘qi → repositoryni tekshir → mavjud JSON/media/admin logikasini o‘qi → tayyor ishlayotgan backendni sababsiz buzma → dizayn va arxitekturani umumiy system orqali boshqar → syntax/logicni tekshir → README statusini fakt asosida yangila → commit qil.

# CURRENT DEVELOPMENT STATUS

**Phase:** 07 — Full Public UI Rebuild / Premium Medical Design

### PUBLIC
- [x] `index.php` — editorial hero + portrait + stats + expertise + evidence + contact CTA
- [x] `about.php` — identity, philosophy, experience, education
- [x] `services.php` — expertise cards va clinical philosophy
- [x] `portfolio.php` — real media archive + filters
- [x] `contact.php` — secure JSON request flow
- [x] Shared public components
- [x] Shared responsive design system
- [x] Shared mobile navigation
- [x] Shared HEIC/MOV media handling restored

### CMS
- [x] Single `/admin/index.php`
- [x] Authentication foundation
- [x] CSRF
- [x] JSON CRUD foundation
- [x] Requests workflow
- [x] Media upload/delete foundation

### VERIFIED / NOT YET VERIFIED
- [x] Repository structure inspected
- [x] Public architecture rebuilt
- [x] Original media manifest preserved
- [x] HEIC/MOV handling retained in shared component layer
- [ ] PHP runtime syntax audit
- [ ] JSON integrity audit
- [ ] Physical media-path audit
- [ ] Target hosting rendering QA
- [ ] Admin upload/delete live QA
- [ ] Responsive browser QA
- [ ] Accessibility/performance audit
- [ ] Production security audit

## NEXT EXACT EXECUTION ORDER
1. PHP syntax audit — barcha public va admin PHP entry pointlar.
2. JSON integrity audit — barcha `data/*.json`.
3. `data/media.json` yo‘llarini repositorydagi real fayllar bilan solishtirish.
4. Target hostingda public rendering tekshiruvi.
5. Admin upload/delete va `enctype` tekshiruvi.
6. Admin orqali o‘zgartirilgan JSON fieldlar public sahifalarda aks etishini tekshirish.
7. Responsive QA: 320/360/390/430/768/1024/1440px.
8. Accessibility + performance audit.
9. Security audit: session cookie flags, login rate limiting, CSRF, upload MIME/size, path traversal, security headers.
10. Final repository audit va README statusini real natija bilan yangilash.

## DEFINITION OF DONE
5 public pages + one admin panel + complete JSON CRUD + requests + secure media + real uploaded media + responsive/accessibility/SEO/security QA amalda tekshirilgan bo‘lishi kerak. Forbidden frameworks ishlatilmaydi. Fake medical data qo‘shilmaydi.
