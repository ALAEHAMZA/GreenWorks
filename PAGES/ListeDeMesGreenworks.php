<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeDeMesGreenworks</title>
    <link rel="stylesheet" type="text/css" href="../STYLE/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../STYLE/StyleListeDeMesGreenWorks.css">
</head>
<body>
<?php
    session_start();
    if (isset($_GET['nom'])) {
        extract($_GET);
        $nomUtil=$nom;
    };
    if (isset($_GET['msg'])) {
        extract($_GET);
        switch ($msg) {
            case 'add_success':
                echo "<div class ='alert alert-success'>GreenWork ajouter avec succes</div>";
                break;
            case 'edit_success':
                echo "<div class ='alert alert-success'>GreenWork modifier avec succes</div>";
                break;
            case 'delet_success':
                echo "<div class ='alert alert-success'>GreenWork supprimer avec succes</div>";
                break;
        }
    }

    ?>

<header>
        <div class="nav">
            <div class="titre">
                <a href="../GREENWORKS.php">
                    <span>GREEN</span>
                    <span class="marge">WORKS</span>
                </a>
            </div>
            <div class="menu">
                <a href="GreenWorks.php">Les GreenWorks</a>
                <a href="#">Mes GreenWorks</a>
                <a href="DECONNEXION.php" ><span class='btn btn-success'>Se deconnecter</span></a>
            </div>
        </div>
    </header>
    <section>

    <br><<h1  align="center">Bonjour "<?php echo $nomUtil?>"</h1><br>
    <table class='table table-striped table-sm table-responsive-md' >
        <tr>
        <th>Nom</th>
        <th>Titre de mon GreenWork</th>
        <th>Date de Création</th>
        <th>Actions</th>
        </tr>
    <?php
    if (isset($_GET['nom'])) {
        extract($_GET);
        $nomUtil=$nom;
        include("connexionBaseDonnee.php");
        $req=$baseDonnee->prepare("SELECT * FROM mygreenwork WHERE idUtil=(SELECT idU FROM utilisateur WHERE nomUtilisateur=:n)  ");
        $req->execute(["n"=>$nomUtil]);
        $greenworks=$req->fetchAll();
        if(count($greenworks)>0){
            foreach ($greenworks as $greenwork) {
                $id=$greenwork["idgw"];
                echo"<tr>";
                echo "<td>".$nomUtil."</td>";
                echo "<td>".$greenwork["titreMGW"]."</td>";
                echo "<td>".$greenwork["date"]."</td>";
                echo "<td><a class='btn btn-success' href='GreenWorks.php?'>VISUALISER</a>   <a class='btn btn-success' href='MODIFIER.php?id=$id'>MODIFIER</a>     <a class='btn btn-success' href='SUPPRIMER.php?id=$id&nom=$nomUtil'  onClick=\"return confirm('Voulez vous vraiment supprimer ce GreenWork ?')\">SUPPRIMER</a></td>";
                echo"</tr>";
            }
        }else{
            echo"<td colspan='4' align=center>LA LISTE DES GREENWORKS EST VIDE</td>";
        }
        echo"</table>";
        echo"<a href='AjouterUnGreenwork.php?nom=$nomUtil' class='btn btn-success btn-lg btn-block'>Ajouter un GreenWork</a>";
    }
    ?>
</section>
</body>
</html>
