<?php
  require_once('inc/bdd_conf.php'); // ceci inclut le fichier bdd_conf.php
  require_once('inc/fonctions.php');// ceci inclut le fichier fonctions.php

  if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    // est-ce un user du système ?
    $user = getUserByNamePw($_POST['username'], $_POST['password']);
    if ($user) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['user'] = $user['name'];
      $_SESSION['authlevel'] = $user['authlevel'];
      $_SESSION['pass'] = $user['pass'];
      header('Location: index.php');
    }
    else {
      $_SESSION['flash'] = "Mauvais login ou mot de passe" . htmlspecialchars($username, ENT_QUOTES);
      header("Location: index.php");
    }
  }
  else {
    $_SESSION['flash'] = "Mauvais login ou mot de passe" . htmlspecialchars($username, ENT_QUOTES);
    header('Location: index.php');
  }
?>
