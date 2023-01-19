<!DOCTYPE html>
<html>
<head>
	<link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/add_new.css">
</head>

<body>
<div class="container">
	<div class=" text-center mt-5 ">
		<h1>Добавить новый рецепт</h1>
	</div>
	<div class="row ">
	<div class="col-lg-7 mx-auto">
	<div class="card mt-2 mx-auto p-4 bg-light">
	<div class="card-body bg-light">
	<div class = "container">
		<form id="contact-form" role="form" method="POST" action="write_bd.php">
			<div class="controls">
				<div class="row">
				<div class="col-md-12">
				<div class="form-group">
					<label for="form_name">Название</label>
					<input id="form_name" type="text" name="name" class="form-control" placeholder="Название" maxlength=250 required="required" data-error="Name is required">
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-12">
				<div class="form-group">
					<label for="description">Краткое описание</label>
					<input id="description" type="text" name="description" class="form-control" placeholder="Краткое описание" maxlength=250 required="required" data-error="description is required">
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-12">
				<div class="form-group">
					<label for="form_message">Рецепт</label>
					<textarea id="form_message" name="recipe" class="form-control" placeholder="Рецепт" rows="8" maxlength=2442 required="required" data-error="Please, leave us a message."></textarea>
				</div>
				</div>
				<div>
				<br>
				</div>
				<div class="col-md-12">
					<input type="submit" class="btn btn-success btn-send pt-2 btn-block" value="Записать">
					<a href="main.php">Назад</a>
				</div>
				</div>
			</div>
		</form>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
</body>
</html>
