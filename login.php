<?php
session_start();
$email_id = $user_pass = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
$email_id = $_POST["email_id"];
$user_pass= $_POST["user_pass"];
			
// Initialize the parameters
   include "connection.php";
				
//Create Connection
   $conn = new mysqli($servername, $username,null, $dbname);
				
// Check connection
   if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
				
$sql = "SELECT * FROM volunteer WHERE email_id ='$email_id' AND user_pass ='$user_pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Redirect to profile page
var_dump($result);
$record=$result->fetch_assoc();  //assoc-->associative array
var_dump($record);echo $record;
					
$_SESSION["loggedIn"]=true;
$_SESSION["loggedInUserId"]=$record["userId"];
header("Location:profile.php");
} else {
echo "Invalid Credentials";
}
}
?>