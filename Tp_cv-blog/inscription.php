<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>Site CV/Blog</title>
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
        <div class="row">
            <div class="col m-3 text-center">
                <h2 class="mb-4">Inscription</h2>
                <form method="post" action="inscription.php">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="pseudo"><img src="img/person.svg" alt="logo personne"></span>
                        <input type="text" class="form-control" placeholder="Pseudo" name="pseudo" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="password"><img src="img/lock.svg" alt="logo cadenas"></span>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="password2"><img src="img/lock.svg" alt="logo cadenas"></span>
                        <input type="password" class="form-control" placeholder="Confirmation mot de passe" name="password2" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="mail"><img src="img/at.svg" alt="logo email"></span>
                        <input type="text" class="form-control" placeholder="Adresse e-mail" name="mail" required>
                    </div>

                    <button type="submit" class="btn btn-light btn-outline-secondary text-truncate" name="submit">Envoyer</button>
                </form>
            </div>
        </div>

        <?php
            if(isset($_POST['submit'])){
                //Connexion BDD
                try{
                    $bdd = new PDO('mysql:host=localhost;dbname=sit_cv_blog;charset=utf8', 'root', 'root');
                }catch (Exception $e){
                    die('Erreur : ' . $e->getMessage());
                }

                $isPseudo = false;
                $isPass = false;
                $isMail = false;

                //Vérification pseudo, password et mail
                if (isset($_POST['pseudo'])){
                    $pseudo = htmlspecialchars($_POST['pseudo']);

                    $req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
                    $req->execute(array($_POST['pseudo']));
                    $resultat = $req->fetch();

                    if ($resultat != null){ ?>
                        <div class="alert alert-danger" role="alert">
                            <img src="img/exclamation-circle.svg" alt="error logo">
                            <?php echo "Ce pseudo n'est pas disponible. Veuillez en choisir un autre."; ?>
                        </div><?php
                    }else{
                        $isPseudo = true;
                    }
                    $req->closeCursor();
                }

                if (isset($_POST['password']) && isset($_POST['password2'])){
                    $_POST['password'] = htmlspecialchars($_POST['password']);
                    $_POST['password2'] = htmlspecialchars($_POST['password2']);

                    if ($_POST['password'] != $_POST['password2']){ ?>
                        <div class="alert alert-danger" role="alert">
                            <img src="img/exclamation-circle.svg" alt="error logo">
                            <?php echo "Les mots de passe ne correspondent pas. Veuillez recommencer."; ?>
                        </div><?php
                    }else{
                        $isPass = true;
                    }
                }

                if (isset($_POST['mail'])){
                    $mail = htmlspecialchars($_POST['mail']);

                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
                        $isMail = true;
                    }else{ ?>
                        <div class="alert alert-danger" role="alert">
                            <img src="img/exclamation-circle.svg" alt="error logo">
                            <?php echo "L'adresse mail n'est pas valide."; ?>
                        </div><?php
                    }
                }

                //Hash du mot de passe et insertion dans la BDD
                if ($isPseudo && $isPass && $isMail){
                    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email) VALUES(:pseudo, :pass, :email)');

                    $req->execute(array(
                        'pseudo' => $pseudo,
                        'pass' => $pass_hache,
                        'email' => $mail));
                    
                    $req->closeCursor(); ?>
                    <div class="alert alert-success" role="alert">
                        <img src="img/check-circle.svg" alt="success logo">
                        <?php echo "Inscription réussie. Vous pouvez vous connecter."; ?>
                    </div><?php
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