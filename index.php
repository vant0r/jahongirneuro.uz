<?php
declare(strict_types=1);

function data(string $file): array {
    $path = __DIR__ . '/data/' . $file;
    $value = is_file($path) ? json_decode((string) file_get_contents($path), true) : [];
    return is_array($value) ? $value : [];
}
function esc(mixed $value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$doctor = data('doctor.json');
$about = data('about.json');
$expertise = data('expertise.json');
$research = data('research.json');
$contact = data('contact.json');
$items = $expertise['items'] ?? [];
$publications = $research['publications'] ?? [];
$stats = $doctor['stats'] ?? [];
?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0F5C4D">
<meta name="description" content="<?= esc($doctor['name'] ?? 'Doktor') ?> — <?= esc($doctor['title'] ?? 'Professional medical portfolio') ?>.">
<title><?= esc($doctor['name'] ?? 'Doktor') ?> — <?= esc($doctor['title'] ?? 'Professional portfolio') ?></title>
<style>
:root{
 --paper:#f4f6f3;--white:#fff;--ink:#101613;--muted:#68736e;--line:rgba(16,22,19,.09);
 --green:#0f5c4d;--green-2:#174f45;--green-soft:#e3eeea;--green-pale:#eef5f1;
 --max:1240px;--ease:cubic-bezier(.22,1,.36,1)
}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}a{color:inherit;text-decoration:none}button{font:inherit}img{display:block;max-width:100%}.shell{width:min(calc(100% - 40px),var(--max));margin:auto}
.nav{position:fixed;z-index:50;top:18px;left:50%;transform:translateX(-50%);width:min(calc(100% - 32px),1180px);height:64px;padding:8px 10px 8px 21px;display:flex;align-items:center;justify-content:space-between;background:rgba(255,255,255,.78);border:1px solid rgba(255,255,255,.95);box-shadow:0 18px 55px rgba(15,92,77,.09);backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);border-radius:999px}.brand{font-size:16px;font-weight:800;letter-spacing:-.045em}.brand-mark{color:var(--green)}.links{display:flex;gap:27px;color:#5d6762;font-size:13px}.links a{transition:color .25s ease}.links a:hover{color:var(--green)}.nav-cta,.button.primary{background:var(--green);color:#fff;border-color:var(--green)}.nav-cta{padding:12px 18px;border-radius:999px;font-size:13px;font-weight:700;transition:transform .35s var(--ease),box-shadow .35s ease}.nav-cta:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(15,92,77,.2)}
.hero{min-height:100svh;padding:132px 0 72px;display:grid;grid-template-columns:minmax(0,1.05fr) minmax(390px,.8fr);gap:clamp(40px,7vw,110px);align-items:center}.hero-copy{padding-top:30px}.eyebrow{font-size:10px;letter-spacing:.19em;text-transform:uppercase;font-weight:800;color:var(--green)}.hero h1{font-size:clamp(68px,9vw,144px);line-height:.82;letter-spacing:-.08em;font-weight:720;max-width:850px;margin:21px 0 34px}.lead{font-size:clamp(18px,2vw,23px);line-height:1.46;letter-spacing:-.025em;color:var(--muted);max-width:650px}.actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:34px}.button{display:inline-flex;align-items:center;justify-content:center;padding:14px 20px;border-radius:999px;font-size:13px;font-weight:750;border:1px solid var(--line);transition:transform .35s var(--ease),box-shadow .35s ease,background .35s ease}.button:hover{transform:translateY(-3px)}.button.secondary{background:#fff}.button.primary:hover{box-shadow:0 14px 30px rgba(15,92,77,.2)}
.portrait-wrap{position:relative}.portrait{height:min(76vh,720px);min-height:520px;overflow:hidden;border-radius:38px;background:linear-gradient(145deg,#dce9e4,#b9d0c8);box-shadow:0 35px 90px rgba(15,92,77,.13);position:relative}.portrait::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,92,77,0) 58%,rgba(8,43,36,.28));pointer-events:none}.portrait img{width:100%;height:100%;object-fit:cover;object-position:center}.portrait-placeholder{height:100%;display:grid;place-items:center;color:rgba(15,54,47,.5);font-size:13px;letter-spacing:.05em;text-align:center;padding:30px}.portrait-label{position:absolute;z-index:2;left:20px;bottom:20px;padding:13px 16px;border-radius:17px;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);font-size:12px;color:#30403a;border:1px solid rgba(255,255,255,.8)}
.stats{display:grid;grid-template-columns:repeat(4,1fr);border-top:1px solid var(--line);margin-top:68px;padding-top:22px;gap:20px}.stat strong{font-size:25px;letter-spacing:-.055em;display:block}.stat span{font-size:11px;color:var(--muted);display:block;margin-top:5px}
.section{padding:145px 0;border-top:1px solid var(--line)}.section-head{display:grid;grid-template-columns:.75fr 1.75fr;gap:60px;margin-bottom:72px}.section-title{font-size:clamp(45px,6vw,84px);line-height:.92;letter-spacing:-.068em;margin:12px 0 0;font-weight:700}.about-grid{display:grid;grid-template-columns:.72fr 1.28fr;gap:80px;align-items:start}.side-note{font-size:12px;color:var(--muted);line-height:1.6;max-width:260px}.about-copy{font-size:clamp(24px,3vw,39px);line-height:1.19;letter-spacing:-.042em;margin:0}.link-arrow{display:inline-flex;margin-top:28px;font-size:13px;font-weight:800;color:var(--green)}
.expertise-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}.expertise-card{min-height:310px;background:#fff;border:1px solid var(--line);border-radius:30px;padding:29px;display:flex;flex-direction:column;justify-content:space-between;transition:transform .5s var(--ease),box-shadow .5s var(--ease),border-color .5s ease}.expertise-card:hover{transform:translateY(-8px);box-shadow:0 28px 70px rgba(15,92,77,.1);border-color:rgba(15,92,77,.2)}.number{font-size:11px;color:#9aa59f;letter-spacing:.12em}.category{font-size:9px;letter-spacing:.16em;color:var(--green);font-weight:800;margin-bottom:12px}.expertise-card h3{font-size:29px;letter-spacing:-.048em;line-height:1.04;margin:0 0 13px}.expertise-card p{margin:0;color:var(--muted);font-size:14px;line-height:1.6}
.research-layout{display:grid;grid-template-columns:1fr 1fr;gap:14px}.research-card{background:var(--ink);color:#fff;border-radius:31px;padding:36px;min-height:370px;display:flex;flex-direction:column;justify-content:space-between}.research-card:nth-child(2){background:var(--green)}.research-card h3{font-size:34px;line-height:1.04;letter-spacing:-.05em;max-width:600px}.research-card p{color:rgba(255,255,255,.64);font-size:14px}.year{font-size:10px;letter-spacing:.17em;text-transform:uppercase;color:rgba(255,255,255,.55)}
.contact-band{background:var(--green);color:#fff;border-radius:42px;padding:clamp(42px,7vw,92px);display:grid;grid-template-columns:1.5fr .7fr;gap:50px;align-items:end;box-shadow:0 30px 80px rgba(15,92,77,.16)}.contact-band h2{font-size:clamp(50px,7vw,94px);line-height:.88;letter-spacing:-.075em;margin:14px 0 0}.contact-band p{color:rgba(255,255,255,.68);font-size:15px;line-height:1.6}.contact-actions{display:flex;justify-content:flex-end}.contact-actions .button{background:#fff;color:var(--ink);border-color:#fff}
.footer{padding:55px 0 35px;display:flex;justify-content:space-between;color:#747f79;font-size:12px}.footer strong{color:var(--green)}.reveal{animation:rise .9s var(--ease) both}@keyframes rise{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:none}}
@media(max-width:900px){.links{display:none}.hero{grid-template-columns:1fr;padding-top:125px;align-items:start}.hero-copy{padding-top:20px}.portrait{height:620px}.section{padding:100px 0}.section-head,.about-grid{grid-template-columns:1fr;gap:25px}.expertise-grid,.research-layout{grid-template-columns:1fr}.contact-band{grid-template-columns:1fr}.contact-actions{justify-content:flex-start}.stats{grid-template-columns:repeat(2,1fr)}}
@media(max-width:560px){.shell{width:min(calc(100% - 28px),var(--max))}.nav{top:10px;width:calc(100% - 20px);height:58px}.nav-cta{padding:11px 14px}.hero{padding-top:105px}.hero h1{font-size:58px}.portrait{min-height:430px;height:65svh;border-radius:27px}.stats{margin-top:45px}.section{padding:78px 0}.section-title{font-size:49px}.expertise-card,.research-card{min-height:255px;border-radius:25px}.contact-band{border-radius:29px;padding:31px}.contact-band h2{font-size:53px}.footer{display:block}.footer span{display:block;margin-top:8px}}
@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.reveal{animation:none}.button,.expertise-card{transition:none}}
</style>
</head>
<body>
<header class="nav">
<a class="brand" href="/">JG<span class="brand-mark">.</span></a>
<nav class="links" aria-label="Asosiy navigatsiya"><a href="/about.php">Doktor haqida</a><a href="/services.php">Mutaxassislik</a><a href="/portfolio.php">Ilmiy faoliyat</a><a href="/contact.php">Aloqa</a></nav>
<a class="nav-cta" href="/contact.php">Qabulga yozilish</a>
</header>
<main>
<section class="hero shell">
<div class="hero-copy reveal"><div class="eyebrow"><?=esc($doctor['title']??'Shifokor')?></div><h1><?=esc($doctor['name']??'Doktor')?></h1><p class="lead"><?=esc($doctor['bio']??'Professional tibbiy portfolio.')?></p><div class="actions"><a class="button primary" href="/contact.php">Qabulga yozilish <span style="margin-left:8px">↗</span></a><a class="button secondary" href="/about.php">Professional profil</a></div>
<?php if($stats): ?><div class="stats"><?php foreach(array_slice($stats,0,4) as $s):?><div class="stat"><strong><?=esc($s['value']??'')?></strong><span><?=esc($s['label']??'')?></span></div><?php endforeach;?></div><?php endif; ?></div>
<div class="portrait-wrap reveal"><div class="portrait"><img src="/media/images/doctor.jpg" alt="<?=esc($doctor['name']??'Doktor')?>" onerror="this.style.display='none';this.nextElementSibling.hidden=false"><div class="portrait-placeholder" hidden>Doktor portreti<br>Admin panel orqali yuklanadi</div></div><div class="portrait-label"><?=esc($doctor['short_name']??$doctor['name']??'Doctor')?> · Professional portfolio</div></div>
</section>
<section class="section"><div class="shell"><div class="section-head"><div><div class="eyebrow">01 / ABOUT</div></div><h2 class="section-title"><?=esc($about['headline']??'Professional yondashuv.')?></h2></div><div class="about-grid"><div class="side-note">Tajriba, ta’lim va insoniy yondashuv bir nuqtada.</div><div><p class="about-copy"><?=esc($about['bio']??'')?></p><a class="link-arrow" href="/about.php">To‘liq profilni ko‘rish&nbsp; ↗</a></div></div></div></section>
<section class="section"><div class="shell"><div class="section-head"><div><div class="eyebrow">02 / EXPERTISE</div></div><h2 class="section-title">Aniqlik. Tajriba. Mutaxassislik.</h2></div><div class="expertise-grid"><?php foreach(array_slice($items,0,3) as $i=>$x):?><article class="expertise-card"><span class="number">0<?=($i+1)?></span><div><div class="category"><?=esc($x['category']??'')?></div><h3><?=esc($x['title']??'')?></h3><p><?=esc($x['description']??'')?></p></div></article><?php endforeach;?></div><a class="link-arrow" href="/services.php">Barcha yo‘nalishlar&nbsp; ↗</a></div></section>
<section class="section"><div class="shell"><div class="section-head"><div><div class="eyebrow">03 / RESEARCH</div></div><h2 class="section-title">Ilmiy faoliyat va professional yutuqlar.</h2></div><div class="research-layout"><?php foreach(array_slice($publications,0,2) as $r):?><article class="research-card"><div class="year"><?=esc($r['year']??'')?></div><div><h3><?=esc($r['title']??'')?></h3><p><?=esc($r['source']??'')?></p></div></article><?php endforeach;?></div><a class="link-arrow" href="/portfolio.php">Ilmiy faoliyatni ko‘rish&nbsp; ↗</a></div></section>
<section class="section"><div class="shell"><div class="contact-band"><div><div class="eyebrow" style="color:#b9ddd5">04 / CONTACT</div><h2><?=esc($contact['headline']??'Qabul uchun bog‘laning.')?></h2><p><?=esc($contact['address']??'')?></p></div><div class="contact-actions"><a class="button" href="/contact.php">Aloqa va qabul&nbsp; ↗</a></div></div></div></section>
</main>
<footer class="footer shell"><span>© <?=date('Y')?> <strong><?=esc($doctor['name']??'Doctor')?></strong></span><span>Personal medical portfolio</span></footer>
</body>
</html>