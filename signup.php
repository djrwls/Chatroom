<?php require("register.class.php")?>
<?php session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		
		/* Check and assign submitted Username and Password to new variable */
    $user = new RegisterUser($_POST['Username'], $_POST['Password']);
		
	}
?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <title>Sign up</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/media/favicon.png">
  </head>
  <body>
    <div id="content">
      <div class="login">
        <h1>New User Creation:</h1>
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
      <td><input name="Password" type="password" class="Input" placeholder="password" id="userpass">
      </td>
    </tr>
    <tr>
    <td>
       Show password: <i class="far fa-eye" id="togglePassword" style="cursor: pointer;">
         
       </i></td>
    </tr>
    <tr>

      <td><input name="Submit" type="submit" value="Sign Up" class="Button3" id="LoginButton"></td>
    </tr>
  </table>
        <p class="error"><?php echo @$user->error ?></p>
        <p class="success"><?php echo @$user->success ?></p>
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