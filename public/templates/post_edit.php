<?php 
    require_once '../../app/core/App.php';
    $database = new Database();
    $db = $database->getConnection();

    $postObj = new Post($db);
    $categoryObj = new Category($db);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $post = $postObj->getById($id);

    if (!$post) {
        header("Location: admin.php");
        exit();
    }

    $categories = $categoryObj->getAll();

    if (isset($_POST['update_post'])) {
        $imagePath = $post->image;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $uploadDir = '../assets/img/';
            $fileName = time() . '_' . $_FILES['image']['name'];
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $fileName)) {
                $imagePath = 'assets/img/' . $fileName;
            }
        }

        $updateData = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category_id' => $_POST['category_id'],
            'image' => $imagePath
        ];

        if ($postObj->update($id, $updateData)) {
            header("Location: admin.php?status=updated");
            exit();
        }
    }
?>

<?php include 'partials/header-admin.php'; ?>

<main class="main-content">
    <h2>Upraviť článok: <?php echo htmlspecialchars($post->title); ?></h2>
    
    <div class="content-card" style="background: var(--card-bg); padding: 2rem; border-radius: 12px; margin-top: 1rem;">
        <form action="" method="POST" enctype="multipart/form-data">
            <div style="margin-bottom: 1rem;">
                <label>Názov článku:</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($post->title); ?>" required style="width: 100%; padding: 10px;">
            </div>

            <div style="margin-bottom: 1rem;">
                <label>Kategória:</label>
                <select name="category_id" required style="width: 100%; padding: 10px;">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo $cat->id; ?>" <?php echo ($cat->id == $post->category_id) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 1rem;">
                <label>Aktuálny obrázok:</label><br>
                <img src="../../public/<?php echo $post->image; ?>" style="width: 150px; border-radius: 8px; margin-bottom: 10px;"><br>
                <label>Zmeniť obrázok (ponechajte prázdne, ak nechcete meniť):</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div style="margin-bottom: 1rem;">
                <label>Obsah:</label>
                <textarea name="content" rows="10" required style="width: 100%; padding: 10px;"><?php echo htmlspecialchars($post->content); ?></textarea>
            </div>

            <button type="submit" name="update_post" class="btn" style="background: var(--success); color: white; padding: 10px 20px; border: none; border-radius: 5px;">
                Uložiť zmeny
            </button>
            <a href="admin.php" style="margin-left: 15px; color: var(--text-secondary);">Zrušiť</a>
        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>