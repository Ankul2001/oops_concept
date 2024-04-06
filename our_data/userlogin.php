<!DOCTYPE html>
<html>
<head>
  <title>Sign In</title>
</head>
<style>
    .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

#signin-form {
  width: 300px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
  width: 90%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

</style>

<body>
  <div class="container">
    <form id="signin-form" action="code.php" method="POST">
      <h2>User Log In</h2>
      <div class="form-group">
        <label for="userid">Userid:</label>
        <input type="text" id="userid" name="userid" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" name="userloginbtn">Sign In</button>
      <br>
      <br>
      <br>
      <a href="signin.php">Create a new account</a>
    </form>
  </div>
</body>
</html>
