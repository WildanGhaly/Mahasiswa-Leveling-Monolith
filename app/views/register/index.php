<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/login.css">
  <script src="../../../public/js/register.js"></script>
</head>
<body>
  <section>
	<?php for ($i = 0; $i < 260; $i++) { ?>
		<span></span>
	<?php } ?>
   <div class="signin"> 
    <div class="content"> 
     <h2>Sign Up</h2> 
     <form id="registerForm" class="form">
        <div class="inputBox" id="inputBox"> 
          <input id="username" type="text" aria-labelledby="inputBox" required> <i>Username</i> 
        </div> 
        <span id="usernameError"></span>
        <span id="usernameError2"></span>
        <div class="inputBox"> 
          <input id="email" type="text" class="label" aria-labelledby="inputBox" required> <i>Email</i>
        </div>
        <span id="emailError"></span>
        <div class="inputBox"> 
          <input id="password" type="password" aria-labelledby="inputBox" required> <i>Password</i> 
        </div> 
        <span id="passwordError"></span>
        <div class="links"> 
          <a href="../login/">Already has an account?</a> 
          <a href="../login">Sign In</a> 
        </div> 
        <div class="inputBox"> 
          <input type="submit" value="Register"> 
        </div> 
        <div class="inputBox"> 
          <div class="back">
            <a class="backbtn" href="../landing">Back</a>
          </div>
        </div>
      </form>
    </div> 
   </div> 
  </section>
</body>
</html>
