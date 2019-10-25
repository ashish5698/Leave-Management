<title>::Leave Management::</title>Student
<link rel = "stylesheet" href = "style.css">
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<div class = "textview">
<center>
<h1>Leave Management System</h1>
<?php
session_start();
if(isset($_SESSION['adminuser']))
	{
	include 'adminnavi.php';
	echo "<h2>Set Default Leaves For Your students</h2>";
	if(isset($_GET['msg']))
		{
			echo "<div class = 'error'><b><u>".htmlspecialchars($_GET['msg'])."</u></b></div>";
		}
	echo "<form action = 'setleaves.php' method = 'post'>
			<table>
				<tr>
				<td>Sick Leave : </td>
				<td><input type = 'number' min = '0' name = 'setsickleave' class = 'textbox shadow selected'></td>
				</tr>
				<tr>
				<td>Earn Leave : </td>
				<td><input type = 'number' min = '0' name = 'setearnleave' class = 'textbox shadow selected'></td>
				</tr>
				<tr>
				<td>Casual Leave : </td>
				<td><input type = 'number' min = '0' name = 'setcasualleave' class = 'textbox shadow selected'></td>
				</tr>
				<tr>
				<td><input type = 'submit' value = 'Set' class = 'login-button shadow'></td>
				</tr>
			</table>
		</form>";
	}
else
	{
	header('location:index.php?err='.urlencode('Please Login First To Access This Page !'));
	}
?>
</center>
</div>