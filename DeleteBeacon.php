<?php
/**
 * Created by PhpStorm.
 * User: BuYaqub
 * Date: 11/30/2015
 * Time: 3:10 PM
 */

$Title = "Delete Offer";
include('Header.php');
include('connect-db.php');
if(isset($_GET['ID'])) //To Avoid Error if You Visit This Page Directly
$ID = $_GET['ID'];

$query7 = "delete from beacon where BeaconID='$ID'";
$query8 = "delete from notification where BeaconID='$ID'";
$result7 = mysqli_query($con, $query7);
$result8 = mysqli_query($con, $query8);

?>




    <div id="CreateEEventInfo2"><h2 class="Status">Beacon Deleted Successfully</h2></div>






<?php include('Footer.php'); ?>