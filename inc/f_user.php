<?php

  require_once("bdd_conf.php");

//////////////// USER MANAGER ///////////////////////////////////////////////////////////

  function getUser() {
    global $pdo;
    $query = "SELECT * FROM augustine2_user ;";
    $list = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    return $list;
  }

  function getUserByNamePw($name, $pass) {
    global $pdo;
    $query = "SELECT * FROM augustine2_user WHERE name=:name AND pass=:pass ;";
    $prep = $pdo->prepare($query);
    $prep->bindValue(":name", $name, PDO::PARAM_STR);
    $prep->bindValue(":pass", $pass, PDO::PARAM_STR);
    $prep->execute();

    if($prep->rowCount() == 1) {
      $result = $prep->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    else
      return false;
  }

  function sameName($name) {
    global $pdo;
    $query = "SELECT name FROM augustine2_user WHERE name=:name ;";
    $prep = $pdo->prepare($query);
    $prep->bindValue(":name", $name, PDO::PARAM_STR);
    $prep->execute();
    $names = $prep->fetch(PDO::FETCH_ASSOC);
    if($names['name'] == $name)
      return true;
    else
      return false;
  }

  function sameUser($name, $id) {
    global $pdo;
    $query = "SELECT name, id FROM augustine2_user WHERE name=:name ;";
    $prep = $pdo->prepare($query);
    $prep->bindValue(":name", $name, PDO::PARAM_STR);
    $prep->execute();
    $names = $prep->fetch(PDO::FETCH_ASSOC);
    if($names['name'] == $name && $names['id'] == $id)
      return false;
    else
      return true;
  }

  function createUser($user) {
    global $pdo;
    $name = $user['username'];
    $pass = $user['password'];
    $authlevel = $user['authlevel'];
    if(!sameName($name)) {
      $query = "INSERT INTO augustine2_user VALUES ('', :name, :pass, :authlevel) ;";
      $prep = $pdo->prepare($query);
      $prep->bindValue(":name", $name, PDO::PARAM_STR);
      $prep->bindValue(":pass", $pass, PDO::PARAM_STR);
      $prep->bindValue(":authlevel", $authlevel, PDO::PARAM_STR);
      $prep->execute();
    }
    else
      $_SESSION['flash'] = "Impossible d'ajouter un nouvelle utilisateur car un autre utilisateur porte le même nom $name";
  }

  function updateUser($user) {
    global $pdo;
    $id = $user['id'];
    $name = $user['username'];
    $pass = $user['password'];
    $authlevel = $user['authlevel'];
    if(!sameUser($name, $id)) {
      $query = "UPDATE augustine2_user SET name=:name, pass=:pass, authlevel=:authlevel WHERE id=:id ;";
      $prep = $pdo->prepare($query);
      $prep->bindValue(":id", $id, PDO::PARAM_INT);
      $prep->bindValue(":name", $name, PDO::PARAM_STR);
      $prep->bindValue(":pass", $pass, PDO::PARAM_STR);
      $prep->bindValue(":authlevel", $authlevel, PDO::PARAM_STR);
      $prep->execute();
    }
    else
      $_SESSION['flash'] = "Impossible de modifier le nom de l'utilisateur car un autre utilisateur porte le même nom $name";
  }

  function deleteUser($id) {
    global $pdo;
    $query = "DELETE FROM augustine2_user WHERE id=:id ;";
    $prep = $pdo->prepare($query);
    $prep->bindValue(":id", $id, PDO::PARAM_INT);
    $prep->execute();
  }

?>
