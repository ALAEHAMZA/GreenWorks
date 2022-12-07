<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mesGreenWorks</title>
    <link rel="stylesheet" type="text/css" href="../STYLE/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../STYLE/styleGW.css">


</head>
<body>
    <header>
        <div class="nav">
            <div class="titre">
                <a href="../GREENWORKS.php">
                    <span>GREEN</span>
                    <span class="marge">WORKS</span>
                </a>
            </div>
            <div class="menu">
                <a href="#">Les GreenWorks</a>
                <a href="CONNEXION.php">Mes GreenWorks</a>
            </div>
        </div>
    </header>
    <section id="acceuil">
        <div class='barreNav'></div>
            <div class='description'>
    <?php
        include("connexionBaseDonnee.php");
        $req=$baseDonnee->prepare("SELECT * FROM mygreenwork");
        $req->execute();
        $greenworks=$req->fetchAll();
        if(count($greenworks)>0){
            foreach ($greenworks as $greenwork) { 
                $util=$greenwork["idUtil"];
    ?>
                <div class="card">
                    <div><img src="<?php echo $greenwork["img"];?>"></div>
                    <div><?php echo $greenwork["titreMGW"];?></div>
                    <div><a href="detailsGreenwork.php?nom=<?php echo $util ?>"> Voir les details de produit</a></div>
                </div >
    <?php 
            }
        }else{
    ?>
                <div class="card">
                    <div><h1 align="center">Aucun GreenWork n'est ajoutee</h1></div>
                    <div><a class='btn btn-success' href="CONNEXION.php">Ajouter</a></div>
                </div >
            </div>
        <?php } ?>
        </div>
        </div>
    </section>
</body>
</html>