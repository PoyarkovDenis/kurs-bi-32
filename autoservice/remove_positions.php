<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$positions = $_POST['positions'];
	$sql = "DELETE FROM positions WHERE id_position = '".$positions."'";
	if (mysqli_query($conn, $sql))
	{
		$sql = "SELECT id_worker FROM workers WHERE position = '".$positions."'";
		$res = mysqli_query($conn, $sql);
		if ($res)
		{
			$s = mysqli_fetch_all($res);
			for($i = 0;$i < count($s); $i = $i+1)
			{
				$sql = "DELETE FROM maintenance_services WHERE worker = '".$s[$i][0]."'";
				mysqli_query($conn, $sql);
			}
		}
		$sql = "DELETE FROM workers WHERE position = '".$positions."'";
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