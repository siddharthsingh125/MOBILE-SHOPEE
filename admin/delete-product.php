<?php

require_once('../functions.php');

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM product WHERE item_id = $id";

    mysqli_query($db->con, $sql);

}

header("Location: products.php");
exit();

?>