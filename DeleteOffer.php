<?php
/**
 * Created by PhpStorm.
 * User: BuYaqub
 * Date: 11/30/2015
 * Time: 11:11 AM
 */

$Title = "Delete Offer";
include('Header.php');
include('connect-db.php');

$ID = $_GET['ID'];

    $query7 = "delete from notification where NotificationID='$ID'";
    $result7 = mysqli_query($con, $query7);


?>




    <h1 class="Status">Offer Deleted Successfully</h1>






<?php include('Footer.php'); ?>