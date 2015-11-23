<?php
/**
 * Created by PhpStorm.
 * User: mx911
 * Date: 11/9/2015
 * Time: 1:07 AM
 */

include "connect-db.php";

$sql = "SELECT *
         FROM notification, beacon
         WHERE notification.BeaconID = beacon.BeaconID";
$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));


//create an array
$AdData = array();

while ($row = mysqli_fetch_assoc($result)) {
    $AdData[] = $row;
}
echo json_encode($AdData);

//close the db connection
mysqli_close($con);

?>