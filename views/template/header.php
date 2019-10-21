<doctype HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Blog de Jean Forteroche, pour son roman un billet simple pour l'alaska">
        <meta name="author" content="Jean Forteroche">
        <title>Blog de Jean Forteroche - Billet simple pour l'Alaska</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="/assets/img/favicon.ico">
        <?php
            if (isset($styles) && count($styles) > 0) {
                foreach($styles as $style) {
                    echo '<link rel="stylesheet" href="' . $style . '">';
                }
            }
        ?>
    </head>
    <body>
        <!--- NAVIGATION --->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a href="/" class="navbar-brand">
                <img src="/assets/img/logo.svg" width="280" height="50" alt="logo blog">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-controls="navbar">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Qui suis je ? </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/post">Episodes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Me Contacter</a>
                    </li>
                </ul>
                </div>
        </nav>