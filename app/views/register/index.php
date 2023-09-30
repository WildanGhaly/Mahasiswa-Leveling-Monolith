<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/register.css">
  <script src="../../../public/js/register.js"></script>
</head>
<body>
  <h1>Registration</h1>
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
    
  </form>
</body>
</html>