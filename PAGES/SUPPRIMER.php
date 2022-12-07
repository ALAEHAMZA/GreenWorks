
<?php
extract($_GET);
$nomUtil=$nom;

if(isset($_GET["id"])){
    extract($_GET);
    include("connexionBaseDonnee.php");
    try{
        $req= $baseDonnee->prepare("DELETE FROM mygreenwork  WHERE Idgw = $id");
        $req->execute();
        header("Location:ListeDeMesGreenworks.php?nom=$nomUtil&msg=delet_success");
    }
    catch(PDOException $e){
        die("Erreur dde suppressioon".$e->getMessage());
    }
}


?>