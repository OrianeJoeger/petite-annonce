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
      <h2 class="mt-3"> Déposer une annonce </h2>
      <form id="nouvelle-annonce" enctype="multipart/form-data" method="post">
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre"  >
        </div>
        <div class="form-group">
          <label  for="categorie">Categorie</label>
          <select class="form-control" id="categorie" name="categorie">
            <option>Immobilier</option>
            <option>Véhicule</option>
            <option>Mode</option>
            <option>Maison</option>
            <option>Animaux</option>
          </select>
        </div>
        <div class="form-group">
          <label  for="description">Description</label>
          <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="text" class="form-control" id="image" name="photo">
        </div>
        <button class="btn btn-primary" type="submit">Deposer mon annonce</button>

      </form>
    </div>
  </main>

  

  <?php 
  require'include/footer.php';
  ?>


</body>





</html> 