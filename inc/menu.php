    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <!-- définit la forme du bouton lorsque la barre de menu n'est plus visible (3 icon-bar ici)-->
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><!--
          <a class="navbar-brand" href="index.php">
            <img src="img/Accueil_footer.png" height="30" width="45"/>
          </a>-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><img src="img/Accueil_footer.png" height="22" width="42"/>&nbsp;&nbsp;Accueil&nbsp;&nbsp;</a></li>
            <li><a href="actualite.php">&nbsp;&nbsp;Actualités&nbsp;&nbsp;</a></li>
            <li><a href="galerie.php">&nbsp;&nbsp;Galerie&nbsp;&nbsp;</a></li>
            <li><a href="historique.php">&nbsp;&nbsp;Historique&nbsp;&nbsp;</a></li>
            <li><a href="contact.php">&nbsp;&nbsp;Contact&nbsp;&nbsp;</a></li>
            <li><a href="sponsors.php">&nbsp;&nbsp;Sponsors</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="http://facebook.com/projetaugustinemelun" target="_blank">
                <font color="#3b5998">&nbsp;&nbsp;facebook&nbsp;<img style="border-radius: 3px" src="img/Facebook.png" height="22" width="22"/>&nbsp;</font>
              </a>
            </li>
            <li>
              <a href="http://twitter.com/ProjetAugustine" target="_blank">
                <font color="1dcaff">&nbsp;&nbsp;twitter&nbsp;<img style="border-radius: 3px" src="img/T.png" height="22" width="22"/>&nbsp;</font>
              </a>
            </li>
            <ul class="nav navbar-nav navbar-right navcompte">
              <li class="dropdown" id="menuLogin">
<?php if (isset($_SESSION['user'])) : ?>
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">&nbsp;&nbsp;<?= $_SESSION['user'] ?> &nbsp;&nbsp;</a>
                  <div class="dropdown-menu" style="padding:17px;">
<?php if ($_SESSION['authlevel'] == 3) : ?>
                    <p style="padding:1px;">
                      <a href="user.php"><i class="fa fa-group"></i> Gestion utilisateurs</a>
                    </p>
                    <hr>
<?php endif; ?>
<?php if ($_SESSION['authlevel'] >= 2) : ?>
                    <p style="padding:1px;">
                      <a href="actualite.php"><span class="glyphicon glyphicon-bullhorn"> Gestion actualités</span></a>
                    </p>
                    <hr>
<?php endif; ?>
<?php if ($_SESSION['authlevel'] >= 1) : ?>
                    <p style="padding:1px;">
                      <a href="actualite.php"><span class="glyphicon glyphicon-comment"> Gestion commentaires</span></a>
                    </p>
                    <hr>
<?php endif; ?>
                    <p style="padding:1px;">
                      <a href="options.php"><span class="glyphicon glyphicon-cog"> Options</span></a>
                    </p>
                    <hr>
                    <p style="padding:1px;">
                      <a href="logout.php?out=1"><span class="glyphicon glyphicon-off"> D&eacute;connexion</span></a>
                    </p>
                  </div>
<?php
  else  : // Si l'utilisateur n'est pas connecté.
?>
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">S'identifier</a>
                <div class="dropdown-menu" style="padding:17px;">
                  <form class="form" id="formLogin" action="doLogin.php" method="POST">
                    <input name="username" id="username" placeholder="Pseudo" type="text">
                    <input name="password" id="password" placeholder="Mot de passe" type="password">
                    <br />
                    <input type="submit" value="Login" id="btnLogin" class="btn">
                  </form>
                </div>
<?php endif;?>
              </li>
            </ul>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

<?php  if (!empty($_SESSION['flash'])) : ?>
    <div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Information:</span>
<?php
  echo $_SESSION['flash']."\n";
  // now, we can delete it
  unset($_SESSION['flash']);
?>
    </div>
<?php endif; ?>
