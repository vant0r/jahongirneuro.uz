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
│   └── original professional media archive
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
- Formlar mobileda bir ustun bo‘lsin; input/button qulay touch targetga ega bo‘lsin.
- Typography `clamp()`/fluid sizing bilan ekran kengligidan oshmasin.
- Media va rasmlar `max-width:100%`, video overflow qilmasin; portrait/hero crop buzilmasin.
- Admin jadvallari kichik ekranda horizontal scroll qilinadigan konteynerda bo‘lsin.
- Sticky/fixed elementlar safe-area va mobile viewportni hisobga olsin.
- Hover mobilga bog‘liq interaction bo‘lmasin.
- `prefers-reduced-motion:reduce` qo‘llansin.
- 320–380px kengliklarda ham layout buzilmasligi tekshirilsin.

## ADMIN — `/admin/index.php`
Bitta PHP fayl ichida Dashboard, Site/Doktor, About, Services, Portfolio, So‘rovlar, Media va Settings mavjud.

### HOZIR TAYYOR
- [x] Session authentication: server `ADMIN_PASSWORD` environment variable.
- [x] Session regeneration.
- [x] CSRF token — state-changing POST actionlarda.
- [x] JSON read/write + `LOCK_EX`.
- [x] Dashboard metrics.
- [x] Site/Doktor editor.
- [x] About editor.
- [x] Services CRUD.
- [x] Portfolio CRUD.
- [x] Requests workflow.
- [x] Media upload/delete/metadata.
- [x] Output escaping.
- [x] Path traversal uchun `basename()` media delete.

## REAL MEDIA INTEGRATION
- [x] Repositorydagi original HEIC fayllar o‘zgartirilmaydi.
- [x] Original MOV video o‘zgartirilmaydi.
- [x] Mavjud real media `data/media.json` orqali markaziy manifestga kiritildi.
- [x] `portfolio.php` barcha real media fayllarni birgalikda ko‘rsatadigan responsive masonry archivega aylantirildi.
- [x] Media kategoriyalari: portrait, surgery, clinical, consultation, international, professional.
- [x] HEIC preview ishlamaydigan browserlar uchun original faylga fallback link mavjud.
- [x] MOV uchun native HTML5 video player mavjud.
- [x] Lazy loading va responsive media sizing qo‘llangan.
- [x] Barcha real media uchun original faylni yangi tabda ochish imkoniyati mavjud.
- [x] Media soni: 42 ta manifest elementi.

## MEDIA QOIDALARI
Images max 10MB; videos max 50MB. Actual MIME server-side `finfo` bilan tekshiriladi. Yangi upload fayl nomi random generated. Yangi admin upload media `media/images/` yoki `media/videos/` ichida saqlanadi. Repositorydagi original `uploads/` archive o‘zgartirilmaydi.

## SECURITY
Productionda `ADMIN_PASSWORD` environment variable majburiy. Default/demo password ishlatilmasin. JSON write `LOCK_EX`, output `htmlspecialchars`, CSRF token, MIME/size validation va generated filenames ishlatiladi. Media papkalarida PHP script execution hosting konfiguratsiyasi orqali bloklanishi kerak.

## AI AGENT PROTOKOLI
README'ni to‘liq o‘qi → repositoryni tekshir → mavjud kod/JSON/media ni o‘qi → statusni tekshir → faqat qolgan ishni bajar → syntax/logicni tekshir → README statusini **eski statusni o‘chirib yangilab** yoz → commit qil. Tayyor bo‘lmagan narsani `[x]` qilma. Ishlayotgan kodni sababsiz qayta yozma. Yangi admin PHP sahifa yaratma.

# CURRENT DEVELOPMENT STATUS

**Phase:** 06 — Real Media Integration Complete / Final QA

### Public
- [x] `index.php`
- [x] `about.php`
- [x] `services.php`
- [x] `portfolio.php`
- [x] `contact.php`
- [x] Portfolio real media archive integration
- [x] HEIC original-file fallback
- [x] MOV native video integration

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

### MEDIA
- [x] 42 real media records mapped in `data/media.json`
- [x] Original HEIC/JPG/MOV files preserved in `uploads/`
- [x] Portfolio masonry gallery
- [x] Category filters
- [x] Lazy loading
- [x] Original-file fallback/open action

### NEXT EXACT EXECUTION ORDER
1. Run PHP syntax audit on every PHP entry point.
2. Run JSON integrity audit on every `data/*.json`.
3. Verify that all 42 paths in `data/media.json` physically exist in the repository.
4. Verify real media rendering on the target hosting; HEIC fallback must remain functional where HEIC preview is unsupported.
5. Verify admin media upload/delete and `enctype` behavior.
6. Verify all public pages consume admin-edited JSON fields correctly.
7. Perform responsive QA at 320/360/390/430/768/1024/1440px.
8. Accessibility + performance audit.
9. Security audit: session cookie flags, login rate limiting, CSRF, upload handling, path traversal, headers.
10. Final repository audit and update this README with the actual verified final state.

## DEFINITION OF DONE
5 public pages + one admin panel + complete JSON CRUD + requests + secure media + all real uploaded media integrated + responsive/accessibility/SEO/security QA are actually verified. No fake data, no duplicate admin pages, no forbidden frameworks.
