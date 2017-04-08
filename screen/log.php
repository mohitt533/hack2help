<?php 
session_start();
require('db_conn.php');
    require("config.php"); 
   
    if(isset($_POST['center'])){ 
		$username=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['username']));
        $query = "SELECT cid,district,pass FROM center WHERE un = '$username'"; 
        try{ 
            $stmt = $db->prepare($query); 
		  $result= $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($cid, $district, $pass);
        $stmt->fetch();
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());
        		} 
$login_ok = false; 
        
        if($result){ 
            $check_password = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['password']));  
        
            if($check_password === $pass){
                $login_ok = true;
            } 
        } 
		
 
        if($login_ok){ 
            unset($password); 
			$_SESSION['cid'] = $cid;
           if(!empty($_SESSION['cid'])) 
    {
        $ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Logged in Successfully');
window.location.href='farmer.php';
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
	
	
	else if(isset($_POST['fci'])){ 
		$username=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['username']));
        
            $check_password = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['password']));
$login_ok = false;			
        if($username=='admin'){
            if($check_password == 'admin'){
                $login_ok = true;
            } 
         
		}
 
        if($login_ok){ 
            unset($password); 
		$_SESSION['flag'] = 1;	
        $ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Logged in Successfully');
window.location.href='fci.php';
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
     
	
	
	?>