<?php
$Title = "Login";
include('Header.php');
//STEP 1: CREATE DATABASE VARIABLES
$host = 'localhost';
$user = 'root';
$pwd = '';

//STEP 2: MAKE THE CONNECTION
$con = mysql_connect($host,$user,$pwd) or die;
$selected = mysql_select_db("CartProject",$con);


if(isset($_POST['SignInBtn'])){

//Taking Values from the Form
$username = $_POST['username'];
$password = $_POST['password'];


//STEP 3: CREATE THE QUERY
$query = "SELECT * FROM user Where Username='$username' and Password='$password'";


//STEP 4: RUN THE QUERY
$result = mysql_query($query);

$rows = mysql_num_rows($result);


    if($rows==1)
		{
            session_start();
            $_SESSION['login_user']="Admin";

			header('Location: Login.php?results=success');
		}
            
		else{
			header('Location: Login.php?results=failure');
		}

}
?>
          
          
          <div id="LoginContent">
          	<?php if(isset($_GET['results']) && $_GET['results']==='success') {?>
    <h1 class="Status">Welcome :)</h1>
    <?php } else if(isset($_GET['results']) && $_GET['results']==='failure') {?>
    <h1 class="Status">Wrong Username or Password! </h1>
    <?php } else {?>
                   <h2 id="LoginHeader">Login</h2>
              <form name="LoginForm" action="Login.php" method="post" onsubmit="return validate();">
              <table class="Table">
                <tr>
                <td><label for="username">Username: </label></td>
                <td><input type="text" name="username" id="username" /></td>
                </tr>
                <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" id="password" /></td>
                </tr>
              </table>
            <input type="submit" class="CustomButtonA" name="SignInBtn" id="SignInBtn" onclick="validate();" value="Login" />
                  
                </form>
                <?php } ?>
          </div>
      
      <script type="text/javascript">
      
          function validate(){
          var userval = document.LoginForm.username.value;
          var passval = document.LoginForm.password.value;
          if(userval=="")
          { document.LoginForm.username.style.backgroundColor="#FFC7C7";
          document.LoginForm.username.setAttribute("placeholder","Required");
          }
          else { document.LoginForm.username.style.backgroundColor="#FFF"; 
               document.LoginForm.username.setAttribute("placeholder","");
               }
          
            if(passval=="")
            {document.LoginForm.password.style.backgroundColor="#FFC7C7";
            document.LoginForm.password.setAttribute("placeholder","Required");
            }
            else { document.LoginForm.password.style.backgroundColor="#FFF"; 
                document.LoginForm.password.setAttribute("placeholder","");
                 }
          }
          
      </script>

<?php include('Footer.php');  ?>