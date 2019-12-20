<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM positions WHERE id_position = '".$_SESSION['positions']."'";
	$result = mysqli_query($conn, $sql);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
		$sql = "UPDATE positions SET name_position = '".$_POST['name_position']."' WHERE id_position = '".$_SESSION['positions']."'";
		mysqli_query($conn, $sql);
		$sql = "UPDATE positions SET classification_lvl = '".$_POST['classification_lvl']."' WHERE id_position = '".$_SESSION['positions']."'";
		mysqli_query($conn, $sql);
	}
	echo "<script type='text/javascript'>alert('Record changed!');</script>";
	echo "<script>document.location.href = 'interface.php'; </script>";
?>