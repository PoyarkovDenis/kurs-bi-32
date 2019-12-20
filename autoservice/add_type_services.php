<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$name_type_service = $_POST['name_type_service'];
	$price_type_service = $_POST['price_type_service'];
	$type_service_description = $_POST['type_service_description'];
	$sql = "INSERT INTO type_services (name_type_service, price_type_service, type_service_description)
			VALUES ('$name_type_service', '$price_type_service', '$type_service_description')";
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