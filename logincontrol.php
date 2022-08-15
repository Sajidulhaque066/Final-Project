<?php
session_start();
include("../Model/loginmodel.php");
if(isset($_POST["btn_log"]))
{
    $isPost=true;
    if($_POST["uname"]!="")
    {
        $username=$_POST["uname"];
    }
    if($_POST["pass"]!="")
    {
        $password=$_POST["pass"];
    }
}
if(!empty($_POST["uname"]) && !empty($_POST["pass"]))
{
    /*$jsondata=file_get_contents("../Model/data.json") or die("File not found");
    $phpdata=json_decode($jsondata,true);
    foreach($phpdata['User'] as $obj ) 
    {
        if(($username==$obj['Username']) && ($password==$obj['Password']))
        {
            $_SESSION["uname"]=$_POST["uname"];
            $_SESSION["pass"]=$_POST["pass"];
            header("Location:../View/home.php");
        }
        else
        {
            $error=1;
        }
    }*/
    $conn=new mysqli("localhost", "root", "", "instructor");
    if($conn->connect_error)
    {
        echo "Connection Error: ".$conn->connect_error;
    }   
    else
    {
        $q_select="select Username, Password from ins_info where Username='".$username."'";
        //echo $q_ins;
        $query= $conn->query($q_select);
        if($query->num_rows>0)
        {
            $row=$query->fetch_assoc();
            if($row['Username']==$username && $row['Password']==$password)
            {
                header("Location: ../View/home.php");
                $_SESSION["uname"]=$_POST["uname"];
                $_SESSION["pass"]=$_POST["pass"];
            }
            else
            {
                ?>
                <script>
                    console.log("Login Error");
                    alert("Login Error");
                </script>

                <?php

            }
        }
        else
        {
                echo "insertion failed!";
        }
    }
}

?>
