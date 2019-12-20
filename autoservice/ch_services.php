<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM services WHERE id_services = '".$_SESSION['services']."'";
	$result = mysqli_query($conn, $sql);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
		$sql = "UPDATE services SET service_adress = '".$_POST['service_adress']."' WHERE id_services = '".$_SESSION['services']."'";
		mysqli_query($conn, $sql);
		$sql = "UPDATE services SET phone_number_service = '".$_POST['phone_number_service']."' WHERE id_services = '".$_SESSION['services']."'";
		mysqli_query($conn, $sql);
	}
	echo "<script type='text/javascript'>alert('Record changed!');</script>";
	echo "<script>document.location.href = 'interface.php'; </script>";
?>