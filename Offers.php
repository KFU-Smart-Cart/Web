<?php
/**
 * Created by PhpStorm.
 * User: BuYaqub
 * Date: 11/30/2015
 * Time: 11:00 AM
 */

$Title = "Offers";
include('Header.php');
include('connect-db.php');

if (!isset($_SESSION['login_user'])) {
    $_SESSION['login_user'] = "";
}


//STEP 4: CREATE THE QUERY
$query = "SELECT * FROM notification";


//STEP 5: RUN THE QUERY
$result = mysqli_query($con, $query);

//STEP 6: RETRIEVE THE RESULTS
$offer = array();

while ($row = mysqli_fetch_assoc($result)) {
    $offer[$row['NotificationID']] = array("NotificationID" => $row['NotificationID'],
        "Title" => $row['Title']);
}

?>

<?php if ($_SESSION['login_user'] == "Admin") { ?>
    <div id="ListEventsPast">
        <h1 id="PastEventsHeader">Offers</h1>
        <ul id="CurrentEventList">
            <?php foreach ($offer as $i) { ?>
                <li class="EventInfo">[Offer: <?php echo $i['Title']; ?>] <a href="DeleteOffer.php?ID=<?php echo $i['NotificationID']; ?>">(Delete?)</a></li>
            <?php } ?>
        </ul>
    </div>

<?php } else { ?>

    <div id="NotAuthorizedPanelDIV">
        <h1 id="NotAuthorizedPanel">You Are not Authorized!</h1>

    </div>

<?php } ?>


<?php include('Footer.php'); ?>
