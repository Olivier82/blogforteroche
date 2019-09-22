<?php require VIEW_PATH . '/template/header.php'; ?>

    <div class="presentation">
        <div class="container">
            <div class="intro-text">
                <div class="intro-head"><?php echo $title; ?></div>
                <div class="text-presentation">Retrouvez les épisodes de mon nouveau roman</div>
            </div>
        </div>
    </div>
    <div class="recent-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dernières publications</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach($lastposts as $post): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['title']; ?></h5>
                            <p class="card-text"><?php echo substr($post['content'], 0 ,500) . " ...";?></p>
                            <a href="#" class=" btn btn-primary">Lire la suite...</a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php require VIEW_PATH . '/template/footer.php'; ?>

