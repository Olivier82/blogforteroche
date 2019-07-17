<?php require VIEW_PATH . '/template/header_admin.php'; ?>
    <h2>Poster un article</h2>
        <form>
            <div class="form-group">
                <label for="titlePost">Titre de l'article</label>
                <input type="title" class="form-control" id="titlePost" placeholder="Titre de l'article">
            </div>
            <div class="form-group">
                <label for="contentPost">Contenu de l'article</label>
                <div id="toolbar"></div>
                <div id="editor"></div>
            </div>
            <button type="submit" class="btn btn-primary">Publier l'article</button>
        </form>


