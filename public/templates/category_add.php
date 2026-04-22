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

    <div class="content-card" style="margin-top: 2rem; background: var(--card-bg); padding: 1.5rem; border-radius: 12px;">
    <h3 class="mb-4">Zoznam kategórií</h3>
    <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 1rem; margin-bottom: 1.5rem;">
        <thead style="background: var(--bg-surface);">
            <tr style="text-align: left; border-bottom: 2px solid var(--border-color);">
                <th style="padding: 12px;">ID</th>
                <th>Názov</th>
                <th>Slug</th>
                <th style="text-align: center;">Články</th>
                <th style="text-align: right; padding-right: 20px;">Akcie</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $cat): ?>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 12px;">#<?php echo htmlspecialchars((string)$cat->id); ?></td>
                    <td><strong><?php echo htmlspecialchars($cat->name); ?></strong></td>
                    <td><code><?php echo htmlspecialchars($cat->slug); ?></code></td>
                    <td style="text-align: center;">
                        <span class="badge" style="background: var(--accent-light); color: var(--accent); padding: 4px 8px; border-radius: 4px;">
                            <?php echo htmlspecialchars((string)$cat->post_count); ?>
                        </span>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <a href="category_edit.php?id=<?php echo $cat->id; ?>" 
                           style="background: var(--warning); color: white; padding: 6px 10px; border-radius: 4px; text-decoration: none; margin-right: 5px; display: inline-flex; align-items: center;">
                           <i class="fas fa-edit"></i>
                        </a>
                        
                        <a href="?action=delete&type=category&id=<?php echo $cat->id; ?>" 
                           onclick="return confirm('Naozaj vymazať kategóriu?')"
                           style="background: var(--danger); color: white; padding: 6px 10px; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center;">
                           <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="category_add.php" class="btn" style="background-color: var(--success); color: #ffffff !important; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 600;">
        <i class="fas fa-folder-plus"></i> Pridať novú kategóriu
    </a>
</div>
</main>

<?php include 'partials/footer-admin.php'; ?>