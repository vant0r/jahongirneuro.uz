<?php

declare(strict_types=1);

function readJson(string $path, array $fallback = []): array
{
    if (!is_file($path)) return $fallback;
    $raw = file_get_contents($path);
    if ($raw === false) return $fallback;
    $data = json_decode($raw, true);
    return is_array($data) ? $data : $fallback;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$about = readJson(__DIR__ . '/data/about.json');
$doctor = readJson(__DIR__ . '/data/doctor.json');

$headline = (string)($about['headline'] ?? 'Professional yondashuv.');
$bio = (string)($about['bio'] ?? '');
$philosophy = (string)($about['philosophy'] ?? '');
$education = is_array($about['education'] ?? null) ? $about['education'] : [];
$experience = is_array($about['experience'] ?? null) ? $about['experience'] : [];
$name = (string)($doctor['name'] ?? 'Dr. Jahongir');
$title = (string)($doctor['title'] ?? 'Nevrolog');

function isPlaceholder(string $value): bool
{
    return preg_match('/universitet nomi|muassasa nomi|klinika nomi|tashkilot nomi/i', $value) === 1;
}
?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="<?= e($name) ?> — professional faoliyati, ta'limi va tajribasi.">
<title>Biz haqimizda — <?= e($name) ?></title>
<style>
:root{--bg:#f4f6f3;--surface:#fff;--ink:#101815;--muted:#68736e;--green:#0f5c4d;--deep:#174f45;--soft:#e3eeea;--line:rgba(16,24,21,.09);--shadow:0 24px 80px rgba(15,92,77,.10)}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--bg);color:var(--ink);font-family:-apple-system,BlinkMacSystemFont,"SF Pro Display","Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}a{color:inherit;text-decoration:none}button{font:inherit}.wrap{width:min(1180px,calc(100% - 40px));margin:auto}
.nav{position:sticky;top:18px;z-index:20;margin:18px auto 0;width:min(1100px,calc(100% - 32px));display:flex;align-items:center;justify-content:space-between;padding:10px 12px 10px 20px;background:rgba(255,255,255,.76);border:1px solid rgba(255,255,255,.8);backdrop-filter:blur(22px);-webkit-backdrop-filter:blur(22px);border-radius:999px;box-shadow:0 12px 40px rgba(15,92,77,.08)}.brand{display:flex;gap:10px;align-items:center;font-weight:760;letter-spacing:-.03em}.mark{width:30px;height:30px;border-radius:50%;background:var(--green);display:grid;place-items:center;color:#fff;font-size:13px}.links{display:flex;gap:5px;align-items:center}.links a{padding:10px 14px;border-radius:999px;color:#5d6763;font-size:13px}.links a:hover,.links a.active{background:var(--soft);color:var(--deep)}.nav-cta{background:var(--green);color:#fff!important;padding:11px 17px!important}
.hero{padding:110px 0 90px}.eyebrow{display:inline-flex;align-items:center;gap:9px;color:var(--green);font-size:12px;font-weight:760;letter-spacing:.13em;text-transform:uppercase}.dot{width:7px;height:7px;border-radius:50%;background:var(--green);box-shadow:0 0 0 5px var(--soft)}h1{font-size:clamp(54px,8vw,112px);line-height:.91;letter-spacing:-.075em;max-width:900px;margin:24px 0 34px;font-weight:700}h1 em{font-style:normal;color:var(--green)}.lead{max-width:620px;color:var(--muted);font-size:clamp(18px,2vw,23px);line-height:1.5;margin:0}.hero-grid{display:grid;grid-template-columns:1.2fr .8fr;gap:70px;align-items:end}.identity{padding-bottom:12px}.identity-card{background:var(--surface);border:1px solid var(--line);border-radius:34px;padding:30px;box-shadow:var(--shadow);position:relative;overflow:hidden}.identity-card:after{content:"";position:absolute;width:180px;height:180px;border-radius:50%;right:-70px;bottom:-100px;background:var(--soft)}.identity-name{font-size:28px;letter-spacing:-.045em;font-weight:700;margin:0 0 8px}.identity-role{color:var(--green);font-weight:650}.identity-line{height:1px;background:var(--line);margin:26px 0}.identity-small{color:var(--muted);font-size:14px;line-height:1.65;max-width:310px}
.section{padding:100px 0}.section-label{font-size:12px;text-transform:uppercase;letter-spacing:.14em;color:var(--green);font-weight:760;margin-bottom:22px}.section-title{font-size:clamp(38px,5vw,66px);line-height:1;letter-spacing:-.065em;margin:0;max-width:760px}.bio-grid{display:grid;grid-template-columns:.65fr 1.35fr;gap:90px;margin-top:60px}.bio-copy{font-size:22px;line-height:1.5;letter-spacing:-.025em}.bio-copy p{margin:0 0 25px}.philosophy{margin-top:30px;padding:28px 0 0;border-top:1px solid var(--line);font-size:15px;line-height:1.7;color:var(--muted)}.quote{font-size:clamp(28px,4vw,50px);line-height:1.08;letter-spacing:-.055em;color:var(--deep);max-width:720px}
.timeline{margin-top:65px;border-top:1px solid var(--line)}.timeline-item{display:grid;grid-template-columns:150px 1fr auto;gap:30px;padding:30px 0;border-bottom:1px solid var(--line);align-items:start}.period{color:var(--green);font-size:13px;font-weight:750}.item-title{font-size:22px;letter-spacing:-.035em;font-weight:680;margin-bottom:7px}.item-place,.item-desc{color:var(--muted);font-size:14px;line-height:1.55}.badge{font-size:11px;color:var(--green);background:var(--soft);padding:8px 11px;border-radius:999px;font-weight:700}
.education{background:var(--deep);color:#fff;border-radius:42px;padding:65px;margin-top:25px;box-shadow:0 30px 90px rgba(15,92,77,.18)}.education .section-label{color:#b8d8ce}.education .section-title{max-width:620px}.edu-list{margin-top:55px;display:grid;grid-template-columns:repeat(2,1fr);gap:14px}.edu-card{padding:27px;border:1px solid rgba(255,255,255,.12);background:rgba(255,255,255,.055);border-radius:24px}.edu-year{font-size:12px;color:#b8d8ce;font-weight:700}.edu-title{font-size:20px;margin:18px 0 8px;letter-spacing:-.03em}.edu-place{font-size:13px;color:rgba(255,255,255,.62)}
.cta{margin:30px 0 90px;background:linear-gradient(135deg,#0f5c4d,#174f45);color:#fff;border-radius:40px;padding:55px 60px;display:flex;align-items:center;justify-content:space-between;gap:30px;box-shadow:0 30px 90px rgba(15,92,77,.18)}.cta h2{font-size:clamp(34px,4vw,58px);line-height:.98;letter-spacing:-.06em;margin:0;max-width:650px}.cta a{background:#fff;color:var(--deep);padding:15px 22px;border-radius:999px;font-weight:700;white-space:nowrap}.footer{border-top:1px solid var(--line);padding:30px 0 45px;color:var(--muted);font-size:13px;display:flex;justify-content:space-between}.reveal{opacity:0;transform:translateY(24px);animation:show .8s cubic-bezier(.2,.75,.2,1) forwards}.d2{animation-delay:.12s}.d3{animation-delay:.22s}@keyframes show{to{opacity:1;transform:none}}
@media(max-width:800px){.links a:not(.nav-cta){display:none}.hero{padding:75px 0 60px}.hero-grid,.bio-grid{grid-template-columns:1fr;gap:35px}.hero-grid{display:flex;flex-direction:column}.identity-card{width:100%}.section{padding:70px 0}.timeline-item{grid-template-columns:1fr;gap:10px}.badge{width:max-content}.education{padding:35px 24px;border-radius:30px}.edu-list{grid-template-columns:1fr}.cta{padding:36px 26px;border-radius:30px;flex-direction:column;align-items:flex-start}.footer{flex-direction:column;gap:10px}h1{font-size:clamp(52px,16vw,80px)}}
@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.reveal{animation:none;opacity:1;transform:none}}
</style>
</head>
<body>
<nav class="nav" aria-label="Asosiy navigatsiya">
  <a class="brand" href="index.php"><span class="mark">JN</span><span>Jahongir Neuro</span></a>
  <div class="links"><a href="index.php">Bosh sahifa</a><a class="active" href="about.php">Men haqimda</a><a href="services.php">Xizmatlar</a><a href="portfolio.php">Portfolio</a><a class="nav-cta" href="contact.php">Bog‘lanish</a></div>
</nav>

<main>
<section class="hero wrap">
  <div class="hero-grid">
    <div class="identity reveal">
      <span class="eyebrow"><span class="dot"></span> Professional profil</span>
      <h1><?= e($headline) ?> <em>aniqlik bilan.</em></h1>
      <p class="lead"><?= e($bio) ?></p>
    </div>
    <aside class="identity-card reveal d2">
      <p class="identity-name"><?= e($name) ?></p>
      <p class="identity-role"><?= e($title) ?></p>
      <div class="identity-line"></div>
      <p class="identity-small">Klinik tajriba, dalillarga asoslangan qarorlar va bemor bilan ochiq muloqotga tayangan professional yondashuv.</p>
    </aside>
  </div>
</section>

<section class="section wrap">
  <div class="section-label">01 / Yondashuv</div>
  <h2 class="section-title">Tibbiyot — faqat bilim emas. Bu <em>aniq qaror</em> va insoniy muloqot.</h2>
  <div class="bio-grid">
    <div class="quote">“<?= e($philosophy) ?>”</div>
    <div class="bio-copy"><p><?= e($bio) ?></p><div class="philosophy">Har bir professional qaror individual klinik holat, mavjud dalillar va bemorning ehtiyojlarini hisobga olgan holda ko‘rilishi kerak.</div></div>
  </div>
</section>

<section class="section wrap">
  <div class="section-label">02 / Tajriba</div>
  <h2 class="section-title">Professional yo‘l — bosqichma-bosqich yig‘ilgan tajriba.</h2>
  <div class="timeline">
  <?php foreach ($experience as $item):
      $period = (string)($item['period'] ?? ''); $position = (string)($item['position'] ?? ''); $place = (string)($item['place'] ?? ''); $desc = (string)($item['description'] ?? '');
      if (isPlaceholder($place)) $place = 'Ma’lumot tasdiqlangach kiritiladi';
  ?>
    <article class="timeline-item"><div class="period"><?= e($period) ?></div><div><div class="item-title"><?= e($position) ?></div><div class="item-place"><?= e($place) ?></div><?php if($desc): ?><div class="item-desc"><?= e($desc) ?></div><?php endif; ?></div><span class="badge">Tajriba</span></article>
  <?php endforeach; ?>
  </div>
</section>

<section class="section wrap" style="padding-top:20px">
  <div class="education">
    <div class="section-label">03 / Ta’lim</div>
    <h2 class="section-title">Bilimning poydevori doimiy rivojlanishdan boshlanadi.</h2>
    <div class="edu-list">
    <?php foreach ($education as $item):
        $period=(string)($item['period']??''); $et=(string)($item['title']??''); $inst=(string)($item['institution']??'');
        if (isPlaceholder($inst)) $inst='Ma’lumot tasdiqlangach kiritiladi';
    ?>
      <article class="edu-card"><div class="edu-year"><?= e($period) ?></div><div class="edu-title"><?= e($et) ?></div><div class="edu-place"><?= e($inst) ?></div></article>
    <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="wrap cta">
  <h2>Professional masala bo‘yicha bog‘laning.</h2>
  <a href="contact.php">Bog‘lanish →</a>
</section>
</main>

<footer class="footer wrap"><span>© <?= date('Y') ?> Jahongir Neuro</span><span>Professional medical portfolio</span></footer>
</body>
</html>
