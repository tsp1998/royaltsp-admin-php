<?php
session_start();

if (!isset($_SESSION['royaltsp-admin'])) {
	echo "<script>window.location = 'index.php'</script>";
	header("Location:index.php");
}

if (isset($_POST['login'])) {
	$id = $_POST['user'];
	$pass = $_POST['pass'];
	
	if ($id == 'admin' && md5($pass) == 'md5-hash-of-your-password-here') {
		$_SESSION['royaltsp-admin'] = $id;
	} else {
		echo "<script>alert('Wrong Information');</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Admin Panel</title>
</head>

<body>
	<h1>ROYALTSP ADMIN</h1>
	<h2>Admin Panel</h2>
	<a href="logout.php">Log Out</a><br><br>
	<br><br>
	<a href="project.php">2.Create Project</a>
	<br><br>
	<a href="upload.php">3.Upload File</a>
	<br><br>
	<a href="uploadMultiple.php">4.Upload Multiple Files</a>
</body>

</html>