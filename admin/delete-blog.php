<?php

require_once('../functions.php');

$id = $_GET['id'];

$sql = "DELETE FROM blogs WHERE id = $id";

mysqli_query($db->con, $sql);

header("Location: blogs.php");
exit();

?>