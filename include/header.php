<?php 
require_once './lib.php';

$user = getUserConnected();
?>

<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><img class="logo" src="images/logo2.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="annonces.php">Annonces</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="annonces_ajax.php">Annonces(ajax)</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ajout_annonce.php">Déposer une annonce</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<?php if($user === null): ?>
				<li class="nav-item ">
					<a class="nav-link" href="authentification.php">Authentification</a>
				</li>
				<?php else: ?>
				<li class="nav-item">
					<span class="navbar-text">Bonjour <?php echo $user['name']; ?></span>
				</li>
				<li class="nav-item">
					<span class="navbar-text ml-2">|</span>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="logout.php">Déconnexion</a>
				</li>
				<?php endif;?>
			</ul>
		</div>
	</nav>
</header>

