<?php
// Save password for inline edit mode
session_start();
header('Content-Type: application/json');

$passwordFile = __DIR__ . '/../data/.edit_password.json';

// Initialize default password if file doesn't exist
if (!is_file($passwordFile)) {
    $defaultData = ['password' => '2026', 'created_at' => date('c')];
    file_put_contents($passwordFile, json_encode($defaultData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $newPassword = trim($input['password'] ?? '');
    
    if (empty($newPassword)) {
        echo json_encode(['success' => false, 'error' => 'Parol bo\'sh bo\'lishi mumkin emas']);
        exit;
    }
    
    // Save new password
    $data = [
        'password' => $newPassword,
        'updated_at' => date('c')
    ];
    
    if (file_put_contents($passwordFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX) !== false) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Faylga yozishda xatolik']);
    }
} else {
    // Return current password (for verification)
    if (is_file($passwordFile)) {
        $data = json_decode(file_get_contents($passwordFile), true);
        echo json_encode(['password' => $data['password'] ?? '2026']);
    } else {
        echo json_encode(['password' => '2026']);
    }
}
