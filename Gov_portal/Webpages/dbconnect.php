<?php
$v=time();
$server="localhost";
$Username="root";
$Password= "";
$database="school portal";

$connect=mysqli_connect($server, $Username, $Password,$database); 
if($connect){
    // echo"Success";
}
?>