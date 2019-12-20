<?php
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	session_start();
	$user = $_POST['user_name'];
	$password = $_POST['password'];
	if ($conn)
	{
		$check = "SELECT privilege FROM tb1 WHERE email_adress = '$user'";
		$result = mysqli_query($conn, $check);
		if ($result)
		{
			$all = mysqli_fetch_all($result);
			$check = "SELECT password FROM tb1 WHERE email_adress = '$user'";
			$result = mysqli_query($conn, $check);
			$p = mysqli_fetch_all($result);
			if($p[0][0] === $password)
			{
				if ($all[0][0] === '1')
				{
					$_SESSION['conn'] = $conn;
					header('location: interface.php');
				}
				else echo "У вас нет прав!";
			}
			else echo "Неправильный пароль!";
		}
		else echo "Неправильный логин!";
	}
	else die("Ошибка: " . mysqli_connect_error());
?>
 <html>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <body>
	<p><a href="logout.php">Повтор</a></p>
 </body></html>