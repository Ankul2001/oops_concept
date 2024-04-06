<?php

    include("conection.php");


    // for creat data

    if(isset($_POST['signinbtn'])){
        $name=$_POST['username'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $password=md5($_POST['password']);

        if($object->create($name,$email,$phone,$address,$password)){
            ?>
            <script>
                alert("data added");
                window.location.href="display.php";
            </script>
            <?php
        }


    }

    //for update data

    if(isset($_POST['updatebtn'])){
        $name=$_POST['username'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $updateid=$_POST['hiddenid'];

        if($object->update($name,$email,$phone,$address,$updateid)){
            ?>
            <script>
                alert("data updated");
                window.location.href="display.php";

            </script>
            <?php
        }
    }



    //for remove data


    if(isset($_REQUEST['removeid'])){
        $deleteid=$_REQUEST['removeid'];
        if($object->delete($deleteid)){
            ?>
            <script>
                alert("Data Removed!!!!!!");
                window.location.href="display.php";
                </script>
            <?php
        }
        
    }


    //for change password


    if(isset($_POST['changepassbtn'])){
        $currentpass=md5($_POST['currentpassword']);
        $newpassword=md5($_POST['newpassword']);
        $conformpass=md5($_POST['confirmpassword']);

        $passid=$_POST['passhiddenid'];
        
        if($newpassword==$conformpass){
           
            if($object->changepass($passid,$currentpass) ){
                $object->updatepass($passid,$newpassword)
                ?>
                <script>
                alert("password updated!!");
                window.location.href="display.php";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                alert("Password not matched!!!! ");
                window.location.href="changepass.php";
                </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                alert("newpassword & conformpassword not match!!!! ");

                window.location.href="changepass.php";
                </script>
                <?php
        }

    }


    if(isset($_POST['action']) && $_POST['action']=="getSales"){
       $res=  $object->drawChart();
       while($row= mysqli_fetch_assoc($res)){
            $data[]= $row;
       }

       echo json_encode($data);
    }
   

?>