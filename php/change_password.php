<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Changer le mot de passe</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
		<form action="change_p.php" method="post">
		 	<h2>Changer le mot de passe</h2>
		 	<?php if (isset($_GET['error'])) { ?>
		 		<p class="error"><?php echo $_GET['error']; ?></p>
		 	<?php } ?>

		 	<?php if (isset($_GET['success'])) { ?>
						<p class="success"><?php echo $_GET['success']; ?></p>
				<?php } ?>

		 	<label>Ancien mot de passe</label>
		 	<input type="password" 
		 				 name="op" 
		 				 placeholder="Ancien mot de passe">
		 				 <br>

		 	<label>Nouveau mot de passe</label>
		 	<input type="password" 
		 				 name="np" 
		 				 placeholder="Nouveau mot de passe">
		 				 <br>

		 	<label>Confirmez le nouveau mot de passe</label>
		 	<input type="password" 
		 				 name="c_np" 
		 				 placeholder="Confirmez le nouveau mot de passe">
		 				 <br>

		 	<button type="submit">Sauvegarder</button>
					<a href="profil.php" class="ca">Profil</a>
		 </form>
</body>
</html>

<?php 
}else{
		 header("Location: index.php");
		 exit();
}
 