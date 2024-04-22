<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>DELETE</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
		<form action="delete.php" method="post">

		 	<?php if (isset($_GET['success'])) { ?>
						<p class="success"><?php echo $_GET['success']; ?></p>
				<?php } ?>
					<a href="index.php" class="ca">LOGIN</a>
		 </form>
</body>
</html>

<?php 
}else{
		 header("Location: index.php");
		 exit();
}
 