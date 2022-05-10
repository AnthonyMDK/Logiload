<?php
session_start();

// deja sécurisé la requete pour eviter injection sql et XSS / préparer la requete ?

//au choix de la page affiche les info corresponae stocké dans la bd
if (!empty($_POST['ref'])){
    $_SESSION['ref']=array('ref' => htmlspecialchars($_POST['ref'],ENT_QUOTES));
    $ref = $_SESSION['ref']['ref'];
    $bdd = new mysqli('localhost', 'root', '', 'catalogue');
    $sql = $bdd->query("SELECT * FROM `produit` WHERE `nom`= '$ref'");
    while ($donnees = $sql->fetch_assoc()){
        $sql->close();
        $_SESSION['produit']=array('nom' => $donnees["nom"], 'description' => $donnees["description"] ,'prix' => $donnees["prix"]);
        $donnees =null;
        break;
    }
    $bdd = null;
    $sql = null;
}

// Si autentifié et que les champs sont remplis alors conexion bd et ajout des commentaires
if (!empty($_SESSION['compte'])){
    if ($_SESSION['compte']['acces']== 1){
        if (!empty($_POST['contenu'])){
            $auteur = $_SESSION['compte']['login'];
            $contenu = htmlspecialchars($_POST['contenu'],ENT_QUOTES);
            $ref = $_SESSION['ref']['ref'];
            
            $bdd = new mysqli('localhost', 'root', '', 'commentaire');
            $insert = $bdd->query("INSERT INTO `description` (`auteur`,`contenu`,`produit`) VALUES ('$auteur','$contenu','$ref')");
            $insert =null;
            $bdd =null;
            header ('Location:squelette_page.php');
        }
    }
}

// Si pas conncter alors dire de le faire pour envoyer des messages
if (!empty($_POST['contenu'])){
    if (!empty($_SESSION['compte'])){
        if ($_SESSION['compte']['acces']== 0){
            echo "<script> alert('connectez vous pour envoyer des messages')</script>";
        }
    }
    elseif (empty($_SESSION['compte'])){echo "<script> alert('connectez vous pour envoyer des messages')</script>";}
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test du squelette</title>
    </head>
    <p><a href="notation.php">Notation :</a></p>
    <body>
    <div>
        <h1> Produit : <?php print_r ($_SESSION['produit']['nom']);?></h1>
        <p> Descritpion : <?php print_r ($_SESSION['produit']['description']); ?></p>
        <p> Prix : <?php print_r ($_SESSION['produit']['prix']);?></p>

        <form method="POST" action="squelette_page.php">
            <input type="text" name = "contenu" placeholder="Ecrivez votre commentaire">
            <input type="submit" name = "entrer"></input>
        </form>
    </div>
        <ul>
            <?php // sécurisé la requete pour eviter xss (execution srcipt au chargement de la page)
                $bdd = new mysqli('localhost', 'root', '', 'commentaire');
                $ref = $_SESSION['ref']['ref'];
                $requete = "SELECT * FROM `description` WHERE `produit`= '$ref' ORDER BY `id` DESC";
                $resultat = $bdd -> query($requete);

                //on affiche ligne par ligne le contenu de la table
                while ($ligne = $resultat -> fetch_assoc()) {
                    echo "<div class ='bordure' >";
		            echo "<li class = 'auteur'>".$ligne['auteur']." a commenté :"."</li>";
                    echo "<p class ='contenue'>".$ligne['contenu']."</p>";
                    echo "</div>";
                    echo "</br></br>";
                    $bdd =null;
                    $requete = null;
		        }
               
            ?>
        </ul>
        <a href = "index.php"><h2> accueil :</h2></a>

        <style>
            .auteur {
                color : black ;
                padding-left : 1%;
            }
            li{
                /*color :purple;
                background-color :lightblue;*/
            }
            .bordure{
                border: 1px solid blue ;
                border-radius: 5px;
                /*color :purple;
                background-color :lightblue;*/
            }
            .contenue{
                color :black;
                padding-left : 3%;
            }
        </style>
    </body>
</html>

