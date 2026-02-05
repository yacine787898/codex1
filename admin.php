<?php
$storageFile = __DIR__ . '/data/messages.json';
$messages = [];

if (file_exists($storageFile)) {
    $rawContent = file_get_contents($storageFile);
    $decoded = json_decode($rawContent ?: '[]', true);
    if (is_array($decoded)) {
        $messages = array_reverse($decoded);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Messages reçus</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="admin-body">
    <main class="admin-container glass">
        <h1>Messages reçus (Admin)</h1>
        <?php if (empty($messages)): ?>
            <p>Aucun message pour le moment.</p>
        <?php else: ?>
            <table class="messages-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $msg): ?>
                        <tr>
                            <td><?= htmlspecialchars($msg['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars($msg['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars($msg['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <button
                                    class="btn-glossy small"
                                    type="button"
                                    onclick="showMessage(<?= json_encode($msg['message'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>)">
                                    Afficher
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>

    <div id="message-modal" class="modal" aria-hidden="true">
        <div class="modal-content glass">
            <button class="close-btn" onclick="closeModal()">×</button>
            <h2>Message complet</h2>
            <p id="modal-message"></p>
        </div>
    </div>

    <script>
        function showMessage(content) {
            document.getElementById('modal-message').textContent = content;
            document.getElementById('message-modal').classList.add('open');
        }

        function closeModal() {
            document.getElementById('message-modal').classList.remove('open');
        }

        document.getElementById('message-modal').addEventListener('click', function (event) {
            if (event.target.id === 'message-modal') {
                closeModal();
            }
        });
    </script>
</body>
</html>
