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
          <h1>Galerie</h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug1.jpg">
        </div>
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug2.jpg">
        </div>
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug3.jpg">
        </div>
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug4.jpg">
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug5.jpg">
        </div>
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug6.jpg">
        </div>
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug7.jpg">
        </div>
        <div class="col-md-3 portfolio-item">
          <img class="img-responsive" src="img/aug8.jpg">
        </div>
      </div>
    </div>

    <!-- /.container -->

<?php require_once('inc/footer.php'); ?>
