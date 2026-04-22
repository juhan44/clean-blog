<?php 
    require_once '../../app/core/App.php';
?>

<?php include 'partials/header-admin.php'; ?>

<main class="main-content">
    <div class="page-header">
        <h1>Pridať novú kategóriu</h1>
        <a href="admin.php" style="text-decoration: none; color: var(--text-secondary);">
            <i class="fas fa-arrow-left"></i> Späť
        </a>
    </div>

    <div class="content-card" style="background: var(--bg-surface); padding: 2rem; border-radius: 12px; margin-top: 1rem; max-width: 600px;">
        <form action="admin.php" method="POST">
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Názov kategórie</label>
                <input type="text" name="name" required placeholder="napr. Cestovanie" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">URL Slug (identifikátor)</label>
                <input type="text" name="slug" required placeholder="napr. cestovanie" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);">
                <small style="color: var(--text-secondary);">Používajte malé písmená, čísla a pomlčky.</small>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Popis</label>
                <textarea name="description" rows="4" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);"></textarea>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" name="add_category" class="btn" style="background-color: var(--success); color: white; padding: 10px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                    <i class="fas fa-save"></i> Uložiť kategóriu
                </button>
                <a href="admin.php" style="padding: 10px 25px; color: var(--text-secondary); text-decoration: none;">Zrušiť</a>
            </div>
        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>