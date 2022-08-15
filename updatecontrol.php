<?php

	include ("../Model/updatemodel.php");
	if (isset($_POST["btn_up"]))
		{
			$isPost=true;
			if($_POST["uname"]!="")
			{
				$username=$_POST["uname"];
				$_SESSION['uname']=$_POST["uname"];
			}
			if($_POST["pass"]!="")
			{
				$password=$_POST["pass"];
			}
			if($_POST["rel"]!="")
			{
				$religion=$_POST["rel"];
			}
			if($_POST["nt"]!="")
			{
				$nationality=$_POST["nt"];
			}
			if($_POST["email"]!="")
			{
				$email=$_POST["email"];
			}
			if($_POST["gender"]!="")
			{
				$gender=$_POST["gender"];
			}
			if($_POST["address"]!="")
			{
				$address=$_POST["address"];
			}
		}

	if(!empty($username) && !empty($password) && !empty($nationality) && !empty($religion) && !empty($address) && !empty($email) && !empty($gender))
	{
		$conn=new mysqli("localhost", "root", "", "instructor");
		if($conn->connect_error)
		{
			echo "Connection Error: ".$conn->connect_error;
		}	
		else
		{
			$q_ins="update ins_info set Username='".$username."' , Password= '".$password."', Religion= '".$religion."', Nationality= '".$nationality."', Email= '".$email."', Gender= '".$gender."', Address= '".$address."' where Username='".$old_username."'";
			//echo $q_ins;
			$query= $conn->query($q_ins);
			if($query)
			{
				header("Location: ../View/login.php");
			}
			else
			{
					echo " Data insertion failed!";
			}
		}
	}
?>
