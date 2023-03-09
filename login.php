<?php session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */

    // Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("users.json");
    // Convert to array 
		$logins = json_decode($strJsonFileContents, true);
		
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $hashPassword = password_hash($Password, PASSWORD_DEFAULT);
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username']=$logins[$Username];
      $_SESSION['realname']=$Username;
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid username or password</span>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/media/favicon.png">
  </head>
  <body>
    <div id="content">
      <div class="login">
        <h1>Welcome!</h1>
<form action="" method="post" name="Login_Form">
  <table width="400" border="0" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td><input name="Username" type="text" class="Input" placeholder="username"></td>
    </tr>
    <tr>
      <td><input name="Password" type="password" class="Input" placeholder="password" id='userpass'></td>
    </tr>
    <tr>
    <td>
       Show password: <i class="far fa-eye" id="togglePassword" style="cursor: pointer;">
         
       </i></td>
    </tr>
    <tr>

      <td><input name="Submit" type="submit" value="Login" class="Button3" id="LoginButton">          </td>
    </tr>
    <tr>
      <td>
        <a href="/signup.php"><input name="Sign up" type="button" value="Sign Up!" class="Button3" id="SignUpButton">
        </a></td>
    </tr>
  </table>
</form>
<script>
          const togglePassword = document.querySelector('#togglePassword');
          const password = document.querySelector('#userpass');
        
          togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
          });
</script>
    </div>
    </div>
  </body>
</html>