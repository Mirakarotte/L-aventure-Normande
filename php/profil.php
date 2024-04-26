<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {

	?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>PROFIL</title>
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<link rel="stylesheet" href="../css/img.css">
	</head>

	

	<body>
			<div class="img">
				<img src="../img/logo.png">
			</div>
			<h1>Bonjour,
				<?php echo $_SESSION['name']; ?>
			</h1>
			<nav class="home-nav">
				<a href="change_password.php"><strong>Changer le mot de passe</strong></a>
				<a href="logout.php"><strong>Deconnexion</strong></a>
				<a href="delete.php?delete=" .$id><strong>Supprimer le compte</strong></a>
			</nav>
	</body>

	</html>

<?php
} else {
	header("Location: index.php");
	exit();
}
