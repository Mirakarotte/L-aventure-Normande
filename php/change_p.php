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
			$op = md5($op);
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