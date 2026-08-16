<?php
declare(strict_types=1);
function read_json(string $file): array {
    $path = __DIR__ . '/data/' . $file;
    if (!is_file($path)) return [];
    $data = json_decode((string) file_get_contents($path), true);
    return is_array($data) ? $data : [];
}
function e(mixed $value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
$media = read_json('media.json');
$items = is_array($media['items'] ?? null) ? $media['items'] : [];
$doctor = read_json('doctor.json');
$portfolio = read_json('portfolio.json');
$categories = [
    'all' => 'Barchasi',
    'portrait' => 'Portret',
    'surgery' => 'Neyroxirurgiya',
    'clinical' => 'Klinik faoliyat',
    'consultation' => 'Konsultatsiya',
    'international' => 'Xalqaro faoliyat',
    'professional' => 'Professional'
];
?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<meta name="theme-color" content="#0F5C4D">
<meta name="description" content="Jahongir Neuro — real professional media arxivi, klinik faoliyat va neyroxirurgiya amaliyoti.">
<title>Portfolio & Media — <?=e($doctor['name'] ?? 'Jahongir Neuro')?></title>
<style>
:root{--bg:#f3f6f4;--paper:#fff;--ink:#0f1714;--muted:#68756f;--g:#0f5c4d;--deep:#174f45;--soft:#e3eeea;--line:rgba(15,23,20,.09);--shadow:0 28px 90px rgba(15,92,77,.10);--ease:cubic-bezier(.22,1,.36,1)}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,-apple-system,BlinkMacSystemFont,"SF Pro Display","Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}a{text-decoration:none;color:inherit}button{font:inherit}.wrap{width:min(1220px,calc(100% - 40px));margin:auto}.nav{position:fixed;z-index:50;top:16px;left:50%;transform:translateX(-50%);width:min(1160px,calc(100% - 28px));height:62px;padding:7px 9px 7px 19px;display:flex;align-items:center;gap:20px;background:rgba(255,255,255,.80);border:1px solid rgba(255,255,255,.95);border-radius:999px;backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);box-shadow:0 18px 60px rgba(15,92,77,.10)}.brand{font-weight:850;letter-spacing:-.055em;font-size:16px;white-space:nowrap}.brand span{color:var(--g)}.links{display:flex;align-items:center;gap:4px;margin-left:auto}.links a{font-size:13px;color:#5e6b66;padding:10px 12px;border-radius:999px}.links a:hover,.links .active{background:var(--soft);color:var(--deep)}.cta{background:var(--g)!important;color:#fff!important;padding:11px 17px!important;font-weight:750}.hero{padding:155px 0 80px}.eyebrow{display:flex;align-items:center;gap:10px;color:var(--g);font-size:11px;font-weight:850;letter-spacing:.16em;text-transform:uppercase}.dot{width:7px;height:7px;border-radius:50%;background:var(--g);box-shadow:0 0 0 6px var(--soft)}h1{font-size:clamp(58px,9vw,132px);line-height:.84;letter-spacing:-.082em;margin:23px 0 30px;max-width:1000px}h1 em{font-style:normal;color:var(--g)}.hero p{max-width:700px;color:var(--muted);font-size:clamp(18px,2vw,23px);line-height:1.5;margin:0}.hero-meta{display:flex;gap:10px;flex-wrap:wrap;margin-top:34px}.metric{background:#fff;border:1px solid var(--line);padding:10px 14px;border-radius:999px;font-size:12px;color:#55635d}.metric strong{color:var(--g);font-size:15px;margin-right:4px}.filters{position:sticky;top:91px;z-index:20;margin-bottom:30px;display:flex;gap:7px;overflow:auto;padding:7px;background:rgba(255,255,255,.75);border:1px solid rgba(255,255,255,.9);backdrop-filter:blur(22px);-webkit-backdrop-filter:blur(22px);border-radius:999px;box-shadow:0 14px 45px rgba(15,92,77,.08)}.filter{border:0;background:transparent;color:#64716c;padding:11px 15px;border-radius:999px;cursor:pointer;white-space:nowrap;font-size:12px;font-weight:700}.filter.active{background:var(--g);color:#fff}.gallery{columns:3 300px;column-gap:14px}.media-card{break-inside:avoid;margin:0 0 14px;background:#fff;border:1px solid var(--line);border-radius:25px;overflow:hidden;box-shadow:0 8px 30px rgba(15,92,77,.04);transition:transform .5s var(--ease),box-shadow .5s var(--ease);position:relative}.media-card:hover{transform:translateY(-5px);box-shadow:0 25px 65px rgba(15,92,77,.13)}.media-visual{position:relative;background:linear-gradient(145deg,#dce9e4,#b9d0c8);min-height:250px;overflow:hidden}.media-visual img,.media-visual video{width:100%;height:auto;min-height:250px;max-height:650px;display:block;object-fit:cover}.media-visual video{background:#101613}.media-fallback{position:absolute;inset:0;display:none;place-items:center;padding:25px;text-align:center;background:linear-gradient(145deg,#dfece7,#c5d9d2);color:var(--deep)}.media-fallback strong{display:block;font-size:15px}.media-fallback span{display:block;margin-top:8px;font-size:11px;color:var(--muted);line-height:1.5}.media-card.heic .media-fallback{display:grid}.media-card.heic img{opacity:0;position:absolute;inset:0;height:100%;object-fit:cover}.media-card.heic.loaded .media-fallback{display:none}.media-card.heic.loaded img{opacity:1;position:relative;height:auto}.media-info{padding:15px 16px 17px}.media-top{display:flex;justify-content:space-between;gap:12px;align-items:center}.media-category{font-size:9px;font-weight:850;letter-spacing:.13em;text-transform:uppercase;color:var(--g)}.media-no{font-size:10px;color:#9aa49f}.media-title{font-size:16px;font-weight:750;letter-spacing:-.025em;margin-top:8px}.media-actions{display:flex;gap:7px;margin-top:12px}.open{font-size:11px;color:var(--g);font-weight:750;border:1px solid var(--line);border-radius:999px;padding:7px 10px}.open:hover{background:var(--soft)}.video-badge{position:absolute;left:12px;top:12px;background:rgba(15,23,20,.72);color:#fff;padding:7px 10px;border-radius:999px;font-size:10px;font-weight:750;backdrop-filter:blur(10px)}.archive{margin:110px 0 70px;background:var(--deep);color:#fff;border-radius:40px;padding:clamp(40px,7vw,85px);display:grid;grid-template-columns:.65fr 1.35fr;gap:55px;box-shadow:0 30px 90px rgba(15,92,77,.18)}.archive .eyebrow{color:#b8d8ce}.archive h2{font-size:clamp(43px,6vw,78px);line-height:.92;letter-spacing:-.07em;margin:0}.archive p{color:rgba(255,255,255,.68);font-size:15px;line-height:1.7;max-width:600px}.footer{border-top:1px solid var(--line);padding:28px 0 45px;color:#78837e;font-size:12px;display:flex;justify-content:space-between}.reveal{animation:up .85s var(--ease) both}@keyframes up{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:none}}
@media(max-width:900px){.links a:not(.cta){display:none}.hero{padding-top:125px}.archive{grid-template-columns:1fr}.gallery{columns:2 250px}}
@media(max-width:600px){.wrap{width:calc(100% - 24px)}.nav{top:9px;width:calc(100% - 18px);height:58px;padding-left:15px}.hero{padding:105px 0 55px}.hero h1{font-size:clamp(55px,16vw,78px)}.filters{top:76px;border-radius:18px}.filter{padding:10px 12px}.gallery{columns:1}.media-card{border-radius:22px}.media-visual img,.media-visual video{max-height:none}.archive{margin-top:70px;padding:32px 25px;border-radius:28px}.footer{display:block}.footer span{display:block;margin-top:8px}}
@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.reveal,.media-card{animation:none;transition:none}}
</style>
</head>
<body>
<nav class="nav" aria-label="Asosiy navigatsiya">
<a class="brand" href="index.php">Jahongir <span>Neuro</span></a>
<div class="links"><a href="index.php">Bosh sahifa</a><a href="about.php">Men haqimda</a><a href="services.php">Yo‘nalishlar</a><a class="active" href="portfolio.php">Portfolio</a><a class="cta" href="contact.php">Bog‘lanish</a></div>
</nav>
<main>
<section class="hero wrap reveal">
<div class="eyebrow"><i class="dot"></i> Real professional archive</div>
<h1>Ilm. Amaliyot.<br><em>Dalil.</em></h1>
<p>Jahongir Neuro platformasidagi real klinik faoliyat, neyroxirurgiya amaliyoti, konsultatsiyalar va professional uchrashuvlarning to‘liq media arxivi.</p>
<div class="hero-meta"><span class="metric"><strong><?=count($items)?></strong> media</span><span class="metric">Original fayllar saqlangan</span><span class="metric">Clinical · Research · Professional</span></div>
</section>
<section class="wrap">
<div class="filters" role="tablist" aria-label="Media filtrlari">
<?php foreach($categories as $key=>$label): ?><button class="filter <?=$key==='all'?'active':''?>" type="button" data-filter="<?=e($key)?>"><?=e($label)?></button><?php endforeach; ?>
</div>
<div class="gallery" id="gallery">
<?php foreach($items as $index=>$item):
    $path=(string)($item['path']??''); $type=(string)($item['type']??'image'); $category=(string)($item['category']??'professional'); $name=(string)($item['name']??basename($path)); $title=(string)($item['title']??'Professional media'); $isHeic=strtolower(pathinfo($name,PATHINFO_EXTENSION))==='heic';
?>
<article class="media-card <?=$isHeic?'heic':''?>" data-category="<?=e($category)?>">
<div class="media-visual">
<?php if($type==='video'): ?><span class="video-badge">VIDEO · MOV</span><video controls preload="metadata" playsinline><source src="<?=e($path)?>" type="video/quicktime"></video><?php else: ?><img src="<?=e($path)?>" alt="<?=e($title)?> — Jahongir Neuro" loading="lazy" decoding="async" onload="this.closest('.media-card').classList.add('loaded')" onerror="this.closest('.media-card').classList.remove('loaded')"><div class="media-fallback"><div><strong><?=e($name)?></strong><span>Original HEIC fayl saqlangan.<br>Qurilma previewni qo‘llamasa, originalni oching.</span></div></div><?php endif; ?>
</div>
<div class="media-info"><div class="media-top"><span class="media-category"><?=e($category)?></span><span class="media-no">#<?=str_pad((string)($index+1),2,'0',STR_PAD_LEFT)?></span></div><div class="media-title"><?=e($title)?></div><div class="media-actions"><a class="open" href="<?=e($path)?>" target="_blank" rel="noopener">Originalni ochish ↗</a></div></div>
</article>
<?php endforeach; ?>
</div>
</section>
<section class="wrap archive">
<div><div class="eyebrow">Archive system</div></div>
<div><h2>Har bir surat — professional yo‘lning bir qismi.</h2><p>Bu sahifa mavjud original media fayllarni o‘zgartirmaydi. HEIC va MOV fayllari aynan repositorydagi original nomi va yo‘li bilan saqlanadi; platforma ularni kategoriyalar bo‘yicha ko‘rsatadi.</p></div>
</section>
</main>
<footer class="footer wrap"><span>© <?=date('Y')?> <?=e($doctor['name']??'Jahongir Neuro')?></span><span>Professional medical portfolio · <?=count($items)?> media</span></footer>
<script>
const buttons=[...document.querySelectorAll('.filter')];
const cards=[...document.querySelectorAll('.media-card')];
buttons.forEach(button=>button.addEventListener('click',()=>{const filter=button.dataset.filter;buttons.forEach(b=>b.classList.toggle('active',b===button));cards.forEach(card=>{card.hidden=filter!=='all'&&card.dataset.category!==filter;});}));
</script>
</body>
</html>
