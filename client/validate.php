<?php
session_start();
include 'connect.php';
require 'update_leaves.php';
$username = strip_tags(trim($_POST['uname']));
$password = strip_tags(trim($_POST['pass']));

$sql = "SELECT UserName, stuPass,UpdateStatus,Dept FROM Students";
$result = $conn->query($sql);
if($result->num_rows>0){
while($row = $result->fetch_assoc()) {
        if(($username == $row["UserName"]) && ($password == $row["stuPass"]))
			{
			$_SESSION["user"] = $username;
			$dept = $row["Dept"];
			$status = update_leaves($username,$dept);
			if($status  === true)
				{
				header('location:home.php?msg='.urlencode('Your Leaves Were Updated Successfully !'));
				exit();
				}
			else
				header('location:home.php');
			}
		else
			{
			header('location:index.php?err='.urlencode('Username Or Password Incorrect'));
			exit();
			}
    }
}
else
	{
		echo "Database stuty ! Please register some Students first";
	}	
?>