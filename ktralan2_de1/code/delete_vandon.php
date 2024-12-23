<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location:login.php');
	}
	include('connect.php');

	$id = $_GET['id'];

	$sql = "DELETE FROM vandon WHERE id='$id'";

	$stmt = $conn->prepare($sql);
	$query = $stmt->execute();

	header("location:list.php")
?>
