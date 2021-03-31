<?php
session_start();
$id = $_SESSION['royaltsp-admin'];

if (empty($id)) {
	echo "<script>alert('Wrong Information');</script>";
	header("Location:index.php");
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
	<h2>Upload File</h2>
	<form action="uploadController.php" method="post" enctype="multipart/form-data">

		Select Project: <select name="project">
			<option value="">Select Project</option>
			<?php
			$Mydir = '../projects/';
			foreach (glob($Mydir . '*', GLOB_ONLYDIR) as $dir) {
				$dir = str_replace($Mydir, '', $dir);
			?>
				<option value="<?php echo $dir; ?>"><?php echo $dir; ?></option>
			<?php
			}
			?>
		</select>
		Location : <input type="text" name="location" id='location' value="../">
		<br><br>
		Select File : <input type="file" name="file" id='file'>
		<br><br>
		<input type="submit" name="upload" value="Upload">
	</form>

	<br><br><a href="adminPanel.php">Goto Admin Panel</a><br>
</body>

</html>