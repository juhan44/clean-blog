<?php 
    include 'partials/header.php';
    
    $postObj = new Post($db);
    $posts = $postObj->getAll(); 
?>
        <header class="masthead" style="background-image: url('../assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">Môj vlastný blog v čistom PHP</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    
                    <?php if (empty($posts)): ?>
                        <p>Zatiaľ neboli pridané žiadne články.</p>
                    <?php else: ?>
                        <?php foreach ($posts as $post): ?>
                            <div class="post-preview">
                                <a href="post.php?id=<?php echo $post->id; ?>">
                                    <h2 class="post-title">
                                        <?php echo htmlspecialchars($post->title); ?>
                                    </h2>
                                    <h3 class="post-subtitle">
                                        <?php 
                                            echo htmlspecialchars(substr(strip_tags($post->content), 0, 100)) . '...'; 
                                        ?>
                                    </h3>
                                </a>
                                <p class="post-meta">
                                    Publikované dňa 
                                    <?php echo date('d. m. Y', strtotime($post->created_at)); ?>
                                </p>
                            </div>
                            <hr class="my-4" />
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="d-flex justify-content-end mb-4">
                        <a class="btn btn-primary text-uppercase" href="#!">Staršie články →</a>
                    </div>
                </div>
            </div>
        </div>
<?php include 'partials/footer.php'; ?>