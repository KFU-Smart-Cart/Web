<?php
/**
 * Created by PhpStorm.
 * User: BoYaqub
 * Date: 11/15/2015
 * Time: 10:40 PM
 */
include('connect-db.php');

$Status = $_GET['Status'];
$ID = $_GET['ID'];

$query9 = "UPDATE cart set Status='$Status' WHERE ID='$ID'";
$result9 = mysqli_query($con, $query9);

?>