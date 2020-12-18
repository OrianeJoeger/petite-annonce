 <!DOCTYPE html>
 <html>
	 <?php 
	 	require'include/head.php';
	 ?>

	 <body>
	 	<?php 
	 		require'include/header.php';
	 	?>
	 	<main>
	 		<div class="container-fluid">

	 			<h2 class="mt-3"> Annonces </h2>

				<div class="row">
					<form class="offset-sm-3 col-sm-6 form-inline my-2 my-lg-0"  id="form-recherche">
						<input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" aria-label="Search" name="search" id="input_recherche">
						<button class="btn btn-outline-success my-2 mr-sm-2" type="submit">Search</button>
						<button type="button" class="col btn btn-primary mr-2" id="affiche_donnees"> Afficher les données</button> 
					</form>
				</div>
				<div class="row">
					<ul class="col list-group" id="annonce">
		 				<!-- injection js -->	
		 			</ul>
				</div>
	 		</div>
	 	</main>
	 	<?php 
	 		require'include/footer.php';
	 	?>
	 </body>
 </html> 