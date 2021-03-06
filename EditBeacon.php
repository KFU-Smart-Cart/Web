<?php
$Title = "Edit Beacon";
include('Header.php');
include('connect-db.php');
if(isset($_GET['ID'])) //To Avoid Error if You Visit This Page Directly
$ID = $_GET['ID'];
if(!isset($_SESSION['login_user'])){$_SESSION['login_user']="";}


if(isset($_POST['CreateESubmit'])){

    //Taking Values from the Form

    $IDD=$_POST['hidden1'];
    $MAC = $_POST['MAC'];
    $BeaconName = $_POST['BeaconName'];
    $UUID = $_POST['UUID'];
    $Major = $_POST['Major'];
    $Minor = $_POST['Minor'];

    //STEP 4: CREATE THE QUERY

    //|Update Beacon Info
    $query = "UPDATE beacon SET BeaconName='$BeaconName', UUID='$UUID', Major='$Major', Minor='$Minor', MacAddress='$MAC' WHERE BeaconID='$IDD'";

    //STEP 5: RUN THE QUERY
    $result = mysqli_query($con, $query);




    if($result==1)
    {
        header('Location: EditBeacon.php?results=success');
    }

    else{
        header('Location: EditBeacon.php?results=failure');
    }
}

?>



<?php if(isset($_GET['results']) && $_GET['results']==='success') {?>
    <div id="CreateEEventInfo2"><h2 class="Status">Beacon Updated Successfully</h2></div>
<?php } else if(isset($_GET['results']) && $_GET['results']==='failure') {?>
    <div id="CreateEEventInfo2"><h2 class="Status">Oops! There was a problem.</h2></div>
<?php } else if($_SESSION['login_user']!="Admin"){ ?>
    <div id="NotAuthorizedPanelDIV">
        <h1 class="Status" id="NotAuthorizedPanel">You Are not Authorized!</h1>
    </div>

<?php } else {?>
    <form id="CreateEForm" name="CreateEForm" action="EditBeacon.php" method="post" onsubmit="return validate();">
        <div id="CreateEEventInfo2">
            <h2 id="AddBeaconHeader">Beacon Information</h2>


            <table id="AddBeaconTable">

                <tr>
                    <td><label for="BeaconName">Beacon Name*:</label></td>
                    <td><input type="text" name="BeaconName" /></td>
                </tr>

                <tr>
                    <td><label for="UUID">UUID*:</label></td>
                    <td><input type="text" name="UUID" /></td>
                </tr>

                <tr>
                    <td><label for="Major">Major*:</label></td>
                    <td><input type="text" name="Major" /></td>
                </tr>

                <tr>
                    <td><label for="Minor">Minor*:</label></td>
                    <td><input type="text" name="Minor" /></td>
                </tr>

                <tr>
                    <td><label for="MAC">MAC Address*:</label></td>
                    <td><input type="text" name="MAC" /></td>
                </tr>

            </table>

            <input type="hidden" value="<?php echo $ID; ?>" name="hidden1" />

            <input type="submit" class="CustomButtonA" name="CreateESubmit" id="CreateESubmit" onclick="validate();" value="Submit" />

        </div>

    </form>
<?php } ?>


    <script>
        function validate(){

            var MAC = document.CreateEForm.MAC.value;
            var UUID = document.CreateEForm.UUID.value;
            var Major = document.CreateEForm.Major.value;
            var Minor = document.CreateEForm.Minor.value;
            var BeaconName = document.CreateEForm.BeaconName.value;
            var flag = true;
            var flag1 = true;
            var flag2 = true;
            var flag3 = true;
            var flag4 = true;
            var flag5 = true;

            if(BeaconName=="")
            { document.CreateEForm.BeaconName.style.backgroundColor="#FFC7C7";
                document.CreateEForm.BeaconName.setAttribute("placeholder","Required");
                flag1 = false;
            }
            else { document.CreateEForm.BeaconName.style.backgroundColor="#FFF";
                document.CreateEForm.BeaconName.setAttribute("placeholder","");
                flag1 = true;
            }


            if(UUID=="")
            { document.CreateEForm.UUID.style.backgroundColor="#FFC7C7";
                document.CreateEForm.UUID.setAttribute("placeholder","Required");
                flag2 = false;
            }
            else { document.CreateEForm.UUID.style.backgroundColor="#FFF";
                document.CreateEForm.UUID.setAttribute("placeholder","");
                flag2 = true;
            }
            if(Major=="")
            { document.CreateEForm.Major.style.backgroundColor="#FFC7C7";
                document.CreateEForm.Major.setAttribute("placeholder","Required");
                flag3 = false;
            }
            else { document.CreateEForm.Major.style.backgroundColor="#FFF";
                document.CreateEForm.Major.setAttribute("placeholder","");
                flag3 = true;
            }
            if(Minor=="")
            { document.CreateEForm.Minor.style.backgroundColor="#FFC7C7";
                document.CreateEForm.Minor.setAttribute("placeholder","Required");
                flag4 = false;
            }
            else { document.CreateEForm.Minor.style.backgroundColor="#FFF";
                document.CreateEForm.Minor.setAttribute("placeholder","");
                flag4 = true;
            }


            if(MAC=="")
            { document.CreateEForm.MAC.style.backgroundColor="#FFC7C7";
                document.CreateEForm.MAC.setAttribute("placeholder","Required");
                flag5 = false;
            }
            else { document.CreateEForm.MAC.style.backgroundColor="#FFF";
                document.CreateEForm.MAC.setAttribute("placeholder","");
                flag5 = true;
            }

            if(flag1 === true &&flag2 === true &&flag3 === true &&flag4 === true &&flag5 === true){ flag=true;}

            if(flag){return true;}
            else {return false;}

        }
    </script>





<?php include('Footer.php'); ?>