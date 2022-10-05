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

                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>

                        <li class="nav-item active">
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
    <div class="container pageCentre mt-5">
        <?php 
            if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){?>
             <div class="alert alert-info m-3" role="alert">
                 <img src="img/info-circle.svg" alt="logo info">
                 <?php echo "  Vous êtes déjà connecté."; ?>
             </div><?php   
            }
        ?>

        <div class="row m-3">
            <div class="col m-3 text-center">
                <h2 class="mb-4">Connexion</h2>
                <form method="post" action="connexion.php">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="pseudo"><img src="img/person.svg" alt="logo personne"></span>
                        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="password"><img src="img/lock.svg" alt="logo cadenas"></span>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-light btn-outline-secondary text-truncate" name="submit">Connexion</button>
                    <small class="form-text text-muted mt-3">
                        <p>Pas encore membre ? <a href="inscription.php">Inscrit toi.</a></p>
                    </small>
                </form>
            </div>
        </div>

        <?php
            if(isset($_POST['submit'])){

                //Connexion et récupération du pseudo
                try{
                    $bdd = new PDO('mysql:host=localhost;dbname=sit_cv_blog;charset=utf8', 'root', 'root');
                }catch (Exception $e){
                    die('Erreur : ' . $e->getMessage());
                }

                //Récupération de l'utilisateur
                if (isset($_POST['pseudo'])){
                    $pseudo = htmlspecialchars($_POST['pseudo']);

                    $req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = ?');
                    $req->execute(array($pseudo));
                    $resultat = $req->fetch();

                    //Comparaison du pass envoyé via le fomulaire avec la base
                    $isPasswordCorrect = password_verify($_POST['password'], $resultat['pass']);

                    if (!$resultat){
                        $error = "  Mauvais identifiant ou mot de passe !";
                    }else{
                        if ($isPasswordCorrect) {
                            session_start();
                            $_SESSION['id'] = $resultat['id'];
                            $_SESSION['pseudo'] = $pseudo;
                            $success= "  Vous êtes connecté !";
                        }else{
                            $error = "  Mauvais identifiant ou mot de passe !";
                        }
                    }
                    $req->closeCursor();
                }

                if(isset($success)){ ?>
                    <div class="alert alert-success" role="alert">
                      <img src="img/check-circle.svg" alt="success logo">  
                    <?php echo $success; ?>
                    </div>
                    <?php
                }else if(isset($error)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <img src="img/exclamation-circle.svg" alt="error logo">
                    <?php echo $error; ?>
                    </div>
                    <?php
                }
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