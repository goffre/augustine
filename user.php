<?php
  require_once('inc/bdd_conf.php');
  require_once('inc/fonctions.php');

  if (empty($_SESSION['authlevel']) || $_SESSION['authlevel'] < 3) {
    header('Location: index.php');
    exit();
  }

  $users = getUser();

?>
<?php require_once('inc/header.php'); ?>

  <body style="background-color:black;">
<?php require_once('inc/menu.php'); ?>
<?php 

      // TODO : remettre de l'ordre ci-dessous en supprimant 
      // les balises center et en utilisant des classes bootstrap twitter  

?>
    <center>
      <table style="width:100%;height:100%;">
        <tr>
          <td style="border:0px;width:100%;height:100%;">
            <center>
              <div style="width:500px;border:1px solid white;color:white;">
                <center>
                  <p style="padding:3px;">
                    <strong><big>Utilisateurs (<a href="index.php"><font color="lightgreen">Retour</font></a>)</big></strong>
                  </p>
                  <hr>
                  <div style="padding:1em;height:auto;width:auto;">
                    <u>G&eacute;rer un utilisateur</u><br />
                    <table style="width:100%;border:0px;">
<?php
  foreach ($users as $s) {
    // Affichage des utilisateurs.
?>
                      <tr>
                        <form action="doUser.php" method='post'>
                          <td>
                            <div style='border:1px solid white;color:white;background-color:black;width:100%;'>
                              <center>
                                <small>ID: <?= $s['id'] ?></small>
                              </center>
                            </div>
                          </td>
                          <td>
                            <input type="hidden" name="id" value="<?= $s['id'] ?>">
                          </td>
                          <td>
                            <input type='text' name='username' style='border:1px solid white;color:white;background-color:black;
                              text-align:center;width:100%;' value="<?= $s['name'] ?>">
                          </td>
                          <td>
                            <input type='text' name='password' style='border:1px solid white;color:white;background-color:black;
                              text-align:center;width:100%;' value="<?= $s['pass'] ?>">
                          </td>
                          <td style='width:0px;'>
                            <input type='text' name='authlevel' style='width:25px;border:1px solid white;color:white;background-color:black;
                              text-align:center;' value="<?= $s['authlevel'] ?>">
                          </td>
                          <td>
                            <input type='submit' name="update" style='border:1px solid white;color:white;background-color:black;width:100%;' value='Modifier'>
                          </td>
<?php if ($s['authlevel'] == 3) { ?>
                          <td>
                            <div style='border:1px solid white;color:white;background-color:black;width:100%;'>
                              <center>
                                <small>--</small>
                              </center>
                            </div>
                          </td>
<?php } else { ?>
                          <td>
                            <input type='submit' name="delete" style='border:1px solid white;color:white;background-color:black;width:100%;' value='Supprimer'>
                          </td>
<?php } ?>
                        </form>
                      </tr>
<?php } ?>
                    </table>
                  </div>
                  <br />
                  <br />
                  <div style="padding:1em;height:auto;width:auto;">
                    <u>Cr&eacute;er un utilisateur</u><br />
<?php
  $username = getPost('username', 'username');
  $pw = getPost('password', 'password');
  $authlevel = getPost('authlevel','1');
?>
                    <form action="doUser.php" method="post">
                      <table style="width:100%;border:0px;">
                        <tr>
                          <td>
                            <input type='text' name='username' style='border:1px solid white;color:white;background-color:black;
                              text-align:center;width:100%;' value="<?= $username; ?>">
                          </td>
                          <td>
                            <input type='text' name='password' style='border:1px solid white;color:white;background-color:black;
                              text-align:center;width:100%;' value="<?= $pw; ?>">
                          </td>
                          <td style='width:0px;'>
                            <input type='text' name='authlevel' style='width:25px;border:1px solid white;color:white;background-color:black;
                              text-align:center;' value="<?= $authlevel; ?>">
                          </td>
                          <td>
                            <input type='submit' name="create" style='border:1px solid white;color:white;background-color:black;width:100%;' value="Cr&eacute;er">
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div>
                  <small>
                    <p style="text-align:justify;padding:1em;">
                      <u>Notice</u> : Vous ne pouvez modifier qu'un utilisateur &agrave; la fois. Il s'agit d'une interface fragile.
                      N'ex&eacute;cutez aucune action sans en connaitre les cons&eacute;quences. Renseignez vous aupr&egrave;s d'un administrateur.
                    </p>
                    <u>Authlevel</u><br />
                      1 => Mod&eacute;rateur<br />
                      2 => Administrateur<br />
                      3 => Super-Administrateur (1 seul normalement)<br />
                  </small>
                </center>
              </div>
            </center>
          </td>
        </tr>
      </table>
    </center>

  </body>
</html>
