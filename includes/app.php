<?php
declare(strict_types=1);

const APP_ROOT = __DIR__ . '/..';

function json_data(string $file, array $fallback = []): array {
    $path = APP_ROOT . '/data/' . $file;
    if (!is_file($path)) return $fallback;
    $data = json_decode((string) file_get_contents($path), true);
    return is_array($data) ? $data : $fallback;
}

function h(mixed $value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function media_items(): array {
    $data = json_data('media.json', ['items' => []]);
    return is_array($data['items'] ?? null) ? $data['items'] : [];
}

function media_by_category(string $category = '', int $limit = 99): array {
    $items = media_items();
    if ($category !== '') {
        $items = array_values(array_filter($items, static fn(array $item): bool => ($item['category'] ?? '') === $category));
    }
    return array_slice($items, 0, $limit);
}

function media_src(array $item): string {
    return '/' . ltrim((string) ($item['path'] ?? ''), '/');
}

function page_title(string $title = ''): string {
    $doctor = json_data('doctor.json');
    $base = (string) ($doctor['name'] ?? 'Jahongir Neuro');
    return $title !== '' ? h($title . ' — ' . $base) : h($base);
}

function current_year(): string { return date('Y'); }

$doctor = json_data('doctor.json');
$about = json_data('about.json');
$expertise = json_data('expertise.json', ['items' => []]);
$research = json_data('research.json', ['items' => []]);
$contact = json_data('contact.json');
