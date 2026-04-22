<?php 
    include 'partials/header-admin.php'; 
    include 'partials/post_data.php'; // Načítame tie isté dáta ako na webe
    $database = new Database();
    $db = $database->getConnection();

    $categoryObj = new Category($db);
    $postObj = new Post($db);

    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $id = (int)$_GET['id'];
        $type = $_GET['type'];

        switch ($type) {
            case 'category':
                $categoryObj->delete($id);
                break;
            case 'post':
                $postObj->delete($id);
                break;
        }

        header("Location: admin.php?success=deleted");
        exit();
    }

    $categories = $categoryObj->getAll();
?>

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
        <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
            <thead>
                <tr style="text-align: left; border-bottom: 1px solid var(--border-color);">
                    <th style="padding: 10px;">Názov</th>
                    <th>Status</th>
                    <th>Dátum</th>
                    <th>Akcie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 10px;"><?php echo $post['title']; ?></td>
                    <td><span class="badge <?php echo ($post['status'] == 'Publikované') ? 'badge-green' : 'badge-orange'; ?>">
                        <?php echo $post['status']; ?>
                    </span></td>
                    <td><?php echo $post['date']; ?></td>
                    <td>
                        <a href="#" style="color: var(--primary); text-decoration: none; margin-right: 10px;">Upraviť</a>
                        <a href="#" style="color: var(--danger); text-decoration: none;">Zmazať</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <h3 class="mb-4">Zoznam kategórií</h3>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Názov kategórie</th>
            <th>Slug</th>
            <th>Popis</th>
            <th class="text-center">Počet článkov</th>
            <th>Dátum vytvorenia</th>
            <th class="text-center">Akcie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $cat): ?>
            <tr>
                <td>#<?php echo htmlspecialchars((string)$cat->id); ?></td>
                <td><strong><?php echo htmlspecialchars($cat->name); ?></strong></td>
                <td><code><?php echo htmlspecialchars($cat->slug); ?></code></td>
                <td><?php echo htmlspecialchars($cat->description ?? 'Bez popisu'); ?></td>
                <td class="text-center">
                    <span class="badge bg-info text-dark">
                        <?php echo htmlspecialchars((string)$cat->post_count); ?>
                    </span>
                </td>
                <td><?php echo date('d.m.Y', strtotime($cat->created_at)); ?></td>
                <td class="text-center">
                    <a href="category_edit.php?id=<?php echo $cat->id; ?>" 
                       class="btn btn-sm btn-warning">
                       <i class="fas fa-edit"></i> Upraviť
                    </a>
                    
                    <a href="?action=delete&type=category&id=<?php echo $cat->id; ?>" 
                    class="btn btn-sm btn-danger" 
                    onclick="return confirm('Naozaj vymazať kategóriu aj s článkami?')">
                    <i class="fas fa-trash"></i> Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</main>

<?php include 'partials/footer-admin.php'; ?>