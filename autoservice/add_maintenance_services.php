<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$id_maintenance_service = $_POST['id_maintenance_service'];
	$type_service = $_POST['type_service'];
	$serviced_car = $_POST['serviced_car'];
	$availability_date = $_POST['availability_date'];
	$worker = $_POST['worker'];
	$sql = "INSERT INTO maintenance_services (id_maintenance_service, type_service, serviced_car, availability_date, worker)
			VALUES ('$id_maintenance_service', '$type_service', '$serviced_car', '$availability_date', '$worker')";
	if (mysqli_query($conn, $sql))
	{
		echo "<script type='text/javascript'>alert('Record created!');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Error: ".mysqli_error($conn)."');</script>";
	}
	echo "<script>document.location.href = 'interface.php'; </script>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251 " />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div id="article">
				
            </div>
        </div>
    </body>
</html>