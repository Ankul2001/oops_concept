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
    <form id="signin-form" method="POST" action="code.php" enctype="multipart/form-data">
      <h2>User Sign In</h2>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <input type="radio" id="gender" name="gender" value="Male" required>Male
        <input type="radio" id="gender" name="gender" value="Female" required>Female
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" required>
      </div>
      <button type="submit" name="signinbtn">Sign In</button>
    </form>
  </div>
</body>
</html>
