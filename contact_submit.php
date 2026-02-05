<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    header('Location: index.php?error=' . urlencode('Tous les champs sont obligatoires.'));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?error=' . urlencode('Adresse email invalide.'));
    exit;
}

if (mb_strlen($message) > 1000) {
    header('Location: index.php?error=' . urlencode('Le message dépasse 1000 caractères.'));
    exit;
}

$storageFile = __DIR__ . '/data/messages.json';

if (!file_exists($storageFile)) {
    file_put_contents($storageFile, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

$rawContent = file_get_contents($storageFile);
$messages = json_decode($rawContent ?: '[]', true);

if (!is_array($messages)) {
    $messages = [];
}

$messages[] = [
    'id' => uniqid('msg_', true),
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'created_at' => date('Y-m-d H:i:s'),
];

file_put_contents($storageFile, json_encode($messages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header('Location: index.php?success=1#contact');
exit;
