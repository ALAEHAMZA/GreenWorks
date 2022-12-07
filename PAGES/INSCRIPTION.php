<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../STYLE/styleInscription.css">
    <title>INSCRIPTION</title>
</head>
<body>
    
    <div class="login">
            <form class="connexion" method="POST">
                <h1>INSCRIPTION</h1>
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prenom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="nomUtilisateur" placeholder="Nom d'utilisateur" required>
                <input type="password" name="motDePasse" placeholder="Mot de passe" required>
                <input type="password" name="cmdp" placeholder="Confirmation mot de passe" required>
                <input class ="connexionBtn" type="submit" value="S'inscrire" required>
            </form>
            <?php 
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    extract($_POST);
                    if($motDePasse==$cmdp){
                        include("connexionBaseDonnee.php");
                        try{
                            $req=$baseDonnee->prepare("INSERT INTO utilisateur VALUES (NULL ,:nom , :prenom , :email , :nomUtilisateur, :motDePasse )");
                            $req->execute([
                                "nom"=>$nom,
                                "prenom"=>$prenom,
                                "email"=>$email,
                                "nomUtilisateur"=>$nomUtilisateur,
                                "motDePasse"=>$motDePasse
                            ]);
                            header("Location:CONNEXION.php");
                            
                        }
                        catch(PDOException $e ) {
                            die ("Erreur : ".$e->getMessage());
                        }
                    
                    }else{
                        echo "Les mots de passe ne sont pas identiques";
                    }
                }        
            ?>
    </div>

</body>
</html>
Erreur : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 1Erreur : SQLSTATE[HY093]: Invalid parameter number: parameter was not defined
Erreur : SQLSTATE[21S01]: Insert value list does not match column list: 1136 Column count doesn't match value count at row 1