<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {

	?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>HOME</title>
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
	</head>

	<body>
		<h1>Hello,
			<?php echo $_SESSION['name']; ?>
		</h1>
		<nav class="home-nav">
			<a href="change_password.php">Change Password</a>
			<a href="logout.php">Logout</a>
			<a href="delete.php?delete=" .$id>Delete</a>
		</nav>

	</body>

	</html>

<?php
} else {
	header("Location: index.php");
	exit();
}
