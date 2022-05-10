<?php
    session_start();
    session_create_id();
    if (!empty($_POST['login'])&& (!empty($_POST['pwd']))) {
        $acces =FAlSE;
        $login = htmlspecialchars($_POST['login'],ENT_QUOTES);
        $pwd = $_POST['pwd'];
        $pwd_hash = hash('sha384',$pwd);

        $bdd = new mysqli('localhost', 'root', '', 'projet_php_mysql'); //crée un utilisateur pour se connecter avec linux
        $sql = $bdd->query("SELECT * FROM `user` WHERE `login`= '".mysqli_real_escape_string($bdd,$login)."'LIMIT 1 ;");

        while ($donnees = $sql->fetch_assoc()){
            if ($donnees["login"] == $login && $donnees["pwd"] == $pwd_hash ){
            $sql->close();
            $acces=TRUE;
            $_SESSION['compte']=array('login' => $donnees["login"],'pwd' => $donnees["pwd"] ,'acces' => $acces);
            $donnees =null;
            header('Location: user.php');exit();
            break;
            }
        }
    }

    //detruit les sessions quand on se connecte mal meme si on est deja connecter comme un user
    if ($acces== FALSE){
        $_SESSION = array();
        session_destroy();
        header('Location: login.php');exit();
    }
    $bdd=null;


    /* meme connection et anti injection sql mais avec pdo
    $bdd = new PDO('mysql:host=localhost;dbname=projet_php_mysql', 'root', '');
    $sql = ("SELECT * FROM `user` WHERE `login`= :login limit 1;");
    $querry = $bdd->prepare($sql);
    $querry -> bindValue(':login',$login,PDO::PARAM_STR);
    $querry->execute();
    */
?>