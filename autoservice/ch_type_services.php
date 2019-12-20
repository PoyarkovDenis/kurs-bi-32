<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM type_services WHERE id_type_service = '".$_SESSION['type_services']."'";
	$result = mysqli_query($conn, $sql);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
		if ($all[0][1] != $_POST['name_type_service'])
		{
			$sql = "UPDATE type_services SET name_type_service = '".$_POST['name_type_service']."' WHERE id_type_service = '".$_SESSION['type_services']."'";
			mysqli_query($conn, $sql);
		}
		else if ($all[0][2] != $_POST['price_type_service'])
		{
			$sql = "UPDATE type_services SET price_type_service = '".$_POST['price_type_service']."' WHERE id_type_service = '".$_SESSION['type_services']."'";
			mysqli_query($conn, $sql);
		}
		else if ($all[0][3] != $_POST['type_service_description'])
		{
			$sql = "UPDATE type_services SET type_service_description = '".$_POST['type_service_description']."' WHERE id_type_service = '".$_SESSION['type_services']."'";
			mysqli_query($conn, $sql);
		}
	}
	echo "<script type='text/javascript'>alert('Record changed!');</script>";
	echo "<script>document.location.href = 'interface.php'; </script>";
?>