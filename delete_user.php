<?php

mysql_connect("localhost", "nilwalaw_emark", "32432sdcfsdF") or die(mysql_error());
mysql_select_db("nilwalaw_emark") or die(mysql_error());


if(isset($_GET['id'])){

$id=$_GET['id'];

$sql=mysql_query("DELETE FROM users WHERE id='$id'");
if($sql){

header('Location:manage_uesrs.php');
}
}
?>