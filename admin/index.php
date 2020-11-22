<?php
    session_start();

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'quizdbase');

?>
<!DOCTYPE html>
 <html>
    <head>
        <title>Admin Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!--font-awesome link-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <style>
        </style>
        <div id="wrapper">
            <div class="row" style="display:flex">
                
                <div class="column2" style="with:79%">
                    <div id="page-wrapper">
                        <div class="container-fluid" style="with:79%">
                            <?php
                                if(isset($_GET['dashboard'])){
                                    include 'dashboard.php'; 
                                }
                                if(isset($_GET['edit_q'])){
                                    include 'edit_question.php'; 
                                }
                                if(isset($_GET['delete_q'])){
                                    include 'delete_question.php'; 
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>