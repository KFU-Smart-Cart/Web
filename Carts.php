<?php
/**
 * Created by PhpStorm.
 * User: BuYaqub
 * Date: 11/30/2015
 * Time: 11:00 AM
 */

$Title = "Carts";
include('Header.php');
include('connect-db.php');

if (!isset($_SESSION['login_user'])) {
    $_SESSION['login_user'] = "";
}


//STEP 4: CREATE THE QUERY
$query = "SELECT * FROM cart";


//STEP 5: RUN THE QUERY
$result = mysqli_query($con, $query);

//STEP 6: RETRIEVE THE RESULTS
$cart = array();

while ($row = mysqli_fetch_assoc($result)) {
    $cart[$row['ID']] = array("ID" => $row['ID']);
}

?>

<?php if ($_SESSION['login_user'] == "Admin") { ?>
    <div id="ListEventsPast">
        <h1 id="PastEventsHeader">Carts</h1>
        <ul id="CurrentEventList">
            <?php foreach ($cart as $i) { ?>
                <li class="EventInfo">[Cart ID: <?php echo $i['ID']; ?> ]  <a href="EditCart.php?ID=<?php echo $i['ID']; ?>">(Edit?)</a> <a href="DeleteCart.php?ID=<?php echo $i['ID']; ?>">(Delete?)</a></li>
            <?php } ?>
        </ul>
    </div>

<?php } else { ?>

    <div id="NotAuthorizedPanelDIV">
        <h1 id="NotAuthorizedPanel">You Are not Authorized!</h1>

    </div>

<?php } ?>


<?php include('Footer.php'); ?>
