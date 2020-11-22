<?php
    session_start();
    echo "<script>window.open('login.php','_self')</script>";
    $con=mysqli_connect('localhost','root','');
    if($con){
        echo "Connection successful";
    }
    else{
        echo "no connection";
    }
    mysqli_select_db($con,'quizdbase');
    $name=$_POST['user'];
    $pass=$_POST['password'];
    
    $q="select * from signin where name='$name' && password='$pass'";

    $result=mysqli_query($con,$q);

    $num=mysqli_num_rows($result);

    if($num==1){
        echo "Duplicate Data";
    }
    else
    {
        $qy="insert into signin(name,password) values ('$name','$pass')";
        mysqli_query($con,$qy);
    }
?>