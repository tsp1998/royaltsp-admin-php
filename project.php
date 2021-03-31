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
  <form action="projectController.php" method="post">
    Project Name : <input type="text" name="projectName" placeholder="../projectName">
    <br>
    <input type="submit" name="create" value="Create">
  </form>

  <br><br><a href="adminPanel.php">Goto Admin Panel</a><br>
</body>

</html>