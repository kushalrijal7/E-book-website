<?php 
 include_once('C:\xampp\htdocs\Ecom\include\connect.php');
//  session_start();
//  $_SESSION["status"]=false;
if(isset($_POST['log'])){

 

$loginname = $_POST['username'];
$password = $_POST['password'];

	if (empty($loginname) || empty($password)){
			header("Location: ../login.php?error=fields_are_empty");
			exit();
		}

	else{
        $query = "SELECT * FROM `users` WHERE username=? or email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../login.php?error=prepared statement error");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $loginname, $loginname);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $verify = password_verify($password,$row['password']);
                if($verify == TRUE){
                        $_SESSION['username'] = $loginname;
                        $_SESSION["status"]=true;
                        echo"<script>
                        window.location.href = './home.php';
                        </script>";
         }
         else{
            $errors['password'] = 'Please Enter Correct Password';
        }
		
            }
             

	}

}
}
else{

	header("Location:../login.php?error=login first");
	exit();
}
mysqli_close($conn);

?>
