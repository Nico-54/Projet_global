<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>test</title>
    </head>
    <body>
    <p> La phrase est : Bonjour ça va ? </p>


    <?php
    if(isset($_POST['choix']) AND $_POST['choix']=='choix1')
    { 
        ?>

        <p>こんにちは、お元気ですか？</p>

        <?php

    } else if ($_POST['choix']=='choix2') 
    {
        ?>

        <p>안녕 잘 지내 ?</p>

        <?php

    } else
    {
       echo 'erreur'; 
    }
    ?>

        <form action="formulaire2.php" method="post">
            <p>
            <input type="submit" value="retour" />
            </p>
        </from>
    </body>
</html>