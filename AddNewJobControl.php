<?php
	$conn=new mysqli("localhost", "root", "", "Recruiter");
    if($conn->connect_error)
    {
        echo "Connection Error: ".$conn->connect_error;
    }   
    else
    {
        $q_select="select * from ins_course";
        //echo $q_ins;
        $query= $conn->query($q_select);
        if($query->num_rows>0)
        {
            while($row=$query->fetch_assoc())
            {
	            echo "<div class='card_job'>";
		        echo "Job ID: ".$row['J_id']."<br>";
				echo "Job Name: ".$row["J_name"]."<br>";
				echo " Time: ".$row["J_time"]."<br>";
				echo "</div>";
			}
        }
        else
        {
                echo "insertion failed!";
        }
    }
    if(isset($_POST["btn_App"]))
    {
        if($conn->connect_error)
        {
            echo "Connection Error: ".$conn->connect_error;
        }   
        else
        {
            $q_ins="insert into ins_taken_job (ins_name, J_id) values ('".$_SESSION['uname']."','".$_POST['jid']."') ";
            //echo $q_ins;
            $query= $conn->query($q_ins);
            if($query)
            {
               header("Location:../View/Add_New_Job.php");
            }
            else
            {
                    echo "insertion failed!";
            }
        }
    }
?>