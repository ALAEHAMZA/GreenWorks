<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detailsGreenwork</title>
    <link rel="stylesheet" href="../STYLE/styleGW.css">
    <style>
        body{
            background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.4)),url(../IMG/img1.jpg) ;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            width: 100%;
            height: 100vh;
            z-index: -2;
        }
    </style>
</head>
<body>
    <section id=#acceuil>
        <div class='description'>
            <?php
            if (isset($_GET["nom"])) {
                extract($_GET);
                $nomUtil=$nom;
            }
                include("connexionBaseDonnee.php");
                $ru=$baseDonnee->prepare("SELECT nomUtilisateur FROM utilisateur WHERE idU=$nomUtil");
                $ru->execute();
                $cre=$ru->fetch();
                $req=$baseDonnee->prepare("SELECT * FROM mygreenwork WHERE idUtil=:n");
                $req->execute(["n"=>$nomUtil]);
                $greenworks=$req->fetchall();
                foreach ($greenworks as $greenwork) {

            ?>

            <div class="card">
                <div><img src="<?php echo $greenwork[2];?>"></div>
                <div>TITRE :<?php echo $greenwork[1];?></div>
                <div>CREATEUR :<?php echo $cre[0] ;?></div>
                <div>DATE :<?php echo $greenwork[3];?></div>
                <div>INGREDIENTS :<?php echo $greenwork[4];?></div>
                <div>ETAPE :<?php echo $greenwork[5];?></div>
            </div >

            <?php
                break;
                }
            ?>          
        </div>
    </section>
</body>
</html>