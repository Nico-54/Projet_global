  
<?php
    session_start();

    //Connexion BDD
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=sit_cv_blog;charset=utf8', 'root', 'root');
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    //Insertion commentaire BDD
    if (!empty($_POST['commentaire_text'])){
        
       $contenu = htmlspecialchars($_POST['commentaire_text']);
                    
        $req = $bdd->prepare('INSERT INTO commentaires(auteur, contenu, date_creation) VALUES(:auteur, :contenu, CURDATE())');

        $req->execute(array(
        'auteur' => $_SESSION['pseudo'],
        'contenu' => $contenu));
                    
        $req->closeCursor(); 
    }
    
    header('Location: blog.php');
?>