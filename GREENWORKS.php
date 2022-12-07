<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREENWORKS</title>
    <link rel="stylesheet" href="./STYLE/styleAcceuil.css">
</head>
<body>
    
    <header>
        <div class="nav">
            <div class="titre">
                <a href="#">
                    <span>GREEN</span>
                    <span class="marge">WORKS</span>
                </a>
            </div>
            <div class="menu">
                <a href="#acceuil">Acceuil</a>
                <a href="./PAGES/GreenWorks.php">GreenWorks</a>
                <a href="#aboutUs">Qui sommes nous ?</a>
                <a href="#contact">Contactez-nous</a>
            </div>
        </div>
        <div class="mot">
            <span>RECYCLER.</span>
            <span>INNOVER.</span>
            <span>CREER.</span>
        </div>
    </header>

    <section id="acceuil">
        <div class="barreNav"></div>
        <div class="description">
            <div class="card">
                <div><img src="./IMG/img4.jpg"></div>
                <div><h2>Proteger <font color="green">la foret</font></h2><br> Une forêt de protection, une forêt protectrice, est une forêt identifiée comme préservant soit la sécurité de riverains contre certains risques naturels, soit la santé et la qualité de vie d'habitants de zones urbanisées, soit des écosystèmes particulièrement sensibles qu'elle héberge.</div>
            </div >
            <div class="card">
                <div><img src="./IMG/img2.jpg" alt="..."></div>
                <div><h2>Proteger <font color="green">l'eau</font></h2><br> Une forêt de protection, une forêt protectrice, est une forêt identifiée comme préservant soit la sécurité de riverains contre certains risques naturels, soit la santé et la qualité de vie d'habitants de zones urbanisées, soit des écosystèmes particulièrement sensibles qu'elle héberge.</div>
            </div>
            <div class="card">
                <div><img src="./IMG/img3.jpg" alt="..."></div>
                <div><h2>Proteger <font color="green">l'air</font></h2><br> Une forêt de protection, une forêt protectrice, est une forêt identifiée comme préservant soit la sécurité de riverains contre certains risques naturels, soit la santé et la qualité de vie d'habitants de zones urbanisées, soit des écosystèmes particulièrement sensibles qu'elle héberge.</div>
            </div>
        </div>
    </section>

    <section id="listeGreenWorks">

    </section>



    <section id="aboutUs" >
        <div>
            <h1>Qui sommes nous ?</h1><br>
            <h2>Le site GREENWORKS mobilise une vingtaine des GreenWorks cree par les utilisateurs.</h2><br>
            <br><h3>GREENWORKS a pour objectif principale et stratégique de créer une solution digitale éco-responsable qui permet de sensibiliser les citoyens sur l’importance de la protection de l’environnement en générale et l’importance du recyclage en particulier.</h2><br>
            <h3>GREENWORKS a pour objectif specifique : <br>- Diminuer le jette des produits non dégradables nuisant à l’environnement<br>- Développer l’esprit de créativité chez les citoyens et citoyennes        <br>- Engager chaque citoyen et citoyenne à faire des actes écoresponsables</h3><br>
            <br><h2>Le site GREENWORKS s'adresse a tous les citoyens et les citoyennnes marocaines.</h2><br>
            <button class="btn1"><a href="#contact">Contactez-nous</a></button>
        </div>
        <img class="img" src="./IMG/img5.jpg" alt="">
    </section>

    <section id="contact">
    <div class="form">
            <form method="POST">
                <h1>Votre message :</h1>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="objet" placeholder="Objet"required>
                <textarea placeholder="Votre Message" name="message" cols="30" rows="30" required></textarea>
                <button name="envoyer" type="submit">Envoyer</button>
            </form>
        </div>
        <?php
            if (isset($_POST)) {
                extract($_POST);
                $envoyer=mail('$email','Envoi de puis la page contact',$message,'');
            }
        ?>
    </section>
</body>
</html>