<?php
include('connect-db.php');
$Title = "Edit Cart";
include('Header.php');

if(isset($_GET['ID'])) //To Avoid Error if You Visit This Page Directly
$ID = $_GET['ID'];

if(!isset($_SESSION['login_user'])){$_SESSION['login_user']="";}
if(isset($_POST['CreateESubmit'])){
//Taking Values from the Form
    $MAC = $_POST['MAC'];
    $IDD=$_POST['hidden1'];
    //STEP 4: CREATE THE QUERY

    //Inserting Cart Info
    $query44 = "UPDATE cart SET MAC='$MAC' WHERE ID='$IDD'";

    //STEP 5: RUN THE QUERY
    $result30 = mysqli_query($con, $query44);



    if($result30==1)
    {
        header('Location: EditCart.php?results=success');
    }

    else{
        header('Location: EditCart.php?results=failure');
    }
}
?>

<?php if(isset($_GET['results']) && $_GET['results']==='success') {?>
    <h1 class="Status">Cart Updated Succesfully</h1>
<?php } else if(isset($_GET['results']) && $_GET['results']==='failure') {?>
    <h1 class="Status">Oops! There was a problem.</h1>
<?php } else if($_SESSION['login_user']!="Admin"){ ?>
    <div id="NotAuthorizedPanelDIV">
        <h1 class="Status" id="NotAuthorizedPanel">You Are not Authorized!</h1>
    </div>

<?php } else {?>
    <form id="CreateEForm" name="CreateEForm" action="EditCart.php" method="post" onsubmit="return validate();">
        <div id="CreateEEventInfo">
            <h2 id="CreateEventHeader">Cart Information</h2>

            <label for="MAC">MAC Address*:</label>
            <input type="text" name="MAC" />
            <input type="hidden" value="<?php echo $ID;?>" name="hidden1" />

            <input type="submit" class="CustomButtonA" name="CreateESubmit" id="CreateESubmit" onclick="validate();" value="Submit" />

        </div>

    </form>
<?php } ?>


    <script>
        function validate(){

            var MAC = document.CreateEForm.MAC.value;
            var flag = true;

            if(MAC=="")
            { document.CreateEForm.MAC.style.backgroundColor="#FFC7C7";
                document.CreateEForm.MAC.setAttribute("placeholder","Required");
                flag = false;
            }
            else { document.CreateEForm.MAC.style.backgroundColor="#FFF";
                document.CreateEForm.MAC.setAttribute("placeholder","");
                flag = true;
            }

            if(flag){return true;}
            else {return false;}

        }
    </script>


<?php include('Footer.php'); ?>