<?php 
    require_once '../../app/core/App.php';

    $database = new Database();
    $db = $database->getConnection();

    $categoryObj = new Category($db);
    $categories = $categoryObj->getAll();
?>

<?php include 'partials/header-admin.php'; ?>

<main class="main-content">
    <div class="page-header">
        <h1>Pridať nový článok</h1>
        <a href="admin.php" class="btn-back" style="text-decoration: none; color: var(--text-secondary);">
            <i class="fas fa-arrow-left"></i> Späť na prehľad
        </a>
    </div>

    <div class="content-card" style="background: var(--bg-surface); padding: 2rem; border-radius: 12px; margin-top: 1rem;">
        <form action="admin.php" method="POST" enctype="multipart/form-data">
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Názov článku</label>
                <input type="text" name="title" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Kategória</label>
                <select name="category_id" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo $cat->id; ?>"><?php echo htmlspecialchars($cat->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Obrázok článku</label>
                <input type="file" name="image" accept="image/*" required style="width: 100%; color: var(--text-primary);">
                <small style="color: var(--text-secondary);">Podporované formáty: JPG, PNG, GIF</small>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Obsah článku</label>
                <textarea name="content" rows="8" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);"></textarea>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" name="add_post" class="btn" style="background-color: var(--success); color: white; padding: 10px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                    <i class="fas fa-save"></i> Uložiť článok
                </button>
                <a href="admin.php" style="padding: 10px 25px; color: var(--text-secondary); text-decoration: none;">Zrušiť</a>
            </div>
        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>