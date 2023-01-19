<!DOCTYPE html>
<html>
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Admin panel</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="GET" action="auth.php">
        <h3>Login Here</h3>
		
        
        <label for="username">Username</label>
		<h5 style="color:#ff0000">
		<?php if ($_GET["err"]=="username"){
				echo "Неверное имя пользователя";}
		?>
		</h5>
        <input type="text" name="name" placeholder="Username" id="username">

        <label for="password">Password</label>
        <h5 style="color:#ff0000">
        <?php if ($_GET["err"]=="password"){
				echo "Неверный пароль";}
		?>
		</h5>
        <input type="password" name="password" placeholder="Password" id="password">

        <button type="submit">Log In</button>
    </form>
</body>
</html>
