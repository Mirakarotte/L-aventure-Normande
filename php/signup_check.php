<?php 
session_start(); 
include "db.php";

if (isset($_POST['uname']) && isset($_POST['password'])
	&& isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=Le nom d'utilisateur est requis&$user_data");
		exit();
	}else if(empty($pass)){
		header("Location: signup.php?error=Le mot de passe est requis&$user_data");
		exit();
	}
	else if(empty($re_pass)){
		header("Location: signup.php?error=La confirmation du mot de passe est requise&$user_data");
		exit();
	}

	else if(empty($name)){
		header("Location: signup.php?error=Le nom est requis&$user_data");
		exit();
	}

	else if($pass !== $re_pass){
		header("Location: signup.php?error=La confirmation du mot de passe ne correspond pas&$user_data");
		exit();
	}

	else{

		// Utilisation de la fonction de hachage bcrypt
		$pass_hashed = password_hash($pass, PASSWORD_DEFAULT);

		// Utilisation de requêtes préparées pour éviter les injections SQL
		$sql = "SELECT * FROM users WHERE uname=?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "s", $uname);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($result) > 0) {
    		// Nom d'utilisateur déjà pris
   			header("Location: signup.php?error=Le nom d'utilisateur est déjà prit. Essayez-en un autre.");
    		exit();
		} else {
    		// Insertion de l'utilisateur dans la base de données
    		$sql2 = "INSERT INTO users(uname, password, name) VALUES (?, ?, ?)";
   			$stmt2 = mysqli_prepare($conn, $sql2);
    		mysqli_stmt_bind_param($stmt2, "sss", $uname, $pass_hashed, $name);
    		$result2 = mysqli_stmt_execute($stmt2);

    		if ($result2) {
        		// Compte créé avec succès
        		header("Location: signup.php?success=Votre compte a été créé avec succès");
        		exit();
    		} else {
        		// Erreur lors de l'insertion dans la base de données
        		header("Location: signup.php?error=Une erreur inconnue s'est produite");
        		exit();
    		}
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}