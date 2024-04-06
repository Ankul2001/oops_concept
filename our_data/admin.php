<!DOCTYPE html>
<html>
<head>
  <title>Admin Log In</title>
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

input[type="email"],
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
      <h2>Admin Log In</h2>
      <div class="form-group">
        <label for="adminname">Adminid:</label>
        <input type="email" id="adminname" name="adminid" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" name="adminloginbtn">Sign In</button>
    </form>
  </div>
</body>
</html>
