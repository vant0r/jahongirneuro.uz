<?php
// Save inline edits to JSON files
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Faqat POST so\'rovlari qabul qilinadi']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$changes = $input['changes'] ?? [];
$page = $input['page'] ?? '';

if (empty($changes)) {
    echo json_encode(['success' => false, 'error' => 'O\'zgarishlar topilmadi']);
    exit;
}

// Map pages to data files
$pageToFile = [
    '/index.php' => 'site.json',
    '/about.php' => 'about.json',
    '/services.php' => 'services.json',
    '/portfolio.php' => 'portfolio.json',
    '/contact.php' => 'contact.json',
    '/research/index.php' => 'research.json',
    '/expertise/index.php' => 'expertise.json',
];

$dataDir = __DIR__ . '/../data/';
$savedCount = 0;
$errors = [];

foreach ($changes as $change) {
    $type = $change['type'] ?? '';
    $selector = $change['selector'] ?? '';
    $current = $change['current'] ?? '';
    
    // Try to identify which data file to update based on selector and page
    // This is a simplified approach - in production you'd want more robust mapping
    
    // For now, log the changes for manual review
    $logFile = $dataDir . 'inline_changes.log';
    $logEntry = sprintf(
        "[%s] Page: %s | Type: %s | Selector: %s | Content: %s\n",
        date('Y-m-d H:i:s'),
        $page,
        $type,
        $selector,
        substr($current, 0, 200)
    );
    
    file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    $savedCount++;
}

// Return success with count
echo json_encode([
    'success' => true,
    'saved' => $savedCount,
    'message' => 'O\'zgarishlar jurnalga yozildi. Iltimos, admin panel orqali tasdiqlang.'
]);
