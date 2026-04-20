<?php 
    include 'partials/header-admin.php'; 
    include 'partials/post_data.php'; // Načítame tie isté dáta ako na webe
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
</main>

<?php include 'partials/footer-admin.php'; ?>