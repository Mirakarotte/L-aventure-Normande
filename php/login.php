<?php 
session_start(); 
include "db.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Le nom d'utilisateur est requis");
		exit();
	}else if(empty($pass)){
		header("Location: index.php?error=Le mot de passe est requis");
		exit();
	}else{
		// Utilisation du mot de passe haché avec bcrypt
		$pass_hashed = password_hash($pass, PASSWORD_BCRYPT);

		// Utilisation de requêtes préparées pour éviter les injections SQL
		$sql = "SELECT * FROM users WHERE uname=?";

		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "s", $uname);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
   	 		// Vérification du mot de passe haché
    		if (password_verify($pass, $row['password'])) {
        		// Authentification réussie
        		$_SESSION['uname'] = $row['uname'];
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		header("Location: ../page/connecte/connecte.html");
        		exit();
    		} else {
        		// Mot de passe incorrect
        		header("Location: index.php?error=Le nom d'utilisateur ou le mot de passe est incorrect");
        		exit();
    		}
		} else {
   			// Nom d'utilisateur introuvable
    		header("Location: index.php?error=Le nom d'utilisateur ou le mot de passe est incorrect");
    		exit();
		}

	}
	
}else{
	header("Location: index.php");
	exit();
}