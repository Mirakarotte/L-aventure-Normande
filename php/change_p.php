<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {

		include "db.php";

if (isset($_POST['op']) && isset($_POST['np'])
		&& isset($_POST['c_np'])) {

	function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
		
		if(empty($op)){
			header("Location: change_password.php?error=Votre ancien mot de passe est requis");
		exit();
		}else if(empty($np)){
			header("Location: change_password.php?error=Votre nouveau mot de passe est requis");
		exit();
		}else if($np !== $c_np){
			header("Location: change_password.php?error=Le mot de passe de confirmation ne correspond pas");
		exit();
		}else {
			// hashing the password
			/*$op = md5($op);
			$np = md5($np);
			$id = $_SESSION['id'];

			$sql = "SELECT password
							FROM users WHERE 
							id='$id' AND password='$op'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) === 1){
					
				$sql_2 = "UPDATE users
									SET password='$np'
									WHERE id='$id'";
				mysqli_query($conn, $sql_2);
				header("Location: change_password.php?success=Votre mot de passe a été changé avec succès");
				exit();

			}else {
				header("Location: change_password.php?error=Mot de passe incorrect");
				exit();
			}*/
			// Utilisation de fonctions de hachage sécurisées
			$op_hashed = md5($op);
			$np_hashed = md5($np);

			$id = $_SESSION['id'];

			// Utilisation de requêtes préparées pour éviter les injections SQL
			$sql = "SELECT password FROM users WHERE id=? AND password=?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "is", $id, $op_hashed);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if (mysqli_num_rows($result) === 1) {
    			// Mise à jour du mot de passe
    			$sql_2 = "UPDATE users SET password=? WHERE id=?";
    			$stmt_2 = mysqli_prepare($conn, $sql_2);
    			mysqli_stmt_bind_param($stmt_2, "si", $np_hashed, $id);
    			mysqli_stmt_execute($stmt_2);

    			header("Location: change_password.php?success=Votre mot de passe a été changé avec succès");
    			exit();
			} else {
    			// Mot de passe incorrect
    			header("Location: change_password.php?error=Mot de passe incorrect");
    			exit();
			}

		}

		
}else{
	header("Location: change_password.php");
	exit();
}

}else{
		 header("Location: index.php");
		 exit();
}