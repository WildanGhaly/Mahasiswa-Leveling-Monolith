<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/login.css">
  <script src="../../../public/js/register.js"></script>
</head>
<body>
  <!-- <h1>Registration</h1>
  <form id="registerForm">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <p>5-20 karakter</p>
    <p>Hanya boleh terdiri dari huruf, angka, dan underscore</p>
    <span id="usernameError"></span>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <span id="emailError"></span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <span id="passwordError"></span>

    <a href="../login">Already has an account?</a>
    <br><br>
    
    <button type="submit">Daftar</button>
    
  </form> -->
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
        <div class="inputBox" id="inputBox"> 
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
