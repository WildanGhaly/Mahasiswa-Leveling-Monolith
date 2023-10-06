<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/login.css">
  <script src="../../../public/js/login.js"></script>
</head>
<body>
  <section>
	<?php for ($i = 0; $i < 260; $i++) { ?>
		<span></span>
	<?php } ?>
   <div class="signin"> 
    <div class="content"> 
     <h2>Sign In</h2> 
     <form id="loginForm" class="form">
        <div class="inputBox" id="inputBox"> 
          <input id="username" type="text" aria-labelledby="inputBox" required> <i>Username</i> 
        </div> 
          <div class="inputBox"> 
        <input id="password" type="password" aria-labelledby="inputBox" required> <i>Password</i> 
          </div> 
        <div class="links"> 
          <a href="#">Forgot Password</a> 
          <a href="../register/">Signup</a> 
        </div> 
        <div class="inputBox"> 
          <input type="submit" value="Login"> 
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
