<?php

   

    
    class data{

        function __construct(){
            $this->con = mysqli_connect("localhost","root","","ourdata");
            session_start();
        }
        function createuserdata($name,$email,$phone,$gender,$password,$path){
            $sql="INSERT INTO user_data(name, email, phone, gender, password,pic) VALUES ('$name','$email','$phone','$gender','$password','$path')";
            return mysqli_query( $this->con , $sql);
            // return  $sql;
        }
        function userlogin($userid,$pass){
            $sql="SELECT * FROM user_data WHERE email='$userid' and password='$pass' ";
            $result= mysqli_query($this->con,$sql);
            if(mysqli_num_rows($result)==1){
                $user=mysqli_fetch_assoc($result);
                $_SESSION['userid']=$user['email'];
                $_SESSION['username']=$user['name'];
                $_SESSION['usersn']=$user['sn'];
                ?>
                <script>
                    alert("Welcome <?php echo $_SESSION['username'];?>")
                    window.location.href="userpage.php";

                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("some thing is wrong")
                    window.location.href="userlogin.php";

                </script>
                <?php
            }


        }
        function adminlogin($adminid,$adminpass){
            $sql="SELECT * FROM admin_list WHERE email='$adminid' and password='$adminpass' ";
            $result= mysqli_query($this->con,$sql);
            if(mysqli_num_rows($result)==1){
                $user=mysqli_fetch_assoc($result);
                $_SESSION['adminid']=$user['email'];
                $_SESSION['adminname']=$user['name'];
          
                ?>
                <script>
                    alert("Welcome <?php echo $_SESSION['adminname'];?>")
                    window.location.href="adminpage.php";

                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("some thing is wrong")
                    window.location.href="admin.php";

                </script>
                <?php
            }
        }
        function adminpage(){
            $sql="SELECT * FROM user_data";
            return mysqli_query($this->con,$sql);
        }

        function edituser($userid){
            $sql="SELECT * FROM user_data WHERE sn='$userid'";
            return mysqli_query($this->con,$sql);
        }

        function updateuser($newname,$newemail,$newphone,$newgender,$hiddenid){
            $sql="UPDATE user_data SET name='$newname',email='$newemail',phone='$newphone',gender='$newgender' WHERE sn='$hiddenid'";
            return mysqli_query($this->con,$sql);
        }

        function deletedata($deleteid){
            $sql="DELETE FROM user_data WHERE sn='$deleteid'";
            return mysqli_query($this->con,$sql);

        }

        function search($search){
            $sql="SELECT * FROM user_data WHERE name LIKE '%$search%'";
            return mysqli_query($this->con ,$sql);
            
        }
    }

    $object= new data();


?>