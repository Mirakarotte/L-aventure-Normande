<!DOCTYPE html>
<html>
<head>
	<title>CONNEXION</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	 <form action="login.php" method="post">
	 	<h2>CONNEXION</h2>
	 	<?php if (isset($_GET['error'])) { ?>
	 		<p class="error"><?php echo $_GET['error']; ?></p>
	 	<?php } ?>
	 	<label>Nom d'utilisateur</label>
	 	<input type="text" name="uname" placeholder="Nom d'utilisateur"><br>

	 	<label>Mot de passe</label>
	 	<input type="password" name="password" placeholder="Mot de passe"><br>

	 	<button type="submit">Connexion</button>
		  <a href="signup.php" class="ca">Créer un compte</a>
	 </form>
</body>
</html>