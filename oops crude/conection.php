<?php


    class link{

        function __construct(){
            $this->connect = mysqli_connect("localhost","root","","crud_function");
            session_start();
        }

        function create($name,$email,$phone,$address,$password){

            $sql="INSERT INTO `oopscrud`(`name`, `email`, `phone`, `address`, `password`) VALUES ('$name','$email','$phone','$address','$password')";
            return mysqli_query($this->connect , $sql);
        }

        function update($name,$email,$phone,$address,$updateid){
            $sql="UPDATE oopscrud SET name='$name' , email='$email', phone='$phone', address='$address' WHERE sn='$updateid'";
            return mysqli_query($this->connect,$sql);

        }

        function display(){
            $sql="SELECT * FROM oopscrud";
            return mysqli_query($this->connect,$sql);
        }
        
        function edit($editid){
            $sql="SELECT * FROM oopscrud WHERE sn='$editid'";
            return mysqli_query($this->connect, $sql);
        }

        function delete($deleteid){
            $sql="DELETE FROM oopscrud WHERE sn='$deleteid'";
            return mysqli_query($this->connect, $sql);
        }
      
        function changepass($passid,$currentpass){
            $sql="SELECT * FROM oopscrud WHERE sn='$passid' AND password='$currentpass'";
            $result=mysqli_query($this->connect, $sql);
            if(mysqli_num_rows($result)==1){
                return true;
            }
           else{
                return false;
           }
        }
        function updatepass($passid,$npass){
            $sql="UPDATE oopscrud SET password='$npass' WHERE sn='$passid'";
            return mysqli_query($this->connect, $sql);
        }

        function drawChart(){
            $sql= "SELECT * FROM sales";
            return mysqli_query($this->connect, $sql);
        }



    }


    $object= new link();


?>