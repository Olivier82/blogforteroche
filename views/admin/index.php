<?php require VIEW_PATH . '/template/header_admin.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 text-center">
            <h2 class="index-admin-heading">5 derniers articles</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-4 text-center">
            <h2 class="index-admin-heading">Commentaires Signalés</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr class="tr-table-index">
                        <th scope="col">ID</th>
                        <th scope="col">Date de l'article</th>
                        <th scope="col">Titre de l'article</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($lastposts as $value):
                ?>
                    <tr class="th-table-index">
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['date_post_fr'];?></td>
                        <td><?php echo $value['title']; ?></td>
                        <td>
                            <a href="/admin/editpost/<?php echo $value['id']; ?>" class="btn btn-success-index">Editer</a>
                            <button type="button" class="btn btn-danger-index btnOpenDeleteModal" data-id="<?php echo $value['id'] ?>" data-toggle="modal" data-target="#deletePostConfirm">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require VIEW_PATH . '/template/footer_admin.php'; ?>