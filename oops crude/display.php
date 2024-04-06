<?php

include("conection.php");
include("qrcode/qrlib.php");

$result=$object->display();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data table</title>
</head>
<body style="text-align: center;">
    <h1>Data Table</h1>

    <a href="signin.php">Add Data</a>
    <table border='1px' celpadding='10px'style="margin:auto;width:80%">
        <thead style="height:40px; background-color:gray;">
            <tr>
                <th>S_No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>QR Code</th>
                <th>Update/Delete</th>
                <th>Change password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result)>0){
                $sn=1;
                while($row= mysqli_fetch_assoc($result)){
                    $_SESSION['userid']=$row['sn'];
            ?>
            <tr style="height:35px;">
                <td><?php echo $sn ; ?></td>
                <td><?php echo $row['name'] ; ?></td>
                <td><?php echo $row['email'] ; ?></td>
                <td><?php echo $row['phone'] ; ?></td>
                <td><?php echo $row['address'] ; ?></td>
                <td><?php echo ($row['status']==1)? 'Active': 'Not Verified';?></td>
                <?php 
                    $qrname=$row['name'];
                    $qremail=$row['email'];
              
                    ?>
                    <td>
                        <?php creatqr($qrname);?>
                </td>
                <td><a href="update.php?editid=<?php echo $_SESSION['userid']; ?>">Edit</a>
                <a href="code.php?removeid=<?php echo $_SESSION['userid']; ?>" onclick="return confirm('Record Will Be Deleted Permanantly')">Remove</a></td>
                <td><a href="changepass.php?changepassid=<?php echo $_SESSION['userid']; ?>">Change Password</a></td>
            </tr>
            <?php
                $sn++;
                }}



                function creatqr( $qrname){
                     $folder="QR_temp/";
                    $name='QR_'.md5($qrname ).'.png';
                     $url = $folder.basename($name);
                    QRcode::png($qrname,$url);
                    
                    ?>
                    <img src="<?php echo $url; ?>" width="100px" height="100px" alt="">
                    <?php
                }

            ?>
        </tbody>
    </table>
</body>
</html>