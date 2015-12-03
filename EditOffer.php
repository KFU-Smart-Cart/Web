<?php
$Title = "Edit Offer";
include('Header.php');
include('connect-db.php');
if(isset($_GET['ID'])) //To Avoid Error if You Visit This Page Directly
$ID = $_GET['ID'];
if(!isset($_SESSION['login_user'])){$_SESSION['login_user']="";}


if(isset($_POST['CreateESubmit'])){

    //Taking Values from the Form

    $IDD=$_POST['hidden'];
    $OfferName = $_POST['OfferName'];
    $OfferDescription = $_POST['OfferDescription'];



    //Update Notification Info
    $query8 = "UPDATE notification SET Title='$OfferName', Description='$OfferDescription' WHERE NotificationID='$IDD'";

    //STEP 5: RUN THE QUERY

    $result8 = mysqli_query($con, $query8);




    if($result8==1)
    {
        header('Location: EditOffer.php?results=success');
    }

    else{
        header('Location: EditOffer.php?results=failure');
    }
}

?>




<?php if(isset($_GET['results']) && $_GET['results']==='success') {?>
    <h1 class="Status">Offer Updated Succesfully</h1>
<?php } else if(isset($_GET['results']) && $_GET['results']==='failure') {?>
    <h1 class="Status">Oops! There was a problem.</h1>
<?php } else if($_SESSION['login_user']!="Admin"){ ?>
    <div id="NotAuthorizedPanelDIV">
        <h1 class="Status" id="NotAuthorizedPanel">You Are not Authorized!</h1>
    </div>

<?php } else {?>
    <form id="CreateEForm" name="CreateEForm" action="EditOffer.php" method="post" onsubmit="return validate();">
        <div id="CreateEEventInfo2">
            <h2 id="AddBeaconHeader">Offer Information</h2>


            <table id="AddBeaconTable">

                <tr>
                    <td><label for="OfferName">Offer Title*:</label></td>
                    <td><input type="text" name="OfferName" /></td>
                </tr>

                <tr>
                    <td><label for="OfferDescription">Offer Description*</label></td>
                    <td><input type="text" name="OfferDescription" /></td>
                </tr>
            </table>
            <input type="hidden" value="<?php echo $ID; ?>" name="hidden" />

            <input type="submit" class="CustomButtonA" name="CreateESubmit" id="CreateESubmit" onclick="validate();" value="Submit" />

        </div>

    </form>
<?php } ?>


    <script>
        function validate(){

            var OfferName = document.CreateEForm.OfferName.value;
            var OfferDescription = document.CreateEForm.OfferDescription.value;
            var flag = true;
            var flag2 = true;
            var flag3 = true;


            if(OfferName=="")
            { document.CreateEForm.OfferName.style.backgroundColor="#FFC7C7";
                document.CreateEForm.OfferName.setAttribute("placeholder","Required");
                flag2 = false;
            }
            else { document.CreateEForm.OfferName.style.backgroundColor="#FFF";
                document.CreateEForm.OfferName.setAttribute("placeholder","");
                flag2 = true;
            }
            if(OfferDescription=="")
            { document.CreateEForm.OfferDescription.style.backgroundColor="#FFC7C7";
                document.CreateEForm.OfferDescription.setAttribute("placeholder","Required");
                flag3 = false;
            }
            else { document.CreateEForm.OfferDescription.style.backgroundColor="#FFF";
                document.CreateEForm.OfferDescription.setAttribute("placeholder","");
                flag3 = true;
            }

            if(flag2 === true && flag3 === true){ flag=true;}

            if(flag){return true;}
            else {return false;}

        }
    </script>





<?php include('Footer.php'); ?>