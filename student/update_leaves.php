<?php
function update_leaves($user,$dept)
	{
	include 'connect.php';
	$current_date = strtotime(date("Y-m-d"));
	
	$sql2 = "SELECT SetSickLeave,Dept FROM admins WHERE Dept = '".$dept."'";
	if($conn->query($sql2) == TRUE)
		{
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0)
				{
					while($row2 = $result2->fetch_assoc())
						{
							$setsickleave = $row2["SetSickLeave"];
						}
				}
		}
	
	$sql = "SELECT * FROM student WHERE UserName = '".$user."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
		{
		while($row = $result->fetch_assoc())
			{
			if(strtotime($row["DateOfJoin"]) == strtotime('today'))
				{
					return false;
				}
			else if(strtotime($row["UpdateStatus"]) < strtotime('today'))
			{
				$date = $row["DateOfJoin"];
				$day = date("d",strtotime($date));
				$month = date("m",strtotime($date));
				$year = date("Y");
				$joining_date = $year."-".$month."-".$day;
				$joining_date = strtotime($joining_date);
				if($current_date == $joining_date)
					{
					$sickleave = $row["SickLeave"] + $setsickleave;
					$sql2 = "UPDATE student SET SickLeave = '".$sickleave."' WHERE id = '".$row["id"]."'";
					if($conn->query($sql2) == TRUE)
						{
						return true;
						}
					}
					else
					{
						return false;
					}
			}
			else if($row["UpdateStatus"] == "0000-00-00")
			{
				$date = $row["DateOfJoin"];
				$day = date("d",strtotime($date));
				$month = date("m",strtotime($date));
				$year = date("Y");
				$joining_date = $year."-".$month."-".$day;
				$joining_date = strtotime($joining_date);
				if($current_date == $joining_date)
					{
					$sickleave = $row["SickLeave"] + $setsickleave;
					$sql2 = "UPDATE student SET SickLeave = '".$sickleave."' WHERE id = '".$row["id"]."'";
					if($conn->query($sql2) == TRUE)
						{
						return true;
						}
					}
					else
					{
						return false;
					}
			}
			else
				{	
				return false;
				}
			}
		}
	}
?>