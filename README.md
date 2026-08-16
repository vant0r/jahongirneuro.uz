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
├── media/images/
├── media/videos/
├── uploads/
└── README.md
```

## DIZAYN
Apple-inspired premium medical personal brand. Yorqin white/soft-gray canvas, `#0F5C4D`, `#174F45`, `#E3EEEA`; kuchli typography, whitespace, layered depth, restrained glass, cinematic portrait, subtle motion va premium interaction. Neon/cyberpunk, ortiqcha gradient, visual clutter va template ko‘rinishi taqiqlanadi.

## ARXITEKTURA
Public sahifalar umumiy `includes/app.php` va `includes/components.php` orqali JSON ma’lumotlarini oladi. Barcha public sahifalar bitta design system va bitta interaction qatlamidan foydalanadi. Takroriy page-specific CSS/JS yozilmaydi.

## ADMIN
Bitta `/admin/index.php`: Dashboard, Site/Doktor, About, Services, Portfolio, So‘rovlar, Media va Settings. Authentication `ADMIN_PASSWORD` environment variable orqali ishlaydi. CSRF, session regeneration, JSON `LOCK_EX`, escaping, MIME/size validation va path traversal himoyasi talab qilinadi.

## REAL MEDIA
Original media fayllari o‘zgartirilmaydi. `data/media.json` markaziy manifest hisoblanadi. JPG/PNG/WebP native render qilinadi; MOV HTML5 video sifatida ko‘rsatiladi; HEIC/HEIF uchun preview/fallback mavjud.

# CURRENT DEVELOPMENT STATUS

**Phase:** 08 — QA / Hardening

### PUBLIC
- [x] `index.php`
- [x] `about.php`
- [x] `services.php`
- [x] `portfolio.php`
- [x] `contact.php`
- [x] Shared components
- [x] Responsive design system
- [x] Mobile navigation
- [x] Media filtering

### CMS
- [x] Single `/admin/index.php`
- [x] Authentication foundation
- [x] CSRF
- [x] JSON CRUD foundation
- [x] Requests workflow
- [x] Media upload/delete foundation

### QA
- [x] Repository structure inspected
- [x] Public architecture rebuilt
- [x] Duplicate legacy public routes removed from PR
- [x] Shared public CSS/JS architecture
- [x] Security baseline added
- [ ] PHP runtime syntax audit on target hosting
- [ ] JSON integrity audit on target hosting
- [ ] Physical media-path audit
- [ ] Admin live upload/delete QA
- [ ] Responsive browser QA
- [ ] Accessibility/performance audit
- [ ] Production security audit

## NEXT EXECUTION ORDER
1. Run PHP syntax checks on the target PHP 8.x hosting environment.
2. Validate every JSON file and expected schema.
3. Compare media manifest paths with actual files.
4. Test public rendering on target hosting.
5. Test admin login, CSRF, upload/delete and JSON persistence.
6. Test 320/360/390/430/768/1024/1440px.
7. Run accessibility, SEO and performance checks.
8. Run production security review.
9. Final diff review.
10. Mark PR Ready for Review only after target-host verification.

## DEFINITION OF DONE
5 public pages + one admin panel + JSON CRUD + requests + secure media + responsive/accessibility/SEO/security QA amalda tekshirilgan bo‘lishi kerak. Forbidden frameworks ishlatilmaydi. Fake medical data qo‘shilmaydi.
