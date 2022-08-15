<?php
	include("../Model/profilemodel.php");
	/*$jsondata= file_get_contents("../Model/data.json") or die("File not found");
	$phpdata= json_decode($jsondata,true);			//decode= json to arr or obj, encode=arr or obj to json
	foreach($phpdata['User'] as $b)
		{
			if(($username==$b['Username'])&&($password==$b['Password']))
	        {
	        	echo "<fieldset>";
	        	echo "Username: ".$b['Username']."<br>";
				echo "Password: ".$b["Password"]."<br>";
				echo "Religion: ".$b["Religion"]."<br>";
				echo "Nationality: ".$b["Nationality"]."<br>";
				echo "E-Mail: ".$b["Email"]."<br>";
				echo "Gender: ".$b["Gender"]."<br>";
				echo "Address: ".$b["Address"]."<br>";
				echo "</fieldset>";
	        }
		} */
	$conn=new mysqli("localhost", "root", "", "instructor");
    if($conn->connect_error)
    {
        echo "Connection Error: ".$conn->connect_error;
    }   
    else
    {
        $q_select="select Username, Password, Religion, Nationality, Email, Gender, Address from ins_info where Username='".$username."'";
        //echo $q_ins;
        $query= $conn->query($q_select);
        if($query->num_rows>0)
        {
            $row=$query->fetch_assoc();
            
	        echo "Username: ".$row['Username']."<br>";
			echo "Password: ".$row["Password"]."<br>";
			echo "Religion: ".$row["Religion"]."<br>";
			echo "Nationality: ".$row["Nationality"]."<br>";
			echo "E-Mail: ".$row["Email"]."<br>";
			echo "Gender: ".$row["Gender"]."<br>";
			echo "Address: ".$row["Address"]."<br>";
		}
        else
        {
                echo "insertion failed!";
        }
    }
?>