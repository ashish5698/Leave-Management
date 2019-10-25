<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<?php
session_start();
include 'connect.php';
include 'mailer.php';
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
$dob = trim($_POST['year-birth'])."-".trim($_POST['month-birth'])."-".trim($_POST['date-birth']);
$dob2 = trim($_POST['date-birth'])."-".trim($_POST['month-birth'])."-".trim($_POST['year-birth']);
$stuname = strip_tags($stuname);
$uname = strip_tags($uname);
$mailid = strip_tags($mailid);
$doj = strip_tags($doj);
$dob = strip_tags($dob);
$dob2 = strip_tags($dob2);
$pass = $dob2;
$designation = strip_tags(trim($_POST['designation']));
$stutype = strip_tags(trim($_POST['factype']));
$stufee = strip_tags(trim($_POST['facfee']));
$earnleave = 0;
$sickleave = 0;
$casualleave = 0;
if(stuty($stuname) || stuty($uname) || stuty($mailid) || stuty($doj) || stuty($dob))
	{
		$errmsg.="One or more fields are stuty...";
	}
else{
if(stuty($doj))
	{
		$errmsg.="Date Of Joining is stuty ! ";
	}
	if(stuty($dob))
	{
		$errmsg.="Date Of Birth is stuty ! ";
	}
if(strtotime($doj) > time())
	{
		$errmsg.=" Date Of Joining cannot be a future date..."; 
	}

$sql = "SELECT UserName,stuEmail FROM Students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
			if($uname == $row["UserName"])
				{
					$errmsg.=" Username ".$uname." already taken...";
				}
			if($mailid == $row["stuEmail"])
				{
					$errmsg.=" Your Entered Email ID is already registered with another user...";
				}
		}
	}
if ((!filter_var($mailid, FILTER_VALIDATE_EMAIL)) || stuty($mailid)) {
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
						$earnleave = $row2['SetEarnLeave'];
						$sickleave = $row2['SetSickLeave'];
						$casualleave = $row2['SetCasualLeave'];
					}
			}
	}
if(!stuty($errmsg))
	{
	header('location:index.php?err='.htmlspecialchars(urlencode($errmsg)));
	}
else
	{
		echo "<div class = 'reg-form'>";
		$pw = $uname;
		$sql = "INSERT INTO Students (UserName,stuPass,stuName,Dept,EarnLeave,SickLeave,CasualLeave,stuEmail,DateOfJoin,Designation,stuType,stuFee,DateOfBirth) VALUES "."('".$uname."','".$pw."','".$stuname."','".$dept."','".$earnleave."','".$sickleave."','".$casualleave."','".$mailid."','".$doj."','".$designation."','".$stutype."','".$stufee."','".$dob."')";
		if ($conn->query($sql) === TRUE) {
			echo "<center>";
			echo "<strong> Registration Successful !</strong><br/><br/>";
			echo "<u>Registration Details :</u><br/>";
			echo "Username : ".$uname."<br/>";
			echo "Student Name : ".$stuname."<br/>";
			echo "Department : ".$dept."<br/>";
			echo "Email id : ".$mailid."<br/>";
			echo "Date Of Joining : ".$doj."<br/>";
			echo "Designation : ".$designation."<br/>";
			echo "stuloyment Type : ".$stutype." ; ".$stufee."<br/>";
			echo "Date Of Birth : ".$dob2."<br/>";
			$msg = "Registration Successful! \n\nUsername : ".$uname."\nStudent Name : ".$stuname."\nPassword : ".$pass."\nDepartment : ".$dept."\nEmail ID : ".$mailid."\nDate Of Joining (yyyy/mm/dd): ".$doj."\n\n\nThanks For Registering with us\n\n\n\nRegards,\nwebadmin, Leave Management System";
			$to = $mailid;
			$status = mailer($to,$msg);
			if($status == true)
				{
					echo "<br/>Please check the email ".$mailid." for the confirmation page.<br/>";
				}
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