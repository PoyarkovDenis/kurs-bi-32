<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM cars WHERE num_car = '".$_SESSION['car']."'";
	$result = mysqli_query($conn, $sql);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
		$sql = "UPDATE cars SET car = '".$_POST['car']."' WHERE num_car = '".$_SESSION['car']."'";
		mysqli_query($conn, $sql);
		$sql = "UPDATE cars SET car_owner = '".$_POST['car_owner']."' WHERE num_car = '".$_SESSION['car']."'";
		mysqli_query($conn, $sql);
	}
	echo "<script type='text/javascript'>alert('Record changed!');</script>";
	echo "<script>document.location.href = 'interface.php'; </script>";
?>