<?php require VIEW_PATH . '/template/header_admin.php'; ?>
                    <div class="container">
                        <div class="row">
                            <h2 class="admin-heading">Edition d'un article</h2>
                        </div>
                        <div class="row">
                            <form action="#" method="post" id="form-post">
                                <div class="form-group">
                                    <label for="titlePost" class="heading-form">Titre de l'article</label>
                                    <input type="title" name="titlePost" class="form-control" id="titlePost" value="<?php echo $editpost['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contentPost" class="heading-form">Contenu de l'article</label>
                                    <div id="toolbar"></div>
                                    <div id="editor" value="<?php echo $editpost['content']; ?></div>
                                </div>
                                <button type="submit" name="submit" class="btn submitPost btn-lg btn-block" id="validform">
                                    <span>Mise à jour de l'article</span>
                                </button>
                            </form>
                        </div>
                    </div>
<?php require VIEW_PATH . '/template/footer_admin.php'; ?>