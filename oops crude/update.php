<?php
    include("conection.php");

    if(isset($_REQUEST['editid'])){
    $result=$object->edit($_REQUEST['editid']);
    $row=mysqli_fetch_assoc($result);
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

h1 {
    text-align: center;
    
}

form {
    max-width: 400px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    background-color: #fff;
    padding: 50px 50px;
    border-radius: 5px;
}

label {
    display: block;
    margin-top: 10px;
    font-size: larger;
    margin-left: 10px;
}

input[type="text"], input[type="password"],input[type="email"] {
    width: 90%;
    margin: auto;
    font-size: large;
    padding: 10px;
    margin-top: 5px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

a{
    margin-left: 10px;
}
.signinbtn {
    width: 100px;
    padding: 10px;
    margin: auto;
    margin-top: 10px;
    font-size: larger;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

</style>
<body>
    <h1>Sign In</h1>
    <form action="code.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['name']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required><br>
        <input type="hidden" name="hiddenid" value="<?php echo $row['sn']; }?>">

        <button type="submit" name="updatebtn" class="signinbtn">Update</button>
    </form>
</body>
</html>
