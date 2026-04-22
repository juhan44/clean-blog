<?php 
    require_once '../../app/core/App.php';

    $database = new Database();
    $db = $database->getConnection();

    $categoryObj = new Category($db);
    $postObj = new Post($db);

    $categories = $categoryObj->getAll();
    $posts = $postObj->getAll(); 

    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $type = $_GET['type'];
        $id = (int)$_GET['id'];
        if ($type === 'category') {
            $categoryObj->delete($id);
            header("Location: admin.php?status=deleted");
            exit();
        }
        if ($type === 'post') {
            $postObj->delete($id);
            header("Location: admin.php?status=deleted");
            exit();
        }
    }

    if (isset($_POST['add_post'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            // Logika pre nahrávanie (Slide 44)
        } else {
            $error = "Nastala chyba pri nahrávaní súboru.";
        }
    }
?>

<?php include 'partials/header-admin.php'; ?>

<main class="main-content">
    <div class="page-header">
        <h1>Prehľad webu</h1>
        <p>Tu vidíš aktuálny obsah tvojho blogu.</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Počet článkov</h3>
            <p style="font-size: 2rem; font-weight: bold;"><?php echo count($posts); ?></p>
        </div>
    </div>

    <div class="content-card" style="margin-top: 2rem; background: var(--card-bg); padding: 1.5rem; border-radius: 12px;">
        <h3>Zoznam článkov na webe</h3>
        <table style="width: 100%; border-collapse: collapse; margin-top: 1rem; margin-bottom: 1.5rem;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--border-color);">
                    <th style="padding: 10px;">Názov</th>
                    <th>Status</th>
                    <th>Dátum</th>
                    <th style="text-align: right; padding-right: 10px;">Akcie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 10px;"><?php echo htmlspecialchars($post->title); ?></td>
                    <td><span class="badge badge-green" style="background: rgba(34, 197, 94, 0.2); color: #22c55e; padding: 4px 8px; border-radius: 4px;">Publikované</span></td>
                    <td><?php echo date('d.m.Y', strtotime($post->created_at)); ?></td>
                    <td style="text-align: right; padding: 10px;">
                        <a href="post_edit.php?id=<?php echo $post->id; ?>" 
                           style="background: var(--warning); color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; margin-right: 5px; display: inline-flex; align-items: center; gap: 5px; font-size: 0.85rem;">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="?action=delete&type=post&id=<?php echo $post->id; ?>" 
                           onclick="return confirm('Naozaj vymazať tento článok?')"
                           style="background: var(--danger); color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; font-size: 0.85rem;">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="post_add.php" class="btn" style="background-color: var(--accent); color: #ffffff !important; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 600; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <i class="fas fa-plus-circle"></i> Pridať nový článok
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
                    <th style="text-align: right; padding-right: 10px;">Akcie</th>
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
                    <td style="text-align: right; padding: 12px;">
                        <a href="category_edit.php?id=<?php echo $cat->id; ?>" 
                           style="background: var(--warning); color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; margin-right: 5px; display: inline-flex; align-items: center; gap: 5px; font-size: 0.85rem;">
                           <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="?action=delete&type=category&id=<?php echo $cat->id; ?>" 
                           onclick="return confirm('Naozaj vymazať kategóriu?')"
                           style="background: var(--danger); color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; font-size: 0.85rem;">
                           <i class="fas fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="category_add.php" class="btn" style="background-color: var(--success); color: #ffffff !important; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 600; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <i class="fas fa-folder-plus"></i> Pridať novú kategóriu
        </a>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>