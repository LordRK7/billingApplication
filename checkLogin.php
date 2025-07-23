<?php session_start();

$a = $_REQUEST["txtEmail"];
$b = $_REQUEST["txtPassword"];

include("dbconnect.php");

$rsUser = mysqli_query($con, "select * from user_info where user_email='$a'");
if(mysqli_num_rows($rsUser)==0)
{
    header("location:index.php?status=1");
}
else
{
    $row = mysqli_fetch_array($rsUser);
    if($row["user_pass"]=="$b")
    {
        $_SESSION["uname"]=$row["user_name"];
        $_SESSION["email"]=$row["user_email"];
        header("location:adminPanel.php");
    }
    else
    {
        header("location:index.php?status=2");
    } 
}
?>