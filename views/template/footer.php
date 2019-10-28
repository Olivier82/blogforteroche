        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Me contacter</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contactForm" name="sentMessage">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="name" type="text" placeholder="Votre Nom">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="firstname" type="text" placeholder="Votre Prénom">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="email" type="email" placeholder="Votre Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Votre message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button id="sendContact" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="copyright">Copyright © 2019 Jean Forteroche</div>
                    </div>
                    <div class="col-md-4">
                        <div class="link-admin">
                            <a href="/admin">Administration du site</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="social-buttons">
                            <li class="inline-buttons">
                                <a href="#">
                                <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="inline-buttons">
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="inline-buttons">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT & JQUERY -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php
            if (isset($scripts) && count($scripts) > 0) {
                foreach($scripts as $script) {
                    echo '<script src="' . $script . '"></script>';
                }
            }
        ?>
    </body>
<html>