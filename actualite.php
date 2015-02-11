<?php
  require_once('inc/bdd_conf.php'); 
  require_once('inc/fonctions.php');
?>
<?php require_once('inc/header.php'); ?>

  <body>
<?php require_once('inc/menu.php'); ?>
    <br />
    <div class="content">
      <!-- Contenu -->
      <div class="contentflow">
<?php
  // Affichage actualités.
  $actu = getLastActualite();
  if ( !$actu) {
    echo "Il n'y a aucune actualité pour le moment.";
  } else {
    $titlestring = '<ol class="breadcrumbgrey">' . $actu['title'] . '</ol><br>';
    $datestring = "<div style='width:100%;text-align:right;'><br><br><strong>Envoy&eacute; le ".$actu['timePost']."</strong></div>";
    $adstring = nl2br($actu['texte']);
    $sortie = "".$titlestring."". $adstring."".$datestring."";
    $actualite = "<strong>".$actu['title']."</strong>";
    $user = "Pseudonyme";
?>
        <div style="padding-left:1em;padding-right:1em;">
          <ol class="breadcrumb"><a href="news.php?see=all">Actualités</a> / <?= $actualite ?>  </ol><br>
          <ol class="breadcrumb">
            <ol class="breadcrumbgrey"><?= $actu['title'] ?></ol><br />
            <?= nl2br($actu['texte']) ?>
            <div style='width:100%;text-align:right;'><br />
              <br />
              <strong>Envoy&eacute; le <?= $actu['timePost'] ?></strong>
            </div>
          </ol>
          <div class="comment">Commentaires<br />
            <br />
<?php
  // Commentaires.
  $commentaires = getCommentairesByIdActualite($actu['id']);

  if ($commentaires) {
    $i = 0;
    // Répète l'opération selon le nombre de commentaire dans la bdd
    while ($i < count($commentaires)) {
      $com = $commentaires[$i++];

      // Affiche le pseudo, la date, l'heure,
      //  la note de l'actualité et le commentaire
      echo '<ol class="breadcrumbgrey">Envoy&eacute; par <strong>'.$com['pseudo'].'</strong> le <strong>'.$com['dateCom'].'</strong> (Note : '.$com['note'].'),<br><br>'.nl2br($com['texte']).'</ol><br />';
    }
  }
  else // Sinon, le code affiche cela
  {
    echo '<ol class="breadcrumbgrey">Il n\'y a aucun commentaire sur cette actualité.</ol><br>';
  }
  }
?> 
          </div>
            <div class="commentary">
              <form action="news.php"  method="post">
                <!-- Si l'utilisateur est connecté, alors son pseudo sera entré directement, sinon 'Pseudonyme' sera la valeur par défaut. -->
                <input type="text" name="com_user" value="<?php echo $user ?>">
                <!-- Permet de noter l'actualité de 1 à 5-->
                Notez cette actualité :
                <select name="com_note">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3" selected="selected">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select> / 5<br>
                <textarea name="com" style="width:100%;height:150px;"></textarea> <!-- Zone de texte -->
                <input type="hidden" name="idActu" value="<?php if (isset($actu)) { echo $actu['id'];} ?>">
                <!-- Champ caché pour ne pas afficher id -->
                <input type="submit" value="Envoyer le commentaire" style="width:100%;">
                <!-- Bouton pour soumettre son commentaire -->
              </form>
            </div>
          </div>
        </div>
      </div>

<?php require_once('inc/footer.php'); ?>
