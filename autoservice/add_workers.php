<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$fio_worker = $_POST['fio_worker'];
	$position = $_POST['position'];
	$phone_number_worker = $_POST['phone_number_worker'];
	$worker_adress = $_POST['worker_adress'];
	$sql = "INSERT INTO workers (fio_worker, position, phone_number_worker, worker_adress)
			VALUES ('$fio_worker', '$position', '$phone_number_worker', '$worker_adress')";
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