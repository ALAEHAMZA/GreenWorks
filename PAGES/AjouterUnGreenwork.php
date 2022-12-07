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
    <div class="login">
                <form class="connexion" method="POST" enctype="multipart/form-data">
                    <h1>Ajoute d'un Greenwork</h1>
                    <input type="text" name="titreMGW" placeholder="Titre de Greenwork" required>
                    <input type="text" name="ing" placeholder="Ingredients"required>
                    <input type="text" name="etp" placeholder="Etapes et démarches de réalisation"required>
                    <input type="file" name="img" >
                    <input class ="connexionBtn" type="submit" value="Ajouter">
                </form>
        </div>
        <?php  
                extract($_GET);
                $nomUtil=$nom;
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    include("connexionBaseDonnee.php");
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
                    try{
                        try{
                        $r=$baseDonnee->prepare("SELECT idU FROM utilisateur WHERE nomUtilisateur= :n");
                        $r->execute(["n"=>$nomUtil]);
                        $ligne =$r->fetch();
                        $idUtil = $ligne["idU"];
                        }
                        catch(PDOException $e){
                            die("Errreur selection id categorie".$e->getMessage());
                        }
                            $req=$baseDonnee->prepare("INSERT INTO mygreenwork VALUES (null, :t, :img, :da, :ing, :et, :u)");
                            $req->execute([
                                "t"=>$titreMGW,
                                "img"=>$foto,
                                "da"=>date("y-m-d"),
                                "ing"=>$ing,
                                "et"=>$etp,
                                "u"=>$idUtil
                            ]);
                            header("Location:listeDeMesGreenworks.php?nom=$nomUtil&msg=add_success");
                            
                        }
                        catch(PDOException $e ) {
                            die ("Erreur rrrr: ".$e->getMessage());
                        }
                }        
            ?>
</body>
</html>
