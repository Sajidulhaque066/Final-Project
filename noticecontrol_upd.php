<?php 
	if(isset($_POST['btn_update']))
	{
		$conn=new mysqli("localhost", "root", "", "Recruiter");
		if($conn->connect_error)
		{
			echo "Connection Error: ".$conn->connect_error;
		}	
		else
		{
			$q_ins="update ins_notice set notice_content='".$_POST['nc']."' where notice_id='".$_POST['nid']."'";
			//echo $q_ins;
			$query= $conn->query($q_ins);
			if($query)
			{
				$q_sel="select * from ins_notice";
				$output="<div class='card_job'>";
				$result=$conn->query($q_sel);
				if($result->num_rows>0)
				{
					while($rows=$result->fetch_assoc())
					{
						$output.="<table><tr><td>Notice ID: </td><td>{$rows['notice_id']}</td></tr><tr><td>Notice Content: </td><td>{$rows['notice_content']}</td></tr></table>";
					}
					$output.="</div>";
				}
				else
				{
					echo "0 results";
				}

			}
			else
			{
					echo "Update failed!";
			}
		}
		$conn->close();
		echo $output;
	}
?>