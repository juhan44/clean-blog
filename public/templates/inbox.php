<?php 
    require_once '../../app/core/App.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $contactObj = new Contact($db);
    $messages = $contactObj->getAllMessages();
    
    include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start;">
        <div>
            <h1 class="greeting">Inbox</h1>
            <p class="greeting-sub">Máte <?php echo count($messages); ?> správ</p>
        </div>
    </div>

    <div class="inbox-container">
        <div class="inbox-list">
            <div class="inbox-header">
                <div class="inbox-search">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" placeholder="Hľadať...">
                </div>
            </div>

            <div class="message-items">
                <?php if (empty($messages)): ?>
                    <div style="padding: 20px; text-align: center; opacity: 0.5;">Žiadne správy</div>
                <?php else: ?>
                    <?php foreach ($messages as $index => $msg): ?>
                        <div class="message-item <?php echo ($index === 0) ? 'active' : ''; ?>" 
                             onclick="updateInboxView(this, '<?php echo addslashes(htmlspecialchars($msg->name)); ?>', '<?php echo addslashes(htmlspecialchars($msg->email)); ?>', '<?php echo addslashes(htmlspecialchars($msg->message)); ?>', '<?php echo addslashes(htmlspecialchars($msg->phone ?? 'Neuvedené')); ?>')">
                            <div class="message-item-header">
                                <span class="message-sender"><?php echo htmlspecialchars($msg->name); ?></span>
                                <span class="message-time"><?php echo date('H:i', strtotime($msg->created_at ?? 'now')); ?></span>
                            </div>
                            <div class="message-subject">Správa z webu</div>
                            <div class="message-excerpt"><?php echo htmlspecialchars(substr($msg->message, 0, 45)) . '...'; ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="message-view">
            <?php if (!empty($messages)): $first = $messages[0]; ?>
                <div class="message-view-header">
                    <div class="message-view-title">
                        <h2 id="view-name-top"><?php echo htmlspecialchars($first->name); ?></h2>
                    </div>
                    <div class="message-view-info">
                        <div class="sender-avatar" id="view-avatar"><?php echo strtoupper(substr($first->name, 0, 1)); ?></div>
                        <div class="sender-details">
                            <div class="sender-name" id="view-name-small"><?php echo htmlspecialchars($first->name); ?></div>
                            <div class="sender-email" id="view-email"><?php echo htmlspecialchars($first->email); ?></div>
                            <div class="sender-email" id="view-phone" style="font-size: 0.75rem; margin-top: 2px; color: var(--accent);">
                                Tel: <?php echo htmlspecialchars($first->phone ?? 'Neuvedené'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="message-view-content">
                    <div id="view-body" style="line-height: 1.6; color: var(--text-primary);">
                        <?php echo nl2br(htmlspecialchars($first->message)); ?>
                    </div>
                </div>

                <div class="message-view-reply">
                    <textarea class="reply-input" placeholder="Napísať poznámku alebo odpoveď..."></textarea>
                    <div class="reply-actions">
                        <button class="btn btn-primary">Odoslať odpoveď</button>
                    </div>
                </div>
            <?php else: ?>
                <div style="display: flex; align-items: center; justify-content: center; height: 100%; opacity: 0.5;">
                    Inbox je prázdny
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<script>
function updateInboxView(element, name, email, message, phone) {
    document.getElementById('view-name-top').innerText = name;
    document.getElementById('view-name-small').innerText = name;
    document.getElementById('view-email').innerText = email;
    document.getElementById('view-phone').innerText = 'Tel: ' + phone;
    
    document.getElementById('view-body').innerHTML = message.replace(/\n/g, '<br>');
    
    document.getElementById('view-avatar').innerText = name.charAt(0).toUpperCase();

    const items = document.querySelectorAll('.message-item');
    items.forEach(item => item.classList.remove('active'));
    element.classList.add('active');
}
</script>

<?php include 'partials/footer-admin.php'; ?>