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
	</head>

	<header>
		<img src="../img/logo.png" class="logo">
	</header>

	<body>
		<h1>Bonjour,
			<?php echo $_SESSION['name']; ?>
		</h1>
		<nav class="home-nav">
			<a href="change_password.php">Changer le mot de passe</a>
			<a href="logout.php">Deconnexion</a>
			<a href="delete.php?delete=" .$id>Supprimer le compte</a>
		</nav>

	</body>

	</html>

<?php
} else {
	header("Location: index.php");
	exit();
}
