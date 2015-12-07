<?php
$Title = "Add Offer";
include('Header.php');
include('connect-db.php');

if(!isset($_SESSION['login_user'])){$_SESSION['login_user']="";}


	//Select Query
	$query6 = "Select * from Beacon";
	$result6 = mysqli_query($con, $query6);
			

	//STEP 6: RETRIEVE THE RESULTS
	$BeaconNameArray = array();

	while ($row = mysqli_fetch_assoc($result6)) {
    $BeaconNameArray[$row['BeaconID']] = array("BeaconID" => $row['BeaconID'],
	"BeaconName" => $row['BeaconName']);
}

			
			
if(isset($_POST['CreateESubmit'])){
	
		//Taking Values from the Form


	$OfferName = $_POST['OfferName'];
	$OfferDescription = $_POST['OfferDescription'];
	$BeaconName = $_POST['BeaconName'];
	
	
	
		//STEP 4: CREATE THE QUERY
	
		//DELETE QUERY
		$query7 = "delete from notification where BeaconID='$BeaconName'";
			
		//Inserting Notification Info
	$query8 = "Insert into notification(Title,Description,BeaconID) values ('$OfferName','$OfferDescription','$BeaconName')";

		//STEP 5: RUN THE QUERY
	
	$result7 = mysqli_query($con, $query7);
	$result8 = mysqli_query($con, $query8);
	
		


	if($result8==1)
		{
			header('Location: AddOffer.php?results=success');
		}
            
		else{
			header('Location: AddOffer.php?results=failure');
		}
}

 ?>
 



	<?php if(isset($_GET['results']) && $_GET['results']==='success') {?>
    <div id="CreateEEventInfo2"><h2 class="Status">Offer Added Successfully</h2></div>
    <?php } else if(isset($_GET['results']) && $_GET['results']==='failure') {?>
    <div id="CreateEEventInfo2"><h2 class="Status">Oops! There was a problem.</h2></div>
     <?php } else if($_SESSION['login_user']!="Admin"){ ?>
     	          <div id="NotAuthorizedPanelDIV">
		<h1 class="Status" id="NotAuthorizedPanel">You Are not Authorized!</h1>
          </div>
     	
    <?php } else {?>
          <form id="CreateEForm" name="CreateEForm" action="AddOffer.php" method="post" onsubmit="return validate();">
          <div id="CreateEEventInfo2">
          <h2 id="AddBeaconHeader">Offer Information</h2>

					
				<table id="AddBeaconTable">
					
					<tr>
                  <td><label for="OfferName">Offer Title*:</label></td>
                  <td><input type="text" name="OfferName" /></td>
                 </tr>
                 
                 <tr>
                 <td><label for="OfferDescription">Offer Description*:</label></td>
                  <td><input type="text" name="OfferDescription" /></td>
                  </tr>
                  
                  <tr>
 			<td><label for="EventTopic" class="EndDateTime">Beacon Name: </label></td>
                    <td><select name="BeaconName" id="EventTopic">
                  <option value=""></option>
                   <?php foreach($BeaconNameArray as $i) {?>
                  <option value="<?php echo $i['BeaconID'] ?>"><?php echo  $i['BeaconName']?></option>
                  <?php } ?>
                       </select></td>
                       
                       </tr>
                  </table>
                 
                   <input type="submit" class="CustomButtonA" name="CreateESubmit" id="CreateESubmit" onclick="validate();" value="Submit" />
        			
          </div>
              
         </form>
          <?php } ?>
          
          
      <script>
            function validate(){
                
                var OfferName = document.CreateEForm.OfferName.value;
                var OfferDescription = document.CreateEForm.OfferDescription.value;
                var BeaconName = document.CreateEForm.BeaconName.value;
                var flag = true;
                var flag1 = true;
                var flag2 = true;
                var flag3 = true;
                
              if(BeaconName=="")
          { document.CreateEForm.BeaconName.style.backgroundColor="#FFC7C7";
            document.CreateEForm.BeaconName.setAttribute("placeholder","Required");
           flag1 = false;
          }
              else { document.CreateEForm.BeaconName.style.backgroundColor="#FFF";
                   document.CreateEForm.BeaconName.setAttribute("placeholder","");
                    flag1 = true;
                   }


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
                   
                   if(flag1 === true &&flag2 === true &&flag3 === true){ flag=true;}
                   
                if(flag){return true;}
                else {return false;}

          }
          </script>





<?php include('Footer.php'); ?>