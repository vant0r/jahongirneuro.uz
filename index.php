<?php
declare(strict_types=1);

function data(string $file): array {
    $path = __DIR__ . '/data/' . $file;
    $value = is_file($path) ? json_decode((string) file_get_contents($path), true) : [];
    return is_array($value) ? $value : [];
}
function esc(mixed $value): string { return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'); }

$doctor = data('doctor.json');
$about = data('about.json');
$expertise = data('expertise.json');
$research = data('research.json');
$contact = data('contact.json');
$items = $expertise['items'] ?? [];
$publications = $research['publications'] ?? [];
?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?= esc($doctor['name'] ?? 'Doktor') ?> — <?= esc($doctor['title'] ?? 'Shifokor') ?> professional portfolio.">
<title><?= esc($doctor['name'] ?? 'Doktor') ?> — <?= esc($doctor['title'] ?? 'Professional portfolio') ?></title>
<style>
:root{--ink:#101418;--muted:#687078;--line:#e6e8e9;--paper:#f6f7f5;--white:#fff;--accent:#174c49;--accent-soft:#e8f0ee;--max:1240px;--ease:cubic-bezier(.22,1,.36,1)}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}a{color:inherit;text-decoration:none}img{display:block;max-width:100%}.shell{width:min(calc(100% - 40px),var(--max));margin:auto}
.nav{position:fixed;z-index:20;top:18px;left:50%;transform:translateX(-50%);width:min(calc(100% - 32px),1180px);height:64px;padding:8px 10px 8px 20px;display:flex;align-items:center;justify-content:space-between;background:rgba(255,255,255,.78);border:1px solid rgba(255,255,255,.95);box-shadow:0 16px 50px rgba(16,20,24,.08);backdrop-filter:blur(22px);-webkit-backdrop-filter:blur(22px);border-radius:999px}.brand{font-weight:750;letter-spacing:-.035em}.links{display:flex;gap:28px;color:#555d63;font-size:13px}.links a{transition:color .25s ease}.links a:hover{color:var(--ink)}.nav-cta{padding:12px 18px;background:var(--ink);color:#fff;border-radius:999px;font-size:13px;font-weight:650;transition:transform .3s var(--ease)}.nav-cta:hover{transform:translateY(-2px)}
.hero{min-height:100svh;padding:150px 0 80px;display:grid;grid-template-columns:minmax(0,1fr) minmax(360px,.78fr);gap:clamp(40px,8vw,120px);align-items:end}.eyebrow{font-size:11px;letter-spacing:.18em;text-transform:uppercase;font-weight:750;color:var(--accent)}.hero h1{font-size:clamp(64px,9vw,142px);line-height:.84;letter-spacing:-.075em;font-weight:720;max-width:850px;margin:20px 0 34px}.lead{font-size:clamp(18px,2vw,23px);line-height:1.48;letter-spacing:-.025em;color:var(--muted);max-width:670px}.actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:34px}.button{display:inline-flex;align-items:center;justify-content:center;padding:14px 20px;border-radius:999px;font-size:13px;font-weight:700;border:1px solid var(--line);transition:transform .35s var(--ease),background .35s ease}.button:hover{transform:translateY(-3px)}.button.primary{background:var(--accent);color:#fff;border-color:var(--accent)}.portrait-wrap{position:relative}.portrait{height:min(72vh,720px);min-height:500px;overflow:hidden;border-radius:36px;background:#dfe5e2;box-shadow:0 35px 80px rgba(16,20,24,.12)}.portrait img{width:100%;height:100%;object-fit:cover;object-position:center}.portrait-label{position:absolute;left:20px;bottom:20px;padding:13px 16px;border-radius:16px;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);font-size:12px;color:#30383d}
.stats{display:grid;grid-template-columns:repeat(4,1fr);border-top:1px solid var(--line);margin-top:70px;padding-top:22px;gap:20px}.stat strong{font-size:25px;letter-spacing:-.05em;display:block}.stat span{font-size:11px;color:var(--muted);display:block;margin-top:4px}
.section{padding:140px 0;border-top:1px solid var(--line)}.section-head{display:grid;grid-template-columns:.8fr 1.8fr;gap:60px;margin-bottom:70px}.section-title{font-size:clamp(42px,6vw,82px);line-height:.94;letter-spacing:-.065em;margin:12px 0 0;font-weight:700}.about-grid{display:grid;grid-template-columns:.7fr 1.3fr;gap:80px;align-items:start}.about-copy{font-size:clamp(24px,3vw,38px);line-height:1.2;letter-spacing:-.04em}.link-arrow{display:inline-flex;margin-top:28px;font-size:13px;font-weight:750;color:var(--accent)}
.expertise-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}.expertise-card{min-height:300px;background:#fff;border:1px solid var(--line);border-radius:28px;padding:28px;display:flex;flex-direction:column;justify-content:space-between;transition:transform .5s var(--ease),box-shadow .5s var(--ease)}.expertise-card:hover{transform:translateY(-7px);box-shadow:0 25px 60px rgba(16,20,24,.08)}.number{font-size:12px;color:#9aa1a5}.expertise-card h3{font-size:28px;letter-spacing:-.045em;line-height:1.05;margin:0 0 12px}.expertise-card p{margin:0;color:var(--muted);font-size:14px;line-height:1.6}
.research-layout{display:grid;grid-template-columns:1fr 1fr;gap:14px}.research-card{background:var(--ink);color:#fff;border-radius:30px;padding:36px;min-height:360px;display:flex;flex-direction:column;justify-content:space-between}.research-card:nth-child(2){background:var(--accent)}.research-card h3{font-size:32px;line-height:1.05;letter-spacing:-.045em;max-width:600px}.research-card p{color:rgba(255,255,255,.66);font-size:14px}.year{font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:rgba(255,255,255,.55)}
.contact-band{background:var(--accent);color:#fff;border-radius:40px;padding:clamp(40px,7vw,90px);display:grid;grid-template-columns:1.5fr .7fr;gap:50px;align-items:end}.contact-band h2{font-size:clamp(48px,7vw,92px);line-height:.9;letter-spacing:-.07em;margin:14px 0 0}.contact-band p{color:rgba(255,255,255,.68);font-size:15px;line-height:1.6}.contact-actions{display:flex;justify-content:flex-end}.contact-actions .button{background:#fff;color:var(--ink);border-color:#fff}
.footer{padding:55px 0 35px;display:flex;justify-content:space-between;color:#747b80;font-size:12px}.reveal{animation:rise .9s var(--ease) both}@keyframes rise{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:none}}
@media(max-width:900px){.links{display:none}.hero{grid-template-columns:1fr;padding-top:130px;align-items:start}.portrait{height:620px}.section{padding:95px 0}.section-head,.about-grid{grid-template-columns:1fr;gap:25px}.expertise-grid,.research-layout{grid-template-columns:1fr}.contact-band{grid-template-columns:1fr}.contact-actions{justify-content:flex-start}.stats{grid-template-columns:repeat(2,1fr)}}
@media(max-width:560px){.shell{width:min(calc(100% - 28px),var(--max))}.nav{top:10px;width:calc(100% - 20px);height:58px}.nav-cta{padding:11px 14px}.hero{padding-top:105px}.hero h1{font-size:58px}.portrait{min-height:430px;height:65svh;border-radius:26px}.stats{margin-top:45px}.section{padding:75px 0}.section-title{font-size:48px}.expertise-card,.research-card{min-height:250px;border-radius:24px}.contact-band{border-radius:28px;padding:30px}.contact-band h2{font-size:52px}.footer{display:block}.footer span{display:block;margin-top:8px}}
@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.reveal{animation:none}.button,.expertise-card{transition:none}}
</style>
</head>
<body>
<header class="nav">
<a class="brand" href="/">JG<span style="color:var(--accent)">.</span></a>
<nav class="links" aria-label="Asosiy navigatsiya"><a href="/about/">Doktor haqida</a><a href="/expertise/">Mutaxassislik</a><a href="/research/">Ilmiy faoliyat</a><a href="/contact/">Aloqa</a></nav>
<a class="nav-cta" href="/contact/">Qabulga yozilish</a>
</header>
<main>
<section class="hero shell">
<div class="reveal"><div class="eyebrow"><?=esc($doctor['title']??'Shifokor')?></div><h1><?=esc($doctor['name']??'Doktor')?></h1><p class="lead"><?=esc($doctor['bio']??'Professional tibbiy portfolio.')?></p><div class="actions"><a class="button primary" href="/contact/">Qabulga yozilish <span style="margin-left:8px">↗</span></a><a class="button" href="/about/">Professional profil</a></div>
<div class="stats"><?php foreach(array_slice($doctor['stats']??[],0,4) as $s):?><div class="stat"><strong><?=esc($s['value']??'')?></strong><span><?=esc($s['label']??'')?></span></div><?php endforeach;?></div></div>
<div class="portrait-wrap reveal"><div class="portrait"><img src="/uploads/profile/doctor.jpg" alt="<?=esc($doctor['name']??'Doktor')?>" onerror="this.style.display='none'"></div><div class="portrait-label"><?=esc($doctor['short_name']??$doctor['name']??'Doctor')?> · Professional portfolio</div></div>
</section>
<section class="section"><div class="shell"><div class="section-head"><div><div class="eyebrow">01 / ABOUT</div></div><h2 class="section-title"><?=esc($about['headline']??'Professional yondashuv.')?></h2></div><div class="about-grid"><div class="muted">Tajriba, ta’lim va insoniy yondashuv bir nuqtada.</div><div><p class="about-copy"><?=esc($about['bio']??'')?></p><a class="link-arrow" href="/about/">To‘liq profilni ko‘rish&nbsp; ↗</a></div></div></div></section>
<section class="section"><div class="shell"><div class="section-head"><div><div class="eyebrow">02 / EXPERTISE</div></div><h2 class="section-title">Aniqlik. Tajriba. Mutaxassislik.</h2></div><div class="expertise-grid"><?php foreach(array_slice($items,0,3) as $i=>$x):?><article class="expertise-card"><span class="number">0<?=($i+1)?></span><div><h3><?=esc($x['title']??'')?></h3><p><?=esc($x['description']??'')?></p></div></article><?php endforeach;?></div><a class="link-arrow" href="/expertise/">Barcha yo‘nalishlar&nbsp; ↗</a></div></section>
<section class="section"><div class="shell"><div class="section-head"><div><div class="eyebrow">03 / RESEARCH</div></div><h2 class="section-title">Ilmiy faoliyat va professional yutuqlar.</h2></div><div class="research-layout"><?php foreach(array_slice($publications,0,2) as $r):?><article class="research-card"><div class="year"><?=esc($r['year']??'')?></div><div><h3><?=esc($r['title']??'')?></h3><p><?=esc($r['source']??'')?></p></div></article><?php endforeach;?></div><a class="link-arrow" href="/research/">Ilmiy faoliyatni ko‘rish&nbsp; ↗</a></div></section>
<section class="section"><div class="shell"><div class="contact-band"><div><div class="eyebrow" style="color:#b8d6d1">04 / CONTACT</div><h2><?=esc($contact['headline']??'Qabul uchun bog‘laning.')?></h2><p><?=esc($contact['address']??'')?></p></div><div class="contact-actions"><a class="button" href="/contact/">Aloqa va qabul&nbsp; ↗</a></div></div></div></section>
</main>
<footer class="footer shell"><span>© <?=date('Y')?> <?=esc($doctor['name']??'Doctor')?></span><span>Personal medical portfolio</span></footer>
</body>
</html>