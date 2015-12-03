<?php
/**
 * Created by PhpStorm.
 * User: BuYaqub
 * Date: 11/30/2015
 * Time: 3:09 PM
 */

$Title = "Delete Cart";
include('Header.php');
include('connect-db.php');
if(isset($_GET['ID'])) //To Avoid Error if You Visit This Page Directly
$ID = $_GET['ID'];

$query7 = "delete from cart where ID='$ID'";
$result7 = mysqli_query($con, $query7);


?>




    <h1 class="Status">Cart Deleted Successfully</h1>






<?php include('Footer.php'); ?>