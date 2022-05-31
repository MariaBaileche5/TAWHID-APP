<?php
$host='localhost';
$user='root';
$password='';
$dbname='tutorial';

$con = mysqli_connect($host,$user,$password,$dbname);
if(!$con){
    die("the reason is " . mysqli_connect_error());
}
?>