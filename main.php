<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    
    <title>Recipes</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">

    
  </head>
  <body>
    
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center">
        <strong>Recipes</strong>
      </a>
    </div>
  </div>
</header>

<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Рецепты</h1>
        <!--<p class="lead text-muted"></p>-->
        <p>
          <a href="add_new.php" class="btn btn-primary my-2">Добавить новый рецепт</a>
        </p>
      </div>
    </div>
  </section>

<div class="album py-5 bg-light">
	<div class="container">
		<div class="row row-cols-1 g-3">
		<?php
			$con = mysqli_connect("localhost", "root", "", "recipes");
			$sql = "SELECT * FROM list_of_recipes ORDER BY id DESC";
			$notes = mysqli_query($con, $sql);
			$notes_amnt = mysqli_num_rows($notes);
			$note_list = mysqli_fetch_all($notes, MYSQLI_ASSOC); // Список рецептов
			mysqli_close($con);
			for ($i = 0; $i < $notes_amnt; $i++){
				include "note.php";
			}
		?>		
		</div>
	</div>
</div>
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Some components is &copy; Bootstrap</p>
  </div>
</footer>


    <script src="css/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
