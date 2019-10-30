<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<?php
session_start();
include 'connect.php';

?>
<link rel="stylesheet" href="style.css">
<title>::Leave Management::</title>
<?php
if(isset($_SESSION['adminuser']))
{
	$sql = "SELECT Dept,username FROM admins WHERE username = '".$_SESSION['adminuser']."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$dept = $row["Dept"];
		}
include 'adminnavi.php';
$errmsg = $sql = "";
$stuname = trim($_POST['stuname']);
$uname = trim($_POST['uname']);
$mailid = trim($_POST['mailid']);
$doj = trim($_POST['year-join'])."-".trim($_POST['month-join'])."-".trim($_POST['date-join']);
$dob2 = trim($_POST['date-birth'])."-".trim($_POST['month-birth'])."-".trim($_POST['year-birth']);
$stuname = strip_tags($stuname);
$uname = strip_tags($uname);
$mailid = strip_tags($mailid);
$doj = strip_tags($doj);
$dob2 = strip_tags($dob2);
$sickleave = 0;
if(empty($stuname) || empty($uname) || empty($mailid) || empty($doj) || empty($dob2))
	{
		$errmsg.="One or more fields are empty...";
	}
else{
if(empty($doj))
	{
		$errmsg.="Date Of Joining is empty ! ";
	}
	if(empty($dob2))
	{
		$errmsg.="Date Of Birth is empty ! ";
	}
if(strtotime($doj) > time())
	{
		$errmsg.=" Date Of Joining cannot be a future date...";
	}

$sql = "SELECT UserName,StuEmail FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
			if($uname == $row["UserName"])
				{
					$errmsg.=" Username ".$uname." already taken...";
				}
			if($mailid == $row["StuEmail"])
				{
					$errmsg.=" Your Entered Email ID is already registered with another user...";
				}
		}
	}
if ((!filter_var($mailid, FILTER_VALIDATE_EMAIL)) || empty($mailid)) {
  $errmsg.="Invalid email ID...";
	}
}
$sql2 = "SELECT * FROM admins WHERE username = '".$_SESSION['adminuser']."'";
if($conn->query($sql2) == TRUE)
	{
		$result = $conn->query($sql2);
		if($result->num_rows > 0)
			{
				while($row2 = $result->fetch_assoc())
					{
						$sickleave = $row2['SetSickLeave'];
					}
			}
	}
if(!empty($errmsg))
	{
	header('location:index.php?err='.htmlspecialchars(urlencode($errmsg)));
	}
else
	{
		echo "<div class = 'reg-form'>";
		$pw = $uname;
		$sql = "INSERT INTO student (UserName,StuName,Dept,SickLeave,StuEmail,DateOfJoin,DateOfBirth) VALUES "."('".$uname."','".$stuname."','".$dept."','".$sickleave."','".$mailid."','".$doj."','".$dob2."')";
		if ($conn->query($sql) === TRUE) {
			echo "<center>";
			echo "<strong> Registration Successful !</strong><br/><br/>";
			echo "<u>Registration Details :</u><br/>";
			echo "Username : ".$uname."<br/>";
			echo "Student Name : ".$stuname."<br/>";
			echo "Department : ".$dept."<br/>";
			echo "Email id : ".$mailid."<br/>";
			echo "Date Of Joining : ".$doj."<br/>";
			echo "Date Of Birth : ".$dob2."<br/>";
			echo "</center>";
			echo "</div>";
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
$conn->close();
	}
}
else
{
	header('location:index.php?err='.urlencode('Please Login First To Access This Page !'));
}
?>
<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>
