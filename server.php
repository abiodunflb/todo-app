<?php
session_start();

$errors = "";
$update = false;

$db = mysqli_connect("localhost", "root", "", "todo");
if(!$db){
	die("Unable to connect: " . mysqli_error($db));
}

if(isset($_POST['submit'])){
	if(empty($_POST['task'])){
		$errors = "Task cannot be empty";
	} else{
		$task = $_POST['task'];
		$sql = mysqli_query($db, "INSERT INTO tasks(task) VALUES ('$task')");
		if(!$sql){
			die("Unable to connect: " . mysqli_error($db));
		}
		// $_SESSION['message'] = "Task Saved";

		header("Location: index.php");
	}
}

if(isset($_GET['del'])){
	$id = $_GET['del'];
	$d = mysqli_query($db, "DELETE FROM tasks WHERE id = '$id'");
	header("Location:index.php");
}


if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$e = mysqli_query($db, "SELECT * FROM tasks WHERE id = '$id'");
	
}


?>