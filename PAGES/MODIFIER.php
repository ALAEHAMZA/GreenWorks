<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AjouterUnGreenWork</title>
    <link rel="stylesheet" href="../STYLE/styleInscription.css">
</head>
<body>
    <?php
        if (isset($_GET['id'])) {
            extract($_GET);
            include("connexionBaseDonnee.php");
            $req=$baseDonnee->prepare("SELECT * FROM mygreenwork where idgw=$id");
            $req->execute();
            $greenwork=$req->fetch();
        }
    ?>
    <div class="login">
                <form class="connexion" method="POST">
                    <h1>Modifier ce Greenwork</h1>
                    <input type="text" name="titreMGW" value="<?php echo $greenwork[1]; ?>" placeholder="Titre de Greenwork" required>
                    <input type="text" name="ingt" value="<?php echo $greenwork[4]; ?>" placeholder="Ingredients"required>
                    <input type="text" name="etp" value="<?php echo $greenwork[5]; ?>" placeholder="Etapes et démarches de réalisation"required>
                    <input type="file" name="img" valuer="<?php echo $greenwork[2]; ?>" >
                    <input class ="connexionBtn" type="submit" value="Modifier">
                </form>
        </div>
    <?php 
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            extract($_POST);
            $type =$_FILES["img"]["type"];
            $extensions = ["image/gif","image/png","image/jpeg","image/jpg","image/jfif","image/ico"];
            if(in_array($type,$extensions)){
                $tmp_name=$_FILES["img"]["tmp_name"];
                $nom_org=$_FILES["img"]["name"];
                $chemin="photo/";    
                move_uploaded_file($tmp_name,$chemin.$nom_org);
                $foto="photo\\".$nom_org;
            }
            $req=$baseDonnee->prepare("UPDATE mygreenwork SET titreMGW=:t ,img=:im ing=:i , etp=:e WHERE idgw=$id");
            $req->execute([
                "t"=>$titreMGW,
                "im"=>$foto,
                "i"=>$ing,
                "e"=>$etp
            ]);
            header("Location:ListeDeMesGreenworks.php?msg=edit_success");    
            }        
    ?>
</body>
</html>