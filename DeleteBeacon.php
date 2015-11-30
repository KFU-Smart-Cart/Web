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
if(isset($_GET['id'])) //To Avoid Error if You Visit This Page Directly
$ID = $_GET['ID'];

$query7 = "delete from beacon where BeaconID='$ID'";
$result7 = mysqli_query($con, $query7);


?>




    <h1 class="Status">Beacon Deleted Successfully</h1>






<?php include('Footer.php'); ?>