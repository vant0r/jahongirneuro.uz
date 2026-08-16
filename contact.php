<?php
$requestsPath = __DIR__ . '/data/requests.json';
$errors = [];
$sent = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string)($_POST['name'] ?? ''));
    $phone = trim((string)($_POST['phone'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $message = trim((string)($_POST['message'] ?? ''));

    if (mb_strlen($name) < 2 || mb_strlen($name) > 100) $errors[] = 'Ismni to‘g‘ri kiriting.';
    if (mb_strlen($phone) < 7 || mb_strlen($phone) > 30) $errors[] = 'Telefon raqamini to‘g‘ri kiriting.';
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email manzili noto‘g‘ri.';
    if (mb_strlen($message) > 1000) $errors[] = 'Xabar juda uzun.';

    if (!$errors) {
        $items = [];
        if (is_file($requestsPath)) {
            $raw = file_get_contents($requestsPath);
            $decoded = json_decode($raw, true);
            if (is_array($decoded)) $items = $decoded;
        }
        if (!array_is_list($items)) $items = [];
        $items[] = [
            'id' => 'REQ-' . date('YmdHis') . '-' . random_int(100, 999),
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 'new'
        ];
        $json = json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if ($json !== false && file_put_contents($requestsPath, $json . PHP_EOL, LOCK_EX) !== false) {
            $sent = true;
        } else {
            $errors[] = 'So‘rovni saqlashda xatolik yuz berdi. Keyinroq qayta urinib ko‘ring.';
        }
    }
}
$e = static fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Bog‘lanish — Jahongir Neuro</title>
<meta name="description" content="Jahongir Neuro bilan professional masala va qabul bo‘yicha bog‘lanish.">
<style>
:root{--bg:#f4f6f4;--paper:#fff;--ink:#10201c;--muted:#6c7773;--green:#0f5c4d;--deep:#174f45;--soft:#e3eeea;--line:rgba(16,32,28,.09);--shadow:0 25px 70px rgba(15,92,77,.11)}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}a{color:inherit;text-decoration:none}.wrap{width:min(1160px,calc(100% - 40px));margin:auto}.nav{position:sticky;top:18px;z-index:20;margin:18px auto 0;width:min(1120px,calc(100% - 32px));display:flex;justify-content:space-between;align-items:center;padding:12px 14px 12px 20px;background:rgba(255,255,255,.8);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.9);border-radius:18px;box-shadow:0 12px 35px rgba(20,40,34,.08)}.brand{font-weight:780;letter-spacing:-.04em}.brand span{color:var(--green)}.links{display:flex;gap:6px}.links a{padding:9px 12px;border-radius:12px;color:#61706b;font-size:13px}.links a:hover,.links a.active{background:var(--soft);color:var(--deep)}.links .cta{background:var(--green);color:#fff}.hero{padding:105px 0 75px}.eyebrow{color:var(--green);font-size:12px;font-weight:800;letter-spacing:.14em;text-transform:uppercase}.hero h1{font-size:clamp(58px,9vw,118px);line-height:.88;letter-spacing:-.075em;margin:22px 0 28px;max-width:900px}.hero h1 span{color:var(--green)}.hero p{max-width:660px;color:var(--muted);font-size:clamp(18px,2vw,24px);line-height:1.5}.layout{display:grid;grid-template-columns:.82fr 1.18fr;gap:18px;align-items:stretch}.info,.form{background:var(--paper);border:1px solid var(--line);border-radius:30px;box-shadow:var(--shadow)}.info{padding:34px;display:flex;flex-direction:column;justify-content:space-between;min-height:570px}.info h2{font-size:clamp(30px,4vw,52px);line-height:.98;letter-spacing:-.06em;margin:0 0 25px}.info p{color:var(--muted);line-height:1.6}.details{display:grid;gap:14px}.detail{padding:16px 0;border-top:1px solid var(--line)}.detail small{display:block;color:#8a9691;font-size:11px;text-transform:uppercase;letter-spacing:.1em;margin-bottom:5px}.detail strong{font-size:16px}.form{padding:38px}.form h2{font-size:32px;letter-spacing:-.05em;margin:0}.form .intro{color:var(--muted);line-height:1.5;margin:10px 0 30px}.fields{display:grid;grid-template-columns:1fr 1fr;gap:16px}.field.full{grid-column:1/-1}.field label{display:block;font-size:12px;font-weight:750;margin:0 0 8px;color:#4f5e59}.field input,.field textarea{width:100%;border:1px solid #dfe5e2;background:#f9faf9;border-radius:15px;padding:14px 15px;font:inherit;color:var(--ink);outline:none;transition:.2s}.field textarea{min-height:145px;resize:vertical}.field input:focus,.field textarea:focus{border-color:var(--green);box-shadow:0 0 0 4px rgba(15,92,77,.09);background:#fff}.submit{border:0;background:var(--green);color:#fff;border-radius:15px;padding:15px 20px;font-weight:750;font-size:14px;cursor:pointer;transition:transform .2s,box-shadow .2s}.submit:hover{transform:translateY(-2px);box-shadow:0 12px 25px rgba(15,92,77,.2)}.notice{padding:14px 16px;border-radius:14px;margin-bottom:20px;font-size:14px}.success{background:var(--soft);color:var(--deep)}.error{background:#f9eaea;color:#8b3333}.error ul{margin:0;padding-left:20px}.privacy{font-size:11px;color:#89938f;line-height:1.5;margin-top:14px}.bottom{padding:100px 0 45px}.quote{background:var(--deep);color:#fff;border-radius:32px;padding:52px;display:flex;justify-content:space-between;gap:30px;align-items:end}.quote h2{font-size:clamp(34px,5vw,62px);line-height:.94;letter-spacing:-.065em;margin:0;max-width:720px}.quote span{color:#bfd3cc}.footer{display:flex;justify-content:space-between;color:#7d8985;font-size:13px;padding-bottom:40px}@media(max-width:760px){.wrap{width:calc(100% - 24px)}.links a:not(.cta){display:none}.hero{padding:80px 0 55px}.layout{grid-template-columns:1fr}.info{min-height:auto}.fields{grid-template-columns:1fr}.field.full{grid-column:auto}.form,.info{padding:27px}.quote{padding:34px;display:block}.quote span{display:block;margin-top:22px}.footer{display:block}.footer span{display:block;margin-top:8px}}@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.submit{transition:none}}
</style>
</head>
<body>
<nav class="nav" aria-label="Asosiy navigatsiya"><a class="brand" href="index.php">Jahongir <span>Neuro</span></a><div class="links"><a href="index.php">Bosh sahifa</a><a href="about.php">Men haqimda</a><a href="services.php">Yo‘nalishlar</a><a href="portfolio.php">Portfolio</a><a class="cta active" href="contact.php">Bog‘lanish</a></div></nav>
<main>
<section class="wrap hero"><div class="eyebrow">Bog‘lanish / Appointment</div><h1>To‘g‘ri aloqa.<br><span>Professional yondashuv.</span></h1><p>Professional masala, hamkorlik yoki qabul bo‘yicha so‘rovingizni yuboring. So‘rov ma’muriy panel orqali ko‘rib chiqiladi.</p></section>
<section class="wrap layout">
<aside class="info"><div><h2>Sizdan eshitishdan mamnunmiz.</h2><p>Kerakli ma’lumotlarni qoldiring. Aloqa ma’lumotlari mavjud bo‘lsa, keyingi bog‘lanish uchun foydalaniladi.</p></div><div class="details"><div class="detail"><small>Telefon</small><strong>Ma’lumot admin paneldan belgilanadi</strong></div><div class="detail"><small>Email</small><strong>Ma’lumot admin paneldan belgilanadi</strong></div><div class="detail"><small>Manzil</small><strong>Ma’lumot admin paneldan belgilanadi</strong></div></div></aside>
<section class="form" aria-labelledby="form-title"><h2 id="form-title">So‘rov yuborish</h2><p class="intro">Qisqa va aniq ma’lumot qoldiring.</p>
<?php if($sent): ?><div class="notice success" role="status">So‘rovingiz muvaffaqiyatli yuborildi. Tez orada bog‘lanish uchun ko‘rib chiqiladi.</div><?php endif; ?>
<?php if($errors): ?><div class="notice error" role="alert"><ul><?php foreach($errors as $error): ?><li><?= $e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form method="post" action="contact.php" novalidate><div class="fields"><div class="field"><label for="name">Ism *</label><input id="name" name="name" required maxlength="100" value="<?= $e($_POST['name'] ?? '') ?>" autocomplete="name"></div><div class="field"><label for="phone">Telefon *</label><input id="phone" name="phone" required maxlength="30" value="<?= $e($_POST['phone'] ?? '') ?>" autocomplete="tel"></div><div class="field full"><label for="email">Email</label><input id="email" type="email" name="email" maxlength="160" value="<?= $e($_POST['email'] ?? '') ?>" autocomplete="email"></div><div class="field full"><label for="message">Xabar</label><textarea id="message" name="message" maxlength="1000" placeholder="Murojaatingizni qisqacha yozing..." ><?= $e($_POST['message'] ?? '') ?></textarea></div></div><button class="submit" type="submit">So‘rovni yuborish →</button><p class="privacy">Iltimos, ushbu forma orqali maxsus yoki batafsil tibbiy ma’lumot yubormang.</p></form></section>
</section>
<section class="wrap bottom"><div class="quote"><h2>Professional muloqot birinchi qadamdan boshlanadi.</h2><span>Jahongir Neuro</span></div></section>
</main>
<footer class="wrap footer"><span>© <?= date('Y') ?> Jahongir Neuro</span><span>Professional medical portfolio</span></footer>
</body></html>