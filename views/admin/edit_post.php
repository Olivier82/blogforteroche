<?php require VIEW_PATH . '/template/header_admin.php'; ?>
                    <div class="container">
                        <div class="row">
                            <h2 class="admin-heading">Edition de l'article <?php echo $editpost['title']; ?></h2>
                        </div>
                        <div class="row">
                            <form action="/admin/editpost" method="post" id="form-post">
                                <div class="form-group">
                                <div class="alert alert-danger errors d-none" id="errors" role="alert"><ul></ul></div>
                                <div class="alert alert-success d-none" id="success" role="alert">L'article a bien été modifié</div>
                                    <label for="titlePost" class="heading-form">Titre de l'article</label>
                                    <div class="alert alert-danger titleError d-none" id="titleError" role="alert"></div>
                                    <input type="title" name="titlePost" class="form-control" id="titlePost" value="<?php echo $editpost['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contentPost" class="heading-form">Contenu de l'article</label>
                                    <div class="alert alert-danger editorError d-none" id="editorError" role="alert"></div>
                                    <div id="toolbar"></div>
                                    <div id="editor" value="<?php echo $editpost['content']; ?>"></div>
                                </div>
                                <input id="editPostId" type="hidden" value="<?php echo $editpost['id']; ?>" />
                                <button type="submit" name="submit" class="btn submitPost btn-lg btn-block" id="validForm">
                                    <span>Mise à jour de l'article</span>
                                <div class="spinner-border spinner-border-sm text-primary d-none" id="spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                </button>
                            </form>
                        </div>
                    </div>
<?php require VIEW_PATH . '/template/footer_admin.php'; ?>