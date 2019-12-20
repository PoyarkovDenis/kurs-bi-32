<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($servername, $username, $password);
	
	if (!$conn)
	{
		die("connection failed: " . mysqli_connect_error());
	}
	echo "Connection successfully!\n";
	
	//база данных
	$sql = "CREATE DATABASE autoservice";
	
	if (mysqli_query($conn, $sql))
	{
		echo "Database autoservice created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #1 должность
	$dbname = "autoservice";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$sql = "CREATE TABLE positions(
		id_position SERIAL PRIMARY KEY,
		name_position text NOT NULL,
		classification_lvl integer)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table positions created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #2 тип услуги
	$sql = "CREATE TABLE type_services(
		id_type_service SERIAL PRIMARY KEY,
		name_type_service text NOT NULL,
		price_type_service integer NOT NULL,
		type_service_description text)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table type_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #3 сотрудники
	$sql = "CREATE TABLE workers(
		id_worker SERIAL PRIMARY KEY,
		fio_worker text NOT NULL,
		position integer REFERENCES positions (id_position),
		phone_number_worker integer NOT NULL,
		worker_adress text)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table workers created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #4 владелец
	$sql = "CREATE TABLE car_owners(
		driver_license integer UNIQUE,
		fio_owner text NOT NULL,
		phone_number_car_owner integer NOT NULL)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table car_owners created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #5 автомобиль
	$sql = "CREATE TABLE cars(
		num_car char(10) UNIQUE,
		car char(30),
		car_owner integer REFERENCES car_owners (driver_license))";

	if (mysqli_query($conn, $sql))
	{
		echo "Table cars created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #6 сервисы
	$sql = "CREATE TABLE services(
		id_services SERIAL PRIMARY KEY,
		service_adress text,
		phone_number_service integer NOT NULL)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #7 обслуживающий сервис
	$sql = "CREATE TABLE maintenance_services(
		id_order SERIAL PRIMARY KEY,
		id_maintenance_service integer REFERENCES services (id_service),
		type_service integer REFERENCES type_services (id_type_service),
		serviced_car char(10) REFERENCES cars (num_car),
		availability_date timestamp,
		worker integer REFERENCES workers (id_worker))";

	if (mysqli_query($conn, $sql))
	{
		echo "Table maintenance_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
?>