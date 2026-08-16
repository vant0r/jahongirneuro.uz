# Inline Tahrirlash Rejimi - Foydalanish Qo'llanmasi

## Xususiyatlar

Ushbu loyihaga **Ctrl+T** va **Ctrl+S** klavishlari orqali boshqariladigan inline tahrirlash rejimi qo'shildi.

### Asosiy funksiyalar:

1. **Ctrl+T** - Tahrirlash rejimini yoqish
   - Ekranda parol so'rash oynasi paydo bo'ladi
   - Boshlang'ich parol: `2026`
   - Parol to'g'ri kiritilganda sahifadagi matnlar tahrirlashga tayyor bo'ladi

2. **Parolni o'zgartirish**
   - Tahrirlash rejimi yoqilganda, pastki o'ng burchakda "🔑 Parolni o'zgartirish" tugmasi paydo bo'ladi
   - Yangi parol kiriting va tasdiqlang (masalan: `2027`)
   - Keyingi safar yangi parol bilan kiriladi

3. **Tahrirlash huquqi**
   - Parol tasdiqlangandan so'ng, sahifadagi barcha matn elementlari (h1, h2, p, span va h.k.) tahrirlanadi
   - Har bir element atrofida yashil chiziq paydo bo'ladi
   - Ekranning pastki o'ng burchagida "✏️ Tahrirlash rejimi" indikatori ko'rinadi

4. **Ctrl+S** - O'zgarishlarni saqlash
   - Kiritilgan o'zgarishlar serverga yuboriladi
   - O'zgarishlar `data/inline_changes.log` fayliga yoziladi
   - Admin panel orqali tasdiqlash talab qilinadi

## Fayllar

- `/assets/js/inline-edit.js` - JavaScript moduli
- `/assets/save_password.php` - Parolni saqlash/solitirish API
- `/assets/save_inline.php` - O'zgarishlarni jurnalga yozish
- `/data/.edit_password.json` - Parol saqlanadigan fayl (boshlang'ich: 2026)

## Ishlatish tartibi:

1. Saytni oching (index.php)
2. **Ctrl+T** bosing
3. Parol oynasiga `2026` kiriting
4. Matnlarni tahrirlang
5. Yangi parol o'rnatish uchun "🔑 Parolni o'zgartirish" tugmasini bosing
6. Yangi parolni ikki marta kiriting (masalan: `2027`)
7. **Ctrl+S** bosib o'zgarishlarni saqlang

## Muhim eslatma:

- O'zgarishlar avtomatik ravishda JSON fayllarga yozilmaydi
- Barcha o'zgarishlar `data/inline_changes.log` fayliga yoziladi
- Admin panel orqali ko'rib chiqish va tasdiqlash tavsiya etiladi
