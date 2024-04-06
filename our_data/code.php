<?php
    include("connection.php");


    //insrt data

    if(isset($_POST['signinbtn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $gender=$_POST['gender'];
        $password=md5($_POST['password']);
        $folder="img/";
        $file=$_FILES['photo']['name'];
        $path=$folder.basename($file);
        move_uploaded_file($_FILES['photo']['tmp_name'],$path);


        if($object->createuserdata($name,$email,$phone,$gender,$password,$path)){
            ?>
            <script>
                alert("data added!!");
                window.location.href="userlogin.php";
            </script>
            <?php
        }
    }


    //user log in


    if(isset($_POST['userloginbtn'])){

        $userid=$_POST['userid'];
        $pass=md5($_POST['password']);

        $object->userlogin($userid,$pass);

    }


    //admin log in


    if(isset($_POST['adminloginbtn'])){
        $adminid=$_POST['adminid'];
        $adminpass=$_POST['password'];

        $object->adminlogin($adminid,$adminpass);
    }


    // update by admin


    if(isset($_POST['updatebtn'])){
        $newname=$_POST['name'];
        $newemail=$_POST['email'];
        $newphone=$_POST['phone'];
        $newgender=$_POST['gender'];
        $hiddenid=$_POST['hiddenid'];
        if($object->updateuser($newname,$newemail,$newphone,$newgender,$hiddenid)){
            ?>
            <script>
                alert("Data updated!!");
                window.location.href="adminpage.php";
            </script>
            <?php
        }
    }


    // data delete by admin


    if(isset($_REQUEST['removeid'])){
        $deleteid=$_REQUEST['removeid'];
        if($object->deletedata($deleteid)){
            ?>
            <script>
                alert("Data Deleted!!");
                window.location.href="adminpage.php";
            </script>
            <?php
        }
    }


    // admin log out


    if(isset($_REQUEST['admindo'])=='logout'){
        session_start();
        session_destroy();
        ?>
        <script>
            alert("Admin Logged Out....");
            window.location.href="userlogin.php";
        </script>
        <?php
    }


    // search data 


    if(isset($_POST['a'])&& $_POST['a']=="searchdata"){
        $search=$_POST['s'];
        $result=$object->search($search);
        if(mysqli_num_rows($result)>0){
            while($list=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td><?php echo $_SESSION['sn']; ?></td>
                <td><?php echo $list['name']; ?></td>
                <td><?php echo $list['email']; ?></td>
                <td><?php echo $list['phone']; ?></td>
                <td><?php echo $list['gender']; ?></td>
                <td><?php echo $list['password']; ?></td>
                <td><img src=" <?php echo $list['pic']; ?>" style="height: 100px; width:100px" ></td>

                <td><a href="adminupdate.php?editid=<?php echo $list['sn']; ?>">Edit</a>
                <a href="code.php?removeid=<?php echo $list['sn']; ?>">Remove</a></td>
                </tr>
                <?php
                 $_SESSION['sn']++;
            }

        }
    }




    ?>