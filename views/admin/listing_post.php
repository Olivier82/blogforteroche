<?php require VIEW_PATH . '/template/header_admin.php'; ?>
                <div class="container">
                    <div class="row">
                        <h2 class="admin-heading">Tous les articles</h2>
                    </div>
                    <div class="row">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">ID</th>
                                    <th scope="col">Date de l'article</th>
                                    <th scope="col">Titre de l'article</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($listposts as $value):
                            ?>
                                <tr>
                                <td><?php echo $value['id'];?></td>
                                    <td><?php echo $value['date_post_fr'];?></td>
                                    <td><?php echo $value['title']; ?></td>
                                    <td>
                                        <a href="editpost/<?php echo $value['id']; ?>" class="btn btn-success">Editer</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePostConfirm">
                                            Supprimer
                                        </button>
                                        <!-- Modal confirmation suppression article -->
                                        <div class="modal fade" id="deletePostConfirm" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5>Confirmation suppression article</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Voulez vous confirmer la suppression de cet article ? </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/admin/deletepost/<?php echo $value['id']; ?>" methode="post">
                                                            <button type="button" a href="/admin/deletepost[i:id]" id="delete-post" class="btn btn-danger">Oui</button>
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php require VIEW_PATH . '/template/footer_admin.php'; ?>