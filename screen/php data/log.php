<?php 
session_start();
require('db_conn.php');


    require("config.php"); 
    $submitted_email = ''; 
    if(!empty($_POST)){ 
		$email=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['email']));
        $query = "SELECT id,email,pass,salt,name FROM user WHERE email = '$email'"; 
         
          
        try{ 
            $stmt = $db->prepare($query); 
           
		  $result= $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($id, $email, $pass,$salt,$name);
        $stmt->fetch();
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        
        if($result){ 
            $check_password = hash('sha256', mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['password'])) . $salt);  
           for($round = 0; $round < 65536; $round++){ $check_password = hash('sha256', $check_password . $salt); } 
			 
            if($check_password === $pass){
                $login_ok = true;
            } 
        } 
		
 
        if($login_ok){ 
            unset($salt); 
            unset($password); 
			$_SESSION['id'] = $id;
            $_SESSION['email'] = mysqli_real_escape_string($mysqli, htmlspecialchars($email));
			$_SESSION['name'] = mysqli_real_escape_string($mysqli, htmlspecialchars($name));
           if(!empty($_SESSION['email'])) 
    {
        $ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Logged in Successfully');
window.location.href='$ref';
</script>";
    }
        } 
        else{ 
			$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Login Failed');
window.location.href='$ref';
</script>";
             
        } 
    } 
	?>