<?php
session_start();

if (!isset($_SESSION['royaltsp-admin'])) {
	echo "<script>window.location = 'index.php'</script>";
	header("Location:index.php");
}

if (isset($_POST['upload'])) {
	$location = $_POST['location'];

	if ($_POST['project'] != "")
		$target_dir = "../projects/" . $_POST['project'] . "/";
	else
		$target_dir = "./";

	$target_dir .= $location . "/";

	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}

	$target_file = $target_dir . basename($_FILES['file']['name']);
	$_FILES['file']['name'];

	if (file_exists($target_file))
		unlink($target_file);

	if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file))
		echo "<script>alert('File is uploaded');</script>";
	else
		echo "<script>alert('File is not uploaded');</script>";

	echo "<script>window.location = 'upload.php'</script>";
}
header("Location:upload.php");
