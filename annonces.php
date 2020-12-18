 <?php

 require 'lib.php';
 $annonces = getAnnonces();

 //print_r($annonces);

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
 		<div class="container-fluid">

 			<h2 class="mt-3">Annonces </h2>

 			<ul class="list-group">
 				
 				<?php foreach ($annonces as $annonce) : ?>
 					<li class=" shadow-sm list-group-item p-3 mt-3 mb-3">
 						<div class="row align-items-center">
 							<div class="col-sm-4 ">
 								<img class="img_annonces border border-5 rounded-sm"src="<?php echo $annonce['photo']; ?>"/>
 							</div>
 							<div class="col-sm-6 ">
 								<h3> <?php echo $annonce['titre']; ?> </h3>
 								<p> <?php echo $annonce['prix']; ?> € </p>
 								<!--<p> <?php echo $annonce['description']; ?> </p>-->
 								<p> <?php echo $annonce['categorie']; ?> </p>
 								<p> <?php echo $annonce['date']; ?> </p>
 								
 							</div>
 							<div class="col-sm-2">
 								
 								<a class="btn btn-primary btn-block " href="annonce_details.php?idAnnonce=<?php echo $annonce['id'] ?>">Voir plus</a>


 								<button 
	 								class="btn btn-primary btn-block btn-suppr"
	 								href="#" 
	 								data-id="<?php echo $annonce['id'];?>"
	 								role="button" 
	 							>
	 								Supprimer
	 							</button> 
 							</div>
 						</div>
 					</div>


 				</li>
 			<?php endforeach;?>


 		</ul>
 	</div>
 </main>



 <?php 
 require'include/footer.php';
 ?>



</body>





</html> 