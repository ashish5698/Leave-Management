<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<?php
session_start();
?>
<html>
<head>
<title>::Leave Management::</title>
</head>
<body>
<link rel = "stylesheet" href = "style.css">
<div class = "textview">
<?php
echo "<h1>Leave Management System</h1>";
include 'adminnavi.php';
include 'connect.php';
include 'mailer.php';

if(filter_var($_GET['id'],FILTER_VALIDATE_INT) && filter_var($_GET['stuid'],FILTER_VALIDATE_INT))
	{
		$id =$_GET['id'];
		$stuid =$_GET['stuid'];
	}
else
	{
		header('location:home.php');
	}
if(isset($_SESSION['adminuser']))
	{
	
	$sql = "SELECT * FROM stu_leaves WHERE id='".$id."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
		{
		while($row = $result->fetch_assoc())
			{
				$sql2 = "SELECT id,stuEmail FROM Students WHERE id = '".$stuid."'";
				$result2 = $conn->query($sql2);
				if($result2->num_rows > 0)
					{
						while($row2 = $result2->fetch_assoc())
							{
							$email = $row2['stuEmail'];
							$sql3 = "UPDATE stu_leaves SET Status = 'Rejected' WHERE id = '".$id."'";
							if($conn->query($sql3) === TRUE)
									{
									$msg = "Your Leave Has Been Rejected ! \nStudent Name : ".$row['stuName']."\nLeave Type : ".$row['LeaveType']."\nNo. Of Leave Days : ".$row['LeaveDays']."\nStarting Date : ".$row['StartDate']."\nEnd date : ".$row['EndDate']."\n\n\nThanks,\nwebadmin, Leave Management System";
									$status = mailer($email,$msg);
									if($status === TRUE)
										{
										echo "The Leave Request Status Mail For ".$row['stuName']." Has been sent to his/her registered email address !<br/>";
										}
									}	
							}
					}
			}
		}
	}
else
	{
	header('location:index.php?err='.urlencode('Please Login First To Access This Page !'));
	}
?>
</div>
</body>
</html>