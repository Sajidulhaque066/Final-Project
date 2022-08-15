<?php 
	$conn=new mysqli("localhost", "root", "", "Recruiter");
    if($conn->connect_error)
    {
        echo "Connection Error: ".$conn->connect_error;
    }   
    else
    {
        $q_select="select * from Recruiter_job where j_id in(select j_id from _taken_job where ins_name='".$_SESSION['uname']."') ";
        //echo $q_ins;
        $query= $conn->query($q_select);
        if($query->num_rows>0)
        {
            while($row=$query->fetch_assoc())
            {
	            echo "<div class='card_job'>";
		        echo "Job ID: ".$row['C_id']."<br>";
				echo "Job Name: ".$row["C_name"]."<br>";
				echo " Time: ".$row["C_time"]."<br>";
				echo "</div>";
			}
        }
        else
        {
                echo "insertion failed!";
        }
    }
?>