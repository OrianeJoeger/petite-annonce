<?php

require 'lib.php';
$id = $_REQUEST['idAnnonce'];
$annonce = getAnnonceById($id);
?>


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
		<div class="container">

			<div class="row mt-4">
				<div class="col-sm-4 col-md-2">
					<img class="img_annonces border border-5 rounded-sm" src="<?php echo $annonce['photo']; ?>"/>
				</div>

				<div class="col-sm-6 offset-md-2 ">
					<h3> <?php echo $annonce['titre']; ?> </h3>
					<p> <?php echo $annonce['prix']; ?> € </p>
					
					<p> <?php echo $annonce['date']; ?> </p>
				</div>
			</div>
			<div class="row">
				<div class="col ">
					<hr class="my-4 rgba-green">

					<div class="col">
						<h2>Catégorie</h2>
						<div class=mt-4>
							<p> <?php echo $annonce['categorie']; ?> </p>
						</div>
						<hr class="my-4 rgba-green">

						<div class="col">
							<h2>Description</h2>
							<div class=mt-4>
								<p> <?php echo $annonce['description']; ?> </p>
							</div>
							<hr class="my-4 rgba-green">

							<div class="col ">
								<h2>Contact</h2>
								<div class=mt-4>
								<p><?php echo $annonce['pseudo']; ?></p>
								<p><?php echo $annonce['rdv_lat']; ?></p>
								<p><?php echo $annonce['rdv_lon']; ?></p>
							</div>
							
						</div>
					</div>

				</div>

			</main>



			<?php 
			require'include/footer.php';
			?>



		</body>





		</html> 