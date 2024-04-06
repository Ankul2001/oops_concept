<?php
    include("conection.php");

    
?>

<!DOCTYPE html>
<html>
<head>
  <title>Change Password Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 400px;
      margin: 150px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="password"]{
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button {
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Change Password</h2>
    <form action="code.php" method="POST">
      <div class="form-group">
        <label for="currentPassword">Current Password</label>
        <input type="password" id="currentPassword" name="currentpassword" required>
      </div>
      <div class="form-group">
        <label for="newPassword">New Password</label>
        <input type="password" id="newPassword" name="newpassword" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm New Password</label>
        <input type="password" id="confirmPassword" name="confirmpassword" required>
        <input type="hidden" name="passhiddenid" value="<?php echo $_SESSION['userid']; ?>">
      </div>
      <div class="form-group">
        <button type="submit" name="changepassbtn" >Change Password</button>
      </div>
    </form>
  </div>
</body>
</html>
