<?php
	session_start();
	include ("../Model/registrationmodel.php");
	if (isset($_POST["btn_Reg"]))
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
	/*if($isPost==true && !empty($username) && !empty($password) && !empty($nationality) && !empty($religion) && !empty($address) && !empty($email) && !empty($gender))
	{
		//$myObj= new User;
		//$myObj->register($username, $password,$religion,$nationality,$email,$gender, $address);
		$myArr=array('Username'=>$username, 
					'Password'=>$password, 
					'Religion'=>$religion, 
					'Nationality'=>$nationality,
					'Email'=>$email, 
					'Gender'=>$gender, 
					'Address'=>$address);
		$myData=fopen("../Model/data.json", "a") or die("File not found");
		fwrite($myData, json_encode($myArr));
		fclose($myData);
		header("Location: ../View/login.php");
	}*/
	if($isPost==true && !empty($username) && !empty($password) && !empty($nationality) && !empty($religion) && !empty($address) && !empty($email) && !empty($gender))
	{
		$conn=new mysqli("localhost", "root", "", "instructor");
		if($conn->connect_error)
		{
			echo "Connection Error: ".$conn->connect_error;
		}	
		else
		{
			$q_ins="insert into ins_info(Username, Password, Religion, Nationality, Email, Gender, Address) values ('".$username."','".$password."','".$religion."','".$nationality."','".$email."','".$gender."','".$address."')";
			//echo $q_ins;
			$query= $conn->query($q_ins);
			if($query)
			{
				header("Location: ../View/login.php");
			}
			else
			{
				echo "insertion failed!";
			}
		}	
	}
?>