<html>Student
<head>
<title>::Leave Management::</title>
<link rel = 'stylesheet' href = 'style.css'>
</head>
<body>
<div class = 'textview'>
<?php
session_start();
if(isset($_SESSION['adminuser']))
	{
	?>
	<center>
	<h1>Leave Management System</h1>
	<?php include 'adminnavi.php'; ?>
	<h2>Extract All Leaves Of Your students</h2>
	<?php
	if(isset($_GET['msg']))
		{
			echo htmlspecialchars($_GET['msg']);
		}
	?>
	<form action = 'extractleaves.php' method = 'post'>
		<table>
			<?php
			echo "<tr><td>Starting Date : </td><td><input type = 'number' min = '1' max = '31' step = '1' name = 'datestart' class = 'textbox shadow selected' style = 'width:50px;'><input type = 'number' min = '1' max = '12' step = '1' name = 'monthstart' class = 'textbox shadow selected' style = 'width:50px;'><input type = 'number' min = '1965' max = '".date('Y')."' step = '1' name = 'yearstart' class = 'textbox shadow selected' style = 'width:100px;'></td></tr>
			<tr><td>Ending Date : </td><td><input type = 'number' min = '1' max = '31' step = '1' name = 'dateend' class = 'textbox shadow selected' style = 'width:50px;'><input type = 'number' min = '1' max = '12' step = '1' name = 'monthend' class = 'textbox shadow selected' style = 'width:50px;'><input type = 'number' min = '1965' max = '".date('Y')."' step = '1' name = 'yearend' class = 'textbox shadow selected' style = 'width:100px;'></td></tr>";
			?>
			<tr><td><input type = 'submit' value = 'Extract' class = 'login-button shadow'></td></tr>
		</table>
	</form>
	</center>
<?php
	}
else
	{
	header('location:index.php?err='.urlencode('Please Login First To Access This Page!'));
	}
?>
</div>
</body>
</html>