<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<?php
session_start();
include 'connect.php';
if(isset($_SESSION['adminuser']))
	{
	$setsickleave = strip_tags(trim($_POST['setsickleave']));
	
	$sql2 = "SELECT Dept,username,SetSickLeave FROM admins WHERE username = '".$_SESSION['adminuser']."'";
	$result = $conn->query($sql2);
	if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				{
					$sql3 = "SELECT Dept,SickLeave FROM student WHERE Dept = '".$row["Dept"]."'";
					$result2 = $conn->query($sql3);
					if($result2->num_rows > 0)
						{
							while($row2 = $result2->fetch_assoc())
								{
									if($row2["SickLeave"] == $row["SetSickLeave"])
										{
											$update = "UPDATE student SET SickLeave = '".$setsickleave."'WHERE Dept = '".$row2["Dept"]."'";
											$conn->query($update);
										}
								}
						}
				}
		}
	
	$sql = "UPDATE admins SET SetSickLeave = '".$setsickleave."' WHERE username = '".$_SESSION['adminuser']."'";
	if($conn->query($sql) == TRUE)
		{
		header('location:set_leaves.php?msg='.urlencode('Leaves Were Set Succesfully!'));
		}
	else
		{
		header('location:set_leaves.php?msg='.urlencode('Setting Of Leaves Failed!'));
		}
	}
else
	{
	header('location:index.php?err='.urlencode('Please Login First To Access This Page!'));
	}
?>