<?php
  require_once('inc/bdd_conf.php');
  require_once('inc/fonctions.php');

  if(isset($_SESSION['authlevel']) && !empty($_SESSION['authlevel'])) {

    if(isset($_POST['create']) && $_SESSION['authlevel'] >= 2 && $_SESSION['authlevel'] <= 3) {
      createUser($_POST);
      header("Location: user.php");
    }

    if(isset($_POST['update']) && $_SESSION['authlevel'] >= 2 && $_SESSION['authlevel'] <= 3) {
      updateUser($_POST);
      header("Location: user.php");
    }

    if(isset($_POST['delete']) && $_SESSION['authlevel'] >= 2 && $_SESSION['authlevel'] <= 3) {
      deleteUser($_POST['id']);
      header("Location: user.php");
    }

  }

?>
