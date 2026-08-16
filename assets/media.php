<?php
declare(strict_types=1);

function site_media(): array {
    static $items = null;
    if ($items !== null) return $items;
    $file = __DIR__ . '/../data/media.json';
    $data = is_file($file) ? json_decode((string)file_get_contents($file), true) : [];
    $items = is_array($data['items'] ?? null) ? $data['items'] : [];
    return $items;
}

function media_pick(array $categories = [], int $limit = 8, int $offset = 0): array {
    $items = site_media();
    if ($categories) $items = array_values(array_filter($items, static fn($x) => in_array((string)($x['category'] ?? ''), $categories, true)));
    return array_slice($items, $offset, $limit);
}

function media_url(array $item): string { return '/' . ltrim((string)($item['path'] ?? ''), '/'); }
function media_ext(array $item): string { return strtolower(pathinfo((string)($item['name'] ?? ''), PATHINFO_EXTENSION)); }
function media_card(array $item, int $index = 0, string $class = ''): string {
    $url = htmlspecialchars(media_url($item), ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars((string)($item['title'] ?? 'Professional media'), ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars((string)($item['name'] ?? ''), ENT_QUOTES, 'UTF-8');
    $cat = htmlspecialchars((string)($item['category'] ?? 'professional'), ENT_QUOTES, 'UTF-8');
    $ext = media_ext($item);
    $isVideo = ($item['type'] ?? '') === 'video' || $ext === 'mov';
    $isHeic = $ext === 'heic';
    $body = $isVideo
        ? '<video controls preload="metadata" playsinline><source src="'.$url.'" type="video/quicktime"></video>'
        : ($isHeic
            ? '<a class="media-original" href="'.$url.'" target="_blank" rel="noopener"><div class="media-heic"><span>HEIC</span><strong>'.$name.'</strong><small>Original faylni ochish ↗</small></div></a>'
            : '<img src="'.$url.'" loading="lazy" decoding="async" alt="'.$title.' — Jahongir Neuro">');
    return '<article class="media-card '.htmlspecialchars($class, ENT_QUOTES, 'UTF-8').'" data-category="'.$cat.'"><div class="media-visual">'.$body.'</div><div class="media-caption"><span>'.$cat.'</span><strong>'.str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT).' · '.$title.'</strong></div></article>';
}

function media_styles(): string {
    return '<style>.media-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}.media-card{background:#fff;border:1px solid rgba(16,22,19,.08);border-radius:26px;overflow:hidden;box-shadow:0 14px 45px rgba(15,92,77,.06);transition:transform .45s cubic-bezier(.22,1,.36,1),box-shadow .45s ease}.media-card:hover{transform:translateY(-6px);box-shadow:0 28px 70px rgba(15,92,77,.13)}.media-visual{background:linear-gradient(145deg,#e3eee9,#c8d9d3);min-height:250px;overflow:hidden}.media-visual img,.media-visual video{width:100%;height:100%;min-height:250px;max-height:520px;display:block;object-fit:cover}.media-visual video{background:#101613}.media-original{display:block;height:100%;min-height:250px}.media-heic{min-height:250px;height:100%;padding:26px;display:flex;flex-direction:column;justify-content:flex-end;color:#174f45}.media-heic span{font-size:10px;font-weight:850;letter-spacing:.16em;color:#0f5c4d}.media-heic strong{font-size:18px;margin-top:10px;word-break:break-all}.media-heic small{margin-top:14px;color:#68756f}.media-caption{padding:14px 16px 17px}.media-caption span{display:block;font-size:9px;text-transform:uppercase;letter-spacing:.14em;color:#0f5c4d;font-weight:850}.media-caption strong{display:block;margin-top:7px;font-size:13px;line-height:1.35}@media(max-width:900px){.media-grid{grid-template-columns:repeat(2,1fr)}}@media(max-width:560px){.media-grid{grid-template-columns:1fr}.media-card{border-radius:22px}}</style>';
}
