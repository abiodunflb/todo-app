<?php   require_once("server.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Abiodun's Todo App</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="heading">
	<h1 style="font-style: 'Hervetica';">ToDo Application with PHP and MYSQL</h1>
</div>

<form action="index.php" method="post">
	<?php   include ("errors.php"); ?>
	<input type="text" name="task" class="task_input">
	<button type="submit" name="submit" id="add_btn">Add Task</button>
</form>


<table>
	<thead>
		<tr>
			<th>S/N</th>
			<th>Task</th>
			<th style="width: 60px;" colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php      
		$tasks = mysqli_query($db,"SELECT * FROM tasks");
		if(!$tasks){
			die("unable to connect: " . mysqli_error($db));
		}

		$i = 1; while($row = mysqli_fetch_array($tasks)){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['task']; ?></td>
			<td class="delete">
				<a href="index.php?del=<?=$row['id']; ?>">x</a>
			</td>
			<td>
				<a href="index.php?edit=<?=$row['id']; ?>">Edit</a>
			</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>

</body>
</html>