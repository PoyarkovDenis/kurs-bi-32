<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM car_owners WHERE driver_license = '".$_SESSION['car_owners']."'";
	$result = mysqli_query($conn, $sql);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
		$sql = "UPDATE car_owners SET fio_owner = '".$_POST['fio_owner']."' WHERE driver_license = '".$_SESSION['car_owners']."'";
		mysqli_query($conn, $sql);
		$sql = "UPDATE car_owners SET phone_number_car_owner = '".$_POST['phone_number_car_owner']."' WHERE driver_license = '".$_SESSION['car_owners']."'";
		mysqli_query($conn, $sql);
	}
	echo "<script type='text/javascript'>alert('Record changed!');</script>";
	echo "<script>document.location.href = 'interface.php'; </script>";
?>