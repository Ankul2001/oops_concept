<?php 

include("connection.php");
if(!isset($_SESSION['adminid'])){
    ?><script>
        window.location.href="admin.php";
        </script>
        <?php
     }
     $result=$object->adminpage();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
</head>
<body style="text-align: center;">
    <h1><?php echo $_SESSION['adminname']; ?></h1>
     <input type="text" id="search" placeholder="Type Your Search"><br>
     <br>



    <table border="2px" celpadding='10px' style="margin: auto; width: 80%;">
        <thead style="background-color: rgb(214, 213, 213); padding: 10px;">
            <tr style="height: 30px;">
                <th>S_No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Password</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody id="sdata">
            <?php
               
                if(mysqli_num_rows($result)>0){
                    $sn="1";
                    $_SESSION['sn']=$sn;
                    while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr style="height: 30px;">
                <td><?php echo $sn; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><img src=" <?php echo $row['pic']; ?>" style="height: 100px; width:100px" ></td>

                <td><a href="adminupdate.php?editid=<?php echo $row['sn']; ?>">Edit</a>
                <a href="code.php?removeid=<?php echo $row['sn']; ?>">Remove</a></td>
            </tr>
            <?php
                $sn++;
                    }}
                    ?>
        </tbody>
    </table>


    <br><br><br>

    <a href="code.php?admindo=logout"><button type="submit" name="logoutbtn" onclick=" return confirm('Are You Sure Want To Logout ?')">Logout</button></a>






    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function(){
            
            $("#search").on('keyup',function(){
                var search= $("#search").val();
                $.ajax({
                    url: "code.php",
                    method: 'post',
                    data:{s:search , a: "searchdata"},
                    success: function(xyz){
                        $("#sdata").html(xyz);
                    }

                })
            })
        })
    </script>
</body>
</html>