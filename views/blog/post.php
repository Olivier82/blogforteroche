<?php require VIEW_PATH . '/template/header.php'; ?>
<div class="containter">
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="post-heading">
                <h1><?php echo $singlepost['title']; ?></h1>
                <div class="date-post">
                    <p>Posté le <?php echo $singlepost['date_post_fr']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="post-content">
                <?php echo $singlepost['content']; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h4>Ajouter un Commentaire</h4>
                    </div>
                    <div class="panel-body">
                        <form action ="#" method="post" id="form-comment">
                            <div class="alert alert danger authorError d-none" id="authorError" role="alert"></div>
                            <div class="alert alert-success d-none" id="commentSucces" role="alert"></div>
                            <input type ="author" name="author" class="form-control" id="author" placeholder="Votre nom">
                            <div class="alert alert-danger commentError d-none" id="commentError" role="alert"></div>
                            <textarea class="form-control" id ="comment" placeholder="Votre commentaire..." rows="3"></textarea>
                            <br>
                            <button type="button" class="btn btn-primary" id="validComment">Poster votre commentaire</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require VIEW_PATH . '/template/footer.php'; ?>