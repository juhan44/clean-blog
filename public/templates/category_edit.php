<?php 
    require_once '../../app/core/App.php';
    $database = new Database();
    $db = $database->getConnection();

    $categoryObj = new Category($db);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $category = $categoryObj->getById($id);

    if (!$category) {
        header("Location: admin.php");
        exit();
    }

    if (isset($_POST['update_category'])) {
        $updateData = [
            'name' => $_POST['name'],
            'slug' => $_POST['slug'],
            'description' => $_POST['description']
        ];

        if ($categoryObj->update($id, $updateData)) {
            header("Location: admin.php?status=updated");
            exit();
        }
    }
?>

<?php include 'partials/header-admin.php'; ?>

<main class="main-content">
    <div class="page-header">
        <h1>Upraviť kategóriu: <?php echo htmlspecialchars($category->name); ?></h1>
        <a href="admin.php" style="text-decoration: none; color: var(--text-secondary);">
            <i class="fas fa-arrow-left"></i> Späť
        </a>
    </div>

    <div class="content-card" style="background: var(--card-bg); padding: 2rem; border-radius: 12px; margin-top: 1rem; max-width: 600px;">
        <form action="" method="POST">
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Názov kategórie</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($category->name); ?>" required 
                       style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">URL Slug</label>
                <input type="text" name="slug" value="<?php echo htmlspecialchars($category->slug); ?>" required 
                       style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Popis</label>
                <textarea name="description" rows="4" 
                          style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--border-color); background: var(--bg-primary); color: var(--text-primary);"><?php echo htmlspecialchars($category->description ?? ''); ?></textarea>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" name="update_category" class="btn" style="background: var(--warning); color: white; padding: 10px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                    <i class="fas fa-save"></i> Uložiť zmeny
                </button>
                <a href="admin.php" style="padding: 10px 25px; color: var(--text-secondary); text-decoration: none;">Zrušiť</a>
            </div>
        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>