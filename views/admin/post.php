<?php require VIEW_PATH . '/template/header_admin.php'; ?>
            <div class="container">
                <div class="row">
                    <h2 class="title-post">Rédiger un article</h2>
                </div>
                <div class="row">
                    <form action="#" method="post" id="form-post">
                        <div class="form-group">
                            <label for="titlePost">Titre de l'article</label>
                            <input type="title" class="form-control" id="titlePost" placeholder="Titre de l'article">
                            <div id="titleError"></div>
                        </div>
                        <div class="form-group">
                            <label for="contentPost">Contenu de l'article</label>
                        <div id="toolbar"></div>
                        <div id="editor"></div>
                        <div id="editorError"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="validForm">Publier l'article</button>
                    </form>
                </div>
            </div>

<?php require VIEW_PATH . '/template/footer_admin.php'; ?>


