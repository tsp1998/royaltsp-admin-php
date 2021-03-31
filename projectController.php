<?php
session_start();
if(!isset($_SESSION['royaltsp-admin'])) {
	echo "<script>window.location = 'index.php'</script>";
  header("Location:index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $projectName = $_POST['projectName'];
  
  if (!file_exists("../projects/" . $projectName)) {
    mkdir('../projects/' . $projectName, 0777, true);
  }
}
header("Location:project.php");
