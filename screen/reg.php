<?php 
    require("config.php");
	
require('db_conn.php');

	function check($xyz)
	{
		if (strpos($xyz, '&lt;script') !== false){
    $ref=$_SERVER['HTTP_REFERER'];
echo "<script>
alert('Please dont use html tags here.');
window.location.href='$ref';
</script>";
	}
	}
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['password'])) 
        { die("Please enter a password."); } 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Invalid E-Mail Address');
window.location.href='$ref';
</script>"; } 
          
        // Check if the username is already taken
		$email=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['email']));
        $query = "SELECT email FROM user WHERE email = '$email'"; 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute(); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){$ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('E-Mail already registered');
window.location.href='$ref';
</script>"; } 
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['password'])) . $salt); 
		$name=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['name']));
		check($name);
		$dob=$_POST['dob'];
		$phone=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['mobile']));
		if(!empty($phone)) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$phone)) // phone number is valid
    {
      $mobile = $phone;

      // your other code here
    }
    else // phone number is not valid
    {
      $ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Invalid Phone Number');
window.location.href='$ref';
</script>"; ;
    }
}
else // phone number is empty
{
  $ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Enter a phone number');
window.location.href='$ref';
</script>"; ;
}
		$info=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['info']));
		$address=mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['address']));
		check($info);
		check($address);
		
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
          
        // Add row to database 
        $query = "INSERT INTO user (email,pass,salt,name,dob,mobile,address,info) VALUES ('$email','$password','$salt','$name','$dob','$mobile','$address','$info')"; 
         
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute();
        } 
		
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());
 $ref=mysqli_real_escape_string($mysqli, htmlspecialchars($_SERVER['HTTP_REFERER']));
echo "<script>
alert('Registeration Unsuccessful');
window.location.href='$ref';
</script>";
		} 
        
		$ref=mysqli_real_escape_string($mysqli, htmlspecialchars('index.php'));
echo "<script>
alert('Registeration Successful, Please Login Now.');
window.location.href='$ref';
</script>";
		
		
    } 
?>