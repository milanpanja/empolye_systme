<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$db_name="empolye_systme";

$conn= mysqli_connect($servername,$username,$password,$db_name);
if($conn){
    //echo "Connection Done";

}
else
{
 echo "Connection Failed".mysqli_connect_error();
}
?>

