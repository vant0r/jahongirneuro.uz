<?php
function nav(string $active): string {
    $items = [
        'home' => ['Bosh sahifa', '/'],
        'about' => ['Men haqimda', '/about.php'],
        'expertise' => ['Mutaxassislik', '/services.php'],
        'evidence' => ['Portfolio', '/portfolio.php'],
    ];
    $html = '<div class="nav-links">';
    foreach ($items as $key => [$label, $href]) {
        $class = $active === $key ? ' class="active"' : '';
        $html .= '<a'.$class.' href="'.h($href).'">'.h($label).'</a>';
    }
    return $html . '<a class="nav-cta" href="/contact.php">Bog‘lanish <span>↗</span></a></div>';
}

function media_card(array $item, int $index = 0): string {
    $src = h(media_src($item));
    $title = h($item['title'] ?? 'Professional media');
    $category = h($item['category'] ?? 'professional');
    $type = strtolower((string) ($item['type'] ?? 'image'));
    $ext = strtolower(pathinfo((string) ($item['name'] ?? ''), PATHINFO_EXTENSION));
    if ($type === 'video' || $ext === 'mov') {
        $visual = '<video controls preload="metadata" playsinline><source src="'.$src.'" type="video/quicktime"></video>';
    } else {
        $visual = '<img src="'.$src.'" alt="'.$title.' — Jahongir Neuro" loading="lazy" decoding="async">';
    }
    return '<article class="media-card" data-category="'.$category.'"><div class="media-visual">'.$visual.'</div><div class="media-caption"><span>'.str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT).' · '.$category.'</span><strong>'.$title.'</strong></div></article>';
}

function site_header(string $active, string $title = ''): void { ?>
<!doctype html>
<html lang="uz">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#f7f9f7">
<meta name="description" content="Jahongir Neuro — premium professional neyroxirurg portfolio.">
<title><?= page_title($title) ?></title>
<link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
<div class="site-noise" aria-hidden="true"></div>
<header class="site-header">
  <a class="brand" href="/"><span>Jahongir</span><i>Neuro</i></a>
  <nav class="desktop-nav" aria-label="Asosiy navigatsiya"><?= nav($active) ?></nav>
  <button class="menu-button" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Menyuni ochish"><span></span></button>
</header>
<nav id="mobile-menu" class="mobile-menu" aria-hidden="true" aria-label="Mobil navigatsiya"><?= nav($active) ?></nav>
<div class="menu-backdrop"></div>
<?php }

function site_footer(): void { ?>
<footer class="site-footer shell">
  <div><strong>Jahongir <i>Neuro</i></strong><span>Professional medical portfolio</span></div>
  <div><span>© <?= current_year() ?> Jahongir Neuro</span><a href="/contact.php">Bog‘lanish ↗</a></div>
</footer>
<script src="/assets/js/app.js" defer></script>
</body>
</html>
<?php }
