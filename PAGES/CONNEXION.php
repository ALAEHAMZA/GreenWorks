<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../STYLE/styleInscription.css">
    <title>CONNEXION</title>
</head>
<body>
        <div class="login">
            <form class="connexion" method="POST">
                <h1>CONNEXION</h1>
                <input class="nom" type="text" name="nom" placeholder="Nom d'utilisateur" required>
                <input class="mdp" type="password" name="mdp" placeholder="Mot de passe"required>
                <a class="mdpO" href="./inscription.php">Mot de passe oublie ?</a>
                <input class ="connexionBtn" name="cnx" type="submit" value="Connexion"required>
                <span>Tu n'est pas un membre? <a href="./INSCRIPTION.php">S'inscrire</a></span>
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                        extract($_POST);
                        include("connexionBaseDonnee.php");
                        try{
                            $req=$baseDonnee->prepare("SELECT * FROM utilisateur");
                            $req->execute();
                            $comptes=$req->fetchAll();
                            $exist=FALSE;
                            foreach($comptes as $compte){
                                if ($compte[4]==$nom && $compte[5]==$mdp) {
                                    session_start();
                                    $_SESSION["login"]=$compte[4];
                                    $_SESSION["mdp"]=$compte[5];
                                    $exist=TRUE;
                                    header("Location:ListeDeMesGreenWorks.php?nom=$nom");
                                }
                            }
                            if (!$exist) {
                                echo "<br>ERREUR : Nom d'utilisateur ou mot de passe incorrect";
                            }
                        }
                        catch(PDOException $e ) {
                            die ("Erreur : ".$e->getMessage());
                        }
                }
            ?>
        </div>
</body>
</html>