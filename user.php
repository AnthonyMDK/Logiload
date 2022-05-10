<?php
    session_start();
    print_r ($_SESSION['compte']);
    
    if ($_SESSION['compte']['acces']==1){
        echo "</br>"."bienvenue : ".htmlspecialchars($_SESSION['compte']['login'],ENT_NOQUOTES); 
    }
    else {header('Location: login.php');exit();}


    //déconncte et détruit les sessions
    if (!empty ($_POST['deco']) ){
        $_SESSION = array();
        session_destroy();
        setcookie(session_name(),'',null,null,false,true);
        session_regenerate_id(true);
        header('Location: login.php');exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <p>
        <form method="POST" action="">
            <input type="submit" name ="deco" value="Se déconncter :"> <p>
        <a href="index.php"> Accueil </a>
   </body> 
</html>
