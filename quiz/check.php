<?php
    session_start();

    if(!isset($_SESSION['username'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'quizdbase');
?>
<html>
    <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
</html>
<body>
    <div class="container text-center">
        <br><br>
        <h1 class="text-center text-success">Web Development Quiz</h1>
        <br><br><br><br>   
        <table class="table text-center table-bordered table-hover">
            <tr>
                <th colspan="2" class="bg-dark"><h1 class="text-white">Results</h1></th>

            </tr> 
            <tr>
                <td> Questions Attempted</td>
                <?php
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['quizcheck'])){

            $count=count($_POST['quizcheck']);
            ?>
            <td>
            <?php
            echo "Out of 5 , you have selected ".$count." options";?>
            </td>
            </tr>
            <?php
            
            $result=0;
            $i=1;
            $selected=$_POST['quizcheck'];

            $q="select * from questions";
            $query=mysqli_query($con,$q);
            while($rows=mysqli_fetch_array($query)){

                $checked=$rows['ans_id']==$selected[$i];
                if($checked)
                {
                    $result++;
                
                $i++;
                }
            }
            
            ?>
            <tr>
                <td>Total score</td>
            <td>
            <?php
                
            echo "<br> Your total score is ".$result;
            ?>
            </td>
            </tr>
            <tr>
                <td>Incorrect answers</td>
                <td>
                <?php
                $incorrect=(5-$result);
                 echo "Your incorrect answers is ".$incorrect;
                 $name=$_SESSION['username'];
            $final="insert into user(username,totalques,answerscorrect) values ('$name','5','$result')";
            $qresult=mysqli_query($con,$final);;?>
                </td>
            </tr>
            <?php
        }  
        else{
            echo "<b>Please Select atleast one option<b>";
        }
        } ?>
            
            
    </div>
</body>
</html>