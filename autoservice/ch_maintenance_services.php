<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM maintenance_services WHERE id_order = '".$_SESSION['orders']."'";
	$result = mysqli_query($conn, $sql);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
		if ($all[0][1] != $_POST['id_maintenance_service'])
		{
			$sql = "UPDATE maintenance_services SET id_maintenance_service = '".$_POST['id_maintenance_service']."' WHERE id_order = '".$_SESSION['orders']."'";
			mysqli_query($conn, $sql);
		}
		else if ($all[0][2] != $_POST['type_service'])
		{
			$sql = "UPDATE maintenance_services SET type_service = '".$_POST['type_service']."' WHERE id_order = '".$_SESSION['orders']."'";
			mysqli_query($conn, $sql);
		}
		else if ($all[0][3] != $_POST['serviced_car'])
		{
			$sql = "UPDATE maintenance_services SET serviced_car = '".$_POST['serviced_car']."' WHERE id_order = '".$_SESSION['orders']."'";
			mysqli_query($conn, $sql);
		}
		else if ($all[0][4] != $_POST['availability_date'])
		{
			$sql = "UPDATE maintenance_services SET availability_date = '".$_POST['availability_date']."' WHERE id_order = '".$_SESSION['orders']."'";
			mysqli_query($conn, $sql);
		}
		else if ($all[0][5] != $_POST['worker'])
		{
			$sql = "UPDATE maintenance_services SET worker = '".$_POST['worker']."' WHERE id_order = '".$_SESSION['orders']."'";
			mysqli_query($conn, $sql);
		}
	}
	echo "<script type='text/javascript'>alert('Record changed!');</script>";
	echo "<script>document.location.href = 'interface.php'; </script>";
?>