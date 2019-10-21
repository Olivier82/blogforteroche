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
                        <form action ="/post" method="post" id="form-comment">
                        <input id="idPost" type="hidden" value="<?php echo $singlepost['id']; ?>" />
                        <div class="alert alert-danger errors d-none" id="errors" role="alert"></div>
                            <div class="alert alert-danger authorError d-none" id="authorError" role="alert"></div>
                            <div class="alert alert-success d-none" id="commentSucces" role="alert"></div>
                                <input type ="author" name="author" class="form-control" id="author" placeholder="Votre nom">
                                <div class="alert alert-danger commentError d-none" id="commentError" role="alert"></div>
                                    <textarea class="form-control" id ="comment" placeholder="Votre commentaire..." rows="5"></textarea>
                            <br>
                            <button type="submit"  name="submit" class="btn btn-primary btn-lg btn-block" id="validComment">
                                <span>Poster votre commentaire</span>
                            <div class="spinner-border spinner-border-sm text-primary d-none" id="spinner" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            </button>
                            <hr>
                        </form>
                        <?php
                            foreach($listcomment as $value):
                        ?>
                        <ul class="media-list">
                            <li class="media">
                                <div class='pull-left'>
                                    <img src="../assets/img/avatar.png" alt="img-circle">
                                </div>
                                <div class="media-body">
                                    <div class="date-comment"><?php echo $value['date_comment_fr']; ?></div>
                                    <div class="author-comment"><?php echo $value['author']; ?></div>
                                    <p class="comment"><?php echo $value['comment']; ?></p>
                                </div>
                            </li>
                        </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require VIEW_PATH . '/template/footer.php'; ?>