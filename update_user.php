<?php 
require_once('database.php');

$id=$_POST['id'];
$data =     array(
    'no_identitas' => $_POST['no_identitas'],
    'nama' => $_POST['nama'],
    'status' => $_POST['status'],
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    );

$sql2=update("user",$data,$id);
if ($sql2) {
    header("location:user.php");
}
?>