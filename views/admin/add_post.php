<?php require VIEW_PATH . '/template/header_admin.php'; ?>
            <div class="container">
                <div class="row">
                    <h2 class="title-post">Rédiger un article</h2>
                </div>
                <div class="row">
                    <form action="/admin/addpost" method="post" id="form-post">
                        <div class="form-group">
                            <label for="titlePost" class="heading-form">Titre de l'article</label>
                            <div class="alert alert-danger titleError d-none" id="titleError" role="alert"></div>
                            <input type="title" name="titlePost" class="form-control" id="titlePost" placeholder="Titre de l'article">
                        </div>
                        <div class="form-group">
                            <label for="contentPost" class="heading-form">Contenu de l'article</label>
                            <div class="alert alert-danger editorError d-none" id="editorError" role="alert"></div>
                            <div id="toolbar"></div>
                            <div id="editor"></div>
                        </div>
                        <button type="submit" name="submit" class="btn submitPost" id="validForm">
                            <span>Publier l'article</span>
                        <div class="spinner-border spinner-border-sm text-primary d-none" id="spinner" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        </button>
                    </form>
                </div>
            </div>

<?php require VIEW_PATH . '/template/footer_admin.php'; ?>