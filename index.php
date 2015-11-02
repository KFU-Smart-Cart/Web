<?php
$Title = "Panel";
include('Header.php');
include('connect-db.php');

if (!isset($_SESSION['login_user'])) {
    $_SESSION['login_user'] = "";
}

//STEP 4: CREATE THE QUERY
$query = "SELECT ID FROM cart Where Status='Active'";
$query2 = "SELECT ID FROM cart Where Status='InActive'";


//STEP 5: RUN THE QUERY
$result = mysqli_query($con, $query);
$result2 = mysqli_query($con, $query2);

//STEP 6: RETRIEVE THE RESULTS
$cart = array();
$cart2 = array();

while ($row = mysqli_fetch_assoc($result)) {
    $cart[$row['ID']] = array("ID" => $row['ID']);
}

while ($row = mysqli_fetch_assoc($result2)) {
    $cart2[$row['ID']] = array("ID" => $row['ID']);
}

?>


<?php if ($_SESSION['login_user'] == "Admin") { ?>
    <div id="ListEventsPast">
        <h1 id="PastEventsHeader">Active Carts</h1>
        <ul id="CurrentEventList">
            <?php foreach ($cart as $i) { ?>
                <li class="EventInfo"><a href="#">[Cart ID: <?php echo $i['ID']; ?>]</a></li>
            <?php } ?>
        </ul>
    </div>

    <div id="ListEventsPast">
        <h1 id="PastEventsHeader">InActive Carts</h1>
        <ul id="CurrentEventList">
            <?php foreach ($cart2 as $i) { ?>
                <li class="EventInfo"><a href="#">[Cart ID: <?php echo $i['ID']; ?>]</a></li>
            <?php } ?>
        </ul>
    </div>
<?php } else { ?>


    <div id="NotAuthorizedPanelDIV">
        <h1 id="NotAuthorizedPanel">You Are not Authorized!</h1>

    </div>

<?php } ?>


<?php include('Footer.php'); ?>
