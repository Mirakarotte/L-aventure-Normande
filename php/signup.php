<!DOCTYPE html>
<html>
<head>
	<title>S'inscrire</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<form action="signup_check.php" method="post">
		<h2>S'INSCRIRE</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<?php if (isset($_GET['success'])) { ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
		<?php } ?>

		<label>Nom</label>
		<?php if (isset($_GET['name'])) { ?>
			<input type="text" 
				  name="name" 
				  placeholder="Nom"
				  value="<?php echo $_GET['name']; ?>"><br>
		<?php }else{ ?>
			<input type="text" 
				  name="name" 
				  placeholder="Nom"><br>
		<?php }?>

		<label>Nom d'utilisateur</label>
		<?php if (isset($_GET['uname'])) { ?>
			<input type="text" 
				  name="uname" 
				  placeholder="Nom d'utilisateur"
				  value="<?php echo $_GET['uname']; ?>"><br>
		<?php }else{ ?>
			<input type="text" 
				  name="uname" 
				  placeholder="Nom d'utilisateur"><br>
		<?php }?>


		<label>Mot de passe</label>
		<input type="password" 
			  name="password" 
			  placeholder="Mot de passe"><br>

		<label>Confirmation du mot de passe</label>
		<input type="password" 
			  name="re_password" 
			  placeholder="Confirmation du mot de passe"><br>

		<button type="submit">S'inscrire</button>
		<a href="index.php" class="ca">Vous avez déjà un compte ?</a>
	</form>
</body>
</html>