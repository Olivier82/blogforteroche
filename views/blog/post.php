<?php require VIEW_PATH . '/template/header.php'; ?>
<div class="containter">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
                <h1><?php echo $singlepost['title']; ?></h1>
                <div class="date-post">
                    <p>Posté le <?php echo $singlepost['date_post_fr']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-content">
                <?php echo $singlepost['content']; ?>
            </div>
        </div>
    </div>
</div>

<?php require VIEW_PATH . '/template/footer.php'; ?>