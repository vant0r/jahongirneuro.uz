<?php
declare(strict_types=1);

function read_json(string $file): array {
    $path = __DIR__ . '/data/' . $file;
    if (!is_file($path)) return [];
    $data = json_decode((string) file_get_contents($path), true);
    return is_array($data) ? $data : [];
}
function e(mixed $value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }

$doctor = read_json('doctor.json');
$expertise = read_json('expertise.json');
$items = $expertise['items'] ?? [];
?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0F5C4D">
<meta name="description" content="<?=e($doctor['name'] ?? 'Jahongir Neuro')?> — professional tibbiy yo‘nalishlar va ekspertiza.">
<title>Mutaxassislik — <?=e($doctor['name'] ?? 'Jahongir Neuro')?></title>
<style>
:root{--paper:#f4f6f3;--white:#fff;--ink:#101613;--muted:#69746f;--green:#0f5c4d;--deep:#174f45;--soft:#e3eeea;--line:rgba(16,22,19,.09);--max:1240px;--ease:cubic-bezier(.22,1,.36,1)}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}a{text-decoration:none;color:inherit}.shell{width:min(calc(100% - 40px),var(--max));margin:auto}.nav{position:fixed;z-index:10;top:18px;left:50%;transform:translateX(-50%);width:min(calc(100% - 32px),1180px);height:64px;padding:8px 10px 8px 21px;display:flex;align-items:center;justify-content:space-between;background:rgba(255,255,255,.8);border:1px solid rgba(255,255,255,.95);border-radius:999px;backdrop-filter:blur(24px);box-shadow:0 18px 55px rgba(15,92,77,.09)}.brand{font-weight:850;font-size:16px;letter-spacing:-.05em}.brand i{font-style:normal;color:var(--green)}.links{display:flex;gap:27px;color:#606b66;font-size:13px}.links a:hover{color:var(--green)}.cta{background:var(--green);color:#fff;padding:12px 18px;border-radius:999px;font-size:13px;font-weight:750}
.hero{padding:150px 0 120px;min-height:88svh;display:grid;grid-template-columns:.8fr 1.5fr;gap:clamp(40px,8vw,130px);align-items:end}.eyebrow{font-size:10px;font-weight:850;letter-spacing:.19em;text-transform:uppercase;color:var(--green)}.hero h1{font-size:clamp(65px,9vw,138px);line-height:.82;letter-spacing:-.085em;margin:20px 0 28px;max-width:700px}.hero-copy p{font-size:clamp(18px,2vw,23px);line-height:1.45;color:var(--muted);max-width:560px;margin:0}.hero-side{padding-bottom:8px}.hero-index{font-size:12px;color:#9aa49f;border-top:1px solid var(--line);padding-top:16px;margin-bottom:30px}.hero-note{font-size:14px;line-height:1.65;color:var(--muted);max-width:280px}.hero-line{height:1px;background:var(--line);margin-top:38px}
.services{padding:0 0 150px}.service-list{border-top:1px solid var(--line)}.service{display:grid;grid-template-columns:90px .75fr 1fr;gap:40px;padding:42px 0;border-bottom:1px solid var(--line);align-items:start;transition:padding .45s var(--ease)}.service:hover{padding-left:16px;padding-right:16px;background:rgba(255,255,255,.5)}.num{font-size:11px;color:#98a39e;letter-spacing:.13em;padding-top:8px}.service h2{font-size:clamp(28px,3vw,45px);line-height:1;letter-spacing:-.055em;margin:0}.service .category{font-size:9px;font-weight:850;letter-spacing:.16em;color:var(--green);margin-bottom:13px}.service p{margin:0;color:var(--muted);font-size:15px;line-height:1.65;max-width:510px}.service-arrow{justify-self:end;width:42px;height:42px;border:1px solid var(--line);border-radius:50%;display:grid;place-items:center;color:var(--green);transition:.4s var(--ease)}.service:hover .service-arrow{background:var(--green);color:#fff;transform:rotate(45deg)}
.statement{padding:0 0 150px}.statement-inner{background:var(--green);color:#fff;border-radius:40px;padding:clamp(40px,7vw,90px);display:grid;grid-template-columns:.8fr 1.8fr;gap:50px;box-shadow:0 30px 80px rgba(15,92,77,.15)}.statement .eyebrow{color:#b8dcd4}.statement h2{font-size:clamp(43px,6vw,78px);line-height:.94;letter-spacing:-.07em;margin:0;max-width:900px}.statement p{font-size:14px;line-height:1.7;color:rgba(255,255,255,.67);max-width:430px;margin:30px 0 0}.button{display:inline-flex;margin-top:28px;background:#fff;color:var(--ink);padding:14px 20px;border-radius:999px;font-size:13px;font-weight:800}.footer{padding:45px 0 32px;border-top:1px solid var(--line);display:flex;justify-content:space-between;color:#77817c;font-size:12px}.footer strong{color:var(--green)}
.reveal{animation:rise .8s var(--ease) both}@keyframes rise{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:none}}
@media(max-width:850px){.links{display:none}.hero{grid-template-columns:1fr;padding-top:125px;min-height:auto}.hero-side{padding-top:20px}.service{grid-template-columns:55px 1fr 42px;gap:18px}.service p{grid-column:2/3}.statement-inner{grid-template-columns:1fr}.services,.statement{padding-bottom:95px}}
@media(max-width:560px){.shell{width:min(calc(100% - 28px),var(--max))}.nav{top:10px;width:calc(100% - 20px);height:58px}.cta{padding:11px 14px}.hero{padding:108px 0 78px}.hero h1{font-size:59px}.service{grid-template-columns:40px 1fr 36px;padding:30px 0}.service:hover{padding-left:8px;padding-right:8px}.service h2{font-size:30px}.service p{font-size:14px}.statement-inner{border-radius:28px;padding:32px}.statement h2{font-size:51px}.footer{display:block}.footer span{display:block;margin-top:8px}}
@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.reveal{animation:none}.service,.service-arrow{transition:none}}
</style>
</head>
<body>
<header class="nav"><a class="brand" href="/">JG<i>.</i></a><nav class="links" aria-label="Asosiy navigatsiya"><a href="/about.php">Doktor haqida</a><a href="/services.php">Mutaxassislik</a><a href="/portfolio.php">Ilmiy faoliyat</a><a href="/contact.php">Aloqa</a></nav><a class="cta" href="/contact.php">Qabulga yozilish</a></header>
<main>
<section class="hero shell"><div class="hero-copy reveal"><div class="eyebrow">02 / EXPERTISE</div><h1>Mutaxassislik.</h1><p><?=e($expertise['intro'] ?? 'Aniq tashxis, individual yondashuv va professional tibbiy fikrlash.')?></p></div><div class="hero-side reveal"><div class="hero-index">PROFESSIONAL MEDICAL PRACTICE</div><div class="hero-note">Har bir yo‘nalish bemor holatini tushunish, klinik ma’lumotlarni tahlil qilish va individual yondashuvga asoslanadi.</div><div class="hero-line"></div></div></section>
<section class="services"><div class="shell"><div class="service-list">
<?php foreach($items as $i=>$item): ?><article class="service reveal"><div class="num">0<?=e($i+1)?></div><div><div class="category"><?=e($item['category'] ?? 'YO‘NALISH')?></div><h2><?=e($item['title'] ?? '')?></h2></div><div><p><?=e($item['description'] ?? '')?></p><span class="service-arrow" aria-hidden="true">↗</span></div></article><?php endforeach; ?>
</div></div></section>
<section class="statement"><div class="shell"><div class="statement-inner"><div><div class="eyebrow">APPROACH</div></div><div><h2>Murakkablikni tushunarli qilish — professional yondashuvning bir qismi.</h2><p>Tibbiy qarorlar ishonchli ma’lumot, klinik tahlil va bemor bilan ochiq muloqotga tayangan holda tushuntiriladi.</p><a class="button" href="/contact.php">Qabul uchun bog‘lanish&nbsp; ↗</a></div></div></div></section>
</main>
<footer class="footer shell"><span>© <?=date('Y')?> <strong><?=e($doctor['name'] ?? 'Jahongir Neuro')?></strong></span><span>Professional medical portfolio</span></footer>
</body>
</html>