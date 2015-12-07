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
if(isset($_GET['ID'])) //To Avoid Error if You Visit This Page Directly
$ID = $_GET['ID'];

    $query7 = "delete from notification where NotificationID='$ID'";
    $result7 = mysqli_query($con, $query7);


?>




    <div id="CreateEEventInfo2"><h2 class="Status">Offer Deleted Successfully</h2></div>






<?php include('Footer.php'); ?>