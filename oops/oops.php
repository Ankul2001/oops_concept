<?php

class connect{
    
         function __construct($x,$y){
            $this-> x = $x;
            $this-> y = $y;
             }
        function add($a,$b){
            $c=$a+$b;
            return $c;
        }

        function sub($a,$b){
            $c=$a-$b;
            return $c ;
        }




        function result($p){

            $a=$this -> x;
            $b=$this -> y;

            return $a-$b+$p;


            // return $this -> x ;
        }
    }


        $oops= new connect(10,30);           // $oops is a variable difine by user
        echo $oops-> result(30);
        // echo $oops-> add(2,4)."<br>";
        // echo $oops-> sub(5,4);
?>