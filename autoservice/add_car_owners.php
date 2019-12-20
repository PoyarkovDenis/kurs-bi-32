<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$driver_license = $_POST['driver_license'];
	$fio_owner = $_POST['fio_owner'];
	$phone_number_car_owner = $_POST['phone_number_car_owner'];
	$sql = "INSERT INTO car_owners (driver_license, fio_owner, phone_number_car_owner)
			VALUES ('$driver_license', '$fio_owner', '$phone_number_car_owner')";
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