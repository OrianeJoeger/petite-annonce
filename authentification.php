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
     <div class="row" > 
      <div class= "col-md-6 offset-md-3"> 
        <h2 class="mt-3 text-center"> Se connecter </h2>
        <form id="authentification-form">
          <div class="form-group">
            <label for="adressemail">Adresse email</label>
            <input type="email" class="form-control" id="adressemail" aria-describedby="emailHelp" name="email">

          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="password">
          </div>
          <div class="form-group form-check">
          </div>
          <button type="submit" class="btn btn-primary">Valider</button>
        </form>
      </div>
    </div>
  </div>
</main>

<?php 
require'include/footer.php';
?>


</body>
</html> 