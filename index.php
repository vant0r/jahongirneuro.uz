<?php

declare(strict_types=1);

$doctorFile = __DIR__ . '/data/doctor.json';
$doctor = is_file($doctorFile) ? json_decode((string) file_get_contents($doctorFile), true) : [];
$doctor = is_array($doctor) ? $doctor : [];

function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function v(mixed $value, string $fallback = ''): string { return is_string($value) ? $value : $fallback; }

$name = v($doctor['name'] ?? null, 'Dr. Jahongir');
$title = v($doctor['title'] ?? null, 'Nevrolog');
$bio = v($doctor['bio'] ?? null);
$phone = v($doctor['contact']['phone'] ?? null);
$telegram = v($doctor['contact']['telegram'] ?? null);
?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?= e($name) ?> — <?= e($title) ?>. Shaxsiy professional portfolio.">
<title><?= e($name) ?> — <?= e($title) ?></title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header" id="top">
<a class="brand" href="#top"><?= e($name) ?></a>
<nav aria-label="Asosiy navigatsiya"><a href="#about">Men haqimda</a><a href="#expertise">Mutaxassislik</a><a href="#experience">Tajriba</a><a href="#education">Ta'lim</a><a href="#certificates">Sertifikatlar</a><a href="#contact">Aloqa</a></nav>
<a class="header-cta" href="#contact">Qabulga yozilish</a>
</header>
<main>
<section class="hero section-shell"><div class="hero-copy"><p class="eyebrow"><?= e($title) ?></p><h1><?= e($name) ?></h1><p class="hero-text"><?= e($bio) ?></p><div class="hero-actions"><a class="button button-dark" href="#contact">Qabulga yozilish</a><a class="button button-light" href="#about">Portfolio bilan tanishish</a></div><div class="hero-stats"><?php foreach (($doctor['stats'] ?? []) as $stat): ?><div class="stat"><strong><?= e(v($stat['value'] ?? null)) ?></strong><span><?= e(v($stat['label'] ?? null)) ?></span></div><?php endforeach; ?></div></div><div class="portrait-wrap"><div class="portrait-card"><img src="assets/images/doctor.jpg" alt="<?= e($name) ?>" onerror="this.style.display='none';this.parentElement.classList.add('portrait-placeholder')"><span class="portrait-placeholder-text">Doctor portrait</span></div></div></section>
<section class="section-shell section" id="about"><div class="section-heading"><p class="eyebrow">01 / PROFIL</p><h2>Professional yondashuv.</h2></div><div class="two-column"><p class="lead"><?= e(v($doctor['profile'] ?? null)) ?></p><div class="soft-card"><p class="card-label">Asosiy yo‘nalish</p><h3><?= e($title) ?></h3><p><?= e(v($doctor['focus'] ?? null)) ?></p></div></div></section>
<section class="section-shell section" id="expertise"><div class="section-heading"><p class="eyebrow">02 / EXPERTISE</p><h2>Mutaxassislik yo‘nalishlari.</h2></div><div class="card-grid"><?php foreach (($doctor['expertise'] ?? []) as $i => $item): ?><article class="info-card"><span class="card-number"><?= str_pad((string)($i+1), 2, '0', STR_PAD_LEFT) ?></span><h3><?= e(v($item['title'] ?? null)) ?></h3><p><?= e(v($item['description'] ?? null)) ?></p></article><?php endforeach; ?></div></section>
<section class="section-shell section" id="experience"><div class="section-heading"><p class="eyebrow">03 / CAREER</p><h2>Tajriba va faoliyat.</h2></div><div class="timeline"><?php foreach (($doctor['experience'] ?? []) as $item): ?><article class="timeline-item"><span><?= e(v($item['period'] ?? null)) ?></span><div><h3><?= e(v($item['position'] ?? null)) ?></h3><p><?= e(v($item['place'] ?? null)) ?></p><small><?= e(v($item['description'] ?? null)) ?></small></div></article><?php endforeach; ?></div></section>
<section class="section-shell section" id="education"><div class="section-heading"><p class="eyebrow">04 / EDUCATION</p><h2>Ta’lim va malaka.</h2></div><div class="list-grid"><?php foreach (($doctor['education'] ?? []) as $item): ?><article class="list-item"><span><?= e(v($item['year'] ?? null)) ?></span><div><h3><?= e(v($item['title'] ?? null)) ?></h3><p><?= e(v($item['institution'] ?? null)) ?></p></div></article><?php endforeach; ?></div></section>
<section class="section-shell section" id="certificates"><div class="section-heading"><p class="eyebrow">05 / CREDENTIALS</p><h2>Sertifikatlar va yutuqlar.</h2></div><div class="certificate-grid"><?php foreach (($doctor['certificates'] ?? []) as $item): ?><article class="certificate"><span><?= e(v($item['year'] ?? null)) ?></span><h3><?= e(v($item['title'] ?? null)) ?></h3><p><?= e(v($item['issuer'] ?? null)) ?></p></article><?php endforeach; ?></div></section>
<section class="section-shell section" id="contact"><div class="contact-card"><div><p class="eyebrow">06 / CONTACT</p><h2>Qabul uchun bog‘laning.</h2><p><?= e(v($doctor['contact']['address'] ?? null)) ?></p></div><div class="contact-links"><?php if ($phone): ?><a href="tel:<?= e($phone) ?>"><?= e($phone) ?></a><?php endif; ?><?php if ($telegram): ?><a href="<?= e($telegram) ?>" target="_blank" rel="noopener">Telegram orqali yozish</a><?php endif; ?></div></div></section>
</main><footer class="footer section-shell"><span>© <?= date('Y') ?> <?= e($name) ?></span><a href="#top">Yuqoriga ↑</a></footer><script src="assets/js/app.js" defer></script>
</body></html>
