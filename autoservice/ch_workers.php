<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM workers WHERE id_worker = '".$_SESSION['workers']."'";
	$result = mysqli_query($conn, $sql);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
		$sql = "UPDATE workers SET fio_worker = '".$_POST['fio_worker']."' WHERE id_worker = '".$_SESSION['workers']."'";
		mysqli_query($conn, $sql);
		$sql = "UPDATE workers SET position = '".$_POST['position']."' WHERE id_worker = '".$_SESSION['workers']."'";
		mysqli_query($conn, $sql);
		$sql = "UPDATE workers SET phone_number_worker = '".$_POST['phone_number_worker']."' WHERE id_worker = '".$_SESSION['workers']."'";
		mysqli_query($conn, $sql);
		$sql = "UPDATE workers SET worker_adress = '".$_POST['worker_adress']."' WHERE id_worker = '".$_SESSION['workers']."'";
		mysqli_query($conn, $sql);
	}
	echo "<script type='text/javascript'>alert('Record changed!');</script>";
	echo "<script>document.location.href = 'interface.php'; </script>";
?>