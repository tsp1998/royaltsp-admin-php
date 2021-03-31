<?php
session_start();
unset($_SESSION['royaltsp-admin']);
session_unset();
session_destroy();
header("Location:index.php");
