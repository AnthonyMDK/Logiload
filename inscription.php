<?php
session_start();
//if ($_SESSION['compte']['acces']!=0){header('Location: login.php');exit();} //affiche une erreur $session compye pas initié
    if (!empty($_POST['nv_login'])&& (!empty($_POST['nv_pwd'])&& (!empty($_POST['nv_email'])))) {

        $nv_login = htmlspecialchars($_POST['nv_login'],ENT_QUOTES);
        $nv_email = htmlspecialchars($_POST['nv_email'],ENT_QUOTES);
        $nv_pwd = $_POST['nv_pwd'];
        
        $pwd_hash = hash('sha384',$nv_pwd);

        $bdd = new mysqli('localhost', 'root', '', 'projet_php_mysql');
        $insert = $bdd->query("INSERT INTO `user` (`login`,`pwd`,`email`) VALUES ('$nv_login','$pwd_hash','$nv_email')");
        echo $nv_login."<br>".$pwd_hash."<br>".$nv_email;
    }
?>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/log.css"/>
  <link rel="icon" href="images/logo.png" type="image/gif" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>S'inscrire</title>
</head>

<body>
  <div class="main2">
    <p class="sign" align="center">S'inscrire : </p>
    <form method="POST" action="inscription.php" class="form1">
      <input class="un"  type="text" name ="nv_login" required placeholder="Nom d'utilisateur :"/>
      <input class="un"  type="text" name ="nv_email" required placeholder="Email :"/>
      <input class="pass"  type="password" name ="nv_pwd" required placeholder="Mot de passe :">

      <input class="submit" type="submit" align="center"></input>
    </br></br>
      <p class="inscription" align="center"><a href="login.php">Se connecter :</p>

    </div>

</body>

</html>
