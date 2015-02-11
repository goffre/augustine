<?php
  require_once('inc/bdd_conf.php');
  require_once('inc/fonctions.php');
?>
<?php require_once('inc/header.php'); ?>

  <body>
<?php require_once('inc/menu.php'); ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1>Contact</h1>
        </div>
      </div>

      <div class="bs-docs-section" id="contact">
        <div class="page-header">
          <h2>Nous contacter</h2>
        </div>
        <div class="container">
          <p>
            Si vous souhaitez d'autres renseignements ou bien nous faire parvenir vos avis :
          </p>
        </div>
        <br />
        <table>
          <tr>
            <td>
              <select class="form-control" name="civilite" value="">
                <option>Mr</option>
                <option>Mme</option>
                <option>Mlle</option>
                <option>Autre</option>
              </select>
            </td>
            <td>
              <input class="form-control" type="text" placeholder="Nom" name="nom" value="" id="nom" onblur="verifNom(this)" >
            </td>
            <td>
              <input class="form-control" type="text" placeholder="Prenom" name="prenom" value="" id="prenom" onblur="verifPrenom(this)" >
            </td>
          </tr>
        </table>
        <br />
        <input class="form-control" type="text" placeholder="Objet" name="objet" value="" id="objet" onblur="verifObjet(this)" />
        <br />
        <textarea style="resize:none;" class="form-control" rows="5" cols="2" placeholder="Votre message" name="message" id="message" onblur="verifMessage(this)"></textarea>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="Envoyer" onsubmit="verif(this.form)" />
        </div>

        <div class="bs-docs-section">
          <div class="page-header">
            <h2>Faire un don</h2>
          </div>
          <div class="container">
            <p>
              Si vous trouvez ce site int&eacuteressant, pensez aux concepteurs et aux futurs projets en faisant un petit don, merci d'avance.
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank"><br />
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="ELXTWNNPXTKX8">
                <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
              </form>
            </p>
          </div>
        </div>
      </div>

    <!-- /.container -->

<?php require_once('inc/footer.php'); ?>
