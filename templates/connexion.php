<?php 
$this->title ="Connexion";
?>

<header class="masthead" style="background-image: url('../public/img/connexion.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1>Espace membre</h1>
				</div>
			</div>
		</div>
	</div>
</header>


<!-- Main content -->


<div class="container">
	<div class="row">
	  <div class="mx-auto">
			<h2>Se Connecter</h2>
			 <form method="POST" action="" class="form">

				<div class="form-group ">
					<label for="name">Nom</label>
					<input type="text" name="name" class="form-control " value="" />
				</div>

				<div class="form-group ">
					<label for="mail">Mot de passe</label>
					<input type="password" name="password" class="form-control " value="" />
				</div>

		    <div class="form-group ">
					<input type="submit" value="Envoyer" class="btn btn-outline-primary btn-block submit" />
				</div>

				</form>	    	
		</div>
 </div>
</div>