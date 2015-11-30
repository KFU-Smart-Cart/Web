<?php
/**
 * Created by PhpStorm.
 * User: BuYaqub
 * Date: 11/30/2015
 * Time: 11:00 AM
 */

$Title = "Beacons";
include('Header.php');
include('connect-db.php');

if (!isset($_SESSION['login_user'])) {
    $_SESSION['login_user'] = "";
}


//STEP 4: CREATE THE QUERY
$query = "SELECT * FROM beacon";


//STEP 5: RUN THE QUERY
$result = mysqli_query($con, $query);

//STEP 6: RETRIEVE THE RESULTS
$cart = array();

while ($row = mysqli_fetch_assoc($result)) {
    $cart[$row['BeaconID']] = array("BeaconID" => $row['BeaconID'],"BeaconName" => $row['BeaconName']);
}

?>

<?php if ($_SESSION['login_user'] == "Admin") { ?>
    <div id="ListEventsPast">
        <h1 id="PastEventsHeader">Beacons</h1>
        <ul id="CurrentEventList">
            <?php foreach ($cart as $i) { ?>
                <li class="EventInfo">[Beacon: <?php echo $i['BeaconName']; ?> ] <a href="DeleteBeacon.php?ID=<?php echo $i['BeaconID']; ?>">(Delete?)</a></li>
            <?php } ?>
        </ul>
    </div>

<?php } else { ?>

    <div id="NotAuthorizedPanelDIV">
        <h1 id="NotAuthorizedPanel">You Are not Authorized!</h1>

    </div>

<?php } ?>


<?php include('Footer.php'); ?>
