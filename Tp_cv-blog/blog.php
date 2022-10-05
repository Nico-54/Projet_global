<?php
    session_start();
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>Site CV</title>
</head>

<body>
    <!--Header-->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light backgroundNav">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expand="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"></span>
                </button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Accueil</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php">Connexion</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!--Reste de la page-->
    <div class="container mt-3">
        <?php
            if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
        ?>
            <div class="row">
                <div class="col m-3">
                    <h1><p class="text-center">Bonjour <?php echo $_SESSION['pseudo'] ?></p></h1>
                    <h3 class="mb-3">Poster un commentaire:</h3>
                    
                    <form method="post" action="blog_post.php">

                    <div class="form-floating mb-3">
                        <textarea class="form-control commentaire" placeholder="Ecrivez un commetaire" id="floatingTextarea" name="commentaire_text" style="height: 100px" required></textarea>
                    </div>

                        <button type="submit" class="btn btn-light btn-outline-secondary text-truncate" name="submit">Envoyer</button>
                    </form>
                </div>
            </div>

            <div class="container pageCommentaire mt-5">
                <div class="row border-bottom">
                    <div class="col">
                        <h3 class="mb-3">Commentaires</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col m-3">
                        <?php
                            //Connexion BDD
                            try{
                                $bdd = new PDO('mysql:host=localhost;dbname=sit_cv_blog;charset=utf8', 'root', 'root');
                            }catch (Exception $e){
                                die('Erreur : ' . $e->getMessage());
                            }

                            //Lecture des commentaires
                            $req = $bdd->query('SELECT auteur, contenu, date_creation FROM commentaires ORDER BY date_creation DESC');

                            while ($resultat = $req->fetch()){
                                echo '<p><strong>' . $resultat['auteur'] . '</strong> le ' . $resultat['date_creation'] . ' :</br>' . $resultat['contenu'] . '</p>';
                            }

                            $req->closeCursor();
                        ?>
                    </div>
                </div>
            </div>

        <?php
        }else{?>
            <p class="text-center m-3">Vous n'avez pas accès à cette page. Pour la voir veuillez vous connecter à votre compte ou vous inscrire.</p>
        <?php
        }
        ?>
    </div>


    <!--jQuery, Popper.js et Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>