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
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Ajouter un Commentaire</h4>
                    </div>
                    <div class="panel-body">
                        <textarea class="form-control" placeholder="Votre commentaire..." rows="3"></textarea>
                        <br>
                        <button type="button" class="btn btn-primary">Poster votre commentaire</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require VIEW_PATH . '/template/footer.php'; ?>