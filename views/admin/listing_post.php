<?php require VIEW_PATH . '/template/header_admin.php'; ?>
                <div class="container">
                    <div class="row">
                        <h2 class="admin-heading">Tous les articles</h2>
                    </div>
                    <div class="row">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
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
                                    <td><?php echo $value['date_post_fr'];?></td>
                                    <td><?php echo $value['title']; ?></td>
                                    <td>
                                        <a href="editpost/1" class="btn btn-success">Editer</a>
                                        <a href="#" class="btn btn-danger"
                                        onclick="return confirm('Confirmez-vous la suppresion de cet article ?')">
                                        Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php require VIEW_PATH . '/template/footer_admin.php'; ?>