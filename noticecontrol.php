<?php 
	$conn=new mysqli("localhost", "root", "", "Recruiter");
    if($conn->connect_error)
    {
        echo "Connection Error: ".$conn->connect_error;
    }   
    else
    {
        $q_select="select * from recr_notice";
        //echo $q_ins;
        $query= $conn->query($q_select);
        if($query->num_rows>0)
        {
            while($row=$query->fetch_assoc())
            {
	            echo "<div class='card_job'>";
		        echo "Notice ID: ".$row['notice_id']."<br>";
				echo "Notice Content: ".$row["notice_content"]."<br>";
				echo "</div>";
			}
        }
        else
        {
                echo "insertion failed!";
        }
    }
	if (isset($_POST["btn_upload"]))
		{
			if($conn->connect_error)
			{
				echo "Connection Error: ".$conn->connect_error;
			}	
			else
			{
				$q_ins="insert into ins_notice(notice_id, notice_content) values ('".$_POST['nid']."','".$_POST['nc']."')";
				//echo $q_ins;
				$query= $conn->query($q_ins);
				if($query)
				{
					header("Location: ../View/notice.php");
				}
				else
				{
					echo "insertion failed!";
				}
			}	
		}
	
?>