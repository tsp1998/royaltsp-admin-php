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

	$files = array_filter($_FILES['files']['name']);
	$total = count($_FILES['files']['name']);

	for ($i = 0; $i < $total; $i++) {
		$file_name = $_FILES['files']['name'][$i];
		// $target_dir = $_POST['location'] . "/";
		$target_file = $target_dir . $file_name;
		
		if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
			echo $target_file . " - done<br>";
		} else
			echo $target_file . " - not done<br>";
	}

	// echo "<script>window.location = 'upload-new.php'</script>";

}

?>

<!DOCTYPE html>
<html>

<head>
	<title>tsp</title>
</head>

<body>
	<a href="uploadMultiple.php">Go to Upload Page</a>
</body>

</html>