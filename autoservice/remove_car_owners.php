<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$car_owners = $_POST['car_owners'];
	$sql = "DELETE FROM car_owners WHERE driver_license = '".$car_owners."'";
	if (mysqli_query($conn, $sql))
	{
		$sql = "SELECT num_car FROM cars WHERE car_owner = '".$car_owners."'";
		$res = mysqli_query($conn, $sql);
		if ($res)
		{
			$s = mysqli_fetch_all($res);
			for($i = 0;$i < count($s); $i = $i+1)
			{
				$sql = "DELETE FROM maintenance_services WHERE serviced_car = '".$s[$i][0]."'";
				mysqli_query($conn, $sql);
			}
		}
		$sql = "DELETE FROM cars WHERE position = '".$car_owners."'";
		mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>alert('Record removed!');</script>";
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