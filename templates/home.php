<?php
session_start();

$this->_title = 'Acceuil';

if (isset($session)) {
    $_SESSION['name'] = $session;
}

if (isset($_GET['access'])) {
    if ('sessionend' === $_GET['access']) {
        $_SESSION = array();
        session_destroy();
    }
}

// customize menu links

if (isset($_SESSION['name'])) {
    $this->_menu = true;
} else {
    $this->_menu = false;
}
?>

<!-- Page Header -->

<header class="masthead" style="background-image: url('../public/img/coding.jpeg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>A propos</h1>
                    <span class="subheading">Vous voulez avoir des renseignements sur moi ? cette section est faites pour vous !</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main content -->

<div class="card mx-auto text-center" style="width: 18rem;">
  <img class="card-img-top" src="../public/img/moez-photo.JPG" alt="Card image cap">
  <div class="card-body">
    <ul class="list-group list-group-flush">
    <li class="list-group-item">Moez THABTI</li>
    <li class="list-group-item">34 ans</li>
    <li class="list-group-item">E-learning addict</li>
  </ul>
  <div class="card-body">
      <a href="https://drive.google.com/open?id=1LxR1QfwGuYNg_ECIO_aFZAgDaaVN-Ozl" target="_blank" class="card-link">Consulter mon CV</a>
  </div>
  </div>
</div>
<hr>

<div class="container">
    <div class="row">
  <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 mx-auto">
        <h2 class="text-center">Formulaire de contact</h2>
     <form method="POST" action="mailto:toto@hotmail.com" class="form">
    <div class="form-group ">
        <label for="name">Nom</label>
        <input type="text" name="name" class="form-control " value="" />
    </div>

    <div class="form-group ">
        <label for="mail">Email</label>
        <input type="email" name="mail" class="form-control " value="" />
    </div>

    <div class="form-group ">
            <label for="message">Votre message</label>
            <textarea id= "mytextarea"name="message" class="form-control"></textarea>
     </div>

    <div class="form-group ">
            <input type="submit" value="Envoyer" class="btn btn-outline-primary submit" />
        </div>

        </form>            
    </div>
 </div>
</div>

