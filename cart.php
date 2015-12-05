<?php
/**
 * Created by PhpStorm.
 * User: mx911
 * Date: 11/29/2015
 * Time: 6:56 PM
 */

include "connect-db.php";

$mac = $_GET['mac'];

$sql = "SELECT ID
         FROM cart
         WHERE MAC = '$mac'";

$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));


$row = mysqli_fetch_assoc($result);

echo $row['ID'];